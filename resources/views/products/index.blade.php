@extends('layouts.app')

@section('title', 'Catalog')

@section('content')
    <div class="container py-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3 mb-4">
                <!-- Search Form -->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <i class="bi bi-search"></i> Search Products
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.index') }}" method="GET">
                            <div class="input-group">
                                <input type="text" 
                                       name="search" 
                                       class="form-control" 
                                       placeholder="Search..." 
                                       value="{{ request('search') }}">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                            @if(request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                        </form>
                    </div>
                </div>

                <!-- Categories Filter -->
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <i class="bi bi-tag"></i> Categories
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="{{ route('products.index', request()->except('category')) }}" 
                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ !request('category') ? 'active' : '' }}">
                            <span><i class="bi bi-grid-3x3-gap"></i> All Products</span>
                            <span class="badge bg-secondary rounded-pill">{{ $totalProducts ?? 0 }}</span>
                        </a>
                        <a href="{{ route('products.index', array_merge(request()->except('category'), ['category' => 'HP'])) }}" 
                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ request('category') === 'HP' ? 'active' : '' }}">
                            <span><i class="bi bi-phone"></i> Smartphones (HP)</span>
                        </a>
                        <a href="{{ route('products.index', array_merge(request()->except('category'), ['category' => 'Laptop'])) }}" 
                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ request('category') === 'Laptop' ? 'active' : '' }}">
                            <span><i class="bi bi-laptop"></i> Laptops</span>
                        </a>
                    </div>
                </div>

                <!-- Price Range Info -->
                <div class="card mt-4">
                    <div class="card-header bg-secondary text-white">
                        <i class="bi bi-info-circle"></i> Shop Info
                    </div>
                    <div class="card-body">
                        <p class="mb-2"><i class="bi bi-truck text-primary"></i> Free shipping over Rp 1.000.000</p>
                        <p class="mb-2"><i class="bi bi-shield-check text-success"></i> Official warranty</p>
                        <p class="mb-0"><i class="bi bi-arrow-repeat text-warning"></i> Easy 7-day returns</p>
                    </div>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="col-lg-9">
                <!-- Page Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="fw-bold mb-1">
                            @if(request('category'))
                                {{ request('category') === 'HP' ? 'Smartphones' : 'Laptops' }}
                            @else
                                All Products
                            @endif
                        </h2>
                        <p class="text-muted mb-0">
                            @if(request('search'))
                                Search results for "{{ request('search') }}"
                            @else
                                Browse our collection of quality electronics
                            @endif
                        </p>
                    </div>
                    <div class="d-none d-md-block">
                        <span class="text-muted">{{ $products->total() }} products found</span>
                    </div>
                </div>

                <!-- Active Filters -->
                @if(request('search') || request('category'))
                    <div class="mb-3">
                        <span class="text-muted me-2">Active filters:</span>
                        @if(request('search'))
                            <a href="{{ route('products.index', request()->except('search')) }}" class="badge bg-primary text-decoration-none">
                                Search: {{ request('search') }} <i class="bi bi-x"></i>
                            </a>
                        @endif
                        @if(request('category'))
                            <a href="{{ route('products.index', request()->except('category')) }}" class="badge bg-info text-decoration-none">
                                Category: {{ request('category') }} <i class="bi bi-x"></i>
                            </a>
                        @endif
                        <a href="{{ route('products.index') }}" class="ms-2 text-danger small">Clear all</a>
                    </div>
                @endif

                @if($products->isEmpty())
                    <div class="text-center py-5">
                        <i class="bi bi-search text-muted" style="font-size: 4rem;"></i>
                        <h4 class="mt-3 text-muted">No products found</h4>
                        <p class="text-muted">Try adjusting your search or filter to find what you're looking for.</p>
                        <a href="{{ route('products.index') }}" class="btn btn-primary">View All Products</a>
                    </div>
                @else
                    <div class="row g-4">
                        @foreach($products as $product)
                            <div class="col-6 col-md-4">
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
                                            <a href="{{ route('products.show', $product->slug) }}" class="text-decoration-none text-dark">
                                                {{ Str::limit($product->name, 40) }}
                                            </a>
                                        </h6>
                                        <p class="text-muted small mb-2">{{ Str::limit($product->description, 60) }}</p>
                                        <div class="mt-auto">
                                            <div class="price-tag mb-2">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                                            @if($product->stock > 0)
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <small class="text-success"><i class="bi bi-check-circle"></i> In Stock ({{ $product->stock }})</small>
                                                    <form action="{{ route('cart.add', $product) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-outline-primary">
                                                            <i class="bi bi-cart-plus"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            @else
                                                <small class="text-danger"><i class="bi bi-x-circle"></i> Out of Stock</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    @if($products->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $products->withQueryString()->links() }}
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection
