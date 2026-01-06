@extends('admin.layouts.app')

@section('title', 'Detail Peminjaman')

@section('content')
<div class="container-fluid">

    <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-secondary mb-3">
        ← Kembali
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <h5>Detail & Verifikasi Peminjaman</h5>
        </div>

        <form method="POST" action="{{ route('admin.loans.verify', $loan->id) }}">
            @csrf
            @method('PUT')

            <div class="card-body row g-3">

                <div class="col-md-6">
                    <label class="form-label">ID Transaction</label>
                    <input class="form-control" value="{{ $loan->id }}" disabled>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Barang</label>
                    <input class="form-control" value="{{ $loan->barangs?->nama_barang }}" disabled>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nama Peminjam</label>
                    <input class="form-control" value="{{ $loan->users?->name }}" disabled>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tanggal Pengembalian</label>
                    <input type="date" name="tanggal_pengembalian"
                           class="form-control"
                           value="{{ optional($loan->tanggal_pengembalian)->format('Y-m-d') }}">
                </div>

                <div class="col-12">
                    <label class="form-label">Tujuan</label>
                    <textarea class="form-control" disabled>{{ $loan->tujuan_pinjam }}</textarea>
                </div>

                <div class="col-12">
                    <label class="form-label">Keterangan</label>
                    <textarea class="form-control" disabled>{{ $loan->keterangan_pinjam }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Status</label>
                    <select name="status_pinjam" class="form-select">
                        <option value="disetujui" {{ $loan->status_pinjam == 'disetujui' ? 'selected' : '' }}>
                            Disetujui
                        </option>
                        <option value="ditolak" {{ $loan->status_pinjam == 'ditolak' ? 'selected' : '' }}>
                            Ditolak
                        </option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">File Pendukung</label>
                    <div class="form-control">
                        @if($loan->dokumen_pendukung)
                            <a target="_blank"
                               href="{{ asset('storage/dokumen_pendukung/'.$loan->dokumen_pendukung) }}">
                                Lihat File
                            </a>
                        @else
                            -
                        @endif
                    </div>
                </div>

            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-success">
                    Simpan Verifikasi
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
