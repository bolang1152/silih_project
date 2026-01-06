<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'SILIH')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-red-900 via-red-800 to-red-700 text-white antialiased">

    {{-- NAVBAR --}}
    <nav class="sticky top-0 z-50 w-full
                px-10 py-6
                bg-red-900/90 backdrop-blur
                border-b border-red-950">

        <div class="max-w-7xl mx-auto
                    flex items-center justify-between">

            {{-- LEFT : BRAND --}}
            <div class="text-left">
                <span class="font-extrabold text-3xl tracking-wider">
                    SILIH
                </span>
            </div>

            {{-- CENTER : MENU --}}
            <ul class="hidden md:flex items-center gap-12
                       text-lg font-medium text-white/80">
                <li>
                    <a href="#home"
                       class="hover:text-yellow-400 transition">
                        Home
                    </a>
                </li>
                <li>
                    <a href="#about"
                       class="hover:text-yellow-400 transition">
                        About
                    </a>
                </li>
                <li>
                    <a href="#contact"
                       class="hover:text-yellow-400 transition">
                        Contact
                    </a>
                </li>
            </ul>

            {{-- RIGHT : ACTION --}}
            <div class="flex items-center gap-4">
                @guest
                    <a href="{{ route('login') }}"
                       class="px-6 py-3 rounded-full
                              bg-yellow-500 text-black
                              text-lg font-semibold
                              hover:bg-yellow-400 transition shadow-lg">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="px-6 py-3 rounded-full
                              border border-yellow-400
                              text-yellow-400 text-lg
                              hover:bg-yellow-400
                              hover:text-black transition">
                        Register
                    </a>
                @endguest

                @auth
                    <a href="{{ route('user.dashboard') }}"
                       class="px-7 py-3 rounded-full
                              bg-yellow-500 text-black
                              text-lg font-semibold
                              hover:bg-yellow-400 transition shadow-lg">
                        Dashboard
                    </a>
                @endauth
            </div>

        </div>
    </nav>

    {{-- HOME / HERO --}}
    <main id="home"
          class="min-h-screen flex flex-col
                 items-center justify-center
                 text-center px-6">

        <span class="mb-8 px-6 py-2 rounded-full
                     bg-yellow-400/20 text-yellow-300
                     text-base tracking-widest uppercase">
            Platform Resmi
        </span>

        <h1 class="text-5xl md:text-7xl font-extrabold
                   leading-tight mb-8">
            Sistem Informasi<br class="hidden md:block">
            <span class="text-yellow-400">
                Layanan & Inventaris
            </span>
        </h1>

        <p class="max-w-3xl text-white/85
                  text-xl leading-relaxed mb-16">
            <strong>SILIH</strong> adalah platform digital
            untuk mengelola peminjaman, pengawasan,
            dan pencatatan sarana serta prasarana
            secara <strong>transparan, terstruktur,
            dan akuntabel</strong>.
        </p>

        <div class="flex flex-col sm:flex-row gap-6">
            @guest
                <a href="{{ route('login') }}"
                   class="px-12 py-4 rounded-full
                          bg-yellow-500 text-black
                          text-lg font-semibold
                          hover:bg-yellow-400 transition shadow-lg">
                    Mulai Sekarang
                </a>
            @endguest

            <a href="#about"
               class="px-12 py-4 rounded-full
                      border border-white/40
                      text-white text-lg
                      hover:bg-white
                      hover:text-red-900 transition">
                Pelajari Sistem
            </a>
        </div>
    </main>

    {{-- ABOUT --}}
    <section id="about"
             class="bg-white text-red-900
                    py-32 px-6">
        <div class="max-w-7xl mx-auto">

            <div class="text-center mb-24">
                <h2 class="text-4xl md:text-5xl font-extrabold mb-6">
                    Tentang SILIH
                </h2>
                <p class="text-gray-600 text-lg md:text-xl
                          max-w-2xl mx-auto">
                    Sistem Informasi Layanan & Inventaris
                    yang dirancang untuk tata kelola
                    sarana prasarana secara profesional.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-14 text-center">

                <div class="p-12 rounded-2xl
                            shadow-xl border border-gray-100">
                    <h3 class="text-2xl font-semibold mb-4">
                        Manajemen Inventaris
                    </h3>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        Seluruh data barang tercatat
                        secara terpusat dan mudah dipantau.
                    </p>
                </div>

                <div class="p-12 rounded-2xl
                            shadow-xl border border-gray-100">
                    <h3 class="text-2xl font-semibold mb-4">
                        Peminjaman Terkontrol
                    </h3>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        Proses pengajuan hingga pengembalian
                        terdokumentasi dengan rapi.
                    </p>
                </div>

                <div class="p-12 rounded-2xl
                            shadow-xl border border-gray-100">
                    <h3 class="text-2xl font-semibold mb-4">
                        Keamanan & Hak Akses
                    </h3>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        Pengaturan akses pengguna dan admin
                        untuk menjaga integritas data.
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- CONTACT --}}
    <section id="contact"
             class="bg-red-900 text-white
                    py-32 px-6">
        <div class="max-w-4xl mx-auto text-center">

            <h2 class="text-4xl md:text-5xl
                       font-extrabold mb-8">
                Hubungi Kami
            </h2>

            <p class="text-white/80
                      text-lg md:text-xl mb-16">
                Untuk informasi lebih lanjut mengenai
                penggunaan sistem SILIH,
                silakan hubungi pengelola resmi.
            </p>

            <div class="inline-block
                        bg-white/10 rounded-2xl
                        px-16 py-10
                        text-lg leading-relaxed">
                Email: <strong>silih@institution.ac.id</strong><br>
                Telepon: <strong>(021) 1234-5678</strong>
            </div>
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="border-t border-white/10
                   py-8 text-center
                   text-white/60 text-base">
        © {{ date('Y') }}
        <strong>SILIH</strong><br>
        Sistem Informasi Layanan & Inventaris Himpunan
    </footer>

</body>
</html>
