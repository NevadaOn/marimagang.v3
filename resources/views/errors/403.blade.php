<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="theme-color" content="#0E0E0E" />
    <meta name="description" content="403 - Akses Ditolak" />
    <meta name="keywords" content="403, akses ditolak, forbidden" />
    <meta name="author" content="Diskominfo" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/template/favicon.svg') }}" />
    <link href="{{ asset('assets/css/style.css') }}?v=2.0" rel="stylesheet" />
    <title>403 - Akses Ditolak</title>

    <style>
        .cover-home3 {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .box-page-404 {
            margin: 0;
        }
        .btn-home {
            display: inline-block;
            padding: 15px 30px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            font-weight: 600;
        }
        .btn-home:hover {
            background: rgba(255, 255, 255, 0.4);
            border-color: rgba(255, 255, 255, 0.5);
            color: #000;
        }
    </style>
</head>
<body>
    <main class="main">
        <div class="cover-home3 shadow-page-404">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-lg-12 ml-auto mr-auto">
                        <div class="box-page-404">
                            <div class="text-center mb-150 mt-100">
                                <div class="box-404 row">
                                    <!-- floating shapes dan container pesan -->
                                    <div class="col-lg-6 mx-auto">
                                        <div class="floating-shapes">
                                            <div class="shape"></div>
                                            <div class="shape"></div>
                                            <div class="shape"></div>
                                            <div class="shape"></div>
                                        </div>

                                        <div class="container text-center" style="color: white; margin-top: 20px;">
                                            <div class="lock-icon" style="margin-bottom: 20px;">
                                                <img src="{{ asset('img/logo-kominfo.png') }}" alt="kominfo" width="150" />
                                            </div>

                                            <div class="error-code" style="font-size: 8rem; font-weight: bold; text-shadow: 0 0 20px rgba(255,255,255,0.5); margin-bottom: 1rem;">
                                                403
                                            </div>

                                            <h1 class="error-title" style="font-size: 2.5rem; margin-bottom: 1rem;">
                                                Akses Ditolak
                                            </h1>

                                            <p class="error-message" style="font-size: 1.2rem; margin-bottom: 2rem; opacity: 0.9;">
                                                Maaf, Anda tidak memiliki izin untuk mengakses halaman ini.<br />
                                                Silakan hubungi administrator jika Anda merasa ini adalah kesalahan.
                                            </p>

                                            <a href="{{ url('/') }}" class="btn-home">
                                                Kembali ke Beranda
                                            </a>
                                        </div>
                                    </div>
                                </div> <!-- /.box-404 -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Script pendukung -->
    <script src="{{ asset('assets/js/vendors/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/wow.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/text-type.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/jquery.progressScroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}?v=2.0"></script>
</body>
</html>
