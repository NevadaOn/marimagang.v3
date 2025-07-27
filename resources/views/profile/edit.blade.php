<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Title -->
    <title>Dashboard - MariMagang Diskominfo Kab.Malang</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('style/images/logo/favicon.png') }}">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('style/css/bootstrap.min.css') }}">

    <!-- File Upload -->
    <link rel="stylesheet" href="{{ asset('style/css/file-upload.css') }}">

    <!-- Plyr -->
    <link rel="stylesheet" href="{{ asset('style/css/plyr.css') }}">

    <!-- DataTables (tetap CDN) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">

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
</head>


<body>

    <div class="preloader">
        <div class="loader"></div>
    </div>

    <div class="side-overlay"></div>

    <aside class="sidebar">
        <!-- sidebar close btn -->
        <button type="button"
            class="sidebar-close-btn text-gray-500 hover-text-white hover-bg-main-600 text-md w-24 h-24 border border-gray-100 hover-border-main-600 d-xl-none d-flex flex-center rounded-circle position-absolute"><i
                class="ph ph-x"></i></button>
        <!-- sidebar close btn -->

        <a href="index.html"
            class="sidebar__logo text-center p-20 position-sticky inset-block-start-0 bg-white w-100 z-1 pb-10">
            <img src="assets/imgs/template/komin.svg" alt="Logo">
        </a>

        <div class="sidebar-menu-wrapper overflow-y-auto scroll-sm">
            <div class="p-20 pt-10">
                <ul class="sidebar-menu">
                    <li class="sidebar-menu__item ">
                        <a href="{{ url('/dashboard') }}" class="sidebar-menu__link">
                            <span class="icon"><i class="ph ph-squares-four"></i></span>
                            <span class="text">Dashboard</span>

                        </a>

                    </li>
                    <li class="sidebar-menu__item ">
                        <a href="{{ route('pengajuan.index') }}" class="sidebar-menu__link">
                            <span class="icon"><i class="ph ph-graduation-cap"></i></span>
                            <span class="text">Pengajuan</span>
                            {{-- <span class="link-badge">3</span> --}}
                        </a>

                    </li>
                    <li class="sidebar-menu__item">
                        <a href="anggota.html" class="sidebar-menu__link">
                            <span class="icon"><i class="ph ph-users-three"></i></span>
                            <span class="text">Anggota</span>
                        </a>
                    </li>
                    <li class="sidebar-menu__item">
                        <a href="jadwal.html" class="sidebar-menu__link">
                            <span class="icon"><i class="ph ph-calendar-dots"></i></span>
                            <span class="text">Jadwal</span>
                        </a>
                    </li>

                    <li class="sidebar-menu__item">
                        <span
                            class="text-gray-300 text-sm px-20 pt-20 fw-semibold border-top border-gray-100 d-block text-uppercase">Settings</span>
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

    <div class="dashboard-main-wrapper">

        <div class="top-navbar flex-between gap-16">

            <div class="flex-align gap-16">
                <!-- Toggle Button Start -->
                <button type="button" class="toggle-btn d-xl-none d-flex text-26 text-gray-500"><i
                        class="ph ph-list"></i></button>
                <!-- Toggle Button End -->

                <form action="#" class="w-350 d-sm-block d-none">
                    <div class="position-relative">
                        <button type="submit" class="input-icon text-xl d-flex text-gray-100 pointer-event-none"><i
                                class="ph ph-magnifying-glass"></i></button>
                        <input type="text"
                            class="form-control ps-40 h-40 border-transparent focus-border-main-600 bg-main-50 rounded-pill placeholder-15"
                            placeholder="Search...">
                    </div>
                </form>
            </div>

            <div class="flex-align gap-16">
                <div class="flex-align gap-8">
                    <!-- Notification Start -->
                    <div class="dropdown">
                        <button
                            class="dropdown-btn shaking-animation text-gray-500 w-40 h-40 bg-main-50 hover-bg-main-100 transition-2 rounded-circle text-xl flex-center"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                                            <h5 class="text-xl fw-semibold text-white mb-0">Notifikasi</h5>
                                            <div class="flex-align gap-12">
                                                <button type="button"
                                                    class="bg-white rounded-6 text-sm px-8 py-2 hover-text-primary-600">Baru</button>
                                                <button type="button"
                                                    class="close-dropdown hover-scale-1 text-xl text-white"><i class="ph ph-x"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-24 max-h-270 overflow-y-auto scroll-sm">
                                        @forelse ($notifications as $notif)
                                            <div class="d-flex align-items-start gap-12 mb-24 border-bottom border-gray-100 pb-24">
                                                {{-- <img src="{{ asset('img/avatar-default.png') }}" alt=""
                                                    class="w-48 h-48 rounded-circle object-fit-cover"> --}}
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
                    <!-- Notification Start -->


                </div>


                <!-- User Profile Start -->
                <div class="dropdown">
                    <button
                        class="users arrow-down-icon border border-gray-200 rounded-pill p-4 d-inline-block pe-40 position-relative"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="position-relative">
                            @if (auth()->user()->foto)
                                <img src="{{ asset('storage/' . auth()->user()->foto) }}" alt="Foto Profil" class="h-32 w-32 rounded-circle">
                            @else
                                {{ strtoupper(substr(auth()->user()->nama, 0, 2)) }}
                            @endif
                            <span
                                class="activation-badge w-8 h-8 position-absolute inset-block-end-0 inset-inline-end-0"></span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu--lg border-0 bg-transparent p-0">
                        <div class="card border border-gray-100 rounded-12 box-shadow-custom">
                            <div class="card-body">
                                <div class="flex-align gap-8 mb-20 pb-20 border-bottom border-gray-100">
                                    @if (auth()->user()->foto)
                                        <img src="{{ asset('storage/' . auth()->user()->foto) }}" alt="Foto Profil" class="w-54 h-54 rounded-circle">
                                    @else
                                        {{ strtoupper(substr(auth()->user()->nama, 0, 2)) }}
                                    @endif
                                    <div class="">
                                        <h4 class="mb-0">{{ auth()->user()->nama }}</h4>
                                        <p class="fw-medium text-13 text-gray-200">{{ auth()->user()->email }}</p>
                                    </div>
                                </div>
                                <ul class="max-h-270 overflow-y-auto scroll-sm pe-4">
                                    <li class="mb-4">
                                        <a href="setting.html"
                                            class="py-12 text-15 px-20 hover-bg-gray-50 text-gray-300 rounded-8 flex-align gap-8 fw-medium text-15">
                                            <span class="text-2xl text-primary-600 d-flex"><i
                                                    class="ph ph-gear"></i></span>
                                            <span class="text">Account Settings</span>
                                        </a>
                                    </li>
                                    <li class="mb-4">
                                        <a href="pricing-plan.html"
                                            class="py-12 text-15 px-20 hover-bg-gray-50 text-gray-300 rounded-8 flex-align gap-8 fw-medium text-15">
                                            <span class="text-2xl text-primary-600 d-flex"><i
                                                    class="ph ph-chart-bar"></i></span>
                                            <span class="text">Upgrade Plan</span>
                                        </a>
                                    </li>
                                    <li class="mb-4">
                                        <a href="analytics.html"
                                            class="py-12 text-15 px-20 hover-bg-gray-50 text-gray-300 rounded-8 flex-align gap-8 fw-medium text-15">
                                            <span class="text-2xl text-primary-600 d-flex"><i
                                                    class="ph ph-chart-line-up"></i></span>
                                            <span class="text">Daily Activity</span>
                                        </a>
                                    </li>
                                    <li class="mb-4">
                                        <a href="message.html"
                                            class="py-12 text-15 px-20 hover-bg-gray-50 text-gray-300 rounded-8 flex-align gap-8 fw-medium text-15">
                                            <span class="text-2xl text-primary-600 d-flex"><i
                                                    class="ph ph-chats-teardrop"></i></span>
                                            <span class="text">Inbox</span>
                                        </a>
                                    </li>
                                    <li class="mb-4">
                                        <a href="email.html"
                                            class="py-12 text-15 px-20 hover-bg-gray-50 text-gray-300 rounded-8 flex-align gap-8 fw-medium text-15">
                                            <span class="text-2xl text-primary-600 d-flex"><i
                                                    class="ph ph-envelope-simple"></i></span>
                                            <span class="text">Email</span>
                                        </a>
                                    </li>
                                    <li class="pt-8 border-top border-gray-100">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="py-12 text-15 px-20 hover-bg-danger-50 text-gray-300 hover-text-danger-600 rounded-8 flex-align gap-8 fw-medium text-15"
                                                style="background: none; border: none; width: 100%; text-align: left;">
                                                <span class="text-2xl text-danger-600 d-flex"><i class="ph ph-sign-out"></i></span>
                                                <span class="text">Log Out</span>
                                            </button>
                                        </form>
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
                              <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Keahlian</button>
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
            @if($userSkills->count() > 0)
            <div class="card mt-24" style="border: 1px solid #e3f2fd; border-radius: 12px; box-shadow: 0 2px 8px rgba(33, 150, 243, 0.1);">
                <div class="card-body" style="padding: 24px;">
                    <h6 class="mb-12" style="color: #1976d2; font-weight: 600; font-size: 18px; margin-bottom: 20px;">
                        <i class="fas fa-cogs" style="margin-right: 8px;"></i>Kemampuan
                    </h6>
                    @foreach($userSkills as $index => $userSkill)
                    <div class="rounded-8 border border-gray-100 p-16 mb-16" style="border: 1px solid #e3f2fd !important; border-radius: 10px !important; padding: 20px !important; margin-bottom: 16px !important; background: #fafffe; transition: all 0.3s ease;" onmouseover="this.style.boxShadow='0 4px 12px rgba(33, 150, 243, 0.15)'; this.style.transform='translateY(-2px)'" onmouseout="this.style.boxShadow='none'; this.style.transform='translateY(0)'">
                        <div class="comments-box__content flex-between gap-8" style="display: flex; justify-content: space-between; align-items: flex-start; gap: 16px;">
                            <div class="flex-align align-items-start gap-12" style="display: flex; align-items: flex-start; gap: 16px; flex-grow: 1;">
                                <p style="background: #2196f3; color: white; width: 28px; height: 28px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600; font-size: 14px; margin: 0;">{{ $index + 1 }}</p>
                                <div style="flex-grow: 1;">
                                    <h6 class="text-lg mb-8" style="color: #1976d2; font-weight: 600; font-size: 16px; margin-bottom: 8px;">{{ $userSkill->skill->nama }}</h6>
                                    <p class="text-gray-600 text-15" style="margin-bottom: 12px;">
                                        <span style="background: 
                                            @if($userSkill->level == 'Pemula') #e3f2fd; color: #1976d2;
                                            @elseif($userSkill->level == 'Menengah') #e8f5e8; color: #2e7d32;
                                            @elseif($userSkill->level == 'Mahir') #fff3e0; color: #f57c00;
                                            @elseif($userSkill->level == 'Ahli') #fce4ec; color: #c2185b;
                                            @endif
                                            padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 500;">
                                            {{ $userSkill->level }}
                                        </span>
                                    </p>
                                    
                                    <div style="margin-bottom: 12px;">
                                        @if($userSkill->sertifikat_path)
                                            <a href="{{ asset('storage/' . $userSkill->sertifikat_path) }}" target="_blank" style="background: #2196f3; color: white; padding: 6px 12px; border-radius: 6px; text-decoration: none; font-size: 13px; display: inline-block;">
                                                <i class="fas fa-certificate" style="margin-right: 4px;"></i>View Certificate
                                            </a>
                                        @else
                                            <span style="color: #666; font-style: italic; font-size: 13px;">
                                                <i class="fas fa-times-circle" style="margin-right: 4px; color: #ccc;"></i>No Certificate
                                            </span>
                                        @endif
                                    </div>
                                
                                    @if($userSkill->skill->judul_proyek)
                                        <div style="border-left: 3px solid #2196f3; padding-left: 16px; margin-top: 16px; background: #f8fbff; padding: 12px 16px; border-radius: 0 8px 8px 0;">
                                            <strong style="color: #1976d2; font-size: 14px; display: block; margin-bottom: 6px;">
                                                <i class="fas fa-project-diagram" style="margin-right: 6px;"></i>{{ $userSkill->skill->judul_proyek }}
                                            </strong>
                                            @if($userSkill->skill->deskripsi)
                                                <small style="color: #666; font-size: 13px; line-height: 1.4; display: block; margin-bottom: 10px;">{{ Str::limit($userSkill->skill->deskripsi, 50) }}</small>
                                            @endif
                                            <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                                                @if($userSkill->skill->link_project)
                                                    <a href="{{ $userSkill->skill->link_project }}" target="_blank" style="background: #bbdefb; color: #1976d2; padding: 4px 10px; border-radius: 4px; text-decoration: none; font-size: 12px;">
                                                        <i class="fas fa-external-link-alt" style="margin-right: 4px;"></i>View Project
                                                    </a>
                                                @endif
                                                @if($userSkill->skill->file_path)
                                                    <a href="{{ asset('storage/' . $userSkill->skill->file_path) }}" target="_blank" style="background: #e1f5fe; color: #0277bd; padding: 4px 10px; border-radius: 4px; text-decoration: none; font-size: 12px;">
                                                        <i class="fas fa-download" style="margin-right: 4px;"></i>Download File
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    @else
                                        <div style="color: #999; font-style: italic; font-size: 13px; margin-top: 8px;">
                                            <i class="fas fa-info-circle" style="margin-right: 4px;"></i>No Project
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            <div style="display: flex; flex-direction: column; gap: 6px; align-items: flex-end;">
                                <a href="{{ route('profile.edit', ['skill' => $userSkill->id]) }}#pills-profile"
   style="background: #2196f3; color: white; padding: 6px 12px; border-radius: 6px; text-decoration: none; font-size: 12px; min-width: 60px; text-align: center;">
   <i class="fas fa-edit" style="margin-right: 4px;"></i>Edit
