<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sistem Informasi Sarana dan Prasarana ITERA')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-red-900 text-white">

    {{-- NAVBAR --}}
    <nav class="flex items-center justify-between px-8 py-4">
        <div class="flex items-center gap-3">
            <img src="{{ asset('assets/img/itera.png') }}" alt="ITERA" class="h-10">
            <span class="font-semibold">Sarana & Prasarana</span>
        </div>

        <div class="flex items-center gap-4">

            {{-- JIKA BELUM LOGIN --}}
            @guest
                <a href="{{ route('login') }}"
                   class="px-4 py-2 rounded bg-yellow-500 text-black font-semibold hover:bg-yellow-400">
                    Login
                </a>

                <a href="{{ route('register') }}"
                   class="px-4 py-2 rounded border border-yellow-400 text-yellow-400 hover:bg-yellow-400 hover:text-black">
                    Register
                </a>
            @endguest

            {{-- JIKA SUDAH LOGIN USER --}}
            @auth
                <a href="{{ route('user.dashboard') }}"
                   class="px-5 py-2 rounded bg-yellow-500 text-black font-semibold hover:bg-yellow-400">
                    Dashboard
                </a>
            @endauth

        </div>
    </nav>

    {{-- CONTENT --}}
    <main>
        @yield('content')
    </main>

</body>
</html>
