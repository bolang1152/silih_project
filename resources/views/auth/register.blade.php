<x-guest-layout>
    {{-- FULLSCREEN WRAPPER (OVERRIDE BREEZE CONTAINER) --}}
    <div class="fixed inset-0 w-screen h-screen bg-gray-100 flex items-center justify-center px-4">
        <div class="w-full max-w-5xl bg-white rounded-2xl shadow-2xl overflow-hidden grid grid-cols-1 md:grid-cols-2">

            {{-- LEFT PANEL (HERO – SAME AS LOGIN) --}}
            <div class="relative hidden md:flex flex-col justify-center px-12
                        bg-gradient-to-br from-red-900 via-red-800 to-red-700 text-white">

                {{-- Decorative grid pattern --}}
                <div class="absolute inset-0 opacity-20
                            bg-[linear-gradient(to_right,rgba(255,255,255,0.2)_1px,transparent_1px),
                                linear-gradient(to_bottom,rgba(255,255,255,0.2)_1px,transparent_1px)]
                            bg-[size:40px_40px]">
                </div>

                <div class="relative z-10">
                    <p class="text-sm uppercase tracking-widest text-white/70 mb-4">
                        Sistem Informasi
                    </p>

                    <h1 class="text-4xl font-extrabold mb-4 leading-tight">
                        Create Account
                        <br>
                        <span class="text-white/90">SILIH</span>
                    </h1>

                    <p class="text-white/80 max-w-sm leading-relaxed">
                        Daftarkan akun untuk mengakses Sistem Informasi
                        Layanan & Inventaris secara terintegrasi dan aman.
                    </p>
                </div>
            </div>

            {{-- RIGHT PANEL (REGISTER FORM) --}}
            <div class="px-8 py-12 md:px-12 flex flex-col justify-center">

                {{-- Header --}}
                <div class="mb-8">
                    <h2 class="text-3xl font-extrabold text-red-900">
                        Register Account
                    </h2>
                    <p class="text-sm text-gray-600 mt-2">
                        Lengkapi data untuk membuat akun baru
                    </p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    {{-- Name --}}
                    <div>
                        <x-input-label
                            for="name"
                            :value="__('Name')"
                            class="text-sm font-medium text-gray-700" />

                        <x-text-input
                            id="name"
                            class="mt-1 block w-full rounded-lg border-gray-300
                                   focus:border-red-700 focus:ring-red-700"
                            type="text"
                            name="name"
                            :value="old('name')"
                            required
                            autofocus
                            autocomplete="name" />

                        <x-input-error
                            :messages="$errors->get('name')"
                            class="mt-2 text-xs" />
                    </div>

                    {{-- Email --}}
                    <div>
                        <x-input-label
                            for="email"
                            :value="__('Email Address')"
                            class="text-sm font-medium text-gray-700" />

                        <x-text-input
                            id="email"
                            class="mt-1 block w-full rounded-lg border-gray-300
                                   focus:border-red-700 focus:ring-red-700"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autocomplete="username" />

                        <x-input-error
                            :messages="$errors->get('email')"
                            class="mt-2 text-xs" />
                    </div>

                    {{-- Password --}}
                    <div>
                        <x-input-label
                            for="password"
                            :value="__('Password')"
                            class="text-sm font-medium text-gray-700" />

                        <x-text-input
                            id="password"
                            class="mt-1 block w-full rounded-lg border-gray-300
                                   focus:border-red-700 focus:ring-red-700"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password" />

                        <x-input-error
                            :messages="$errors->get('password')"
                            class="mt-2 text-xs" />
                    </div>

                    {{-- Confirm Password --}}
                    <div>
                        <x-input-label
                            for="password_confirmation"
                            :value="__('Confirm Password')"
                            class="text-sm font-medium text-gray-700" />

                        <x-text-input
                            id="password_confirmation"
                            class="mt-1 block w-full rounded-lg border-gray-300
                                   focus:border-red-700 focus:ring-red-700"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password" />

                        <x-input-error
                            :messages="$errors->get('password_confirmation')"
                            class="mt-2 text-xs" />
                    </div>

                    {{-- Submit --}}
                    <button type="submit"
                            class="w-full mt-4 bg-red-800 hover:bg-red-700
                                   text-white py-3 rounded-full font-semibold tracking-wide">
                        DAFTAR
                    </button>
                </form>

                {{-- Login --}}
                <p class="text-center text-sm text-gray-600 mt-8">
                    Sudah punya akun?
                    <a href="{{ route('login') }}"
                       class="font-semibold text-red-700 hover:underline">
                        Login sekarang
                    </a>
                </p>

            </div>
        </div>
    </div>
</x-guest-layout>
