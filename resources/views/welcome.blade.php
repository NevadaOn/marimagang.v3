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
            <img class="logo-night" alt="Diskominfo" src="{{ asset('img/rb_3083.png') }}" width="90px">
            <img class="d-none logo-day" alt="Diskominfo" src="{{ asset('img/rb_3083.png') }}" width="90px">
        </a>
        </div>
        <div class="header-nav">
          <nav class="nav-main-menu d-none d-xl-block">
            <ul class="main-menu">
              <li><a class="active" href="index.html">Home</a>

              </li>
              <li><a class="color-gray-500" href="#bidangKerja">Alur Magang</a>

              </li>
              <li><a class="color-gray-500" href="#dokumentasi">Dokumentasi</a>

              </li>

              <li><a class="color-gray-500" href="page-contact.html">Contact</a></li>
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
                <a
                    href="{{ url('/dashboard') }}"
                    class="btn btn-linear d-none d-sm-inline-block hover-up hover-shadow"
                >
                    Dashboard
                </a>
            @else
                <a
                    href="{{ route('login') }}"
                    class="btn btn-linear d-none d-sm-inline-block hover-up hover-shadow"
                >
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
            <div class="banner">
              <div class="row align-items-end">
                <div class="col-lg-6 pt-100"><span
                    class="text-sm-bold color-gray-600 wow animate__animated animate__fadeInUp">Selamat Datang
                    Semua!</span>
                  <h1 class="color-gray-50 mt-20 mb-20 wow animate__animated animate__fadeInUp">Mari<a
                      class="typewrite color-linear" href="#" data-period="3000"
                      data-type="[ &quot;Magang&quot;, &quot;Berkarier&quot;, &quot;Berkembang&quot; ]"></a></h1>
                  <div class="row">
                    <div class="col-lg-9">
                      <p class="text-base color-gray-600 wow animate__animated animate__fadeInUp">Mari kembangkan
                        kemampuan anda bersama kami, dengan berbgai banyak lowongan pekerjaan dan juga berbagai macam
                        magang.</p>
                    </div>
                  </div>
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
                  <div class="banner-img position-relative wow animate__animated animate__fadeIn"><img
                      src="{{asset('assets/imgs/page/homepage1/banner.svg')}}" alt="Genz">
                    <div class="pattern-1"><img src="assets/imgs/template/pattern-1.svg" alt="Genz"></div>
                    <div class="pattern-2"><img src="assets/imgs/template/pattern-2.svg" alt="Genz"></div>
                    <div class="pattern-3"><img src="assets/imgs/template/pattern-3.svg" alt="Genz"></div>
                    <div class="pattern-4"><img src="assets/imgs/template/pattern-4.svg" alt="Genz"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="mb-70" id="bidangKerja">
              <div class="box-topics border-gray-800 bg-gray-850">
                <div class="row">
                  <div class="col-lg-2">
                    <h5 class="mb-15 color-white wow animate__animated animate__fadeInUp" data-wow-delay="0s">Bidang
                      Kerja</h5>
                    <p class="color-gray-500 mb-20 wow animate__animated animate__fadeInUp" data-wow-delay=".3s">Bidang
                      kerja ini adalah bidang kerja yang berada pada layanan kami.</p>
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

                  <style>
                  .card-image-fixed {
                    position: relative;
                    width: 100%;
                    height: 200px;
                    overflow: hidden;
                    border-radius: 8px;
                  }

                  .card-img-uniform {
                    width: 100%;
                    height: 100%;
                    object-fit: cover; 
                    object-position: center; 
                    transition: transform 0.3s ease;
                  }

                  .card-style-1:hover .card-img-uniform {
                    transform: scale(1.05);
                  }

                  .card-img-uniform-contain {
                    width: 100%;
                    height: 100%;
                    object-fit: contain;
                    object-position: center;
                    background-color: #f8f9fa; 
                  }
                  </style>
                </div>
              </div>
            </div>
            <h2 class="color-linear d-inline-block mb-10 wow animate__animated animate__fadeInUp">Alur Magang</h2>
            <p class="text-lg color-gray-500 wow animate__animated animate__fadeInUp">Tahapan Magang Diskominfo</p>
            <div class="row mt-70 mb-50">
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6">
                <div class="card-style-2 hover-up hover-neon wow animate__animated animate__fadeIn" data-wow-delay="0s">
                  <div class="card-image"> </div>
                  <div class="card-info">Regristrasi Akun</a></div>
                </div>
              </div>
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6">
                <div class="card-style-2 hover-up hover-neon wow animate__animated animate__fadeIn"
                  data-wow-delay="0.1s">
                  <div class="card-image"></div>
                  <div class="card-info">Lengkapi Profil</a></div>
                </div>
              </div>
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6">
                <div class="card-style-2 hover-up hover-neon wow animate__animated animate__fadeIn"
                  data-wow-delay="0.2s">
                  <div class="card-image"></a></div>
                  <div class="card-info">Pengajuan Magang</a></div>
                </div>
              </div>
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6">
                <div class="card-style-2 hover-up hover-neon wow animate__animated animate__fadeIn"
                  data-wow-delay="0.3s">
                  <div class="card-image"></div>
                  <div class="card-info">Proses Seleksi</a></div>
                </div>
              </div>
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6">
                <div class="card-style-2 hover-up hover-neon wow animate__animated animate__fadeIn"
                  data-wow-delay="0.4s">
                  <div class="card-image"></div>
                  <div class="card-info">Pengumuman Hasil</a></div>
                </div>
              </div>
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6">
                <div class="card-style-2 hover-up hover-neon wow animate__animated animate__fadeIn"
                  data-wow-delay="0.5s">
                  <div class="card-image"></div>
                  <div class="card-info">Kegiatan Magang</a></div>
                </div>
              </div>
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6">
                <div class="card-style-2 hover-up hover-neon wow animate__animated animate__fadeIn"
                  data-wow-delay="0.1s">
                  <div class="card-image"></div>
                  <div class="card-info">Magang Selesai</a></div>
                </div>
              </div>
            </div>
            <div class="row mt-70" id="dokumentasi">
              <div class="col-lg-8">
                <h2 class="color-linear d-inline-block mb-10">Dokumentasi Kegiatan</h2>
                <p class="text-lg color-gray-500">Mari magang bersama kami</p>
                <div class="box-list-posts mt-70">
                  <div class="card-list-posts wow animate__animated animate__fadeIn">
                    <div class="card-image hover-up"><a href=".html"><img
                          src="assets/imgs/page/homepage1/img-news-1.jpg" alt="Genz"></a></div>
                    <div class="card-info"><a class="btn btn-tag bg-gray-800 hover-up"
                        href="blog-archive.html">Dokumentasi 1</a><a href=".html">
                        <h4 class="mt-15 mb-20 color-white">Helpful Tips for Working from Home as a Freelancer</h4>
                      </a>
                      <p class="color-gray-500">Gosh jaguar ostrich quail one excited dear hello and bound and the and
                        bland moral misheard roadrunner flapped lynx far that and jeepers giggled far and far</p>
                      <div class="row mt-20">
                        <div class="col-7"><a class="color-gray-700 text-sm mr-15" href="blog-archive.html">#
                            Travel</a><a class="color-gray-700 text-sm" href="blog-archive.html"># Lifestyle</a></div>
                        <div class="col-5 text-end"><span class="color-gray-700 text-sm timeread">3 mins read</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-list-posts wow animate__animated animate__fadeIn">
                    <div class="card-image hover-up"><a href=".html"><img
                          src="assets/imgs/page/homepage1/img-news-2.jpg" alt="Genz"></a></div>
                    <div class="card-info"><a class="btn btn-tag bg-gray-800 hover-up"
                        href="blog-archive.html">Dokumentasi 2</a><a href=".html">
                        <h4 class="mt-15 mb-20 color-white">Helpful Tips for Working from Home as a Freelancer</h4>
                      </a>
                      <p class="color-gray-500">Gosh jaguar ostrich quail one excited dear hello and bound and the and
                        bland moral misheard roadrunner flapped lynx far that and jeepers giggled far and far</p>
                      <div class="row mt-20">
                        <div class="col-7"><a class="color-gray-700 text-sm mr-15" href="blog-archive.html">#
                            Travel</a><a class="color-gray-700 text-sm" href="blog-archive.html"># Lifestyle</a></div>
                        <div class="col-5 text-end"><span class="color-gray-700 text-sm timeread">3 mins read</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-list-posts wow animate__animated animate__fadeIn">
                    <div class="card-image hover-up"><a href=".html"><img
                          src="assets/imgs/page/homepage1/img-news-3.jpg" alt="Genz"></a></div>
                    <div class="card-info"><a class="btn btn-tag bg-gray-800 hover-up"
                        href="blog-archive.html">Dokumentasi 3</a><a href=".html">
                        <h4 class="mt-15 mb-20 color-white">Helpful Tips for Working from Home as a Freelancer</h4>
                      </a>
                      <p class="color-gray-500">Gosh jaguar ostrich quail one excited dear hello and bound and the and
                        bland moral misheard roadrunner flapped lynx far that and jeepers giggled far and far</p>
                      <div class="row mt-20">
                        <div class="col-7"><a class="color-gray-700 text-sm mr-15" href="blog-archive.html">#
                            Travel</a><a class="color-gray-700 text-sm" href="blog-archive.html"># Lifestyle</a></div>
                        <div class="col-5 text-end"><span class="color-gray-700 text-sm timeread">3 mins read</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-list-posts wow animate__animated animate__fadeIn">
                    <div class="card-image hover-up"><a href=".html"><img
                          src="assets/imgs/page/homepage1/img-news-4.jpg" alt="Genz"></a></div>
                    <div class="card-info"><a class="btn btn-tag bg-gray-800 hover-up"
                        href="blog-archive.html">Dokumentasi 4</a><a href=".html">
                        <h4 class="mt-15 mb-20 color-white">Helpful Tips for Working from Home as a Freelancer</h4>
                      </a>
                      <p class="color-gray-500">Gosh jaguar ostrich quail one excited dear hello and bound and the and
                        bland moral misheard roadrunner flapped lynx far that and jeepers giggled far and far</p>
                      <div class="row mt-20">
                        <div class="col-7"><a class="color-gray-700 text-sm mr-15" href="blog-archive.html">#
                            Travel</a><a class="color-gray-700 text-sm" href="blog-archive.html"># Lifestyle</a></div>
                        <div class="col-5 text-end"><span class="color-gray-700 text-sm timeread">3 mins read</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-list-posts wow animate__animated animate__fadeIn">
                    <div class="card-image hover-up"><a href=".html"><img
                          src="assets/imgs/page/homepage1/img-news-5.jpg" alt="Genz"></a></div>
                    <div class="card-info"><a class="btn btn-tag bg-gray-800 hover-up"
                        href="blog-archive.html">Dokumentasi 5</a><a href=".html">
                        <h4 class="mt-15 mb-20 color-white">Helpful Tips for Working from Home as a Freelancer</h4>
                      </a>
                      <p class="color-gray-500">Gosh jaguar ostrich quail one excited dear hello and bound and the and
                        bland moral misheard roadrunner flapped lynx far that and jeepers giggled far and far</p>
                      <div class="row mt-20">
                        <div class="col-7"><a class="color-gray-700 text-sm mr-15" href="blog-archive.html">#
                            Travel</a><a class="color-gray-700 text-sm" href="blog-archive.html"># Lifestyle</a></div>
                        <div class="col-5 text-end"><span class="color-gray-700 text-sm timeread">3 mins read</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <nav class="mb-50">
                  <ul class="pagination">
                    <li class="page-item wow animate__animated animate__fadeIn" data-wow-delay=".0s"><a
                        class="page-link page-prev" href="#"><i class="fi-rr-arrow-small-left"></i></a></li>
                    <li class="page-item wow animate__animated animate__fadeIn" data-wow-delay=".1s"><a
                        class="page-link" href="#">1</a></li>
                    <li class="page-item wow animate__animated animate__fadeIn" data-wow-delay=".2s"><a
                        class="page-link active" href="#">2</a></li>
                    <li class="page-item wow animate__animated animate__fadeIn" data-wow-delay=".3s"><a
                        class="page-link" href="#">3</a></li>
                    <li class="page-item wow animate__animated animate__fadeIn" data-wow-delay=".4s"><a
                        class="page-link" href="#">...</a></li>
                    <li class="page-item wow animate__animated animate__fadeIn" data-wow-delay=".5s"><a
                        class="page-link page-next" href="#"><i class="fi-rr-arrow-small-right"></i></a></li>
                  </ul>
                </nav>
              </div>
              <div class="col-lg-4">
                <div class="sidebar">
                  <div class="box-sidebar bg-gray-850 border-gray-800">
                    <div class="head-sidebar wow animate__animated animate__fadeIn">
                      <h5 class="line-bottom">Dokumentasi Lainnya</h5>
                    </div>
                    <div class="content-sidebar">
                      <div class="list-posts">
                        <div class="item-post wow animate__animated animate__fadeIn">
                          <div class="image-post"><a href="single-sidebar.html"><img
                                src="assets/imgs/page/homepage1/img-post.jpg" alt="Genz"></a></div>
                          <div class="info-post border-gray-800"><a href="single-sidebar.html">
                              <h6 class="color-white">Creating is a privilege but it’s also a gift</h6>
                            </a><span class="color-gray-700">15 mins read</span>
                            <ul class="d-inline-block">
                              <li class="color-gray-700">15 April 2022</li>
                            </ul>
                          </div>
                        </div>
                        <div class="item-post wow animate__animated animate__fadeIn">
                          <div class="image-post"><a href="single-sidebar.html"><img
                                src="assets/imgs/page/homepage1/img-post2.jpg" alt="Genz"></a></div>
                          <div class="info-post border-gray-800"><a href="single-sidebar.html">
                              <h6 class="color-white">Being unique is better than being perfect</h6>
                            </a><span class="color-gray-700">15 mins read</span>
                            <ul class="d-inline-block">
                              <li class="color-gray-700">15 April 2022</li>
                            </ul>
                          </div>
                        </div>
                        <div class="item-post wow animate__animated animate__fadeIn">
                          <div class="image-post"><a href="single-sidebar.html"><img
                                src="assets/imgs/page/homepage1/img-post3.jpg" alt="Genz"></a></div>
                          <div class="info-post border-gray-800"><a href="single-sidebar.html">
                              <h6 class="color-white">Every day, in every city and town across the country</h6>
                            </a><span class="color-gray-700">15 mins read</span>
                            <ul class="d-inline-block">
                              <li class="color-gray-700">15 April 2022</li>
                            </ul>
                          </div>
                        </div>
                        <div class="item-post wow animate__animated animate__fadeIn">
                          <div class="image-post"><a href="single-sidebar.html"><img
                                src="assets/imgs/page/homepage1/img-post4.jpg" alt="Genz"></a></div>
                          <div class="info-post border-gray-800"><a href=".html">
                              <h6 class="color-white">Your voice, your mind, your story, your vision</h6>
                            </a><span class="color-gray-700">15 mins read</span>
                            <ul class="d-inline-block">
                              <li class="color-gray-700">15 April 2022</li>
                            </ul>
                          </div>
                        </div>
                        <div class="item-post wow animate__animated animate__fadeIn">
                          <div class="image-post"><a href=".html"><img
                                src="assets/imgs/page/homepage1/img-post4.jpg" alt="Genz"></a></div>
                          <div class="info-post border-gray-800"><a href=".html">
                              <h6 class="color-white">Your voice, your mind, your story, your vision</h6>
                            </a><span class="color-gray-700">15 mins read</span>
                            <ul class="d-inline-block">
                              <li class="color-gray-700">15 April 2022</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="box-sidebar bg-gray-850 border-gray-800">
                    <div class="head-sidebar wow animate__animated animate__fadeIn">
                      <h5 class="line-bottom">Alumni Magang</h5>
                    </div>
                    <div class="content-sidebar">
                      <div class="list-comments">
                        <div class="item-comment border-gray-800 wow animate__animated animate__fadeIn">
                          <p class="color-gray-500 mb-20">“ Sangat meanrik, saya suka magang disini selain pengalaman
                            saya juga banyak kenal teman-teman baru “</p>
                          <div class="box-author-small"><img src="assets/imgs/page/homepage1/author6.png" alt="Genz">
                            <div class="author-info"><span class="d-block color-gray-700 text-sm">Nur Kholis
                                Majid</span><span class="color-gray-700 text-xs">15 April 2025</span></div>
                          </div>
                        </div>
                        <div class="item-comment border-gray-800 wow animate__animated animate__fadeIn">
                          <p class="color-gray-500 mb-20">“ Mantap, skarang saya sudah kerja di perusahaan besar atas
                            pengalaman magang saya “</p>
                          <div class="box-author-small"><img src="assets/imgs/page/homepage1/author7.png" alt="Genz">
                            <div class="author-info"><span class="d-block color-gray-700 text-sm">Adi
                                Santoso</span><span class="color-gray-700 text-xs">12 juni 2025</span></div>
                          </div>
                        </div>
                        <div class="item-comment border-gray-800 wow animate__animated animate__fadeIn">
                          <p class="color-gray-500 mb-20">“ Jan jossss tenannn hahahaha “</p>
                          <div class="box-author-small"><img src="assets/imgs/page/homepage1/author8.png" alt="Genz">
                            <div class="author-info"><span class="d-block color-gray-700 text-sm">Cak Rizki</span><span
                                class="color-gray-700 text-xs">18 agustus 2024</span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="box-sidebar bg-gray-850 border-gray-800">
                    <div class="head-sidebar"><a href="index.html"><img
                class="logo-night" src="assets/imgs/template/kominDark.svg" alt="Genz"><img class="d-none logo-day"
                alt="GenZ" src="assets/imgs/template/komin.svg"></a>
                      <h6 class="color-gray-700">Tim Pengembang</h6>
                    </div>
                    <div class="content-sidebar">
                      <div class="row mt-30 mb-10">
                        <div class="col-sm-4 col-4 mb-20 wow animate__animated animate__fadeIn"><a href="#"><img
                              class="bdrd-8" src="assets/imgs/page/homepage1/gallery.png" alt="Genz"></a></div>
                        <div class="col-sm-4 col-4 mb-20 wow animate__animated animate__fadeIn"><a href="#"><img
                              class="bdrd-8" src="assets/imgs/page/homepage1/gallery2.png" alt="Genz"></a></div>
                        <div class="col-sm-4 col-4 mb-20 wow animate__animated animate__fadeIn"><a href="#"><img
                              class="bdrd-8" src="assets/imgs/page/homepage1/gallery3.png" alt="Genz"></a></div>
                        <div class="col-sm-4 col-4 mb-20 wow animate__animated animate__fadeIn"><a href="#"><img
                              class="bdrd-8" src="assets/imgs/page/homepage1/gallery4.png" alt="Genz"></a></div>
                      </div>
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
          <div class="col-lg-4 mb-30"><a class="wow animate__animated animate__fadeInUp" href="index.html"><img class="d-none logo-day"
                alt="GenZ" src="{{ asset('img/rb_3083.png') }}" width="80px"></a>
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
            <p class="text-base color-gray-500 wow animate__animated animate__fadeInUp">Daftar disini, Raih kesempatan magang yang berkualitas.</p>
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