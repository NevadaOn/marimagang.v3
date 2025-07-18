@extends('layouts.superadmin')

@section('content')
    <style>
        :root {
            --primary-color: #6c757d;
            --secondary-color: #495057;
            --accent-color: #adb5bd;
            --light-bg: #f8f9fa;
            --white: #ffffff;
            --text-dark: #212529;
            --text-muted: #6c757d;
        }
        
        .main-content {
            padding: 0;
        }

        .content-wrapper {
            padding: 1.5rem;
        }

        .stats-card {
            background: var(--white);
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-left: 4px solid var(--primary-color);
        }

        .stats-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .stats-label {
            color: var(--text-muted);
            font-weight: 500;
        }

        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .card-header {
            background-color: var(--white);
            border-bottom: 1px solid #e9ecef;
            padding: 1rem 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .info-card {
            background: var(--white);
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .info-label {
            font-size: 0.85rem;
            color: var(--text-muted);
            font-weight: 500;
            margin-bottom: 0.25rem;
        }

        .info-value {
            font-weight: 600;
            color: var(--text-dark);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .badge.pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .badge.diterima {
            background-color: #d1e7dd;
            color: #0f5132;
        }

        .badge.ditolak {
            background-color: #f8d7da;
            color: #842029;
        }

        @media (max-width: 768px) {
            
            .main-content {
                margin-left: 0;
            }
            
            .mobile-toggle {
                display: block !important;
            }
        }

        .mobile-toggle {
            display: none;
        }
    </style>
    <div class="main-content">
        <div class="content-wrapper">
            @if(!$bidang)
            <div class="alert alert-warning">
                <i class="fas fa-exclamation-triangle me-2"></i>
                Anda belum ditugaskan ke bidang manapun. Silakan hubungi Super Admin untuk informasi lebih lanjut.
            </div>
            @else
            
            <!-- Bidang Information -->
            <div class="info-card mb-4">
                <h6 class="mb-3"><i class="fas fa-info-circle me-2"></i>Informasi Bidang</h6>
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
            <div class="row g-3 mb-4">
                <div class="col-md-4 col-lg-2">
                    <div class="stats-card">
                        <div class="stats-value">{{ $totalPengajuan }}</div>
                        <div class="stats-label">Total Pengajuan</div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="stats-card">
                        <div class="stats-value">{{ $pengajuanPending }}</div>
                        <div class="stats-label">Pending</div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="stats-card">
                        <div class="stats-value">{{ $pengajuanDiterima }}</div>
                        <div class="stats-label">Diterima</div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="stats-card">
                        <div class="stats-value">{{ $pengajuanDitolak }}</div>
                        <div class="stats-label">Ditolak</div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="stats-card">
                        <div class="stats-value">{{ $statusDokumen->ada_surat_pengantar ?? 0 }}</div>
                        <div class="stats-label">Surat Pengantar</div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="stats-card">
                        <div class="stats-value">{{ $statusDokumen->ada_proposal ?? 0 }}</div>
                        <div class="stats-label">Proposal</div>
                    </div>
                </div>
            </div>

            <!-- Statistics Table -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-2"></i>
                    Statistik Semua Bidang
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Nama Bidang</th>
                                    <th>Jumlah Pengajuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bidangStats as $b)
                                <tr>
                                    <td>{{ $b->nama }}</td>
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
                            <thead class="table-light">
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
                                    <td>{{ $user->nama }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->nama_universitas }}</td>
                                    <td>
                                        <span style="color: #212529" class="badge {{ $user->status }}">
                                            {{ ucfirst($user->status) }}
                                        </span>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($user->tanggal_pengajuan)->format('d/m/Y') }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-primary" 
                                                    onclick="showUserDetails({{ $user->pengajuan_id }})"
                                                    title="Lihat Detail">Lihat Detail
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <a href="{{ route('admin.pengajuan.show', $user->pengajuan_id) }}" 
                                               class="btn btn-sm btn-primary"
                                               title="Edit">Edit
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        <i class="fas fa-inbox fa-2x mb-2"></i>
                                        <br>Belum ada pengajuan.
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
            alert('Detail untuk pengajuan ID: ' + pengajuanId);
        }

        // Mobile sidebar toggle
        document.querySelector('.mobile-toggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('show');
        });

        // Auto-close alerts
        document.addEventListener('DOMContentLoaded', function () {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function (alert) {
                setTimeout(() => {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000);
            });
        });
    </script>
@endsection