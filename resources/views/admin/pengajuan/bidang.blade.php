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
                {{-- Sidebar Header --}}
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="index.html">
                                <img src="{{ asset('img/rb_30832.png') }}" alt="Logo Diskominfo Kabupaten Malang"
                                    loading="lazy">
                            </a>
                        </div>

                        {{-- Theme Toggle --}}
                        <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
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
                                <input class="form-check-input me-0" type="checkbox" id="toggle-dark"
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

                        <div class="sidebar-toggler x">
                            <a href="#" class="sidebar-hide d-xl-none d-block">
                                <i class="bi bi-x bi-middle"></i>
                            </a>
                        </div>
                    </div>
                </div>

               
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                       
                        <li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                       
                        <li class="sidebar-item {{ request()->routeIs('admin.pengajuan*') ? 'active' : '' }}">
                            <a href="{{ route('admin.pengajuan.bidang') }}" class="sidebar-link">
                                <i class="bi bi-stack"></i>
                                <span>Pengajuan</span>
                            </a>
                        </li>

                        
                        @if(auth('admin')->check() && in_array(auth('admin')->user()->role, ['admin_dinas', 'superadmin']))

                            
                        <li class="sidebar-item">
                            <a href="{{ route('admin.documentation.indexdinas') }}" class='sidebar-link'>
                                <i class="bi bi-camera"></i>
                                <span>Dokumentasi</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('admin.logbook.indexdinas') }}" class='sidebar-link'>
                                <i class="bi bi-book"></i>
                                <span>Catatan</span>
                            </a>
                        </li>

                        @endif
                        
                    </ul>
                </div>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="page-heading mb-0">
                        <h3 class="mb-0">
                            @if(auth()->user()->role == 'admin_bidang')
                                Admin Bidang
                            @elseif(auth()->user()->role == 'admin_dinas')
                                Admin Dinas
                            @elseif(auth()->user()->role == 'super_admin')
                                Super Admin
                            @elseif(auth()->user()->role == 'user')
                                Dashboard User
                            @else
                                Dashboard
                            @endif
                        </h3>
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
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <section class="row">
                    <!-- Statistics Cards -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon purple mb-2" style="background-color: #C997CF;">


                                                    <h6 class="font-extrabold mb-0">{{ $pengajuan->total() ?? 0 }}</h6>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Total Pengajuan</h6>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon blue mb-2" style="background-color: #70BDB8;">
                                                    <h6 class="font-extrabold mb-0">{{ $pengajuan->where('status', 'pending')->count() ?? 0 }}</h6>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Status Menunggu</h6>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon green mb-2" style="background-color: #9C97CF;">
                                                    <h6 class="font-extrabold mb-0">{{ $pengajuan->where('status', 'disetujui')->count() ?? 0 }}</h6>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Status Disetujui</h6>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon red mb-2">
                                                    <h6 class="font-extrabold mb-0">{{ $pengajuan->where('status', 'ditolak')->count() ?? 0 }}</h6>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Status Ditolak</h6>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- Main Table -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div>
                                    <h4>Daftar Pengajuan</h4>
                                    <p class="text-muted mb-0">Kelola semua pengajuan pengguna</p>
                                </div>
                                <div class="d-flex gap-2">
                                    <!-- Filter or Search can be added here -->
                                    <div class="input-group" style="width: 250px;">
                                        <input type="text" class="form-control" placeholder="Cari pengajuan..." id="searchInput">
                                        <span class="input-group-text">
                                            <i class="bi bi-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-lg">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>NIM</th>
                                                <th>Bidang</th>
                                                <th>Mulai</th>
                                                <th>Selesai</th>
                                                <th>Diajukan</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($pengajuan as $index => $item)
                                                <tr>
                                                    <td>{{ $pengajuan->firstItem() + $index }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar avatar-md">
                                                                <div class="avatar-content bg-primary text-white d-flex align-items-center justify-content-center rounded-circle"
                                                                    style="width: 40px; height: 40px; font-weight: bold;">
                                                                    {{ strtoupper(substr($item->user->nama, 0, 1)) }}
                                                                </div>
                                                            </div>
                                                            <div class="ms-3">
                                                                <p class="font-bold mb-0">{{ $item->user->nama }}</p>
                                                                <p class="text-muted small mb-0">{{ $item->user->email }}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">{{ $item->user->nim }}</p>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-light-info">{{ $item->databidang->nama ?? '-' }}</span>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">{{ optional($item->tanggal_mulai)->format('d M Y') ?? '-' }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">{{ optional($item->tanggal_selesai)->format('d M Y') ?? '-' }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">{{ $item->created_at->format('d M Y') }}</p>
                                                        <small class="text-muted">{{ $item->created_at->format('H:i') }}</small>
                                                    </td>
                                                    <td>
                                                        @if ($item->status == 'disetujui')
                                                            <span class="badge bg-success">
                                                                <i class="fas fa-check me-1"></i>Disetujui
                                                            </span>
                                                        @elseif($item->status == 'ditolak')
                                                            <span class="badge bg-danger">
                                                                <i class="fas fa-times me-1"></i>Ditolak
                                                            </span>
                                                        @else
                                                            <span class="badge bg-warning">
                                                                <i class="fas fa-clock me-1"></i>Menunggu
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <a href="{{ route('admin.pengajuan.showbidang', $item->id) }}" 
                                                               class="btn btn-sm btn-primary">
                                                                <i class="fas fa-eye me-1"></i>Detail
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="9" class="text-center py-5">
                                                        <div class="d-flex flex-column align-items-center">
                                                            <div class="mb-3">
                                                                <i class="fas fa-inbox text-muted" style="font-size: 3rem;"></i>
                                                            </div>
                                                            <h5 class="text-muted mb-2">Belum ada pengajuan</h5>
                                                            <p class="text-muted mb-0">Data pengajuan akan muncul di sini ketika ada user yang mengajukan</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                
                                @if ($pengajuan->hasPages())
                                    <div class="d-flex justify-content-between align-items-center mt-4">
                                        <div>
                                            <p class="text-muted mb-0">
                                                Menampilkan {{ $pengajuan->firstItem() }} sampai {{ $pengajuan->lastItem() }} 
                                                dari {{ $pengajuan->total() }} data
                                            </p>
                                        </div>
                                        <div>
                                            {{ $pengajuan->links() }}
                                        </div>
                                    </div>
                                @endif
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
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                            by <a href="https://kominfo.malangkab.go.id/">Diskominfo</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    
    <script src="{{ asset('bidang/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('bidang/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('bidang/compiled/js/app.js') }}"></script>
    <script src="{{ asset('bidang/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('bidang/static/js/pages/dashboard.js') }}"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const tableBody = document.querySelector('tbody');
        const tableRows = tableBody.querySelectorAll('tr');
        
        // Store original rows for better performance
        const originalRows = Array.from(tableRows);
        
        function performSearch() {
            const searchValue = searchInput.value.toLowerCase().trim();
            let visibleCount = 0;
            
            originalRows.forEach(row => {
                // Skip the "no data" row if it exists
                if (row.querySelector('td[colspan]')) {
                    return;
                }
                
                // Get searchable text from specific columns
                const nama = row.querySelector('td:nth-child(2)')?.textContent.toLowerCase() || '';
                const nim = row.querySelector('td:nth-child(3)')?.textContent.toLowerCase() || '';
                const bidang = row.querySelector('td:nth-child(4)')?.textContent.toLowerCase() || '';
                const email = row.querySelector('td:nth-child(2) .text-muted')?.textContent.toLowerCase() || '';
                
                // Combine all searchable text
                const searchableText = `${nama} ${nim} ${bidang} ${email}`;
                
                if (searchValue === '' || searchableText.includes(searchValue)) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });
            
            // Show/hide "no results" message
            showNoResultsMessage(visibleCount === 0 && searchValue !== '');
        }
        
        function showNoResultsMessage(show) {
            // Remove existing no results row
            const existingNoResults = tableBody.querySelector('.no-results-row');
            if (existingNoResults) {
                existingNoResults.remove();
            }
            
            if (show) {
                const noResultsRow = document.createElement('tr');
                noResultsRow.className = 'no-results-row';
                noResultsRow.innerHTML = `
                    <td colspan="9" class="text-center py-5">
                        <div class="d-flex flex-column align-items-center">
                            <div class="mb-3">
                                <i class="fas fa-search text-muted" style="font-size: 3rem;"></i>
                            </div>
                            <h5 class="text-muted mb-2">Tidak ada hasil ditemukan</h5>
                            <p class="text-muted mb-0">Coba gunakan kata kunci yang berbeda</p>
                        </div>
                    </td>
                `;
                tableBody.appendChild(noResultsRow);
            }
        }
        
        // Add event listeners
        searchInput.addEventListener('input', performSearch);
        searchInput.addEventListener('keyup', performSearch);
        
        // Add clear search functionality
        searchInput.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                this.value = '';
                performSearch();
                this.blur();
            }
        });
        
        // Add search icon click functionality to clear search
        const searchIcon = document.querySelector('.input-group-text');
        if (searchIcon) {
            searchIcon.style.cursor = 'pointer';
            searchIcon.addEventListener('click', function() {
                if (searchInput.value) {
                    searchInput.value = '';
                    performSearch();
                    searchInput.focus();
                }
            });
        }
        
        // Highlight search terms (optional enhancement)
        function highlightSearchTerm(text, searchTerm) {
            if (!searchTerm) return text;
            
            const regex = new RegExp(`(${searchTerm.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')})`, 'gi');
            return text.replace(regex, '<mark>$1</mark>');
        }
        
        // Add placeholder animation
        let placeholderIndex = 0;
        const placeholders = [
            'Cari berdasarkan nama...',
            'Cari berdasarkan NIM...',
            'Cari berdasarkan bidang...',
            'Cari berdasarkan email...'
        ];
        
        function rotatePlaceholder() {
            if (searchInput === document.activeElement) return;
            
            searchInput.placeholder = placeholders[placeholderIndex];
            placeholderIndex = (placeholderIndex + 1) % placeholders.length;
        }
        
        // Rotate placeholder every 3 seconds
        setInterval(rotatePlaceholder, 3000);
        
        console.log('Enhanced search functionality loaded successfully');
    });

    // Additional CSS for better UX (add this to your CSS file or in a style tag)
    const additionalStyles = `
        <style>
            #searchInput {
                transition: all 0.3s ease;
            }
            
            #searchInput:focus {
                box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
                border-color: #86b7fe;
            }
            
            .input-group-text:hover {
                background-color: #e9ecef;
            }
            
            mark {
                background-color: #fff3cd;
                padding: 0.1em 0.2em;
                border-radius: 0.2em;
            }
            
            .table tbody tr {
                transition: opacity 0.2s ease;
            }
            
            .no-results-row {
                animation: fadeIn 0.3s ease-in;
            }
            
            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }
        </style>
    `;

    // Inject styles
    document.head.insertAdjacentHTML('beforeend', additionalStyles);
    </script>
        
</body>

</html>