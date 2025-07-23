<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color"        content="#0E0E0E">
    <meta name="description"           content="Register page">
    <meta name="keywords"              content="register, auth">
    <title>Register – My App</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/template/favicon.svg') }}">
    <link href="{{ asset('assets/css/style.css?v=2.0') }}" rel="stylesheet">
</head>
<body>
    {{-- Pre‑loader (opsional) --}}
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img class="mb-10" src="{{ asset('assets/imgs/template/favicon.svg') }}" alt="GenZ">
                    <div class="preloader-dots"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- HEADER kosong (kalau perlu navbar tambahkan di sini) --}}
    <header class="header sticky-bar">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-xl-1"></div>
                <div class="col-xl-10 col-lg-12">
                    {{-- navbar / logo --}}
                </div>
            </div>
        </div>
    </header>

    {{-- MAIN --}}
    <main class="main">
        <div class="cover-home3">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-lg-12 m-auto">
                        <div class="text-center mt-50 pb-50">
                            <h2 class="color-linear d-inline-block">Register</h2>
                        </div>

                        {{-- BOX ‑ FORM --}}
                        <div class="box-form-login pb-50">
                            <div class="form-login bg-gray-850 border-gray-800 text-start">
                                {{-- Tampilkan error validasi --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $e)
                                                <li>{{ $e }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="POST" action="{{ url('/register') }}">
                                    @csrf

                                    {{-- Nama --}}
                                    <div class="form-group">
                                        <input
                                            class="form-control bg-gray-850 border-gray-800"
                                            type="text"
                                            name="nama"
                                            id="nama"
                                            value="{{ old('nama') }}"
                                            placeholder="Full name"
                                            required>
                                    </div>

                                    {{-- Email --}}
                                    <div class="form-group">
                                        <input
                                            class="form-control bg-gray-850 border-gray-800"
                                            type="email"
                                            name="email"
                                            id="email"
                                            value="{{ old('email') }}"
                                            placeholder="Email"
                                            required>
                                    </div>

                                    {{-- Telepon --}}
                                    <div class="form-group">
                                        <input
                                            class="form-control bg-gray-850 border-gray-800"
                                            type="text"
                                            name="telepon"
                                            id="telepon"
                                            value="{{ old('telepon') }}"
                                            placeholder="Telepon"
                                            required>
                                    </div>

                                    {{-- Password --}}
                                    <div class="form-group position-relative">
                                        <input
                                            class="form-control bg-gray-850 border-gray-800 password"
                                            type="password"
                                            name="password"
                                            id="password"
                                            placeholder="Password"
                                            required>
                                        <span class="viewpass"></span>
                                    </div>

                                    {{-- Konfirmasi Password --}}
                                    <div class="form-group position-relative">
                                        <input
                                            class="form-control bg-gray-850 border-gray-800 password"
                                            type="password"
                                            name="password_confirmation"
                                            id="password_confirmation"
                                            placeholder="Confirm password"
                                            required>
                                        <span class="viewpass"></span>
                                    </div>

                                    {{-- Submit --}}
                                    <div class="form-group">
                                        <input class="btn btn-linear color-gray-850 hover-up" type="submit" value="Create an account">
                                    </div>

                                    {{-- Link login --}}
                                    <div class="form-group mb-0">
                                        <span>Already have an account?</span>
                                        <a class="color-linear" href="{{ route('login') }}"> Sign In</a>
                                    </div>
                                </form>
                            </div>

                            {{-- Separator line & Google sign‑up (opsional) --}}
                            <div class="box-line"><span class="bg-gray-900">Or, sign up with your email</span></div>
                            <div class="box-login-gmail bg-gray-850 border-gray-800 hover-up">
                                <a class="btn btn-login-gmail color-gray-500" href="#">Sign up with Google</a>
                            </div>
                            <div class="box-line">
                                <span class="bg-gray-900">
                                    <a class="color-linear" href="{{ url('/') }}">Back</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- Script vendor & main --}}
    <script src="{{ asset('assets/js/vendors/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/wow.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/text-type.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/jquery.progressScroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js?v=2.0') }}"></script>
</body>
</html>
