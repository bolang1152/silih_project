@extends('user.layouts.app')

@section('title', 'Dashboard User')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <div class="row align-items-center g-4">
            <div class="col-md-8">
                <h4 class="fw-semibold text-danger mb-2">
                    Selamat Datang, {{ Auth::user()->name }} 🎉
                </h4>

                <p class="text-muted mb-4">
                    Anda dapat melihat dan mengelola data peminjaman maupun pengembalian barang dengan mudah melalui dashboard ini.
                </p>

                <a href="{{ route('user.barang.index') }}"
                   class="btn btn-primary px-4">
                    ← Kembali ke Peminjaman Barang
                </a>
            </div>

            <div class="col-md-4 text-center d-none d-md-block">
                <img src="https://cdn-icons-png.flaticon.com/512/4140/4140048.png"
                     class="img-fluid"
                     style="max-width: 160px;"
                     alt="Dashboard Illustration">
            </div>
        </div>
    </div>
</div>
@endsection
