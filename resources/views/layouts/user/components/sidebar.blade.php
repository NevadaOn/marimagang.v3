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
                        class="sidebar-menu__link {{ request()->routeIs('dashboard') ? 'activePage' : '' }}"
                        role="menuitem">
                        <span class="icon" aria-hidden="true"><i class="ph ph-squares-four"></i></span>
                        <span class="text">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-menu__item" role="none">
                    <a href="{{ route('pengajuan.index') }}"
                        class="sidebar-menu__link {{ request()->routeIs('pengajuan.*') ? 'activePage' : '' }}"
                        role="menuitem">
                        <span class="icon" aria-hidden="true"><i class="ph ph-graduation-cap"></i></span>
                        <span class="text">Pengajuan</span>
                        @if(isset($pendingCount) && $pendingCount > 0)
                            <span class="link-badge"
                                aria-label="{{ $pendingCount }} pengajuan pending">{{ $pendingCount }}</span>
                        @endif
                    </a>
                </li>

                <li class="sidebar-menu__item" role="none">
                    <a href="#"
                        class="sidebar-menu__link {{ request()->routeIs('anggota.*') ? 'active' : '' }}"
                        role="menuitem">
                        <span class="icon" aria-hidden="true"><i class="ph ph-users-three"></i></span>
                        <span class="text">Anggota</span>
                    </a>
                </li>

                

                <li class="sidebar-menu__item" role="none">
                    <span
                        class="text-gray-300 text-sm px-20 pt-20 fw-semibold border-top border-gray-100 d-block text-uppercase">Settings</span>
                </li>

                <li class="sidebar-menu__item" role="none">
                    <a href="{{ route('profile.edit') }}" class="sidebar-menu__link {{ request()->routeIs('profile.edit') ? 'activePage' : '' }}">
                        <span class="icon"><i class="ph ph-user"></i></span>
                        <span class="text">Akun</span>
                    </a>
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