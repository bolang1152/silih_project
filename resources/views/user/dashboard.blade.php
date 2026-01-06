@extends('user.layouts.app')

@section('title', 'Dashboard User')

@section('content')
<div class="card shadow-sm">
    <div class="card-body d-flex justify-content-between align-items-center">
        <div>
            <h4 class="text-danger">
                Selamat Datang {{ Auth::user()->name }} 🎉
            </h4>
            <p class="text-muted mb-3">
                Anda bisa melihat data peminjaman barang ataupun data pengembalian barang
            </p>

            <a href="{{ route('user.barang.index') }}"
               class="btn btn-primary">
                ← Back To Halaman Peminjaman Barang
            </a>
        </div>

        <img src="https://cdn-icons-png.flaticon.com/512/4140/4140048.png"
             width="160">
    </div>
</div>
@endsection
