<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin | SILIH</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-red-900 via-red-800 to-red-700
             flex items-center justify-center px-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl px-8 py-10">

        {{-- HEADER --}}
        <div class="text-center mb-8">
            <h1 class="text-3xl font-extrabold text-red-900 tracking-wide">
                SILIH
            </h1>
            <p class="text-sm text-gray-600 mt-2">
                Login Administrator
            </p>
        </div>

        {{-- ERROR --}}
        @if ($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200 text-red-700
                        text-sm rounded-lg px-4 py-3">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- FORM --}}
        <form method="POST" action="/admin/login" class="space-y-5">
            @csrf

            {{-- EMAIL --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Email
                </label>
                <input
                    type="email"
                    name="email"
                    required
                    class="w-full rounded-lg border-gray-300
                           focus:border-red-700 focus:ring-red-700">
            </div>

            {{-- PASSWORD --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Password
                </label>
                <input
                    type="password"
                    name="password"
                    required
                    class="w-full rounded-lg border-gray-300
                           focus:border-red-700 focus:ring-red-700">
            </div>

            {{-- SUBMIT --}}
            <button type="submit"
                    class="w-full mt-4 bg-red-800 hover:bg-red-700
                           text-white py-3 rounded-full font-semibold tracking-wide">
                LOGIN ADMIN
            </button>
        </form>

        {{-- FOOTER --}}
        <p class="text-center text-xs text-gray-500 mt-8">
            © {{ date('Y') }} SILIH — Administrator Panel
        </p>

    </div>

</body>
</html>
