<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard User')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="d-flex">
    @include('user.layouts.sidebar')

    <div class="flex-grow-1">
        @include('user.layouts.navbar')

        <main class="p-4 bg-light" style="min-height: 100vh">
            @yield('content')
        </main>

        <footer class="text-center py-3 text-muted">
            © 2026 Copyright SILIH. Sistem Informasi Layanan dan Inventaris Himpunan
        </footer>
    </div>
</div>

</body>
</html>
