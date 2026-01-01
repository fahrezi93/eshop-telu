@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Banner -->
    <section class="hero-banner position-relative overflow-hidden" style="background: linear-gradient(135deg, #1e40af 0%, #3b82f6 50%, #60a5fa 100%); min-height: 450px;">
        <div class="container py-5">
            <div class="row align-items-center min-vh-50">
                <div class="col-lg-6 text-white py-5">
                    <h1 class="display-4 fw-bold mb-4">
                        Find Your Perfect <br>
                        <span style="color: #fbbf24;">Electronics</span>
                    </h1>
                    <p class="lead mb-4 opacity-90">
                        Discover the latest smartphones and laptops at unbeatable prices. 
                        Quality guaranteed, fast delivery, and excellent customer service.
                    </p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="{{ route('products.index') }}" class="btn btn-warning btn-lg px-4 py-2 fw-semibold">
                            <i class="bi bi-grid me-2"></i>Browse Catalog
                        </a>
                        <a href="{{ route('products.index', ['category' => 'HP']) }}" class="btn btn-outline-light btn-lg px-4 py-2">
                            <i class="bi bi-phone me-2"></i>Smartphones
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block text-center">
                    <div class="position-relative">
                        <div class="bg-white bg-opacity-10 rounded-circle position-absolute" style="width: 300px; height: 300px; top: 50%; left: 50%; transform: translate(-50%, -50%);"></div>
                        <i class="bi bi-laptop text-white opacity-25" style="font-size: 15rem;"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Decorative shapes -->
        <div class="position-absolute" style="bottom: -50px; left: -50px; width: 200px; height: 200px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
        <div class="position-absolute" style="top: -30px; right: -30px; width: 150px; height: 150px; background: rgba(255,255,255,0.05); border-radius: 50%;"></div>
    </section>

    <!-- Features Section -->
    <section class="py-4 bg-white border-bottom">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-6 col-md-3">
                    <div class="d-flex flex-column align-items-center">
                        <div class="bg-primary bg-opacity-10 rounded-circle p-3 mb-2">
                            <i class="bi bi-truck text-primary fs-4"></i>
                        </div>
                        <h6 class="mb-0">Free Shipping</h6>
                        <small class="text-muted">Orders over Rp 1jt</small>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="d-flex flex-column align-items-center">
                        <div class="bg-success bg-opacity-10 rounded-circle p-3 mb-2">
                            <i class="bi bi-shield-check text-success fs-4"></i>
                        </div>
                        <h6 class="mb-0">Secure Payment</h6>
                        <small class="text-muted">100% Protected</small>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="d-flex flex-column align-items-center">
                        <div class="bg-warning bg-opacity-10 rounded-circle p-3 mb-2">
                            <i class="bi bi-arrow-repeat text-warning fs-4"></i>
                        </div>
                        <h6 class="mb-0">Easy Returns</h6>
                        <small class="text-muted">7 Days Return</small>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="d-flex flex-column align-items-center">
                        <div class="bg-info bg-opacity-10 rounded-circle p-3 mb-2">
                            <i class="bi bi-headset text-info fs-4"></i>
                        </div>
                        <h6 class="mb-0">24/7 Support</h6>
                        <small class="text-muted">Dedicated Help</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Products Section -->
    <section class="py-5" style="background-color: #f8fafc;">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold mb-1">Latest Products</h2>
                    <p class="text-muted mb-0">Check out our newest arrivals</p>
                </div>
                <a href="{{ route('products.index') }}" class="btn btn-outline-primary">
                    View All <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>

            @if($products->isEmpty())
                <div class="text-center py-5">
                    <i class="bi bi-box-seam text-muted" style="font-size: 4rem;"></i>
                    <h4 class="mt-3 text-muted">No products available</h4>
                    <p class="text-muted">Check back soon for new arrivals!</p>
                </div>
            @else
                <div class="row g-4">
                    @foreach($products as $product)
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card product-card h-100">
                                <a href="{{ route('products.show', $product->slug) }}" class="text-decoration-none">
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                                    @else
                                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                            <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                                        </div>
                                    @endif
                                </a>
                                <div class="card-body d-flex flex-column">
                                    <span class="badge category-badge {{ $product->category === 'HP' ? 'bg-info' : 'bg-secondary' }} mb-2 align-self-start">
                                        <i class="bi {{ $product->category === 'HP' ? 'bi-phone' : 'bi-laptop' }}"></i> {{ $product->category }}
                                    </span>
                                    <h6 class="card-title mb-2">
                                        <a href="{{ route('products.show', $product->slug) }}" class="text-decoration-none text-dark stretched-link">
                                            {{ Str::limit($product->name, 40) }}
                                        </a>
                                    </h6>
                                    <div class="mt-auto">
                                        <div class="price-tag">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                                        @if($product->stock > 0)
                                            <small class="text-success"><i class="bi bi-check-circle"></i> In Stock</small>
                                        @else
                                            <small class="text-danger"><i class="bi bi-x-circle"></i> Out of Stock</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-5 bg-white">
        <div class="container">
            <h2 class="fw-bold text-center mb-4">Shop by Category</h2>
            <div class="row g-4 justify-content-center">
                <div class="col-md-5">
                    <a href="{{ route('products.index', ['category' => 'HP']) }}" class="text-decoration-none">
                        <div class="card border-0 position-relative overflow-hidden" style="background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%); min-height: 200px;">
                            <div class="card-body d-flex align-items-center p-4">
                                <div class="text-white">
                                    <h3 class="fw-bold mb-2">Smartphones</h3>
                                    <p class="mb-3 opacity-90">Latest smartphones with powerful features</p>
                                    <span class="btn btn-light btn-sm">Browse <i class="bi bi-arrow-right"></i></span>
                                </div>
                                <i class="bi bi-phone position-absolute text-white opacity-25" style="font-size: 8rem; right: -20px; bottom: -20px;"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-5">
                    <a href="{{ route('products.index', ['category' => 'Laptop']) }}" class="text-decoration-none">
                        <div class="card border-0 position-relative overflow-hidden" style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%); min-height: 200px;">
                            <div class="card-body d-flex align-items-center p-4">
                                <div class="text-white">
                                    <h3 class="fw-bold mb-2">Laptops</h3>
                                    <p class="mb-3 opacity-90">Powerful laptops for work and gaming</p>
                                    <span class="btn btn-light btn-sm">Browse <i class="bi bi-arrow-right"></i></span>
                                </div>
                                <i class="bi bi-laptop position-absolute text-white opacity-25" style="font-size: 8rem; right: -20px; bottom: -20px;"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
