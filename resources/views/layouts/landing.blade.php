<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="{{ asset('img/rb_30833.png') }}">
    <link href="{{ asset('assets/css/style.css?v=2.0') }}" rel="stylesheet">
    <title>Mari Magang - Diskominfo Kab.Malang</title>
</head>

<body>
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center"><img class="mb-10" src="{{ asset('assets/imgs/template/favicon.svg') }}"
                        alt="GenZ">
                    <div class="preloader-dots"></div>
                </div>
            </div>
        </div>
    </div>
    <header class="header sticky-bar bg-gray-900">
        <div class="container">
            <div class="main-header">
                <div class="header-logo">
                    <a class="d-flex" href="{{ url('/') }}">
                        <a class="d-flex" href="{{ url('/') }}">
                            <img class="logo-night" alt="Diskominfo" src="{{ asset('img/rb_30832.png') }}" width="70px">
                            <img class="d-none logo-day" alt="Diskominfo" src="{{ asset('img/rb_30832.png') }}" width="70px">
                        </a>
                    </a>
                </div>
                <div class="header-nav">
                    <nav class="nav-main-menu d-none d-xl-block">
                        <ul class="main-menu">
                            <li><a href="{{ url('/') }}#home" data-section="home" class="color-gray-500">Home</a>
                            </li>
                            <li><a href="{{ url('/') }}#alurmagang" data-section="alurmagang"
                                    class="color-gray-500">Alur Magang</a></li>
                            <li> <a class="{{ Request::routeIs('landing.documentation.*') ? 'active' : 'color-gray-500' }}"
                                    href="{{ route('landing.documentation.index') }}">
                                    Dokumentasi
                                </a></li>
                            <li><a class="{{ Request::is('kontak') ? 'active' : 'color-gray-500' }}"
                                    href="{{ route('kontak') }}">Kontak</a></li>
                        </ul>
                    </nav>
                    <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span
                            class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
                </div>
                <div class="header-right text-end">
                    <div class="switch-button">
                        <div class="form-check form-switch">
                            <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox" role="switch"
                                checked="">
                        </div>
                    </div>
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}"
                        class="btn btn-linear d-none d-sm-inline-block hover-up hover-shadow">
                        Dashboard
                    </a>
                    @else
                    <a href="{{ route('login') }}"
                        class="btn btn-linear d-none d-sm-inline-block hover-up hover-shadow">
                        Masuk
                    </a>
                    @endauth
                    @endif
                </div>
            </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-1 bg-gray-850 border-gray-800">
                <div class="row">
                    <div class="col-lg-4 mb-30"><a class="wow animate__animated animate__fadeInUp"
                            href="{{ url('/') }}"><img class="logo-night"
                                src="{{ asset('img/rb_30832.png') }}" width="110px" alt="DiskominfoKab.Malang"><img
                                class="d-none logo-day" alt="DiskominfoKab.Malang"
                                src="{{ asset('img/rb_30832.png') }}" width="110px"></a>
                        <p class="mb-20 mt-20 text-sm color-gray-500 wow animate__animated animate__fadeInUp">Diskominfo
                            Kabupaten Malang bertugas mengelola layanan komunikasi, informatika, persandian, dan
                            statistik untuk mendukung pemerintahan digital dan keterbukaan informasi publik.</p>
                        <h6 class="color-white mb-5 wow animate__animated animate__fadeInUp">Alamat</h6>
                        <p class="text-sm color-gray-500 wow animate__animated animate__fadeInUp">2J9M+26M, Jl. Agus
                            Salim,
                            Kiduldalem, Kec. Klojen, <br>Kota Malang, Jawa Timur 65143</p>
                    </div>
                    <div class="col-lg-4 mb-30">
                        <h6 class="text-lg mb-30 color-white wow animate__animated animate__fadeInUp">Informasi Publik
                        </h6>
                        <div class="row">
                            <div class="col-12">
                                <ul class="menu-footer">
                                    <li class="wow animate__animated animate__fadeInUp"><a class="color-gray-500"
                                            href="https://kominfo.malangkab.go.id/content/kominfo-struktur-organisasi-3">Struktur
                                            Organisasi</a></li>
                                    <li class="wow animate__animated animate__fadeInUp"><a class="color-gray-500"
                                            href="https://kominfo.malangkab.go.id/content/ttugas-pokok-dan-fungsi">Tugas
                                            Pokok dan Fungsi</a></li>
                                    <li class="wow animate__animated animate__fadeInUp"><a class="color-gray-500"
                                            href="https://kominfo.malangkab.go.id/content/kominfo-opd-visi-misi">VISI
                                            MISI</a></li>
                                    <li class="wow animate__animated animate__fadeInUp"><a class="color-gray-500"
                                            href="https://ppid.malangkab.go.id/home/tugas">Tugas dan Wewenang</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-30">
                        <h4 class="text-lg mb-30 color-white wow animate__animated animate__fadeInUp">Lokasi Kami</h4>
                        <div class="wow animate__animated animate__fadeInUp">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.159833545226!2d112.6330414!3d-7.9824239000000015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6298e932f9373%3A0xa947325c3d98a709!2sDinas%20Komunikasi%20dan%20Informatika%20Kabupaten%20Malang!5e0!3m2!1sid!2sid!4v1754204241853!5m2!1sid!2sid" width="100%" height="250"
                                style="border:0; border-radius: 8px;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom border-gray-800">
                    <div class="row">
                        <div class="col-lg-5 text-center text-lg-start">
                            <p class="text-base color-white wow animate__animated animate__fadeIn">© 2025 <a
                                    class="copyright" href="https://kominfo.malangkab.go.id/"
                                    target="_blank">Diskominfo Kab.Malang</a></p>
                        </div>
                        <div class="col-lg-7 text-center text-lg-end">
                            <div class="box-socials">
                                <div class="d-inline-block mr-30 wow animate__animated animate__fadeIn"
                                    data-wow-delay=".0s"><a class="icon-socials icon-twitter color-gray-500"
                                        href="https://x.com/kominfokabmlg">Twitter</a></div>
                                <div class="d-inline-block mr-30 wow animate__animated animate__fadeIn"
                                    data-wow-delay=".2s"><a class="icon-socials icon-linked color-gray-500"
                                        href="https://www.facebook.com/Diskominfo.Malangkab/">Facebook</a></div>
                                <div class="d-inline-block wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                                    <a class="icon-socials icon-insta color-gray-500"
                                        href="https://www.instagram.com/kominfokabmlg/">Instagram</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="progressCounter progressScroll hover-up hover-neon-2">
        <div class="progressScroll-border">
            <div class="progressScroll-circle"><span class="progressScroll-text"><i
                        class="fi-rr-arrow-small-up"></i></span>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
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