@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <!-- Hero Section -->
    <section class="py-5" style="background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);">
        <div class="container text-center text-white py-4">
            <h1 class="display-5 fw-bold mb-3">About E-Shop Telu</h1>
            <p class="lead mb-0 opacity-90">Your Trusted Partner for Quality Electronics</p>
        </div>
    </section>

    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4">Our Story</h2>
                <p class="text-muted">
                    E-Shop Telu was founded with a simple mission: to provide customers with the best quality 
                    electronics at competitive prices. We specialize in smartphones and laptops, offering only 
                    genuine products from trusted brands.
                </p>
                <p class="text-muted">
                    Our team of experts carefully curates each product in our catalog, ensuring that you get 
                    the latest technology with the best value for your money. We believe that everyone deserves 
                    access to quality electronics without compromising their budget.
                </p>
                <p class="text-muted mb-0">
                    Since our establishment, we have served thousands of satisfied customers across Indonesia, 
                    building a reputation for reliability, quality, and excellent customer service.
                </p>
            </div>
            <div class="col-lg-6">
                <div class="bg-light rounded-3 p-4 h-100 d-flex align-items-center justify-content-center">
                    <div class="text-center">
                        <i class="bi bi-shop text-primary" style="font-size: 8rem;"></i>
                        <h4 class="mt-3 text-primary">E-Shop Telu</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Values Section -->
        <div class="row g-4 mt-5">
            <div class="col-12 text-center mb-4">
                <h2 class="fw-bold">Our Values</h2>
                <p class="text-muted">What drives us every day</p>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="bi bi-shield-check text-primary fs-2"></i>
                        </div>
                        <h5 class="fw-bold">Quality Guaranteed</h5>
                        <p class="text-muted mb-0">
                            We only sell authentic products with official warranty. Your satisfaction is our priority.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="bi bi-truck text-success fs-2"></i>
                        </div>
                        <h5 class="fw-bold">Fast Delivery</h5>
                        <p class="text-muted mb-0">
                            Quick and reliable shipping across Indonesia. Track your order in real-time.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="bi bi-headset text-warning fs-2"></i>
                        </div>
                        <h5 class="fw-bold">24/7 Support</h5>
                        <p class="text-muted mb-0">
                            Our dedicated support team is always ready to help with any questions or concerns.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="row g-4 mt-5 py-5 bg-light rounded-3">
            <div class="col-6 col-md-3 text-center">
                <h2 class="fw-bold text-primary">5000+</h2>
                <p class="text-muted mb-0">Happy Customers</p>
            </div>
            <div class="col-6 col-md-3 text-center">
                <h2 class="fw-bold text-primary">500+</h2>
                <p class="text-muted mb-0">Products</p>
            </div>
            <div class="col-6 col-md-3 text-center">
                <h2 class="fw-bold text-primary">99%</h2>
                <p class="text-muted mb-0">Satisfaction Rate</p>
            </div>
            <div class="col-6 col-md-3 text-center">
                <h2 class="fw-bold text-primary">24/7</h2>
                <p class="text-muted mb-0">Customer Support</p>
            </div>
        </div>
    </div>
@endsection