</a>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const hash = window.location.hash;

        if (hash === '#pills-profile') {
            const tabTriggerEl = document.querySelector('[data-bs-target="' + hash + '"]');
            if (tabTriggerEl) {
                new bootstrap.Tab(tabTriggerEl).show();

                // Opsional: Scroll ke posisi tab
                document.querySelector(hash)?.scrollIntoView({ behavior: 'smooth' });
            }
        }
    });
</script>

                                @if($userSkill->skill->judul_proyek)
                                    <form method="POST" action="{{ route('profile.projects.destroy', $userSkill->id) }}" style="display: inline; margin: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete Project" onclick="return confirm('Delete this project?')" style="background: #ff9800; color: white; padding: 6px 12px; border-radius: 6px; border: none; font-size: 12px; cursor: pointer; min-width: 60px;">
                                    </form>
                                @endif
                                <form method="POST" action="{{ route('profile.skills.destroy', $userSkill->id) }}" style="display: inline; margin: 0;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete Skill" onclick="return confirm('Delete this skill completely?')" style="background: #f44336; color: white; padding: 6px 12px; border-radius: 6px; border: none; font-size: 12px; cursor: pointer; min-width: 60px;">
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <a href="#" class="flex-shrink-0 fw-bold text-13 text-main-600 flex-align gap-8 hover-text-main-800 hover-text-decoration-underline" style="color: #2196f3; text-decoration: none; font-weight: 600; font-size: 14px; display: inline-flex; align-items: center; gap: 8px; margin-top: 16px;">
                        View All <i class="ph ph-arrow-right"></i>
                    </a>
                </div>
            </div>
            @else
                <div style="text-align: center; padding: 40px; background: #f8fbff; border: 2px dashed #bbdefb; border-radius: 12px; margin-top: 24px;">
                    <i class="fas fa-plus-circle" style="font-size: 48px; color: #90caf9; margin-bottom: 16px;"></i>
                    <p style="color: #666; font-size: 16px; margin: 0;"><em>You haven't added any skills yet.</em></p>
                    <small style="color: #999; font-size: 14px;">Start by adding your first skill using the form on the right.</small>
                </div>
            @endif
        </div>
        
        <div class="col-lg-6">
            @if($editingSkill)
            <div class="card mt-24" style="border: 1px solid #e3f2fd; border-radius: 12px; box-shadow: 0 2px 8px rgba(33, 150, 243, 0.1); margin-bottom: 24px;">
                <div class="card-body" id="form-edit-skill" style="padding: 24px;">
                    <h2 style="color: #1976d2; font-size: 20px; margin-bottom: 20px; border-bottom: 2px solid #e3f2fd; padding-bottom: 12px;">
                        <i class="fas fa-edit" style="margin-right: 8px;"></i>Edit Skill: {{ $editingSkill->skill->nama }}
                    </h2>
                    <form action="{{ route('profile.skills.update', $editingSkill->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        
                        <div style="background: #fafffe; border: 1px solid #e3f2fd; border-radius: 8px; padding: 20px;">
                            <div style="display: grid; gap: 16px;">
                                <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 12px; align-items: center;">
                                    <label for="edit_level" style="font-weight: 600; color: #1976d2;">Level:</label>
                                    <select id="edit_level" name="level" required style="padding: 8px 12px; border: 1px solid #bbdefb; border-radius: 6px; background: white;">
                                        <option value="Pemula" {{ $editingSkill->level == 'Pemula' ? 'selected' : '' }}>Pemula</option>
                                        <option value="Menengah" {{ $editingSkill->level == 'Menengah' ? 'selected' : '' }}>Menengah</option>
                                        <option value="Mahir" {{ $editingSkill->level == 'Mahir' ? 'selected' : '' }}>Mahir</option>
                                        <option value="Ahli" {{ $editingSkill->level == 'Ahli' ? 'selected' : '' }}>Ahli</option>
                                    </select>
                                </div>
                                
                                <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 12px; align-items: center;">
                                    <label for="edit_sertifikat" style="font-weight: 600; color: #1976d2;">Update Sertifikat:</label>
                                    <div>
                                        <input type="file" id="edit_sertifikat" name="sertifikat" accept=".pdf,.jpg,.jpeg,.png" style="padding: 8px; border: 1px solid #bbdefb; border-radius: 6px; width: 100%; background: white;">
                                        @if($editingSkill->sertifikat_path)
                                            <small style="color: #666; font-size: 12px; display: block; margin-top: 4px;">Current: <a href="{{ asset('storage/' . $editingSkill->sertifikat_path) }}" target="_blank" style="color: #2196f3;">View Current Certificate</a></small>
                                        @endif
                                    </div>
                                </div>
                                
                                <div style="border-top: 1px solid #e3f2fd; padding-top: 16px; margin-top: 8px;">
                                    <h4 style="color: #1976d2; font-size: 16px; margin-bottom: 16px;">
                                        <i class="fas fa-project-diagram" style="margin-right: 6px;"></i>Project Information
                                    </h4>
                                </div>
                                
                                <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 12px; align-items: center;">
                                    <label for="edit_judul_proyek" style="font-weight: 600; color: #1976d2;">Judul Project:</label>
                                    <input type="text" id="edit_judul_proyek" name="judul_proyek" value="{{ old('judul_proyek', $editingSkill->skill->judul_proyek) }}" style="padding: 8px 12px; border: 1px solid #bbdefb; border-radius: 6px; background: white;">
                                </div>
                                
                                <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 12px; align-items: flex-start;">
                                    <label for="edit_deskripsi_proyek" style="font-weight: 600; color: #1976d2;">Deskripsi Project:</label>
                                    <textarea id="edit_deskripsi_proyek" name="deskripsi_proyek" rows="4" style="padding: 8px 12px; border: 1px solid #bbdefb; border-radius: 6px; background: white; resize: vertical;">{{ old('deskripsi_proyek', $editingSkill->skill->deskripsi) }}</textarea>
                                </div>
                                
                                <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 12px; align-items: center;">
                                    <label for="edit_link_project" style="font-weight: 600; color: #1976d2;">Link Project:</label>
                                    <input type="url" id="edit_link_project" name="link_project" value="{{ old('link_project', $editingSkill->skill->link_project) }}" style="padding: 8px 12px; border: 1px solid #bbdefb; border-radius: 6px; background: white;">
                                </div>
                                
                                <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 12px; align-items: center;">
                                    <label for="edit_file_project" style="font-weight: 600; color: #1976d2;">Update File Project:</label>
                                    <div>
                                        <input type="file" id="edit_file_project" name="file_project" accept=".jpg,.jpeg,.png,.pdf,.zip,.rar" style="padding: 8px; border: 1px solid #bbdefb; border-radius: 6px; width: 100%; background: white;">
                                        @if($editingSkill->skill->file_path)
                                            <small style="color: #666; font-size: 12px; display: block; margin-top: 4px;">Current: <a href="{{ asset('storage/' . $editingSkill->skill->file_path) }}" target="_blank" style="color: #2196f3;">View Current File</a></small>
                                        @endif
                                    </div>
                                </div>
                                
                                <div style="display: flex; gap: 12px; margin-top: 16px;">
                                    <input type="submit" value="Update Skill" style="background: #2196f3; color: white; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer; font-weight: 600;">
                                    <a href="{{ route('profile.edit') }}" style="background: #666; color: white; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: 600;">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endif
            
            <div class="card mt-24" style="border: 1px solid #e3f2fd; border-radius: 12px; box-shadow: 0 2px 8px rgba(33, 150, 243, 0.1);">
                <div class="card-body" style="padding: 24px;">
                    <h2 style="color: #1976d2; font-size: 20px; margin-bottom: 20px; border-bottom: 2px solid #e3f2fd; padding-bottom: 12px;">
                        <i class="fas fa-plus" style="margin-right: 8px;"></i>Add New Skill
                    </h2>
                    <form action="{{ route('profile.skills.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div style="background: #fafffe; border: 1px solid #e3f2fd; border-radius: 8px; padding: 20px;">
                            <div style="display: grid; gap: 16px;">
                                <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 12px; align-items: center;">
                                    <label for="nama_skill" style="font-weight: 600; color: #1976d2;">Nama Skill:</label>
                                    <input type="text" id="nama_skill" name="nama_skill" value="{{ old('nama_skill') }}" required style="padding: 8px 12px; border: 1px solid #bbdefb; border-radius: 6px; background: white;">
                                </div>
                                
                                <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 12px; align-items: center;">
                                    <label for="level" style="font-weight: 600; color: #1976d2;">Level:</label>
                                    <select id="level" name="level" required style="padding: 8px 12px; border: 1px solid #bbdefb; border-radius: 6px; background: white;">
                                        <option value="">Pilih Level</option>
                                        <option value="Pemula" {{ old('level') == 'Pemula' ? 'selected' : '' }}>Pemula</option>
                                        <option value="Menengah" {{ old('level') == 'Menengah' ? 'selected' : '' }}>Menengah</option>
                                        <option value="Mahir" {{ old('level') == 'Mahir' ? 'selected' : '' }}>Mahir</option>
                                        <option value="Ahli" {{ old('level') == 'Ahli' ? 'selected' : '' }}>Ahli</option>
                                    </select>
                                </div>
                                
                                <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 12px; align-items: center;">
                                    <label for="sertifikat" style="font-weight: 600; color: #1976d2;">Sertifikat (Optional):</label>
                                    <input type="file" id="sertifikat" name="sertifikat" accept=".pdf,.jpg,.jpeg,.png" style="padding: 8px; border: 1px solid #bbdefb; border-radius: 6px; width: 100%; background: white;">
                                </div>
                                
                                <div style="border-top: 1px solid #e3f2fd; padding-top: 16px; margin-top: 8px;">
                                    <h4 style="color: #1976d2; font-size: 16px; margin-bottom: 16px;">
                                        <i class="fas fa-project-diagram" style="margin-right: 6px;"></i>Project Information (Optional)
                                    </h4>
                                </div>
                                
                                <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 12px; align-items: center;">
                                    <label for="judul_proyek" style="font-weight: 600; color: #1976d2;">Judul Project:</label>
                                    <input type="text" id="judul_proyek" name="judul_proyek" value="{{ old('judul_proyek') }}" style="padding: 8px 12px; border: 1px solid #bbdefb; border-radius: 6px; background: white;">
                                </div>
                                
                                <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 12px; align-items: flex-start;">
                                    <label for="deskripsi_proyek" style="font-weight: 600; color: #1976d2;">Deskripsi Project:</label>
                                    <textarea id="deskripsi_proyek" name="deskripsi_proyek" rows="4" style="padding: 8px 12px; border: 1px solid #bbdefb; border-radius: 6px; background: white; resize: vertical;">{{ old('deskripsi_proyek') }}</textarea>
                                </div>
                                
                                <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 12px; align-items: center;">
                                    <label for="link_project" style="font-weight: 600; color: #1976d2;">Link Project:</label>
                                    <input type="url" id="link_project" name="link_project" value="{{ old('link_project') }}" placeholder="https://example.com" style="padding: 8px 12px; border: 1px solid #bbdefb; border-radius: 6px; background: white;">
                                </div>
                                
                                <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 12px; align-items: center;">
                                    <label for="file_project" style="font-weight: 600; color: #1976d2;">File Project:</label>
                                    <input type="file" id="file_project" name="file_project" accept=".jpg,.jpeg,.png,.pdf,.zip,.rar" style="padding: 8px; border: 1px solid #bbdefb; border-radius: 6px; width: 100%; background: white;">
                                </div>
                                
                                <div style="display: flex; gap: 12px; margin-top: 16px;">
                                    <input type="submit" value="Add Skill" style="background: #2196f3; color: white; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer; font-weight: 600;">
                                    <input type="reset" value="Reset Form" style="background: #666; color: white; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer; font-weight: 600;">
                                </div>
                            </div>
                        </div>
                    </form>
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