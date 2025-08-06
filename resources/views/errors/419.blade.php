<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#0E0E0E">
    <meta name="description" content="419 - Halaman Kedaluwarsa">
    <meta name="keywords" content="419, halaman kadaluarsa, session timeout">
    <meta name="author" content="Your Company">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/template/favicon.svg') }}">
    <link href="{{ asset('assets/css/style.css') }}?v=2.0" rel="stylesheet">
    <title>419 - Sesi Kedaluwarsa</title>
</head>
<body>
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img class="mb-10" src="{{ asset('assets/imgs/template/favicon.svg') }}" alt="Logo">
                    <div class="preloader-dots"></div>
                </div>
            </div>
        </div>
    </div>

    <main class="main">
        <div class="cover-home3 shadow-page-404">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-lg-12 ml-auto mr-auto">
                        <div class="box-page-404">
                            <div class="text-center mb-150 mt-100">
                                <div class="box-404 row">
                                    <div class="col-lg-6">
                                        <div class="image-404">
                                            <img src="{{ asset('assets/imgs/page/404/sesi.png') }}" alt="Sesi Kedaluwarsa">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="info-404 text-start mt-60">
                                            <h2 class="color-linear mb-20">Sesi Telah Berakhir</h2>
                                            <p class="text-xl color-gray-500">
                                                Maaf, sesi Anda telah kedaluwarsa karena alasan keamanan.<br>
                                                Hal ini terjadi ketika halaman tidak digunakan cukup lama<br>
                                                atau token keamanan telah habis masa berlakunya.
                                            </p>
                                            <div class="mt-25 d-flex gap-3 flex-wrap">
                                                <a class="btn btn-linear hover-up" href="{{ url('/') }}">Beranda</a>
                                                <a class="btn btn-linear hover-up" href="{{ url('/login') }}">Muat ulang</a>
                                            </div>
                                            <div class="mt-30 text-muted small" id="countdown-text">
                                                Mengalihkan ke halaman login dalam 10 detik...
                                            </div>
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

    <script>
        let countdown = 10;
        const countdownElement = document.getElementById('countdown-text');

        const timer = setInterval(() => {
            countdown--;
            countdownElement.textContent = `Mengalihkan ke halaman login dalam ${countdown} detik...`;

            if (countdown <= 0) {
                clearInterval(timer);
                window.location.href = "{{ url('/login') }}"; // Redirect ke halaman login
            }
        }, 1000);
    </script>

    <!-- Script bawaan -->
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
