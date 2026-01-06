@extends('admin.layouts.app')

@section('title', 'Data Peminjaman')

@section('content')
<div class="container-fluid">
    <h4 class="mb-4">Data Peminjaman Barang</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Peminjam</th>
                        <th>Barang</th>
                        <th>Kategori</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($peminjamans as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->users->name }}</td>
                        <td>{{ $p->barangs->nama_barang }}</td>
                        <td>{{ $p->kategori_pinjam }}</td>
                        <td>{{ $p->tanggal_pinjam }}</td>
                        <td>{{ $p->tanggal_pengembalian ?? '-' }}</td>
                        <td>
                            <span class="badge bg-secondary">
                                {{ ucfirst($p->status_pinjam) }}
                            </span>
                        </td>
                        <td>
                            <form method="POST"
                                action="{{ route('admin.loans.updateStatus', $p->id) }}">
                                @csrf
                                @method('PATCH')

                                <select name="status_pinjam"
                                    class="form-select form-select-sm mb-1">
                                    <option value="pending">Pending</option>
                                    <option value="disetujui">Disetujui</option>
                                    <option value="ditolak">Ditolak</option>
                                    <option value="selesai">Selesai</option>
                                </select>

                                <button class="btn btn-primary btn-sm w-100">
                                    Update
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
