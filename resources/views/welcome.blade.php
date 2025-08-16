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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <title>Mari Magang - Diskominfo Kab.Malang</title>
</head>

<body>
  <!-- Preloader -->
  <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
      <div class="preloader-inner position-relative">
        <div class="text-center">
          <img class="mb-10" src="{{ asset('assets/imgs/template/favicon.svg') }}" alt="DiskominfoKab.Malang">
          <div class="preloader-dots"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Header -->
  <header class="header sticky-bar bg-gray-900">
    <div class="container">
      <div class="main-header">
        <!-- Logo -->
        <div class="header-logo">
          <a class="d-flex" href="{{ url('/') }}">
            <img class="logo-night" alt="Diskominfo" src="{{ asset('img/rb_30832.png') }}" width="70px">
            <img class="d-none logo-day" alt="Diskominfo" src="{{ asset('img/rb_30832.png') }}" width="70px">
          </a>
        </div>

        <!-- Navigation -->
        <div class="header-nav">
          <nav class="nav-main-menu d-none d-xl-block">
            <ul class="main-menu">
              <li><a href="#home" data-section="home" class="color-gray-500">Home</a></li>
              <li><a href="#alurmagang" data-section="alurmagang" class="color-gray-500">Alur Magang</a></li>
              <li><a href="#dokumentasi" data-section="dokumentasi" class="color-gray-500">Dokumentasi</a></li>
              <li><a class="{{ Request::is('kontak') ? 'active' : 'color-gray-500' }}" href="{{ route('kontak') }}">Kontak</a></li>
            </ul>
          </nav>
          <div class="burger-icon burger-icon-white">
            <span class="burger-icon-top"></span>
            <span class="burger-icon-mid"></span>
            <span class="burger-icon-bottom"></span>
          </div>
        </div>

        <!-- Header Right -->
        <div class="header-right text-end">
          <div class="switch-button">
            <div class="form-check form-switch">
              <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox" role="switch" checked>
            </div>
          </div>
          @if (Route::has('login'))
            @auth
              <a href="{{ url('/dashboard') }}" class="btn btn-linear d-none d-sm-inline-block hover-up hover-shadow">Dashboard</a>
            @else
              <a href="{{ route('login') }}" class="btn btn-linear d-none d-sm-inline-block hover-up hover-shadow">Masuk</a>
            @endauth
          @endif
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="main">
    <div class="cover-home1">
      <div class="container">
        <div class="row">
          <div class="col-xl-1"></div>
          <div class="col-xl-10 col-lg-12">
            
            <!-- Hero Section -->
            <div class="banner" id="home">
              <div class="row align-items-end">
                <div class="col-lg-6 pt-100">
                  <span class="text-sm-bold color-gray-600 wow animate__animated animate__fadeInUp">Selamat Datang Semua!</span>
                  <h1 class="color-gray-50 mt-20 mb-20 wow animate__animated animate__fadeInUp">
                    Mari<a class="typewrite color-linear" href="#" data-period="3000" data-type='[ "Magang", "Berkarier", "Berkembang" ]'></a>
                  </h1>
                  <div class="row">
                    <div class="col-lg-9">
                      <p class="text-base color-gray-600 wow animate__animated animate__fadeInUp">
                        Mari kembangkan potensimu bersama kami melalui berbagai kesempatan magang yang menarik dan relevan untuk mahasiswa seperti kamu.
                      </p>
                    </div>
                  </div>
                  
                  <!-- Subscribe Form -->
                  <div class="box-subscriber mt-40 mb-50 wow animate__animated animate__fadeInUp">
                    <div class="inner-subscriber bg-gray-800">
                      <form class="d-flex" action="{{ route('register') }}" method="GET">
                        <input class="input-sybscriber" type="text" name="email" placeholder="Masukkan email anda">
                        <button class="btn btn-linear btn-arrow-right">
                          Gabung <i class="fi-rr-arrow-small-right"></i>
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
                
                <div class="col-lg-6 text-center">
                  <div class="banner-img position-relative wow animate__animated animate__fadeIn">
                    <img src="{{asset('img/aarr1.png')}}" alt="DiskominfoKab.Malang">
                    <div class="pattern-1"><img src="assets/imgs/template/pattern-1.svg" alt="DiskominfoKab.Malang"></div>
                    <div class="pattern-2"><img src="assets/imgs/template/pattern-2.svg" alt="DiskominfoKab.Malang"></div>
                    <div class="pattern-3"><img src="assets/imgs/template/pattern-3.svg" alt="DiskominfoKab.Malang"></div>
                    <div class="pattern-4"><img src="assets/imgs/template/pattern-4.svg" alt="DiskominfoKab.Malang"></div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Work Fields Section -->
            <div class="mb-70">
              <div class="box-topics border-gray-800 bg-gray-850">
                <div class="row">
                  <div class="col-lg-2">
                    <h5 class="mb-15 color-white wow animate__animated animate__fadeInUp">Bidang Kerja</h5>
                    <p class="color-gray-500 mb-20 wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                      Bidang kerja ini adalah bidang kerja yang berada pada layanan kami.
                    </p>
                    <div class="box-buttons-slider position-relative wow animate__animated animate__zoomIn">
                      <div class="swiper-button-prev swiper-button-prev-style-1"></div>
                      <div class="swiper-button-next swiper-button-next-style-1"></div>
                    </div>
                  </div>
                  <div class="col-lg-10">
                    <div class="box-swiper">
                      <div class="swiper-container swiper-group-5">
                        <div class="swiper-wrapper">
                          @forelse ($bidangs as $index => $bidang)
                            <div class="swiper-slide">
                              <div class="card-style-1">
                                <a href="{{ route('bidang.show', $bidang->slug) }}">
                                  <div class="card-image card-image-fixed">
                                    @if ($bidang->thumbnail)
                                      <img src="{{ asset('storage/' . $bidang->thumbnail) }}" alt="{{ $bidang->nama }}" class="card-img-uniform">
                                    @else
                                      <img src="{{ asset('assets/imgs/page/homepage1/default.svg') }}" alt="{{ $bidang->nama }}" class="card-img-uniform">
                                    @endif
                                    <div class="card-info">
                                      <div class="info-bottom">
                                        <h6 class="color-white mb-5">{{ $bidang->nama }}</h6>
                                        <p class="text-xs color-gray-500">
                                          @if(isset($bidang->lowongan_count))
                                            {{ $bidang->lowongan_count }} Lowongan
                                          @else
                                            {{ Str::limit($bidang->deskripsi, 50) }}
                                          @endif
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                </a>
                              </div>
                            </div>
                          @empty
                            <div class="swiper-slide">
                              <div class="card-style-1">
                                <div class="card-image">
                                  <img src="{{ asset('assets/imgs/page/homepage1/Comingsoon.svg') }}" alt="Coming Soon">
                                  <div class="card-info">
                                    <div class="info-bottom">
                                      <h6 class="color-white mb-5">Belum Ada Bidang</h6>
                                      <p class="text-xs color-gray-500">Sedang dalam pengembangan...</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          @endforelse
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Internship Process Section -->
            <section id="alurmagang">
              <h2 class="color-linear d-inline-block mb-10 wow animate__animated animate__fadeInUp">Alur Magang</h2>
              <p class="text-lg color-gray-500 wow animate__animated animate__fadeInUp">
                Tahapan proses pendaftaran dan pelaksanaan magang di Diskominfo
              </p>
              
              <div class="box-features bg-gray-850 border-gray-800 mt-70">
                <div class="row">
                  @php
                    $steps = [
                      ['icon' => 'icon-motion', 'title' => '1. Registrasi & Login', 'description' => 'Calon peserta membuat akun dan login ke sistem untuk memulai proses pendaftaran magang.'],
                      ['icon' => 'icon-ui', 'title' => '2. Lengkapi Profil', 'description' => 'Peserta melengkapi data diri, keahlian, dan dokumen pendukung seperti CV dan surat pengantar.'],
                      ['icon' => 'icon-branding', 'title' => '3. Ajukan Permohonan', 'description' => 'Peserta mengajukan permohonan magang dan memilih bidang yang diminati.'],
                      ['icon' => 'icon-social', 'title' => '4. Verifikasi Admin Dinas', 'description' => 'Admin Dinas memeriksa kelengkapan data dan kesesuaian permohonan magang.'],
                      ['icon' => 'icon-social', 'title' => '5. Persetujuan Bidang', 'description' => 'Bidang yang dituju memverifikasi dan memberikan persetujuan atau penolakan berdasarkan kuota dan kebutuhan.'],
                      ['icon' => 'icon-social', 'title' => '6. Pelaksanaan Magang', 'description' => 'Peserta yang diterima menjalankan kegiatan magang sesuai penempatan dan jadwal yang ditentukan.'],
                      ['icon' => 'icon-social', 'title' => '7. Magang Selesai', 'description' => 'Magang dinyatakan selesai setelah peserta memenuhi seluruh tugas dan durasi yang ditentukan.'],
                      ['icon' => 'icon-social', 'title' => '8. Evaluasi', 'description' => 'Peserta menerima evaluasi kinerja dan umpan balik dari pembimbing serta admin bidang.']
                    ];
                  @endphp

                  @foreach($steps as $index => $step)
                    <div class="col-lg-4 col-md-6 mb-50 wow animate__animated animate__fadeIn" data-wow-delay="{{ $index * 0.1 }}s">
                      <span class="item-icon bg-gray-950 {{ $step['icon'] }}"></span>
                      <h5 class="color-white mb-15">{{ $step['title'] }}</h5>
                      <p class="text-base color-gray-700">{{ $step['description'] }}</p>
                    </div>
                  @endforeach
                </div>
              </div>
            </section>

            <!-- Statistics Section -->
            <section id="statistik">
              <div class="row mt-70">
                <h2 class="color-linear d-inline-block mb-10">Statistik Mahasiswa Magang</h2>
                <p class="text-lg color-gray-500">
                  Lihat total dan distribusi mahasiswa magang aktif berdasarkan bidang dan universitas.
                </p>

                <div class="container my-5">
                  @php
                    $stats = [
                      ['title' => 'Total Pengajuan Magang', 'value' => \App\Models\Anggota::count()],
                      ['title' => 'Mahasiswa Magang Aktif', 'value' => \App\Models\Pengajuan::where('status', 'magang')->count()],
                      ['title' => 'Jumlah Bidang', 'value' => \App\Models\DataBidang::count()],
                      ['title' => 'Total Universitas', 'value' => \App\Models\Universitas::count()]
                    ];
                  @endphp

                  <div class="row text-center">
                    @foreach($stats as $stat)
                      <div class="col-md-3 mb-4">
                        <div class="p-3 rounded-xl border bg-gray-850 border-gray-800 shadow-sm text-center">
                          <h6 class="text-muted mb-1">{{ $stat['title'] }}</h6>
                          <h4 class="color-white">{{ $stat['value'] }}</h4>
                        </div>
                      </div>
                    @endforeach
                  </div>

                  <div class="row mt-4">
                    <div class="col-12 mb-4 d-flex">
                      <div class="flex-fill d-flex flex-column p-3 rounded-xl border bg-gray-850 border-gray-800 shadow-sm w-100">
                        <h6 class="text-center text-muted mb-3">Distribusi Mahasiswa Magang Aktif Berdasarkan Bidang</h6>
                        <div class="flex-grow-1 position-relative" style="min-height: 300px;">
                          <canvas id="barChart" class="w-100 h-100"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>

            <!-- Documentation Section -->
            <section id="dokumentasi">
              <div class="row mt-70">
                <h2 class="color-linear d-inline-block mb-10">Dokumentasi Kegiatan</h2>
                <p class="text-lg color-gray-500">Mari magang bersama kami</p>
                
                <div class="col-lg-12">
                  <div class="content-detail border-gray-800">
                    @php
                      $docs = \App\Models\Documentation::with('images')->latest()->get();
                      $allImages = [];
                      foreach ($docs as $doc) {
                        foreach ($doc->images as $image) {
                          $allImages[] = [
                            'path' => $image->image_path,
                            'title' => $doc->judul_kegiatan ?? 'Tanpa Judul',
                            'docId' => $doc->id,
                          ];
                        }
                      }
                    @endphp

                    <div class="masonry-grid">
                      <div class="masonry-sizer"></div>
                      @foreach($allImages as $img)
                        <div class="masonry-item">
                          <a href="{{ route('landing.documentation.show', $img['docId']) }}">
                            <img class="image-masonry" src="{{ asset('storage/' . $img['path']) }}" alt="{{ $img['title'] }}">
                          </a>
                        </div>
                      @endforeach
                    </div>

                    <div class="mt-20 text-center">
                      <a class="btn btn-primary" href="{{ route('landing.documentation.index') }}">Lihat Semua Dokumentasi</a>
                    </div>
                  </div>
                </div>
              </div>
            </section>

          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="footer-1 bg-gray-850 border-gray-800">
        <div class="row">
          <div class="col-lg-4 mb-30">
            <a class="wow animate__animated animate__fadeInUp" href="{{ url('/') }}">
              <img class="logo-night" src="{{ asset('img/rb_30832.png') }}" width="110px" alt="DiskominfoKab.Malang">
              <img class="d-none logo-day" alt="DiskominfoKab.Malang" src="{{ asset('img/rb_30832.png') }}" width="110px">
            </a>
            <p class="mb-20 mt-20 text-sm color-gray-500 wow animate__animated animate__fadeInUp">
              Diskominfo Kabupaten Malang bertugas mengelola layanan komunikasi, informatika, persandian, dan statistik untuk mendukung pemerintahan digital dan keterbukaan informasi publik.
            </p>
            <h6 class="color-white mb-5 wow animate__animated animate__fadeInUp">Alamat</h6>
            <p class="text-sm color-gray-500 wow animate__animated animate__fadeInUp">
              2J9M+26M, Jl. Agus Salim, Kiduldalem, Kec. Klojen, <br>Kota Malang, Jawa Timur 65143
            </p>
          </div>
          
          <div class="col-lg-4 mb-30">
            <h6 class="text-lg mb-30 color-white wow animate__animated animate__fadeInUp">Informasi Publik</h6>
            <div class="row">
              <div class="col-12">
                <ul class="menu-footer">
                  @php
                    $footerLinks = [
                      ['title' => 'Struktur Organisasi', 'url' => 'https://kominfo.malangkab.go.id/content/kominfo-struktur-organisasi-3'],
                      ['title' => 'Tugas Pokok dan Fungsi', 'url' => 'https://kominfo.malangkab.go.id/content/ttugas-pokok-dan-fungsi'],
                      ['title' => 'VISI MISI', 'url' => 'https://kominfo.malangkab.go.id/content/kominfo-opd-visi-misi'],
                      ['title' => 'Tugas dan Wewenang', 'url' => 'https://ppid.malangkab.go.id/home/tugas']
                    ];
                  @endphp
                  @foreach($footerLinks as $link)
                    <li class="wow animate__animated animate__fadeInUp">
                      <a class="color-gray-500" href="{{ $link['url'] }}">{{ $link['title'] }}</a>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          
          <div class="col-lg-4 mb-30">
            <h4 class="text-lg mb-30 color-white wow animate__animated animate__fadeInUp">Lokasi Kami</h4>
            <div class="wow animate__animated animate__fadeInUp">
              <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.159833545226!2d112.6330414!3d-7.9824239000000015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6298e932f9373%3A0xa947325c3d98a709!2sDinas%20Komunikasi%20dan%20Informatika%20Kabupaten%20Malang!5e0!3m2!1sid!2sid!4v1754204241853!5m2!1sid!2sid"
                width="100%"
                height="250"
                style="border:0; border-radius: 8px;"
                allowfullscreen
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>
          </div>
        </div>
        
        <div class="footer-bottom border-gray-800">
          <div class="row">
            <div class="col-lg-5 text-center text-lg-start">
              <p class="text-base color-white wow animate__animated animate__fadeIn">
                &copy; 2025 <a class="copyright" href="https://kominfo.malangkab.go.id/" target="_blank">Diskominfo Kab.Malang</a>
              </p>
            </div>
            <div class="col-lg-7 text-center text-lg-end">
              <div class="box-socials">
                @php
                  $socialLinks = [
                    ['icon' => 'icon-twitter', 'url' => 'https://x.com/kominfokabmlg', 'name' => 'Twitter', 'delay' => '0s'],
                    ['icon' => 'icon-linked', 'url' => 'https://www.facebook.com/Diskominfo.Malangkab/', 'name' => 'Facebook', 'delay' => '0.2s'],
                    ['icon' => 'icon-insta', 'url' => 'https://www.instagram.com/kominfokabmlg/', 'name' => 'Instagram', 'delay' => '0.4s']
                  ];
                @endphp
                @foreach($socialLinks as $social)
                  <div class="d-inline-block {{ !$loop->last ? 'mr-30' : '' }} wow animate__animated animate__fadeIn" data-wow-delay="{{ $social['delay'] }}">
                    <a class="icon-socials {{ $social['icon'] }} color-gray-500" href="{{ $social['url'] }}">{{ $social['name'] }}</a>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scroll Progress -->
  <div class="progressCounter progressScroll hover-up hover-neon-2">
    <div class="progressScroll-border">
      <div class="progressScroll-circle">
        <span class="progressScroll-text"><i class="fi-rr-arrow-small-up"></i></span>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
  <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
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

  <!-- Custom Scripts -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      initializeChart();
      initializeMasonry();
      initializeNavigation();
    });

    function initializeChart() {
      const textColor = getComputedStyle(document.body).color;
      const barCanvas = document.getElementById('barChart');
      if (!barCanvas) return;
      
      const barCtx = barCanvas.getContext('2d');
      const gradient = barCtx.createLinearGradient(0, 0, 0, barCanvas.height);
      gradient.addColorStop(0, 'rgba(13,110,253,0.9)');
      gradient.addColorStop(1, 'rgba(13,110,253,0.3)');

      new Chart(barCtx, {
        type: 'bar',
        data: {
          labels: JSON.parse('{!! json_encode($pengajuanPerBidang->pluck("databidang.nama")) !!}'),
          datasets: [{
            label: 'Mahasiswa Magang Aktif',
            data: JSON.parse('{!! json_encode($pengajuanPerBidang->pluck("total")) !!}'),
            backgroundColor: gradient,
            borderRadius: 8,
            barPercentage: 0.6
          }]
        },
        options: {
          maintainAspectRatio: false,
          scales: {
            y: {
              beginAtZero: true,
              ticks: { color: textColor },
              grid: { color: 'rgba(255,255,255,0.1)' }
            },
            x: {
              ticks: { color: textColor },
              grid: { display: false }
            }
          },
          plugins: {
            legend: { display: false }
          }
        }
      });
    }

    function initializeMasonry() {
      const grid = document.querySelector('.masonry-grid');
      if (!grid) return;
      
      imagesLoaded(grid, function() {
        new Masonry(grid, {
          itemSelector: '.masonry-item',
          columnWidth: '.masonry-sizer',
          gutter: 10,
          percentPosition: true
        });
      });
    }

    function initializeNavigation() {
      const menuLinks = document.querySelectorAll('.main-menu a[data-section]');
      const sections = document.querySelectorAll('section[id], div[id="home"]');

      function setActiveMenu(activeSection) {
        menuLinks.forEach(link => {
          link.classList.remove('active');
          link.classList.add('color-gray-500');
          if (link.dataset.section === activeSection) {
            link.classList.add('active');
            link.classList.remove('color-gray-500');
          }
        });
      }

      function checkActiveSection() {
        let currentSection = 'home';
        const scrollPosition = window.pageYOffset + 100;

        sections.forEach(section => {
          const rect = section.getBoundingClientRect();
          const sectionTop = rect.top + window.pageYOffset;
          const sectionBottom = sectionTop + rect.height;

          if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
            currentSection = section.id;
          }
        });

        setActiveMenu(currentSection);
      }

  
      let scrollTimeout;
      window.addEventListener('scroll', function() {
        if (scrollTimeout) clearTimeout(scrollTimeout);
        scrollTimeout = setTimeout(checkActiveSection, 10);
      });

 
      menuLinks.forEach(link => {
        link.addEventListener('click', function(e) {
          e.preventDefault();
          const targetId = this.dataset.section;
          const targetElement = document.getElementById(targetId);
          if (targetElement) {
            const headerHeight = 80;
            const targetPosition = targetElement.offsetTop - headerHeight;

            window.scrollTo({
              top: targetPosition,
              behavior: 'smooth'
            });

            setActiveMenu(targetId);
            history.pushState(null, null, `#${targetId}`);
          }
        });
      });


      if (window.location.hash) {
        const targetId = window.location.hash.substring(1);
        setActiveMenu(targetId);
      } else {
        setActiveMenu('home');
      }

   
      window.addEventListener('hashchange', function() {
        const targetId = window.location.hash.substring(1);
        if (targetId) setActiveMenu(targetId);
      });
    }
  </script>

</body>
</html>