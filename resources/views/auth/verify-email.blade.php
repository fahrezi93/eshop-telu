@extends('layouts.app')

@section('title', 'Verify Email')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-lg-5">
                        <div class="text-center mb-4">
                            <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex p-4 mb-3">
                                <i class="bi bi-envelope-check text-info" style="font-size: 3rem;"></i>
                            </div>
                            <h3 class="fw-bold">Verify Your Email</h3>
                            <p class="text-muted">
                                Thanks for signing up! Before getting started, please verify your email address 
                                by clicking on the link we just emailed to you.
                            </p>
                        </div>

                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success mb-4">
                                <i class="bi bi-check-circle me-2"></i>
                                A new verification link has been sent to your email address.
                            </div>
                        @endif

                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-arrow-repeat me-2"></i>Resend Verification Email
                                </button>
                            </form>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-secondary">
                                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
