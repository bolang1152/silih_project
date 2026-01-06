@extends('user.layouts.app')

@section('title', 'Data Peminjaman')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-semibold mb-0">
            Data Peminjaman Barang
        </h4>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4" style="width: 60px;">No</th>
                            <th>Nama Barang</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th class="pe-4">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($peminjamans as $item)
                            <tr>
                                <td class="ps-4">{{ $loop->iteration }}</td>
                                <td>{{ $item->barangs->nama_barang ?? '-' }}</td>
                                <td>{{ $item->tanggal_pinjam }}</td>
                                <td>{{ $item->tanggal_pengembalian }}</td>
                                <td class="pe-4">
                                    @php
                                        $status = strtolower(trim($item->status_pinjam));

                                        $badgeClass = match ($status) {
                                            'diajukan'     => 'bg-warning-subtle text-warning',
                                            'disetujui'    => 'bg-success-subtle text-success',
                                            'dipinjam'     => 'bg-primary-subtle text-primary',
                                            'dikembalikan' => 'bg-secondary-subtle text-secondary',
                                            'ditolak'      => 'bg-danger-subtle text-danger',
                                            default        => 'bg-light text-dark',
                                        };
                                    @endphp

                                    <span class="badge {{ $badgeClass }}">
                                        {{ ucfirst($item->status_pinjam) }}
                                    </span>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    Belum ada data peminjaman
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
