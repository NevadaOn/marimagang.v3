<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Bidang</title>
    <link rel="shortcut icon" href="{{ asset('bidang/compiled/svg/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('bidang/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('bidang/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('bidang/compiled/css/iconly.css') }}">
</head>

<body>
    <script src="{{ asset('bidang/static/js/initTheme.js') }}"></script>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="index.html"><img src="{{ asset('img/rb_30832.png') }}"
                                    alt="Logo Diskominfo Kabupaten Malang" loading="lazy" srcset=""></a>
                        </div>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                        opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark"
                                    style="cursor: pointer">
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20"
                                preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
                            <a href="{{ route('admin.dashboard') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="{{ route('admin.pengajuan.bidang') }}" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Pengajuan</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="{{ route('admin.documentation.indexdinas') }}" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Dokumentasi</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="{{ route('admin.logbook.indexdinas') }}" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Catatan</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <!-- Judul -->
                    <div class="page-heading mb-0">
                        <h3 class="mb-0">Admin Bidang</h3>
                    </div>

                    <!-- User Profile and Logout Section -->
                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle d-flex align-items-center text-decoration-none"
                            type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="avatar avatar-sm me-2">
                                <div class="avatar-content bg-primary text-white d-flex align-items-center justify-content-center rounded-circle "
                                    style="width: 35px; height: 35px; font-weight: bold; font-size: 14px;">
                                    {{ strtoupper(substr(auth()->user()->nama ?? 'A', 0, 1)) }}{{ strtoupper(substr(explode(' ', auth()->user()->nama ?? 'Admin')[1] ?? '', 0, 1)) }}
                                </div>
                            </div>
                            <div class="text-start d-none d-md-block">
                                <div class="fw-semibold card-header">{{ auth()->user()->nama ?? 'Admin Bidang' }}</div>
                                <div class="small text-muted">{{ auth()->user()->email ?? 'admin@diskominfo.com' }}
                                </div>
                            </div>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
                            <li>
                                <h6 class="dropdown-header">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm me-2">
                                            <div class="avatar-content bg-primary text-white d-flex align-items-center justify-content-center rounded-circle"
                                                style="width: 30px; height: 30px; font-weight: bold; font-size: 12px;">
                                                {{ strtoupper(substr(auth()->user()->nama ?? 'A', 0, 1)) }}{{ strtoupper(substr(explode(' ', auth()->user()->nama ?? 'Admin')[1] ?? '', 0, 1)) }}
                                            </div>
                                        </div>
                                        <div>
                                            <div class="fw-semibold">{{ auth()->user()->nama ?? 'Admin Bidang' }}</div>
                                            <div class="small text-muted">{{ auth()->user()->email ??
                                                'admin@diskominfo.com' }}</div>
                                        </div>
                                    </div>
                                </h6>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <i class="bi bi-person me-2"></i>
                                    Profile Saya
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <i class="bi bi-gear me-2"></i>
                                    Pengaturan
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item d-flex align-items-center text-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin keluar?')">
                                        <i class="bi bi-box-arrow-right me-2"></i>
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>


            </header>
            <div class="page-content">
                <section class="row">
                    <!-- 6 Cards Statistics - Full Row -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6 col-md-4 col-lg-2">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon purple mb-2" style="background-color: #C997CF;">


                                                    <h6 class="font-extrabold mb-0">{{ $totalPengajuan }}</h6>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Total Pengajuan</h6>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-2">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon blue mb-2" style="background-color: #70BDB8;">
                                                    <h6 class="font-extrabold mb-0">{{ $pengajuanPending }}</h6>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Pengajuan Diproses</h6>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-2">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon green mb-2" style="background-color: #9C97CF;">
                                                    <h6 class="font-extrabold mb-0">{{ $pengajuanDiterima }}</h6>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Pengajuan Diterima</h6>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-2">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon red mb-2">
                                                    <h6 class="font-extrabold mb-0">{{ $pengajuanDitolak }}</h6>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Pengajuan Ditolak</h6>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-2">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon red mb-2" style="background-color: #CF97C4;">
                                                    <h6 class="font-extrabold mb-0 ">
                                                        {{ $statusDokumen->ada_surat_pengantar ?? 0 }}
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Surat Pengantar</h6>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-2">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon red mb-2" style="background-color: #B7BD70;">
                                                    <h6 class="font-extrabold mb-0">
                                                        {{ $statusDokumen->ada_proposal ?? 0 }}
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Proposal Magang</h6>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Content Section - Left Side (9 columns) -->
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Statistik Bidang</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-bidang-stats"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                const bidangData = [
                                    @foreach ($bidangStats as $b)
                                        {
                                        name: '{{ $b->nama }}',
                                        total: {{ $b->total_pengajuan }}
                                        },
                                    @endforeach];

                                const options = {
                                    series: [{
                                        name: 'Total Pengajuan',
                                        data: bidangData.map(item => item.total)
                                    }],
                                    chart: {
                                        type: 'bar',
                                        height: 350
                                    },
                                    xaxis: {
                                        categories: bidangData.map(item => item.name)
                                    },
                                    colors: ['#008FFB'],
                                    responsive: [{
                                        breakpoint: 480,
                                        options: {
                                            chart: {
                                                width: 200
                                            },
                                            legend: {
                                                position: 'bottom'
                                            }
                                        }
                                    }]
                                };

                                const chart = new ApexCharts(document.querySelector("#chart-bidang-stats"), options);
                                chart.render();
                            });
                        </script>

                        <div class="row">

                            <div class="col-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Daftar User Pengajuan</h4>
                                        <p class="text-muted mb-0">Kelola semua pengajuan pengguna</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Email</th>
                                                        <th>Universitas</th>
                                                        <th>Status</th>
                                                        <th>Tanggal</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($userPengajuan as $user)
                                                        <tr>
                                                            <td class="col-3">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar avatar-md">
                                                                        <div class="avatar-content bg-primary text-white d-flex align-items-center justify-content-center rounded-circle"
                                                                            style="width: 40px; height: 40px; font-weight: bold;">
                                                                            {{ strtoupper(substr($user->nama, 0, 1)) }}
                                                                        </div>
                                                                    </div>
                                                                    <p class="font-bold ms-3 mb-0">{{ $user->nama }}</p>
                                                                </div>
                                                            </td>
                                                            <td class="col-auto">
                                                                <p class="mb-0">{{ $user->email }}</p>
                                                            </td>
                                                            <td class="col-auto">
                                                                <p class="mb-0">{{ $user->nama_universitas }}</p>
                                                            </td>
                                                            <td class="col-auto">
                                                                @if($user->status == 'diproses')
                                                                    <span class="badge bg-warning">
                                                                        <i
                                                                            class="fas fa-clock me-1"></i>{{ ucfirst($user->status) }}
                                                                    </span>
                                                                @elseif($user->status == 'diterima')
                                                                    <span class="badge bg-success">
                                                                        <i
                                                                            class="fas fa-check me-1"></i>{{ ucfirst($user->status) }}
                                                                    </span>
                                                                @else
                                                                    <span class="badge bg-danger">
                                                                        <i
                                                                            class="fas fa-times me-1"></i>{{ ucfirst($user->status) }}
                                                                    </span>
                                                                @endif
                                                            </td>
                                                            <td class="col-auto">
                                                                <p class="mb-0">
                                                                    {{ \Carbon\Carbon::parse($user->tanggal_pengajuan)->format('d/m/Y') }}
                                                                </p>
                                                            </td>
                                                            <td class="col-auto">
                                                                <a href="{{ route('admin.pengajuan.showbidang', $user->id) }}"
                                                                    class="btn btn-sm btn-primary">
                                                                    <i class="fas fa-eye me-1"></i>Detail
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6" class="text-center py-5">
                                                                <div class="d-flex flex-column align-items-center">
                                                                    <div class="mb-3">
                                                                        <i class="fas fa-inbox text-muted"
                                                                            style="font-size: 3rem;"></i>
                                                                    </div>
                                                                    <h5 class="text-muted mb-2">Belum ada pengajuan</h5>
                                                                    <p class="text-muted mb-0">Data pengajuan akan muncul di
                                                                        sini ketika ada user yang mengajukan</p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Content - Right Side (3 columns) -->
                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body py-4 px-4">
                                <div class="d-flex align-items-center">
                                    <div class="ms-3 name">
                                        <h5 class="font-bold">Aktivitas Terbaru</h5>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    @forelse($userPengajuan->take(5) as $activity)
                                        <div class="d-flex align-items-start mb-3 p-3 border rounded">
                                            <!-- Profile Photo -->
                                            <div class="me-3">
                                                <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold"
                                                    style="width: 40px; height: 40px; background-color: #6c757d; font-size: 16px;">
                                                    {{ strtoupper(substr($activity->nama, 0, 1)) }}{{ strtoupper(substr(explode(' ', $activity->nama)[1] ?? '', 0, 1)) }}
                                                </div>

                                            </div>

                                            <div class="flex-grow-1">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div>
                                                        <h6 class="mb-1 font-weight-semibold">{{ $activity->nama }}</h6>
                                                        <p class="text-muted small mb-1">
                                                            @if($activity->status == 'pending')
                                                                Mengajukan permohonan baru
                                                            @elseif($activity->status == 'diterima')
                                                                Pengajuan telah diterima
                                                            @else
                                                                Pengajuan ditolak
                                                            @endif
                                                        </p>
                                                        <p class="text-muted" style="font-size: 0.75rem;">
                                                            {{ $activity->nama_universitas }}
                                                        </p>
                                                    </div>
                                                    <div class="text-end">
                                                        <div class="text-muted small">
                                                            {{ \Carbon\Carbon::parse($activity->tanggal_pengajuan)->diffForHumans() }}
                                                        </div>
                                                        @if($activity->status == 'diproses')
                                                            <span class="badge bg-warning text-dark mt-1">
                                                                Diproses
                                                            </span>
                                                        @elseif($activity->status == 'diterima')
                                                            <span class="badge bg-success mt-1">
                                                                Diterima
                                                            </span>
                                                        @else
                                                            <span class="badge bg-danger mt-1">
                                                                Ditolak
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="text-center py-5">
                                            <div class="mb-3">
                                                <i class="fas fa-clock text-muted"
                                                    style="font-size: 3rem; opacity: 0.3;"></i>
                                            </div>
                                            <h6 class="text-muted mb-2">Belum ada aktivitas</h6>
                                            <p class="text-muted small">Aktivitas terbaru akan muncul di sini</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4>Status Lamaran</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-visitors-profile"></div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; Diskominfo Kab. Malang</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with
                            by <a href="https://kominfo.malangkab.go.id/">Diskominfo</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('bidang/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('bidang/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>


    <script src="{{ asset('bidang/compiled/js/app.js') }}"></script>



    <!-- Need: Apexcharts -->
    <script src="{{ asset('bidang/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('bidang/static/js/pages/dashboard.js') }}"></script>

</body>

</html>