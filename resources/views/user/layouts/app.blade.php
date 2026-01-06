<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard User')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="d-flex min-vh-100">
    @include('user.layouts.sidebar')

    <div class="flex-grow-1 d-flex flex-column">
        @include('user.layouts.navbar')

        <main class="flex-grow-1 p-4">
            @yield('content')
        </main>

        <footer class="text-center py-3 small text-muted bg-white border-top">
            © 2026 <strong>SILIH</strong> — Sistem Informasi Layanan dan Inventaris Himpunan
        </footer>
    </div>
</div>

</body>
</html>
