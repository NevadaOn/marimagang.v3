<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="theme-color" content="#0E0E0E">
    <meta name="description" content="Halaman tidak ditemukan - 404">
    <meta name="keywords" content="404, halaman tidak ditemukan">
    <meta name="author" content="DISKOMINFO">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/template/favicon.svg') }}">
    <link href="{{ asset('assets/css/style.css') }}?v=2.0" rel="stylesheet">
    <title>404 - Halaman Tidak Ditemukan</title>
  </head>
  <body>
    <!-- Preloader -->
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

    <!-- Main Content -->
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
                        <img src="{{ asset('assets/imgs/page/404/404.svg') }}" alt="404 Gambar">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="info-404 text-start mt-60">
                        <h2 class="color-linear mb-20">Jangan khawatir!</h2>
                        <p class="text-xl color-gray-500">
                          Halaman yang Anda cari telah masuk ke dunia yang tidak dikenal.<br>
                          Klik tombol di bawah ini untuk kembali ke halaman utama.
                        </p>
                        <div class="mt-25">
                          <a class="btn btn-linear hover-up" href="{{ url('/') }}">Beranda</a>
                          <a class="btn btn-outline-secondary hover-up ms-3" href="javascript:history.back()">Kembali</a>
                        </div>
                      </div>
                    </div>
                  </div> <!-- box-404 -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Scripts -->
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
