@extends('layouts.app')

@section('title', 'Catalog')

@section('content')
<style>
    /* Custom Scrollbar for Sidebar */
    .sidebar-sticky {
        position: sticky;
        top: 6rem;
    }

    /* Product Card Styling */
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
        overflow: hidden;
        padding-top: 100%; /* 1:1 Aspect Ratio */
        background-color: #f8fafc;
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

    .category-tag {
        position: absolute;
        top: 12px;
        left: 12px;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(4px);
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        color: #1f2937;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .action-btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
    }

    .action-btn:hover {
        background-color: var(--primary-color);
        color: white !important;
    }

    /* Filter Sidebar Styling */
    .filter-group-title {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #9ca3af;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .filter-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.6rem 1rem;
        margin-bottom: 0.25rem;
        border-radius: 8px;
        color: #4b5563;
        text-decoration: none;
        transition: all 0.2s;
        font-weight: 500;
    }

    .filter-link:hover, .filter-link.active {
        background-color: #eff6ff;
        color: var(--primary-color);
    }
    
    .filter-link.active {
        font-weight: 600;
    }

    .search-input {
        background-color: #f3f4f6;
        border: 1px solid transparent;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        transition: all 0.2s;
    }

    .search-input:focus {
        background-color: #fff;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }
</style>

<div class="bg-light min-vh-100 py-5">
    <div class="container">
        <!-- Header & Search -->
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <h2 class="fw-bold text-dark mb-1">Our Catalog</h2>
                <p class="text-muted mb-0">Discover premium electronics curated for you.</p>
            </div>
            <div class="col-md-6 mt-3 mt-md-0">
                <form action="{{ route('products.index') }}" method="GET">
                    <div class="position-relative">
                        <input type="text" name="search" class="form-control search-input ps-5" 
                               placeholder="Search for products..." value="{{ request('search') }}">
                        <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                    </div>
                </form>
            </div>
        </div>

        <div class="row g-4">
            <!-- Sidebar Filters -->
            <div class="col-lg-3">
                <div class="sidebar-sticky">
                    <!-- Categories -->
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-body p-4">
                            <h6 class="filter-group-title">Categories</h6>
                            <div class="d-flex flex-column">
                                <a href="{{ route('products.index') }}" 
                                   class="filter-link {{ !request('category') ? 'active' : '' }}">
                                    <span>All Products</span>
                                    <span class="badge bg-light text-dark rounded-pill">{{ \App\Models\Product::count() }}</span>
                                </a>
                                <a href="{{ route('products.index', ['category' => 'HP']) }}" 
                                   class="filter-link {{ request('category') == 'HP' ? 'active' : '' }}">
                                    <span><i class="bi bi-phone me-2"></i>Smartphones</span>
                                    <span class="badge bg-light text-dark rounded-pill">{{ \App\Models\Product::where('category', 'HP')->count() }}</span>
                                </a>
                                <a href="{{ route('products.index', ['category' => 'Laptop']) }}" 
                                   class="filter-link {{ request('category') == 'Laptop' ? 'active' : '' }}">
                                    <span><i class="bi bi-laptop me-2"></i>Laptops</span>
                                    <span class="badge bg-light text-dark rounded-pill">{{ \App\Models\Product::where('category', 'Laptop')->count() }}</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Shop Info (Simplified) -->
                    <div class="card border-0 shadow-sm rounded-4 bg-primary text-white overflow-hidden position-relative">
                        <div class="card-body p-4 position-relative z-1">
                            <h5 class="fw-bold mb-3">Why Shop With Us?</h5>
                            <ul class="list-unstyled mb-0 d-flex flex-column gap-2 opacity-90">
                                <li><i class="bi bi-check-circle-fill me-2"></i> Official Warranty</li>
                                <li><i class="bi bi-truck me-2"></i> Free Shipping</li>
                                <li><i class="bi bi-shield-check me-2"></i> Secure Payment</li>
                            </ul>
                        </div>
                        <!-- Decorative Circle -->
                        <div class="position-absolute bottom-0 end-0 translate-middle-y rounded-circle bg-white bg-opacity-10 d-flex align-items-center justify-content-center" 
                             style="width: 100px; height: 100px; margin-right: -20px; margin-bottom: -20px;">
                            <i class="bi bi-bag-heart-fill text-white display-4 opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="col-lg-9">
                @if($products->isEmpty())
                    <div class="text-center py-5">
                        <img src="https://cdni.iconscout.com/illustration/premium/thumb/empty-state-2130362-1800926.png" 
                             alt="No products" style="max-width: 250px; opacity: 0.8;">
                        <h4 class="mt-4 fw-bold text-muted">No products found</h4>
                        <p class="text-muted">Try adjusting your search or category filter.</p>
                        <a href="{{ route('products.index') }}" class="btn btn-primary rounded-pill px-4 mt-2">Clear Filters</a>
                    </div>
                @else
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <p class="text-muted mb-0 small">Showing {{ $products->firstItem() }}-{{ $products->lastItem() }} of {{ $products->total() }} results</p>
                        
                        <!-- Optional Sort (Visual Only for now) -->
                        <!-- Sort Dropdown -->
                        <div class="dropdown">
                            <button class="btn btn-sm btn-white border shadow-sm dropdown-toggle rounded-pill px-3" type="button" data-bs-toggle="dropdown">
                                Sort by: 
                                @switch(request('sort'))
                                    @case('price_asc') Price: Low to High @break
                                    @case('price_desc') Price: High to Low @break
                                    @default Newest
                                @endswitch
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                                <li>
                                    <a class="dropdown-item {{ !request('sort') || request('sort') == 'newest' ? 'active' : '' }}" 
                                       href="{{ route('products.index', array_merge(request()->query(), ['sort' => 'newest'])) }}">
                                       Newest Arrival
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ request('sort') == 'price_asc' ? 'active' : '' }}" 
                                       href="{{ route('products.index', array_merge(request()->query(), ['sort' => 'price_asc'])) }}">
                                       Price: Low to High
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ request('sort') == 'price_desc' ? 'active' : '' }}" 
                                       href="{{ route('products.index', array_merge(request()->query(), ['sort' => 'price_desc'])) }}">
                                       Price: High to Low
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                        @foreach($products as $product)
                            <div class="col">
                                <div class="product-card h-100 d-flex flex-column">
                                    <!-- Image -->
                                    <div class="product-image-container">
                                        <span class="category-tag">{{ $product->category }}</span>
                                        @if($product->image)
                                            <img src="{{ Str::startsWith($product->image, 'http') ? $product->image : asset('storage/' . $product->image) }}" 
                                                 class="product-image" alt="{{ $product->name }}">
                                        @else
                                            <div class="product-image d-flex align-items-center justify-content-center bg-light text-muted">
                                                <i class="bi bi-image fs-1"></i>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Content -->
                                    <div class="p-4 d-flex flex-column flex-grow-1">
                                        <div class="mb-2">
                                            <h5 class="fw-bold text-dark mb-1 text-truncate" title="{{ $product->name }}">
                                                {{ $product->name }}
                                            </h5>
                                        </div>
                                        
                                        <p class="text-muted small flex-grow-1 mb-3 line-clamp-2">
                                            {{ Str::limit($product->description, 60) }}
                                        </p>

                                        <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top border-light">
                                            <div>
                                                <small class="text-muted d-block" style="font-size: 0.7rem;">Price</small>
                                                <span class="fw-bold text-primary fs-5">
                                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                                </span>
                                            </div>
                                            
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('products.show', $product->slug) }}" 
                                                   class="action-btn bg-light text-dark" 
                                                   title="View Details">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                
                                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" 
                                                            class="action-btn bg-primary text-white border-0 shadow-sm"
                                                            title="Add to Cart"
                                                            {{ $product->stock < 1 ? 'disabled' : '' }}>
                                                        <i class="bi bi-cart-plus"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        
                                        @if($product->stock < 5 && $product->stock > 0)
                                            <div class="mt-2 text-danger small fst-italic">
                                                <i class="bi bi-exclamation-circle me-1"></i> Only {{ $product->stock }} left!
                                            </div>
                                        @elseif($product->stock < 1)
                                            <div class="mt-2 text-muted small fst-italic">
                                                <i class="bi bi-x-circle me-1"></i> Out of Stock
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-5 d-flex justify-content-center">
                        {{ $products->withQueryString()->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
