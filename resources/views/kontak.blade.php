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
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/template/rb_3083.svg') }}">
  <link href="{{ asset('assets/css/style.css?v=2.0') }}" rel="stylesheet">
  <title>Mari Magang - Diskominfo Kab.Malang</title>
</head>

<body>
  <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
      <div class="preloader-inner position-relative">
        <div class="text-center"><img class="mb-10" src="{{ asset('assets/imgs/template/favicon.svg') }}" alt="GenZ">
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
            <img class="logo-night" alt="Diskominfo" src="{{ asset('assets/imgs/template/rb_3083.svg') }}" width="90px">
            <img class="d-none logo-day" alt="Diskominfo" src="{{ asset('assets/imgs/template/rb_3083.svg') }}" width="90px">
          </a>
        </div>
        <div class="header-nav">
          <nav class="nav-main-menu d-none d-xl-block">
            <ul class="main-menu">
              <li><a class="color-gray-500" href="{{ route('welcome') }}">Home</a></li>

              </li>
              <li><a class="color-gray-500" href="#bidangKerja">Alur Magang</a>

              </li>
              <li><a class="color-gray-500" href="#dokumentasi">Dokumentasi</a>

              </li>

              <li><a class="active" href="page-contact.html">Contact</a></li>
            </ul>
          </nav>
          <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span
              class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
        </div>
        <div class="header-right text-end">
          <div class="switch-button">
            <div class="form-check form-switch">
              <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox" role="switch" checked="">
            </div>
          </div>

          @if (Route::has('login'))
          @auth
        <a href="{{ url('/dashboard') }}" class="btn btn-linear d-none d-sm-inline-block hover-up hover-shadow">
        Dashboard
        </a>
        @else
        <a href="{{ route('login') }}" class="btn btn-linear d-none d-sm-inline-block hover-up hover-shadow">
        Masuk
        </a>
        @endauth
      @endif

        </div>
      </div>
  </header>

  <main class="main">
    <div class="cover-home3">
      <div class="container">
        <div class="row">
          <div class="col-xl-10 col-lg-12 m-auto">
            <div class="text-center mt-70">
              <h1 class="color-linear d-inline-block mb-30">Contact Us</h1>
              <p class="text-xl color-gray-500">Diskominfo Kabupaten Malang<br class="d-none d-lg-block">Kominfo
                (Kementerian Komunikasi dan Informatika) adalah lembaga pemerintah yang <br
                  class="d-none d-lg-block">bertugas mengatur dan mengawasi bidang komunikasi, informatika, serta media
                digital di Indonesia.<br
                  class="d-none d-lg-block"> Kominfo juga mendorong transformasi digital dan perlindungan data masyarakat.</p>
            </div>
            <div class="text-center mt-30">
              <div class="d-inline-block support text-start">087927364529<br>+6237564738475</div>
              <div class="d-inline-block location text-start">contact@kominfo.com<br>pkl@unira_malang.com</div>
              <div class="d-inline-block plane text-start">pklUnira<br>unira_malang</div>
            </div>
            <div class="box-map mt-70 mb-50">
              <iframe class="google-map"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.159833545226!2d112.6330414!3d-7.9824239000000015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6298e932f9373%3A0xa947325c3d98a709!2sDinas%20Komunikasi%20dan%20Informatika%20Kabupaten%20Malang!5e0!3m2!1sid!2sid!4v1753553607424!5m2!1sid!2sid"
                style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="form-contact">
              <div class="text-center">
                <h3 class="color-linear d-inline-block mb-10">Hubungi Kami</h3>
                <p class="text-xs color-gray-500">Isi semua kolom dibawah ini*</p>
              </div>
              <div class="row mt-50">
                <div class="col-lg-6">
                  <div class="form-group">
                    <input class="form-control bg-gray-850 border-gray-800 color-gray-500" type="text"
                      placeholder="Your name *">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <input class="form-control bg-gray-850 border-gray-800 color-gray-500" type="text"
                      placeholder="Email *">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <input class="form-control bg-gray-850 border-gray-800 color-gray-500" type="text"
                      placeholder="Phone number *">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <input class="form-control bg-gray-850 border-gray-800 color-gray-500" type="text"
                      placeholder="Subject *">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <textarea class="form-control bg-gray-850 border-gray-800 color-gray-500" rows="5"
                      placeholder="Message *"></textarea>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="text-center mb-50"><a class="btn btn-linear btn-load-more btn-radius-8 hover-up">
                      Send Message
                      <i class="fi-rr-arrow-small-right"></i></a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer class="footer">
    <div class="container">
      <div class="footer-1 bg-gray-850 border-gray-800">
        <div class="row">
          <div class="col-lg-4 mb-30"><a class="wow animate__animated animate__fadeInUp" href="index.html"><img
                class="logo-night" src="{{ asset('assets/imgs/template/rb_3083.svg') }}" width="110px" alt="Genz"><img
                class="d-none logo-day" alt="GenZ" src="{{ asset('assets/imgs/template/rb_3083.svg') }}" width="110px"></a>
            <p class="mb-20 mt-20 text-sm color-gray-500 wow animate__animated animate__fadeInUp">Kementerian Komunikasi
              dan Informatika, yang merupakan kementerian dalam pemerintahan Indonesia yang bertanggung jawab atas
              urusan di bidang komunikasi dan informatika. </p>
            <h6 class="color-white mb-5 wow animate__animated animate__fadeInUp">Address</h6>
            <p class="text-sm color-gray-500 wow animate__animated animate__fadeInUp">2J9M+26M, Jl. Agus Salim,
              Kiduldalem, Kec. Klojen, <br>Kota Malang, Jawa Timur 65143</p>
          </div>
          <div class="col-lg-4 mb-30">
            <h6 class="text-lg mb-30 color-white wow animate__animated animate__fadeInUp">All Link</h6>
            <div class="row">
              <div class="col-6">
                <ul class="menu-footer">
                  <li class="wow animate__animated animate__fadeInUp"><a class="color-gray-500"
                      href="index.html">Home</a></li>
                  <li class="wow animate__animated animate__fadeInUp"><a class="color-gray-500" href="#bidangKerja">Alur
                      Magang</a></li>
                  <li class="wow animate__animated animate__fadeInUp"><a class="color-gray-500"
                      href="#dokumentasi">Dokumentasi</a></li>
                  <li class="wow animate__animated animate__fadeInUp"><a class="color-gray-500"
                      href="page-404.html">404</a></li>

                </ul>
              </div>
              <div class="col-6">
                <ul class="menu-footer">
                  <li class="wow animate__animated animate__fadeInUp"><a class="color-gray-500" href="#">Contact</a>
                  </li>
                  <li class="wow animate__animated animate__fadeInUp"><a class="color-gray-500"
                      href="page-login.html">Login</a></li>
                  <li class="wow animate__animated animate__fadeInUp"><a class="color-gray-500"
                      href="page-signup.html">Sign-Up</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-30">
            <h4 class="text-lg mb-30 color-white wow animate__animated animate__fadeInUp">Newsletter</h4>
            <p class="text-base color-gray-500 wow animate__animated animate__fadeInUp">Daftar disini, Raih kesempatan
              magang yang berkualitas.</p>
            <div class="form-newsletters mt-15 wow animate__animated animate__fadeInUp">
              <form action="#">
                <div class="form-group">
                  <input class="input-name border-gray-500" type="text" placeholder="Your name">
                </div>
                <div class="form-group">
                  <input class="input-email border-gray-500" type="email" placeholder="Emaill address">
                </div>
                <div class="form-group mt-20">
                  <button class="btn btn-linear hover-up">
                    Daftar
                    <i class="fi-rr-arrow-small-right"></i>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="footer-bottom border-gray-800">
          <div class="row">
            <div class="col-lg-5 text-center text-lg-start">
              <p class="text-base color-white wow animate__animated animate__fadeIn">© Created by<a class="copyright"
                  href="#" target="_blank"> PKL Unira Malang</a></p>
            </div>
            <div class="col-lg-7 text-center text-lg-end">
              <div class="box-socials">
                <div class="d-inline-block mr-30 wow animate__animated animate__fadeIn" data-wow-delay=".0s"><a
                    class="icon-socials icon-twitter color-gray-500" href="https://twitter.com">Twitter</a></div>
                <div class="d-inline-block mr-30 wow animate__animated animate__fadeIn" data-wow-delay=".2s"><a
                    class="icon-socials icon-linked color-gray-500" href="https://www.linkedin.com">LinkedIn</a></div>
                <div class="d-inline-block wow animate__animated animate__fadeIn" data-wow-delay=".4s"><a
                    class="icon-socials icon-insta color-gray-500" href="https://www.instagram.com">Instagram</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <div class="progressCounter progressScroll hover-up hover-neon-2">
    <div class="progressScroll-border">
      <div class="progressScroll-circle"><span class="progressScroll-text"><i class="fi-rr-arrow-small-up"></i></span>
      </div>
    </div>
  </div>
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