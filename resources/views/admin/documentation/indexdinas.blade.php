<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumentasi Gallery - Admin Bidang</title>
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

                        <li class="sidebar-item">
                            <a href="{{ route('admin.dashboard') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('admin.pengajuan.bidang') }}" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Pengajuan</span>
                            </a>
                        </li>
                         <li class="sidebar-item active">
                            <a href="{{ route('admin.documentation.indexdinas') }}" class='sidebar-link'>
                                <i class="bi bi-camera-fill"></i>
                                
                                <span>Dokumentasi</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('admin.logbook.indexdinas') }}" class='sidebar-link'>
                                <i class="bi bi-book-half"></i>
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
                        <h3 class="mb-0">Dokumentasi Gallery</h3>
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
                <!-- Header Section -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                            <div>
                                <h4 class="card-title mb-1">
                                    <i class="bi bi-images"></i>
                                    Dokumentasi Gallery
                                </h4>
                                <p class="text-muted mb-0">Kelola dan tampilkan koleksi dokumentasi kegiatan</p>
                            </div>
                            <div class="mt-3 mt-md-0">
                                <a href="{{ route('admin.documentation.createdinas') }}" class="btn btn-primary">
                                    <i class="bi bi-plus-circle me-1"></i>
                                    Tambah Dokumentasi
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image Grid -->
                <div id="imageGrid" class="row">
                    <!-- Images will be populated by JavaScript -->
                </div>

                <!-- Empty State -->
                <div id="emptyState" class="card" style="display: none;">
                    <div class="card-body text-center py-5">
                        <i class="bi bi-image text-muted" style="font-size: 4rem;"></i>
                        <h5 class="mt-3">Belum Ada Dokumentasi</h5>
                        <p class="text-muted">Mulai tambahkan dokumentasi pertama Anda dengan mengklik tombol "Tambah Dokumentasi" di atas.</p>
                    </div>
                </div>

                <!-- Loading State -->
                <div id="loadingState" class="text-center py-5" style="display: none;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="text-muted mt-3">Memuat dokumentasi...</p>
                </div>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; Diskominfo Kab. Malang</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with by <a href="https://kominfo.malangkab.go.id/">Diskominfo</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Enhanced Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Detail Dokumentasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" alt="Gambar" class="img-fluid rounded mb-3" style="max-height: 400px;">
                    <p id="modalCaption" class="h6"></p>
                </div>
                <div class="modal-footer justify-content-center">
                    <form id="deleteForm" method="POST" onsubmit="return confirmDelete()" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash me-1"></i>
                            Hapus Gambar
                        </button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i>
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('bidang/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('bidang/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('bidang/compiled/js/app.js') }}"></script>

    <script>
        // Image data from Laravel
        const images = [
            @foreach ($documentations as $doc)
                @foreach ($doc->images as $img)
                    {
                        src: "{{ asset('storage/' . $img->image_path) }}",
                        caption: @json($img->caption ?? 'Tidak ada keterangan'),
                        deleteUrl: "{{ route('admin.documentation.destroy', $img->id) }}",
                        createdAt: "{{ $img->created_at->format('d M Y') }}"
                    },
                @endforeach
            @endforeach
        ];

        // DOM elements
        const grid = document.getElementById('imageGrid');
        const modalElement = document.getElementById('imageModal');
        const modal = new bootstrap.Modal(modalElement);
        const modalImage = document.getElementById('modalImage');
        const modalCaption = document.getElementById('modalCaption');
        const deleteForm = document.getElementById('deleteForm');
        const emptyState = document.getElementById('emptyState');
        const loadingState = document.getElementById('loadingState');

        // Show loading initially
        loadingState.style.display = 'block';

        // Modal functions
        function openModal(img) {
            modalImage.src = img.src;
            modalCaption.textContent = img.caption;
            deleteForm.action = img.deleteUrl;
            modal.show();
        }

        // Confirm delete
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus gambar ini? Tindakan ini tidak dapat dibatalkan.');
        }

        // Create image elements
        function createImageGrid() {
            // Hide loading
            loadingState.style.display = 'none';
            
            if (images.length === 0) {
                emptyState.style.display = 'block';
                return;
            }

            images.forEach((img, index) => {
                const col = document.createElement('div');
                col.className = 'col-12 col-md-6 col-lg-4 mb-4';

                const card = document.createElement('div');
                card.className = 'card h-100';
                card.style.cursor = 'pointer';
                card.style.transition = 'transform 0.2s ease-in-out';

                // Add hover effect
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });

                const image = document.createElement('img');
                image.src = img.src;
                image.alt = img.caption;
                image.className = 'card-img-top';
                image.style.height = '200px';
                image.style.objectFit = 'cover';
                image.loading = 'lazy';
                
                // Add error handling for broken images
                image.onerror = function() {
                    this.src = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDMwMCAyMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIzMDAiIGhlaWdodD0iMjAwIiBmaWxsPSIjMzc0MTUxIi8+CjxwYXRoIGQ9Ik0xNTAgMTAwTDEyMCA4MEwyMDAgMTIwTDE4MCA4MEwyMDAgMTIwWiIgZmlsbD0iIzZCNzI4MCIvPgo8dGV4dCB4PSIxNTAiIHk9IjEwNSIgZm9udC1mYW1pbHk9IkFyaWFsIiBmb250LXNpemU9IjE0IiBmaWxsPSIjOUI5Qjk5IiB0ZXh0LWFuY2hvcj0ibWlkZGxlIj5HYW1iYXIgdGlkYWsgZGFwYXQgZGltdWF0PC90ZXh0Pgo8L3N2Zz4K';
                    this.style.backgroundColor = '#f8f9fa';
                };

                const cardBody = document.createElement('div');
                cardBody.className = 'card-body';

                const captionTitle = document.createElement('h6');
                captionTitle.className = 'card-title';
                captionTitle.textContent = img.caption;

                const captionMeta = document.createElement('small');
                captionMeta.className = 'text-muted d-flex align-items-center';
                captionMeta.innerHTML = `
                    <i class="bi bi-calendar-event me-1"></i>
                    ${img.createdAt}
                `;

                cardBody.appendChild(captionTitle);
                cardBody.appendChild(captionMeta);

                // Add click handler
                card.addEventListener('click', () => openModal(img));

                card.appendChild(image);
                card.appendChild(cardBody);
                col.appendChild(card);
                grid.appendChild(col);
            });
        }

        // Initialize when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Simulate loading delay for smooth transition
            setTimeout(() => {
                createImageGrid();
            }, 500);
        });
    </script>
</body>

</html>