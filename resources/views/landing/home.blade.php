@extends('landing.layouts.app')

@section('title', 'Beranda')

@section('content')
<section class="min-h-screen bg-red-800 flex items-center justify-center px-4">
    <div class="bg-white text-center p-10 rounded-2xl shadow-xl w-full max-w-md">

        <img src="{{ asset('assets/img/peralatan.svg') }}"
             alt="Peralatan"
             class="mx-auto mb-6 w-32">

        <h2 class="text-2xl font-bold mb-3 text-gray-800">
            Peralatan
        </h2>

        <p class="text-gray-600 leading-relaxed">
            SARPRAS menyediakan layanan peminjaman peralatan
            yang efisien untuk mendukung kegiatan dengan kualitas terbaik.
        </p>

    </div>
</section>
@endsection
