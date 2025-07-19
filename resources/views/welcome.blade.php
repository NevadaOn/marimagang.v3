<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Magang - Temukan Pengalaman Terbaik</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
</head>
<body class="light-mode">
  <script src="{{ asset('js/bintang.js') }}"></script>
    <div class="loading-animation" id="loadingAnimation">
        <div class="loading-spinner"></div>
    </div>

    <div class="animated-bg">
        <div class="floating-shapes shape-1"></div>
        <div class="floating-shapes shape-2"></div>
        <div class="floating-shapes shape-3"></div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#" data-aos="fade-right">
              <img src="{{ asset('img/logo-kominfo.png') }}" width="40px" alt=""> Mari Magang
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#bidang">Bidang Magang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#alur">Alur Magang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#dokumentasi">Dokumentasi</a>
                    </li>
                </ul>
                <div>
                    @if (Route::has('login'))
                      <nav class="flex items-center justify-end gap-4">
                        @auth
                          <a
                            href="{{ url('/dashboard') }}"
                            class="btn btn-primary"
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
                <div class="theme-toggle" onclick="toggleTheme()">
                    <i class="fas fa-sun" id="themeIcon"></i>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content" data-aos="fade-up">
                        <h1>Mulai Perjalanan Magang Anda</h1>
                        <p>Temukan pengalaman magang terbaik di berbagai bidang dan kembangkan skill profesional Anda bersama mitra terpercaya kami.</p>
                        <div class="d-flex gap-3">
                            <button class="btn btn-primary-custom">
                                <i class="fas fa-rocket me-2"></i>Daftar Sekarang
                            </button>
                            <button class="btn btn-outline-light">
                                Lihat Persyaratan
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('img/hero.jpg') }}" alt="Ilustrasi kegiatan di Diskominfo" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <div class="section-divider"></div>

    <section id="bidang" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-4 fw-bold" data-aos="fade-up">Bidang Magang</h2>
            <p class="lead" data-aos="fade-up" data-aos-delay="100">Pilih bidang yang sesuai dengan minat dan passion Anda</p>
        </div>

        <div class="row">
            @forelse ($bidangs as $index => $bidang)
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="{{ 100 + ($index * 100) }}">
                    <a href="{{ route('bidang.show', $bidang->slug) }}" class="text-decoration-none">
                        <div class="feature-card text-center h-100">
                            <div class="feature-icon mb-3">
                                @if ($bidang->thumbnail)
                                    <img src="{{ asset('storage/' . $bidang->thumbnail) }}" alt="{{ $bidang->nama }}" class="img-fluid rounded" style="height: 120px; object-fit: cover;">
                                @endif
                            </div>
                            <h4>{{ $bidang->nama }}</h4>
                            <p>{{ Str::limit($bidang->deskripsi, 100) }}</p>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>Belum ada bidang yang tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>


    <div class="section-divider"></div>

    <section id="alur" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-4 fw-bold" data-aos="fade-up">Alur Magang</h2>
                <p class="lead" data-aos="fade-up" data-aos-delay="100">Ikuti langkah-langkah mudah untuk memulai magang Anda</p>
            </div>
            <div class="timeline">
                <div class="timeline-item left" data-aos="fade-right">
                    <div class="timeline-content">
                        <h4><i class="fas fa-user-plus me-2"></i>Pendaftaran</h4>
                        <p>Daftarkan diri Anda dengan mengisi formulir online dan upload dokumen yang diperlukan</p>
                    </div>
                </div>
                <div class="timeline-item right" data-aos="fade-left">
                    <div class="timeline-content">
                        <h4><i class="fas fa-search me-2"></i>Seleksi</h4>
                        <p>Tim kami akan melakukan seleksi berkas dan interview untuk menentukan kesesuaian</p>
                    </div>
                </div>
                <div class="timeline-item left" data-aos="fade-right">
                    <div class="timeline-content">
                        <h4><i class="fas fa-handshake me-2"></i>Penempatan</h4>
                        <p>Peserta yang lolos akan ditempatkan sesuai dengan bidang dan minat yang dipilih</p>
                    </div>
                </div>
                <div class="timeline-item right" data-aos="fade-left">
                    <div class="timeline-content">
                        <h4><i class="fas fa-tasks me-2"></i>Pelaksanaan</h4>
                        <p>Mulai magang dengan bimbingan mentor dan project yang menantang</p>
                    </div>
                </div>
                <div class="timeline-item left" data-aos="fade-right">
                    <div class="timeline-content">
                        <h4><i class="fas fa-certificate me-2"></i>Sertifikat</h4>
                        <p>Dapatkan sertifikat resmi setelah menyelesaikan program magang</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section-divider"></div>

    <section id="dokumentasi" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-4 fw-bold" data-aos="fade-up">Dokumentasi Magang</h2>
                <p class="lead" data-aos="fade-up" data-aos-delay="100">Lihat aktivitas dan pencapaian peserta magang kami</p>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="glass-card p-0 overflow-hidden">
                        <img src="https://via.placeholder.com/400x250/145389/ffffff?text=Workshop" class="img-fluid" alt="Workshop">
                        <div class="p-3">
                            <h5>Workshop Teknologi</h5>
                            <p>Peserta mengikuti workshop tentang teknologi terkini</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="glass-card p-0 overflow-hidden">
                        <img src="https://via.placeholder.com/400x250/09d1f2/ffffff?text=Presentasi" class="img-fluid" alt="Presentasi">
                        <div class="p-3">
                            <h5>Presentasi Project</h5>
                            <p>Peserta mempresentasikan hasil project mereka</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="glass-card p-0 overflow-hidden">
                        <img src="https://via.placeholder.com/400x250/745f74/ffffff?text=Networking" class="img-fluid" alt="Networking">
                        <div class="p-3">
                            <h5>Networking Session</h5>
                            <p>Sesi networking dengan profesional industri</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section-divider"></div>

    <footer class="py-4 mt-5" style="background: rgba(17, 13, 51, 0.9);">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Mari Magang</h5>
                    <p>Membantu mahasiswa menemukan pengalaman magang terbaik di Diskominfo Kab.Malang</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="social-links">
                        <a href="#" class="text-light me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-light"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4" style="border-color: rgba(255,255,255,0.2);">
            <div class="text-center">
                <p>&copy; 2025 Mari Magang Diskominfo - Kab.Malang.</p>
            </div>
        </div>
    </footer>

    <button class="scroll-to-top" id="scrollToTop">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });

        window.addEventListener('load', function() {
            setTimeout(function() {
                document.getElementById('loadingAnimation').style.opacity = '0';
                setTimeout(function() {
                    document.getElementById('loadingAnimation').style.display = 'none';
                }, 500);
            }, 1000);
        });

        function toggleTheme() {
            const body = document.body;
            const themeIcon = document.getElementById('themeIcon');
            
            if (body.classList.contains('light-mode')) {
                body.classList.remove('light-mode');
                body.classList.add('dark-mode');
                themeIcon.classList.remove('fa-sun');
                themeIcon.classList.add('fa-moon');
                localStorage.setItem('theme', 'dark');
            } else {
                body.classList.remove('dark-mode');
                body.classList.add('light-mode');
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
                localStorage.setItem('theme', 'light');
            }
        }

        // Load saved theme
        document.addEventListener('DOMContentLoaded', function() {
            const savedTheme = localStorage.getItem('theme') || 'light';
            const body = document.body;
            const themeIcon = document.getElementById('themeIcon');
            
            if (savedTheme === 'dark') {
                body.classList.remove('light-mode');
                body.classList.add('dark-mode');
                themeIcon.classList.remove('fa-sun');
                themeIcon.classList.add('fa-moon');
            }
        });

        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
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

        const scrollToTopBtn = document.getElementById('scrollToTop');
        
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                scrollToTopBtn.classList.add('show');
            } else {
                scrollToTopBtn.classList.remove('show');
            }
        });

        scrollToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Form submission
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Show loading animation
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengirim...';
                submitBtn.disabled = true;
                
                // Simulate form submission
                setTimeout(function() {
                    submitBtn.innerHTML = '<i class="fas fa-check me-2"></i>Terkirim!';
                    submitBtn.style.background = '#28a745';
                    
                    setTimeout(function() {
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                        submitBtn.style.background = '';
                    }, 2000);
                }, 1500);
            });
        }

        // Add hover effect to cards
        document.querySelectorAll('.feature-card, .glass-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Parallax effect for floating shapes
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelectorAll('.floating-shapes');
            
            parallax.forEach((element, index) => {
                const speed = 0.5 + (index * 0.1);
                element.style.transform = `translateY(${scrolled * speed}px)`;
            });
        });

        // Counter animation
        function animateCounter(element, start, end, duration) {
            let current = start;
            const increment = end > start ? 1 : -1;
            const stepTime = Math.abs(Math.floor(duration / (end - start)));
            
            const timer = setInterval(function() {
                current += increment;
                element.textContent = current + (element.textContent.includes('%') ? '%' : '+');
                
                if (current === end) {
                    clearInterval(timer);
                }
            }, stepTime);
        }

        // Intersection Observer for counter animation
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = entry.target.querySelectorAll('.stat-number');
                    counters.forEach(counter => {
                        const target = parseInt(counter.textContent);
                        animateCounter(counter, 0, target, 2000);
                    });
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe stats section
        document.addEventListener('DOMContentLoaded', function() {
            const statsSection = document.querySelector('.stats-card').closest('.row');
            if (statsSection) {
                observer.observe(statsSection);
            }
        });

        // Add typing effect to hero title
        function typeWriter(element, text, speed = 100) {
            let i = 0;
            element.innerHTML = '';
            
            function type() {
                if (i < text.length) {
                    element.innerHTML += text.charAt(i);
                    i++;
                    setTimeout(type, speed);
                }
            }
            
            type();
        }

        window.addEventListener('load', function() {
            setTimeout(function() {
                const heroTitle = document.querySelector('.hero h1');
                if (heroTitle) {
                    const originalText = heroTitle.textContent;
                    typeWriter(heroTitle, originalText, 50);
                }
            }, 1500);
        });

        function createParticles() {
            const particlesContainer = document.createElement('div');
            particlesContainer.style.position = 'fixed';
            particlesContainer.style.top = '0';
            particlesContainer.style.left = '0';
            particlesContainer.style.width = '100%';
            particlesContainer.style.height = '100%';
            particlesContainer.style.pointerEvents = 'none';
            particlesContainer.style.zIndex = '1';
            document.body.appendChild(particlesContainer);

            for (let i = 0; i < 50; i++) {
                const particle = document.createElement('div');
                particle.style.position = 'absolute';
                particle.style.width = '2px';
                particle.style.height = '2px';
                particle.style.background = '#09d1f2';
                particle.style.borderRadius = '50%';
                particle.style.opacity = '0.3';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.top = Math.random() * 100 + '%';
                particle.style.animation = `float ${3 + Math.random() * 4}s ease-in-out infinite`;
                particle.style.animationDelay = Math.random() * 2 + 's';
                particlesContainer.appendChild(particle);
            }
        }

        // Initialize particles
        createParticles();

        // Add glow effect to buttons on hover
        document.querySelectorAll('.btn-primary-custom').forEach(btn => {
            btn.addEventListener('mouseenter', function() {
                this.style.boxShadow = '0 0 30px rgba(9, 209, 242, 0.6)';
            });
            
            btn.addEventListener('mouseleave', function() {
                this.style.boxShadow = '0 10px 30px rgba(20, 83, 137, 0.4)';
            });
        });

        // Add progress bar animation
        function animateProgressBars() {
            const progressBars = document.querySelectorAll('.progress-bar');
            progressBars.forEach(bar => {
                const width = bar.getAttribute('data-width');
                bar.style.width = width;
            });
        }

        // document.addEventListener('DOMContentLoaded', function() {
        //     const cursor = document.createElement('div');
        //     cursor.style.position = 'fixed';
        //     cursor.style.width = '20px';
        //     cursor.style.height = '20px';
        //     cursor.style.border = '2px solid #09d1f2';
        //     cursor.style.borderRadius = '50%';
        //     cursor.style.pointerEvents = 'none';
        //     cursor.style.zIndex = '9999';
        //     cursor.style.opacity = '0';
        //     cursor.style.transition = 'opacity 0.3s ease';
        //     document.body.appendChild(cursor);

        //     document.addEventListener('mousemove', function(e) {
        //         cursor.style.left = e.clientX - 10 + 'px';
        //         cursor.style.top = e.clientY - 10 + 'px';
        //         cursor.style.opacity = '1';
        //     });

        //     document.addEventListener('mouseleave', function() {
        //         cursor.style.opacity = '0';
        //     });
        // });
    </script>
</body>
</html>