<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>{{ config('app.name', 'Edmate Learning Dashboard') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('style/images/logo/favicon.png') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('style/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/css/file-upload.css') }}">
    <link rel="stylesheet" href="{{ asset('style/css/plyr.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('style/css/full-calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('style/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('style/css/editor-quill.css') }}">
    <link rel="stylesheet" href="{{ asset('style/css/apexcharts.css') }}">
    <link rel="stylesheet" href="{{ asset('style/css/calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('style/css/jquery-jvectormap-2.0.5.css') }}">
    <link rel="stylesheet" href="{{ asset('style/css/main.css') }}">
</head>

<body>
    
<!--==================== Preloader Start ====================-->
  <div class="preloader">
    <div class="loader"></div>
  </div>
<!--==================== Preloader End ====================-->

<!--==================== Sidebar Overlay End ====================-->
<div class="side-overlay"></div>
<!--==================== Sidebar Overlay End ====================-->

    <!-- ============================ Sidebar Start ============================ -->

<aside class="sidebar">
    <!-- sidebar close btn -->
     <button type="button" class="sidebar-close-btn text-gray-500 hover-text-white hover-bg-main-600 text-md w-24 h-24 border border-gray-100 hover-border-main-600 d-xl-none d-flex flex-center rounded-circle position-absolute"><i class="ph ph-x"></i></button>
    <!-- sidebar close btn -->
    
    <a href="index.html" class="sidebar__logo text-center p-20 position-sticky inset-block-start-0 bg-white w-100 z-1 pb-10">
        <img src="{{asset('style/images/logo/logo.png')}}" alt="Logo">
    </a>

    <div class="sidebar-menu-wrapper overflow-y-auto scroll-sm">
        <div class="p-20 pt-10">
            <ul class="sidebar-menu">
                <li class="sidebar-menu__item ">
                    <a href="user_dashboard.html" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-squares-four"></i></span>
                        <span class="text">Dashboard</span>
                        
                    </a>
                    
                </li>
                <li class="sidebar-menu__item ">
                    <a href="tugas.html" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-graduation-cap"></i></span>
                        <span class="text">Tugas</span>
                        <span class="link-badge">3</span>
                    </a>
                    
                </li>
                <li class="sidebar-menu__item">
                    <a href="anggota.html" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-users-three"></i></span>
                        <span class="text">Students</span>
                    </a>
                </li>

                <li class="sidebar-menu__item">
                    <a href="jadwal.html" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-calendar-dots"></i></span>
                        <span class="text">Jadwal</span>
                    </a>
                </li>

                
                <li class="sidebar-menu__item">
                    <span class="text-gray-300 text-sm px-20 pt-20 fw-semibold border-top border-gray-100 d-block text-uppercase">Settings</span>
                </li>
                <li class="sidebar-menu__item">
                    <a href="edit_akun.html" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-gear"></i></span>
                        <span class="text">Pengaturan</span>
                    </a>
                </li>

                
                
            </ul>
        </div>
        
    </div>

