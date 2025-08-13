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
        <div class="text-center"><img class="mb-10" src="{{ asset('assets/imgs/template/favicon.svg') }}"
            alt="DiskominfoKab.Malang">
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
            <img class="logo-night" alt="Diskominfo" src="{{ asset('img/rb_30832.png') }}" width="70px">
            <img class="d-none logo-day" alt="Diskominfo" src="{{ asset('img/rb_30832.png') }}" width="70px">
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
  <div class="container mt-70 mb-50">
    <div class="text-center mb-50">
      <h1 class="color-linear mb-20">BIDANG APA SAJA YANG TERSEDIA?</h1>
      <p class="text-lg color-gray-500">
        Berikut adalah bidang-bidang yang tersedia untuk program magang.
      </p>
    </div>

    <div class="row g-4">
      <div class="col-lg-6 wow animate__animated animate__fadeInUp">
        <div class="p-4 bg-gray-850 rounded-xl h-100 shadow-lg">
          <h3 class="color-white mb-15">📊 Statistik dan Data</h3>
          <p class="color-gray-500 mb-3">
            Bidang ini bertugas mengelola data dan informasi statistik yang berkaitan dengan penyelenggaraan pemerintahan daerah. 
            Meliputi pengumpulan, pengolahan, analisis, dan penyajian data dalam bentuk laporan dan visualisasi untuk mendukung pengambilan kebijakan. 
            Bidang ini juga memastikan kualitas data tetap akurat, mutakhir, dan dapat diakses oleh pihak terkait.
          </p>
          <h6 class="color-white mb-10">Tugas Magang:</h6>
          <ul class="list-disc ms-4 color-gray-500">
            <li>Mengolah data statistik daerah.</li>
            <li>Membuat laporan data dalam bentuk tabel/grafik.</li>
            <li>Membantu input data ke sistem informasi statistik.</li>
            <li>Melakukan verifikasi dan validasi data.</li>
          </ul>
          <h6 class="color-white mt-15 mb-10">Jurusan yang Direkomendasikan:</h6>
          <ul class="list-disc ms-4 color-gray-500">
            <li>Statistika</li>
            <li>Matematika</li>
            <li>Sistem Informasi</li>
            <li>Ilmu Komputer</li>
          </ul>
        </div>
      </div>


      <div class="col-lg-6 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
        <div class="p-4 bg-gray-850 rounded-xl h-100 shadow-lg">
          <h3 class="color-white mb-15">💻 Aplikasi dan Informatika</h3>
          <p class="color-gray-500 mb-3">
            Bidang ini fokus pada pengembangan dan pengelolaan aplikasi berbasis web dan mobile yang digunakan oleh pemerintah daerah. 
            Meliputi pembuatan, pemeliharaan, pengujian, dan pembaruan aplikasi untuk mendukung pelayanan publik dan administrasi pemerintahan. 
            Bidang ini juga menangani keamanan dan integrasi sistem.
          </p>
          <h6 class="color-white mb-10">Tugas Magang:</h6>
          <ul class="list-disc ms-4 color-gray-500">
            <li>Membantu pengembangan aplikasi internal.</li>
            <li>Menangani bug dan melakukan pengujian aplikasi.</li>
            <li>Membantu pembuatan dokumentasi teknis.</li>
            <li>Melakukan update dan optimasi fitur aplikasi.</li>
          </ul>
          <h6 class="color-white mt-15 mb-10">Jurusan yang Direkomendasikan:</h6>
          <ul class="list-disc ms-4 color-gray-500">
            <li>Teknik Informatika</li>
            <li>Sistem Informasi</li>
            <li>Ilmu Komputer</li>
            <li>Rekayasa Perangkat Lunak</li>
          </ul>
        </div>
      </div>


      <div class="col-lg-6 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
        <div class="p-4 bg-gray-850 rounded-xl h-100 shadow-lg">
          <h3 class="color-white mb-15">🌐 Infrastruktur Jaringan</h3>
          <p class="color-gray-500 mb-3">
            Bidang ini bertanggung jawab dalam penyediaan, pengelolaan, dan pemeliharaan infrastruktur jaringan komputer serta koneksi internet. 
            Termasuk instalasi perangkat jaringan, pemantauan konektivitas, pengaturan keamanan jaringan, dan troubleshooting gangguan.
          </p>
          <h6 class="color-white mb-10">Tugas Magang:</h6>
          <ul class="list-disc ms-4 color-gray-500">
            <li>Memantau kondisi jaringan dan server.</li>
            <li>Membantu instalasi perangkat jaringan.</li>
            <li>Troubleshooting koneksi internet.</li>
            <li>Membantu konfigurasi router/switch.</li>
          </ul>
          <h6 class="color-white mt-15 mb-10">Jurusan yang Direkomendasikan:</h6>
          <ul class="list-disc ms-4 color-gray-500">
            <li>Teknik Informatika</li>
            <li>Teknik Komputer dan Jaringan</li>
            <li>Sistem Informasi</li>
            <li>Ilmu Komputer</li>
          </ul>
        </div>
      </div>


      <div class="col-lg-6 wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
        <div class="p-4 bg-gray-850 rounded-xl h-100 shadow-lg">
          <h3 class="color-white mb-15">📢 Komunikasi dan Konten</h3>
          <p class="color-gray-500 mb-3">
            Bidang ini mengelola komunikasi publik dan media informasi pemerintah daerah, termasuk media sosial dan website. 
            Meliputi pembuatan konten kreatif, pengelolaan kampanye informasi, serta dokumentasi kegiatan pemerintahan.
          </p>
          <h6 class="color-white mb-10">Tugas Magang:</h6>
          <ul class="list-disc ms-4 color-gray-500">
            <li>Membuat dan mengunggah konten media sosial.</li>
            <li>Mengelola dokumentasi kegiatan.</li>
            <li>Menulis berita atau artikel untuk website.</li>
            <li>Membantu pembuatan desain grafis dan video.</li>
          </ul>
          <h6 class="color-white mt-15 mb-10">Jurusan yang Direkomendasikan:</h6>
          <ul class="list-disc ms-4 color-gray-500">
            <li>Ilmu Komunikasi</li>
            <li>Desain Komunikasi Visual</li>
            <li>Broadcasting</li>
            <li>Jurnalistik</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</main>


  
     
  <footer class="footer">
    <div class="container">
      <div class="footer-1 bg-gray-850 border-gray-800">
        <div class="row">
          <div class="col-lg-4 mb-30"><a class="wow animate__animated animate__fadeInUp" href="{{ url('/') }}"><img
                class="logo-night" src="{{ asset('img/rb_30832.png') }}" width="110px" alt="DiskominfoKab.Malang"><img
                class="d-none logo-day" alt="DiskominfoKab.Malang" src="{{ asset('img/rb_30832.png') }}"
                width="110px"></a>
            <p class="mb-20 mt-20 text-sm color-gray-500 wow animate__animated animate__fadeInUp">Diskominfo Kabupaten Malang bertugas mengelola layanan komunikasi, informatika, persandian, dan statistik untuk mendukung pemerintahan digital dan keterbukaan informasi publik.</p>
            <h6 class="color-white mb-5 wow animate__animated animate__fadeInUp">Alamat</h6>
            <p class="text-sm color-gray-500 wow animate__animated animate__fadeInUp">2J9M+26M, Jl. Agus Salim,
              Kiduldalem, Kec. Klojen, <br>Kota Malang, Jawa Timur 65143</p>
          </div>
          <div class="col-lg-4 mb-30">
            <h6 class="text-lg mb-30 color-white wow animate__animated animate__fadeInUp">Informasi Publik</h6>
            <div class="row">
              <div class="col-12">
                <ul class="menu-footer">
                  <li class="wow animate__animated animate__fadeInUp"><a class="color-gray-500"
                      href="https://kominfo.malangkab.go.id/content/kominfo-struktur-organisasi-3">Struktur Organisasi</a></li>
                  <li class="wow animate__animated animate__fadeInUp"><a class="color-gray-500" href="https://kominfo.malangkab.go.id/content/ttugas-pokok-dan-fungsi">Tugas Pokok dan Fungsi</a></li>
                  <li class="wow animate__animated animate__fadeInUp"><a class="color-gray-500"
                      href="https://kominfo.malangkab.go.id/content/kominfo-opd-visi-misi">VISI MISI</a></li>
                  <li class="wow animate__animated animate__fadeInUp"><a class="color-gray-500"
                      href="https://ppid.malangkab.go.id/home/tugas">Tugas dan Wewenang</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-30">
            <h4 class="text-lg mb-30 color-white wow animate__animated animate__fadeInUp">Lokasi Kami</h4>
            <div class="wow animate__animated animate__fadeInUp">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.159833545226!2d112.6330414!3d-7.9824239000000015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6298e932f9373%3A0xa947325c3d98a709!2sDinas%20Komunikasi%20dan%20Informatika%20Kabupaten%20Malang!5e0!3m2!1sid!2sid!4v1754204241853!5m2!1sid!2sid"
                width="100%" 
                height="250" 
                style="border:0; border-radius: 8px;"
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>
          </div>
        </div>
        <div class="footer-bottom border-gray-800">
          <div class="row">
            <div class="col-lg-5 text-center text-lg-start">
              <p class="text-base color-white wow animate__animated animate__fadeIn">&copy; 2025 <a class="copyright"
                  href="https://kominfo.malangkab.go.id/" target="_blank">Diskominfo Kab.Malang</a></p>
            </div>
            <div class="col-lg-7 text-center text-lg-end">
              <div class="box-socials">
                <div class="d-inline-block mr-30 wow animate__animated animate__fadeIn" data-wow-delay=".0s"><a
                    class="icon-socials icon-twitter color-gray-500" href="https://x.com/kominfokabmlg">Twitter</a></div>
                <div class="d-inline-block mr-30 wow animate__animated animate__fadeIn" data-wow-delay=".2s"><a
                    class="icon-socials icon-linked color-gray-500" href="https://www.facebook.com/Diskominfo.Malangkab/">Facebook</a></div>
                <div class="d-inline-block wow animate__animated animate__fadeIn" data-wow-delay=".4s"><a
                    class="icon-socials icon-insta color-gray-500" href="https://www.instagram.com/kominfokabmlg/">Instagram</a></div>
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