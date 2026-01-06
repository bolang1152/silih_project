<header class="bg-white border-bottom">
    <div class="container-fluid px-4 py-3 d-flex justify-content-between align-items-center">
        <h1 class="h6 mb-0 fw-semibold text-dark">
            @yield('page-title', 'Dashboard User')
        </h1>

        <div class="d-flex align-items-center gap-3">
            <span class="text-muted small">
                {{ auth()->user()->name }}
            </span>

            <form action="{{ route('logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-danger">
                    Logout
                </button>
            </form>
        </div>
    </div>
</header>
