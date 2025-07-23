@extends('layouts.adminbidang')

@section('content')
    <style>
        :root {
            --primary-color: #1e3a8a; /* Biru Kominfo */
            --secondary-color: #000000; /* Hitam */
            --accent-color: #3b82f6;
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --gradient-1: linear-gradient(135deg, #1e3a8a, #3b82f6);
            --gradient-2: linear-gradient(135deg, #7A7A7AFF, #1F50A0FF);
            --gradient-3: linear-gradient(135deg, #059669, #10b981);
            --gradient-4: linear-gradient(135deg, #dc2626, #ef4444);
            --gradient-5: linear-gradient(135deg, #7c3aed, #a855f7);
            --gradient-6: linear-gradient(135deg, #ea580c, #f97316);
        }

        body {
            min-height: 100vh;
            overflow-x: hidden;
        }
        
        .main-content {
            padding: 0;
            background: transparent;
            position: relative;
        }

        .main-content::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 25% 25%, rgba(30, 58, 138, 0.4) 0%, transparent 50%),
                radial-gradient(circle at 75% 30%, rgba(59, 130, 246, 0.3) 0%, transparent 60%),
                radial-gradient(circle at 80% 80%, rgba(30, 58, 138, 0.2) 0%, transparent 70%),
                radial-gradient(circle at 20% 70%, rgba(147, 197, 253, 0.15) 0%, transparent 50%);
            pointer-events: none;
            z-index: -2;
            animation: floatingLights 20s ease-in-out infinite;
        }

        .main-content::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 60% 10%, rgba(59, 130, 246, 0.1) 0%, transparent 40%),
                radial-gradient(circle at 10% 60%, rgba(30, 58, 138, 0.15) 0%, transparent 45%);
            pointer-events: none;
            z-index: -1;
            animation: floatingLights 25s ease-in-out infinite reverse;
        }

        @keyframes floatingLights {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
                opacity: 1;
            }
            33% {
                transform: translate(30px, -30px) rotate(120deg);
                opacity: 0.8;
            }
            66% {
                transform: translate(-20px, 20px) rotate(240deg);
                opacity: 0.9;
            }
        }

        .content-wrapper {
            padding: 2rem;
            position: relative;
            z-index: 1;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 24px;
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.3),
                0 2px 16px rgba(255, 255, 255, 0.05) inset,
                0 0 0 1px rgba(255, 255, 255, 0.05) inset;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .glass-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.12);
            border-color: rgba(255, 255, 255, 0.25);
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.4),
                0 4px 16px rgba(255, 255, 255, 0.1) inset,
                0 0 0 1px rgba(255, 255, 255, 0.1) inset;
        }

        .stats-card {
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            padding: 2rem;
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.3),
                0 2px 8px rgba(255, 255, 255, 0.05) inset;
        }

        .stats-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--card-gradient, var(--gradient-1));
            opacity: 0.1;
            transition: opacity 0.4s ease;
            z-index: 1;
        }

        .stats-card:hover::before {
            opacity: 0.2;
        }

        .stats-card:hover {
            transform: translateY(-8px) scale(1.02);
            background: rgba(255, 255, 255, 0.12);
            border-color: rgba(255, 255, 255, 0.25);
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.4),
                0 8px 32px rgba(255, 255, 255, 0.08) inset,
                0 0 0 1px rgba(255, 255, 255, 0.1) inset;
        }

        .stats-card .stats-content {
            position: relative;
            z-index: 2;
        }

        .stats-card.card-1 { --card-gradient: var(--gradient-1); }
        .stats-card.card-2 { --card-gradient: var(--gradient-2); }
        .stats-card.card-3 { --card-gradient: var(--gradient-3); }
        .stats-card.card-4 { --card-gradient: var(--gradient-4); }
        .stats-card.card-5 { --card-gradient: var(--gradient-5); }
        .stats-card.card-6 { --card-gradient: var(--gradient-6); }

        .stats-value {
            font-size: 2.5rem;
            font-weight: 800;
            background: var(--card-gradient, var(--gradient-1));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
            transition: all 0.3s ease;
        }

        .stats-card:hover .stats-value {
            transform: scale(1.1);
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.4));
        }

        .stats-label {
            color: rgba(255, 255, 255, 0.8);
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stats-icon {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            font-size: 1.5rem;
            color: rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
            z-index: 2;
        }

        .stats-card:hover .stats-icon {
            color: rgba(255, 255, 255, 0.6);
            transform: scale(1.2) rotate(10deg);
        }

        .info-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 24px;
            padding: 2rem;
            position: relative;
            overflow: hidden;
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.3),
                0 2px 8px rgba(255, 255, 255, 0.05) inset;
        }

        .info-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--gradient-1);
            border-radius: 20px 20px 0 0;
        }

        .info-label {
            
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.7);
            font-weight: 600;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 700;
        }

        .info-value {
            
            color: rgba(255, 255, 255, 0.95);
            font-size: 0.85rem;
        }

        .card {
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.3),
                0 2px 8px rgba(255, 255, 255, 0.05) inset;
            overflow: hidden;
        }

        .card-header {
            background: rgba(255, 255, 255, 0.05);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1.5rem;
            font-weight: 700;
            color: rgba(255, 255, 255, 0.95);
            position: relative;
        }

        .card-header::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--gradient-1);
        }

        .table {
            background: transparent;
            color: rgba(255, 255, 255, 0.9);
        }

        .table-hover tbody tr:hover {
            background: rgba(30, 58, 138, 0.2);
        }

        .table thead th {
            background: rgba(255, 255, 255, 0.05);
            border: none;
            color: rgba(255, 255, 255, 0.95);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.85rem;
        }

        .table tbody td {
            border-color: rgba(255, 255, 255, 0.08);
            vertical-align: middle;
            color: rgba(255, 255, 255, 0.85);
        }

        .table tbody td.fw-semibold {
            color: rgba(255, 255, 255, 0.95);
        }

        .btn-primary {
            background: var(--gradient-1);
            border: none;
            border-radius: 12px;
            padding: 0.5rem 1.2rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 16px rgba(30, 58, 138, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 32px rgba(30, 58, 138, 0.4);
            background: var(--gradient-2);
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            border-radius: 12px;
            padding: 0.4rem 1rem;
            font-weight: 600;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background: var(--primary-color);
            color: black;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(30, 58, 138, 0.3);
        }

        .badge {
            border-radius: 12px;
            font-weight: 600;
            padding: 0.5rem 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge.pending {
            background: linear-gradient(135deg, #f59e0b, #fbbf24);
            color: white;
        }

        .badge.diterima {
            background: linear-gradient(135deg, #10b981, #34d399);
            color: white;
        }

        .badge.ditolak {
            background: linear-gradient(135deg, #ef4444, #f87171);
            color: white;
        }

        .badge.bg-secondary {
            background: var(--gradient-2) !important;
            color: white;
        }

        .alert {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 193, 7, 0.3);
            border-radius: 20px;
            color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .btn-group .btn {
            margin: 0 0.2rem;
        }

        .table-responsive {
            border-radius: 0 0 24px 24px;
        }

        .empty-state {
            padding: 4rem 2rem;
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
        }

        .empty-state i {
            opacity: 0.4;
            margin-bottom: 1rem;
            color: rgba(255, 255, 255, 0.3);
        }

        .empty-state h6 {
            color: rgba(255, 255, 255, 0.8);
        }

        .empty-state .text-muted {
            color: rgba(255, 255, 255, 0.5) !important;
        }

        /* Animasi loading untuk stats cards */
        .stats-card {
            animation: fadeInUp 0.6s ease-out;
        }

        .stats-card:nth-child(1) { animation-delay: 0.1s; }
        .stats-card:nth-child(2) { animation-delay: 0.2s; }
        .stats-card:nth-child(3) { animation-delay: 0.3s; }
        .stats-card:nth-child(4) { animation-delay: 0.4s; }
        .stats-card:nth-child(5) { animation-delay: 0.5s; }
        .stats-card:nth-child(6) { animation-delay: 0.6s; }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
            }
            
            .content-wrapper {
                padding: 1rem;
            }
            
            .stats-card {
                padding: 1.5rem;
            }
            
            .stats-value {
                font-size: 2rem;
            }
            
            .mobile-toggle {
                display: block !important;
            }
        }

        .mobile-toggle {
            display: none;
        }

        /* Scrollbar styling */
        .table-responsive::-webkit-scrollbar {
            height: 6px;
        }

        .table-responsive::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 3px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: var(--gradient-1);
            border-radius: 3px;
        }

        /* Global scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--gradient-1);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--gradient-2);
        }
    </style>
    <div class="main-content">
        <div class="content-wrapper">
            @if(!$bidang)
            <div class="alert alert-warning glass-card">
                <i class="fas fa-exclamation-triangle me-2"></i>
                Anda belum ditugaskan ke bidang manapun. Silakan hubungi Super Admin untuk informasi lebih lanjut.
            </div>
            @else
            
            <!-- Bidang Information -->
            <div class="info-card mb-4">
                <h1 class="mb-4 text-white "><i class="fas fa-info-circle " style="color: var(--primary-color); font-weight: 600;"></i>INFORMASI BIDANG</h1>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="info-label">Nama Bidang</div>
                            <div class="info-value">{{ $bidang->nama }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="info-label">Deskripsi</div>
                            <div class="info-value">{{ $bidang->deskripsi ?? 'Tidak ada deskripsi' }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics -->
            <div class="row g-4 mb-5">
                <div class="col-md-4 col-lg-2">
                    <div class="stats-card card-1">
                        <i class="fas fa-clipboard-list stats-icon"></i>
                        <div class="stats-content">
                            <div class="stats-value">{{ $totalPengajuan }}</div>
                            <div class="stats-label">Total Pengajuan</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="stats-card card-2">
                        <i class="fas fa-clock stats-icon"></i>
                        <div class="stats-content">
                            <div class="stats-value">{{ $pengajuanPending }}</div>
                            <div class="stats-label">Pending</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="stats-card card-3">
                        <i class="fas fa-check-circle stats-icon"></i>
                        <div class="stats-content">
                            <div class="stats-value">{{ $pengajuanDiterima }}</div>
                            <div class="stats-label">Diterima</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="stats-card card-4">
                        <i class="fas fa-times-circle stats-icon"></i>
                        <div class="stats-content">
                            <div class="stats-value">{{ $pengajuanDitolak }}</div>
                            <div class="stats-label">Ditolak</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="stats-card card-5">
                        <i class="fas fa-envelope stats-icon"></i>
                        <div class="stats-content">
                            <div class="stats-value">{{ $statusDokumen->ada_surat_pengantar ?? 0 }}</div>
                            <div class="stats-label">Surat Pengantar</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="stats-card card-6">
                        <i class="fas fa-file-alt stats-icon"></i>
                        <div class="stats-content">
                            <div class="stats-value">{{ $statusDokumen->ada_proposal ?? 0 }}</div>
                            <div class="stats-label">Proposal</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics Table -->
            <div class="card mb-5">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-2"></i>
                    Statistik Semua Bidang
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Nama Bidang</th>
                                    <th>Jumlah Pengajuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bidangStats as $b)
                                <tr>
                                    <td class="fw-semibold">{{ $b->nama }}</td>
                                    <td><span class="badge bg-secondary">{{ $b->total_pengajuan }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- User Table -->
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-users me-2"></i>
                    Daftar User Pengajuan
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Universitas</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($userPengajuan as $user)
                                <tr>
                                    <td class="fw-semibold">{{ $user->nama }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->nama_universitas }}</td>
                                    <td>
                                        <span class="badge {{ $user->status }}">
                                            {{ ucfirst($user->status) }}
                                        </span>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($user->tanggal_pengajuan)->format('d/m/Y') }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-primary  bg-white" 
                                                    onclick="showUserDetails({{ $user->pengajuan_id }})"
                                                    title="Lihat Detail">
                                                <i class="fas fa-eye"></i> Detail
                                            </button>
                                            <a href="{{ route('admin.pengajuan.show', $user->pengajuan_id) }}" 
                                               class="btn btn-sm btn-primary"
                                               title="Edit">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="empty-state">
                                            <i class="fas fa-inbox fa-3x"></i>
                                            <h6 class="mt-3 mb-1">Belum ada pengajuan</h6>
                                            <p class="text-muted">Data pengajuan akan muncul di sini</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <script>
        function showUserDetails(pengajuanId) {
            // Implementasi modal atau detail view
            alert('Detail untuk pengajuan ID: ' + pengajuanId);
        }

        // Mobile sidebar toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileToggle = document.querySelector('.mobile-toggle');
            if (mobileToggle) {
                mobileToggle.addEventListener('click', function() {
                    document.querySelector('.sidebar')?.classList.toggle('show');
                });
            }

            // Auto-close alerts
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function (alert) {
                setTimeout(() => {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000);
            });

            // Add interactive stats card effects
            const statsCards = document.querySelectorAll('.stats-card');
            statsCards.forEach(card => {
                card.addEventListener('click', function() {
                    // Add click effect
                    this.style.transform = 'translateY(-8px) scale(0.98)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                });
            });
        });

        // Smooth scrolling for better UX
        document.documentElement.style.scrollBehavior = 'smooth';
    </script>
@endsection