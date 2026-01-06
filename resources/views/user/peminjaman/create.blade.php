@extends('user.layouts.app')

@section('title', 'Form Peminjaman Barang')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">

                <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-semibold mb-1">Form Peminjaman Barang</h4>
                    <p class="text-muted mb-0">
                        Silakan lengkapi data peminjaman barang dengan benar.
                    </p>
                </div>

                <a href="{{ route('user.barang.index') }}"
                   class="btn btn-outline-secondary btn-sm">
                    ← Kembali
                </a>
            </div> 

            {{-- alert error --}}
            @if ($errors->any())
                <div class="alert alert-danger border-0 shadow-sm">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- alert success --}}
            @if (session('success'))
                <div class="alert alert-success border-0 shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
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

                        {{-- USER --}}
                        <input type="hidden"
                               name="users_id"
                               value="{{ old('users_id', auth()->id()) }}">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Peminjaman</label>
                                <input type="date"
                                       name="tanggal_pinjam"
                                       class="form-control"
                                       value="{{ old('tanggal_pinjam') }}"
                                       required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Pengembalian</label>
                                <input type="date"
                                       name="tanggal_pengembalian"
                                       class="form-control"
                                       value="{{ old('tanggal_pengembalian') }}"
                                       required>
                            </div>
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
                        <div class="mb-4">
                            <label class="form-label">Dokumen Pendukung</label>
                            <input type="file"
                                   class="form-control"
                                   name="dokumen_pendukung"
                                   accept=".pdf,.jpg,.jpeg,.png">
                            <small class="text-muted">
                                Format file: PDF, JPG, JPEG, PNG
                            </small>
                        </div>

                        {{-- STATUS --}}
                        <input type="hidden"
                               name="status_pinjam"
                               value="{{ old('status_pinjam', 'diajukan') }}">

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary px-4" type="submit">
                                Ajukan Permohonan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
