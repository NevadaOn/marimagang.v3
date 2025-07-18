<h2>Login</h2>

@if ($errors->any())
    <div>
        <strong>Error:</strong> {{ $errors->first() }}
    </div>
@endif

<form method="POST" action="{{ url('/login') }}">
    @csrf

    <label for="email">Email</label><br>
    <input type="email" name="email" id="email" required><br><br>

    <label for="password">Password</label><br>
    <input type="password" name="password" id="password" required><br><br>

    <button type="submit">Login</button>
</form>

{{-- Tambahkan ini --}}
<div style="margin-top: 10px;">
    <a href="{{ route('password.request') }}">Lupa Password?</a>
</div>
