<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dashboard MariMagang Diskominfo Kabupaten Malang">
    <meta name="keywords" content="magang, diskominfo, malang, dashboard">
    <meta name="author" content="Diskominfo Kab.Malang">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Title -->
    <title>@yield('title', 'Dashboard') - MariMagang Diskominfo Kab.Malang</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('style/images/logo/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('style/images/logo/apple-touch-icon.png') }}">

    <!-- Preload critical resources -->
    <link rel="preload" href="{{ asset('style/css/main.css') }}" as="style">
    <link rel="preload" href="{{ asset('style/js/main.js') }}" as="script">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('style/css/bootstrap.min.css') }}">

    <!-- File Upload -->
    <link rel="stylesheet" href="{{ asset('style/css/file-upload.css') }}">

    <!-- Plyr -->
    <link rel="stylesheet" href="{{ asset('style/css/plyr.css') }}">

    <!-- DataTables - gunakan asset lokal -->
    <link rel="stylesheet" href="{{ asset('style/css/dataTables.min.css') }}">

    <!-- Full Calendar -->
    <link rel="stylesheet" href="{{ asset('style/css/full-calendar.css') }}">

    <!-- jQuery UI -->
    <link rel="stylesheet" href="{{ asset('style/css/jquery-ui.css') }}">

    <!-- Editor Quill -->
    <link rel="stylesheet" href="{{ asset('style/css/editor-quill.css') }}">

    <!-- Apex Charts -->
    <link rel="stylesheet" href="{{ asset('style/css/apexcharts.css') }}">

    <!-- Calendar -->
    <link rel="stylesheet" href="{{ asset('style/css/calendar.css') }}">

    <!-- JVector Map -->
    <link rel="stylesheet" href="{{ asset('style/css/jquery-jvectormap-2.0.5.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('style/css/main.css') }}">

    <!-- Additional page-specific CSS -->
    @stack('styles')
</head>

