<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home - Latest products
Route::get('/', [HomeController::class, 'index'])->name('home');

// Products - Catalog and details
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

// Cart - Session-based cart management
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');

// Protected routes - Requires authentication
Route::middleware('auth')->group(function () {
    // Checkout - Process order with Midtrans
    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    
    // My Orders
    Route::get('/orders', [OrderController::class, 'myOrders'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/orders/{order}/verify-payment', [OrderController::class, 'verifyPayment'])->name('orders.verify');
    
    // Profile (from Breeze)
    
    // Profile (from Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Midtrans Webhook Callback - Excluded from CSRF in bootstrap/app.php
Route::post('/midtrans-callback', [OrderController::class, 'callback'])->name('midtrans.callback');

// Static Pages
Route::get('/about', [PageController::class, 'about'])->name('pages.about');
Route::get('/contact', [PageController::class, 'contact'])->name('pages.contact');
Route::get('/policy', [PageController::class, 'policy'])->name('pages.policy');

// Breeze Auth Routes
require __DIR__.'/auth.php';
