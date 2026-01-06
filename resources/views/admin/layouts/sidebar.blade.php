<aside class="w-64 bg-red-800 text-white min-h-screen">
    <div class="p-4 text-xl font-bold border-b border-red-700">
        SILIH
    </div>

    <nav class="mt-4">
        <a href="{{ url('/admin/dashboard') }}"
           class="block px-4 py-2 hover:bg-red-700">
            Dashboard
        </a>

        <a href="{{ route('admin.barang.index') }}"
           class="block px-4 py-2 hover:bg-red-700">
            Data Barang
        </a>

        <a href="{{ route('admin.loans.index') }}">
            Peminjaman
        </a>

        <a href="#">
            Notifikasi
        </a>
    </nav>
</aside>
