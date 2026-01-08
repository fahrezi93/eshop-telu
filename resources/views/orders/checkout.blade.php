@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
    <div class="container py-4">
        <h2 class="fw-bold mb-4">
            <i class="bi bi-credit-card me-2"></i>Checkout
        </h2>

        <div class="row g-4">
            <!-- Order Summary -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0"><i class="bi bi-bag me-2"></i>Order Summary</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Product</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-end">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->orderItems as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if($item->product->image)
                                                        <img src="{{ Str::startsWith($item->product->image, 'http') ? $item->product->image : (Str::startsWith($item->product->image, '/images') ? asset($item->product->image) : asset('storage/' . $item->product->image)) }}" 
                                                             alt="{{ $item->product->name }}" 
                                                             class="rounded me-3" 
                                                             style="width: 50px; height: 50px; object-fit: cover;">
                                                    @else
                                                        <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center" 
                                                             style="width: 50px; height: 50px;">
                                                            <i class="bi bi-image text-muted"></i>
                                                        </div>
                                                    @endif
                                                    <div>
                                                        <strong>{{ Str::limit($item->product->name, 40) }}</strong>
                                                        <br>
                                                        <small class="text-muted">Rp {{ number_format($item->price, 0, ',', '.') }} / unit</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center align-middle">
                                                <span class="badge bg-secondary">{{ $item->quantity }}</span>
                                            </td>
                                            <td class="text-end align-middle fw-semibold">
                                                Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="table-light">
                                    <tr>
                                        <td colspan="2" class="text-end fw-bold">Total:</td>
                                        <td class="text-end fw-bold fs-5 text-primary">
                                            Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Customer Details -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0"><i class="bi bi-person me-2"></i>Customer Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label text-muted small">Full Name</label>
                                <p class="fw-semibold mb-0">{{ $order->user->name }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small">Email</label>
                                <p class="fw-semibold mb-0">{{ $order->user->email }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small">Phone Number</label>
                                <p class="fw-semibold mb-0">{{ $order->user->phone ?: 'Not provided' }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small">Order Number</label>
                                <p class="fw-semibold mb-0">
                                    <span class="badge bg-primary">{{ $order->order_number }}</span>
                                </p>
                            </div>
                            <div class="col-12">
                                <label class="form-label text-muted small">Alamat Pengiriman</label>
                                <p class="fw-semibold mb-0">{{ $order->user->full_address ?: 'Belum diisi' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Section -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-success text-white py-3">
                        <h5 class="mb-0"><i class="bi bi-wallet2 me-2"></i>Payment</h5>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <p class="text-muted mb-1">Total Amount</p>
                            <h2 class="text-primary fw-bold">Rp {{ number_format($order->total_price, 0, ',', '.') }}</h2>
                        </div>

                        <!-- Pay Now Button -->
                        <button type="button" id="pay-button" class="btn btn-success btn-lg w-100 mb-3">
                            <i class="bi bi-credit-card me-2"></i>Pay Now
                        </button>

                        <div class="text-center">
                            <small class="text-muted">
                                <i class="bi bi-shield-lock me-1"></i>
                                Secure payment by Midtrans
                            </small>
                        </div>
                    </div>
                </div>

                <!-- Payment Methods Info -->
                <div class="card border-0 shadow-sm mt-3">
                    <div class="card-body">
                        <h6 class="fw-semibold mb-3">Accepted Payment Methods</h6>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-light text-dark"><i class="bi bi-credit-card me-1"></i>Credit Card</span>
                            <span class="badge bg-light text-dark"><i class="bi bi-bank me-1"></i>Bank Transfer</span>
                            <span class="badge bg-light text-dark"><i class="bi bi-wallet me-1"></i>E-Wallet</span>
                            <span class="badge bg-light text-dark"><i class="bi bi-shop me-1"></i>Retail</span>
                        </div>
                    </div>
                </div>

                <!-- Order Info -->
                <div class="card border-0 shadow-sm mt-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Status</span>
                            <span class="badge bg-warning">Awaiting Payment</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Created</span>
                            <span>{{ $order->created_at->format('d M Y, H:i') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<!-- Midtrans Snap.js -->
<script src="{{ config('midtrans.snap_url') }}" data-client-key="{{ config('midtrans.client_key') }}"></script>

<script type="text/javascript">
        // Track if payment was attempted
        var paymentAttempted = false;
        
        document.getElementById('pay-button').addEventListener('click', function() {
            // Disable button to prevent double-click
            this.disabled = true;
            this.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Processing...';
            
            // Reset payment attempted flag
            paymentAttempted = true;
            
            // Call Midtrans Snap
            snap.pay('{{ $order->snap_token }}', {
                onSuccess: function(result) {
                    // Payment success
                    console.log('Payment success:', result);
                    paymentAttempted = false;
                    Swal.fire({
                        title: 'Payment Successful!',
                        text: 'Thank you for your order. We will process it immediately.',
                        icon: 'success',
                        confirmButtonText: 'View Order',
                        confirmButtonColor: '#2563eb'
                    }).then((result) => {
                        window.location.href = '{{ route("orders.show", $order->order_number) }}';
                    });
                },
                onPending: function(result) {
                    // Payment pending
                    console.log('Payment pending:', result);
                    paymentAttempted = false;
                    Swal.fire({
                        title: 'Payment Pending',
                        text: 'Please complete your payment before the deadline.',
                        icon: 'info',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#ffc107'
                    }).then((result) => {
                        window.location.href = '{{ route("orders.show", $order->order_number) }}';
                    });
                },
                onError: function(result) {
                    // Payment failed
                    console.error('Payment error:', result);
                    paymentAttempted = false;
                    Swal.fire({
                        title: 'Payment Failed!',
                        text: 'Your payment was declined or failed. Please try again with a different payment method.',
                        icon: 'error',
                        confirmButtonText: 'Try Again',
                        confirmButtonColor: '#dc3545'
                    });
                    
                    // Re-enable button
                    var btn = document.getElementById('pay-button');
                    btn.disabled = false;
                    btn.innerHTML = '<i class="bi bi-credit-card me-2"></i>Pay Now';
                },
                onClose: function() {
                    // Customer closed the popup without finishing the payment
                    console.log('Customer closed the popup');
                    
                    // Show notification based on whether payment was attempted
                    if (paymentAttempted) {
                        Swal.fire({
                            title: 'Payment Cancelled',
                            text: 'You closed the payment window. Your order is still awaiting payment. Click "Pay Now" to try again.',
                            icon: 'warning',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#ffc107'
                        });
                    }
                    
                    paymentAttempted = false;
                    
                    // Re-enable button
                    var btn = document.getElementById('pay-button');
                    btn.disabled = false;
                    btn.innerHTML = '<i class="bi bi-credit-card me-2"></i>Pay Now';
                }
            });
        });
</script>
@endpush
