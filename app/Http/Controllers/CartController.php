<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display the cart contents.
     */
    public function show(Request $request)
    {
        $cart = session()->get('cart', []);
        $cartItems = [];
        $totalPrice = 0;

        foreach ($cart as $productId => $item) {
            $product = Product::find($productId);
            if ($product) {
                $subtotal = $item['price'] * $item['quantity'];
                $cartItems[] = [
                    'product_id' => $productId,
                    'product' => $product,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'subtotal' => $subtotal,
                ];
                $totalPrice += $subtotal;
            }
        }

        return view('cart.index', compact('cartItems', 'totalPrice'));
    }

    /**
     * Add a product to the cart.
     */
    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'integer|min:1',
        ]);

        $quantity = $request->input('quantity', 1);

        // Check stock availability
        if ($product->stock < $quantity) {
            return back()->with('error', 'Insufficient stock. Available: ' . $product->stock);
        }

        $cart = session()->get('cart', []);

        // If product already exists in cart, update quantity
        if (isset($cart[$product->id])) {
            $newQuantity = $cart[$product->id]['quantity'] + $quantity;
            
            // Check stock for total quantity
            if ($product->stock < $newQuantity) {
                return back()->with('error', 'Insufficient stock for requested quantity. Available: ' . $product->stock);
            }
            
            $cart[$product->id]['quantity'] = $newQuantity;
        } else {
            // Add new product to cart
            $cart[$product->id] = [
                'quantity' => $quantity,
                'price' => $product->price,
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Remove a product from the cart.
     */
    public function remove(Product $product)
    {
        $cart = session()->get('cart', []);

        if (!isset($cart[$product->id])) {
            return back()->with('error', 'Product not found in cart.');
        }

        unset($cart[$product->id]);
        session()->put('cart', $cart);

        return back()->with('success', 'Product removed from cart successfully!');
    }
}
