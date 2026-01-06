@extends('user.layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="mb-4">
    <h3 class="fw-bold text-danger">
        Dashboard
    </h3>
    <p class="text-muted">
        Ringkasan aktivitas dan informasi akun Anda
    </p>
</div>

{{-- WELCOME CARD --}}
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body d-flex flex-column flex-md-row
                justify-content-between align-items-start align-items-md-center gap-3">

        <div>
            <h5 class="fw-bold text-danger mb-2">
                Selamat Datang 👋
            </h5>
            <p class="text-muted mb-0" style="max-width: 520px;">
                Anda berhasil masuk ke sistem <strong>SILIH</strong>.
                Gunakan dashboard ini untuk mengelola peminjaman,
                memantau status, dan melihat informasi sarana & prasarana.
            </p>
        </div>

        <div class="badge bg-danger-subtle text-danger px-3 py-2 rounded">
            {{ __("You're logged in!") }}
        </div>
    </div>
</div>

{{-- QUICK STATS --}}
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <small class="text-muted">Status Akun</small>
                <h5 class="fw-bold text-success mb-0">Aktif</h5>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <small class="text-muted">Hak Akses</small>
                <h5 class="fw-bold text-danger mb-0">Pengguna</h5>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <small class="text-muted">Sistem</small>
                <h5 class="fw-bold mb-0">SILIH</h5>
            </div>
        </div>
    </div>
</div>

{{-- INFO --}}
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <h5 class="fw-bold text-danger mb-3">
            Tentang Sistem
        </h5>
        <p class="text-muted mb-0" style="max-width: 720px;">
            <strong>SILIH (Sistem Informasi Layanan & Inventaris)</strong>
            merupakan platform digital untuk mendukung pengelolaan
            sarana dan prasarana secara transparan, terstruktur,
            dan terdokumentasi dengan baik.
        </p>
    </div>
</div>

@endsection
