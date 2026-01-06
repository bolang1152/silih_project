<!-- <x-guest-layout> -->
    <!-- Session Status -->
    <!-- <x-auth-session-status class="mb-4" :status="session('status')" /> -->

    <!-- <form method="POST" action="{{ route('login') }}"> -->
        <!-- @csrf -->

        <h2>Login Admin - WEB SILIH</h2>

        <form method="POST" action="/admin/login">
            @csrf

            <div>
                <label>Email</label>
                <input type="email" name="email">
            </div>

            <div>
                <label>Password</label>
                <input type="password" name="password">
            </div>

            <button type="submit">Login</button>
        </form>

        @if ($errors->any())
            <p style="color:red">{{ $errors->first() }}</p>
        @endif

        
            <!-- <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button> -->
        </div>
    <!-- </form>
</x-guest-layout> -->

