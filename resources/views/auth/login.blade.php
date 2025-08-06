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
    <title>Login – Mari-Magang</title>
    <link rel="icon" type="image/png" href="{{ asset('img/rb_30833.png') }}">
    <link href="{{ asset('assets/css/style.css?v=2.0') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <title>Login - Mari-Magang</title>
  </head>
  <body>
    <style>
    .viewpass {
        position: absolute;
        top: 50%;
        right: 12px;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #ccc;
        cursor: pointer;
        font-size: 1.1rem;
        z-index: 10;
    }
    .d-none {
        display: none !important;
    }
    </style>

    <div id="preloader-active">
      <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
          <div class="text-center"><img class="mb-10" src="{{ asset('assets/imgs/template/favicon.svg') }}" alt="GenZ">
            <div class="preloader-dots"></div>
          </div>
        </div>
      </div>
    </div>
    <header class="header sticky-bar">
      <div class="container">
        <div class="row align-items-start">
          <div class="col-xl-1"></div>
          <div class="col-xl-10 col-lg-12">
            
          </div>
        </div>
      </div>
    </header>

    <main class="main">
      <div class="cover-home3">
        <div class="container">
          <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
              <div class="text-center mt-50 pb-50">
                <h2 class="color-linear d-inline-block">Selamat Datang Peserta Magang !</h2>
              </div>
              <div class="box-form-login pb-50">
                <div class="form-login bg-gray-850 border-gray-800 text-start">
                  <form method="POST" action="{{ url('/login') }}">
                    @csrf

                    <div class="form-group">
                        <input class="form-control bg-gray-850 border-gray-800" 
                            type="email" 
                            name="email" 
                            id="email" 
                            placeholder="User name" 
                            required>
                    </div>

                    <div class="form-group position-relative">
                        <input class="form-control bg-gray-850 border-gray-800 password"
                            type="password"
                            name="password"
                            id="password"
                            placeholder="Password"
                            required>
                        
                        <button type="button" class="viewpass" aria-label="Toggle password visibility">
                            <i class="fas fa-eye" id="eye-open"></i>
                            <i class="fas fa-eye-slash d-none" id="eye-closed"></i>
                        </button>
                    </div>

                    <div class="form-group">
                        <a class="color-white link" href="{{ route('password.request') }}">Lupa Password? Klik di Sini</a>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-linear color-gray-850 hover-up" type="submit" value="Log me in">
                    </div>

                    <div class="form-group mb-0">
                        <span>Belum Punya Akun?</span>
                        <a class="color-linear" href="{{ route('register') }}">Daftar Sekarang</a>
                    </div>
                </form>
                
                @if ($errors->any())
    <div class="mt-4">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-center animate-fade-in-down" role="alert">
            <strong class="font-bold">Oops!</strong>
            <span class="block sm:inline">{{ $errors->first() }}</span>
        </div>
    </div>
@endif


                </div>
                <div class="box-line"><span class="bg-gray-900">Or, sign in with your email</span></div>
                <div class="box-login-gmail bg-gray-850 border-gray-800 hover-up"><a class="btn btn-login-gmail color-gray-500" href="#">Sign in with Google</a></div>
                <div class="box-line"><span class="bg-gray-900"><a class="color-linear" href="/">Kembali</span> </a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    
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
    <script>
      $('.viewpass').on('click', function () {
          const input = $(this).siblings('input');
          const eyeOpen = $(this).find('#eye-open');
          const eyeClosed = $(this).find('#eye-closed');
          
          if (input.attr('type') === 'password') {
              input.attr('type', 'text');
              eyeOpen.addClass('d-none');
              eyeClosed.removeClass('d-none');
          } else {
              input.attr('type', 'password');
              eyeOpen.removeClass('d-none');
              eyeClosed.addClass('d-none');
          }
      });
    </script>

  </body>
</html>