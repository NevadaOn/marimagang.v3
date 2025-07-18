<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mari Magang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="style.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root {
      --bg-primary: #000000;
      --bg-secondary: #043873;
      --text-primary: #ffffff;
      --text-secondary: #000000;
      --card-bg: #ffffff;
      --border-color: #333333;
      --shadow-color: rgba(0, 0, 0, 0.2);
    }

    [data-theme="light"] {
      --bg-primary: #ffffff;
      --bg-secondary: #f8f9fa;
      --text-primary: #000000;
      --text-secondary: #333333;
      --card-bg: #ffffff;
      --border-color: #dee2e6;
      --shadow-color: rgba(0, 0, 0, 0.1);
    }

    body {
      font-family: 'Poppins', sans-serif;
      overflow-x: hidden;
      background-color: var(--bg-primary);
      color: var(--text-primary);
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    .theme-toggle {
      position: fixed;
      top: 20px;
      right: 20px;
      z-index: 1050;
      background: var(--bg-secondary);
      border: 2px solid var(--border-color);
      border-radius: 50px;
      padding: 10px 15px;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px var(--shadow-color);
    }

    .theme-toggle:hover {
      transform: scale(1.1);
      box-shadow: 0 6px 20px var(--shadow-color);
    }

    .theme-toggle i {
      font-size: 1.2rem;
      color: var(--text-primary);
      transition: all 0.3s ease;
    }

    .navbar {
      background-color: var(--bg-primary) !important;
      border-bottom: 1px solid var(--border-color);
    }

    .navbar-brand, .nav-link {
      color: var(--text-primary) !important;
    }

    .bg-black {
      background-color: var(--bg-primary) !important;
    }

    .text-white {
      color: var(--text-primary) !important;
    }

    .text-dark {
      color: var(--text-secondary) !important;
    }

    .card {
      background-color: var(--card-bg) !important;
      border: 1px solid var(--border-color);
      transition: all 0.4s ease;
    }

    .card:hover {
      transform: scale(1.03) translateY(-5px);
      box-shadow: 0 10px 25px var(--shadow-color), 
                  0 0 20px 5px rgba(4, 56, 115, 0.6);
    }

    .logo {
      width: 180px;
      filter: var(--logo-filter, none);
    }

    [data-theme="light"] .logo {
      --logo-filter: brightness(0) invert(1);
    }

    .bg-img {
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    [data-theme="light"] .bg-img {
      background-image: url("img/bg-hitam.png");
    }

    [data-theme="dark"] .bg-img {
      background-image: url("img/bg.png");
    }


    .bg-alur {
      background-image: url('img/ele.png');
      background-size: cover;
      background-position: top;
      background-repeat: no-repeat;
      margin-top: 50px;
      padding: 20px;
      background-color: var(--bg-primary);
    }

    .image-stack {
      position: relative;
      width: 100%;
      max-width: 900px;
      aspect-ratio: 1/1;
      margin: 0 auto;
    }

    .image-stack img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: contain;
      display: block;
      transform-origin: center center;
    }

    .image-stack img.rotate {
      animation: rotate 50s linear infinite;
    }

    .image-stack img.flow {
      animation: flow 70s linear infinite;
    }

    @keyframes rotate {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    @keyframes flow {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(-360deg); }
    }

    #alur-pendaftaran h2 {
      color: var(--text-primary);
    }

    @media (max-width: 576px) {
      .image-stack {
        max-width: 500px;
      }
    }

    .bg-2 {
      background-image: url('{{ asset('img/bg-2.png') }}');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-color: #043873;
    }

    .btn-primary {
      background-color: #043873;
      border: 1px solid #043873;
    }

    .btn-primary:hover {
      background-color: #032c5a;
      border-color: #032c5a;
    }

    .btn-warning {
      background-color: #fff4b1;
      color: black;
      border: none;
    }

    .btn-warning:hover {
      background-color: #ffe97f;
      color: black;
    }

    section {
      opacity: 0;
      transform: translateY(50px);
      animation: sectionFadeIn 1s ease forwards;
      animation-delay: 0.2s;
    }

    @keyframes sectionFadeIn {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .hero-content,
    .hero-image {
      animation: heroSlideUp 1s ease-out forwards;
      opacity: 0;
      transform: translateY(30px);
    }

    @keyframes heroSlideUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .nav-link {
      position: relative;
      transition: all 0.3s ease;
    }

    .nav-link:hover {
      color: #fff4b1 !important;
      transform: translateY(-2px);
    }

    .nav-link::after {
      content: '';
      position: absolute;
      width: 0%;
      height: 2px;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      background-color: #fff4b1;
      transition: width 0.3s ease;
    }

    .nav-link:hover::after {
      width: 100%;
    }

    .btn, .bidang-item, .card {
      transition: all 0.4s ease;
    }

    .btn-primary:hover, .btn-outline-light:hover, .btn-light:hover {
      box-shadow: 0 0 15px 3px rgba(4, 56, 115, 0.8),
                  inset 0 0 5px 1px rgba(255, 255, 255, 0.2);
      transform: translateY(-3px);
    }

    .bidang-item {
      width: 100%;
      aspect-ratio: 2/3;
      background-color: var(--card-bg);
      position: relative;
      overflow: hidden;
      border: 1px solid var(--border-color);
    }

    .bidang-item:hover {
      transform: scale(1.05);
      box-shadow: 0 0 20px 5px rgba(4, 56, 115, 0.7);
    }

    .carousel-control-prev,
    .carousel-control-next {
      bottom: -50px;
      top: auto;
      transition: transform 0.3s ease;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      filter: invert(0);
    }

    .carousel-control-prev:hover,
    .carousel-control-next:hover {
      transform: scale(1.1);
    }

    footer {
      background-color: #043873 !important;
    }

    /* Light theme specific adjustments */
    [data-theme="light"] .navbar {
      box-shadow: 0 2px 10px var(--shadow-color);
    }

    [data-theme="light"] .bg-alur {
      background-color: var(--bg-secondary);
    }

    [data-theme="light"] .bidang-item {
      background-color: #f8f9fa;
    }

    [data-theme="light"] .carousel-control-prev-icon,
    [data-theme="light"] .carousel-control-next-icon {
      filter: invert(1);
    }
  </style>
</head>
<body class="bg-black text-white">
  <!-- Theme Toggle Button -->
  <div class="theme-toggle" onclick="toggleTheme()">
    <i class="bi bi-moon-fill" id="theme-icon"></i>
  </div>

  <nav class="navbar navbar-expand-lg navbar-dark bg-black py-4">
    <div class="container">
        <a class="navbar-brand align-items-center" href="#">
            <img id="logo" class="logo" src="{{ asset('img/logo-hitam.png') }}" alt="Logo Mari Magang">
        </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto me-3">
          <li class="nav-item"><a class="nav-link" href="#beranda">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="#bidang-kerja">Bidang Kerja</a></li>
          <li class="nav-item"><a class="nav-link" href="#tanya-jawab">Tanya Jawab</a></li>
          <li class="nav-item"><a class="nav-link" href="#data-statistik">Data Statistik</a></li>
        </ul>
        <div>
          @if (Route::has('login'))
            <nav class="flex items-center justify-end gap-4">
              @auth
                <a
                  href="{{ url('/dashboard') }}"
                  class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                >
                  Dashboard
                </a>
              @else
                <a
                  href="{{ route('login') }}"
                  class="btn btn-primary"
                >
                  Log in
                </a>

                @if (Route::has('register'))
                  <a
                    href="{{ route('register') }}"
                    class="btn btn-warning me-2">
                    Register
                  </a>
                @endif
              @endauth
            </nav>
          @endif
        </div>
      </div>
    </div>
  </nav>

  <main>
    <section class="py-xl-5 bg-img" id="beranda">
      <div class="container d-flex flex-column flex-lg-row align-items-center justify-content-between gap-4 py-5">
        <div class="w-xl-75 mx-xl-5 hero-content">
          <h1 class="fw-bold mb-4">Halo Peserta Magang</h1>
          <p>Tempat mahasiswa melakukan pendaftaran magang atau PKL di Dinas Komunikasi dan Informatika Kabupaten Malang</p>
          <a href="#" class="btn btn-primary mt-3 p-3">Gabung sekarang →</a>
        </div>
        <div class="hero-image">
          <img src="{{ asset('img/hero.jpg') }}" alt="Ilustrasi kegiatan di Diskominfo" class="img-fluid rounded">
        </div>
      </div>
    </section>

    <section class="py-5 bg-black text-center text-white bg-alur" id="alur-pendaftaran">
      <div class="container">
        <h2 class="fw-bold mb-4">Alur Pendaftaran</h2>
  
        <div class="image-stack">
          <img src="{{ asset('img/anim/3.png') }}" alt="Lapisan Bawah" class="flow" />
          <img src="{{ asset('img/anim/2.png') }}" alt="Lapisan Tengah" class="rotate" />
          <img src="{{ asset('img/anim/1.png') }}" alt="Lapisan Atas" />
        </div>
  
      </div>
    </section>

    <section class="py-5 text-center text-white" id="bidang-kerja">
      <div class="container">
        <h2 class="fw-bold mb-5">BIDANG KERJA</h2>
        <div class="row justify-content-center g-4">
          <div class="col-6 col-sm-4 col-md-2">
            <div class="bg-light rounded-4 shadow bidang-item"></div>
          </div>
          <div class="col-6 col-sm-4 col-md-2">
            <div class="bg-light rounded-4 shadow bidang-item"></div>
          </div>
          <div class="col-6 col-sm-4 col-md-2">
            <div class="bg-light rounded-4 shadow bidang-item"></div>
          </div>
          <div class="col-6 col-sm-4 col-md-2">
            <div class="bg-light rounded-4 shadow bidang-item"></div>
          </div>
          <div class="col-6 col-sm-4 col-md-2">
            <div class="bg-light rounded-4 shadow bidang-item"></div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-5 text-xl-center text-white bg-2" id="tanya-jawab">
      <div class="container m-xl-5 p-xl-5">
        <h1 class="fw-bold mb-3">TANYA JAWAB SEPUTAR MAGANG</h1>
        <p class="mb-4">Pertanyaan umum yang sering ditanyakan oleh para mahasiswa yang ingin mendaftar di Dinas Komunikasi dan Informatika Kabupaten Malang</p>
        <a href="#" class="btn btn-outline-light">
          GABUNG SEKARANG →
        </a>
      </div>
    </section>

    <section class="py-5 text-white text-center mb-3" id="data-statistik">
      <div class="container">
        <h2 class="fw-bold mb-5">DATA PESERTA MARI MAGANG</h2>
        <div id="carouselPeserta" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active px-3">
              <div class="row justify-content-center gx-3">
                <div class="col-12 col-md-3 mb-3">
                  <div class="p-3 bg-white text-dark rounded shadow-sm">
                    <h6>Nama Peserta 1<br />Universitas A</h6>
                    <p>Jurusan Teknik Informatika</p>
                  </div>
                </div>
                <div class="col-12 col-md-3 mb-3">
                  <div class="p-3 bg-primary text-white rounded shadow-sm">
                    <h6>Nama Peserta 2<br />Universitas B</h6>
                    <p>Jurusan Desain Komunikasi Visual</p>
                  </div>
                </div>
                <div class="col-12 col-md-3 mb-3">
                  <div class="p-3 bg-white text-dark rounded shadow-sm">
                    <h6>Nama Peserta 3<br />Universitas C</h6>
                    <p>Jurusan Sistem Informasi</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item px-3">
              <div class="row justify-content-center gx-3">
                <div class="col-12 col-md-3 mb-3">
                  <div class="p-3 bg-primary text-white rounded shadow-sm">
                    <h6>Nama Peserta 4<br />Universitas D</h6>
                    <p>Jurusan Ilmu Komunikasi</p>
                  </div>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <div class="p-3 bg-white text-dark rounded shadow-sm">
                      <h6>Nama Peserta 5<br />Universitas E</h6>
                      <p>Jurusan Manajemen</p>
                    </div>
                </div>
                <div class="col-12 col-md-3 mb-3">
                  <div class="p-3 bg-primary text-white rounded shadow-sm">
                    <h6>Nama Peserta 6<br />Universitas F</h6>
                    <p>Jurusan Hubungan Internasional</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselPeserta" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselPeserta" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </section>

    <section class="py-5 text-white text-start bg-img" style="background-color: #043873;">
      <div class="container m-xl-5 p-3">
        <div class="col-md-6">
          <h1 class="fw-bold mb-3">DATA PESERTA MARI MAGANG</h1>
          <p class="mb-4">wkekwokwokwokwokwok</p>
          <a href="#" class="btn btn-light text-primary">
            Gabung →
          </a>
        </div>
      </div>
    </section>

    <section class="py-5 bg-black text-white text-center m-3">
      <div class="container">
        <h2 class="fw-bold mb-5">Dokumentasi</h2>
        <div id="carouselDokumentasi" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active px-3">
              <div class="row justify-content-center gx-3">
                <div class="col-12 col-md-4 col-lg-3 mb-3">
                  <div class="card bg-white text-dark h-100 rounded">
                    <img src="https://dummyimage.com/400x500/043873/ffffff&text=Kegiatan+1" class="card-img-top" alt="Dokumentasi Kegiatan 1">
                    <div class="card-body text-start">
                      <small class="fw-bold">Pelatihan Jurnalistik Digital</small><br>
                      <small>15 Juni 2025</small>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3 mb-3">
                  <div class="card bg-white text-dark h-100 rounded">
                    <img src="https://dummyimage.com/400x500/043873/ffffff&text=Kegiatan+2" class="card-img-top" alt="Dokumentasi Kegiatan 2">
                    <div class="card-body text-start">
                      <small class="fw-bold">Workshop Keamanan Siber</small><br>
                      <small>18 Juni 2025</small>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3 mb-3">
                  <div class="card bg-white text-dark h-100 rounded">
                    <img src="https://dummyimage.com/400x500/043873/ffffff&text=Kegiatan+3" class="card-img-top" alt="Dokumentasi Kegiatan 3">
                    <div class="card-body text-start">
                      <small class="fw-bold">Kunjungan Industri ke Data Center</small><br>
                      <small>22 Juni 2025</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item px-3">
              <div class="row justify-content-center gx-3">
                <div class="col-12 col-md-4 col-lg-3 mb-3">
                  <div class="card bg-white text-dark h-100 rounded">
                    <img src="https://dummyimage.com/400x500/043873/ffffff&text=Kegiatan+4" class="card-img-top" alt="Dokumentasi Kegiatan 4">
                    <div class="card-body text-start">
                      <small class="fw-bold">Pengembangan Aplikasi Mobile</small><br>
                      <small>25 Juni 2025</small>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3 mb-3">
                  <div class="card bg-white text-dark h-100 rounded">
                    <img src="https://dummyimage.com/400x500/043873/ffffff&text=Kegiatan+5" class="card-img-top" alt="Dokumentasi Kegiatan 5">
                    <div class="card-body text-start">
                      <small class="fw-bold">Manajemen Proyek IT</small><br>
                      <small>28 Juni 2025</small>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3 mb-3">
                  <div class="card bg-white text-dark h-100 rounded">
                    <img src="https://dummyimage.com/400x500/043873/ffffff&text=Kegiatan+6" class="card-img-top" alt="Dokumentasi Kegiatan 6">
                    <div class="card-body text-start">
                      <small class="fw-bold">Presentasi Akhir Magang</small><br>
                      <small>30 Juni 2025</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselDokumentasi" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-light text-black rounded-circle p-2" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselDokumentasi" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-light rounded-circle p-2" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </section>
  </main>

  <footer class="text-white pt-5 pb-3" style="background-color: #043873;">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-4">
          <h4 class="fw-bold">Mari Magang</h4>
          <p class="small">
            Mari Magang hadir untuk cara baru kita belajar dan berkembang. Kami membuka akses pengalaman magang yang lebih baik di seluruh Indonesia.
          </p>
        </div>
        <div class="col-md-4 mb-4">
          <h6 class="fw-bold">Resources</h6>
          <ul class="list-unstyled small">
            <li><a href="#" class="text-white text-decoration-none">Blog</a></li>
            <li><a href="#" class="text-white text-decoration-none">Guides & Tutorials</a></li>
            <li><a href="#" class="text-white text-decoration-none">Help Center</a></li>
          </ul>
        </div>
        <div class="col-md-4 mb-4">
          <h6 class="fw-bold">DISKOMINFO</h6>
          <ul class="list-unstyled small">
            <li><a href="#" class="text-white text-decoration-none">Tentang Kami</a></li>
            <li><a href="#" class="text-white text-decoration-none">Email</a></li>
            <li><a href="#" class="text-white text-decoration-none">Alamat</a></li>
          </ul>
        </div>
      </div>
      <hr class="border-white opacity-25">
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
        <div class="small mb-2 mb-md-0">
          🇮🇩 Bahasa | ©2025 Mari Magang
        </div>
        <div>
          <a href="#" class="text-white me-3" aria-label="Kunjungi halaman Facebook kami"><i class="bi bi-facebook"></i></a>
          <a href="#" class="text-white me-3" aria-label="Kunjungi profil Twitter kami"><i class="bi bi-twitter"></i></a>
          <a href="#" class="text-white" aria-label="Kunjungi profil LinkedIn kami"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    function updateLogo(theme) {
        const logo = document.getElementById('logo');
        if (!logo) return;

        if (theme === 'dark') {
        logo.src = "{{ asset('img/logo.png') }}";
        } else {
        logo.src = "{{ asset('img/logo-hitam.png') }}";
        }
    }

    function toggleTheme() {
        const currentTheme = document.documentElement.getAttribute('data-theme');
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';
        const themeIcon = document.getElementById('theme-icon');

        document.documentElement.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);

        // Update icon
        themeIcon.className = newTheme === 'light' ? 'bi bi-sun-fill' : 'bi bi-moon-fill';

        // Update logo
        updateLogo(newTheme);
    }

    document.addEventListener('DOMContentLoaded', function () {
        const savedTheme = localStorage.getItem('theme') || 'dark';
        const themeIcon = document.getElementById('theme-icon');

        document.documentElement.setAttribute('data-theme', savedTheme);
        themeIcon.className = savedTheme === 'light' ? 'bi bi-sun-fill' : 'bi bi-moon-fill';

        // Set logo saat halaman pertama kali dimuat
        updateLogo(savedTheme);
    });
    </script>

</body>
</html>