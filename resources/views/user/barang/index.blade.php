@extends('user.layouts.app')

@section('title', 'Daftar Barang')

@section('content')
<div class="container">
    <h4 class="mb-4">Daftar Barang</h4>

    <div class="row">
        @forelse ($barangs as $barang)
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm h-100">
                <img src="{{ asset('storage/'.$barang->gambar_barang) }}"
                     class="card-img-top"
                     style="height:180px; object-fit:cover">

                <div class="card-body text-center">
                    <h6>{{ $barang->nama_barang }}</h6>
                    <p class="text-muted">Stok: {{ $barang->jumlah_barang }}</p>

                    <a href="{{ route('user.barang.show', $barang->id) }}"
                       class="btn btn-warning btn-sm">
                        Detail
                    </a>

                    <a href="{{ route('user.peminjaman.create', $barang->id) }}"
                       class="btn btn-primary btn-sm">
                        Pinjam
                    </a>
                </div>
            </div>
        </div>
        @empty
        <p class="text-center">Barang belum tersedia.</p>
        @endforelse
    </div>
</div>
@endsection
