@extends('layouts.app')

@section('title', 'Order ' . $order->order_number)

@section('content')
    <div class="container py-4">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">My Orders</a></li>
                <li class="breadcrumb-item active">{{ $order->order_number }}</li>
            </ol>
        </nav>

        <div class="row g-4">
            <!-- Order Details -->
            <div class="col-lg-8">
                <!-- Order Header -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                            <div>
                                <h4 class="fw-bold mb-1">Order {{ $order->order_number }}</h4>
                                <p class="text-muted mb-0">
                                    <i class="bi bi-calendar me-1"></i>
                                    Placed on {{ $order->created_at->format('d M Y, H:i') }}
                                </p>
                            </div>
                            <div>
                                @switch($order->payment_status)
                                    @case('1')
                                        <span class="badge bg-warning text-dark fs-6 px-3 py-2">
                                            <i class="bi bi-clock me-1"></i>Awaiting Payment
                                        </span>
                                        @break
                                    @case('2')
                                        <span class="badge bg-success fs-6 px-3 py-2">
                                            <i class="bi bi-check-circle me-1"></i>Payment Successful
                                        </span>
                                        @break
                                    @case('3')
                                        <span class="badge bg-secondary fs-6 px-3 py-2">
                                            <i class="bi bi-x-circle me-1"></i>Expired
                                        </span>
                                        @break
                                    @case('4')
                                        <span class="badge bg-danger fs-6 px-3 py-2">
                                            <i class="bi bi-x-circle me-1"></i>Cancelled
                                        </span>
                                        @break
                                @endswitch
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Items -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0"><i class="bi bi-bag me-2"></i>Order Items</h5>
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
                                                    @if($item->product && $item->product->image)
                                                        <img src="{{ asset('storage/' . $item->product->image) }}" 
                                                             alt="{{ $item->product->name ?? 'Product' }}" 
                                                             class="rounded me-3" 
                                                             style="width: 60px; height: 60px; object-fit: cover;">
                                                    @else
                                                        <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center" 
                                                             style="width: 60px; height: 60px;">
                                                            <i class="bi bi-image text-muted"></i>
                                                        </div>
                                                    @endif
                                                    <div>
                                                        @if($item->product)
                                                            <a href="{{ route('products.show', $item->product->slug) }}" class="text-decoration-none text-dark fw-semibold">
                                                                {{ $item->product->name }}
                                                            </a>
                                                        @else
                                                            <span class="text-muted">Product unavailable</span>
                                                        @endif
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
            </div>

            <!-- Order Summary Sidebar -->
            <div class="col-lg-4">
                <!-- Payment Action (if unpaid) -->
                @if($order->payment_status === '1' && $order->snap_token)
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-warning py-3">
                            <h5 class="mb-0"><i class="bi bi-credit-card me-2"></i>Complete Payment</h5>
                        </div>
                        <div class="card-body text-center">
                            <p class="text-muted mb-3">Your order is awaiting payment.</p>
                            <button type="button" id="pay-button" class="btn btn-success btn-lg w-100">
                                <i class="bi bi-credit-card me-2"></i>Pay Now
                            </button>
                        </div>
                    </div>
                @endif

                <!-- Customer Details -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0"><i class="bi bi-person me-2"></i>Shipping Details</h5>
                    </div>
                    <div class="card-body">
                        <p class="mb-1"><strong>{{ $order->user->name }}</strong></p>
                        <p class="text-muted mb-1">{{ $order->user->email }}</p>
                        <p class="text-muted mb-1">{{ $order->user->phone ?: 'No phone' }}</p>
                        <hr>
                        <p class="mb-0 text-muted">
                            <i class="bi bi-geo-alt me-1"></i>
                            {{ $order->user->address ?: 'No address provided' }}
                        </p>
                    </div>
                </div>

                <!-- Back Button -->
                <div class="mt-3">
                    <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary w-100">
                        <i class="bi bi-arrow-left me-2"></i>Back to My Orders
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@if($order->payment_status === '1' && $order->snap_token)
    @push('scripts')
    <!-- Midtrans Snap.js -->
    <script src="{{ config('midtrans.snap_url') }}" data-client-key="{{ config('midtrans.client_key') }}"></script>

    <script type="text/javascript">
        document.getElementById('pay-button').addEventListener('click', function() {
            this.disabled = true;
            this.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Processing...';
            
            snap.pay('{{ $order->snap_token }}', {
                onSuccess: function(result) {
                    console.log('Payment success:', result);
                    alert('Payment successful! Thank you for your order.');
                    window.location.reload();
                },
                onPending: function(result) {
                    console.log('Payment pending:', result);
                    alert('Payment is pending. Please complete your payment.');
                    window.location.reload();
                },
                onError: function(result) {
                    console.error('Payment error:', result);
                    alert('Payment failed. Please try again.');
                    var btn = document.getElementById('pay-button');
                    btn.disabled = false;
                    btn.innerHTML = '<i class="bi bi-credit-card me-2"></i>Pay Now';
                },
                onClose: function() {
                    console.log('Customer closed the popup');
                    var btn = document.getElementById('pay-button');
                    btn.disabled = false;
                    btn.innerHTML = '<i class="bi bi-credit-card me-2"></i>Pay Now';
                }
            });
        });
    </script>
    @endpush
@endif