</aside>    
<!-- ============================ Sidebar End  ============================ -->

    <div class="dashboard-main-wrapper">
        <div class="top-navbar flex-between gap-16">

    <div class="flex-align gap-16">
        <!-- Toggle Button Start -->
         <button type="button" class="toggle-btn d-xl-none d-flex text-26 text-gray-500"><i class="ph ph-list"></i></button>
        <!-- Toggle Button End -->
        
        <form action="#" class="w-350 d-sm-block d-none">
            <div class="position-relative">
                <button type="submit" class="input-icon text-xl d-flex text-gray-100 pointer-event-none"><i class="ph ph-magnifying-glass"></i></button> 
                <input type="text" class="form-control ps-40 h-40 border-transparent focus-border-main-600 bg-main-50 rounded-pill placeholder-15" placeholder="Search...">
            </div>
        </form>
    </div>

    <div class="flex-align gap-16">
        <div class="flex-align gap-8">
            <!-- Notification Start -->
            <div class="dropdown">
                <button class="dropdown-btn shaking-animation text-gray-500 w-40 h-40 bg-main-50 hover-bg-main-100 transition-2 rounded-circle text-xl flex-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="position-relative">
                        <i class="ph ph-bell"></i>
                        <span class="alarm-notify position-absolute end-0"></span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu--lg border-0 bg-transparent p-0">
                    <div class="card border border-gray-100 rounded-12 box-shadow-custom p-0 overflow-hidden">
                        <div class="card-body p-0">
                            <div class="py-8 px-24 bg-main-600">
                                <div class="flex-between">
                                    <h5 class="text-xl fw-semibold text-white mb-0">Notifications</h5>
                                    <div class="flex-align gap-12">
                                        <button type="button" class="bg-white rounded-6 text-sm px-8 py-2 hover-text-primary-600"> New </button>
                                        <button type="button" class="close-dropdown hover-scale-1 text-xl text-white"><i class="ph ph-x"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="p-24 max-h-270 overflow-y-auto scroll-sm">
                                <div class="d-flex align-items-start gap-12">
                                    <img src="{{asset('style/images/thumbs/notification-img1.png')}}" alt="" class="w-48 h-48 rounded-circle object-fit-cover">
                                    <div class="border-bottom border-gray-100 mb-24 pb-24">
                                        <div class="flex-align gap-4">
                                            <a href="#" class="fw-medium text-15 mb-0 text-gray-300 hover-text-main-600 text-line-2">Ashwin Bose is requesting access to Design File - Final Project. </a>
                                            <!-- Three Dot Dropdown Start -->
                                            <div class="dropdown flex-shrink-0">
                                                <button class="text-gray-200 rounded-4" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ph-fill ph-dots-three-outline"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu--md border-0 bg-transparent p-0">
                                                    <div class="card border border-gray-100 rounded-12 box-shadow-custom">
                                                        <div class="card-body p-12">
                                                            <div class="max-h-200 overflow-y-auto scroll-sm pe-8">
                                                                <ul>
                                                                    <li class="mb-0">
                                                                        <a href="#" class="py-6 text-15 px-8 hover-bg-gray-50 text-gray-300 rounded-8 fw-normal text-xs d-block">
                                                                            <span class="text">Mark as read</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="mb-0">
                                                                        <a href="#" class="py-6 text-15 px-8 hover-bg-gray-50 text-gray-300 rounded-8 fw-normal text-xs d-block">
                                                                            <span class="text">Delete Notification</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="mb-0">
                                                                        <a href="#" class="py-6 text-15 px-8 hover-bg-gray-50 text-gray-300 rounded-8 fw-normal text-xs d-block">
                                                                            <span class="text">Report</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Three Dot Dropdown End -->
                                        </div>
                                        <div class="flex-align gap-6 mt-8">
                                            <img src="{{asset('style/images/icons/google-drive.png')}}" alt="">
                                            <div class="flex-align gap-4">
                                                <p class="text-gray-900 text-sm text-line-1">Design brief and ideas.txt</p>
                                                <span class="text-xs text-gray-200 flex-shrink-0">2.2 MB</span>
                                            </div>
                                        </div>
                                        <div class="mt-16 flex-align gap-8">
                                            <button type="button" class="btn btn-main py-8 text-15 fw-normal px-16">Accept</button>
                                            <button type="button" class="btn btn-outline-gray py-8 text-15 fw-normal px-16">Decline</button>
                                        </div>
                                        <span class="text-gray-200 text-13 mt-8">2 mins ago</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start gap-12">
                                    <img src="{{asset('style/images/thumbs/notification-img2.png')}}" alt="" class="w-48 h-48 rounded-circle object-fit-cover">
                                    <div class="">
                                        <a href="#" class="fw-medium text-15 mb-0 text-gray-300 hover-text-main-600 text-line-2">Patrick added a comment on Design Assets - Smart Tags file:</a>
                                        <span class="text-gray-200 text-13">2 mins ago</span>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="py-13 px-24 fw-bold text-center d-block text-primary-600 border-top border-gray-100 hover-text-decoration-underline"> View All </a>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Notification Start -->

        </div>


        <!-- User Profile Start -->
        <div class="dropdown">
            <button class="users arrow-down-icon border border-gray-200 rounded-pill p-4 d-inline-block pe-40 position-relative" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="position-relative">
                    <img src="{{asset('style/images/thumbs/user-img.png')}}" alt="Image" class="h-32 w-32 rounded-circle">
                    <span class="activation-badge w-8 h-8 position-absolute inset-block-end-0 inset-inline-end-0"></span>
                </span>
            </button>
            <div class="dropdown-menu dropdown-menu--lg border-0 bg-transparent p-0">
                <div class="card border border-gray-100 rounded-12 box-shadow-custom">
                    <div class="card-body">
                        <div class="flex-align gap-8 mb-20 pb-20 border-bottom border-gray-100">
                            <img src="{{asset('style/images/thumbs/user-img.png')}}" alt="" class="w-54 h-54 rounded-circle">
                            <div class="">
                                <h4 class="mb-0">{{ old('nama', $user->nama) }}</h4>
                                <p class="fw-medium text-13 text-gray-200">examplemail@mail.com</p>
                            </div>
                        </div>
                        <ul class="max-h-270 overflow-y-auto scroll-sm pe-4">
                            <li class="mb-4">
                                <a href="setting.html" class="py-12 text-15 px-20 hover-bg-gray-50 text-gray-300 rounded-8 flex-align gap-8 fw-medium text-15">
                                    <span class="text-2xl text-primary-600 d-flex"><i class="ph ph-gear"></i></span>
                                    <span class="text">Account Settings</span>
                                </a>
                            </li>
                            <li class="mb-4">
                                <a href="pricing-plan.html" class="py-12 text-15 px-20 hover-bg-gray-50 text-gray-300 rounded-8 flex-align gap-8 fw-medium text-15">
                                    <span class="text-2xl text-primary-600 d-flex"><i class="ph ph-chart-bar"></i></span>
                                    <span class="text">Upgrade Plan</span>
                                </a>
                            </li>
                            <li class="mb-4">
                                <a href="analytics.html" class="py-12 text-15 px-20 hover-bg-gray-50 text-gray-300 rounded-8 flex-align gap-8 fw-medium text-15">
                                    <span class="text-2xl text-primary-600 d-flex"><i class="ph ph-chart-line-up"></i></span>
                                    <span class="text">Daily Activity</span>
                                </a>
                            </li>
                            <li class="mb-4">
                                <a href="message.html" class="py-12 text-15 px-20 hover-bg-gray-50 text-gray-300 rounded-8 flex-align gap-8 fw-medium text-15">
                                    <span class="text-2xl text-primary-600 d-flex"><i class="ph ph-chats-teardrop"></i></span>
                                    <span class="text">Inbox</span>
                                </a>
                            </li>
                            <li class="mb-4">
                                <a href="email.html" class="py-12 text-15 px-20 hover-bg-gray-50 text-gray-300 rounded-8 flex-align gap-8 fw-medium text-15">
                                    <span class="text-2xl text-primary-600 d-flex"><i class="ph ph-envelope-simple"></i></span>
                                    <span class="text">Email</span>
                                </a>
                            </li>
                            <li class="pt-8 border-top border-gray-100">
                                <a href="sign-in.html" class="py-12 text-15 px-20 hover-bg-danger-50 text-gray-300 hover-text-danger-600 rounded-8 flex-align gap-8 fw-medium text-15">
                                    <span class="text-2xl text-danger-600 d-flex"><i class="ph ph-sign-out"></i></span>
                                    <span class="text">Log Out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- User Profile Start -->

    </div>
