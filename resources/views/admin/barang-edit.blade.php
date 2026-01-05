@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Barang</h3>

    <form method="POST" action="{{ route('barang.update', $barang->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-2">
            <label>Kode Barang</label>
            <input class="form-control" value="{{ $barang->id }}" disabled>
        </div>

        <input class="form-control mb-2" name="nama_barang"
               value="{{ $barang->nama_barang }}">

        <input class="form-control mb-2" type="number" name="jumlah_barang"
               value="{{ $barang->jumlah_barang }}">

        <input class="form-control mb-2" name="kondisi_barang"
               value="{{ $barang->kondisi_barang }}">

        <input class="form-control mb-2" name="detail_barang"
               value="{{ $barang->detail_barang }}">

        <select class="form-control mb-3" name="status_barang">
            <option value="ready" {{ $barang->status_barang == 'ready' ? 'selected' : '' }}>Ready</option>
            <option value="not-ready" {{ $barang->status_barang == 'not-ready' ? 'selected' : '' }}>Not Ready</option>
            <option value="maintenance" {{ $barang->status_barang == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
        </select>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
