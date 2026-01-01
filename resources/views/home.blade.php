@extends('layouts.app')

@section('title', 'Home')

@section('content')
<style>
    /* Hero Shape Background */
    .hero-section {
        background-color: #ffffff;
        position: relative;
        overflow: hidden;
        /* Subtle Grid Pattern */
        background-image: radial-gradient(#e5e7eb 1px, transparent 1px);
        background-size: 24px 24px;
    }

    /* Modern Gradient Text */
    .text-gradient {
        background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Floating Feature Card */
    .feature-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.06);
        border: 1px solid rgba(0,0,0,0.02);
        transition: transform 0.3s ease;
    }
    .feature-card:hover {
        transform: translateY(-5px);
    }

    /* Product Card Styling (Matched Catalog) */
    .product-card {
        border: 1px solid #f0f0f0;
        background: #fff;
        border-radius: 12px;
        transition: all 0.3s ease;
        overflow: hidden;
    }
    
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        border-color: transparent;
    }

    .product-image-container {
        position: relative;
        padding-top: 100%; /* 1:1 Aspect Ratio */
        background-color: #f8fafc;
        overflow: hidden;
    }

    .product-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .product-card:hover .product-image {
        transform: scale(1.05);
    }

    .category-scroll {
        display: flex;
        gap: 1rem;
        overflow-x: auto;
        padding-bottom: 1rem;
    }
    
    .category-scroll::-webkit-scrollbar {
        height: 4px;
    }
    .category-scroll::-webkit-scrollbar-thumb {
        background: #e2e8f0;
        border-radius: 10px;
    }
</style>

<!-- Hero Section -->
<section class="hero-section py-5">
    <div class="container py-lg-5">
        <div class="row align-items-center flex-lg-row-reverse">
            <!-- Hero Image -->
            <div class="col-lg-6 mb-5 mb-lg-0 text-center">
                <div class="position-relative d-inline-block">
                    <!-- Blob Shape -->
                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="position-absolute top-50 start-50 translate-middle" style="width: 120%; height: 120%; z-index: -1; opacity: 0.1; fill: #2563eb;">
                        <path fill="#2563eb" d="M47.7,-61.4C60.9,-51.1,69.9,-33.4,72.3,-15.1C74.7,3.2,70.5,22.1,59.2,36.4C47.9,50.7,29.4,60.4,9.6,65.3C-10.2,70.2,-31.3,70.3,-48.5,59.8C-65.7,49.3,-79,28.2,-80.6,6.3C-82.2,-15.6,-72.1,-38.3,-56.9,-54.6C-41.7,-70.9,-21.4,-80.7,-2.1,-78.2C17.2,-75.7,34.5,-71.7,47.7,-61.4Z" transform="translate(100 100)" />
                    </svg>
                    <img src="https://assets.stickpng.com/images/5cb0633d80f2cf25bd4a24d2.png" alt="Hero Device" class="img-fluid" style="max-height: 400px; filter: drop-shadow(0 20px 30px rgba(0,0,0,0.15));">
                </div>
            </div>

            <!-- Hero Text -->
            <div class="col-lg-6">
                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-bold mb-3">
                    🚀 New Arrivals 2026
                </span>
                <h1 class="display-3 fw-bold mb-4" style="letter-spacing: -1px; line-height: 1.1;">
                    Next Generation <br>
                    <span class="text-gradient">Technology.</span>
                </h1>
                <p class="lead text-secondary mb-5 pe-lg-5">
                    Experience the future with our curated collection of premium smartphones and high-performance laptops. 
                    Official warranty included.
                </p>
                <div class="d-flex gap-3">
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg rounded-pill px-5 shadow-sm">
                        Shop Now <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                    <a href="#featured" class="btn btn-outline-secondary btn-lg rounded-pill px-4 border-0 bg-white shadow-sm">
                        Explore
                    </a>
                </div>
                
                <!-- Trust Indicators -->
                <div class="mt-5 d-flex gap-4 opacity-75">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-shield-check fs-4 text-success"></i>
                        <span class="small fw-semibold">100% Authentic</span>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-star-fill fs-4 text-warning"></i>
                        <span class="small fw-semibold">4.9/5 Reviews</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Floating Features (Overlap) -->
