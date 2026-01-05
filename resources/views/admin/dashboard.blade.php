@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Admin')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    {{-- Card Barang --}}
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-sm text-gray-500">Total Barang</h2>
        <p class="text-2xl font-bold">{{ $totalBarang }}</p>
    </div>

    {{-- Card Peminjaman --}}
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-sm text-gray-500">Barang Dipinjam</h2>
        <p class="text-2xl font-bold">{{ $totalDipinjam }}</p>
    </div>

    {{-- Card User --}}
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-sm text-gray-500">Total User</h2>
        <p class="text-2xl font-bold">{{ $totalUser }}</p>
    </div>

</div>

{{-- Quick Action --}}
<div class="mt-8 bg-white p-6 rounded shadow">
    <h3 class="text-lg font-semibold mb-4">Quick Action</h3>

    <a href="{{ route('admin.items.create') }}"
       class="inline-block bg-blue-600 text-white px-4 py-2 rounded">
        Tambah Barang
    </a>
</div>
@endsection
