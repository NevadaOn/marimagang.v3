<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Dokumentasi - Admin Bidang</title>
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
                        <h3 class="mb-0">Tambah Dokumentasi</h3>
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
                                    <i class="bi bi-plus-circle"></i>
                                    Tambah Dokumentasi Kegiatan
                                </h4>
                                <p class="text-muted mb-0">Dokumentasikan kegiatan dan project Anda dengan mudah</p>
                            </div>
                            <div class="mt-3 mt-md-0">
                                <a href="{{ route('admin.documentation.indexdinas') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left me-1"></i>
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Error Messages -->
                <div id="errorMessages" class="alert alert-danger alert-dismissible fade show d-none" role="alert">
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <strong>Terjadi Kesalahan!</strong>
                    </div>
                    <ul id="errorList" class="mb-0"></ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <!-- Main Form -->
                <div class="card">
                    <div class="card-body">
                        <form id="documentationForm" action="{{ route('admin.documentation.storedinas') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Judul Kegiatan -->
                            <div class="mb-4">
                                <label for="judul_kegiatan" class="form-label fw-semibold">
                                    <i class="bi bi-file-text me-1"></i>
                                    Judul Kegiatan
                                </label>
                                <input type="text" 
                                       name="judul_kegiatan" 
                                       id="judul_kegiatan"
                                       class="form-control form-control-lg"
                                       placeholder="Masukkan judul kegiatan..."
                                       required>
                            </div>

                            <!-- Judul Project -->
                            <div class="mb-4">
                                <label for="judul_project" class="form-label fw-semibold">
                                    <i class="bi bi-briefcase me-1"></i>
                                    Judul Project
                                </label>
                                <input type="text" 
                                       name="judul_project" 
                                       id="judul_project"
                                       class="form-control form-control-lg"
                                       placeholder="Masukkan judul project..."
                                       required>
                            </div>

                            <!-- Deskripsi -->
                            <div class="mb-4">
                                <label for="deskripsi" class="form-label fw-semibold">
                                    <i class="bi bi-list-ul me-1"></i>
                                    Deskripsi <span class="text-muted fw-normal">(Opsional)</span>
                                </label>
                                <textarea name="deskripsi" 
                                          id="deskripsi"
                                          rows="5"
                                          class="form-control"
                                          placeholder="Masukkan deskripsi kegiatan atau project..."></textarea>
                            </div>

                            <!-- Upload Images -->
                            <div class="mb-4">
                                <label for="images" class="form-label fw-semibold">
                                    <i class="bi bi-image me-1"></i>
                                    Upload Gambar
                                </label>
                                
                                <!-- Custom file upload area -->
                                <div class="upload-area border border-2 border-dashed rounded p-4 text-center" 
                                     style="min-height: 150px; cursor: pointer; transition: all 0.3s ease;"
                                     onclick="document.getElementById('images').click()">
                                    <i class="bi bi-cloud-upload text-muted mb-3" style="font-size: 3rem;"></i>
                                    <h5 class="text-muted mb-2">Klik untuk upload gambar</h5>
                                    <p class="text-muted small mb-0">atau drag & drop file ke sini</p>
                                    <p class="text-muted small">PNG, JPG, JPEG (Max 2MB per file)</p>
                                </div>
                                
                                <input type="file" 
                                       name="images[]" 
                                       id="images"
                                       multiple 
                                       required 
                                       accept="image/*"
                                       class="d-none"
                                       onchange="handleFileSelect(this)">
                                
                                <!-- File info -->
                                <div id="file-info" class="mt-3 d-none">
                                    <p class="text-muted small mb-2"><strong>File yang dipilih:</strong></p>
                                    <div id="file-list" class="row g-2"></div>
                                </div>
                                
                                <div class="form-text mt-2">
                                    <i class="bi bi-info-circle me-1"></i>
                                    Bisa pilih lebih dari satu gambar (Max 2MB per file)
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-save me-2"></i>
                                    Simpan Dokumentasi
                                </button>
                            </div>
                        </form>
                    </div>
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

    <script src="{{ asset('bidang/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('bidang/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('bidang/compiled/js/app.js') }}"></script>

    <script>
        // File upload handling
        function handleFileSelect(input) {
            const fileInfo = document.getElementById('file-info');
            const fileList = document.getElementById('file-list');
            
            if (input.files.length > 0) {
                fileInfo.classList.remove('d-none');
                fileList.innerHTML = '';
                
                Array.from(input.files).forEach((file, index) => {
                    const col = document.createElement('div');
                    col.className = 'col-md-6 col-lg-4';
                    
                    const fileItem = document.createElement('div');
                    fileItem.className = 'card card-body p-3';
                    fileItem.innerHTML = `
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <div class="flex-grow-1 text-truncate">
                                <div class="fw-medium small">${file.name}</div>
                                <div class="text-muted small">${(file.size / 1024 / 1024).toFixed(2)} MB</div>
                            </div>
                        </div>
                    `;
                    
                    col.appendChild(fileItem);
                    fileList.appendChild(col);
                });
            } else {
                fileInfo.classList.add('d-none');
            }
        }

        // Upload area hover effects
        const uploadArea = document.querySelector('.upload-area');
        
        uploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.borderColor = '#0d6efd';
            this.style.backgroundColor = '#f8f9ff';
        });
        
        uploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.style.borderColor = '#dee2e6';
            this.style.backgroundColor = 'transparent';
        });
        
        uploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            this.style.borderColor = '#dee2e6';
            this.style.backgroundColor = 'transparent';
            
            const files = e.dataTransfer.files;
            const input = document.getElementById('images');
            input.files = files;
            handleFileSelect(input);
        });

        // Form validation
        document.getElementById('documentationForm').addEventListener('submit', function(e) {
            const errors = [];
            const judulKegiatan = document.getElementById('judul_kegiatan').value.trim();
            const judulProject = document.getElementById('judul_project').value.trim();
            const images = document.getElementById('images').files;
            
            if (!judulKegiatan) {
                errors.push('Judul kegiatan harus diisi');
            }
            
            if (!judulProject) {
                errors.push('Judul project harus diisi');
            }
            
            if (images.length === 0) {
                errors.push('Minimal satu gambar harus diupload');
            }
            
            // Check file sizes
            Array.from(images).forEach(file => {
                if (file.size > 2 * 1024 * 1024) {
                    errors.push(`File ${file.name} terlalu besar (max 2MB)`);
                }
            });
            
            if (errors.length > 0) {
                e.preventDefault();
                showErrors(errors);
                return false;
            }
        });

        function showErrors(errors) {
            const errorContainer = document.getElementById('errorMessages');
            const errorList = document.getElementById('errorList');
            
            errorList.innerHTML = '';
            errors.forEach(error => {
                const li = document.createElement('li');
                li.textContent = error;
                errorList.appendChild(li);
            });
            
            errorContainer.classList.remove('d-none');
            errorContainer.scrollIntoView({ behavior: 'smooth' });
        }

        // Initialize tooltips if Bootstrap 5 is available
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
            }
        });
    </script>
</body>

</html>