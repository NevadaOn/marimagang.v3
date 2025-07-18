<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOMINFO - Sign Up</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>
      <script src="{{ asset('js/bintang.js') }}"></script>
    <div class="sign-up-container">
        <div class="welcome-section">
            <div class="logo">
                <div class="logo-icon">
                    <img src="{{ asset('img/kominfo-seeklogo1.png') }}" alt="">
                </div>
            </div>
            
            <h1 class="welcome-title">Selamat datang</h1>
            <p class="welcome-subtitle">Bergabunglah dengan kami</p>
            
            <div class="illustration">
                <img src="{{ asset('img/7_pns_success1.png') }}" alt="Kominfo" >
            </div>
        </div>

        <div class="form-section">
            <h2 class="form-title">register</h2>
            
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
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="username">Telepon</label>
                    <input type="text" name="telepon" id="telepon" value="{{ old('telepon') }}" required>
                </div>
                
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-field">
                        <input type="password" id="password" name="password" required >
                        <button type="button" class="password-toggle" onclick="togglePassword()">
                            <i class="fas fa-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <div class="password-field">
                         <input type="password" name="password_confirmation" id="password_confirmation" required>
                        <button type="button" class="password-toggle" onclick="toggleConfirmPassword()">
                            <i class="fas fa-eye" id="eyeConfirmIcon"></i>
                        </button>
                    </div>
                </div>
                <button type="submit" class="sign-up-btn">Sign Up</button>
            </form>
            
            <div class="sign-in-link">
                Sudah punya Akun? <a href="{{ route('login') }}">Sign in</a>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }

        function toggleConfirmPassword() {
            const confirmPasswordField = document.getElementById('confirm-password');
            const eyeConfirmIcon = document.getElementById('eyeConfirmIcon');
            
            if (confirmPasswordField.type === 'password') {
                confirmPasswordField.type = 'text';
                eyeConfirmIcon.classList.remove('fa-eye');
                eyeConfirmIcon.classList.add('fa-eye-slash');
            } else {
                confirmPasswordField.type = 'password';
                eyeConfirmIcon.classList.remove('fa-eye-slash');
                eyeConfirmIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>