<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mari Magang - Diskominfo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-blue: #3B82F6;
            --primary-blue-dark: #2563EB;
            --primary-blue-light: #60A5FA;
            --secondary-blue: #1E40AF;
            --accent-blue: #DBEAFE;
            --background-light: #F8FAFC;
            --background-dark: #0F172A;
            --text-primary: #1E293B;
            --text-secondary: #64748B;
            --text-light: #94A3B8;
            --white: #FFFFFF;
            --gray-100: #F1F5F9;
            --gray-200: #E2E8F0;
            --gray-800: #1E293B;
            --gray-900: #0F172A;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: var(--text-primary);
            background-color: var(--background-light);
            overflow-x: hidden;
        }

        body[data-theme="dark"] {
            --text-primary: #F1F5F9;
            --text-secondary: #CBD5E1;
            --text-light: #94A3B8;
            --background-light: var(--background-dark);
            --gray-100: #334155;
            --gray-200: #475569;
        }

        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgb(188, 236, 255) 0%, rgb(70, 148, 231) 50%, rgb(56, 135, 214) 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10000;
            transition: opacity 0.5s ease;
        }

        .loading-logo {
            font-size: 3rem;
            font-weight: 800;
            color: var(--white);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }

        .hero-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(37, 99, 235, 0.1) 100%),
                        url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><radialGradient id="g" cx="50%" cy="50%"><stop offset="0%" stop-color="%233B82F6" stop-opacity="0.1"/><stop offset="100%" stop-color="%232563EB" stop-opacity="0.05"/></radialGradient></defs><rect width="100%" height="100%" fill="url(%23g)"/><circle cx="200" cy="200" r="3" fill="%233B82F6" opacity="0.3"/><circle cx="800" cy="300" r="2" fill="%2360A5FA" opacity="0.4"/><circle cx="400" cy="700" r="4" fill="%233B82F6" opacity="0.2"/><circle cx="700" cy="800" r="3" fill="%2360A5FA" opacity="0.3"/></svg>');
            background-size: cover;
            z-index: -1;
        }

        header {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 1rem 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(59, 130, 246, 0.1);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        body[data-theme="dark"] header {
            background: rgba(15, 23, 42, 0.95);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary-blue);
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-secondary);
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-links a:hover {
            color: var(--primary-blue);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background: var(--primary-blue);
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .theme-toggle {
            background: none;
            border: 2px solid var(--primary-blue);
            color: var(--primary-blue);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .theme-toggle:hover {
            background: var(--primary-blue);
            color: var(--white);
            transform: scale(1.05);
        }

        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 120%;
            height: 120%;
            background: linear-gradient(135deg, rgba(172, 204, 255, 0.459) 0%, rgba(43, 98, 214, 0.534) 100%);
            z-index: -1;
            will-change: transform;
        }

        .hero-content {
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
            z-index: 1;
            transform: translateY(50px);
            opacity: 0;
            animation: fadeInUp 1s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: fadeInUp 1s ease 0.3s forwards;
            opacity: 0;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: var(--text-secondary);
            margin-bottom: 2rem;
            animation: fadeInUp 1s ease 0.6s forwards;
            opacity: 0;
        }

        .cta-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem 2rem;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            color: var(--white);
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            animation: fadeInUp 1s ease 0.9s forwards;
            opacity: 0;
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 40px rgba(59, 130, 246, 0.4);
        }

        .section {
            padding: 6rem 0;
            position: relative;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 3rem;
            color: var(--text-primary);
        }

        .fields-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 4rem;
        }

        .field-card {
            background: var(--white);
            padding: 2rem;
            border-radius: 20px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(59, 130, 246, 0.1);
            position: relative;
            overflow: hidden;
        }

        body[data-theme="dark"] .field-card {
            background: var(--gray-800);
        }

        .field-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .field-card:hover::before {
            left: 100%;
        }

        .field-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.15);
        }

        .field-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--primary-blue);
        }

        .field-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--text-primary);
        }

        .field-description {
            color: var(--text-secondary);
            line-height: 1.6;
        }

        .process-section {
            background: var(--gray-100);
            position: relative;
            overflow: hidden;
        }

        .process-timeline {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
        }

        .process-item {
            display: flex;
            align-items: center;
            gap: 2rem;
            margin-bottom: 3rem;
            opacity: 0;
            transform: translateX(-50px);
            transition: all 0.6s ease;
        }

        .process-item.visible {
            opacity: 1;
            transform: translateX(0);
        }

        .process-item:nth-child(even) {
            flex-direction: row-reverse;
            transform: translateX(50px);
        }

        .process-item:nth-child(even).visible {
            transform: translateX(0);
        }

        .process-number {
            min-width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
        }

        .process-content {
            flex: 1;
            background: var(--white);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        body[data-theme="dark"] .process-content {
            background: var(--gray-800);
        }

        .process-content h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-primary);
        }

        .faq-section {
            background: var(--white);
        }

        body[data-theme="dark"] .faq-section {
            background: var(--gray-800);
        }

        .faq-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            margin-bottom: 1rem;
            border: 1px solid rgba(59, 130, 246, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .faq-question {
            width: 100%;
            padding: 1.5rem;
            background: var(--gray-100);
            border: none;
            text-align: left;
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-primary);
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
        }

        body[data-theme="dark"] .faq-question {
            background: var(--gray-900);
        }

        .faq-question:hover {
            background: var(--accent-blue);
        }

        .faq-icon {
            transition: transform 0.3s ease;
        }

        .faq-icon.open {
            transform: rotate(180deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            background: var(--white);
        }

        body[data-theme="dark"] .faq-answer {
            background: var(--gray-800);
        }

        .faq-answer.open {
            max-height: 200px;
        }

        .faq-answer p {
            padding: 1.5rem;
            color: var(--text-secondary);
        }

        footer {
            background: var(--gray-900);
            color: var(--white);
            padding: 4rem 0 2rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            margin-bottom: 1rem;
            color: var(--primary-blue-light);
        }

        .footer-section p {
            color: var(--text-light);
            margin-bottom: 0.5rem;
        }

        .footer-section a {
            color: var(--text-light);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: var(--primary-blue-light);
        }

        .scroll-to-top {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 50px;
            height: 50px;
            background: var(--primary-blue);
            color: var(--white);
            border: none;
            border-radius: 50%;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .scroll-to-top.visible {
            opacity: 1;
            visibility: visible;
        }

        .scroll-to-top:hover {
            background: var(--primary-blue-dark);
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .hero-title {
                font-size: 2.5rem;
            }
            
            .fields-grid {
                grid-template-columns: 1fr;
            }
            
            .process-item {
                flex-direction: column !important;
                text-align: center;
            }
        }

        .parallax-element {
            will-change: transform;
        }
    </style>
</head>
<body>
    <div class="loading-screen" id="loadingScreen">
        <div class="loading-logo"><img src="{{ asset('img/logo-kominfo.png') }}" alt="" width="120px"></div>
    </div>

    <header>
        <nav class="container">
            <div class="logo">Mari Magang</div>
            <ul class="nav-links">
                <li><a href="#home"><i class="fas fa-home"></i> Beranda</a></li>
                <li><a href="#fields"><i class="fas fa-code"></i> Bidang</a></li>
                <li><a href="#process"><i class="fas fa-route"></i> Alur</a></li>
                <li><a href="#faq"><i class="fas fa-question-circle"></i> FAQ</a></li>
                <li><a href="#contact"><i class="fas fa-envelope"></i> Kontak</a></li>
                @if (Route::has('login'))
                <li>
                  
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
                          ><i class="fa fa-sign-in" aria-hidden="true"></i>

                            Log in
                          </a>
                </li>
                <li>@if (Route::has('register'))
                            <a
                              href="{{ route('register') }}"
                              class="btn btn-warning me-2"><i class="fa-solid fa-user-plus"></i>
                              Register
                            </a>
                          @endif
                        @endauth</li>
                @endif
                <li><button class="theme-toggle" onclick="toggleTheme()"><i class="fas fa-moon"></i></button></li>
            </ul>
        </nav>
    </header>

    <section id="home" class="hero">
      <div class="hero-image parallax-element"></div>
      <div class="hero-bg parallax-element"></div>

      <div class="container flex items-center gap-8">
        <div class="hero-content w-1/2">
          <h1 class="hero-title text-4xl font-bold mb-4">Portal Magang Teknologi</h1>
          <p class="hero-subtitle mb-6">
            Mulai karir teknologi Anda dengan program magang profesional di perusahaan terkemuka
          </p>
          <a href="#fields" class="cta-button inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            <i class="fas fa-rocket"></i>
            Jelajahi Bidang Magang
          </a>
        </div>

        <div class="w-1/2">
          <img src="{{ asset('img/hero.jpg') }}" alt="Gambar Magang" class="w-full rounded shadow-md" />
        </div>
      </div>
    </section>


    <section id="fields" class="section">
        <div class="container">
            <h2 class="section-title">Bidang Kerja</h2>
            <div class="fields-grid">
                <div class="field-card">
                    <div class="field-icon"><i class="fa-solid fa-pen-to-square"></i></div>
                    <h3 class="field-title">Sekretariat</h3>
                    <p class="field-description">Bidang yang berfokus pada pengelolaan administrasi dan operasional untuk memastikan jalannya kegiatan organisasi secara efektif.</p>
                </div>
                <div class="field-card">
                    <div class="field-icon"><i class="fas fa-chart-line"></i></div>
                    <h3 class="field-title">Bidang Statistik dan Data</h3>
                    <p class="field-description">Bidang yang berfokus pada analis dan penyajian data untuk menghasilkan informasi yang berguna dalam pengambilan keputusan.</p>
                </div>
                <div class="field-card">
                    <div class="field-icon"><i class="fas fa-palette"></i></div>
                    <h3 class="field-title">Bidang Komunikasi dan Konten</h3>
                    <p class="field-description">Bidang yang berfokus pada pembuatan, pengelolaan, dan distribusi pesan serta informasi kepada audiens tertentu dalam sosial media.</p>
                </div>
                <div class="field-card">
                    <div class="field-icon"><i class="fas fa-shield-alt"></i></div>
                    <h3 class="field-title">Bidang Infrastruktur Jaringan</h3>
                    <p class="field-description">Bidang yang berfokus pada perencanaan, pembangunan, pengelolaan, dan pemeliharaan jaringankomunikasi data dan internet.</p>
                </div>
                <div class="field-card">
                    <div class="field-icon"><i class="fas fa-mobile-alt"></i></div>
                    <h3 class="field-title">Bidang Aplikasi Informatika</h3>
                    <p class="field-description">Bidang yang berfokus pada pengembangan, pengelolaan, dan pemanfaatan aplikasi serta sistem informatika.</p>
                </div>
                <div class="field-card">
                    <div class="field-icon"><i class="fas fa-cloud"></i></div>
                    <h3 class="field-title">Bidang Infrastruktur TIK</h3>
                    <p class="field-description">Bidang yang berfokus pada pengembangan, pengelolaan, dan pemanfaatan aplikasi serta sistem informatika.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="process" class="section process-section">
        <div class="container">
            <h2 class="section-title">Alur Pendaftaran Magang</h2>
            <div class="process-timeline">
                <div class="process-item">
                    <div class="process-number">1</div>
                    <div class="process-content">
                        <h3><i class="fas fa-user-plus"></i> Registrasi Akun</h3>
                        <p>Daftarkan diri Anda dengan mengisi formulir pendaftaran dan verifikasi email untuk mengakses platform magang.</p>
                    </div>
                </div>
                <div class="process-item">
                    <div class="process-number">2</div>
                    <div class="process-content">
                        <h3><i class="fas fa-search"></i> Pilih Bidang Magang</h3>
                        <p>Pilih bidang magang yang sesuai dengan minat dan kemampuan Anda dari berbagai opsi yang tersedia.</p>
                    </div>
                </div>
                <div class="process-item">
                    <div class="process-number">3</div>
                    <div class="process-content">
                        <h3><i class="fas fa-upload"></i> Upload Portfolio</h3>
                        <p>Unggah CV, portfolio, dan dokumen pendukung lainnya untuk menunjukkan kemampuan dan pengalaman Anda.</p>
                    </div>
                </div>
                <div class="process-item">
                    <div class="process-number">4</div>
                    <div class="process-content">
                        <h3><i class="fas fa-users"></i> Seleksi dan Interview</h3>
                        <p>Ikuti proses seleksi administratif dan wawancara dengan tim HR dan technical lead perusahaan.</p>
                    </div>
                </div>
                <div class="process-item">
                    <div class="process-number">5</div>
                    <div class="process-content">
                        <h3><i class="fas fa-play"></i> Mulai Magang</h3>
                        <p>Setelah diterima, Anda akan mendapatkan orientasi dan mulai menjalani program magang sesuai jadwal yang ditentukan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="faq" class="section faq-section">
        <div class="container">
            <h2 class="section-title">Pertanyaan Umum</h2>
            <div class="faq-container">
                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFAQ(this)">
                        <span><i class="fas fa-clock"></i> Berapa lama durasi program magang?</span>
                        <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
                    </button>
                    <div class="faq-answer">
                        <p>Program magang berlangsung selama 3-6 bulan, tergantung pada bidang dan kebutuhan perusahaan mitra. Durasi dapat diperpanjang berdasarkan performa dan ketersediaan posisi.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFAQ(this)">
                        <span><i class="fas fa-dollar-sign"></i> Apakah program magang ini berbayar?</span>
                        <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
                    </button>
                    <div class="faq-answer">
                        <p>Ya, semua program magang kami menyediakan tunjangan bulanan yang kompetitif sesuai dengan standar industri dan kontribusi peserta magang.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFAQ(this)">
                        <span><i class="fas fa-clipboard-check"></i> Apa saja persyaratan untuk mendaftar?</span>
                        <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
                    </button>
                    <div class="faq-answer">
                        <p>Persyaratan umum meliputi: mahasiswa aktif D3/S1 jurusan terkait, IPK minimal 3.0, memiliki pengetahuan dasar sesuai bidang, dan kemampuan komunikasi yang baik.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFAQ(this)">
                        <span><i class="fas fa-home"></i> Apakah tersedia program magang remote?</span>
                        <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
                    </button>
                    <div class="faq-answer">
                        <p>Ya, kami menyediakan opsi magang remote, hybrid, dan on-site sesuai dengan kebutuhan proyek dan preferensi peserta magang.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFAQ(this)">
                        <span><i class="fas fa-tasks"></i> Bagaimana proses seleksi dilakukan?</span>
                        <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
                    </button>
                    <div class="faq-answer">
                        <p>Proses seleksi meliputi screening CV, technical test sesuai bidang, wawancara HR, dan wawancara technical dengan tim mentor yang akan membimbing selama magang.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer id="contact">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3><i class="fas fa-info-circle"></i> Tentang MariMagang</h3>
                    <p>Platform magang teknologi terpercaya yang menghubungkan talenta muda dengan perusahaan teknologi terkemuka.</p>
                </div>
                <div class="footer-section">
                    <h3><i class="fas fa-phone"></i> Kontak</h3>
                    <p><i class="fas fa-envelope"></i> Email: info@diskominfo.malangkab.go.id</p>
                    <p><i class="fas fa-phone"></i> Telepon: (0341) 408788</p>
                    <p><i class="fas fa-map-marker-alt"></i> Alamat:  Jl. Agus Salim, Kiduldalem, Kec. Klojen, Kota Malang, Jawa Timur</p>
                </div>
                <div class="footer-section">
                    <h3><i class="fas fa-link"></i> Tautan Cepat</h3>
                    <p><a href="#fields"><i class="fas fa-code"></i> Bidang Magang</a></p>
                    <p><a href="#process"><i class="fas fa-route"></i> Cara Mendaftar</a></p>
                    <p><a href="#faq"><i class="fas fa-question-circle"></i> FAQ</a></p>
                </div>
            </div>
            <div style="border-top: 1px solid rgba(255,255,255,0.1); padding-top: 2rem; margin-top: 2rem;">
                <p>&copy; 2024 Diskominfo - Kab.Malang.</p>
            </div>
        </div>
    </footer>

    <button class="scroll-to-top" onclick="scrollToTop()">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        window.addEventListener('load', function() {
            setTimeout(() => {
                document.getElementById('loadingScreen').style.opacity = '0';
                setTimeout(() => {
                    document.getElementById('loadingScreen').style.display = 'none';
                }, 500);
            }, 500);
        });

        function toggleTheme() {
            const body = document.body;
            const themeToggle = document.querySelector('.theme-toggle i');
            
            if (body.getAttribute('data-theme') === 'light') {
                body.setAttribute('data-theme', 'dark');
                themeToggle.className = 'fas fa-sun';
            } else {
                body.setAttribute('data-theme', 'light');
                themeToggle.className = 'fas fa-moon';
            }
        }

        function toggleFAQ(button) {
            const answer = button.nextElementSibling;
            const icon = button.querySelector('.faq-icon');
            
            answer.classList.toggle('open');
            icon.classList.toggle('open');
        }

        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        window.addEventListener('scroll', function() {
            const scrollToTopBtn = document.querySelector('.scroll-to-top');
            const scrolled = window.pageYOffset;
            
            if (scrolled > 300) {
                scrollToTopBtn.classList.add('visible');
            } else {
                scrollToTopBtn.classList.remove('visible');
            }

            const processItems = document.querySelectorAll('.process-item');
            processItems.forEach(item => {
                const rect = item.getBoundingClientRect();
                if (rect.top < window.innerHeight - 100) {
                    item.classList.add('visible');
                }
            });

            const heroElements = document.querySelectorAll('.hero .parallax-element');
            heroElements.forEach(element => {
                const rate = scrolled * -0.8;
                element.style.transform = `translateY(${rate}px)`;
            });
        });

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.field-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'all 0.6s ease';
            observer.observe(card);
        });

        let ticking = false;
        function updateParallax() {
            const scrolled = window.pageYOffset;
            const heroElements = document.querySelectorAll('.hero .parallax-element');
            
            heroElements.forEach(element => {
                const rate = scrolled * -0.8;
                element.style.transform = `translate3d(0, ${rate}px, 0)`;
            });
            
            ticking = false;
        }

        function requestTick() {
            if (!ticking) {
                requestAnimationFrame(updateParallax);
                ticking = true;
            }
        }

        window.addEventListener('scroll', requestTick);
    </script>
</body>
</html>