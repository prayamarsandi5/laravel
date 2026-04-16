@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow border-0" style="border-radius: 15px;">
        <div class="card-body p-5">
            <h2 class="fw-bold">Selamat Datang, Admin {{ Auth::user()->name }}! 🛡️</h2>
            <p class="text-muted">Ini adalah panel khusus untuk mengelola Roomly.</p>
            <hr>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="p-3 bg-primary text-white rounded">
                        <h5>Total Booking</h5>
                        <h3>120</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 bg-success text-white rounded">
                        <h5>Total User</h5>
                        <h3>45</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection