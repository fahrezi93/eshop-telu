@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-lg-5">
                        <div class="text-center mb-4">
                            <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-4 mb-3">
                                <i class="bi bi-person-plus text-success" style="font-size: 3rem;"></i>
                            </div>
                            <h3 class="fw-bold">Create Account</h3>
                            <p class="text-muted">Join E-Shop Telu and start shopping</p>
                        </div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">Full Name</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-person"></i></span>
                                    <input type="text" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name') }}" 
                                           required 
                                           autofocus
                                           autocomplete="name"
                                           placeholder="Your full name">
                                </div>
                                @error('name')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                                    <input type="email" 
                                           class="form-control @error('email') is-invalid @enderror" 
                                           id="email" 
                                           name="email" 
                                           value="{{ old('email') }}" 
                                           required
                                           autocomplete="username"
                                           placeholder="your@email.com">
                                </div>
                                @error('email')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="mb-3">
                                <label for="phone" class="form-label fw-semibold">Phone Number <span class="text-muted fw-normal">(optional)</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-phone"></i></span>
                                    <input type="tel" 
                                           class="form-control @error('phone') is-invalid @enderror" 
                                           id="phone" 
                                           name="phone" 
                                           value="{{ old('phone') }}"
                                           placeholder="+62 xxx xxxx xxxx">
                                </div>
                                @error('phone')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div class="mb-3">
                                <label for="address" class="form-label fw-semibold">Shipping Address <span class="text-muted fw-normal">(optional)</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-geo-alt"></i></span>
                                    <textarea class="form-control @error('address') is-invalid @enderror" 
                                              id="address" 
                                              name="address" 
                                              rows="2"
                                              placeholder="Your complete shipping address">{{ old('address') }}</textarea>
                                </div>
                                @error('address')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-lock"></i></span>
                                    <input type="password" 
                                           class="form-control @error('password') is-invalid @enderror" 
                                           id="password" 
                                           name="password" 
                                           required
                                           autocomplete="new-password"
                                           placeholder="Min. 8 characters">
                                </div>
                                @error('password')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-lock-fill"></i></span>
                                    <input type="password" 
                                           class="form-control" 
                                           id="password_confirmation" 
                                           name="password_confirmation" 
                                           required
                                           autocomplete="new-password"
                                           placeholder="Confirm your password">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success btn-lg w-100 mb-3">
                                <i class="bi bi-person-plus me-2"></i>Create Account
                            </button>
                        </form>

                        <hr class="my-4">

                        <div class="text-center">
                            <p class="mb-0 text-muted">
                                Already have an account? 
                                <a href="{{ route('login') }}" class="text-decoration-none fw-semibold text-primary">
                                    Login Here
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Benefits -->
                <div class="row g-3 mt-4">
                    <div class="col-4 text-center">
                        <i class="bi bi-truck text-primary fs-3"></i>
                        <p class="small text-muted mb-0 mt-1">Free Shipping</p>
                    </div>
                    <div class="col-4 text-center">
                        <i class="bi bi-shield-check text-success fs-3"></i>
                        <p class="small text-muted mb-0 mt-1">Secure Payment</p>
                    </div>
                    <div class="col-4 text-center">
                        <i class="bi bi-headset text-info fs-3"></i>
                        <p class="small text-muted mb-0 mt-1">24/7 Support</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
