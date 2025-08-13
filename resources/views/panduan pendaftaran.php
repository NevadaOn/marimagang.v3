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
  <div class="container mt-70 mb-50">
    <div class="text-center mb-50 wow animate__animated animate__fadeInUp">
      <h1 class="color-linear mb-20">Panduan Magang di Diskominfo Kabupaten Malang</h1>
      <p class="text-lg color-gray-300 max-w-[700px] mx-auto">
        Panduan ini menjelaskan langkah-langkah yang harus dilalui oleh peserta magang, mulai dari pendaftaran hingga selesainya kegiatan.
      </p>
    </div>

    <!-- STEP 1 -->
    <div class="mb-50">
      <h2 class="color-white mb-30 text-center wow animate__animated animate__fadeInUp">1. Pembuatan Akun</h2>

      @php
        $step1 = [
          ['step1-akses.webp','Akses Halaman Masuk','Buka halaman masuk untuk memulai proses pendaftaran.'],
          ['step1-buat.webp','Buat Akun','Pilih opsi <em>Daftar Sekarang</em> untuk mendaftar.'],
          ['step1-registrasi.webp','Lengkapi Registrasi','Isi formulir pendaftaran dengan nama lengkap, email, nomor telepon, dan buat kata sandi.'],
          [['step1-verifikasi.webp','step1-verifikasi (3).webp','step1-verifikasi (2).webp'],'Verifikasi Akun','Lakukan verifikasi email dengan mengklik tautan yang dikirimkan ke alamat email Anda. Tautan verifikasi biasanya akan masuk ke folder spam.'],
          ['step1-login.webp','Login','Setelah akun terverifikasi, Anda bisa login menggunakan username dan password yang telah didaftarkan.']
        ];
      @endphp

      @foreach($step1 as $i => $item)
  <div class="text-center mb-40 wow animate__animated animate__fadeInUp" data-wow-delay=".{{ $i }}s">
    <h4 class="color-white">{!! $item[1] !!}</h4>
    <p class="color-gray-400 max-w-[600px] mx-auto mb-20">{!! $item[2] !!}</p>

    {{-- Kalau ada banyak gambar --}}
    @if(is_array($item[0]))
      <div class="flex flex-wrap justify-center gap-4">
        @foreach($item[0] as $img)
          <img src="{{ asset('assets/imgs/panduan/'.$img) }}" 
               alt="{{ $item[1] }}" 
               class="rounded-lg shadow-lg w-full max-w-[300px]">
        @endforeach
      </div>
    @else
      {{-- Kalau hanya 1 gambar --}}
      <img src="{{ asset('assets/imgs/panduan/'.$item[0]) }}" 
           alt="{{ $item[1] }}" 
           class="rounded-lg shadow-lg w-full max-w-[500px] mx-auto">
    @endif
  </div>
@endforeach



    <!-- STEP 2 -->
    <div class="mb-50">
      <h2 class="color-white mb-30 text-center wow animate__animated animate__fadeInUp">2. Melengkapi Profil dan Pengajuan</h2>

      @php
        $step2 = [
          [['step2-isi-profil.webp','step2-isi-profil (2).webp','step2-isi-profil (3).webp'],'Lengkapi Profil','Setelah login, Anda akan diminta untuk melengkapi profil dan keahlian Anda. Bagian ini mencakup informasi pribadi, data diri, dan keahlian.'],
          ['step2-pengajuan.webp','Buat Pengajuan','Setelah profil lengkap, Anda dapat membuat pengajuan magang baru.'],
          [['step2-tipe.webp','step2-tipe (2).webp'],'Pilih Tipe Pengajuan','Pilih apakah Anda akan mengajukan magang secara mandiri atau berkelompok. Jika berkelompok, Anda harus menambahkan data diri anggota lain.']
        ];
      @endphp

      @foreach($step2 as $i => $item)
  <div class="text-center mb-40 wow animate__animated animate__fadeInUp" data-wow-delay=".{{ $i }}s">
    <h4 class="color-white">{!! $item[1] !!}</h4>
    <p class="color-gray-400 max-w-[600px] mx-auto mb-20">{!! $item[2] !!}</p>

    {{-- Kalau ada banyak gambar --}}
    @if(is_array($item[0]))
      <div class="flex flex-wrap justify-center gap-4">
        @foreach($item[0] as $img)
          <img src="{{ asset('assets/imgs/panduan/'.$img) }}" 
               alt="{{ $item[1] }}" 
               class="rounded-lg shadow-lg w-full max-w-[300px]">
        @endforeach
      </div>
    @else
      {{-- Kalau hanya 1 gambar --}}
      <img src="{{ asset('assets/imgs/panduan/'.$item[0]) }}" 
           alt="{{ $item[1] }}" 
           class="rounded-lg shadow-lg w-full max-w-[500px] mx-auto">
    @endif
  </div>
