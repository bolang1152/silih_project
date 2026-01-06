@extends('user.layouts.app')

@section('title', 'Detail Barang')

@section('content')
<div class="container">
    <h4>{{ $barang->nama_barang }}</h4>

    <img src="{{ asset('storage/'.$barang->gambar_barang) }}"
         width="300" class="mb-3">

    <p>{{ $barang->detail_barang }}</p>
    <p>Stok: {{ $barang->jumlah_barang }}</p>

    <a href="{{ route('user.barang.index') }}" class="btn btn-secondary">
        Kembali
    </a>
</div>
@endsection
