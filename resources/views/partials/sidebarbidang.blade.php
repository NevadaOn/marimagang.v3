<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        {{-- Partikel efek opsional --}}
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>

        <a class="sidebar-brand text-center" href="{{ url('/') }}">
            <div class="logo-container mx-auto">
                <img src="{{ asset('img/logo-kominfo.png') }}"
                     class="logo-image"
                     alt="kominfo">
            </div>
            <div class="brand-text mt-4">
                <div class="brand-subtitle">Portal Admin Bidang</div>
                <div class="brand-title">DISKOMINFO Kab.Malang</div>
            </div>
        </a>

        <ul class="sidebar-nav px-3">
            <li class="sidebar-header">
                <i class="fas fa-grip-horizontal me-2"></i> Pages
            </li>

            <li class="sidebar-item {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::routeIs('admin.pengajuan.bidang') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.pengajuan.bidang') }}">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Daftar Pengajuan</span>
                </a>
            </li>

            {{-- <li class="sidebar-item disabled">
                <a class="sidebar-link" href="#" style="pointer-events: none; opacity: 0.5;">
                    <i class="fas fa-chart-bar"></i>
                    <span>Laporan</span>
                </a>
            </li>

            <li class="sidebar-item disabled">
                <a class="sidebar-link" href="#" style="pointer-events: none; opacity: 0.5;">
                    <i class="fas fa-cog"></i>
                    <span>Pengaturan</span> --}}
                </a>
            </li>
        </ul>
    </div>
</nav>
