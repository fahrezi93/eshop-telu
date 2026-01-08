<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Process checkout and create order with Midtrans Snap Token.
     */
    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        // Validate cart is not empty
        if (empty($cart)) {
            return back()->with('error', 'Cart is empty. Please add products to cart before checkout.');
        }

        $user = $request->user();

        // Validate user has address and phone
    if (empty($user->street_address) || empty($user->phone)) {
        return redirect()->route('profile.edit')->with('warning', 'Silakan lengkapi alamat pengiriman dan nomor telepon untuk melanjutkan checkout.');
    }

        try {
            DB::beginTransaction();

            $totalPrice = 0;
            $orderItems = [];
            $midtransItems = [];

            // Validate stock and calculate total price
            foreach ($cart as $productId => $item) {
                $product = Product::find($productId);

                if (!$product) {
                    DB::rollBack();
                    return back()->with('error', "Product with ID {$productId} not found.");
                }

                if ($product->stock < $item['quantity']) {
                    DB::rollBack();
                    return back()->with('error', "Insufficient stock for {$product->name}. Available: {$product->stock}");
                }

                $subtotal = $item['price'] * $item['quantity'];
                $totalPrice += $subtotal;

                // Prepare order items
                $orderItems[] = [
                    'product_id' => $productId,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ];

                // Prepare Midtrans item details
                $midtransItems[] = [
                    'id' => (string) $product->id,
                    'price' => (int) $item['price'],
                    'quantity' => (int) $item['quantity'],
                    'name' => Str::limit($product->name, 50),
                ];

                // Reduce stock
                $product->decrement('stock', $item['quantity']);
            }

            // Generate unique order number
            $orderNumber = 'ORD-' . strtoupper(Str::random(8)) . '-' . time();

            // Create order
            $order = Order::create([
                'order_number' => $orderNumber,
                'user_id' => $user->id,
                'total_price' => $totalPrice,
                'payment_status' => Order::STATUS_UNPAID,
            ]);

            // Create order items
            foreach ($orderItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            // Configure Midtrans
        $serverKey = config('services.midtrans.server_key');
        if (empty($serverKey)) {
            Log::critical('Midtrans Server Key is missing in config/services.php or .env');
            throw new \Exception('Payment configuration error: Server Key is missing.');
        }

        \Midtrans\Config::$serverKey = $serverKey;
        \Midtrans\Config::$isProduction = config('services.midtrans.is_production', false);
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
        
        // Fix SSL certificate issue on Windows - use system CA bundle
        $caPath = ini_get('curl.cainfo') ?: ini_get('openssl.cafile');
        if ($caPath && file_exists($caPath)) {
            \Midtrans\Config::$curlOptions = [
                CURLOPT_CAINFO => $caPath,
                CURLOPT_HTTPHEADER => [],
            ];
        } else {
            // For development/sandbox only: disable SSL verification
            // WARNING: Do not use this in production!
            if (!\Midtrans\Config::$isProduction) {
                \Midtrans\Config::$curlOptions = [
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_SSL_VERIFYHOST => 0,
                    CURLOPT_HTTPHEADER => [],
                ];
            }
        }
        
        Log::info('Midtrans Mode: ' . (\Midtrans\Config::$isProduction ? 'PRODUCTION' : 'SANDBOX'));

        // Build Midtrans transaction params
        $params = [
            'transaction_details' => [
                'order_id' => $order->order_number,
                'gross_amount' => (int) $totalPrice,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'billing_address' => [
                    'address' => $user->full_address,
                    'city' => $user->city,
                    'postal_code' => $user->postal_code,
                    'country_code' => 'IDN',
                ],
                'shipping_address' => [
                    'address' => $user->full_address,
                    'city' => $user->city,
                    'postal_code' => $user->postal_code,
                    'country_code' => 'IDN',
                ],
            ],
            'item_details' => $midtransItems,
        ];

        // Generate Snap Token
        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);
        } catch (\Exception $midtransException) {
            Log::error('Midtrans Snap Error: ' . $midtransException->getMessage());
            throw new \Exception('Payment gateway error: ' . $midtransException->getMessage());
        }

        // Save snap token to order
        $order->update(['snap_token' => $snapToken]);

        // Clear cart session
        session()->forget('cart');

        DB::commit();

        // Load order with items for checkout view
        $order->load('orderItems.product', 'user');

        return view('orders.checkout', compact('order'));

    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Checkout failed details: ' . $e->getMessage());
        Log::error($e->getTraceAsString());

        $errorMessage = 'Checkout failed. Please try again.';
        if (str_contains($e->getMessage(), 'Server Key')) {
            $errorMessage = 'Payment configuration error (Server Key). Please contact admin.';
        } elseif (str_contains($e->getMessage(), 'Access denied')) {
            $errorMessage = 'Payment gateway authentication failed. Please check credentials.';
        }

        return back()->with('error', $errorMessage);
    }
    }

    /**
     * Handle Midtrans webhook callback.
     */
    public function callback(Request $request): JsonResponse
    {
        // Log incoming callback for debugging
        Log::info('Midtrans callback received', [
            'ip' => $request->ip(),
            'data' => $request->all(),
        ]);
        
        // Get notification body
        $notification = $request->all();

        $orderId = $notification['order_id'] ?? null;
        $statusCode = $notification['status_code'] ?? null;
        $grossAmount = $notification['gross_amount'] ?? null;
        $signatureKey = $notification['signature_key'] ?? null;
        $transactionStatus = $notification['transaction_status'] ?? null;
        $fraudStatus = $notification['fraud_status'] ?? null;

        // Validate required fields
        if (!$orderId || !$statusCode || !$grossAmount || !$signatureKey) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid notification data.',
            ], 400);
        }

        // Verify signature key
        $serverKey = config('services.midtrans.server_key');
        $expectedSignature = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);

        if ($signatureKey !== $expectedSignature) {
            Log::warning('Midtrans callback: Invalid signature', [
                'order_id' => $orderId,
                'received_signature' => $signatureKey,
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Invalid signature.',
            ], 403);
        }

        // Find order
        $order = Order::where('order_number', $orderId)->first();

        if (!$order) {
            Log::warning('Midtrans callback: Order not found', ['order_id' => $orderId]);

            return response()->json([
                'success' => false,
                'message' => 'Order not found.',
            ], 404);
        }

        // Update payment status based on transaction status
        $newStatus = $this->mapTransactionStatus($transactionStatus, $fraudStatus);

        if ($newStatus !== $order->payment_status) {
            $order->update(['payment_status' => $newStatus]);

            Log::info('Midtrans callback: Payment status updated', [
                'order_id' => $orderId,
                'transaction_status' => $transactionStatus,
                'new_payment_status' => $newStatus,
            ]);

            // If payment cancelled/expired, restore stock
            if (in_array($newStatus, [Order::STATUS_CANCELLED, Order::STATUS_EXPIRED])) {
                $this->restoreStock($order);
            }

            // Send WhatsApp notification for Paid, Cancelled, or Expired
            if (in_array($newStatus, [Order::STATUS_PAID, Order::STATUS_CANCELLED, Order::STATUS_EXPIRED])) {
                $this->sendWhatsAppNotification($order);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Notification processed successfully.',
        ]);
    }

    /**
     * Map Midtrans transaction status to order payment status.
     */
    private function mapTransactionStatus(string $transactionStatus, ?string $fraudStatus): string
    {
        switch ($transactionStatus) {
            case 'capture':
                // For credit card, need to check fraud status
                if ($fraudStatus === 'accept') {
                    return Order::STATUS_PAID;
                } elseif ($fraudStatus === 'challenge') {
                    return Order::STATUS_UNPAID; // Needs manual review
                } else {
                    return Order::STATUS_CANCELLED;
                }

            case 'settlement':
                return Order::STATUS_PAID;

            case 'pending':
                return Order::STATUS_UNPAID;

            case 'expire':
                return Order::STATUS_EXPIRED;

            case 'cancel':
            case 'deny':
                return Order::STATUS_CANCELLED;

            default:
                return Order::STATUS_UNPAID;
        }
    }

    /**
     * Restore stock when order is cancelled or expired.
     */
    private function restoreStock(Order $order): void
    {
        $order->load('orderItems');

        foreach ($order->orderItems as $orderItem) {
            Product::where('id', $orderItem->product_id)
                ->increment('stock', $orderItem->quantity);
        }

        Log::info('Stock restored for cancelled/expired order', [
            'order_id' => $order->order_number,
        ]);
    }

    /**
     * Send WhatsApp notification using Fonnte.
     */
    private function sendWhatsAppNotification(Order $order): void
    {
        try {
            $user = $order->user;
            if (!$user || !$user->phone) {
                Log::warning('WhatsApp notification failed: User phone number not found', ['order_id' => $order->order_number]);
                return;
            }

            $token = config('services.fonnte.token');
            if (!$token) {
                Log::warning('WhatsApp notification failed: Fonnte token not configured');
                return;
            }

            $message = "";

            if ($order->payment_status === Order::STATUS_PAID) {
                $message = "*Pembayaran Berhasil!* 🥳\n\n";
                $message .= "Halo {$user->name},\n";
                $message .= "Terima kasih telah melakukan pembayaran untuk pesanan *{$order->order_number}*.\n\n";
                $message .= "Detail Pembayaran:\n";
                $message .= "• Total: Rp " . number_format($order->total_price, 0, ',', '.') . "\n";
                $message .= "• Status: LUNAS\n\n";
                $message .= "Pesanan Anda akan segera kami proses dan kirimkan. \n\n";
                $message .= "Terima kasih telah berbelanja di E-Shop Telu!";
            
            } elseif ($order->payment_status === Order::STATUS_CANCELLED) {
                $message = "*Pembayaran Gagal/Dibatalkan* ❌\n\n";
                $message .= "Halo {$user->name},\n";
                $message .= "Mohon maaf, transaksi untuk pesanan *{$order->order_number}* telah dibatalkan atau gagal diproses oleh sistem pembayaran.\n\n";
                $message .= "Silakan lakukan checkout ulang jika Anda masih ingin memesan produk ini.\n\n";
                $message .= "Terima kasih.";

            } elseif ($order->payment_status === Order::STATUS_EXPIRED) {
                $message = "*Waktu Pembayaran Habis* ⏳\n\n";
                $message .= "Halo {$user->name},\n";
                $message .= "Sayang sekali, batas waktu pembayaran untuk pesanan *{$order->order_number}* telah habis.\n\n";
                $message .= "Pesanan telah otomatis dibatalkan. Silakan pesan kembali jika diperlukan.\n\n";
                $message .= "Terima kasih.";
            } else {
                return; // No notification for other statuses
            }

            $response = Http::withHeaders([
                'Authorization' => $token,
            ])->post('https://api.fonnte.com/send', [
                'target' => $user->phone,
                'message' => $message,
                'countryCode' => '62', // Optional, default to Indonesia
            ]);

            if ($response->successful()) {
                Log::info('WhatsApp notification sent successfully', ['order_id' => $order->order_number]);
            } else {
                Log::error('WhatsApp notification failed', [
                    'order_id' => $order->order_number,
                    'response' => $response->body(),
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Error sending WhatsApp notification: ' . $e->getMessage());
        }
    }

    /**
     * Get order details for authenticated user.
     */
    public function show(Request $request, string $orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)
            ->where('user_id', $request->user()->id)
            ->with('orderItems.product', 'user')
            ->first();

        if (!$order) {
            abort(404, 'Order not found.');
        }

        return view('orders.show', compact('order'));
    }

    /**
     * Get all orders for authenticated user.
     */
    public function myOrders(Request $request)
    {
        $orders = Order::where('user_id', $request->user()->id)
            ->with('orderItems.product')
            ->latest()
            ->paginate(10);

        return view('orders.my-orders', compact('orders'));
    }
}
