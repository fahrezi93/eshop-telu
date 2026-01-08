@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-4 mb-4">
            <!-- Profile Card -->
            <div class="card border-0 shadow-sm text-center py-4">
                <div class="card-body">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 100px; height: 100px; font-size: 3rem;">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <h4 class="fw-bold">{{ $user->name }}</h4>
                    <p class="text-muted">{{ $user->email }}</p>
                    <div class="d-flex justify-content-center gap-2 mt-3">
                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill">Member</span>
                        @if($user->email_verified_at)
                            <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">Verified</span>
                        @else
                            <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill">Unverified</span>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Quick Menu -->
            <div class="list-group mt-4 shadow-sm border-0 rounded-3 overflow-hidden">
                <a href="#profile-info" class="list-group-item list-group-item-action py-3 active" data-bs-toggle="list">
                    <i class="bi bi-person-gear me-2"></i> Profile Information
                </a>
                <a href="#update-password" class="list-group-item list-group-item-action py-3" data-bs-toggle="list">
                    <i class="bi bi-shield-lock me-2"></i> Update Password
                </a>
                <a href="#delete-account" class="list-group-item list-group-item-action py-3 text-danger" data-bs-toggle="list">
                    <i class="bi bi-trash me-2"></i> Delete Account
                </a>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="tab-content">
                <!-- Profile Information -->
                <div class="tab-pane fade show active" id="profile-info">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3">
                            <h5 class="mb-0 fw-bold text-primary">Profile Information</h5>
                            <small class="text-muted">Update your account's profile information and email address.</small>
                        </div>
                        <div class="card-body p-4">
                            @if (session('status') === 'profile-updated')
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="bi bi-check-circle me-2"></i>Profile updated successfully.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <form method="post" action="{{ route('profile.update') }}">
                                @csrf
                                @method('patch')

                                <div class="mb-3">
                                    <label for="name" class="form-label fw-semibold">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                                    @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label fw-semibold">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required autocomplete="username">
                                    @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                </div>
                                
                                <!-- Added Phone & Address -->
                                <div class="mb-3">
                                    <label for="phone" class="form-label fw-semibold">Nomor Telepon <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="08xx xxxx xxxx" required>
                                    @error('phone') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-semibold">
                                        <i class="bi bi-geo-alt me-1"></i>Alamat Lengkap <span class="text-danger">*</span>
                                    </label>
                                    
                                    <!-- Street Address -->
                                    <div class="mb-2">
                                        <input type="text" 
                                               class="form-control @error('street_address') is-invalid @enderror" 
                                               id="street_address" 
                                               name="street_address" 
                                               value="{{ old('street_address', $user->street_address) }}"
                                               required
                                               placeholder="Jalan & Nomor Rumah">
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
                                               value="{{ old('rt_rw', $user->rt_rw) }}"
                                               required
                                               placeholder="RT/RW">
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
                                                   value="{{ old('kelurahan', $user->kelurahan) }}"
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
                                                   value="{{ old('kecamatan', $user->kecamatan) }}"
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
                                                   value="{{ old('city', $user->city) }}"
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
                                                   value="{{ old('postal_code', $user->postal_code) }}"
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
                                            @foreach(['Aceh', 'Sumatera Utara', 'Sumatera Barat', 'Riau', 'Kepulauan Riau', 'Jambi', 'Sumatera Selatan', 'Bangka Belitung', 'Bengkulu', 'Lampung', 'DKI Jakarta', 'Banten', 'Jawa Barat', 'Jawa Tengah', 'DI Yogyakarta', 'Jawa Timur', 'Bali', 'Nusa Tenggara Barat', 'Nusa Tenggara Timur', 'Kalimantan Barat', 'Kalimantan Tengah', 'Kalimantan Selatan', 'Kalimantan Timur', 'Kalimantan Utara', 'Sulawesi Utara', 'Gorontalo', 'Sulawesi Tengah', 'Sulawesi Barat', 'Sulawesi Selatan', 'Sulawesi Tenggara', 'Maluku', 'Maluku Utara', 'Papua', 'Papua Barat', 'Papua Selatan', 'Papua Tengah', 'Papua Pegunungan', 'Papua Barat Daya'] as $prov)
                                                <option value="{{ $prov }}" {{ old('province', $user->province) == $prov ? 'selected' : '' }}>{{ $prov }}</option>
                                            @endforeach
                                        </select>
                                        @error('province')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex align-items-center gap-3">
                                    <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Update Password -->
                <div class="tab-pane fade" id="update-password">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3">
                            <h5 class="mb-0 fw-bold text-primary">Update Password</h5>
                            <small class="text-muted">Ensure your account is using a long, random password to stay secure.</small>
                        </div>
                        <div class="card-body p-4">
                            @if (session('status') === 'password-updated')
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="bi bi-check-circle me-2"></i>Password updated successfully.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <form method="post" action="{{ route('password.update') }}">
                                @csrf
                                @method('put')

                                <div class="mb-3">
                                    <label for="current_password" class="form-label fw-semibold">Current Password</label>
                                    <input type="password" class="form-control" id="current_password" name="current_password" autocomplete="current-password">
                                    @error('current_password', 'updatePassword') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label fw-semibold">New Password</label>
                                    <input type="password" class="form-control" id="password" name="password" autocomplete="new-password">
                                    @error('password', 'updatePassword') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" autocomplete="new-password">
                                    @error('password_confirmation', 'updatePassword') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                </div>

                                <button type="submit" class="btn btn-primary px-4">Update Password</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Delete Account -->
                <div class="tab-pane fade" id="delete-account">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-danger bg-opacity-10 py-3">
                            <h5 class="mb-0 fw-bold text-danger">Delete Account</h5>
                            <small class="text-muted">Once your account is deleted, all of its resources and data will be permanently deleted.</small>
                        </div>
                        <div class="card-body p-4">
                            <p class="text-muted">Before deleting your account, please download any data or information that you wish to retain.</p>
                            
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
                                Delete Account
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1">
                                <div class="modal-dialog">
                                    <form method="post" action="{{ route('profile.destroy') }}" class="modal-content">
                                        @csrf
                                        @method('delete')
                                        <div class="modal-header">
                                            <h5 class="modal-title text-danger">Are you sure you want to delete your account?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-muted">Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.</p>
                                            <div class="mb-3">
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                                @error('password', 'userDeletion') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Delete Account</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
