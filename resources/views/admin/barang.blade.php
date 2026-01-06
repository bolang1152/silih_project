@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h3>Data Barang – SILIH</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- FORM TAMBAH BARANG --}}
    <div class="card mb-4">
        <div class="card-header">Tambah Barang</div>
        <div class="card-body">
            <form method="POST"
                action="{{ route('barang.store') }}"
                enctype="multipart/form-data">
                @csrf

                <input class="form-control mb-2"
                    name="id"
                    placeholder="Kode Barang">

                <input class="form-control mb-2"
                    name="nama_barang"
                    placeholder="Nama Barang">

                <input class="form-control mb-2"
                    name="jumlah_barang"
                    type="number"
                    placeholder="Jumlah">

                <input class="form-control mb-2"
                    name="kondisi_barang"
                    placeholder="Kondisi">

                <input class="form-control mb-2"
                    name="detail_barang"
                    placeholder="Detail">

                {{-- GAMBAR BARANG --}}
                <input class="form-control mb-3"
                    type="file"
                    name="gambar_barang">

                <select class="form-control mb-3" name="status_barang">
                    <option value="ready">Ready</option>
                    <option value="not-ready">Not Ready</option>
                    <option value="maintenance">Maintenance</option>
                </select>

                <button class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>

    {{-- TABEL BARANG --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($barangs as $b)
            <tr>
                <td>{{ $b->id }}</td>
                <td>{{ $b->nama_barang }}</td>
                <td>{{ $b->jumlah_barang }}</td>
                <td>{{ $b->status_barang }}</td>
                <td>
                    <a href="{{ route('barang.edit', $b->id) }}"
                        class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form method="POST"
                        action="{{ route('barang.destroy', $b->id) }}"
                        class="d-inline"
                        onsubmit="return confirm('Yakin hapus barang ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
