<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="msapplication-TileColor" content="#0E0E0E" />
  <meta name="theme-color" content="#0E0E0E" />
  <meta name="description" content="Halaman Reset Password" />
  <meta name="keywords" content="reset, password, email" />
  <meta name="author" content="" />
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/template/rb_3083.svg') }}" />
  <link href="{{ asset('assets/css/style.css?v=2.0') }}" rel="stylesheet" />
  <title>Reset Password - Mari Magang Diskominfo</title>
</head>

<body>
  <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
      <div class="preloader-inner position-relative">
        <div class="text-center">
          <img class="mb-10" src="{{ asset('assets/imgs/template/favicon.svg') }}" alt="GenZ" />
          <div class="preloader-dots"></div>
        </div>
      </div>
    </div>
  </div>

  <main class="main">
    <section class="pt-100 pb-100 bg-gray-900">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 col-md-8">
            <div class="card bg-gray-850 border border-gray-800 p-4 bdrd16">
              <h2 class="color-white text-center mb-30">Reset Password</h2>

              @if (session('status'))
                <div class="alert alert-success text-sm color-white-500">
                  {{ session('status') }}
                </div>
              @endif

              <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group mb-3">
                  <label for="email" class="color-gray-500 text-sm mb-2">Alamat Email</label>
                  <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control bg-gray-800 border-gray-700 color-white"
                    placeholder="nama@email.com"
                    required
                  />
                  @error('email')
                    <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group mt-4">
                  <button type="submit" class="btn btn-linear hover-up w-100">
                    Kirim Link Reset
                    <i class="fi-rr-arrow-small-right ml-10"></i>
                  </button>
                </div>
              </form>

              <div class="text-center mt-3">
                <a href="{{ route('login') }}" class="color-gray-500 hover-underline">Kembali ke Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
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
