@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
    <div class="container py-4">
        <h2 class="fw-bold mb-4">
            <i class="bi bi-cart3 me-2"></i>Shopping Cart
        </h2>

        @if(empty($cartItems))
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <i class="bi bi-cart-x text-muted" style="font-size: 5rem;"></i>
                    <h4 class="mt-3 text-muted">Your cart is empty</h4>
                    <p class="text-muted mb-4">Looks like you haven't added any items to your cart yet.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">
                        <i class="bi bi-grid me-2"></i>Browse Products
                    </a>
                </div>
            </div>
        @else
            <div class="row g-4">
                <!-- Cart Items -->
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3">
                            <h5 class="mb-0">Cart Items ({{ count($cartItems) }})</h5>
                        </div>
                        <div class="card-body p-0">
                            <!-- Desktop View (Table) -->
                            <div class="table-responsive d-none d-md-block">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 45%;">Product</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Qty</th>
                                            <th class="text-end">Subtotal</th>
                                            <th class="text-center" style="width: 50px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cartItems as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        @if($item['product']->image)
                                                            <img src="{{ asset(ltrim($item['product']->image, '/')) }}" 
                                                                 alt="{{ $item['product']->name }}" 
                                                                 class="rounded me-3" 
                                                                 style="width: 60px; height: 60px; object-fit: cover;">
                                                        @else
                                                            <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center" 
                                                                 style="width: 60px; height: 60px;">
                                                                <i class="bi bi-image text-muted"></i>
                                                            </div>
                                                        @endif
                                                        <div>
                                                            <a href="{{ route('products.show', $item['product']->slug) }}" 
                                                               class="text-decoration-none text-dark fw-semibold">
                                                                {{ Str::limit($item['product']->name, 40) }}
                                                            </a>
                                                            <br>
                                                            <small class="text-muted">
                                                                <i class="bi {{ $item['product']->category === 'HP' ? 'bi-phone' : 'bi-laptop' }}"></i>
                                                                {{ $item['product']->category }}
                                                            </small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <span class="text-muted">Rp {{ number_format($item['price'], 0, ',', '.') }}</span>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <span class="badge bg-secondary">{{ $item['quantity'] }}</span>
                                                </td>
                                                <td class="text-end align-middle">
                                                    <span class="fw-semibold text-primary">
                                                        Rp {{ number_format($item['subtotal'], 0, ',', '.') }}
                                                    </span>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <form action="{{ route('cart.remove', $item['product_id']) }}" method="POST" 
                                                          onsubmit="return confirm('Remove this item from cart?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Mobile View (Cards) -->
                            <div class="d-md-none">
                                @foreach($cartItems as $item)
                                    <div class="p-3 border-bottom position-relative">
                                        <div class="d-flex gap-3">
                                            <!-- Image -->
                                            <div class="flex-shrink-0">
                                                @if($item['product']->image)
                                                    <img src="{{ asset(ltrim($item['product']->image, '/')) }}" 
                                                         alt="{{ $item['product']->name }}" 
                                                         class="rounded" 
                                                         style="width: 80px; height: 80px; object-fit: cover;">
                                                @else
                                                    <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                                         style="width: 80px; height: 80px;">
                                                        <i class="bi bi-image text-muted fs-4"></i>
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- Content -->
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div>
                                                        <a href="{{ route('products.show', $item['product']->slug) }}" 
                                                           class="text-decoration-none text-dark fw-bold text-break">
                                                            {{ Str::limit($item['product']->name, 35) }}
                                                        </a>
                                                        <div class="small text-muted mb-1">
                                                            <i class="bi {{ $item['product']->category === 'HP' ? 'bi-phone' : 'bi-laptop' }} me-1"></i>
                                                            {{ $item['product']->category }}
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Delete Button (Top Right) -->
                                                    <form action="{{ route('cart.remove', $item['product_id']) }}" method="POST" 
                                                          onsubmit="return confirm('Remove this item from cart?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link text-danger p-0 ms-2" style="font-size: 1.1rem;">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                
                                                <div class="d-flex justify-content-between align-items-end mt-2">
                                                    <div>
                                                        <span class="small text-muted d-block">Price</span>
                                                        <span class="fw-semibold">Rp {{ number_format($item['price'], 0, ',', '.') }}</span>
                                                    </div>
                                                    <div class="text-end">
                                                        <span class="badge bg-secondary mb-1">x{{ $item['quantity'] }}</span>
                                                        <div class="fw-bold text-primary">
                                                            Rp {{ number_format($item['subtotal'], 0, ',', '.') }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Continue Shopping -->
                    <div class="mt-3">
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-2"></i>Continue Shopping
                        </a>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-primary text-white py-3">
                            <h5 class="mb-0"><i class="bi bi-receipt me-2"></i>Order Summary</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Items ({{ count($cartItems) }})</span>
                                <span>Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Shipping</span>
                                <span class="text-success">Free</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-4">
                                <span class="fw-bold fs-5">Total</span>
                                <span class="fw-bold fs-5 text-primary">Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                            </div>

                            @auth
                                <form action="{{ route('checkout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-lg w-100">
                                        <i class="bi bi-credit-card me-2"></i>Proceed to Checkout
                                    </button>
                                </form>
                            @else
                                <div class="alert alert-info mb-3">
                                    <i class="bi bi-info-circle me-2"></i>
                                    Please login to proceed with checkout.
                                </div>
                                <a href="{{ route('login') }}" class="btn btn-primary btn-lg w-100">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>Login to Checkout
                                </a>
                            @endauth
                        </div>
                    </div>

                    <!-- Secure Checkout Info -->
                    <div class="card border-0 shadow-sm mt-3">
                        <div class="card-body text-center py-3">
                            <i class="bi bi-shield-lock text-success fs-4"></i>
                            <p class="mb-0 small text-muted">Secure checkout powered by Midtrans</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
