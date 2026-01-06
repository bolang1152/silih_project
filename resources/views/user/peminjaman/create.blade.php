@extends('user.layouts.app')

@section('title', 'Form Peminjaman Barang')

@section('content')
<div class="container">
    <h4>Form Peminjaman Barang</h4>

    {{-- alert error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- alert success (kalau controller redirect pakai with success) --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('user.barang.index') }}" class="btn btn-link mb-3">
        ← Kembali ke Daftar Barang
    </a>

    <form method="POST"
          action="{{ route('user.peminjaman.store') }}"
          enctype="multipart/form-data">
        @csrf

        {{-- ID BARANG --}}
        <div class="mb-3">
            <label class="form-label">ID Barang</label>
            <input class="form-control"
                   name="barangs_id"
                   value="{{ old('barangs_id', $barang->id) }}"
                   readonly>
        </div>

        {{-- USER (tetap hidden untuk kompatibilitas, tapi backend jangan percaya ini) --}}
        <input type="hidden"
               name="users_id"
               value="{{ old('users_id', auth()->id()) }}">

        {{-- TANGGAL --}}
        <div class="mb-3">
            <label class="form-label">Tanggal Peminjaman</label>
            <input type="date"
                   name="tanggal_pinjam"
                   class="form-control"
                   value="{{ old('tanggal_pinjam') }}"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Pengembalian</label>
            <input type="date"
                   name="tanggal_pengembalian"
                   class="form-control"
                   value="{{ old('tanggal_pengembalian') }}"
                   required>
        </div>

        {{-- KATEGORI --}}
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <input class="form-control"
                   value="{{ $barang->kategori_barang }}"
                   readonly>

            <input type="hidden"
                   name="kategori_pinjam"
                   value="{{ old('kategori_pinjam', $barang->kategori_barang) }}">
        </div>

        {{-- TUJUAN --}}
        <div class="mb-3">
            <label class="form-label">Tujuan Pinjam</label>
            <input class="form-control"
                   name="tujuan_pinjam"
                   value="{{ old('tujuan_pinjam') }}"
                   required>
        </div>

        {{-- KETERANGAN --}}
        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea class="form-control"
                      name="keterangan_pinjam"
                      rows="3">{{ old('keterangan_pinjam') }}</textarea>
        </div>

        {{-- DOKUMEN --}}
        <div class="mb-3">
            <label class="form-label">Dokumen Pendukung</label>
            <input type="file"
                   class="form-control"
                   name="dokumen_pendukung"
                   accept=".pdf,.jpg,.jpeg,.png">
            <small class="text-muted">Format: PDF/JPG/PNG</small>
        </div>

        {{-- STATUS --}}
        <input type="hidden"
               name="status_pinjam"
               value="{{ old('status_pinjam', 'diajukan') }}">

        <button class="btn btn-primary" type="submit">
            Ajukan Permohonan
        </button>
    </form>
</div>
@endsection
