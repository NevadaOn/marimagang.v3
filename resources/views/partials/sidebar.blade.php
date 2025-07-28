<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" style="text-align: center" href="{{ url('/') }}"> {{-- Menggunakan helper url() untuk link root --}}
            <img src="{{ asset('img/logo-kominfo.png') }}" alt="kominfo" width="80px">
            <br>
            <span class="align-middle">Portal Admin - Diskominfo Kab.Malang</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            {{-- Perhatikan penambahan class 'active' menggunakan Request::routeIs() --}}
            <li class="sidebar-item {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            @php
              $isActive = Request::routeIs('admin.pengajuan.index') || Request::routeIs('admin.pengajuan.bidang');
            @endphp

            <li class="sidebar-item {{ $isActive ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ auth()->user()->role === 'superadmin' ? route('admin.pengajuan.index') : route('admin.pengajuan.bidang') }}">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Daftar Pengajuan</span>
                </a>
            </li>


            <li class="sidebar-item {{ Request::routeIs('admin.users.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.users.index') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Kelola User</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::routeIs('admin.admin.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.admin.index') }}">
                    <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Kelola Admin</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::routeIs('admin.bidang.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.bidang.index') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Kelola Bidang</span>
                </a>
            </li>

            <li class="sidebar-header">
                Dokumentasi & Notifikasi
            </li>

            <li class="sidebar-item {{ Request::routeIs('admin.documentation.index') ? 'active' : '' }}"> {{-- Asumsi ada rute untuk daftar universitas --}}
                <a class="sidebar-link" href="{{ route('admin.documentation.index') }}"> {{-- Sesuaikan rute jika daftar universitas beda dari pengajuan --}}
                    <i class="align-middle" data-feather="square"></i> <span class="align-middle">Dokumentasi</span>
                </a>
            </li>

            {{-- <li class="sidebar-item">
                <a class="sidebar-link" href="">
                    <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Status Mahasiswa</span>
                </a>
            </li> --}}

            {{-- <li class="sidebar-item {{ Request::routeIs('admin.reports.pengajuan') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.reports.pengajuan') }}">
                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Status History</span>
                </a>
            </li> --}}

            <li class="sidebar-item {{ Request::routeIs('admin.notifications') ? 'active' : '' }}"> {{-- Misal ada rute admin.notifications --}}
                <a class="sidebar-link" href="ui-typography.html"> {{-- Ganti dengan route('admin.notifications') jika ada --}}
                    <i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Notifikasi</span>
                </a>
            </li>

            {{-- <li class="sidebar-item">
                <a class="sidebar-link" href="icons-feather.html">
                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Icons</span>
                </a>
            </li> --}}

            <li class="sidebar-header">
                Laporan
            </li>

            <li class="sidebar-item {{ Request::routeIs('admin.reports.pengajuan') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.reports.pengajuan') }}">
                    <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Laporan Pengajuan</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::routeIs('admin.reports.users') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.reports.users') }}">
                    <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Laporan Pengguna</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.reports.statistik') }}">
                    <i class="align-middle" data-feather="map"></i> <span class="align-middle">Data Statistik</span>
                </a>
            </li>
        </ul>

        {{-- <div class="sidebar-cta">
            <div class="sidebar-cta-content">
                <strong class="d-inline-block mb-2">Upgrade to Pro</strong>
                <div class="mb-3 text-sm">
                    Are you looking for more components? Check out our premium version.
                </div>
                <div class="d-grid">
                    <a href="upgrade-to-pro.html" class="btn btn-primary">Upgrade to Pro</a>
                </div>
            </div>
        </div> --}}
    </div>
</nav>