<body>
    <!-- Skip to main content for accessibility -->
    {{-- <a href="#main-content" class="sr-only sr-only-focusable">Skip to main content</a> --}}

    <div class="preloader" aria-label="Loading...">
        <div class="loader"></div>
    </div>

    <div class="side-overlay"></div>

    <aside class="sidebar" role="navigation" aria-label="Main navigation">
        <!-- sidebar close btn -->
        <button type="button"
            class="sidebar-close-btn text-gray-500 hover-text-white hover-bg-main-600 text-md w-24 h-24 border border-gray-100 hover-border-main-600 d-xl-none d-flex flex-center rounded-circle position-absolute"
            aria-label="Close sidebar">
            <i class="ph ph-x" aria-hidden="true"></i>
        </button>

        <a href="{{ route('dashboard') }}"
            class="sidebar__logo text-center p-20 position-sticky inset-block-start-0 bg-white w-100 z-1 pb-10">
            <img src="{{ asset('assets/imgs/template/komin.svg') }}" alt="Logo Diskominfo Kabupaten Malang" loading="lazy">
        </a>

        <div class="sidebar-menu-wrapper overflow-y-auto scroll-sm">
            <div class="p-20 pt-10">
                <ul class="sidebar-menu" role="menubar">
                    <li class="sidebar-menu__item" role="none">
                        <a href="{{ route('dashboard') }}" 
                           class="sidebar-menu__link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                           role="menuitem">
                            <span class="icon" aria-hidden="true"><i class="ph ph-squares-four"></i></span>
                            <span class="text">Dashboard</span>
                        </a>
                    </li>
                    
                    <li class="sidebar-menu__item" role="none">
                        <a href="{{ route('pengajuan.index') }}" 
                           class="sidebar-menu__link {{ request()->routeIs('pengajuan.*') ? 'active' : '' }}"
                           role="menuitem">
                            <span class="icon" aria-hidden="true"><i class="ph ph-graduation-cap"></i></span>
                            <span class="text">Pengajuan</span>
                            @if(isset($pendingCount) && $pendingCount > 0)
                                <span class="link-badge" aria-label="{{ $pendingCount }} pengajuan pending">{{ $pendingCount }}</span>
                            @endif
                        </a>
                    </li>
                    
                    {{-- <li class="sidebar-menu__item" role="none">
                        <a href="{{ route('anggota.index') }}" 
                           class="sidebar-menu__link {{ request()->routeIs('anggota.*') ? 'active' : '' }}"
                           role="menuitem">
                            <span class="icon" aria-hidden="true"><i class="ph ph-users-three"></i></span>
                            <span class="text">Anggota</span>
                        </a>
                    </li> --}}
                    
                    <li class="sidebar-menu__item" role="none">
                        {{-- <a href="{{ route('jadwal.index') }}" 
                           class="sidebar-menu__link {{ request()->routeIs('jadwal.*') ? 'active' : '' }}"
                           role="menuitem">
                            <span class="icon" aria-hidden="true"><i class="ph ph-calendar-dots"></i></span>
                            <span class="text">Jadwal</span>
                        </a> --}}
                        <a href="{{ route('profile.edit') }}" class="sidebar-menu__link">
                            <span class="icon"><i class="ph ph-users-three"></i></span>
                            <span class="text">Profil</span>
                        </a>
                    </li>

                    <li class="sidebar-menu__item" role="none">
                        <span class="text-gray-300 text-sm px-20 pt-20 fw-semibold border-top border-gray-100 d-block text-uppercase">Settings</span>
                    </li>
                    
                    {{-- <li class="sidebar-menu__item" role="none">
                        <a href="{{ route('pengaturan.index') }}" 
                           class="sidebar-menu__link {{ request()->routeIs('pengaturan.*') ? 'active' : '' }}"
                           role="menuitem">
                            <span class="icon" aria-hidden="true"><i class="ph ph-gear"></i></span>
                            <span class="text">Pengaturan</span>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </aside>

    <div class="dashboard-main-wrapper">
        <header class="top-navbar flex-between gap-16" role="banner">
            <div class="flex-align gap-16">
                <!-- Toggle Button Start -->
                <button type="button" 
                        class="toggle-btn d-xl-none d-flex text-26 text-gray-500"
                        aria-label="Toggle sidebar"
                        aria-expanded="false">
                    <i class="ph ph-list" aria-hidden="true"></i>
                </button>
                <!-- Toggle Button End -->

                {{-- <form action="{{ route('search') }}" method="GET" class="w-350 d-sm-block d-none" role="search">
                    <div class="position-relative">
                        <button type="submit" 
                                class="input-icon text-xl d-flex text-gray-100 pointer-event-none"
                                aria-label="Search">
                            <i class="ph ph-magnifying-glass" aria-hidden="true"></i>
                        </button>
                        <input type="text"
                               name="q"
                               class="form-control ps-40 h-40 border-transparent focus-border-main-600 bg-main-50 rounded-pill placeholder-15"
                               placeholder="Cari..."
                               aria-label="Search input">
                    </div>
                </form> --}}
            </div>

            <div class="flex-align gap-16">
                <!-- Notification Start -->
                <div class="dropdown">
                    <button class="dropdown-btn shaking-animation text-gray-500 w-40 h-40 bg-main-50 hover-bg-main-100 transition-2 rounded-circle text-xl flex-center"
                            type="button" 
                            data-bs-toggle="dropdown" 
                            aria-expanded="false"
                            aria-label="Notifications">
                        <span class="position-relative">
                            <i class="ph ph-bell" aria-hidden="true"></i>
                            @if(isset($unreadNotifications) && $unreadNotifications > 0)
                                <span class="alarm-notify position-absolute end-0" aria-label="{{ $unreadNotifications }} unread notifications"></span>
                            @endif
                        </span>
                    </button>
                    
                    <div class="dropdown-menu dropdown-menu--lg border-0 bg-transparent p-0">
                        <div class="card border border-gray-100 rounded-12 box-shadow-custom p-0 overflow-hidden">
                            <div class="card-body p-0">
                                <div class="py-8 px-24 bg-main-600">
                                    <div class="flex-between">
                                        <h5 class="text-xl fw-semibold text-white mb-0">Notifikasi</h5>
                                        <div class="flex-align gap-12">
                                            <button type="button"
                                                    class="bg-white rounded-6 text-sm px-8 py-2 hover-text-primary-600">
                                                Baru
                                            </button>
                                            <button type="button"
                                                    class="close-dropdown hover-scale-1 text-xl text-white"
                                                    aria-label="Close notifications">
                                                <i class="ph ph-x" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-24 max-h-270 overflow-y-auto scroll-sm">
                                    @forelse ($notifications ?? [] as $notif)
                                        <div class="d-flex align-items-start gap-12 mb-24 border-bottom border-gray-100 pb-24">
                                            <div>
                                                <div class="flex-align gap-4 mb-2">
                                                    <a href="{{ $notif->url ?? '#' }}"
                                                       class="fw-medium text-15 mb-0 text-gray-300 hover-text-main-600 text-line-2">
                                                        {{ $notif->title ?? 'Tidak ada judul' }}
                                                    </a>
                                                </div>
                                                <p class="text-gray-900 text-sm mb-2">{{ $notif->message }}</p>
                                                <span class="text-gray-200 text-13">
                                                    {{ \Carbon\Carbon::parse($notif->created_at)->diffForHumans() }}
                                                </span>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="text-center text-gray-300 py-3">Tidak ada notifikasi.</div>
                                    @endforelse
                                </div>

                                <a href="{{ route('notifications.user') }}"
                                   class="py-13 px-24 fw-bold text-center d-block text-primary-600 border-top border-gray-100 hover-text-decoration-underline">
                                    Lihat Semua
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Notification End -->

                <!-- User Profile Start -->
                <div class="dropdown">
                    <button class="users arrow-down-icon border border-gray-200 rounded-pill p-4 d-inline-block pe-40 position-relative"
                            type="button" 
                            data-bs-toggle="dropdown" 
                            aria-expanded="false"
                            aria-label="User menu">
                        <span class="position-relative">
                            @if (auth()->user()->foto)
                                <img src="{{ asset('storage/' . auth()->user()->foto) }}" 
                                     alt="Foto Profil {{ auth()->user()->nama }}" 
                                     class="h-32 w-32 rounded-circle"
                                     loading="lazy"
                                     onerror="this.src='{{ asset('img/avatar-default.png') }}'">
                            @else
                                <div class="h-32 w-32 rounded-circle bg-primary-100 d-flex align-items-center justify-content-center">
                                    <span class="text-primary-600 fw-bold">
                                        {{ strtoupper(substr(auth()->user()->nama, 0, 2)) }}
                                    </span>
                                </div>
                            @endif
                            <span class="activation-badge w-8 h-8 position-absolute inset-block-end-0 inset-inline-end-0"
                                  aria-label="Online status"></span>
                        </span>
                    </button>
                    
                    <div class="dropdown-menu dropdown-menu--lg border-0 bg-transparent p-0">
                        <div class="card border border-gray-100 rounded-12 box-shadow-custom">
                            <div class="card-body">
                                <div class="flex-align gap-8 mb-20 pb-20 border-bottom border-gray-100">
                                    @if (auth()->user()->foto)
                                        <img src="{{ asset('storage/' . auth()->user()->foto) }}" 
                                             alt="Foto Profil {{ auth()->user()->nama }}" 
                                             class="w-54 h-54 rounded-circle"
                                             loading="lazy"
                                             onerror="this.src='{{ asset('img/avatar-default.png') }}'">
                                    @else
                                        <div class="w-54 h-54 rounded-circle bg-primary-100 d-flex align-items-center justify-content-center">
                                            <span class="text-primary-600 fw-bold text-xl">
                                                {{ strtoupper(substr(auth()->user()->nama, 0, 2)) }}
                                            </span>
                                        </div>
                                    @endif
                                    <div>
                                        <h4 class="mb-0">{{ auth()->user()->nama }}</h4>
                                        <p class="fw-medium text-13 text-gray-200">{{ auth()->user()->email }}</p>
                                    </div>
                                </div>
                                
                                <ul class="max-h-270 overflow-y-auto scroll-sm pe-4">
                                    <li class="mb-4">
                                        <a href="{{ route('profile.edit') }}"
                                           class="py-12 text-15 px-20 hover-bg-gray-50 text-gray-300 rounded-8 flex-align gap-8 fw-medium text-15">
                                            <span class="text-2xl text-primary-600 d-flex">
                                                <i class="ph ph-gear" aria-hidden="true"></i>
                                            </span>
                                            <span class="text">Pengaturan Akun</span>
                                        </a>
                                    </li>
                                    
                                    <li class="pt-8 border-top border-gray-100">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                    class="py-12 text-15 px-20 hover-bg-danger-50 text-gray-300 hover-text-danger-600 rounded-8 flex-align gap-8 fw-medium text-15 w-100 text-start"
                                                    style="background: none; border: none;">
                                                <span class="text-2xl text-danger-600 d-flex">
                                                    <i class="ph ph-sign-out" aria-hidden="true"></i>
                                                </span>
                                                <span class="text">Keluar</span>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- User Profile End -->
            </div>
        </header>

        <!-- Breadcrumb -->
        @if(!request()->routeIs('dashboard'))
        <nav aria-label="breadcrumb" class="px-24 py-16">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                @stack('breadcrumb')
            </ol>
        </nav>
        @endif

        <!-- Flash Messages -->
        @if(session('success') || session('error') || session('warning') || session('info'))
        <div class="px-24 py-16">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="ph ph-check-circle me-2" aria-hidden="true"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="ph ph-x-circle me-2" aria-hidden="true"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        @endif

        <!-- Main Content -->
        <main id="main-content" class="container-fluid px-24" role="main">
            @yield('content')
        </main>


        <div class="dashboard-footer">
            <div class="flex-between flex-wrap gap-16">
                <p class="text-gray-300 text-13 fw-normal"> &copy; Copyright Kominfo, All Right Reserverd</p>

            </div>
        </div>
    </div>

    <!-- Jquery js -->
<script src="{{ asset('style/js/jquery-3.7.1.min.js') }}"></script>
<!-- Bootstrap Bundle Js -->
<script src="{{ asset('style/js/boostrap.bundle.min.js') }}"></script>
<!-- Phosphor Js -->
<script src="{{ asset('style/js/phosphor-icon.js') }}"></script>
<!-- File upload -->
<script src="{{ asset('style/js/file-upload.js') }}"></script>
<!-- Plyr -->
<script src="{{ asset('style/js/plyr.js') }}"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<!-- Full calendar -->
<script src="{{ asset('style/js/full-calendar.js') }}"></script>
<!-- jQuery UI -->
<script src="{{ asset('style/js/jquery-ui.js') }}"></script>
<!-- Quill editor -->
<script src="{{ asset('style/js/editor-quill.js') }}"></script>
<!-- Apex Charts -->
<script src="{{ asset('style/js/apexcharts.min.js') }}"></script>
<!-- Calendar logic -->
<script src="{{ asset('style/js/calendar.js') }}"></script>
<!-- jVectorMap -->
<script src="{{ asset('style/js/jquery-jvectormap-2.0.5.min.js') }}"></script>
<!-- jVectorMap World -->
<script src="{{ asset('style/js/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- Main js -->
<script src="{{ asset('style/js/main.js') }}"></script>

</body>

</html>