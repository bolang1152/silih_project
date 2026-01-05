<aside class="w-64 bg-red-800 text-white min-h-screen">
    <div class="p-4 text-xl font-bold border-b border-red-700">
        SARPRAS ITERA
    </div>

    <nav class="mt-4">
        <a href="{{ route('admin.dashboard') }}"
           class="block px-4 py-2 hover:bg-red-700">
            Dashboard
        </a>

        <a href="{{ route('admin.items.index') }}"
           class="block px-4 py-2 hover:bg-red-700">
            Data Barang
        </a>

        <a href="{{ route('admin.loans.index') }}"
           class="block px-4 py-2 hover:bg-red-700">
            Data Peminjaman
        </a>

        <a href="{{ route('admin.notifications') }}"
           class="block px-4 py-2 hover:bg-red-700">
            Notification
        </a>
    </nav>
</aside>