<section class="position-relative" style="margin-top: -60px; z-index: 10;">
    <div class="container">
        <div class="feature-card p-4 p-lg-5 bg-white">
            <div class="row g-4 justify-content-center text-center">
                 <div class="col-6 col-md-3 border-end-md">
                    <div class="mb-3 d-inline-flex bg-primary bg-opacity-10 rounded-circle p-3 text-primary">
                        <i class="bi bi-truck fs-4"></i>
                    </div>
                    <h6 class="fw-bold mb-1">Free Shipping</h6>
                    <small class="text-muted">On all orders > Rp 1jt</small>
                </div>
                <div class="col-6 col-md-3 border-end-md">
                    <div class="mb-3 d-inline-flex bg-success bg-opacity-10 rounded-circle p-3 text-success">
                        <i class="bi bi-shield-check fs-4"></i>
                    </div>
                    <h6 class="fw-bold mb-1">Official Warranty</h6>
                    <small class="text-muted">1 Year Protection</small>
                </div>
                <div class="col-6 col-md-3 border-end-md">
                    <div class="mb-3 d-inline-flex bg-warning bg-opacity-10 rounded-circle p-3 text-warning">
                        <i class="bi bi-credit-card-2-front fs-4"></i>
                    </div>
                    <h6 class="fw-bold mb-1">Secure Payment</h6>
                    <small class="text-muted">Encrypted Transactions</small>
                </div>
                <div class="col-6 col-md-3">
                    <div class="mb-3 d-inline-flex bg-info bg-opacity-10 rounded-circle p-3 text-info">
                        <i class="bi bi-headset fs-4"></i>
                    </div>
                    <h6 class="fw-bold mb-1">24/7 Support</h6>
                    <small class="text-muted">Dedicated Team</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section id="featured" class="py-5 bg-light position-relative">
    <div class="container py-lg-4">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h6 class="text-primary fw-bold text-uppercase letter-spacing-2 mb-2">Selected for You</h6>
                <h2 class="fw-bold mb-0">Trending Products</h2>
            </div>
            <a href="{{ route('products.index') }}" class="btn btn-link text-decoration-none text-dark fw-semibold">
                View All <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        @if($products->isEmpty())
            <div class="text-center py-5">
                <p class="text-muted">No products available yet.</p>
            </div>
        @else
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                @foreach($products->take(4) as $product)
                    <div class="col">
                        <div class="product-card h-100 d-flex flex-column">
                            <div class="product-image-container">
                                <span class="position-absolute top-0 start-0 m-3 bg-white bg-opacity-90 backdrop-blur px-2 py-1 rounded-pill small fw-bold shadow-sm" style="z-index: 2; font-size: 0.7rem;">
                                    {{ $product->category }}
                                </span>
                                <a href="{{ route('products.show', $product->slug) }}">
                                    @if($product->image)
                                        <img src="{{ Str::startsWith($product->image, 'http') ? $product->image : asset('storage/' . $product->image) }}" class="product-image" alt="{{ $product->name }}">
                                    @else
                                        <div class="product-image d-flex align-items-center justify-content-center bg-light text-muted">
                                            <i class="bi bi-image fs-1"></i>
                                        </div>
                                    @endif
                                </a>
                            </div>

                            <div class="p-4 d-flex flex-column flex-grow-1">
                                <h6 class="fw-bold text-dark mb-1 text-truncate" title="{{ $product->name }}">
                                    <a href="{{ route('products.show', $product->slug) }}" class="text-decoration-none text-dark">
                                        {{ $product->name }}
                                    </a>
                                </h6>
                                <div class="mt-auto pt-3 d-flex justify-content-between align-items-center">
                                    <span class="text-primary fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-primary rounded-circle" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;"
                                            {{ $product->stock < 1 ? 'disabled' : '' }}>
                                            <i class="bi bi-plus-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

<!-- Shop By Category -->
<section class="py-5 bg-white">
    <div class="container py-lg-4">
        <div class="row g-4 align-items-center">
            <div class="col-lg-4">
                <h2 class="fw-bold mb-3">Shop by Category</h2>
                <p class="text-muted mb-4">Find exactly what you need by browsing our curated categories.</p>
                <div class="d-flex gap-2">
                    <a href="{{ route('products.index') }}" class="btn btn-outline-dark rounded-pill px-4">All Products</a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row g-3">
                    <div class="col-md-6">
                        <a href="{{ route('products.index', ['category' => 'HP']) }}" class="card border-0 bg-light h-100 text-decoration-none overflow-hidden transition-hover">
                            <div class="card-body p-4 d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="fw-bold text-dark mb-1">Smartphones</h5>
                                    <small class="text-muted">Flagship & Mid-range</small>
                                </div>
                                <div class="bg-white rounded-circle p-3 shadow-sm text-primary">
                                    <i class="bi bi-phone fs-3"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('products.index', ['category' => 'Laptop']) }}" class="card border-0 bg-light h-100 text-decoration-none overflow-hidden transition-hover">
                            <div class="card-body p-4 d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="fw-bold text-dark mb-1">Laptops</h5>
                                    <small class="text-muted">Gaming & Office</small>
                                </div>
                                <div class="bg-white rounded-circle p-3 shadow-sm text-primary">
                                    <i class="bi bi-laptop fs-3"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
