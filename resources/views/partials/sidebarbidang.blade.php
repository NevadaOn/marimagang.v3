<nav id="sidebar" class="sidebar js-sidebar  " >
    <div class="sidebar-content js-simplebar  bg-nav " >
        <a class="sidebar-brand " style="text-align: center; "  href="{{ url('/') }}"> {{-- Menggunakan helper url() untuk link root --}}
            <img src="{{ asset('img/logo-kominfo.png') }}" class="rounded-circle p-2 mb-4 mt-4 " style="background-color: rgb(0, 0, 0); box-shadow: 0 0 20px 4px rgba(102, 212, 255, 0.379);" alt="kominfo" width="160px">
            <br>
            <span class="align-start text-muted">Portal Admin Bidang</span>
            <br>
            <span class="align-start text-muted fs-5">DISKOMINFO Kab.Malang</span>
        </a>

        <ul class="sidebar-nav  bg-nav" >
            <li class="sidebar-header  bg-nav">
                Pages
            </li>

            {{-- Perhatikan penambahan class 'active' menggunakan Request::routeIs() --}}
            <li class="sidebar-item  {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::routeIs('admin.pengajuan.bidang') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.pengajuan.bidang') }}">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Daftar Pengajuan</span>
                </a>
            </li>


            {{-- <li class="sidebar-item">
                <a class="sidebar-link" href="maps-google.html">
                    <i class="align-middle" data-feather="map"></i> <span class="align-middle">Maps</span>
                </a>
            </li> --}}
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