</div>

        
        <div class="dashboard-body">
            <!-- Breadcrumb Start -->
<div class="breadcrumb mb-24">
    <ul class="flex-align gap-4">
        <li><a href="index.html" class="text-gray-200 fw-normal text-15 hover-text-main-600">Dashboard</a></li>
        <li> <span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span> </li>
        <li><span class="text-main-600 fw-normal text-15">Akun</span></li>
    </ul>
</div>
<!-- Breadcrumb End -->
             @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
            <div class="card overflow-hidden">
                <div class="card-body p-0">
                    <div class="cover-img position-relative">
                        <label for="coverImageUpload" class="btn border-gray-200 text-gray-200 fw-normal hover-bg-gray-400 rounded-pill py-4 px-14 position-absolute inset-block-start-0 inset-inline-end-0 mt-24 me-24">Edit Cover</label>
                        <div class="avatar-upload">
                            <input type='file' id="coverImageUpload" accept=".png, .jpg, .jpeg">
                            <div class="avatar-preview">
                                <div id="coverImagePreview" style="background-image: url('{{ asset('style/images/thumbs/setting-cover-img.png') }}');">

                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="setting-profile px-24">
                        <div class="flex-between">
                            <div class="d-flex align-items-end flex-wrap mb-32 gap-24">
                                <img src="{{ $user->foto ? asset('storage/' . $user->foto) : asset('style/images/thumbs/setting-profile-img.jpg') }}" alt="" class="w-120 h-120 rounded-circle border border-white">
                                <div>
                                    <h4 class="mb-8">{{ old('nama', $user->nama) }}</h4>
                                    @error('nama')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="setting-profile__infos flex-align flex-wrap gap-16">
                                        <div class="flex-align gap-6">
                                            <span class="text-gray-600 d-flex text-lg"><i class="ph ph-swatches"></i></span>
                                            <span class="text-gray-600 d-flex text-15">{{ old('telepon', $user->telepon) }}</span>
                                        </div>
                                        <div class="flex-align gap-6">
                                            <span class="text-gray-600 d-flex text-lg"><i class="ph ph-map-pin"></i></span>
                                            <span class="text-gray-600 d-flex text-15">{{ old('alamat', $user->alamat) }}</span>
                                        </div>
                                        <div class="flex-align gap-6">
                                            <span class="text-gray-600 d-flex text-lg"><i class="ph ph-calendar-dots"></i></span>
                                            <span class="text-gray-600 d-flex text-15">{{ old('nim', $user->nim) }}</span>
                                        </div>
                                        <div class="flex-align gap-6">
                                            <span class="text-gray-600 d-flex text-lg"><i class="ph ph-calendar-dots"></i></span>
                                            <span class="text-gray-600 d-flex text-15">{{ old('nama_universitas', $user->universitas->nama_universitas ?? '') }}</span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <ul class="nav common-tab style-two nav-pills mb-0" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="pills-details-tab" data-bs-toggle="pill" data-bs-target="#pills-details" type="button" role="tab" aria-controls="pills-details" aria-selected="true">Data Diri</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Skill</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-password-tab" data-bs-toggle="pill" data-bs-target="#pills-password" type="button" role="tab" aria-controls="pills-password" aria-selected="false">Password</button>
                            </li>
                            
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-notification-tab" data-bs-toggle="pill" data-bs-target="#pills-notification" type="button" role="tab" aria-controls="pills-notification" aria-selected="false">Notification</button>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="tab-content" id="pills-tabContent">
                <!-- My Details Tab start -->
                <div class="tab-pane fade show active" id="pills-details" role="tabpanel" aria-labelledby="pills-details-tab" tabindex="0">
                    <div class="card mt-24">
                        <div class="card-header border-bottom">
                            <h4 class="mb-4">Data Diri</h4>
                            <p class="text-gray-600 text-15">Lengkapi Data Diri Anda</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row gy-4">
                                    <div class="col-sm-6 col-xs-6">
                                        <label for="fname" class="form-label mb-8 h6">Nama Lengkap</label>
                                        <input type="text" class="form-control py-11" name="nama" id="fname" value="{{ old('nama', $user->nama) }}">
                                        @error('nama')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <label for="Alamat" class="form-label mb-8 h6">Alamat</label>
                                        <input type="text" class="form-control py-11" id="Alamat" name="alamat" placeholder="Alamat tempat tinggal" value="{{ old('alamat', $user->alamat) }}">
                                    </div>
                                    {{-- <div class="col-sm-6 col-xs-6">
                                        <label for="email" class="form-label mb-8 h6">Email</label>
                                        <input type="email" class="form-control py-11" id="email" placeholder="Enter Email">
                                    </div> --}}
                                    <div class="col-sm-6 col-xs-6">
                                        <label for="phone" class="form-label mb-8 h6">No Telp</label>
                                        <input type="number" class="form-control py-11" name="telepon" id="phone" value="{{ old('telepon', $user->telepon) }}">
                                        {{-- <input type="text" name="telepon" class="form-control" value="{{ old('telepon', $user->telepon) }}"> --}}
                                        @error('telepon')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="imageUpload" class="form-label mb-8 h6">Your Photo</label>
                                        <div class="flex-align gap-22">
                                            <div class="avatar-upload flex-shrink-0">
                                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg">
                                                <div class="avatar-preview">
                                                    <div id="profileImagePreview" style="background-image: url('dashboard/images/thumbs/setting-profile-img.jpg');">
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="dropArea"
                                                class="avatar-upload-box text-center position-relative flex-grow-1 py-24 px-4 rounded-16 border border-main-300 border-dashed bg-main-50 hover-bg-main-100 hover-border-main-400 transition-2 cursor-pointer">
                                                
                                                <label for="imageUpload" class="position-absolute inset-block-start-0 inset-inline-start-0 w-100 h-100 rounded-16 cursor-pointer z-1"></label>
                                                
                                                <span class="text-32 icon text-main-600 d-inline-flex"><i class="ph ph-upload"></i></span>
                                                <span class="text-13 d-block text-gray-400 text my-8">Click to upload or drag and drop</span>
                                                <span class="text-13 d-block text-main-600">SVG, PNG, JPEG OR GIF (max 1080px1200px)</span>

                                                <input type="file" name="foto" id="imageUpload" class="form-control d-none" accept="image/*">
                                                
                                                @error('foto')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <label for="nim" class="form-label mb-8 h6">Nim</label>
                                        <input type="text" class="form-control py-11" name="nim" id="nim" value="{{ old('nim', $user->nim ?: 'Masukkan Nim') }}">
                                        {{-- <input type="text" name="nim" class="form-control" value="{{ old('nim', $user->nim) }}"> --}}
                                        @error('nim')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <label for="fakultas" class="form-label mb-8 h6">Fakultas</label>
                                        <input type="text" class="form-control py-11" name="fakultas" id="fakultas" value="{{ old('fakultas', $user->universitas->fakultas ?? '') }}">
                                        {{-- <input type="text" name="fakultas" class="form-control"
                                            value="{{ old('fakultas', $user->universitas->fakultas ?? '') }}"> --}}
                                        @error('fakultas')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <label for="prodi" class="form-label mb-8 h6">Program Studi (Prodi)</label>
                                        <input type="text" class="form-control py-11" name="prodi" id="prodi" value="{{ old('prodi', $user->universitas->prodi ?? '') }}">
                                        {{-- <input type="text" name="prodi" class="form-control"
                                            value="{{ old('prodi', $user->universitas->prodi ?? '') }}"> --}}
                                        @error('prodi')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <label for="universitas" class="form-label mb-8 h6">Universitas</label>
                                        <input type="text" class="form-control py-11" name="nama_universitas" id="universitas" value="{{ old('nama_universitas', $user->universitas->nama_universitas ?? '') }}">
                                        {{-- <input type="text" name="nama_universitas" class="form-control"
                                            value="{{ old('nama_universitas', $user->universitas->nama_universitas ?? '') }}"> --}}
                                        @error('nama_universitas')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="editor">
                                            <label class="form-label mb-8 h6">Tentang Saya</label>
                                            <textarea class="form-control" name="bio" placeholder="Deskripsikan Diri Anda">{{ old('bio', $user->bio) }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="flex-align justify-content-end gap-8">
                                            <button type="reset" class="btn btn-outline-main bg-main-100 border-main-100 text-main-600 rounded-pill py-9">Cancel</button>
                                            <button type="submit" class="btn btn-main rounded-pill py-9">Simpan Perubahan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- My Details Tab End -->
                
                <!-- Profile Tab Start -->
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                    <div class="row gy-4">
                        <div class="col-lg-6">
                            <div class="card mt-24">
                                <div class="card-body">
                                    <h6 class="mb-12">Tentang Saya</h6>
                                    <p class="text-gray-600 text-15 rounded-8 border border-gray-100 p-16">{{ old('bio', $user->bio) }}</p>
                                </div>
                            </div>
                            <div class="card mt-24">
                                <div class="card-body">
                                    <h6 class="mb-12">Recent Messages</h6>
                                    
                                    <div class="rounded-8 border border-gray-100 p-16 mb-16">
                                        <div class="comments-box__content flex-between gap-8">
                                            <div class="flex-align align-items-start gap-12">
                                                <img src="dashboard/images/thumbs/user-img1.png" class="w-32 h-32 rounded-circle object-fit-cover flex-shrink-0" alt="User Image">
                                                <div>
                                                    <h6 class="text-lg mb-8">Michel Smith</h6>
                                                    <p class="text-gray-600 text-15">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo pellentesque massa </p>
                                                </div>
                                            </div>
                                            <button type="button" class="flex-shrink-0 fw-bold text-13 text-main-600 flex-align gap-8 hover-text-main-800">Reply <i class="ph ph-arrow-bend-up-left d-flex text-lg"></i> </button>
                                        </div>
                                    </div>

                                    <div class="rounded-8 border border-gray-100 p-16 mb-16">
                                        <div class="comments-box__content flex-between gap-8">
                                            <div class="flex-align align-items-start gap-12">
                                                <img src="dashboard/images/thumbs/user-img5.png" class="w-32 h-32 rounded-circle object-fit-cover flex-shrink-0" alt="User Image">
                                                <div>
                                                    <h6 class="text-lg mb-8">Zara Maliha</h6>
                                                    <p class="text-gray-600 text-15">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo pellentesque massa </p>
                                                </div>
                                            </div>
                                            <button type="button" class="flex-shrink-0 fw-bold text-13 text-main-600 flex-align gap-8 hover-text-main-800">Reply <i class="ph ph-arrow-bend-up-left d-flex text-lg"></i> </button>
                                        </div>
                                    </div>

                                    <div class="rounded-8 border border-gray-100 p-16 mb-16">
                                        <div class="comments-box__content flex-between gap-8">
                                            <div class="flex-align align-items-start gap-12">
                                                <img src="dashboard/images/thumbs/user-img3.png" class="w-32 h-32 rounded-circle object-fit-cover flex-shrink-0" alt="User Image">
                                                <div>
                                                    <h6 class="text-lg mb-8">Simon Doe</h6>
                                                    <p class="text-gray-600 text-15">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo pellentesque massa </p>
                                                </div>
                                            </div>
                                            <button type="button" class="flex-shrink-0 fw-bold text-13 text-main-600 flex-align gap-8 hover-text-main-800">Reply <i class="ph ph-arrow-bend-up-left d-flex text-lg"></i> </button>
                                        </div>
                                    </div>

                                    <div class="rounded-8 border border-gray-100 p-16 mb-16">
                                        <div class="comments-box__content flex-between gap-8">
                                            <div class="flex-align align-items-start gap-12">
                                                <img src="dashboard/images/thumbs/user-img4.png" class="w-32 h-32 rounded-circle object-fit-cover flex-shrink-0" alt="User Image">
                                                <div>
                                                    <h6 class="text-lg mb-8">Elejabeth Jenny</h6>
                                                    <p class="text-gray-600 text-15">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo pellentesque massa </p>
                                                </div>
                                            </div>
                                            <button type="button" class="flex-shrink-0 fw-bold text-13 text-main-600 flex-align gap-8 hover-text-main-800">Reply <i class="ph ph-arrow-bend-up-left d-flex text-lg"></i> </button>
                                        </div>
                                    </div>

                                    <div class="rounded-8 border border-gray-100 p-16 mb-16">
                                        <div class="flex-between gap-8">
                                            <div class="flex-align align-items-start gap-12">
                                                <img src="dashboard/images/thumbs/user-img8.png" class="w-32 h-32 rounded-circle object-fit-cover flex-shrink-0" alt="User Image">
                                                <div>
                                                    <h6 class="text-lg mb-8">Ronald Doe</h6>
                                                    <p class="text-gray-600 text-15">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo pellentesque massa </p>
                                                </div>
                                            </div>
                                            <button type="button" class="flex-shrink-0 fw-bold text-13 text-main-600 flex-align gap-8 hover-text-main-800">Reply <i class="ph ph-arrow-bend-up-left d-flex text-lg"></i> </button>
                                        </div>
                                    </div>

                                    <a href="#" class="flex-shrink-0 fw-bold text-13 text-main-600 flex-align gap-8 hover-text-main-800 hover-text-decoration-underline">
                                        View All <i class="ph ph-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card mt-24">
                                <div class="card-body">
                                    <h6 class="mb-12">Social Media</h6>
                                    <ul class="flex-align flex-wrap gap-8">
                                        <li>
                                            <a href="https://www.facebook.com" class="flex-center w-36 h-36 border border-main-600 text-main-600 rounded-circle text-xl hover-bg-main-100 hover-border-main-800"><i class="ph ph-facebook-logo"></i></a> 
                                        </li>
                                        <li>
                                            <a href="https://www.google.com" class="flex-center w-36 h-36 border border-main-600 text-main-600 rounded-circle text-xl hover-bg-main-100 hover-border-main-800"> <i class="ph ph-twitter-logo"></i></a>
                                        </li>
                                        <li>
                                            <a href="https://www.twitter.com" class="flex-center w-36 h-36 border border-main-600 text-main-600 rounded-circle text-xl hover-bg-main-100 hover-border-main-800"><i class="ph ph-linkedin-logo"></i></a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com" class="flex-center w-36 h-36 border border-main-600 text-main-600 rounded-circle text-xl hover-bg-main-100 hover-border-main-800"><i class="ph ph-instagram-logo"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card mt-24">
                                <div class="card-body">
                                    <div class="row gy-4">
                                        <div class="col-xxl-4 col-xl-6 col-md-4 col-sm-6">
                                            <div class="statistics-card p-xl-4 p-16 flex-align gap-10 rounded-8 bg-main-50">
                                                <span class="text-white bg-main-600 w-36 h-36 rounded-circle flex-center text-xl flex-shrink-0"><i class="ph ph-users-three"></i></span>
                                                <div>
                                                    <h4 class="mb-0">450k</h4>
                                                    <span class="fw-medium text-main-600">Followers</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-xl-6 col-md-4 col-sm-6">
                                            <div class="statistics-card p-xl-4 p-16 flex-align gap-10 rounded-8 bg-info-50">
                                                <span class="text-white bg-info-600 w-36 h-36 rounded-circle flex-center text-xl flex-shrink-0"><i class="ph ph-users-three"></i></span>
                                                <div>
                                                    <h4 class="mb-0">289k</h4>
                                                    <span class="fw-medium text-info-600">Following</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-xl-6 col-md-4 col-sm-6">
                                            <div class="statistics-card p-xl-4 p-16 flex-align gap-10 rounded-8 bg-purple-50">
                                                <span class="text-white bg-purple-600 w-36 h-36 rounded-circle flex-center text-xl flex-shrink-0"><i class="ph ph-thumbs-up"></i></span>
                                                <div>
                                                    <h4 class="mb-0">1256k</h4>
                                                    <span class="fw-medium text-purple-600">Likes</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-24">
                                        <div class="flex-align gap-8 flex-wrap mb-16">
                                            <span class="flex-center w-36 h-36 text-main-600 bg-main-100 rounded-circle text-xl"> 
                                                <i class="ph ph-phone"></i>
                                            </span>
                                            <div class="flex-align gap-8 flex-wrap text-gray-600">
                                                <span>+00 123 456 789</span>
                                                <span>+00 123 456 789</span>
                                            </div>
                                        </div>
                                        <div class="flex-align gap-8 flex-wrap mb-16">
                                            <span class="flex-center w-36 h-36 text-main-600 bg-main-100 rounded-circle text-xl"> 
                                                <i class="ph ph-envelope-simple"></i>
                                            </span>
                                            <div class="flex-align gap-8 flex-wrap text-gray-600">
                                                <span>exampleinfo1@mail.com,</span>
                                                <span>exampleinfo2@mail.com</span>
                                            </div>
                                        </div>
                                        <div class="flex-align gap-8 flex-wrap mb-16">
                                            <span class="flex-center w-36 h-36 text-main-600 bg-main-100 rounded-circle text-xl"> 
                                                <i class="ph ph-map-pin"></i>
                                            </span>
                                            <div class="flex-align gap-8 flex-wrap text-gray-600">
                                                <span>Inner Circular Road, New York City, 0123</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-24">
                                <div class="card-body">
                                    <h6 class="mb-12">About Me</h6>
                                    <div class="recent-post rounded-8 border border-gray-100 p-16 d-flex gap-12 mb-16">
                                        <div class="d-inline-flex w-100 max-w-130 flex-shrink-0">
                                            <img src="dashboard/images/thumbs/recent-post-img1.png" alt="" class="rounded-6 cover-img max-w-130">
                                        </div>
                                        <div>
                                            <p class="text-gray-600 text-line-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo pellentesque massa tellus ac augue. Lectus arcu at in in rhoncus malesuada ipsum turpis.</p>
                                            <div class="flex-align gap-8 mt-24">
                                                <img src="dashboard/images/thumbs/user-img1.png" alt="" class="w-32 h-32 rounded-circle cover-img">
                                                <span class="text-gray-600 text-13">Michel Bruice</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="recent-post rounded-8 border border-gray-100 p-16 d-flex gap-12 mb-16">
                                        <div class="d-inline-flex w-100 max-w-130 flex-shrink-0">
                                            <img src="dashboard/images/thumbs/recent-post-img2.png" alt="" class="rounded-6 cover-img max-w-130">
                                        </div>
                                        <div>
                                            <p class="text-gray-600 text-line-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo pellentesque massa tellus ac augue. Lectus arcu at in in rhoncus malesuada ipsum turpis.</p>
                                            <div class="flex-align gap-8 mt-24">
                                                <img src="dashboard/images/thumbs/user-img2.png" alt="" class="w-32 h-32 rounded-circle cover-img">
                                                <span class="text-gray-600 text-13">Sara Smith</span>
                                            </div>
                                        </div>
                                    </div>

                                    <h6 class="mb-12 mt-24">Add New Post</h6>
                                    <div class="editor style-two">
                                        <div id="editorTwo">
                                            <p>Write something new...</p>
                                        </div>
                                    </div>

                                    <div class="flex-between flex-wrap gap-8 mt-24">
                                        <div class="flex-align flex-wrap gap-8">
                                            <button type="button" class="flex-center w-26 h-26 text-gray-600 bg-gray-50 hover-bg-gray-100 rounded-circle text-md"> 
                                                <i class="ph ph-smiley"></i>
                                            </button>
                                            <button type="button" class="flex-center w-26 h-26 text-gray-600 bg-gray-50 hover-bg-gray-100 rounded-circle text-md"> 
                                                <i class="ph ph-camera"></i>
                                            </button>
                                            <button type="button" class="flex-center w-26 h-26 text-gray-600 bg-gray-50 hover-bg-gray-100 rounded-circle text-md"> 
                                                <i class="ph ph-image"></i>
                                            </button>
                                            <button type="button" class="flex-center w-26 h-26 text-gray-600 bg-gray-50 hover-bg-gray-100 rounded-circle text-md"> 
                                                <i class="ph ph-video-camera"></i>
                                            </button>
                                            <button type="button" class="flex-center w-26 h-26 text-gray-600 bg-gray-50 hover-bg-gray-100 rounded-circle text-md"> 
                                                <i class="ph ph-google-drive-logo"></i>
                                            </button>
                                        </div>
                                        <button type="submit" class="btn btn-main rounded-pill py-9"> Post Now</button>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Profile Tab End -->

                <!-- Password Tab Start -->
                <div class="tab-pane fade" id="pills-password" role="tabpanel" aria-labelledby="pills-password-tab" tabindex="0">
                    <div class="card mt-24">
                        <div class="card-header border-bottom">
                            <h4 class="mb-4">Password Settings</h4>
                            <p class="text-gray-600 text-15">Please fill full details about yourself</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="#">
                                        <div class="row gy-4">
                                            <div class="col-12">
                                                <label for="current-password" class="form-label mb-8 h6">Current Password</label>
                                                <div class="position-relative">
                                                    <input type="password" class="form-control py-11" id="current-password" placeholder="Enter Current Password">
                                                    <span class="toggle-password position-absolute top-50 inset-inline-end-0 me-16 translate-middle-y ph ph-eye-slash" id="#current-password"></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="new-password" class="form-label mb-8 h6">New Password</label>
                                                <div class="position-relative">
                                                    <input type="password" class="form-control py-11" id="new-password" placeholder="Enter New Password">
                                                    <span class="toggle-password position-absolute top-50 inset-inline-end-0 me-16 translate-middle-y ph ph-eye-slash" id="#new-password"></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="confirm-password" class="form-label mb-8 h6">Confirm Password</label>
                                                <div class="position-relative">
                                                    <input type="password" class="form-control py-11" id="confirm-password" placeholder="Enter Confirm Password">
                                                    <span class="toggle-password position-absolute top-50 inset-inline-end-0 me-16 translate-middle-y ph ph-eye-slash" id="#confirm-password"></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label mb-8 h6">Password Requirements:</label>
                                                <ul class="list-inside">
                                                    <li class="text-gray-600 mb-4">At least one lowercase character</li>
                                                    <li class="text-gray-600 mb-4">Minimum 8 characters long - the more, the better</li>
                                                    <li class="text-gray-300 mb-4">At least one number, symbol, or whitespace character</li>
                                                </ul>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label mb-8 h6">Two-Step Verification</label>
                                                <ul>
                                                    <li class="text-gray-600 mb-4 fw-semibold">Two-factor authentication is not enabled yet.</li>
                                                    <li class="text-gray-600 mb-4 fw-medium">Two-factor authentication adds a layer of security to your account by requiring more than just a password to log in. Learn more.</li>
                                                </ul>
                                                <button type="submit" class="btn btn-main rounded-pill py-9 mt-24">Enable two-factor authentication</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12">
                                    <div class="flex-align justify-content-end gap-8">
                                        <button type="reset" class="btn btn-outline-main bg-main-100 border-main-100 text-main-600 rounded-pill py-9">Cancel</button>
                                        <button type="submit" class="btn btn-main rounded-pill py-9">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                

                <!-- Notification Tab Start -->
                <div class="tab-pane fade" id="pills-notification" role="tabpanel" aria-labelledby="pills-notification-tab" tabindex="0">
                    <div class="card mt-24">
                        <div class="card-header border-bottom">
                            <h4 class="mb-4">Notifiction Settings</h4>
                            <p class="text-gray-600 text-15">We may still send you important notification about your account outside of your notification settings.</p>
                        </div>
                        <div class="card-body">
                            <div class="pt-24 pb-24 border-bottom border-gray-100">
                                <div class="row gy-4">
                                    <div class="col-sm-6 col-xs-6">
                                        <h6 class="mb-8">Comments</h6>
                                        <p class="max-w-280 text-gray-600 text-13">These are notifications for comments on your posts and replies to your comments</p>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-switch switch-primary d-flex align-items-center gap-8 mb-16">
                                            <input class="form-check-input" type="checkbox" role="switch" id="switch1">
                                            <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="switch1">Push</label>
                                        </div>
                                        <div class="form-switch switch-primary d-flex align-items-center gap-8 mb-16">
                                            <input class="form-check-input" type="checkbox" role="switch" id="switch2" checked>
                                            <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="switch2">Email</label>
                                        </div>
                                        <div class="form-switch switch-primary d-flex align-items-center gap-8 mb-16">
                                            <input class="form-check-input" type="checkbox" role="switch" id="switch3" checked>
                                            <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="switch3">SMS</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-24 pb-24 border-bottom border-gray-100">
                                <div class="row gy-4">
                                    <div class="col-sm-6 col-xs-6">
                                        <h6 class="mb-8">Tags</h6>
                                        <p class="max-w-280 text-gray-600 text-13">These are notifications for when someone tags you in a comment, post or story</p>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-switch switch-primary d-flex align-items-center gap-8 mb-16">
                                            <input class="form-check-input" type="checkbox" role="switch" id="switch4" checked>
                                            <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="switch4">Push</label>
                                        </div>
                                        <div class="form-switch switch-primary d-flex align-items-center gap-8 mb-16">
                                            <input class="form-check-input" type="checkbox" role="switch" id="switch5" >
                                            <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="switch5">Email</label>
                                        </div>
                                        <div class="form-switch switch-primary d-flex align-items-center gap-8 mb-16">
                                            <input class="form-check-input" type="checkbox" role="switch" id="switch6" >
                                            <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="switch6">SMS</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-24 pb-24 border-bottom border-gray-100">
                                <div class="row gy-4">
                                    <div class="col-sm-6 col-xs-6">
                                        <h6 class="mb-8">Reminders</h6>
                                        <p class="max-w-280 text-gray-600 text-13">These are notifications to reminds you of updates you might have missed.</p>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-switch switch-primary d-flex align-items-center gap-8 mb-16">
                                            <input class="form-check-input" type="checkbox" role="switch" id="switch7" checked>
                                            <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="switch7">Push</label>
                                        </div>
                                        <div class="form-switch switch-primary d-flex align-items-center gap-8 mb-16">
                                            <input class="form-check-input" type="checkbox" role="switch" id="switch8">
                                            <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="switch8">Email</label>
                                        </div>
                                        <div class="form-switch switch-primary d-flex align-items-center gap-8 mb-16">
                                            <input class="form-check-input" type="checkbox" role="switch" id="switch9" checked>
                                            <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="switch9">SMS</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-24 border-bottom border-gray-100">
                                <div class="row gy-4">
                                    <div class="col-sm-6 col-xs-6">
                                        <h6 class="mb-8">More activity about you</h6>
                                        <p class="max-w-280 text-gray-600 text-13">These are notification for posts on your profile, likes and other reactions to your posts, and more.</p>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-switch switch-primary d-flex align-items-center gap-8 mb-16">
                                            <input class="form-check-input" type="checkbox" role="switch" id="switch10" checked>
                                            <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="switch10">Push</label>
                                        </div>
                                        <div class="form-switch switch-primary d-flex align-items-center gap-8 mb-16">
                                            <input class="form-check-input" type="checkbox" role="switch" id="switch11" >
                                            <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="switch11">Email</label>
                                        </div>
                                        <div class="form-switch switch-primary d-flex align-items-center gap-8 mb-16">
                                            <input class="form-check-input" type="checkbox" role="switch" id="switch12" checked>
                                            <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="switch12">SMS</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="flex-align justify-content-end gap-8">
                                <button type="reset" class="btn btn-outline-main bg-main-100 border-main-100 text-main-600 rounded-pill py-9">Cancel</button>
                                <button type="submit" class="btn btn-main rounded-pill py-9">Save  Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Notification Tab End -->

            </div>
        </div>
        <div class="dashboard-footer">
    <div class="flex-between flex-wrap gap-16">
        <p class="text-gray-300 text-13 fw-normal"> &copy; Copyright Diskominfo, All Right Reserverd</p>
        
    </div>
</div>
    </div>
        
    <!-- jQuery -->
    <script src="{{ asset('style/js/jquery-3.7.1.min.js') }}"></script>

    <!-- Bootstrap Bundle -->
    <script src="{{ asset('style/js/boostrap.bundle.min.js') }}"></script>

    <!-- Phosphor Icon -->
    <script src="{{ asset('style/js/phosphor-icon.js') }}"></script>

    <!-- File Upload -->
    <script src="{{ asset('style/js/file-upload.js') }}"></script>

    <!-- Plyr -->
    <script src="{{ asset('style/js/plyr.js') }}"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>

    <!-- Full Calendar -->
    <script src="{{ asset('style/js/full-calendar.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('style/js/jquery-ui.js') }}"></script>

    <!-- ApexCharts -->
    <script src="{{ asset('style/js/apexcharts.min.js') }}"></script>

    <!-- Calendar -->
    <script src="{{ asset('style/js/calendar.js') }}"></script>

    <!-- jVectorMap -->
    <script src="{{ asset('style/js/jquery-jvectormap-2.0.5.min.js') }}"></script>
    <script src="{{ asset('style/js/jquery-jvectormap-world-mill-en.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('style/js/main.js') }}"></script>




    <script>
        // ============================= Avatar Upload js ============================= 
        function uploadImageFunction(imageId, previewId) {
            $(imageId).on('change', function () {
                var input = this; // 'this' is the DOM element here
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $(previewId).css('background-image', 'url(' + e.target.result + ')');
                        $(previewId).hide();
                        $(previewId).fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });
        }
        uploadImageFunction('#coverImageUpload', '#coverImagePreview'); 
        uploadImageFunction('#imageUpload', '#profileImagePreview');

        // ============================= Table Header Checkbox checked all js ============================= 
        $('#selectAll').on('change', function () {
            $('.form-check .form-check-input').prop('checked', $(this).prop('checked')); 
        }); 

        // ============================= Data Tables ============================= 
        new DataTable('#studentTable', {
            searching: false,
            lengthChange: false,
            info: false,   // Bottom Left Text => Showing 1 to 10 of 12 entries
            pagination: false,
            paging: false,
            "columnDefs": [
                { "orderable": false, "targets": [0, 6] } // Disables sorting on the 1st & 7th column (index 6)
            ]
        });
    </script>


    </body>
</html>