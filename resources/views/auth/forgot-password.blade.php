<x-guest-layout>
    {{-- FULLSCREEN WRAPPER (OVERRIDE BREEZE CONTAINER) --}}
    <div class="fixed inset-0 w-screen h-screen bg-gray-100 flex items-center justify-center px-4">
        <div class="w-full max-w-5xl bg-white rounded-2xl shadow-2xl overflow-hidden grid grid-cols-1 md:grid-cols-2">

            {{-- LEFT PANEL (HERO) --}}
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
                        Reset Password
                        <br>
                        <span class="text-white/90">SILIH</span>
                    </h1>

                    <p class="text-white/80 max-w-sm leading-relaxed">
                        Masukkan alamat email terdaftar untuk menerima
                        tautan reset password dan melanjutkan akses sistem.
                    </p>
                </div>
            </div>

            {{-- RIGHT PANEL (FORM) --}}
            <div class="px-8 py-12 md:px-12 flex flex-col justify-center">

                {{-- Header --}}
                <div class="mb-6">
                    <h2 class="text-3xl font-extrabold text-red-900">
                        Lupa Password
                    </h2>
                    <p class="text-sm text-gray-600 mt-2">
                        Kami akan mengirimkan link reset password ke email Anda
                    </p>
                </div>

                {{-- Session Status --}}
                <x-auth-session-status
                    class="mb-4 text-sm text-green-600"
                    :status="session('status')" />

                {{-- Info Text --}}
                <div class="mb-6 text-sm text-gray-600 leading-relaxed">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>

                <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                    @csrf

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
                            autofocus />

                        <x-input-error
                            :messages="$errors->get('email')"
                            class="mt-2 text-xs" />
                    </div>

                    {{-- Submit --}}
                    <button type="submit"
                            class="w-full mt-4 bg-red-800 hover:bg-red-700
                                   text-white py-3 rounded-full font-semibold tracking-wide">
                        KIRIM LINK RESET
                    </button>
                </form>

                {{-- Back to login --}}
                <p class="text-center text-sm text-gray-600 mt-8">
                    Sudah ingat password?
                    <a href="{{ route('login') }}"
                       class="font-semibold text-red-700 hover:underline">
                        Kembali ke Login
                    </a>
                </p>

            </div>
        </div>
    </div>
</x-guest-layout>
