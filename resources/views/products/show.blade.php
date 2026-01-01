@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="container py-4">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Catalog</a></li>
                <li class="breadcrumb-item">
                    <a href="{{ route('products.index', ['category' => $product->category]) }}">
                        {{ $product->category === 'HP' ? 'Smartphones' : 'Laptops' }}
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($product->name, 30) }}</li>
            </ol>
        </nav>

        <div class="row g-4">
            <!-- Product Image -->
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             class="card-img-top rounded" 
                             alt="{{ $product->name }}"
                             style="max-height: 450px; object-fit: contain; background: #f8f9fa;">
                    @else
                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center rounded" style="height: 450px;">
                            <div class="text-center text-muted">
                                <i class="bi bi-image" style="font-size: 5rem;"></i>
                                <p class="mt-2">No image available</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Product Details -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <!-- Category Badge -->
                        <span class="badge {{ $product->category === 'HP' ? 'bg-info' : 'bg-secondary' }} mb-3">
                            <i class="bi {{ $product->category === 'HP' ? 'bi-phone' : 'bi-laptop' }}"></i> 
                            {{ $product->category === 'HP' ? 'Smartphone' : 'Laptop' }}
                        </span>

                        <!-- Product Name -->
                        <h1 class="h2 fw-bold mb-3">{{ $product->name }}</h1>

                        <!-- Price -->
                        <div class="mb-4">
                            <span class="text-primary fw-bold" style="font-size: 2rem;">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </span>
                        </div>

                        <!-- Stock Status -->
                        <div class="mb-4">
                            @if($product->stock > 0)
                                <span class="badge bg-success-subtle text-success fs-6 px-3 py-2">
                                    <i class="bi bi-check-circle-fill me-1"></i> In Stock ({{ $product->stock }} units available)
                                </span>
                            @else
                                <span class="badge bg-danger-subtle text-danger fs-6 px-3 py-2">
                                    <i class="bi bi-x-circle-fill me-1"></i> Out of Stock
                                </span>
                            @endif
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <h5 class="fw-semibold mb-2">Description</h5>
                            <p class="text-muted">{{ $product->description ?: 'No description available for this product.' }}</p>
                        </div>

                        <!-- Add to Cart Form -->
                        @if($product->stock > 0)
                            <form action="{{ route('cart.add', $product) }}" method="POST" class="mb-4">
                                @csrf
                                <div class="row g-3 align-items-end">
                                    <div class="col-auto">
                                        <label for="quantity" class="form-label fw-semibold">Quantity</label>
                                        <div class="input-group" style="width: 130px;">
                                            <button type="button" class="btn btn-outline-secondary" onclick="decrementQty()">
                                                <i class="bi bi-dash"></i>
                                            </button>
                                            <input type="number" 
                                                   name="quantity" 
                                                   id="quantity" 
                                                   class="form-control text-center" 
                                                   value="1" 
                                                   min="1" 
                                                   max="{{ $product->stock }}">
                                            <button type="button" class="btn btn-outline-secondary" onclick="incrementQty()">
                                                <i class="bi bi-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary btn-lg w-100">
                                            <i class="bi bi-cart-plus me-2"></i> Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <div class="alert alert-warning">
                                <i class="bi bi-exclamation-triangle me-2"></i>
                                This product is currently out of stock. Please check back later.
                            </div>
                        @endif

                        <!-- Product Features -->
                        <div class="border-top pt-4">
                            <div class="row g-3">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-truck text-primary fs-4 me-2"></i>
                                        <div>
                                            <small class="text-muted d-block">Free Delivery</small>
                                            <span class="fw-semibold small">Orders over Rp 1jt</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-shield-check text-success fs-4 me-2"></i>
                                        <div>
                                            <small class="text-muted d-block">Warranty</small>
                                            <span class="fw-semibold small">Official Guarantee</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-arrow-repeat text-warning fs-4 me-2"></i>
                                        <div>
                                            <small class="text-muted d-block">Returns</small>
                                            <span class="fw-semibold small">7 Days Return</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-credit-card text-info fs-4 me-2"></i>
                                        <div>
                                            <small class="text-muted d-block">Payment</small>
                                            <span class="fw-semibold small">Secure Checkout</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back to Catalog -->
        <div class="mt-4">
            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i> Back to Catalog
            </a>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function incrementQty() {
        const input = document.getElementById('quantity');
        const max = parseInt(input.max);
        let value = parseInt(input.value);
        if (value < max) {
            input.value = value + 1;
        }
    }
    
    function decrementQty() {
        const input = document.getElementById('quantity');
        let value = parseInt(input.value);
        if (value > 1) {
            input.value = value - 1;
        }
    }
</script>
@endpush
