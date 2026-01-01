@extends('layouts.app')

@section('title', 'Confirm Password')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-lg-5">
                        <div class="text-center mb-4">
                            <div class="bg-danger bg-opacity-10 rounded-circle d-inline-flex p-4 mb-3">
                                <i class="bi bi-shield-exclamation text-danger" style="font-size: 3rem;"></i>
                            </div>
                            <h3 class="fw-bold">Confirm Password</h3>
                            <p class="text-muted">
                                This is a secure area of the application. Please confirm your password before continuing.
                            </p>
                        </div>

                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-lock"></i></span>
                                    <input type="password" 
                                           class="form-control @error('password') is-invalid @enderror" 
                                           id="password" 
                                           name="password" 
                                           required
                                           autocomplete="current-password"
                                           placeholder="Enter your password">
                                </div>
                                @error('password')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                <i class="bi bi-check-lg me-2"></i>Confirm
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
