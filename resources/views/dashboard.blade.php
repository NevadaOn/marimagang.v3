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
                        <a href="#" class="sidebar-menu__link">
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


        <div class="dashboard-body ">
            <div class="row gy-4 ">
                <div class="col-lg-9">
                    <!-- Grettings Box Start -->
                    <div
                        class="grettings-box position-relative rounded-16 bg-main-600 overflow-hidden gap-16 flex-wrap z-1">
                        <img src="dashboard/images/bg/grettings-pattern.png" alt=""
                            class="position-absolute inset-block-start-0 inset-inline-start-0 z-n1 w-100 h-100 opacity-6">
                        <div class="row gy-4">
                            <div class="col-sm-7">
                                <div class="grettings-box__content py-xl-4">
                                    <h2 class="text-white mb-0">Halo, {{ auth()->user()->nama }}! </h2>
                                    <p class="text-15 fw-light mt-4 text-white">Mari kembangkan dirimu lewat pengalaman nyata</p>
                                    <p class="text-lg fw-light mt-24 text-white">Atur tujuan kariermu dan belajar dari pengalaman langsung, Bersama Diskominfo</p>
                                </div>
                            </div>
                            <div class="col-sm-5 d-sm-block d-none">
                                <div class="text-center h-100 d-flex justify-content-center align-items-end ">
                                    @if (auth()->user()->foto)
                                        <img src="{{ asset('storage/' . auth()->user()->foto) }}" 
                                        alt="Foto Profil" 
                                        style="width: 365px; height: 267px; object-fit: cover; border-radius: 8px;">
                                    @else
                                        {{ strtoupper(substr(auth()->user()->nama, 0, 2)) }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Grettings Box End -->



                    <!-- Profile Completion Card -->
<div class="card mt-24 overflow-hidden">
    <div class="card-header">
        <div class="mb-0 flex-between flex-wrap gap-8">
            <h4 class="mb-0">Profile Completion</h4>
            <a href="{{ route('profile.edit') }}" class="text-13 fw-medium text-main-600 hover-text-decoration-underline">Lihat/Edit Profile</a>
        </div>
    </div>
    <div class="card-body">
        <!-- Overall Progress -->
        <div class="mb-24">
            <div class="flex-between mb-8">
                <span class="text-15 fw-medium text-gray-900">Overall Progress</span>
                <span class="text-15 fw-medium text-main-600" id="overall-percentage">33%</span>
            </div>
            <div class="progress bg-main-100 rounded-pill h-8" role="progressbar">
                <div class="progress-bar bg-main-600 rounded-pill" style="width: 33%" id="overall-progress"></div>
            </div>
        </div>
    </div>
    
    <!-- Profile Steps Table -->
    <div class="card-body p-0 overflow-x-auto scroll-sm scroll-sm-horizontal">
        <table class="table style-two mb-0">
            <thead>
                <tr>
                    <th>Profile Section</th>
                    <th>Progress</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Personal Information Row -->
                <tr>
                    <td>
                        <div class="flex-align gap-8">
                            <div class="w-40 h-40 rounded-circle bg-main-600 flex-center flex-shrink-0" id="personal-icon-bg">
                                <i class="ph ph-user text-white"></i>
                            </div>
                            <div class="">
                                <h6 class="mb-0">Personal Information</h6>
                                <div class="table-list">
                                    <span class="text-13 text-gray-600">University & Contact</span>
                                    <span class="text-13 text-gray-600">Required</span>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="flex-align gap-8 mt-12">
                            <div class="progress w-100px bg-main-100 rounded-pill h-4" role="progressbar">
                                <div class="progress-bar bg-main-600 rounded-pill" style="width: 0%" id="personal-progress"></div>
                            </div>
                            <span class="text-main-600 flex-shrink-0 text-13 fw-medium" id="personal-percentage">0%</span>
                        </div>
                    </td>
                    <td>
                        <div class="flex-align justify-content-center gap-16">
                            <span class="text-13 py-2 px-8 bg-danger-50 text-danger-600 d-inline-flex align-items-center gap-8 rounded-pill" id="personal-status-badge">
                                <span class="w-6 h-6 bg-danger-600 rounded-circle flex-shrink-0"></span>
                                Incomplete
                            </span>
                        </div>
                    </td>
                </tr>
                
                <!-- Skills & Expertise Row -->
                <tr>
                    <td>
                        <div class="flex-align gap-8">
                            <div class="w-40 h-40 rounded-circle bg-purple-600 flex-center" id="skills-icon-bg">
                                <i class="ph ph-gear text-white"></i>
                            </div>
                            <div class="">
                                <h6 class="mb-0">Skills & Expertise</h6>
                                <div class="table-list">
                                    <span class="text-13 text-gray-600">Technical Skills</span>
                                    <span class="text-13 text-gray-600">Required</span>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="flex-align gap-8 mt-12">
                            <div class="progress w-100px bg-main-100 rounded-pill h-4" role="progressbar">
                                <div class="progress-bar bg-main-600 rounded-pill" style="width: 0%" id="skills-progress"></div>
                            </div>
                            <span class="text-main-600 flex-shrink-0 text-13 fw-medium" id="skills-percentage">0%</span>
                        </div>
                    </td>
                    <td>
                        <div class="flex-align justify-content-center gap-16">
                            <span class="text-13 py-2 px-8 bg-gray-100 text-gray-600 d-inline-flex align-items-center gap-8 rounded-pill" id="skills-status-badge">
                                <span class="w-6 h-6 bg-gray-600 rounded-circle flex-shrink-0"></span>
                                Not Started
                            </span>
                        </div>
                    </td>
                </tr>
                
                <!-- Profile Complete Row -->
                <tr>
                    <td>
                        <div class="flex-align gap-8">
                            <div class="w-40 h-40 rounded-circle bg-warning-600 flex-center" id="complete-icon-bg">
                                <i class="ph ph-check-circle text-white"></i>
                            </div>
                            <div class="">
                                <h6 class="mb-0">Profile Complete</h6>
                                <div class="table-list">
                                    <span class="text-13 text-gray-600">Ready for Internship</span>
                                    <span class="text-13 text-gray-600">Final Step</span>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="flex-align gap-8 mt-12">
                            <div class="progress w-100px bg-main-100 rounded-pill h-4" role="progressbar">
                                <div class="progress-bar bg-main-600 rounded-pill" style="width: 0%" id="complete-progress"></div>
                            </div>
                            <span class="text-main-600 flex-shrink-0 text-13 fw-medium" id="complete-percentage">0%</span>
                        </div>
                    </td>
                    <td>
                        <div class="flex-align justify-content-center gap-16">
                            <span class="text-13 py-2 px-8 bg-gray-100 text-gray-600 d-inline-flex align-items-center gap-8 rounded-pill" id="complete-status-badge">
                                <span class="w-6 h-6 bg-gray-600 rounded-circle flex-shrink-0"></span>
                                Pending
                            </span>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!-- Action Button -->
    <div class="card-body pt-0">
        <button class="btn btn-main-600 btn-sm w-100" id="completion-action">
            Complete Personal Information
        </button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Ambil data dari controller Laravel
    const completionData = @json($completionStatus);
    
    function updateProfileCompletion(data) {
        // Icon backgrounds
        const personalIconBg = document.getElementById('personal-icon-bg');
        const skillsIconBg = document.getElementById('skills-icon-bg');
        const completeIconBg = document.getElementById('complete-icon-bg');
        
        // Progress bars
        const personalProgress = document.getElementById('personal-progress');
        const skillsProgress = document.getElementById('skills-progress');
        const completeProgress = document.getElementById('complete-progress');
        
        // Percentages
        const personalPercentage = document.getElementById('personal-percentage');
        const skillsPercentage = document.getElementById('skills-percentage');
        const completePercentage = document.getElementById('complete-percentage');
        
        // Status badges
        const personalStatusBadge = document.getElementById('personal-status-badge');
        const skillsStatusBadge = document.getElementById('skills-status-badge');
        const completeStatusBadge = document.getElementById('complete-status-badge');
        
        // Overall progress
        const overallProgress = document.getElementById('overall-progress');
        const overallPercentage = document.getElementById('overall-percentage');
        const actionButton = document.getElementById('completion-action');

        if (data.level === 'incomplete') {
            // Personal Info - Incomplete (30%)
            personalIconBg.className = 'w-40 h-40 rounded-circle bg-danger-600 flex-center flex-shrink-0';
            personalProgress.style.width = '30%';
            personalPercentage.textContent = '30%';
            personalStatusBadge.className = 'text-13 py-2 px-8 bg-danger-50 text-danger-600 d-inline-flex align-items-center gap-8 rounded-pill';
            personalStatusBadge.innerHTML = '<span class="w-6 h-6 bg-danger-600 rounded-circle flex-shrink-0"></span>Incomplete';
            
            // Skills - Not Started
            skillsIconBg.className = 'w-40 h-40 rounded-circle bg-gray-400 flex-center';
            skillsProgress.style.width = '0%';
            skillsPercentage.textContent = '0%';
            skillsStatusBadge.className = 'text-13 py-2 px-8 bg-gray-100 text-gray-600 d-inline-flex align-items-center gap-8 rounded-pill';
            skillsStatusBadge.innerHTML = '<span class="w-6 h-6 bg-gray-600 rounded-circle flex-shrink-0"></span>Not Started';
            
            // Complete - Pending
            completeIconBg.className = 'w-40 h-40 rounded-circle bg-gray-400 flex-center';
            completeProgress.style.width = '0%';
            completePercentage.textContent = '0%';
            completeStatusBadge.className = 'text-13 py-2 px-8 bg-gray-100 text-gray-600 d-inline-flex align-items-center gap-8 rounded-pill';
            completeStatusBadge.innerHTML = '<span class="w-6 h-6 bg-gray-600 rounded-circle flex-shrink-0"></span>Pending';
            
        } else if (data.level === 'profile-complete') {
            // Personal Info - Complete
            personalIconBg.className = 'w-40 h-40 rounded-circle bg-success-600 flex-center flex-shrink-0';
            personalProgress.style.width = '100%';
            personalPercentage.textContent = '100%';
            personalStatusBadge.className = 'text-13 py-2 px-8 bg-success-50 text-success-600 d-inline-flex align-items-center gap-8 rounded-pill';
            personalStatusBadge.innerHTML = '<span class="w-6 h-6 bg-success-600 rounded-circle flex-shrink-0"></span>Complete';
            
            // Skills - In Progress
            skillsIconBg.className = 'w-40 h-40 rounded-circle bg-warning-600 flex-center';
            skillsProgress.style.width = '30%';
            skillsPercentage.textContent = '30%';
            skillsStatusBadge.className = 'text-13 py-2 px-8 bg-warning-50 text-warning-600 d-inline-flex align-items-center gap-8 rounded-pill';
            skillsStatusBadge.innerHTML = '<span class="w-6 h-6 bg-warning-600 rounded-circle flex-shrink-0"></span>In Progress';
            
            // Complete - Pending
            completeIconBg.className = 'w-40 h-40 rounded-circle bg-gray-400 flex-center';
            completeProgress.style.width = '0%';
            completePercentage.textContent = '0%';
            completeStatusBadge.className = 'text-13 py-2 px-8 bg-gray-100 text-gray-600 d-inline-flex align-items-center gap-8 rounded-pill';
            completeStatusBadge.innerHTML = '<span class="w-6 h-6 bg-gray-600 rounded-circle flex-shrink-0"></span>Pending';
            
        } else if (data.level === 'skills-complete') {
            // Personal Info - Complete
            personalIconBg.className = 'w-40 h-40 rounded-circle bg-success-600 flex-center flex-shrink-0';
            personalProgress.style.width = '100%';
            personalPercentage.textContent = '100%';
            personalStatusBadge.className = 'text-13 py-2 px-8 bg-success-50 text-success-600 d-inline-flex align-items-center gap-8 rounded-pill';
            personalStatusBadge.innerHTML = '<span class="w-6 h-6 bg-success-600 rounded-circle flex-shrink-0"></span>Complete';
            
            // Skills - Complete
            skillsIconBg.className = 'w-40 h-40 rounded-circle bg-success-600 flex-center';
            skillsProgress.style.width = '100%';
            skillsPercentage.textContent = '100%';
            skillsStatusBadge.className = 'text-13 py-2 px-8 bg-success-50 text-success-600 d-inline-flex align-items-center gap-8 rounded-pill';
            skillsStatusBadge.innerHTML = '<span class="w-6 h-6 bg-success-600 rounded-circle flex-shrink-0"></span>Complete';
            
            // Complete - Complete
            completeIconBg.className = 'w-40 h-40 rounded-circle bg-success-600 flex-center';
            completeProgress.style.width = '100%';
            completePercentage.textContent = '100%';
            completeStatusBadge.className = 'text-13 py-2 px-8 bg-success-50 text-success-600 d-inline-flex align-items-center gap-8 rounded-pill';
            completeStatusBadge.innerHTML = '<span class="w-6 h-6 bg-success-600 rounded-circle flex-shrink-0"></span>Complete';
            
            actionButton.classList.remove('btn-main-600');
            actionButton.classList.add('btn-success-600');
        }

        // Update overall progress - menggunakan data dari controller
        overallProgress.style.width = data.percentage + '%';
        overallPercentage.textContent = data.percentage + '%';
        actionButton.textContent = data.next_step;
    }

    updateProfileCompletion(completionData);

    document.getElementById('completion-action').addEventListener('click', function() {
        const action = completionData.next_action;
        if (action === 'profile-edit') {
            window.location.href = '{{ route("profile.edit") }}';
        } else if (action === 'skills-edit') {
            window.location.href = '{{ route("profile.edit") }}';
        } else {
            window.location.href = '{{ route("profile.edit") }}';
        }
    });
});
</script>
                    @php
                // Cek apakah user adalah anggota dari pengajuan yang sudah diterima
                $keanggotaanAktif = null;
                if (!isset($pengajuanAktif) && !isset($undanganPengajuan)) {
                    $keanggotaanAktif = \App\Models\Anggota::where('user_id', auth()->user()->id)
                        ->where('status', 'accepted')
                        ->with(['pengajuan.databidang', 'pengajuan.user', 'pengajuan.anggota.user'])
                        ->first();
                } elseif (!$pengajuanAktif && !$undanganPengajuan) {
                    $keanggotaanAktif = \App\Models\Anggota::where('user_id', auth()->user()->id)
                        ->where('status', 'accepted')
                        ->with(['pengajuan.databidang', 'pengajuan.user', 'pengajuan.anggota.user'])
                        ->first();
                }
                
                $displayPengajuan = $pengajuanAktif ?? ($keanggotaanAktif ? $keanggotaanAktif->pengajuan : null);
                $isAnggota = !$pengajuanAktif && $keanggotaanAktif;
                
                $statusLabels = [
                    'pending' => 'Menunggu review admin',
                    'diproses' => 'Sedang direview oleh admin 1 dokumen sedang disiapkan',
                    'diteruskan' => 'Dokumen lolos tahap pertama dan sedang diteruskan ke Admin Bidang',
                    'disetujui_bidang' => 'Menunggu persetujuan admin 2',
                    'disetujui' => 'Pengajuan disetujui, siap memulai magang',
                    'sedang_magang' => 'Sedang menjalani magang',
                    'selesai' => 'Magang selesai',
                    'ditolak' => 'Pengajuan ditolak'
                ];
            @endphp

                </div>
                <div class="col-lg-3">

                    <!-- Calendar Start -->
                    <div class="card">
                        <div class="card-body">
                            <div class="calendar">
                                <div class="calendar__header">
                                    <button type="button" class="calendar__arrow left"><i
                                            class="ph ph-caret-left"></i></button>
                                    <p class="display h6 mb-0">""</p>
                                    <button type="button" class="calendar__arrow right"><i
                                            class="ph ph-caret-right"></i></button>
                                </div>

                                <div class="calendar__week week">
                                    <div class="calendar__week-text">Su</div>
                                    <div class="calendar__week-text">Mo</div>
                                    <div class="calendar__week-text">Tu</div>
                                    <div class="calendar__week-text">We</div>
                                    <div class="calendar__week-text">Th</div>
                                    <div class="calendar__week-text">Fr</div>
                                    <div class="calendar__week-text">Sa</div>
                                </div>
                                <div class="days"></div>
                            </div>

                            <!-- Events start -->
                            <div class="">
                                <div class="mt-24 mb-24">
                                    <div class="flex-align mb-8 gap-16">
                                        <span class="text-sm text-gray-300 flex-shrink-0">Today</span>
                                        <span class="border border-gray-50 border-dashed flex-grow-1"></span>
                                    </div>
                                    <div class="event-item bg-gray-50 rounded-8 p-16">
                                        <div class=" flex-between gap-4">
                                            <div class="flex-align gap-8">
                                                <div class="">
                                                    @if($displayPengajuan->komentar_admin)
                                                    
                                                    <h6 class="mb-2">Komentar Admin:</h6>
                                                    <span class="">{{ $displayPengajuan->komentar_admin }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="dropdown flex-shrink-0">
                                                <button class="text-gray-400 text-xl d-flex rounded-4" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ph-fill ph-dots-three-outline"></i>
                                                </button>
                                                <div
                                                    class="dropdown-menu dropdown-menu--md border-0 bg-transparent p-0">
                                                    <div
                                                        class="card border border-gray-100 rounded-12 box-shadow-custom">
                                                        <div class="card-body p-12">
                                                            <div class="max-h-200 overflow-y-auto scroll-sm pe-8">
                                                                <ul>
                                                                    <li class="mb-0">
                                                                        <button type="button"
                                                                            class="delete-btn py-6 text-15 px-8 hover-bg-gray-50 text-gray-300 w-100 rounded-8 fw-normal text-xs d-block text-start hover-text-gray-600">
                                                                            <span
                                                                                class="text d-flex align-items-center gap-8">
                                                                                <i class="ph ph-trash"></i>
                                                                                Remove</span>
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                @if(isset($undanganPengajuan) && $undanganPengajuan)
                                <div class="mt-24">
                                    <div class="flex-align mb-8 gap-16">
                                        
                                        <span class="text-sm text-gray-300 flex-shrink-0">Tindakan yang Diperlukan</span>
                                        <span class="border border-gray-50 border-dashed flex-grow-1"></span>
                                    </div>
                                    <div class="event-item bg-gray-50 rounded-8 p-16">
                                        <div class=" flex-between gap-4">
                                            <div class="flex-align gap-8">
                                                <span
                                                    class="icon d-flex w-44 h-44 bg-white rounded-8 flex-center text-2xl"><i
                                                        class="ph ph-magic-wand"></i></span>
                                                <div class="">
                                                    <h6 class="mb-2">Anda memiliki undangan untuk bergabung dalam kelompok magang. Silakan terima atau tolak undangan tersebut.</h6>
                                                    <span class="">
                                                        <form method="POST" action="{{ route('invitation.accept', $undanganPengajuan->id) }}" style="display: inline-block;" onsubmit="handleFormSubmit(this)">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success">Terima Undangan</button>
                                                        </form>
                                                        <form method="POST" action="{{ route('invitation.reject', $undanganPengajuan->id) }}" style="display: inline-block;" onsubmit="handleFormSubmit(this)">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">Tolak Undangan</button>
                                                        </form>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="dropdown flex-shrink-0">
                                                <button class="text-gray-400 text-xl d-flex rounded-4" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ph-fill ph-dots-three-outline"></i>
                                                </button>
                                                <div
                                                    class="dropdown-menu dropdown-menu--md border-0 bg-transparent p-0">
                                                    <div
                                                        class="card border border-gray-100 rounded-12 box-shadow-custom">
                                                        <div class="card-body p-12">
                                                            <div class="max-h-200 overflow-y-auto scroll-sm pe-8">
                                                                <ul>
                                                                    <li class="mb-0">
                                                                        <button type="button"
                                                                            class="delete-btn py-6 text-15 px-8 hover-bg-gray-50 text-gray-300 w-100 rounded-8 fw-normal text-xs d-block text-start hover-text-gray-600">
                                                                            <span
                                                                                class="text d-flex align-items-center gap-8">
                                                                                <i class="ph ph-trash"></i>
                                                                                Remove</span>
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @elseif((!isset($pengajuanAktif) || !$pengajuanAktif) && (!isset($keanggotaanAktif) || !$keanggotaanAktif))
                                    <div class="event-item bg-gray-50 rounded-8 p-16 mt-16">
                                        <div class=" flex-between gap-4">
                                            <div class="flex-align gap-8">
                                                <span
                                                    class="icon d-flex w-44 h-44 bg-white rounded-8 flex-center text-2xl"><i
                                                        class="ph ph-briefcase"></i></span>
                                                <div class="">
                                                    <h6 class="mb-2">{{ (isset($completionLevel) && $completionLevel === 'skills-complete') ? 'Siap untuk Mengajukan Magang' : 'Lengkapi Profil Terlebih Dahulu' }}</h6>
                                                    {{-- <span class="">09:00 - 10:00 AM</span> --}}
                                                    @if(isset($completionLevel) && $completionLevel === 'skills-complete')
                                                        <p class="mb-3">Profil Anda sudah lengkap. Klik tombol di bawah untuk memulai pengajuan magang.</p>
                                                        <a href="{{ route('pengajuan.tipe') }}" class="btn btn-primary">Ajukan Magang Sekarang</a>
                                                    @else
                                                        <p class="mb-3">
                                                            @if(isset($completionLevel) && $completionLevel === 'incomplete')
                                                                Lengkapi data universitas dan profil Anda terlebih dahulu.
                                                            @else
                                                                Tambahkan keahlian Anda untuk melengkapi profil.
                                                            @endif
                                                        </p>
                                                        @if(isset($completionLevel) && $completionLevel === 'incomplete')
                                                            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Lengkapi Profil</a>
                                                        @else
                                                            <a href="{{ route('skills.edit') }}" class="btn btn-primary">Tambah Keahlian</a>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="dropdown flex-shrink-0">
                                                <button class="text-gray-400 text-xl d-flex rounded-4" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ph-fill ph-dots-three-outline"></i>
                                                </button>
                                                <div
                                                    class="dropdown-menu dropdown-menu--md border-0 bg-transparent p-0">
                                                    <div
                                                        class="card border border-gray-100 rounded-12 box-shadow-custom">
                                                        <div class="card-body p-12">
                                                            <div class="max-h-200 overflow-y-auto scroll-sm pe-8">
                                                                <ul>
                                                                    <li class="mb-0">
                                                                        <button type="button"
                                                                            class="delete-btn py-6 text-15 px-8 hover-bg-gray-50 text-gray-300 w-100 rounded-8 fw-normal text-xs d-block text-start hover-text-gray-600">
                                                                            <span
                                                                                class="text d-flex align-items-center gap-8">
                                                                                <i class="ph ph-trash"></i>
                                                                                Remove</span>
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <a href="{{ route('pengajuan.index') }}" class="btn btn-main w-100 mt-24">Cek Status Pengajuan</a>
                            </div>
                            <!-- Events End -->
                        </div>
                    </div>
                    <!-- Calendar End -->





                </div>
            </div>
        </div>

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