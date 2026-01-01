@extends('layouts.app')

@section('title', 'My Orders')

@section('content')
    <div class="container py-4">
        <h2 class="fw-bold mb-4">
            <i class="bi bi-bag me-2"></i>My Orders
        </h2>

        @if($orders->isEmpty())
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <i class="bi bi-bag-x text-muted" style="font-size: 5rem;"></i>
                    <h4 class="mt-3 text-muted">No orders yet</h4>
                    <p class="text-muted mb-4">You haven't placed any orders yet. Start shopping now!</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">
                        <i class="bi bi-grid me-2"></i>Browse Products
                    </a>
                </div>
            </div>
        @else
            <div class="card border-0 shadow-sm">
                <div class="card-body p-0">
                    <!-- Desktop View (Table) -->
                    <div class="table-responsive d-none d-md-block">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Order Number</th>
                                    <th>Date</th>
                                    <th class="text-center">Items</th>
                                    <th class="text-end">Total</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>
                                            <a href="{{ route('orders.show', $order->order_number) }}" class="text-decoration-none fw-semibold">
                                                {{ $order->order_number }}
                                            </a>
                                        </td>
                                        <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-secondary">{{ $order->orderItems->count() }}</span>
                                        </td>
                                        <td class="text-end fw-semibold">
                                            Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                        </td>
                                        <td class="text-center">
                                            @switch($order->payment_status)
                                                @case('1')
                                                    <span class="badge bg-warning text-dark">
                                                        <i class="bi bi-clock me-1"></i>Unpaid
                                                    </span>
                                                    @break
                                                @case('2')
                                                    <span class="badge bg-success">
                                                        <i class="bi bi-check-circle me-1"></i>Paid
                                                    </span>
                                                    @break
                                                @case('3')
                                                    <span class="badge bg-secondary">
                                                        <i class="bi bi-x-circle me-1"></i>Expired
                                                    </span>
                                                    @break
                                                @case('4')
                                                    <span class="badge bg-danger">
                                                        <i class="bi bi-x-circle me-1"></i>Cancelled
                                                    </span>
                                                    @break
                                                @default
                                                    <span class="badge bg-secondary">Unknown</span>
                                            @endswitch
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('orders.show', $order->order_number) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-eye"></i> View
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Mobile View (Cards) -->
                    <div class="d-md-none bg-light p-3">
                        @foreach($orders as $order)
                            <div class="card border-0 shadow-sm mb-3 rounded-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <div>
                                            <a href="{{ route('orders.show', $order->order_number) }}" class="fw-bold text-decoration-none text-dark">
                                                {{ $order->order_number }}
                                            </a>
                                            <div class="small text-muted mt-1">
                                                <i class="bi bi-calendar3 me-1"></i>{{ $order->created_at->format('d M Y, H:i') }}
                                            </div>
                                        </div>
                                        @switch($order->payment_status)
                                            @case('1')
                                                <span class="badge bg-warning text-dark">Unpaid</span>
                                                @break
                                            @case('2')
                                                <span class="badge bg-success">Paid</span>
                                                @break
                                            @case('3')
                                                <span class="badge bg-secondary">Expired</span>
                                                @break
                                            @case('4')
                                                <span class="badge bg-danger">Cancelled</span>
                                                @break
                                        @endswitch
                                    </div>

                                    <hr class="my-2 border-light">

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="text-muted small">Items</span>
                                            <span class="fw-semibold ms-1">{{ $order->orderItems->count() }}</span>
                                        </div>
                                        <div class="text-end">
                                            <span class="d-block text-muted small" style="font-size: 0.75rem;">Total Payment</span>
                                            <span class="fw-bold text-primary fs-5">
                                                Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="d-grid mt-3">
                                        <a href="{{ route('orders.show', $order->order_number) }}" class="btn btn-outline-primary btn-sm">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            @if($orders->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $orders->links() }}
                </div>
            @endif
        @endif
    </div>
@endsection
