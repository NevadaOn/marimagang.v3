<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Bidang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #1e40af;
            --light-blue: #3b82f6;
            --bg-gray: #f8fafc;
        }

        body {
            background-color: var(--bg-gray);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;font-family: timesnewroman;
        }

        .navbar {
            background-color: var(--primary-blue);
            padding: 1rem 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            color: white !important;
            font-weight: 600;
            font-size: 1.25rem;
        }

        .nav-tabs {
            border-bottom: 2px solid var(--primary-blue);
            margin-bottom: 2rem;
        }

        .nav-tabs .nav-link {
            color: var(--primary-blue);
            border: none;
            padding: 0.75rem 1.5rem;
            margin-right: 0.5rem;
            border-radius: 0;
            font-weight: 500;
        }

        .nav-tabs .nav-link:hover {
            background-color: rgba(30, 64, 175, 0.1);
        }

        .nav-tabs .nav-link.active {
            background-color: var(--primary-blue);
            color: white;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stats-card {
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            border-left: 4px solid var(--primary-blue);
        }

        .stats-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-blue);
            margin-bottom: 0.5rem;
        }

        .stats-label {
            color: #64748b;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            margin-bottom: 1.5rem;
        }

        .card-header {
            background-color: white;
            border-bottom: 2px solid var(--primary-blue);
            font-weight: 600;
            color: var(--primary-blue);
            padding: 1rem 1.5rem;
        }

        .table thead th {
            background-color: var(--bg-gray);
            color: var(--primary-blue);
            font-weight: 600;
            border-bottom: 2px solid var(--primary-blue);
        }

        .badge {
            padding: 0.5rem 0.75rem;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .badge.pending {
            background-color: #fef3c7;
            color: #92400e;
        }

        .badge.diterima {
            background-color: #d1fae5;
            color: #065f46;
        }

        .badge.ditolak {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .btn-primary {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
        }

        .btn-primary:hover {
            background-color: var(--light-blue);
            border-color: var(--light-blue);
        }

        .btn-outline-primary {
            color: var(--primary-blue);
            border-color: var(--primary-blue);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
        }

        .logout-btn {
            background-color: #dc2626;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .logout-btn:hover {
            background-color: #b91c1c;
        }

        .bidang-info {
            background-color: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            margin-bottom: 1.5rem;
        }

        .bidang-info h6 {
            color: var(--primary-blue);
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .info-item {
            margin-bottom: 0.75rem;
        }

        .info-label {
            font-size: 0.85rem;
            color: #64748b;
            font-weight: 500;
        }

        .info-value {
            font-weight: 500;
            color: #1e293b;
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .table-responsive {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Dashboard Admin Bidang</a>
            <div class="ms-auto">
                <button class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if(!$bidang)
        <div class="alert alert-warning">
            Anda belum ditugaskan ke bidang manapun. Silakan hubungi Super Admin untuk informasi lebih lanjut.
        </div>
        @else
        
        <!-- Navigation Tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.pengajuan.index') }}">Kelola Pengajuan</a>
            </li>
        </ul>

        <!-- Bidang Information -->
        <div class="bidang-info">
            <h6>Informasi Bidang</h6>
            <div class="row">
                <div class="col-md-6">
                    <div class="info-item">
                        <div class="info-label">Nama Bidang</div>
                        <div class="info-value">{{ $bidang->nama }}</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-item">
                        <div class="info-label">Deskripsi</div>
                        <div class="info-value">{{ $bidang->deskripsi ?? 'Tidak ada deskripsi' }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics -->
        <div class="stats-grid">
            <div class="stats-card">
                <div class="stats-value">{{ $totalPengajuan }}</div>
                <div class="stats-label">Total Pengajuan</div>
            </div>
            <div class="stats-card">
                <div class="stats-value">{{ $pengajuanPending }}</div>
                <div class="stats-label">Pending</div>
            </div>
            <div class="stats-card">
                <div class="stats-value">{{ $pengajuanDiterima }}</div>
                <div class="stats-label">Diterima</div>
            </div>
            <div class="stats-card">
                <div class="stats-value">{{ $pengajuanDitolak }}</div>
                <div class="stats-label">Ditolak</div>
            </div>
            <div class="stats-card">
                <div class="stats-value">{{ $statusDokumen->ada_surat_pengantar ?? 0 }}</div>
                <div class="stats-label">Surat Pengantar</div>
            </div>
            <div class="stats-card">
                <div class="stats-value">{{ $statusDokumen->ada_proposal ?? 0 }}</div>
                <div class="stats-label">Proposal</div>
            </div>
        </div>

        <!-- Statistics Table -->
        <div class="card">
            <div class="card-header">
                Statistik Semua Bidang
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-sm mb-0">
                        <thead>
                            <tr>
                                <th>Nama Bidang</th>
                                <th>Jumlah Pengajuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bidangStats as $b)
                            <tr>
                                <td>{{ $b->nama }}</td>
                                <td><span class="badge bg-primary">{{ $b->total_pengajuan }}</span></td>
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
                Daftar User Pengajuan
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0">
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
                                <td>{{ $user->nama }}</td>
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
                                        <button class="btn btn-sm btn-outline-primary" 
                                                onclick="showUserDetails({{ $user->pengajuan_id }})"
                                                title="Lihat Detail">
                                            Detail
                                        </button>
                                        <a href="{{ route('admin.pengajuan.show', $user->pengajuan_id) }}" 
                                           class="btn btn-sm btn-primary"
                                           title="Edit">
                                            Edit
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">Belum ada pengajuan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showUserDetails(pengajuanId) {
            alert('Detail untuk pengajuan ID: ' + pengajuanId);
        }

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
</body>
</html>