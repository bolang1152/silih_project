@extends('user.layouts.app') 
 
@section('title', 'Data Peminjaman') 
 
@section('content') 
<div class="container-fluid"> 
    <h4 class="mb-4">Data Peminjaman Barang</h4> 
 
    <div class="card"> 
        <div class="card-body"> 
            <table class="table table-bordered"> 
                <thead> 
                    <tr> 
                        <th>No</th> 
                        <th>Nama Barang</th> 
                        <th>Tanggal Pinjam</th> 
                        <th>Tanggal Kembali</th> 
                        <th>Status</th> 
                    </tr> 
                </thead> 
                <tbody> 
                    @forelse ($peminjamans as $item) 
                        <tr> 
                            <td>{{ $loop->iteration }}</td> 
                            <td>{{ $item->barangs->nama_barang ?? '-' }}</td> 
                            <td>{{ $item->tanggal_pinjam }}</td> 
                            <td>{{ $item->tanggal_pengembalian }}</td> 
                            <td> 
                                <span class="badge bg-warning"> 
                                    {{ ucfirst($item->status_pinjam) }} 
                                </span> 
                            </td> 
                        </tr> 
                    @empty 
                        <tr> 
                            <td colspan="5" class="text-center"> 
                                Belum ada data peminjaman 
                            </td> 
                        </tr> 
                    @endforelse 
                </tbody> 
            </table> 
        </div> 
    </div> 
</div> 
@endsection