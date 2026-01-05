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
