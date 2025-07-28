<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Magang - Mahasiswa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 280px;
            background-color: #ffffff;
            border-right: 1px solid #e9ecef;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        .sidebar.collapsed {
            transform: translateX(-100%);
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid #e9ecef;
        }

        .sidebar-header h2 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #2c3e50;
        }

        .sidebar-header p {
            font-size: 0.875rem;
            color: #6c757d;
            margin-top: 0.25rem;
        }

        .sidebar-nav {
            padding: 1rem 0;
        }

        .nav-item {
            padding: 0.75rem 1.5rem;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .nav-item:hover {
            background-color: #f8f9fa;
        }

        .nav-item.active {
            background-color: #e3f2fd;
            border-right: 3px solid #2196F3;
        }

        .nav-item a {
            text-decoration: none;
            color: #495057;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .nav-item.active a {
            color: #2196F3;
        }

        .sidebar-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 1rem;
            border-top: 1px solid #e9ecef;
        }

        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 2rem;
            transition: margin-left 0.3s ease;
        }

        .main-content.full-width {
            margin-left: 0;
        }

        .mobile-header {
            display: none;
            background-color: #ffffff;
            border-bottom: 1px solid #e9ecef;
            padding: 1rem;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1001;
        }

        .mobile-toggle {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #495057;
        }

        .content-header {
            margin-bottom: 2rem;
        }

        .content-header h1 {
            font-size: 2rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .content-header p {
            color: #6c757d;
            font-size: 1rem;
        }

        .card {
            background-color: #ffffff;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .card-header {
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e9ecef;
        }

        .card-header h3 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #2c3e50;
        }

        .alert {
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 6px;
            border: 1px solid;
        }

        .alert-warning {
            background-color: #fff3cd;
            border-color: #ffeaa7;
            color: #856404;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .alert-info {
            background-color: #d1ecf1;
            border-color: #bee5eb;
            color: #0c5460;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
        }

        .info-item {
            background-color: #f8f9fa;
            padding: 1rem;
            border-radius: 6px;
            border: 1px solid #e9ecef;
        }

        .info-label {
            font-weight: 600;
            color: #495057;
            display: block;
            margin-bottom: 0.25rem;
            font-size: 0.875rem;
        }

        .info-value {
            color: #2c3e50;
            font-size: 0.9rem;
        }

        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            margin: 0.25rem;
            text-decoration: none;
            border-radius: 6px;
            border: 1px solid;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 500;
            text-align: center;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            color: #ffffff;
        }

        .btn-success:hover {
            background-color: #1e7e34;
            border-color: #1e7e34;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #ffffff;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            color: #ffffff;
        }

        .btn-secondary:hover {
            background-color: #545b62;
            border-color: #545b62;
        }

        .btn-outline {
            background-color: transparent;
            color: #007bff;
            border-color: #007bff;
        }

        .btn-outline:hover {
            background-color: #007bff;
            color: #ffffff;
        }

        .status-badge {
            display: inline-block;
            padding: 0.375rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-pending {
            background-color: #ffeaa7;
            color: #856404;
        }

        .status-approved {
            background-color: #d4edda;
            color: #155724;
        }

        .status-rejected {
            background-color: #f8d7da;
            color: #721c24;
        }

        .status-diproses {
            background-color: #d1ecf1;
            color: #0c5460;
        }

        .status-diteruskan {
            background-color: #e2e3e5;
            color: #383d41;
        }

        .status-disetujui_bidang {
            background-color: #cce5ff;
            color: #004085;
        }

        .status-disetujui {
            background-color: #d4edda;
            color: #155724;
        }

        .status-sedang_magang {
            background-color: #ffeaa7;
            color: #856404;
        }

        .status-selesai {
            background-color: #d4edda;
            color: #155724;
        }

        .profile-photo {
            width: 151.2px;
            height: 151.2px;
            /* border-radius: 50%; */
            overflow: hidden;
            margin: 0 auto 1rem;
            border: 3px solid #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            font-size: 2rem;
            font-weight: 600;
            color: #6c757d;
        }

        .profile-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .notification {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 6px;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }

        .notification h4 {
            color: #856404;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .notification p {
            color: #856404;
            margin-bottom: 0.5rem;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .mt-1 { margin-top: 0.5rem; }
        .mt-2 { margin-top: 1rem; }
        .mt-3 { margin-top: 1.5rem; }
        .mb-1 { margin-bottom: 0.5rem; }
        .mb-2 { margin-bottom: 1rem; }
        .mb-3 { margin-bottom: 1.5rem; }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 999;
        }

        .overlay.active {
            display: block;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                padding: 1rem;
                margin-top: 60px;
            }

            .mobile-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .btn {
                width: 100%;
                margin: 0.25rem 0;
            }

            .content-header h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="mobile-header">
            <button class="mobile-toggle" onclick="toggleSidebar()">☰</button>
            <h2>Dashboard Magang</h2>
            <div></div>
        </div>

        <div class="overlay" id="overlay" onclick="toggleSidebar()"></div>

        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h2>Dashboard Magang</h2>
                <p>Sistem Monitoring Pengajuan Magang</p>
            </div>
            
            <div class="sidebar-nav">
                <div class="nav-item active">
                    <a href="#">Dashboard</a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('profile.edit') }}">Edit Profil</a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('skills.edit') }}">Kelola Keahlian</a>
                </div>
                <div class="nav-item">
                    @if(isset($completionLevel) && $completionLevel === 'skills-complete')
                        @php
                            $sudahMengajukan = (isset($pengajuanAktif) && $pengajuanAktif) || (isset($undanganPengajuan) && $undanganPengajuan);
                        @endphp

                        @if($sudahMengajukan)
                            <a 
                                href="#"
                                onclick="return false;"
                                style="color: #aaa; pointer-events: none; cursor: not-allowed; text-decoration: none;"
                                title="Anda sudah mengajukan magang"
                            >
                                Ajukan Magang
                            </a>
                        @else
                            <a href="{{ route('pengajuan.tipe') }}">Ajukan Magang</a>
                        @endif
                    @endif
                </div>

                <div class="nav-item">
                    <a href="{{ route('pengajuan.index') }}">Status Pengajuan</a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('notifications.user') }}">Notifikasi</a>
                </div>
            </div>

            <div class="sidebar-footer">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger" style="width: 100%;">Logout</button>
                </form>
            </div>
        </div>

        <div class="main-content" id="mainContent">
            <div class="content-header">
                <h1>Dashboard</h1>
                <p>Selamat datang di sistem monitoring pengajuan magang mahasiswa</p>
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

            <div class="alert {{ isset($completionLevel) && $completionLevel === 'incomplete' ? 'alert-warning' : (isset($completionLevel) && $completionLevel === 'profile-complete' ? 'alert-info' : 'alert-success') }}">
                @if (isset($completionLevel) && $completionLevel === 'incomplete')
                    <strong>Lengkapi Profil Anda</strong>
                    <p>Silakan lengkapi profil universitas dan data pribadi Anda untuk melanjutkan proses pengajuan magang.</p>
                    <small>Pastikan field berikut sudah diisi: Universitas, Telepon, dan NIM</small>
                @elseif (isset($completionLevel) && $completionLevel === 'profile-complete')
                    <strong>Tambahkan Keahlian Anda</strong>
                    <p>Profil dasar sudah lengkap. Sekarang tambahkan keahlian Anda untuk melengkapi profil.</p>
                @else
                    <strong>Profil Lengkap</strong>
                    <p>Profil dan keahlian Anda sudah lengkap. Anda dapat melanjutkan ke pengajuan magang.</p>
                @endif
            </div>

            <div class="grid">
                <div class="card">
                    <div class="card-header">
                        <h3>Informasi Profil</h3>
                    </div>
                    
                    <div class="text-center mb-3">
                        <div class="profile-photo">
                            @if (auth()->user()->foto)
                                <img src="{{ asset('storage/' . auth()->user()->foto) }}" alt="Foto Profil">
                            @else
                                {{ strtoupper(substr(auth()->user()->nama, 0, 2)) }}
                            @endif
                        </div>
                    </div>
                    
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label">Nama</span>
                            <span class="info-value">{{ auth()->user()->nama }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Email</span>
                            <span class="info-value">{{ auth()->user()->email }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Telepon</span>
                            <span class="info-value">{{ auth()->user()->telepon ?? '-' }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">NIM</span>
                            <span class="info-value">{{ auth()->user()->nim ?? '-' }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Universitas</span>
                            <span class="info-value">{{ auth()->user()->universitas->nama_universitas ?? '-' }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Program Studi</span>
                            <span class="info-value">{{ auth()->user()->universitas->prodi ?? '-' }}</span>
                        </div>
                    </div>
                    
                    <div class="text-right mt-3">
                        <a href="{{ route('profile.edit') }}" class="btn btn-outline">Edit Profil</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3>Keahlian</h3>
                    </div>
                    
                    @if(auth()->user()->userSkills->isNotEmpty())
                        <div class="info-grid">
                            @foreach(auth()->user()->userSkills as $userSkill)
                                <div class="info-item">
                                    <span class="info-label">{{ $userSkill->skill->nama ?? 'Skill tidak ditemukan' }}</span>
                                    <span class="info-value">Level: <strong>{{ ucfirst($userSkill->level) }}</strong></span>
                                    @if ($userSkill->sertifikat_path)
                                        <div class="mt-1">
                                            <a href="{{ asset('storage/' . $userSkill->sertifikat_path) }}" target="_blank" class="btn btn-secondary" style="font-size: 0.75rem; padding: 0.25rem 0.5rem;">Lihat Sertifikat</a>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <div class="text-right mt-3">
                            <a href="{{ route('skills.edit') }}" class="btn btn-outline">Edit Keahlian</a>
                        </div>
                    @else
                        <div class="text-center">
                            <p style="color: #6c757d; margin-bottom: 1rem;">Belum ada keahlian yang ditambahkan</p>
                            <a href="{{ route('skills.edit') }}" class="btn btn-primary">Tambahkan Keahlian</a>
                        </div>
                    @endif
                </div>
            </div>

            @php
                // Cek apakah user adalah anggota dari pengajuan yang sudah diterima
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

            @if($displayPengajuan)
            <div class="card">
                <div class="card-header">
                    <h3>{{ $isAnggota ? 'Status Kelompok Magang' : 'Pengajuan Magang Aktif' }}</h3>
                </div>
                
                @if($isAnggota)
                <div class="alert alert-success mb-3">
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
                            {{ $displayPengajuan->tanggal_mulai ? $displayPengajuan->tanggal_mulai->format('d M Y') : '-' }} - 
                            {{ $displayPengajuan->tanggal_selesai ? $displayPengajuan->tanggal_selesai->format('d M Y') : '-' }}
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
                <div class="mt-3">
                    <h4 class="mb-2">Anggota Kelompok</h4>
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

            @if(isset($undanganPengajuan) && $undanganPengajuan)
            <div class="card">
                <div class="card-header">
                    <h3>Tindakan yang Diperlukan</h3>
                </div>
                <div class="text-center">
                    <p class="mb-3">Anda memiliki undangan untuk bergabung dalam kelompok magang. Silakan terima atau tolak undangan tersebut.</p>
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
            @elseif((!isset($pengajuanAktif) || !$pengajuanAktif) && (!isset($keanggotaanAktif) || !$keanggotaanAktif))
            <div class="card">
                <div class="card-header">
                    <h3>{{ (isset($completionLevel) && $completionLevel === 'skills-complete') ? 'Siap untuk Mengajukan Magang' : 'Lengkapi Profil Terlebih Dahulu' }}</h3>
                </div>
                <div class="text-center">
                    @if(isset($completionLevel) && $completionLevel === 'skills-complete')
                        <p class="mb-3">Profil Anda sudah lengkap. Klik tombol di bawah untuk memulai pengajuan magang.</p>
                        <a href="{{ route('pengajuan.tipe') }}" class="btn btn-primary">Ajukan Magang Sekarang</a>
                    @else
                        <p class="mb-3">
                            @if(isset($completionLevel) && $completionLevel === 'incomplete')
                                Lengkapi data universitas dan profil Anda terlebih dahulu.
                            @else
                                Tambahkan keahlian Anda untuk melengkapi profil.
                            @endif
                        </p>
                        @if(isset($completionLevel) && $completionLevel === 'incomplete')
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Lengkapi Profil</a>
                        @else
                            <a href="{{ route('skills.edit') }}" class="btn btn-primary">Tambah Keahlian</a>
                        @endif
                    @endif
                </div>
            </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>Ringkasan Status</h3>
                </div>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">Status Saat Ini</span>
                        @if($displayPengajuan)
                            <span class="status-badge status-{{ $displayPengajuan->status }}">
                                {{ ucfirst(str_replace('_', ' ', $displayPengajuan->status)) }}
                            </span>
                            @if($isAnggota)
                                <br><small style="color: #6c757d; margin-top: 0.5rem; display: block;">Anda adalah anggota dalam kelompok ini</small>
                            @endif
                        @elseif($undanganPengajuan ?? false)
                            <span class="status-badge status-pending">Menunggu Respon Undangan</span>
                        @else
                            @if (isset($completionLevel) && $completionLevel === 'incomplete')
                                <span class="status-badge status-rejected">Profil Belum Lengkap</span>
                            @elseif (isset($completionLevel) && $completionLevel === 'profile-complete')
                                <span class="status-badge status-pending">Perlu Tambah Keahlian</span>
                            @else
                                <span class="status-badge status-approved">Profil Lengkap</span>
                            @endif
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
                                @if (isset($completionLevel) && $completionLevel === 'incomplete')
                                    Profil universitas belum lengkap
                                @elseif (isset($completionLevel) && $completionLevel === 'profile-complete')
                                    Profil lengkap, tambahkan keahlian
                                @else
                                    Siap untuk pengajuan magang
                                @endif
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const overlay = document.getElementById('overlay');
            
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
            
            if (window.innerWidth <= 768) {
                if (sidebar.classList.contains('active')) {
                    document.body.style.overflow = 'hidden';
                } else {
                    document.body.style.overflow = 'auto';
                }
            }
        }

        function handleFormSubmit(form) {
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.disabled = true;
                const originalText = submitBtn.textContent;
                submitBtn.textContent = 'Processing...';
                
                setTimeout(() => {
                    if (submitBtn.disabled) {
                        submitBtn.disabled = false;
                        submitBtn.textContent = originalText;
                    }
                }, 10000);
            }
            return true;
        }

        window.addEventListener('resize', function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            
            if (window.innerWidth > 768) {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        });

        @if(session('success'))
            alert('{{ session('success') }}');
        @endif

        @if(session('error'))
            alert('{{ session('error') }}');
        @endif
    </script>
</body>
</html>