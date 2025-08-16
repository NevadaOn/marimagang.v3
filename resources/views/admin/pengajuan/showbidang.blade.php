<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengajuan - Admin Bidang</title>
    <link rel="shortcut icon" href="{{ asset('bidang/compiled/svg/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('bidang/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('bidang/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('bidang/compiled/css/iconly.css') }}">
</head>

<body>
    <script src="{{ asset('bidang/static/js/initTheme.js') }}"></script>
    
    <div id="app">
        {{-- ======================== SIDEBAR ======================== --}}
        <div id="sidebar">
            <div class="sidebar-wrapper active">
                {{-- Sidebar Header --}}
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="index.html">
                                <img src="{{ asset('img/rb_30832.png') }}" 
                                     alt="Logo Diskominfo Kabupaten Malang" loading="lazy">
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
                                <input class="form-check-input me-0" type="checkbox" id="toggle-dark" style="cursor: pointer">
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
                
                {{-- Sidebar Menu --}}
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
                        <li class="sidebar-item">
                            <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item active">
                            <a href="{{ route('admin.pengajuan.bidang') }}" class="sidebar-link">
                                <i class="bi bi-stack"></i>
                                <span>Pengajuan</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- ======================== MAIN CONTENT ======================== --}}
        <div id="main">
            {{-- Header --}}
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            {{-- Page Heading --}}
            <div class="page-heading">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3>Detail Pengajuan</h3>
                        <p class="text-muted">Informasi lengkap pengajuan magang mahasiswa</p>
                    </div>
                    <div>
                        <a href="{{ route('admin.pengajuan.bidang') }}" class="btn btn-light-primary">
                            <i class="bi bi-arrow-left me-2"></i>Kembali
                        </a>
                    </div>
                </div>
            </div>
            
            {{-- Page Content --}}
            <div class="page-content">
                {{-- Alert Messages --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- PHP Logic for Panel Configuration --}}
                @php
                    $admin = auth('admin')->user();
                    $statusOptions = [];
                    
                    // Determine status options based on role and current status
                    if ($admin->role === 'superadmin') {
                        $statusOptions = ['diproses', 'diteruskan', 'diterima', 'ditolak'];
                    } elseif ($admin->role === 'admin_dinas' && $pengajuan->status === 'diproses') {
                        $statusOptions = ['diteruskan', 'ditolak'];
                    } elseif ($admin->role === 'admin_bidang' && $pengajuan->status === 'diteruskan') {
                        $statusOptions = ['diproses', 'diterima', 'ditolak'];
                    }

                    // Check if action panel is allowed
                    $isPanelAksiAllowed = auth('admin')->check() && (
                        ($admin->role === 'admin_bidang' && $admin->id === $pengajuan->databidang->admin_id) 
                        || in_array($admin->role, ['superadmin', 'admin_dinas'])
                    );

                    // Determine left column class
                    $colLeftClass = $isPanelAksiAllowed ? 'col-lg-8' : 'col-lg-12';
                    
                    // Prepare team members data
                    $semuaMahasiswa = collect([['user' => $pengajuan->user, 'status' => 'Ketua']])
                        ->merge($pengajuan->anggota->map(fn ($anggota) => ['user' => $anggota->user, 'status' => ucfirst($anggota->status)]))
                        ->unique(fn($item) => $item['user']->id);
                @endphp

                <div class="row">
                    {{-- ===================== LEFT COLUMN ===================== --}}
                    <div class="{{ $colLeftClass }}">
                        
                        {{-- General Information Card --}}
                        <div class="card mb-4 card-hover">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-info-circle me-2"></i>Informasi Umum
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Kode Pengajuan</label>
                                            <div class="fw-bold">{{ $pengajuan->kode_pengajuan ?? 'PG-2024-001' }}</div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Nama Mahasiswa</label>
                                            <div class="fw-bold">{{ $pengajuan->user->nama ?? 'Ahmad Rizki Pratama' }}</div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">NIM</label>
                                            <div class="fw-bold font-monospace">{{ $pengajuan->user->nim ?? '2024001001' }}</div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Universitas</label>
                                            <div class="fw-bold">{{ $pengajuan->user->universitas->nama_universitas ?? 'Universitas Brawijaya' }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Bidang</label>
                                            <div><span class="badge bg-light-info">{{ $pengajuan->databidang->nama ?? 'Teknologi Informasi' }}</span></div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Tanggal Mulai</label>
                                            <div class="fw-bold">{{ optional($pengajuan->tanggal_mulai)->format('d M Y') ?? '15 Jan 2025' }}</div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Tanggal Selesai</label>
                                            <div class="fw-bold">{{ optional($pengajuan->tanggal_selesai)->format('d M Y') ?? '15 Mar 2025' }}</div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Status</label>
                                            <div>
                                                @php $status = $pengajuan->status ?? 'pending'; @endphp
                                                @if ($status == 'disetujui')
                                                    <span class="badge bg-success status-badge">
                                                        <i class="fas fa-check me-1"></i>Disetujui
                                                    </span>
                                                @elseif($status == 'ditolak')
                                                    <span class="badge bg-danger status-badge">
                                                        <i class="fas fa-times me-1"></i>Ditolak
                                                    </span>
                                                @elseif($status == 'diproses')
                                                    <span class="badge bg-info status-badge">
                                                        <i class="fas fa-cog me-1"></i>Diproses
                                                    </span>
                                                @elseif($status == 'diteruskan')
                                                    <span class="badge bg-primary status-badge">
                                                        <i class="fas fa-paper-plane me-1"></i>Diteruskan
                                                    </span>
                                                @else
                                                    <span class="badge bg-warning status-badge">
                                                        <i class="fas fa-clock me-1"></i>Menunggu
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                @if($pengajuan->komentar_admin ?? false)
                                <div class="alert alert-light-info mt-3">
                                    <h6 class="mb-2">Catatan Admin</h6>
                                    <p class="mb-0">{{ $pengajuan->komentar_admin }}</p>
                                </div>
                                @endif
                            </div>
                        </div>

                        {{-- Team Members Card --}}
                        @if($semuaMahasiswa->count())
                        <div class="card mb-4 card-hover">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-users me-2"></i>Anggota Kelompok
                                    <span class="badge bg-success ms-2">{{ $semuaMahasiswa->count() }}</span>
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>NIM</th>
                                                <th>Status</th>
                                                <th>Keahlian</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($semuaMahasiswa->values() as $i => $entry)
                                            @php $user = $entry['user']; @endphp
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $user->nama }}</td>
                                                <td class="font-monospace">{{ $user->nim }}</td>
                                                <td><span class="badge bg-primary">{{ $entry['status'] }}</span></td>
                                                <td>
                                                    @if($user->userSkills->isNotEmpty())
                                                    <ul class="mb-0 ps-3">
                                                        @foreach($user->userSkills as $userSkill)
                                                        <li>
                                                            {{ $userSkill->skill->nama ?? 'Skill tidak ditemukan' }}
                                                            ({{ ucfirst($userSkill->level) }})
                                                            @if ($userSkill->sertifikat_path)
                                                            <button onclick="showPreview('{{ asset('storage/' . $userSkill->sertifikat_path) }}', '{{ basename($userSkill->sertifikat_path) }}')" 
                                                                class="btn btn-sm btn-light-primary ms-2 file-preview-btn">
                                                                <i class="fas fa-eye"></i> Sertifikat
                                                            </button>
                                                            @endif
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                    @else
                                                        <span class="text-muted fst-italic">Belum ada keahlian</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endif

                        {{-- Documents Card --}}
                        @if($pengajuan->documents->count())
                        <div class="card mb-4 card-hover">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-file-alt me-2"></i>Dokumen Pengajuan
                                    <span class="badge bg-info ms-2">{{ $pengajuan->documents->count() }} Dokumen</span>
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jenis Dokumen</th>
                                                <th>Nama File</th>
                                                <th>Ukuran</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pengajuan->documents as $i => $doc)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td><span class="badge bg-primary">{{ ucfirst(str_replace('_', ' ', $doc->document_type)) }}</span></td>
                                                <td class="font-monospace">{{ $doc->file_name }}</td>
                                                <td>{{ number_format($doc->file_size / 1024, 2) }} KB</td>
                                                <td>
                                                    <button onclick="showPreview('{{ route('admin.pengajuan.download', ['id' => $pengajuan->id, 'document' => $doc->file_name]) }}', '{{ $doc->file_name }}')" 
                                                        class="btn btn-sm btn-primary file-preview-btn">
                                                        <i class="fas fa-eye me-1"></i>Preview
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    {{-- ===================== RIGHT COLUMN ===================== --}}
                    @if($isPanelAksiAllowed)
                    <div class="col-lg-4">
                        {{-- Main Action Panel --}}
                        <div class="card mb-4 card-hover">
                            <div class="card-header">
                                <h6 class="card-title mb-0">
                                    <i class="fas fa-cogs me-2"></i>Panel Aksi
                                </h6>
                            </div>
                            <div class="card-body">
                                {{-- Date Update Button --}}
                                @if (in_array($admin->role, ['superadmin', 'admin_dinas']))
                                <div class="d-grid gap-2 mb-3">
                                    <button type="button" class="btn btn-warning" onclick="openModal()">
                                        <i class="fas fa-calendar-alt me-2"></i>Ubah Tanggal Magang
                                    </button>
                                </div>

                                {{-- Update Bidang Section --}}
                                <div class="border-top pt-3">
                                    <form action="{{ route('admin.pengajuan.updateBidang', $pengajuan->id) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <label for="databidang_id" class="form-label">Pilih Bidang</label>
                                        <select name="databidang_id" class="form-select mb-2" required>
                                            @foreach ($listBidang as $bidang)
                                                <option value="{{ $bidang->id }}" {{ $pengajuan->databidang_id == $bidang->id ? 'selected' : '' }}>
                                                    {{ $bidang->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-primary w-100">
                                            <i class="fas fa-save me-2"></i>Simpan Bidang
                                        </button>
                                    </form>
                                </div>
                                @endif

                                {{-- Form Kesediaan Section --}}
                                <div class="mt-4 pt-3 border-top">
                                    <h6 class="mb-3">Form Kesediaan</h6>
                                    <form action="{{ route('admin.pengajuan.kesediaan.generate', $pengajuan->id) }}" method="POST">
                                        @csrf
                                        <input type="text" name="penanggung_jawab" class="form-control mb-2" placeholder="Penanggung Jawab" required>
                                        <input type="text" name="nama_project" class="form-control mb-2" placeholder="Nama Project" required>
                                        <input type="text" name="koordinator" class="form-control mb-2" placeholder="Koordinator" required>
                                        <button type="submit" class="btn btn-success w-100 mb-2">
                                            <i class="fas fa-file-text me-2"></i>Generate Form Kesediaan
                                        </button>
                                    </form>
                                    @if($pengajuan->form_kesediaan_magang)
                                    <a href="{{ asset('storage/' . $pengajuan->form_kesediaan_magang) }}" class="btn btn-light-success w-100" target="_blank">
                                        <i class="fas fa-eye me-2"></i>Lihat Form
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Letter Management Panel --}}
                        @if (in_array($admin->role, ['superadmin', 'admin_dinas']))
                        <div class="card mb-4 card-hover">
                            <div class="card-header">
                                <h6 class="card-title mb-0">
                                    <i class="fas fa-envelope me-2"></i>Manajemen Surat
                                </h6>
                            </div>
                            <div class="card-body">
                                {{-- Manual Upload --}}
                                <div class="mb-3">
                                    <form action="{{ route('admin.pengajuan.uploadSurat', $pengajuan->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <label class="form-label">Unggah Surat (PDF)</label>
                                        <input type="file" name="surat_pdf" accept="application/pdf" class="form-control mb-2">
                                        <button type="submit" class="btn btn-primary w-100">
                                            <i class="fas fa-upload me-2"></i>Simpan Surat
                                        </button>
                                    </form>
                                </div>

                                {{-- Auto Generate --}}
                                <div class="mb-3 pt-2 border-top">
                                    <form action="{{ route('admin.pengajuan.generateSurat', $pengajuan->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success w-100">
                                            <i class="fas fa-magic me-2"></i>Buat Surat Otomatis
                                        </button>
                                    </form>
                                </div>

                                {{-- View Letter --}}
                                @if ($pengajuan->surat_pdf)
                                <div class="text-center">
                                    <button onclick="showPreview('{{ asset('storage/' . $pengajuan->surat_pdf) }}', '{{ basename($pengajuan->surat_pdf) }}')" 
                                        class="btn btn-light-primary btn-sm file-preview-btn">
                                        <i class="fas fa-eye me-2"></i>Lihat Surat PDF
                                    </button>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endif

                        {{-- Status & Comment Panel --}}
                        @if (!empty($statusOptions))
                        <div class="card mb-4 card-hover">
                            <div class="card-header">
                                <h6 class="card-title mb-0">
                                    <i class="fas fa-edit me-2"></i>Update Status & Komentar
                                </h6>
                            </div>
                            <div class="card-body">
                                {{-- Status Update --}}
                                <div class="mb-3">
                                    <label class="form-label">Ubah Status</label>
                                    <form action="{{ route('admin.pengajuan.updateStatus', $pengajuan->id) }}" method="POST" class="d-flex gap-2">
                                        @csrf @method('PUT')
                                        <select name="status" class="form-select">
                                            @foreach ($statusOptions as $status)
                                                <option value="{{ $status }}" {{ $pengajuan->status === $status ? 'selected' : '' }}>
                                                    {{ ucfirst($status) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <button type="submit" onclick="return confirm('Anda yakin ingin mengubah status?')" class="btn btn-primary">
                                            <i class="fas fa-save"></i>
                                        </button>
                                    </form>
                                </div>

                                {{-- Send Comment --}}
                                <div>
                                    <label class="form-label">Kirim Komentar</label>
                                    <form action="{{ route('admin.pengajuan.kirimCatatan', $pengajuan->id) }}" method="POST">
                                        @csrf
                                        <textarea name="komentar_admin" class="form-control mb-2" rows="3" placeholder="Tulis komentar..." required></textarea>
                                        <div class="d-flex gap-2 mb-2">
                                            <select name="tujuan" class="form-select">
                                                <option value="user">User</option>
                                                <option value="admin_bidang">Admin Bidang</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-paper-plane me-1"></i>Kirim
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif
                </div>
            </div>

            {{-- Footer --}}
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

    {{-- ======================== MODALS ======================== --}}
    
    {{-- Date Update Modal --}}
    <div class="modal fade" id="updateTanggalModal" tabindex="-1" aria-labelledby="updateTanggalModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {{-- Modal Header --}}
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title" id="updateTanggalModalLabel">Ubah Tanggal Magang</h5>
                        <small class="text-muted">Perbarui periode magang mahasiswa</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                {{-- Modal Form --}}
                <form action="{{ route('admin.pengajuan.updateTanggal', $pengajuan->id) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" id="tanggal_mulai" 
                                   class="form-control" value="{{ $pengajuan->tanggal_mulai }}">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                            <input type="date" name="tanggal_selesai" id="tanggal_selesai" 
                                   class="form-control" value="{{ $pengajuan->tanggal_selesai }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Document Preview Modal --}}
    <div class="modal fade" id="previewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                {{-- Modal Header --}}
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title">Preview Dokumen</h5>
                        <small id="previewTitle" class="text-muted">Memuat dokumen...</small>
                    </div>
                    <button type="button" class="btn-close" onclick="closePreview()"></button>
                </div>
                
                {{-- Modal Body --}}
                <div class="modal-body position-relative" style="height: 70vh; overflow: hidden;">
                <!-- Loading State -->
                <div id="previewLoading" class="..." style="z-index: 1000; background-color: rgba(255, 255, 255, 0.95); backdrop-filter: blur(2px);">
                    <div class="spinner-border text-primary mb-3" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="text-muted">Memuat dokumen...</p>
                    <div class="progress" style="width: 200px;">
                        <div id="loadingProgress" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%"></div>
                    </div>
                </div>
                
                <!-- Preview Content -->
                <div id="previewContent" class="h-100" style="display: none;">
                    <iframe id="previewFrame" style="width: 100%; height: 100%; border: none;"></iframe>
                </div>
                </div>
                
                {{-- Modal Footer --}}
                <div class="modal-footer">
                    <div>
                        <small id="fileInfo" class="text-muted">Informasi file</small>
                    </div>
                    <div>
                        <button onclick="downloadFile()" class="btn btn-primary btn-sm">
                            <i class="fas fa-download me-1"></i>Download
                        </button>
                        <button onclick="closePreview()" class="btn btn-secondary btn-sm">
                            <i class="fas fa-times me-1"></i>Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ======================== SCRIPTS ======================== --}}
    
    {{-- ASET ASET E JS --}}
    <script src="{{ asset('bidang/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('bidang/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('bidang/compiled/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>


    <script>
        // ======================== IKI VARIABEL GLOBAL ========================
    let currentFileUrl = '';
    let currentFileName = '';
    let currentAbortController = null;
    let loadingTimeout = null;
    let progressInterval = null;

    // ======================== IKI FUNGSI MODAL ========================

    function openModal() {
        const modalElement = document.getElementById('updateTanggalModal');
        if (modalElement) {
            const modal = new bootstrap.Modal(modalElement);
            modal.show();
        } else {
            console.error('Modal updateTanggalModal tidak ditemukan');
        }
    }

    // ======================== PREVIEW FUNCTIONS ========================

    function showPreview(url, fileName = '') {
        const modalElement = document.getElementById('previewModal');
        if (!modalElement) {
            console.error('Modal previewModal tidak ditemukan');
            return;
        }

        const modal = new bootstrap.Modal(modalElement);
        const loading = document.getElementById('previewLoading');
        const content = document.getElementById('previewContent');
        const frame = document.getElementById('previewFrame');
        const title = document.getElementById('previewTitle');
        const fileInfo = document.getElementById('fileInfo');
        

        modal.show();
        

        if (loading) {
            loading.style.display = 'flex';
            loading.style.zIndex = '10';
        }
        if (content) content.style.display = 'none';
        

        clearTimeout(loadingTimeout);
        clearInterval(progressInterval);
        

        currentFileUrl = url;
        currentFileName = fileName || 'dokumen';
        
        if (title) title.textContent = currentFileName;
        

        const fileExtension = getFileExtension(currentFileName);
        if (fileInfo) {
            fileInfo.textContent = `${fileExtension ? fileExtension.toUpperCase() : 'FILE'} • ${currentFileName}`;
        }
        

        startLoadingProgress();
        

        if (isRouteUrl(url)) {
            handleRoutePreview(url, fileExtension);
        } else {
            handleDirectPreview(url, fileExtension);
        }
    }


    function startLoadingProgress() {
        const progressBar = document.getElementById('loadingProgress');
        if (!progressBar) return;
        
        let progress = 0;
        progressBar.style.width = '0%';
        
        progressInterval = setInterval(() => {
            progress += Math.random() * 15;
            if (progress > 90) progress = 90;
            progressBar.style.width = progress + '%';
        }, 200);
    }


    function completeLoadingProgress() {
        const progressBar = document.getElementById('loadingProgress');
        if (progressBar) {
            progressBar.style.width = '100%';
        }
        clearInterval(progressInterval);
    }

    function hideLoadingShowContent() {
        const loading = document.getElementById('previewLoading');
        const content = document.getElementById('previewContent');
        
        completeLoadingProgress();
        

        setTimeout(() => {
            if (loading) {
                loading.style.display = 'none';
                loading.style.zIndex = '1';
            }
            if (content) {
                content.style.display = 'block';
            }
        }, 300);
    }


    function isRouteUrl(url) {
        return url.includes('/download') || url.includes('/admin/pengajuan/') || 
            url.includes('?') || url.includes('&');
    }


    function handleRoutePreview(url, fileExtension) {
        if (currentAbortController) {
            currentAbortController.abort();
        }
        
        currentAbortController = new AbortController();
        
        fetch(url, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,image/*'
            },
            signal: currentAbortController.signal
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.blob();
        })
        .then(blob => {
            const blobUrl = URL.createObjectURL(blob);
            currentFileUrl = blobUrl;
            loadPreviewFrame(blobUrl, fileExtension);
        })
        .catch(error => {
            if (error.name === 'AbortError') {
                console.log('Preview fetch aborted');
                return;
            }
            console.error('Error fetching file:', error);
            showPreviewError('Gagal memuat dokumen. Silakan coba lagi.');
        });
    }


    function handleDirectPreview(url, fileExtension) {
     
        loadPreviewFrame(url, fileExtension);
    }

 
    function loadPreviewFrame(url, fileExtension) {
        const frame = document.getElementById('previewFrame');
        
        if (!frame) {
            console.error('Preview frame tidak ditemukan');
            showPreviewError('Terjadi kesalahan pada sistem preview.');
            return;
        }
        
        try {

            frame.src = '';
            
          
            frame.onload = null;
            frame.onerror = null;
            
           
            const handleSuccess = () => {
                console.log('Frame loaded successfully');
                clearTimeout(loadingTimeout);
                hideLoadingShowContent();
            };

            const handleError = () => {
                console.log('Frame failed to load, trying alternative method');
                clearTimeout(loadingTimeout);
                tryAlternativePreview(url, fileExtension);
            };

            loadingTimeout = setTimeout(() => {
                console.log('Primary loading timeout, hiding loading state');
                hideLoadingShowContent();
            }, 5000); 
            
            if (fileExtension === 'pdf') {
                frame.onload = handleSuccess;
                frame.onerror = handleError;
                frame.src = url + '#toolbar=1&navpanes=0&scrollbar=1&view=FitH';
                
            } else if (['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'svg'].includes(fileExtension)) {
                const imgHtml = createImagePreviewHTML(url);
                frame.onload = handleSuccess;
                frame.onerror = handleError;
                frame.src = 'data:text/html;charset=utf-8,' + encodeURIComponent(imgHtml);
                
            } else if (['doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx'].includes(fileExtension)) {
                frame.onload = handleSuccess;
                frame.onerror = handleError;
                frame.src = `https://docs.google.com/viewer?url=${encodeURIComponent(url)}&embedded=true`;
                
            } else {
                frame.onload = handleSuccess;
                frame.onerror = handleError;
                frame.src = url;
            }
            
            setTimeout(() => {
                const loading = document.getElementById('previewLoading');
                if (loading && loading.style.display !== 'none') {
                    console.log('Safety timeout: hiding loading state');
                    hideLoadingShowContent();
                }
            }, 8000);
            
        } catch (error) {
            console.error('Error loading preview:', error);
            showPreviewError('Terjadi kesalahan saat memuat preview dokumen.');
        }
    }


    function tryAlternativePreview(url, fileExtension) {
        const frame = document.getElementById('previewFrame');
        if (!frame) return;
        
        console.log('Trying alternative preview method for:', fileExtension);
        
       
        frame.onload = null;
        frame.onerror = null;
        
        if (fileExtension === 'pdf') {
            frame.onload = () => {
                console.log('Alternative PDF preview loaded');
                hideLoadingShowContent();
            };
            frame.onerror = () => {
                console.log('Alternative PDF preview failed');
                showPreviewError('Dokumen PDF tidak dapat ditampilkan. Silakan download untuk melihat isi file.');
            };
            frame.src = `https://docs.google.com/viewer?url=${encodeURIComponent(url)}&embedded=true`;
            
        } else if (!['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'svg'].includes(fileExtension)) {
            
            frame.onload = () => {
                console.log('Alternative document preview loaded');
                hideLoadingShowContent();
            };
            frame.onerror = () => {
                console.log('Alternative document preview failed');
                showPreviewError('Dokumen tidak dapat ditampilkan. Silakan download untuk melihat isi file.');
            };
            frame.src = `https://docs.google.com/viewer?url=${encodeURIComponent(url)}&embedded=true`;
            
        } else {
            
            showPreviewError('Gambar tidak dapat dimuat. Silakan download untuk melihat file.');
        }
        
      
        setTimeout(() => {
            const loading = document.getElementById('previewLoading');
            if (loading && loading.style.display !== 'none') {
                console.log('Alternative method timeout: showing error');
                showPreviewError('Dokumen tidak dapat ditampilkan. Silakan download untuk melihat isi file.');
            }
        }, 10000);
    }

    function createImagePreviewHTML(url) {
        return `
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Image Preview</title>
                <style>
                    body { 
                        margin: 0; 
                        padding: 20px; 
                        text-align: center; 
                        background: #f5f5f5;
                        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                    }
                    img { 
                        max-width: 100%; 
                        height: auto; 
                        box-shadow: 0 4px 20px rgba(0,0,0,0.15);
                        border-radius: 8px;
                    }
                    .image-container {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        min-height: calc(100vh - 40px);
                    }
                    .error-message {
                        color: #dc3545;
                        font-size: 16px;
                        margin-top: 20px;
                    }
                    .loading {
                        color: #007bff;
                        font-size: 16px;
                    }
                </style>
            </head>
            <body>
                <div class="image-container">
                    <div id="imageWrapper">
                        <div class="loading">Memuat gambar...</div>
                        <img src="${url}" alt="Preview Image" 
                            onload="document.querySelector('.loading').style.display='none'; this.style.display='block';"
                            onerror="document.querySelector('.loading').innerHTML='Gambar tidak dapat dimuat'; this.style.display='none';" 
                            style="display: none;" />
                    </div>
                </div>
            </body>
            </html>
        `;
    }

    function showPreviewError(message) {
        const loading = document.getElementById('previewLoading');
        const content = document.getElementById('previewContent');
        const frame = document.getElementById('previewFrame');
        
        clearTimeout(loadingTimeout);
        clearInterval(progressInterval);
        
        if (!loading || !content || !frame) return;
        
        const errorHtml = `
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Preview Error</title>
                <style>
                    body { 
                        margin: 0; 
                        padding: 40px; 
                        text-align: center; 
                        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                        background: #f8f9fa;
                        color: #495057;
                    }
                    .error-container {
                        background: white;
                        padding: 40px;
                        border-radius: 12px;
                        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
                        max-width: 500px;
                        margin: 0 auto;
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        justify-content: center;
                        min-height: 300px;
                    }
                    .error-icon {
                        font-size: 64px;
                        margin-bottom: 20px;
                        opacity: 0.6;
                    }
                    .error-message {
                        font-size: 16px;
                        margin-bottom: 30px;
                        line-height: 1.5;
                    }
                    .download-btn {
                        background: #007bff;
                        color: white;
                        padding: 12px 24px;
                        border: none;
                        border-radius: 6px;
                        cursor: pointer;
                        font-size: 14px;
                        text-decoration: none;
                        display: inline-flex;
                        align-items: center;
                        gap: 8px;
                        transition: background-color 0.3s ease;
                    }
                    .download-btn:hover {
                        background: #0056b3;
                        color: white;
                        text-decoration: none;
                    }
                </style>
            </head>
            <body>
                <div class="error-container">
                    <div class="error-icon">📄</div>
                    <div class="error-message">${message}</div>
                    <a href="${currentFileUrl}" class="download-btn" target="_blank" rel="noopener noreferrer">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                        </svg>
                        Download File
                    </a>
                </div>
            </body>
            </html>
        `;
        
        frame.src = 'data:text/html;charset=utf-8,' + encodeURIComponent(errorHtml);
        hideLoadingShowContent();
    }


    function getFileExtension(filename) {
        if (!filename || typeof filename !== 'string') return '';
        const parts = filename.split('.');
        return parts.length > 1 ? parts.pop().toLowerCase() : '';
    }


    function closePreview() {
        const modalElement = document.getElementById('previewModal');
        if (!modalElement) return;
        
        const modal = bootstrap.Modal.getInstance(modalElement);
        const frame = document.getElementById('previewFrame');

        clearTimeout(loadingTimeout);
        clearInterval(progressInterval);

        if (modal) {
            modal.hide();
        }
        
        if (frame) {
            frame.src = '';
            frame.onload = null;
            frame.onerror = null;
        }

        if (currentFileUrl && currentFileUrl.startsWith('blob:')) {
            try {
                URL.revokeObjectURL(currentFileUrl);
            } catch (error) {
                console.error('Error revoking blob URL:', error);
            }
        }


        if (currentAbortController) {
            currentAbortController.abort();
            currentAbortController = null;
        }


        currentFileUrl = '';
        currentFileName = '';
    }


    function downloadFile() {
        if (!currentFileUrl) {
            console.warn('No file URL available for download');
            return;
        }

        try {
            if (currentFileUrl.startsWith('blob:')) {
                const link = document.createElement('a');
                link.href = currentFileUrl;
                link.download = currentFileName;
                link.style.display = 'none';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            } else {
                const link = document.createElement('a');
                link.href = currentFileUrl;
                link.target = '_blank';
                link.rel = 'noopener noreferrer';
                link.download = currentFileName;
                link.style.display = 'none';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }
        } catch (error) {
            console.error('Error downloading file:', error);
            window.open(currentFileUrl, '_blank', 'noopener,noreferrer');
        }
    }

    // ======================== FORM ENHANCEMENTS ========================


    function initializeFormHandlers() {
        document.querySelectorAll('form').forEach(form => {
            const submitButton = form.querySelector('button[type="submit"]');
            if (submitButton) {
                form.addEventListener('submit', function(e) {
                    handleFormSubmission(submitButton, e);
                });
            }
        });
    }


    function handleFormSubmission(button, e) {
        if (!button) return;
        
        const form = button.closest('form');
        if (!form || !form.checkValidity()) return;
        
        const originalText = button.innerHTML;
        const originalDisabled = button.disabled;
        

        button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memproses...';
        button.disabled = true;

       
        setTimeout(() => {
            if (button.innerHTML.includes('fa-spinner')) {
                button.innerHTML = originalText;
                button.disabled = originalDisabled;
            }
        }, 10000);
    }


    function showSuccessAlert(message) {
        const alertContainer = document.querySelector('.page-content') || document.body;
        const alertId = 'alert-' + Date.now();
        
        const alertHtml = `
            <div id="${alertId}" class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
        
        alertContainer.insertAdjacentHTML('afterbegin', alertHtml);
        
       
        setTimeout(() => {
            const alert = document.getElementById(alertId);
            if (alert) {
                const bsAlert = bootstrap.Alert.getInstance(alert) || new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 5000);
    }

    function showErrorAlert(message) {
        const alertContainer = document.querySelector('.page-content') || document.body;
        const alertId = 'alert-' + Date.now();
        
        const alertHtml = `
            <div id="${alertId}" class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
        
        alertContainer.insertAdjacentHTML('afterbegin', alertHtml);
        
       
        setTimeout(() => {
            const alert = document.getElementById(alertId);
            if (alert) {
                const bsAlert = bootstrap.Alert.getInstance(alert) || new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 7000);
    }


    function initializeStatusHandlers() {
        document.querySelectorAll('select[name="status"]').forEach(select => {
            select.addEventListener('change', function() {
                const form = this.closest('form');
                const submitBtn = form ? form.querySelector('button[type="submit"]') : null;
                
                if (submitBtn) {
                    submitBtn.onclick = function(e) {
                        e.preventDefault();
                        if (confirm('Anda yakin ingin mengubah status pengajuan ini?')) {
                            form.submit();
                        }
                    };
                }
            });
        });
    }

    // ======================== IKI SIDEBAR ========================


    function initializeSidebar() {
        const burgerBtn = document.querySelector('.burger-btn');
        const sidebar = document.getElementById('sidebar');
        const sidebarHide = document.querySelector('.sidebar-hide');
        
        if (burgerBtn && sidebar) {
            burgerBtn.addEventListener('click', function(e) {
                e.preventDefault();
                sidebar.classList.toggle('active');
            });
        }
        
        if (sidebarHide && sidebar) {
            sidebarHide.addEventListener('click', function(e) {
                e.preventDefault();
                sidebar.classList.remove('active');
            });
        }
        

        document.addEventListener('click', function(e) {
            if (window.innerWidth <= 1200 && sidebar && sidebar.classList.contains('active')) {
                if (!sidebar.contains(e.target) && !burgerBtn.contains(e.target)) {
                    sidebar.classList.remove('active');
                }
            }
        });
    }


    function initializeThemeToggle() {
        const themeToggle = document.getElementById('toggle-dark');
        const body = document.body;
        
        if (themeToggle) {
            const savedTheme = localStorage.getItem('theme') || 'light';
            if (savedTheme === 'dark') {
                body.classList.add('dark-theme');
                themeToggle.checked = true;
            }
            
            themeToggle.addEventListener('change', function() {
                if (this.checked) {
                    body.classList.add('dark-theme');
                    localStorage.setItem('theme', 'dark');
                } else {
                    body.classList.remove('dark-theme');
                    localStorage.setItem('theme', 'light');
                }
            });
        }
    }

    // ======================== IKI PAS INISIALISASINE ========================

    document.addEventListener('DOMContentLoaded', function() {
        try {
            initializeFormHandlers();
            initializeStatusHandlers();
            initializeSidebar();
            initializeThemeToggle();
            
            console.log('Detail pengajuan page loaded successfully');
            console.log('All interactive features initialized');
        } catch (error) {
            console.error('Error initializing page:', error);
        }
    });

    // ======================== IKI FUNGSI EFEK ========================


    function smoothScrollTo(elementId) {
        const element = document.getElementById(elementId);
        if (element) {
            element.scrollIntoView({ 
                behavior: 'smooth',
                block: 'start'
            });
        }
    }


    function showLoading(element) {
        if (!element) return () => {};
        
        const originalContent = element.innerHTML;
        const originalDisabled = element.disabled;
        
        element.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Loading...';
        element.disabled = true;
        
        return function hideLoading() {
            element.innerHTML = originalContent;
            element.disabled = originalDisabled;
        };
    }

    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }


    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // ======================== IKI LK PAS ERROR CEK ENEK INPONE ========================

    window.addEventListener('error', function(e) {
        console.error('Global error:', e.error);
    });

    window.addEventListener('unhandledrejection', function(e) {
        console.error('Unhandled promise rejection:', e.reason);
    });

    // ======================== IKI MBERSENI CHACE  ========================

    window.addEventListener('beforeunload', function() {

        if (currentAbortController) {
            currentAbortController.abort();
        }
        

        clearTimeout(loadingTimeout);
        clearInterval(progressInterval);
        

        if (currentFileUrl && currentFileUrl.startsWith('blob:')) {
            try {
                URL.revokeObjectURL(currentFileUrl);
            } catch (error) {
                console.error('Error cleaning up blob URL:', error);
            }
        }
    });
    </script>

</body>
</html>