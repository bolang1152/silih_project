<header class="bg-white shadow px-6 py-4 flex justify-between items-center">
    <h1 class="text-lg font-semibold">
        @yield('page-title', 'Dashboard Admin')
    </h1>

    <div class="flex items-center gap-3">
        <span class="text-sm">{{ auth()->user()->name }}</span>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="text-red-600 text-sm">
                Logout
            </button>
        </form>
    </div>
</header>
