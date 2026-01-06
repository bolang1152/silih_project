@extends('user.layouts.app')

@section('title', 'Daftar Barang')

@section('content')
<div class="container-fluid">
    <h4 class="fw-semibold mb-4">
        Daftar Barang
    </h4>

    <div class="row g-4">
        @forelse ($barangs as $barang)
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <img src="{{ asset('storage/'.$barang->gambar_barang) }}"
                         class="card-img-top"
                         style="height:180px; object-fit:cover;"
                         alt="{{ $barang->nama_barang }}">

                    <div class="card-body d-flex flex-column text-center">
                        <h6 class="fw-semibold mb-1">
                            {{ $barang->nama_barang }}
                        </h6>

                        <p class="text-muted small mb-3">
                            Stok tersedia: {{ $barang->jumlah_barang }}
                        </p>

                        <div class="mt-auto d-flex gap-2 justify-content-center">
                            <a href="{{ route('user.barang.show', $barang->id) }}"
                               class="btn btn-outline-warning btn-sm px-3">
                                Detail
                            </a>

                            <a href="{{ route('user.peminjaman.create', $barang->id) }}"
                               class="btn btn-primary btn-sm px-3">
                                Pinjam
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center text-muted py-5">
                    Barang belum tersedia.
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
