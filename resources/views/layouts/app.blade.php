<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'E-Shop Telu') - {{ config('app.name', 'E-Shop Telu') }}</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --accent-color: #3b82f6;
            --text-dark: #1f2937;
            --text-muted: #6b7280;
            --bg-light: #f8fafc;
        }
        
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }
        
        .nav-link {
            font-weight: 500;
            transition: opacity 0.2s;
        }
        
        .nav-link:hover {
            opacity: 0.8;
        }
        
        .cart-badge {
            position: absolute;
            top: -5px;
            right: -10px;
            font-size: 0.7rem;
            padding: 0.25rem 0.45rem;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.4);
            background: linear-gradient(135deg, var(--accent-color) 0%, var(--primary-color) 100%);
        }
        
        .card {
            border: none;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        
        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }
        
        .product-card img {
            height: 200px;
            object-fit: cover;
            border-radius: 0.5rem 0.5rem 0 0;
        }
        
        main {
            flex: 1;
        }
        
        footer {
            background: var(--text-dark);
            color: #fff;
            padding: 2rem 0;
            margin-top: auto;
        }
        
        footer a {
            color: #9ca3af;
            text-decoration: none;
            transition: color 0.2s;
        }
        
        footer a:hover {
            color: #fff;
        }
        
        .alert-floating {
            position: fixed;
            top: 80px;
            right: 20px;
            z-index: 1050;
            min-width: 300px;
            animation: slideIn 0.3s ease-out;
        }
        
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .price-tag {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 1.25rem;
        }

        .category-badge {
            font-size: 0.75rem;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
                <i class="bi bi-shop fs-4"></i> 
                <span>E-Shop Telu</span>
            </a>
            
            <button class="navbar-toggler border-0 focus-ring focus-ring-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse mt-3 mt-lg-0" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-lg-3 me-lg-4">
                    <li class="nav-item">
                        <a class="nav-link px-0 px-lg-2 {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-0 px-lg-2 {{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.index') }}">
                            Catalog
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-0 px-lg-2 {{ request()->routeIs('pages.about') ? 'active' : '' }}" href="{{ route('pages.about') }}">
                            About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-0 px-lg-2 {{ request()->routeIs('pages.contact') ? 'active' : '' }}" href="{{ route('pages.contact') }}">
                            Contact Us
                        </a>
                    </li>
                </ul>
                
                <ul class="navbar-nav align-items-lg-center gap-2 gap-lg-0">
                    <!-- Cart -->
                    <li class="nav-item me-lg-2">
                        <a class="nav-link position-relative d-inline-flex align-items-center gap-2 px-0 px-lg-2" href="{{ route('cart.show') }}">
                            <div class="position-relative">
                                <i class="bi bi-cart3 fs-5"></i>
                                @php
                                    $cartCount = count(session('cart', []));
                                @endphp
                                @if($cartCount > 0)
                                    <span class="badge bg-danger rounded-pill cart-badge">{{ $cartCount }}</span>
                                @endif
                            </div>
                            <span class="d-lg-none">Shopping Cart</span>
                        </a>
                    </li>
                    
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2 px-0 px-lg-2" href="#" data-bs-toggle="dropdown">
                                <div class="bg-white bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm mt-2">
                                <li><a class="dropdown-item py-2" href="{{ route('orders.index') }}"><i class="bi bi-bag me-2 text-primary"></i> My Orders</a></li>
                                <li><a class="dropdown-item py-2" href="{{ route('profile.edit') }}"><i class="bi bi-gear me-2 text-secondary"></i> Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item py-2 text-danger"><i class="bi bi-box-arrow-right me-2"></i> Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item mt-2 mt-lg-0 ms-lg-2">
                            <div class="d-flex align-items-center gap-2">
                                <a class="btn btn-outline-light rounded-pill px-4 btn-sm fw-medium" href="{{ route('login') }}">
                                    Login
                                </a>
                                <a class="btn btn-light text-primary rounded-pill px-4 btn-sm fw-bold shadow-sm" href="{{ route('register') }}">
                                    Register
                                </a>
                            </div>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show alert-floating" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show alert-floating" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('warning'))
        <div class="alert alert-warning alert-dismissible fade show alert-floating" role="alert">
            <i class="bi bi-exclamation-circle-fill me-2"></i>{{ session('warning') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('info'))
        <div class="alert alert-info alert-dismissible fade show alert-floating" role="alert">
            <i class="bi bi-info-circle-fill me-2"></i>{{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3 mb-md-0">
                    <h5><i class="bi bi-shop"></i> E-Shop Telu</h5>
                    <p class="text-muted mb-0">Your trusted electronics store for quality HP & Laptops.</p>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <h6>Quick Links</h6>
                    <ul class="list-unstyled mb-0">
                        <li><a href="{{ route('pages.about') }}">About Us</a></li>
                        <li><a href="{{ route('pages.contact') }}">Contact</a></li>
                        <li><a href="{{ route('pages.policy') }}">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6>Connect With Us</h6>
                    <div class="d-flex gap-3">
                        <a href="#"><i class="bi bi-facebook fs-5"></i></a>
                        <a href="#"><i class="bi bi-instagram fs-5"></i></a>
                        <a href="#"><i class="bi bi-twitter-x fs-5"></i></a>
                        <a href="#"><i class="bi bi-whatsapp fs-5"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4" style="border-color: #374151;">
            <div class="text-center text-muted">
                <small>&copy; {{ date('Y') }} E-Shop Telu. All rights reserved.</small>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Auto-dismiss alerts -->
    <script>
        setTimeout(function() {
            document.querySelectorAll('.alert-floating').forEach(function(alert) {
                alert.classList.remove('show');
                setTimeout(function() {
                    alert.remove();
                }, 150);
            });
        }, 5000);
    </script>
    
    @stack('scripts')
</body>
</html>
