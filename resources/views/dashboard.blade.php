<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liquid Glass Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-dark: #0f172a;
            --secondary-dark: #1e293b;
            --accent-dark: #334155;
            --text-dark: #f1f5f9;
            --primary-light: #e0f2fe;
            --secondary-light: #b3e5fc;
            --accent-light: #81d4fa;
            --text-light: #0d47a1;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
            transition: all 0.3s ease;
        }

        /* Dark Mode Styles */
        .dark-mode {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
            color: var(--text-dark);
            min-height: 100vh;
        }

        .dark-mode::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 20% 80%, rgba(59, 130, 246, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(14, 165, 233, 0.1) 0%, transparent 50%);
            pointer-events: none;
            z-index: -1;
        }

        .light-mode {
            background: linear-gradient(135deg, #87ceeb 0%, #b3e5fc 50%, #e0f2fe 100%);
            color: var(--text-light);
            min-height: 100vh;
        }

        .light-mode::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 20% 80%, rgba(255, 255, 255, 0.3) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.2) 0%, transparent 50%);
            pointer-events: none;
            z-index: -1;
        }

        .text-theme-default {
            color: #111;
        }

        body.dark-mode .text-theme-default {
            color: #eee;
        }
        

        .stars {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .star {
            position: absolute;
            background: white;
            border-radius: 50%;
            opacity: 0.7;
            box-shadow: 0 0 6px rgba(255, 255, 255, 0.8),
                        0 0 12px rgba(255, 255, 255, 0.5);
            animation: twinkle 3s infinite ease-in-out;
            transition: transform 0.3s ease;
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.2); }
        }

        .clouds {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        /* Setiap awan PNG */
        .cloud {
            position: absolute;
            opacity: 0.8;
            animation: floatClouds 60s linear infinite;
        }

        @keyframes floatClouds {
            from {
                transform: translateX(-200px);
            }
            to {
                transform: translateX(120vw);
            }
        }

        /* Liquid Glass Effect */
        .glass-card {
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .dark-mode .glass-card {
            background: rgba(15, 23, 42, 0.3);
            border-color: rgba(148, 163, 184, 0.2);
        }

        .light-mode .glass-card {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.4);
        }

        .glass-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .dark-mode .glass-card:hover {
            background: rgba(15, 23, 42, 0.4);
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.1);
        }

        .light-mode .glass-card:hover {
            background: rgba(255, 255, 255, 0.35);
            box-shadow: 0 20px 40px rgba(33, 150, 243, 0.2);
        }

        /* Navbar Styles */
        .navbar-custom {
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .dark-mode .navbar-custom {
            background: rgba(15, 23, 42, 0.8);
        }

        .light-mode .navbar-custom {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Sidebar Styles */
        .sidebar {
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .dark-mode .sidebar {
            background: rgba(15, 23, 42, 0.9);
        }

        .light-mode .sidebar {
            background: rgba(255, 255, 255, 0.4);
        }

        .sidebar-nav {
            padding: 20px 0;
        }

        .nav-item {
            margin: 5px 15px;
        }

        .nav-link {
            color: inherit;
            padding: 12px 20px;
            border-radius: 12px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .nav-link:hover {
            background: rgba(59, 130, 246, 0.2);
            transform: translateX(5px);
        }

        .nav-link.active {
            background: rgba(59, 130, 246, 0.3);
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            transition: all 0.3s ease;
        }

        /* Stat Cards */
        .stat-card {
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
        }

        .stat-icon {
            font-size: 2.5rem;
            opacity: 0.8;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            margin: 0;
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.8;
            margin: 0;
        }

        .stat-change {
            font-size: 0.8rem;
            font-weight: 600;
        }

        .text-success { color: #10b981 !important; }
        .text-danger { color: #ef4444 !important; }

        /* Chart Container */
        .chart-container {
            height: 300px;
            padding: 20px;
        }

        /* Theme Toggle Button */
        .theme-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: none;
            backdrop-filter: blur(20px);
            font-size: 1.5rem;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .dark-mode .theme-toggle {
            background: rgba(59, 130, 246, 0.8);
            color: white;
        }

        .light-mode .theme-toggle {
            background: rgba(33, 150, 243, 0.8);
            color: white;
        }

        .theme-toggle:hover {
            transform: scale(1.1);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .mobile-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 999;
                display: none;
            }
            
            .mobile-overlay.show {
                display: block;
            }
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(59, 130, 246, 0.5);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(59, 130, 246, 0.7);
        }

        .info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1rem;
    padding: 1rem;
}

.info-item {
    background: rgba(255,255,255,0.05);
    padding: 0.75rem 1rem;
    border-radius: 0.5rem;
}

.status-badge {
    padding: 0.35rem 0.75rem;
    font-weight: 600;
    border-radius: 1rem;
    display: inline-block;
}

.status-pending { background: #ffe08a; color: #856404; }
.status-disetujui, .status-approved { background: #c3e6cb; color: #155724; }
.status-rejected, .status-ditolak { background: #f5c6cb; color: #721c24; }
.status-sedang_magang { background: #bee5eb; color: #0c5460; }

    </style>
</head>
<body class="dark-mode">
    <!-- Animated Background -->
    <div class="stars" id="stars"></div>
    <div class="clouds" id="cloudsContainer"></div>

    <!-- Mobile Overlay -->
    <div class="mobile-overlay" id="mobileOverlay"></div>

    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <div class="p-4">
            <h4 class="mb-4"><i class="fas fa-gem me-2"></i>Dashboard</h4>
        </div>
        <div class="sidebar-nav">
            <div class="nav-item">
                <a href="#" class="nav-link active">
                    <i class="fas fa-home me-2"></i>Beranda
                </a>
            </div>
            <div class="nav-item">
            @if(isset($completionLevel) && $completionLevel === 'skills-complete')
                        @php
                            $sudahMengajukan = (isset($pengajuanAktif) && $pengajuanAktif) || (isset($undanganPengajuan) && $undanganPengajuan);
                        @endphp

                        @if($sudahMengajukan)
                            <a href="{{ route('pengajuan.index') }}" class="nav-link"><i class="fas fa-chart-bar me-2"></i> Status Pengajuan</a>
                        @endif
                    @endif
            
                {{-- <a href="{{ route('pengajuan.index') }}" class="nav-link">
                    <i class="fas fa-chart-bar me-2"></i>Status Pengajuan
                </a> --}}
            </div>
            <div class="nav-item">
                <a href="{{ route('pengajuan.index') }}" class="nav-link">
                    <i class="fas fa-users me-2"></i>Status Pengajuan
                </a>
            </div>
            {{-- <div class="nav-item">
                <a href="{{ route('notifications.user') }}" class="nav-link">
                    <i class="fas fa-shopping-cart me-2"></i> Notifikasi
                </a>
            </div> --}}
            <div class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-cog me-2"></i>Pengaturan
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('notifications.user') }}" class="nav-link">
                    <i class="fas fa-bell me-2"></i>Notifikasi
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Top Navigation -->
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container-fluid">
                <button class="btn d-md-none" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="navbar-nav ms-auto">
                    <div class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-search"></i></a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-bell"></i></a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-user"></i></a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Dashboard Content -->
        <div class="container-fluid p-4">
            <div class="row mb-4">
                <div class="col-12">
                    <h1 class="mb-0">Sistem monitoring pengajuan magang mahasiswa</h1>
                    <p class="opacity-75">Selamat datang {{ auth()->user()->nama }}.</p>
                </div>
            </div>
            @if(isset($undanganPengajuan) && $undanganPengajuan)
            <div class="notification">
                <h4>Undangan Bergabung Kelompok</h4>
                <p>Anda diundang untuk bergabung dalam kelompok magang dengan kode: <strong>{{ $undanganPengajuan->pengajuan->kode_pengajuan }}</strong> oleh {{ $undanganPengajuan->pengajuan->user->nama }}</p>
                <p><small>{{ $undanganPengajuan->created_at->diffForHumans() }}</small></p>
                
                <div class="text-center mt-2">
                    <form method="POST" action="{{ route('invitation.accept', $undanganPengajuan->id) }}" style="display: inline-block;" onsubmit="handleFormSubmit(this)">
                        @csrf
                        <button type="submit" class="btn btn-success">Terima Undangan</button>
                    </form>
                    <form method="POST" action="{{ route('invitation.reject', $undanganPengajuan->id) }}" style="display: inline-block;" onsubmit="handleFormSubmit(this)">
                        @csrf
                        <button type="submit" class="btn btn-danger">Tolak Undangan</button>
                    </form>
                </div>
            </div>
            @endif

            @php
                $sudahMengajukan = (isset($pengajuanAktif) && $pengajuanAktif) || (isset($undanganPengajuan) && $undanganPengajuan);
            @endphp

            @if(isset($completionLevel))
                <div class="row mb-4 text-theme-default">
                    <div
                        style="backdrop-filter: blur(10px); background-color: rgba(43, 255, 0, 0.13); border-radius: 10px; padding: 20px; border: 1px solid rgba(43, 255, 0, 0.24); box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);"
                    >
                        @if ($completionLevel === 'incomplete')
                            <strong>Lengkapi Profil Anda</strong>
                            <p>Silakan lengkapi profil universitas dan data pribadi Anda untuk melanjutkan proses pengajuan magang.</p>
                            <small>Pastikan field berikut sudah diisi: Universitas, Telepon, dan NIM</small>
                        @elseif ($completionLevel === 'profile-complete')
                            <strong>Tambahkan Keahlian Anda</strong>
                            <p>Profil dasar sudah lengkap. Sekarang tambahkan keahlian Anda untuk melengkapi profil.</p>
                        @elseif ($completionLevel === 'skills-complete')
                            @if($sudahMengajukan)
                                <strong>Status Pengajuan</strong>
                                <p>Anda sudah mengajukan magang</p>
                            @else
                                <strong>Profil Lengkap</strong>
                                <p>Profil dan keahlian Anda sudah lengkap. Anda dapat melanjutkan ke pengajuan magang.</p>
                                <a href="{{ route('pengajuan.index') }}" class="btn btn-sm btn-success mt-2">
                                    <i class="fas fa-paper-plane me-1"></i> Ajukan Magang
                                </a>
                            @endif
                        @endif
                    </div>
                </div>
            @endif

           <div class="row mb-4 glass-card text-theme-default">
                <div class="col-xl-8 mb-4">
                <div class="p-4 d-flex flex-column flex-md-row gap-4 align-items-center align-items-md-start">
                    <div class="flex-shrink-0 text-center" style="border-radius: 10px;">
                        @if (auth()->user()->foto)
                            <img src="{{ asset('storage/' . auth()->user()->foto) }}" alt="Foto Profil" width="180" class="rounded shadow img-fluid">
                        @else
                            <div class="rounded-circle bg-secondary text-white d-flex justify-content-center align-items-center mx-auto" style="width: 180px; height: 180px; font-size: 48px;">
                                {{ strtoupper(substr(auth()->user()->nama, 0, 2)) }}
                            </div>
                        @endif
                    </div>

                    <div class="flex-grow-1 text-center text-md-start mt-3 mt-md-0">
                        <div class="mb-2">
                            <span class="info-label" style="font-weight: 600; color: #555;">Nama:</span>
                            <span class="info-value" style="margin-left: 8px;">{{ auth()->user()->nama }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="info-label" style="font-weight: 600; color: #555;">Email:</span>
                            <span class="info-value" style="margin-left: 8px;">{{ auth()->user()->email }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="info-label" style="font-weight: 600; color: #555;">Telepon:</span>
                            <span class="info-value" style="margin-left: 8px;">{{ auth()->user()->telepon ?? '-' }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="info-label" style="font-weight: 600; color: #555;">NIM:</span>
                            <span class="info-value" style="margin-left: 8px;">{{ auth()->user()->nim ?? '-' }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="info-label" style="font-weight: 600; color: #555;">Universitas:</span>
                            <span class="info-value" style="margin-left: 8px;">{{ auth()->user()->universitas->nama_universitas ?? '-' }}</span>
                        </div>
                        <div class="mb-3">
                            <span class="info-label" style="font-weight: 600; color: #555;">Program Studi:</span>
                            <span class="info-value" style="margin-left: 8px;">{{ auth()->user()->universitas->prodi ?? '-' }}</span>
                        </div>

                        <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary">Edit Profil</a>
                    </div>
                </div>
            </div>


            <div class="col-xl-4">
                <div class="glass-card p-4 text-theme-default">
                    <h4 class="mb-3">Keahlian</h4>

                    @if(auth()->user()->userSkills->isNotEmpty())
                        <div class="d-flex flex-column gap-3">
                            @foreach(auth()->user()->userSkills as $userSkill)
                                <div class="p-2 border rounded">
                                    <div class="fw-semibold">{{ $userSkill->skill->nama ?? 'Skill tidak ditemukan' }}</div>
                                    <div class="small text-theme-default">Level: <strong>{{ ucfirst($userSkill->level) }}</strong></div>
                                    @if ($userSkill->sertifikat_path)
                                        <div class="mt-1">
                                            <a href="{{ asset('storage/' . $userSkill->sertifikat_path) }}" target="_blank" class="btn btn-sm btn-secondary">Lihat Sertifikat</a>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-3 text-end">
                            <a href="{{ route('skills.edit') }}" class="btn btn-outline-primary">Edit Keahlian</a>
                        </div>
                    @else
                        <div class="text-center">
                            <p class="text-muted mb-2">Belum ada keahlian yang ditambahkan.</p>
                            <a href="{{ route('skills.edit') }}" class="btn btn-primary">Tambahkan Keahlian</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>


            @php
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

            {{-- Kartu Pengajuan Aktif --}}
            @if($displayPengajuan)
            <div class="card mb-4 glass-card text-theme-default">
                <div class="card-header">
                    <h4>{{ $isAnggota ? 'Status Kelompok Magang' : 'Pengajuan Magang Aktif' }}</h4>
                </div>

                @if($isAnggota)
                <div class="alert alert-success">
                    <strong>Anda adalah anggota kelompok magang ini</strong><br>
                    <small>Ketua: {{ $displayPengajuan->user->nama }}</small>
                </div>
                @endif

                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">Kode Pengajuan</span>
                        <span class="info-value">{{ $displayPengajuan->kode_pengajuan }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Status</span>
                        <span class="status-badge status-{{ $displayPengajuan->status }}">
                            {{ $statusLabels[$displayPengajuan->status] ?? ucfirst($displayPengajuan->status) }}
                        </span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Bidang</span>
                        <span class="info-value">{{ $displayPengajuan->databidang->nama ?? '-' }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Tanggal Pengajuan</span>
                        <span class="info-value">{{ $displayPengajuan->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Periode Magang</span>
                        <span class="info-value">
                            {{ optional($displayPengajuan->tanggal_mulai)->format('d M Y') ?? '-' }} -
                            {{ optional($displayPengajuan->tanggal_selesai)->format('d M Y') ?? '-' }}
                        </span>
                    </div>
                </div>

                @if($displayPengajuan->komentar_admin)
                <div class="alert alert-info mt-3">
                    <strong>Komentar Admin:</strong><br>
                    {{ $displayPengajuan->komentar_admin }}
                </div>
                @endif

                @if($displayPengajuan->anggota->count() > 0)
                <div class="mt-4">
                    <h5>Anggota Kelompok</h5>
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label">Ketua</span>
                            <span class="info-value">{{ $displayPengajuan->user->nama }}</span>
                        </div>
                        @foreach($displayPengajuan->anggota->where('status', 'accepted') as $anggota)
                        <div class="info-item">
                            <span class="info-label">Anggota</span>
                            <span class="info-value">{{ $anggota->user->nama }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            @endif

            {{-- Kartu Undangan --}}
            @if(isset($undanganPengajuan) && $undanganPengajuan)
            <div class="card mb-4 glass-card text-theme-default" >
                <div class="card-header">
                    <h4>Tindakan yang Diperlukan</h4>
                </div>
                <div class="card-body text-center">
                    <p class="mb-3">Anda memiliki undangan untuk bergabung dalam kelompok magang. Silakan terima atau tolak undangan tersebut.</p>
                    <form method="POST" action="{{ route('invitation.accept', $undanganPengajuan->id) }}" class="d-inline" onsubmit="handleFormSubmit(this)">
                        @csrf
                        <button type="submit" class="btn btn-success me-2">Terima Undangan</button>
                    </form>
                    <form method="POST" action="{{ route('invitation.reject', $undanganPengajuan->id) }}" class="d-inline" onsubmit="handleFormSubmit(this)">
                        @csrf
                        <button type="submit" class="btn btn-danger">Tolak Undangan</button>
                    </form>
                </div>
            </div>
            @elseif(!$pengajuanAktif && !$keanggotaanAktif)
            {{-- Belum ada pengajuan atau undangan --}}
            <div class="card mb-4 glass-card text-theme-default">
                <div class="card-header">
                    <h4>{{ ($completionLevel === 'skills-complete') ? 'Siap untuk Mengajukan Magang' : 'Lengkapi Profil Terlebih Dahulu' }}</h4>
                </div>
                <div class="card-body text-center">
                    @if($completionLevel === 'skills-complete')
                        <p class="mb-3">Profil Anda sudah lengkap. Klik tombol di bawah untuk memulai pengajuan magang.</p>
                        <a href="{{ route('pengajuan.tipe') }}" class="btn btn-primary">Ajukan Magang Sekarang</a>
                    @else
                        <p class="mb-3">
                            @if($completionLevel === 'incomplete')
                                Lengkapi data universitas dan profil Anda terlebih dahulu.
                            @else
                                Tambahkan keahlian Anda untuk melengkapi profil.
                            @endif
                        </p>
                        @if($completionLevel === 'incomplete')
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Lengkapi Profil</a>
                        @else
                            <a href="{{ route('skills.edit') }}" class="btn btn-primary">Tambah Keahlian</a>
                        @endif
                    @endif
                </div>
            </div>
            @endif

            {{-- Kartu Ringkasan --}}
            <div class="card glass-card text-theme-default">
                <div class="card-header">
                    <h4>Ringkasan Status</h4>
                </div>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">Status Saat Ini</span>
                        @if($displayPengajuan)
                            <span class="status-badge status-{{ $displayPengajuan->status }}">
                                {{ ucfirst(str_replace('_', ' ', $displayPengajuan->status)) }}
                            </span>
                            @if($isAnggota)
                                <br><small class="text-muted">Anda adalah anggota dalam kelompok ini</small>
                            @endif
                        @elseif($undanganPengajuan ?? false)
                            <span class="status-badge status-pending">Menunggu Respon Undangan</span>
                        @else
                            @switch($completionLevel)
                                @case('incomplete')
                                    <span class="status-badge status-rejected">Profil Belum Lengkap</span>
                                    @break
                                @case('profile-complete')
                                    <span class="status-badge status-pending">Perlu Tambah Keahlian</span>
                                    @break
                                @default
                                    <span class="status-badge status-approved">Profil Lengkap</span>
                            @endswitch
                        @endif
                    </div>
                    <div class="info-item">
                        <span class="info-label">Deskripsi Status</span>
                        <span class="info-value">
                            @if($displayPengajuan)
                                {{ $statusLabels[$displayPengajuan->status] ?? 'Status tidak diketahui' }}
                            @elseif($undanganPengajuan ?? false)
                                Anda memiliki undangan untuk bergabung dalam kelompok magang
                            @else
                                @switch($completionLevel)
                                    @case('incomplete')
                                        Profil universitas belum lengkap
                                        @break
                                    @case('profile-complete')
                                        Profil lengkap, tambahkan keahlian
                                        @break
                                    @default
                                        Siap untuk pengajuan magang
                                @endswitch
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <button class="theme-toggle" id="themeToggle">
        <i class="fas fa-moon" id="themeIcon"></i>
    </button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script>
        const themeToggle = document.getElementById('themeToggle');
        const themeIcon = document.getElementById('themeIcon');
        const body = document.body;
        const starsContainer = document.getElementById('stars');
        // const cloudsContainer = document.getElementById('clouds');
        const cloudsContainer = document.getElementById('cloudsContainer');

        let isDarkMode = true;

        function generateStars() {
            starsContainer.innerHTML = '';
            const totalStars = 100; 

            for (let i = 0; i < totalStars; i++) {
                const star = document.createElement('div');
                star.className = 'star';

                const size = Math.random() * 2 + 1; // ukuran antara 1px - 3px
                const top = Math.random() * 100;
                const left = Math.random() * 100;

                star.style.width = `${size}px`;
                star.style.height = `${size}px`;
                star.style.top = `${top}%`;
                star.style.left = `${left}%`;
                star.style.animationDelay = `${Math.random() * 5}s`;

                starsContainer.appendChild(star);
            }
        }

        function generateClouds() {
        if (document.body.classList.contains('dark-mode')) {
            cloudsContainer.innerHTML = '';
            return;
        }

        cloudsContainer.innerHTML = '';

        const cloudImages = [
            '/img/awan.png',
        ];

        const numClouds = 12;

        for (let i = 0; i < numClouds; i++) {
            const cloud = document.createElement('img');
            const randomImage = cloudImages[Math.floor(Math.random() * cloudImages.length)];

            const scale = Math.random() * 0.6 + 0.4;
            const duration = Math.random() * 40 + 30;
            const delay = Math.random() * 40;
            const top = Math.random() * 90;

            cloud.src = randomImage;
            cloud.className = 'cloud';
            cloud.style.top = `${top}%`;
            cloud.style.left = `-${Math.random() * 400 + 200}px`;
            cloud.style.width = `${scale * 500}px`;
            cloud.style.animationDuration = `${duration}s`;
            cloud.style.animationDelay = `${delay}s`;
            cloud.style.zIndex = Math.floor(scale * 10);
            cloud.style.opacity = 0.4 + scale * 0.6;

            cloudsContainer.appendChild(cloud);
        }
    }

    const toggleTheme = document.querySelector('.theme-toggle');
    toggleTheme.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        document.body.classList.toggle('light-mode');
        generateClouds();
    });


        generateStars();
        generateClouds();

        themeToggle.addEventListener('click', () => {
            isDarkMode = !isDarkMode;
            
            if (isDarkMode) {
                body.className = 'dark-mode';
                themeIcon.className = 'fas fa-moon';
                starsContainer.style.display = 'block';
                cloudsContainer.style.display = 'none';
            } else {
                body.className = 'light-mode';
                themeIcon.className = 'fas fa-sun';
                starsContainer.style.display = 'none';
                cloudsContainer.style.display = 'block';
            }
        });

        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const mobileOverlay = document.getElementById('mobileOverlay');

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('show');
            mobileOverlay.classList.toggle('show');
        });

        mobileOverlay.addEventListener('click', () => {
            sidebar.classList.remove('show');
            mobileOverlay.classList.remove('show');
        });
    
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', (e) => {
                document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                e.target.classList.add('active');
            });
        });

        const cards = document.querySelectorAll('.glass-card');
        cards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
        });
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                sidebar.classList.remove('show');
                mobileOverlay.classList.remove('show');
            }
        });
    </script>
</body>
</html>