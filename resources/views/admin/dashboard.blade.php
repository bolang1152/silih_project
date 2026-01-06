@extends('admin.layouts.app')

@section('title', 'Data Peminjaman')

@section('content')
<div class="container-fluid">
    @if(session('success'))
        <div class="alert alert-success mb-3">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger mb-3">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data Peminjaman</h5>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-primary">Refresh</a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width:90px;">Aksi</th>
                        <th>ID</th>
                        <th>Nama Peminjam</th>
                        <th>Barang</th>
                        <th>Kategori</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Status</th>
                        <th>Diajukan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($loans as $p)
                        <tr>
                            <td>
                                <button class="btn btn-sm btn-secondary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalDetailLoan-{{ $p->id }}">
                                    Detail
                                </button>
                            </td>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->users?->name }}</td>
                            <td>{{ $p->barangs?->nama_barang }}</td>
                            <td>{{ $p->kategori_pinjam }}</td>
                            <td>{{ \Carbon\Carbon::parse($p->tanggal_pinjam)->format('Y-m-d') }}</td>
                            <td>{{ $p->tanggal_pengembalian ? \Carbon\Carbon::parse($p->tanggal_pengembalian)->format('Y-m-d') : '-' }}</td>
                            <td>
                                @php
                                    $badge = match($p->status_pinjam) {
                                        'pending','diajukan' => 'warning',
                                        'disetujui','dipinjam' => 'info',
                                        'ditolak' => 'danger',
                                        'selesai','dikembalikan' => 'success',
                                        default => 'secondary'
                                    };
                                @endphp
                                <span class="badge bg-{{ $badge }}">{{ $p->status_pinjam }}</span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($p->created_at)->format('Y-m-d H:i:s') }}</td>
                        </tr>

                        <!-- {{-- MODAL DETAIL --}}
                        <div class="modal fade" id="modalDetailLoan-{{ $p->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Detail Data Verifikasi Peminjaman</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">
                                        <table class="table table-sm">
                                            <tbody>
                                                <tr>
                                                    <td style="width:45%;">File Pendukung</td>
                                                    <td>
                                                        @if($p->dokumen_pendukung)
                                                            <a target="_blank"
                                                               href="{{ asset('storage/dokumen_pendukung/'.$p->dokumen_pendukung) }}">
                                                                Lihat File
                                                            </a>
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr><td>ID Transaction</td><td>{{ $p->id }}</td></tr>
                                                <tr><td>Barang ID</td><td>{{ $p->barangs_id }}</td></tr>
                                                <tr><td>Nama Barang</td><td>{{ $p->barangs?->nama_barang }}</td></tr>
                                                <tr><td>Nama Peminjam</td><td>{{ $p->users?->name }}</td></tr>
                                                <tr><td>Tanggal Pinjam</td><td>{{ \Carbon\Carbon::parse($p->tanggal_pinjam)->format('Y-m-d') }}</td></tr>
                                                <tr><td>Tanggal Pengembalian</td><td>{{ $p->tanggal_pengembalian ? \Carbon\Carbon::parse($p->tanggal_pengembalian)->format('Y-m-d') : '-' }}</td></tr>
                                                <tr><td>Kategori Peminjaman</td><td>{{ $p->kategori_pinjam }}</td></tr>
                                                <tr><td>Keterangan Peminjaman</td><td>{{ $p->keterangan_pinjam ?: '-' }}</td></tr>
                                                <tr><td>Tujuan Peminjaman</td><td>{{ $p->tujuan_pinjam }}</td></tr>
                                                <tr>
                                                    <td>Status</td>
                                                    <td><span class="badge bg-{{ $badge }}">{{ $p->status_pinjam }}</span></td>
                                                </tr>

                                                @if(in_array($p->status_pinjam, ['pending','diajukan']))
                                                    <tr>
                                                        <td>Aksi</td>
                                                        <td>
                                                            <button class="btn btn-warning btn-sm"
                                                                    data-bs-target="#modalVerifikasiLoan-{{ $p->id }}"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-dismiss="modal">
                                                                Verifikasi
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
 -->
                        {{-- MODAL VERIFIKASI --}}
                        <div class="modal fade" id="modalVerifikasiLoan-{{ $p->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                <div class="modal-content">

                                    <form method="POST" action="{{ route('admin.loans.verify', $p->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="modal-header">
                                            <h5 class="modal-title">Verifikasi Peminjaman</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">ID Transaction</label>
                                                    <input class="form-control" value="{{ $p->id }}" disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Barang</label>
                                                    <input class="form-control" value="{{ $p->barangs?->nama_barang }}" disabled>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label">Nama Peminjam</label>
                                                    <input class="form-control" value="{{ $p->users?->name }}" disabled>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label">Tanggal Pengembalian</label>
                                                    <input type="date" name="tanggal_pengembalian"
                                                           class="form-control"
                                                           value="{{ $p->tanggal_pengembalian ? \Carbon\Carbon::parse($p->tanggal_pengembalian)->format('Y-m-d') : '' }}">
                                                </div>

                                                <div class="col-12">
                                                    <label class="form-label">Tujuan</label>
                                                    <textarea class="form-control" rows="2" disabled>{{ $p->tujuan_pinjam }}</textarea>
                                                </div>

                                                <div class="col-12">
                                                    <label class="form-label">Keterangan</label>
                                                    <textarea class="form-control" rows="2" disabled>{{ $p->keterangan_pinjam }}</textarea>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label">Status</label>
                                                    <select name="status_pinjam" class="form-select" required>
                                                        <option value="disetujui">Disetujui</option>
                                                        <option value="ditolak">Ditolak</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label">File Pendukung</label>
                                                    <div class="form-control">
                                                        @if($p->dokumen_pendukung)
                                                            <a target="_blank"
                                                               href="{{ asset('storage/dokumen_pendukung/'.$p->dokumen_pendukung) }}">
                                                                Lihat File
                                                            </a>
                                                        @else
                                                            -
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                Batal
                                            </button>
                                            <button type="submit" class="btn btn-success">
                                                Simpan
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-4">Belum ada data peminjaman</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
