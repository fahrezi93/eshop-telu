@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-lg-5">
                        <div class="text-center mb-4">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3 shadow-lg" 
                                 style="width: 80px; height: 80px; background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);">
                                <i class="bi bi-person-plus-fill text-white" style="font-size: 2.5rem;"></i>
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
                                <label for="phone" class="form-label fw-semibold">Nomor Telepon Aktif <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-phone"></i></span>
                                    <input type="tel" 
                                           class="form-control @error('phone') is-invalid @enderror" 
                                           id="phone" 
                                           name="phone" 
                                           value="{{ old('phone') }}"
                                           required
                                           placeholder="08xx xxxx xxxx">
                                </div>
                                @error('phone')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Address Section -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-geo-alt me-1"></i>Alamat Lengkap <span class="text-danger">*</span>
                                </label>
                                
                                <!-- Street Address -->
                                <div class="mb-2">
                                    <input type="text" 
                                           class="form-control @error('street_address') is-invalid @enderror" 
                                           id="street_address" 
                                           name="street_address" 
                                           value="{{ old('street_address') }}"
                                           required
                                           placeholder="Jalan & Nomor Rumah (contoh: Jl. Sudirman No. 123)">
                                    @error('street_address')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- RT/RW -->
                                <div class="mb-2">
                                    <input type="text" 
                                           class="form-control @error('rt_rw') is-invalid @enderror" 
                                           id="rt_rw" 
                                           name="rt_rw" 
                                           value="{{ old('rt_rw') }}"
                                           required
                                           placeholder="RT/RW (contoh: RT 01/RW 05)">
                                    @error('rt_rw')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row g-2 mb-2">
                                    <!-- Kelurahan -->
                                    <div class="col-6">
                                        <input type="text" 
                                               class="form-control @error('kelurahan') is-invalid @enderror" 
                                               id="kelurahan" 
                                               name="kelurahan" 
                                               value="{{ old('kelurahan') }}"
                                               required
                                               placeholder="Kelurahan/Desa">
                                        @error('kelurahan')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Kecamatan -->
                                    <div class="col-6">
                                        <input type="text" 
                                               class="form-control @error('kecamatan') is-invalid @enderror" 
                                               id="kecamatan" 
                                               name="kecamatan" 
                                               value="{{ old('kecamatan') }}"
                                               required
                                               placeholder="Kecamatan">
                                        @error('kecamatan')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row g-2 mb-2">
                                    <!-- City -->
                                    <div class="col-8">
                                        <input type="text" 
                                               class="form-control @error('city') is-invalid @enderror" 
                                               id="city" 
                                               name="city" 
                                               value="{{ old('city') }}"
                                               required
                                               placeholder="Kota/Kabupaten">
                                        @error('city')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Postal Code -->
                                    <div class="col-4">
                                        <input type="text" 
                                               class="form-control @error('postal_code') is-invalid @enderror" 
                                               id="postal_code" 
                                               name="postal_code" 
                                               value="{{ old('postal_code') }}"
                                               required
                                               maxlength="5"
                                               placeholder="Kode Pos">
                                        @error('postal_code')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Province -->
                                <div class="mb-0">
                                    <select class="form-select @error('province') is-invalid @enderror" 
                                            id="province" 
                                            name="province" 
                                            required>
                                        <option value="">-- Pilih Provinsi --</option>
                                        <option value="Aceh" {{ old('province') == 'Aceh' ? 'selected' : '' }}>Aceh</option>
                                        <option value="Sumatera Utara" {{ old('province') == 'Sumatera Utara' ? 'selected' : '' }}>Sumatera Utara</option>
                                        <option value="Sumatera Barat" {{ old('province') == 'Sumatera Barat' ? 'selected' : '' }}>Sumatera Barat</option>
                                        <option value="Riau" {{ old('province') == 'Riau' ? 'selected' : '' }}>Riau</option>
                                        <option value="Kepulauan Riau" {{ old('province') == 'Kepulauan Riau' ? 'selected' : '' }}>Kepulauan Riau</option>
                                        <option value="Jambi" {{ old('province') == 'Jambi' ? 'selected' : '' }}>Jambi</option>
                                        <option value="Sumatera Selatan" {{ old('province') == 'Sumatera Selatan' ? 'selected' : '' }}>Sumatera Selatan</option>
                                        <option value="Bangka Belitung" {{ old('province') == 'Bangka Belitung' ? 'selected' : '' }}>Bangka Belitung</option>
                                        <option value="Bengkulu" {{ old('province') == 'Bengkulu' ? 'selected' : '' }}>Bengkulu</option>
                                        <option value="Lampung" {{ old('province') == 'Lampung' ? 'selected' : '' }}>Lampung</option>
                                        <option value="DKI Jakarta" {{ old('province') == 'DKI Jakarta' ? 'selected' : '' }}>DKI Jakarta</option>
                                        <option value="Banten" {{ old('province') == 'Banten' ? 'selected' : '' }}>Banten</option>
                                        <option value="Jawa Barat" {{ old('province') == 'Jawa Barat' ? 'selected' : '' }}>Jawa Barat</option>
                                        <option value="Jawa Tengah" {{ old('province') == 'Jawa Tengah' ? 'selected' : '' }}>Jawa Tengah</option>
                                        <option value="DI Yogyakarta" {{ old('province') == 'DI Yogyakarta' ? 'selected' : '' }}>DI Yogyakarta</option>
                                        <option value="Jawa Timur" {{ old('province') == 'Jawa Timur' ? 'selected' : '' }}>Jawa Timur</option>
                                        <option value="Bali" {{ old('province') == 'Bali' ? 'selected' : '' }}>Bali</option>
                                        <option value="Nusa Tenggara Barat" {{ old('province') == 'Nusa Tenggara Barat' ? 'selected' : '' }}>Nusa Tenggara Barat</option>
                                        <option value="Nusa Tenggara Timur" {{ old('province') == 'Nusa Tenggara Timur' ? 'selected' : '' }}>Nusa Tenggara Timur</option>
                                        <option value="Kalimantan Barat" {{ old('province') == 'Kalimantan Barat' ? 'selected' : '' }}>Kalimantan Barat</option>
                                        <option value="Kalimantan Tengah" {{ old('province') == 'Kalimantan Tengah' ? 'selected' : '' }}>Kalimantan Tengah</option>
                                        <option value="Kalimantan Selatan" {{ old('province') == 'Kalimantan Selatan' ? 'selected' : '' }}>Kalimantan Selatan</option>
                                        <option value="Kalimantan Timur" {{ old('province') == 'Kalimantan Timur' ? 'selected' : '' }}>Kalimantan Timur</option>
                                        <option value="Kalimantan Utara" {{ old('province') == 'Kalimantan Utara' ? 'selected' : '' }}>Kalimantan Utara</option>
                                        <option value="Sulawesi Utara" {{ old('province') == 'Sulawesi Utara' ? 'selected' : '' }}>Sulawesi Utara</option>
                                        <option value="Gorontalo" {{ old('province') == 'Gorontalo' ? 'selected' : '' }}>Gorontalo</option>
                                        <option value="Sulawesi Tengah" {{ old('province') == 'Sulawesi Tengah' ? 'selected' : '' }}>Sulawesi Tengah</option>
                                        <option value="Sulawesi Barat" {{ old('province') == 'Sulawesi Barat' ? 'selected' : '' }}>Sulawesi Barat</option>
                                        <option value="Sulawesi Selatan" {{ old('province') == 'Sulawesi Selatan' ? 'selected' : '' }}>Sulawesi Selatan</option>
                                        <option value="Sulawesi Tenggara" {{ old('province') == 'Sulawesi Tenggara' ? 'selected' : '' }}>Sulawesi Tenggara</option>
                                        <option value="Maluku" {{ old('province') == 'Maluku' ? 'selected' : '' }}>Maluku</option>
                                        <option value="Maluku Utara" {{ old('province') == 'Maluku Utara' ? 'selected' : '' }}>Maluku Utara</option>
                                        <option value="Papua" {{ old('province') == 'Papua' ? 'selected' : '' }}>Papua</option>
                                        <option value="Papua Barat" {{ old('province') == 'Papua Barat' ? 'selected' : '' }}>Papua Barat</option>
                                        <option value="Papua Selatan" {{ old('province') == 'Papua Selatan' ? 'selected' : '' }}>Papua Selatan</option>
                                        <option value="Papua Tengah" {{ old('province') == 'Papua Tengah' ? 'selected' : '' }}>Papua Tengah</option>
                                        <option value="Papua Pegunungan" {{ old('province') == 'Papua Pegunungan' ? 'selected' : '' }}>Papua Pegunungan</option>
                                        <option value="Papua Barat Daya" {{ old('province') == 'Papua Barat Daya' ? 'selected' : '' }}>Papua Barat Daya</option>
                                    </select>
                                    @error('province')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
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
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password', this)">
                                        <i class="bi bi-eye"></i>
                                    </button>
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
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password_confirmation', this)">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100 mb-3 shadow-sm">
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

@push('scripts')
<script>
    function togglePassword(inputId, btn) {
        const input = document.getElementById(inputId);
        const icon = btn.querySelector('i');
        
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    }
</script>
@endpush