@endforeach


    <!-- STEP 3 -->
    <div class="mb-50">
      <h2 class="color-white mb-30 text-center wow animate__animated animate__fadeInUp">3. Proses Pengajuan dan Verifikasi</h2>

      @php
        $step3 = [
          [['step3-pantau.webp','step3-pantau (2).webp'],'Pantau Status Pengajuan','Pengajuan Anda akan diproses. Anda perlu memantaunya secara berkala, biasanya prosesnya memakan waktu kurang lebih dua minggu.'],
          [['step3-diterima.webp','step3-diterima (2).webp'],'Pengajuan Diterima','Setelah status pengajuan berubah menjadi "Diterima", Anda akan menerima email notifikasi berisi dokumen yang perlu dicetak.'],
          ['step3-serah-terima.webp','Serah Terima Dokumen','Serahkan surat yang telah dicetak ke Kesbangpol daerah Anda. Kemudian, bawa surat balasan dari Kesbangpol ke kantor Diskominfo untuk serah terima secara langsung.']
        ];
      @endphp

      @foreach($step3 as $i => $item)
  <div class="text-center mb-40 wow animate__animated animate__fadeInUp" data-wow-delay=".{{ $i }}s">
    <h4 class="color-white">{!! $item[1] !!}</h4>
    <p class="color-gray-400 max-w-[600px] mx-auto mb-20">{!! $item[2] !!}</p>

    {{-- Kalau ada banyak gambar --}}
    @if(is_array($item[0]))
      <div class="flex flex-wrap justify-center gap-4">
        @foreach($item[0] as $img)
          <img src="{{ asset('assets/imgs/panduan/'.$img) }}" 
               alt="{{ $item[1] }}" 
               class="rounded-lg shadow-lg w-full max-w-[300px]">
        @endforeach
      </div>
    @else
      {{-- Kalau hanya 1 gambar --}}
      <img src="{{ asset('assets/imgs/panduan/'.$item[0]) }}" 
           alt="{{ $item[1] }}" 
           class="rounded-lg shadow-lg w-full max-w-[500px] mx-auto">
    @endif
  </div>
@endforeach

    <!-- STEP 4 -->
    <div class="mb-50">
      <h2 class="color-white mb-30 text-center wow animate__animated animate__fadeInUp">4. Kegiatan Selama dan Setelah Magang</h2>

      @php
        $step4 = [
          ['step4-logbook.webp','Isi Logbook','Selama masa magang, Anda wajib mengisi logbook kegiatan untuk laporan.'],
          ['step4-sertifikat.webp','Pengambilan Sertifikat','Setelah magang selesai dan sudah di evaluasi, sertifikat dapat diambil langsung di kantor Diskominfo.'],
          ['step4-survei.webp','Isi Survei','Jangan lupa untuk mengisi survei kepuasan yang disediakan.']
        ];
      @endphp

      @foreach($step4 as $i => $item)
  <div class="text-center mb-40 wow animate__animated animate__fadeInUp" data-wow-delay=".{{ $i }}s">
    <h4 class="color-white">{!! $item[1] !!}</h4>
    <p class="color-gray-400 max-w-[600px] mx-auto mb-20">{!! $item[2] !!}</p>

    {{-- Kalau ada banyak gambar --}}
    @if(is_array($item[0]))
      <div class="flex flex-wrap justify-center gap-4">
        @foreach($item[0] as $img)
          <img src="{{ asset('assets/imgs/panduan/'.$img) }}" 
               alt="{{ $item[1] }}" 
               class="rounded-lg shadow-lg w-full max-w-[300px]">
        @endforeach
      </div>
    @else
      {{-- Kalau hanya 1 gambar --}}
      <img src="{{ asset('assets/imgs/panduan/'.$item[0]) }}" 
           alt="{{ $item[1] }}" 
           class="rounded-lg shadow-lg w-full max-w-[500px] mx-auto">
    @endif
  </div>
@endforeach


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