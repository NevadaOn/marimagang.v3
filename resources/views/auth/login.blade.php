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
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/template/favicon.svg') }}">
    <link href="{{ asset('assets/css/style.css?v=2.0') }}" rel="stylesheet">

    <title>Login - Personal Blog  HTML Template</title>
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
    <header class="header sticky-bar">
      <div class="container">
        <div class="row align-items-start">
          <div class="col-xl-1"></div>
          <div class="col-xl-10 col-lg-12">
            
          </div>
        </div>
      </div>
    </header>
    @if ($errors->any())
    <div>
        <strong>Error:</strong> {{ $errors->first() }}
    </div>
@endif
    <main class="main">
      <div class="cover-home3">
        <div class="container">
          <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
              <div class="text-center mt-50 pb-50">
                <h2 class="color-linear d-inline-block">Welcome back !</h2>
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
                        <span class="viewpass"></span>
                    </div>

                    <div class="form-group">
                        <a class="color-white link" href="{{ route('password.request') }}">Forgot password?</a>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-linear color-gray-850 hover-up" type="submit" value="Log me in">
                    </div>

                    <div class="form-group mb-0">
                        <span>Don’t have an account?</span>
                        <a class="color-linear" href="{{ route('register') }}">Sign Up</a>
                    </div>
                </form>

                </div>
                <div class="box-line"><span class="bg-gray-900">Or, sign in with your email</span></div>
                <div class="box-login-gmail bg-gray-850 border-gray-800 hover-up"><a class="btn btn-login-gmail color-gray-500" href="#">Sign in with Google</a></div>
                <div class="box-line"><span class="bg-gray-900"><a class="color-linear" href="index.html">Back</span> </a></div>
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

  </body>
</html>