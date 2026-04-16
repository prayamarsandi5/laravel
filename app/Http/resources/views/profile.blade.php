@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
@endpush

@section('content')
<div class="container profile-container">
    <div class="row">
        {{-- Sidebar Kiri --}}
        <div class="col-md-3">
            <div class="glass-card sidebar-card">
                <div class="profile-header text-center">
                    <div class="avatar-wrapper">
                        <div class="avatar-circle-large">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div class="camera-icon"><i class="fas fa-camera"></i></div>
                    </div>
                </div>

                <ul class="profile-menu mt-4">
                    <li><a href="#"><i class="fas fa-credit-card"></i> Kartu Saya</a></li>
                    <li><a href="#"><i class="fas fa-wallet"></i> E-Wallet Saya</a></li>
                    <li><a href="#"><i class="fas fa-box"></i> Pesanan Saya</a></li>
                    <li><a href="#"><i class="fas fa-undo"></i> Refunds</a></li>
                    <li class="active"><a href="#"><i class="fas fa-user-cog"></i> My Account</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="logout-btn"><i class="fas fa-power-off"></i> Log Out</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Form Kanan --}}
        <div class="col-md-9">
            <div class="glass-card form-card">
                <h4 class="mb-4 fw-bold text-dark">Personal Data</h4>
                
                {{-- Alert Sukses --}}
                @if(session('success'))
                    <div class="alert alert-success border-0 small mb-4" style="background: #d1e7dd; color: #0f5132;">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    </div>
                @endif

                <hr>

                {{-- FORM UPDATE START --}}
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf {{-- Token Keamanan Wajib --}}
                    
                    <div class="mb-3">
                        <label class="form-label text-muted small">Full Name</label>
                        <input type="text" name="name" class="form-control input-custom" value="{{ Auth::user()->name }}" required>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label class="form-label text-muted small">Gender</label>
                            <select name="gender" class="form-select input-custom">
                                <option value="Male" {{ Auth::user()->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ Auth::user()->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <div class="col-md-9">
                            <label class="form-label text-muted small">Birthdate</label>
                            <div class="d-flex gap-2">
                                @php
                                    $birthdate = Auth::user()->birthdate ? \Carbon\Carbon::parse(Auth::user()->birthdate) : null;
                                @endphp
                                <input type="text" name="day" class="form-control input-custom" placeholder="DD" value="{{ $birthdate ? $birthdate->format('d') : '' }}">
                                <input type="text" name="month" class="form-control input-custom" placeholder="MM" value="{{ $birthdate ? $birthdate->format('m') : '' }}">
                                <input type="text" name="year" class="form-control input-custom" placeholder="YYYY" value="{{ $birthdate ? $birthdate->format('Y') : '' }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted small">City of Residence</label>
                        <input type="text" name="city" class="form-control input-custom" value="{{ Auth::user()->city }}">
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label text-muted small">Email</label>
                            <input type="email" class="form-control input-custom" value="{{ Auth::user()->email }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted small">Mobile Number</label>
                            <input type="text" name="phone" class="form-control input-custom" placeholder="08xxxxxxx" value="{{ Auth::user()->phone }}">
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-gold px-5">Save</button>
                    </div>
                </form>
                {{-- FORM UPDATE END --}}
            </div>
        </div>
    </div>
</div>
@endsection