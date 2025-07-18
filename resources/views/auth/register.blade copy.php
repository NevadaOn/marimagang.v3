<h2>Register</h2>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ url('/register') }}">
    @csrf

    <label for="nama">Nama</label><br>
    <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required><br><br>

    <label for="email">Email</label><br>
    <input type="email" name="email" id="email" value="{{ old('email') }}" required><br><br>

    <label for="telepon">Telepon</label><br>
    <input type="text" name="telepon" id="telepon" value="{{ old('telepon') }}" required><br><br>

    <label for="password">Password</label><br>
    <input type="password" name="password" id="password" required><br><br>

    <label for="password_confirmation">Konfirmasi Password</label><br>
    <input type="password" name="password_confirmation" id="password_confirmation" required><br><br>

    <button type="submit">Daftar</button>
</form>
