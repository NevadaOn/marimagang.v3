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
              <li><a href="{{ url('/') }}#home" data-section="home" class="color-gray-500">Home</a></li>
              <li><a href="{{ url('/') }}#alurmagang" data-section="alurmagang" class="color-gray-500">Alur Magang</a></li>
              <li><a href="{{ url('/') }}#dokumentasi" data-section="dokumentasi" class="color-gray-500">Dokumentasi</a></li>
              <li><a class="{{ Request::is('kontak') ? 'active' : 'color-gray-500' }}" href="{{ route('kontak') }}">Kontak</a></li>
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
    <div class="cover-home1">
      <div class="container">
        <div class="row">
          <div class="col-xl-1"></div>
          <div class="col-xl-10 col-lg-12">
              <div class="pt-30 border-bottom border-gray-800 pb-20">
                <div class="box-breadcrumbs">
                  <ul class="breadcrumb">
                    <li><a class="home" href="index.html">Home</a></li>
                    <li><a href="blog-archive.html">Portfolio</a></li>
                    <li><span>Business Card Design</span></li>
                  </ul>
                </div>
              </div>
              <div class="row mt-50 align-items-end">
                <div class="col-lg-8 m-auto text-center">
                  <h2 class="color-linear">{{ $bidang->nama }}</h2>
                </div>
              </div>
              <div class="row mt-30 mb-50">
                <div class="swiper-container swiper-group-2">
                  <div class="swiper-wrapper wow animate__animated animate__fadeIn">
                    <div class="swiper-slide">
                      <div class="image-detail mb-30"><img class="bdrd16" src="{{ asset('assets/imgs/page/portfolio/portfolio-1.png') }}" alt="Genz"></div>
                    </div>
                    <div class="swiper-slide">
                      <div class="image-detail mb-30"><img class="bdrd16" src="{{ asset('assets/imgs/page/portfolio/portfolio-1-2.png') }}" alt="Genz"></div>
                    </div>
                    <div class="swiper-slide">
                      <div class="image-detail mb-30"><img class="bdrd16" src="{{ asset('assets/imgs/page/portfolio/portfolio-1-3.png') }}" alt="Genz"></div>
                    </div>
                    <div class="swiper-slide">
                      <div class="image-detail mb-30"><img class="bdrd16" src="{{ asset('assets/imgs/page/portfolio/portfolio-1-1.png') }}" alt="Genz"></div>
                    </div>
                  </div>
                  <div class="swiper-pagination"></div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-8">
                  <div class="content-detail border-gray-800">
                    <h3 class="color-white mb-30 wow animate__animated animate__fadeIn">Deskripsi Bidang</h3>
                    <p class="text-lg color-gray-500 wow animate__animated animate__fadeIn">{{ $bidang->deskripsi }}</p>
                    {{-- <p class="text-lg color-gray-500 wow animate__animated animate__fadeIn">Tortor placerat bibendum consequat sapien, facilisi facilisi pellentesque morbi. Id consectetur ut vitae a massa a. Lacus ut bibendum sollicitudin fusce sociis mi. Dictum volutpat praesent ornare accumsan elit venenatis. Congue sodales nunc quis ultricies odio porta. Egestas mauris placerat leo phasellus ut sit.</p> --}}
                    <div class="row mt-50 wow animate__animated animate__fadeIn">
                      <div class="col-lg-6 gallery-left"><img class="img-bdrd-16 mb-30" src="{{ asset('assets/imgs/page/portfolio/portfolio-2.png') }}" alt="Genz"></div>
                      <div class="col-lg-6 gallery-right"><img class="img-bdrd-16 mb-20" src="{{ asset('assets/imgs/page/portfolio/portfolio-3.png') }}" alt="Genz"><img class="img-bdrd-16" src="{{ asset('assets/imgs/page/portfolio/portfolio-4.png') }}" alt="Genz"></div>
                    </div>
                    <p class="text-center text-lg color-gray-500 wow animate__animated animate__fadeIn">The brand identity</p>
                    <h3 class="color-white mt-50 mb-30 wow animate__animated animate__fadeIn">Hire me</h3>
                    <p class="text-lg color-gray-500 wow animate__animated animate__fadeIn">Thirty there & time wear across days, make inside on these you. Can young a really, roses blog small of song their dreamy life pretty? Because really duo living to noteworthy bloom bell. Transform clean daydreaming cute twenty process rooms cool. White white dreamy dramatically place everything although. Place out apartment afternoon whimsical kinder, little romantic joy we flowers handmade. Thirty she a studio of she whimsical projects, afternoon effect going an floated maybe.</p>
                  </div>
                  <div class="box-tags wow animate__animated animate__fadeIn"><a class="btn btn-tags bg-gray-850 border-gray-800 mr-10 hover-up" href="blog-archive.html">#Nature</a><a class="btn btn-tags bg-gray-850 border-gray-800 mr-10 hover-up" href="blog-archive.html">#Beauty</a><a class="btn btn-tags bg-gray-850 border-gray-800 mr-10 hover-up" href="blog-archive.html">#Travel Tips</a><a class="btn btn-tags bg-gray-850 border-gray-800 hover-up" href="blog-archive.html">#House</a></div>
                </div>
                <div class="col-lg-4">
                  <div class="sidebar">
                    <div class="box-sidebar bg-gray-850 border-gray-800">
                      <div class="head-sidebar wow animate__animated animate__fadeIn">
                        <h5 class="line-bottom">Project information</h5>
                      </div>
                      <div class="content-sidebar">
                        <div class="list-comments">
                          <div class="item-comment border-gray-800 wow animate__animated animate__fadeIn">
                            <p class="color-gray-200 mb-10 text-uppercase">Category</p>
                            <p class="color-gray-500">Graphic Design, Marketing Kitsz</p>
                          </div>
                          <div class="item-comment border-gray-800 wow animate__animated animate__fadeIn">
                            <p class="color-gray-200 mb-10 text-uppercase">Client</p>
                            <p class="color-gray-500">Orion Coporation</p>
                          </div>
                          <div class="item-comment border-gray-800 wow animate__animated animate__fadeIn">
                            <p class="color-gray-200 mb-10 text-uppercase">Project date</p>
                            <p class="color-gray-500">01 November, 2022</p>
                          </div>
                          <div class="item-comment border-gray-800 wow animate__animated animate__fadeIn">
                            <p class="color-gray-200 mb-10 text-uppercase">Project URL</p>
                            <p class="color-gray-500"><a class="text-white" href="#">www.orioncoporation.com</a></p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-inline-block pt-10 wow animate__animated animate__fadeIn">
                      <div class="d-flex align-item-center">
                        <h6 class="d-inline-block color-gray-500 mr-10">Share</h6><a class="icon-media icon-fb" href="#"></a><a class="icon-media icon-tw" href="#"></a><a class="icon-media icon-printest" href="#"></a>
                      </div>
                    </div>
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
          <div class="col-lg-4 mb-30">
            <a href="{{ url('/') }}">
              <img class="logo-night" src="{{ asset('img/rb_30832.png') }}" width="110px" alt="DiskominfoKab.Malang">
              <img class="d-none logo-day" src="{{ asset('img/rb_30832.png') }}" width="110px" alt="DiskominfoKab.Malang">
            </a>
            <p class="mt-20 text-sm color-gray-500">
              Diskominfo Kabupaten Malang bertugas mengelola layanan komunikasi, informatika, persandian, dan statistik untuk mendukung pemerintahan digital dan keterbukaan informasi publik.
            </p>
            <h6 class="color-white mb-5">Alamat</h6>
            <p class="text-sm color-gray-500">2J9M+26M, Jl. Agus Salim, Kiduldalem, Kec. Klojen, Kota Malang, Jawa Timur 65143</p>
          </div>
          <div class="col-lg-4 mb-30">
            <h6 class="text-lg mb-30 color-white">Informasi Publik</h6>
            <ul class="menu-footer">
              <li><a class="color-gray-500" href="https://kominfo.malangkab.go.id/content/kominfo-struktur-organisasi-3">Struktur Organisasi</a></li>
              <li><a class="color-gray-500" href="https://kominfo.malangkab.go.id/content/ttugas-pokok-dan-fungsi">Tugas Pokok dan Fungsi</a></li>
              <li><a class="color-gray-500" href="https://kominfo.malangkab.go.id/content/kominfo-opd-visi-misi">Visi Misi</a></li>
              <li><a class="color-gray-500" href="https://ppid.malangkab.go.id/home/tugas">Tugas dan Wewenang</a></li>
            </ul>
          </div>
          <div class="col-lg-4 mb-30">
            <h4 class="text-lg mb-30 color-white">Lokasi Kami</h4>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!..." width="100%" height="250" style="border:0;border-radius:8px;" allowfullscreen loading="lazy"></iframe>
          </div>
        </div>
        <div class="footer-bottom border-gray-800">
          <div class="row">
            <div class="col-lg-5 text-center text-lg-start">
              <p class="text-base color-white">&copy; 2025 <a href="https://kominfo.malangkab.go.id/" target="_blank">Diskominfo Kab.Malang</a></p>
            </div>
            <div class="col-lg-7 text-center text-lg-end">
              <div class="box-socials">
                <a class="icon-socials icon-twitter color-gray-500" href="https://x.com/kominfokabmlg">Twitter</a>
                <a class="icon-socials icon-linked color-gray-500" href="https://www.facebook.com/Diskominfo.Malangkab/">Facebook</a>
                <a class="icon-socials icon-insta color-gray-500" href="https://www.instagram.com/kominfokabmlg/">Instagram</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  {{-- Scripts --}}
  <script src="{{ asset('assets/js/vendors/modernizr-3.6.0.min.js') }}"></script>
  <script src="{{ asset('assets/js/vendors/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('assets/js/vendors/jquery-migrate-3.3.0.min.js') }}"></script>
  <script src="{{ asset('assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/vendors/waypoints.js') }}"></script>
  <script src="{{ asset('assets/js/vendors/wow.js') }}"></script>
  <script src="{{ asset('assets/js/vendors/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/vendors/jquery.progressScroll.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js?v=2.0') }}"></script>

</body>
</html>