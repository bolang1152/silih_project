@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h3>Edit Barang</h3>

    <form method="POST"
          action="{{ route('barang.update', $barang->id) }}"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-2">
            <label>Kode Barang</label>
            <input class="form-control" value="{{ $barang->id }}" disabled>
        </div>

        <div class="mb-2">
            <label>Nama Barang</label>
            <input class="form-control" name="nama_barang"
                   value="{{ $barang->nama_barang }}">
        </div>

        <div class="mb-2">
            <label>Jumlah Barang</label>
            <input class="form-control" type="number" name="jumlah_barang"
                   value="{{ $barang->jumlah_barang }}">
        </div>

        <div class="mb-2">
            <label>Kondisi Barang</label>
            <input class="form-control" name="kondisi_barang"
                   value="{{ $barang->kondisi_barang }}">
        </div>

        <div class="mb-2">
            <label>Detail Barang</label>
            <input class="form-control" name="detail_barang"
                   value="{{ $barang->detail_barang }}">
        </div>

        <div class="mb-3">
            <label>Status Barang</label>
            <select class="form-control" name="status_barang">
                <option value="ready" {{ $barang->status_barang == 'ready' ? 'selected' : '' }}>Ready</option>
                <option value="not-ready" {{ $barang->status_barang == 'not-ready' ? 'selected' : '' }}>Not Ready</option>
                <option value="maintenance" {{ $barang->status_barang == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
            </select>
        </div>

        {{-- 🔥 TAMBAHAN PENTING --}}
        <div class="mb-3">
            <label>Gambar Barang</label>
            <input type="file" class="form-control" name="gambar_barang">
        </div>

        {{-- preview gambar lama --}}
        @if ($barang->gambar_barang)
            <div class="mb-3">
                <label>Gambar Saat Ini</label><br>
                <img src="{{ asset('storage/' . $barang->gambar_barang) }}"
                     width="120"
                     class="img-thumbnail">
            </div>
        @endif

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
