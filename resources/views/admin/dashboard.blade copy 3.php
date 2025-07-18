<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Super Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #495057;
            line-height: 1.6;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 260px;
            background: linear-gradient(135deg, #255bad 0%, #0c2853 100%);
            color: white;
            z-index: 1000;
            transition: transform 0.3s ease;
            overflow-y: auto;
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-header h3 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .sidebar-header p {
            font-size: 0.85rem;
            opacity: 0.7;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .menu-item {
            display: block;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .menu-item:hover, .menu-item.active {
            background-color: rgba(255,255,255,0.1);
            border-left-color: #fff;
            transform: translateX(5px);
        }

        .menu-item i {
            width: 20px;
            margin-right: 10px;
            text-align: center;
        }

        .main-content {
            margin-left: 260px;
            min-height: 100vh;
        }

        .topbar {
            background: white;
            padding: 15px 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            justify-content: between;
            align-items: center;
        }

        .topbar h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #495057;
        }

        .user-menu {
            margin-left: auto;
        }

        .logout-btn {
            background: #dc3545;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: background 0.3s ease;
        }

        .logout-btn:hover {
            background: #c82333;
        }

        .content {
            padding: 30px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-left: 4px solid #667eea;
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
        }

        .stat-card.pending {
            border-left-color: #ffc107;
        }

        .stat-card.approved {
            border-left-color: #28a745;
        }

        .stat-card.rejected {
            border-left-color: #dc3545;
        }

        .stat-card.users {
            border-left-color: #17a2b8;
        }

        .stat-card.bidang {
            border-left-color: #6610f2;
        }

        .stat-card.documents {
            border-left-color: #fd7e14;
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .stat-title {
            font-size: 0.9rem;
            color: #6c757d;
            font-weight: 500;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .stat-icon.pending { background: rgba(255, 193, 7, 0.1); color: #ffc107; }
        .stat-icon.approved { background: rgba(40, 167, 69, 0.1); color: #28a745; }
        .stat-icon.rejected { background: rgba(220, 53, 69, 0.1); color: #dc3545; }
        .stat-icon.users { background: rgba(23, 162, 184, 0.1); color: #17a2b8; }
        .stat-icon.bidang { background: rgba(102, 16, 242, 0.1); color: #6610f2; }
        .stat-icon.documents { background: rgba(253, 126, 20, 0.1); color: #fd7e14; }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: #495057;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .card-header {
            padding: 20px;
            border-bottom: 1px solid #dee2e6;
            background: #f8f9fa;
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #495057;
            margin: 0;
        }

        .card-body {
            padding: 20px;
        }

        .chart-container {
            position: relative;
            height: 300px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0;
        }

        .table th,
        .table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        .table th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: #495057;
            font-size: 0.9rem;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .status-badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-pending {
            background: rgba(255, 193, 7, 0.1);
            color: #856404;
        }

        .status-approved {
            background: rgba(40, 167, 69, 0.1);
            color: #155724;
        }

        .status-rejected {
            background: rgba(220, 53, 69, 0.1);
            color: #721c24;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: #667eea;
            color: white;
        }

        .btn-primary:hover {
            background: #5a6fd8;
        }

        .university-list {
            list-style: none;
        }

        .university-item {
            padding: 10px 0;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .university-item:last-child {
            border-bottom: none;
        }

        .university-name {
            font-weight: 500;
        }

        .university-count {
            background: #667eea;
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }

        .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 30px;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }

        .modal-header {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #dee2e6;
        }

        .modal-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #495057;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            line-height: 1;
        }

        .close:hover {
            color: #000;
        }

        .detail-item {
            margin-bottom: 15px;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 5px;
        }

        .detail-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 5px;
        }

        .detail-value {
            color: #6c757d;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .main-content {
                margin-left: 0;
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar">
        <div class="sidebar-header">
            <h3><i class="fas fa-user-shield"></i> Super Admin</h3>
            <p>Dashboard Management</p>
        </div>
        <div class="sidebar-menu">
            <a href="{{ route('admin.dashboard') }}" class="menu-item active">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="{{ route('admin.pengajuan.index') }}" class="menu-item">
                <i class="fas fa-file-alt"></i> Kelola Pengajuan
            </a>
            <a href="{{ route('admin.users.index') }}" class="menu-item">
                <i class="fas fa-users"></i> Kelola User
            </a>
            <a href="{{ route('admin.bidang.index') }}" class="menu-item">
                <i class="fas fa-tags"></i> Kelola Bidang
            </a>
            <a href="{{ route('admin.admin.index') }}" class="menu-item">
                <i class="fas fa-user-cog"></i> Kelola Admin
            </a>
            <a href="{{ route('admin.reports.pengajuan') }}" class="menu-item">
                <i class="fas fa-chart-bar"></i> Laporan
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Topbar -->
        <div class="topbar">
            <h1><i class="fas fa-tachometer-alt"></i> Dashboard Overview</h1>
            <div class="user-menu">
                <button class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <!-- Statistics Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-title">Total Pengajuan</div>
                        <div class="stat-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                    </div>
                    <div class="stat-value">{{ $totalPengajuan }}</div>
                </div>

                <div class="stat-card pending">
                    <div class="stat-header">
                        <div class="stat-title">Pending</div>
                        <div class="stat-icon pending">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                    <div class="stat-value">{{ $pengajuanPending }}</div>
                </div>

                <div class="stat-card approved">
                    <div class="stat-header">
                        <div class="stat-title">Diterima</div>
                        <div class="stat-icon approved">
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>
                    <div class="stat-value">{{ $pengajuanDiterima }}</div>
                </div>

                <div class="stat-card rejected">
                    <div class="stat-header">
                        <div class="stat-title">Ditolak</div>
                        <div class="stat-icon rejected">
                            <i class="fas fa-times-circle"></i>
                        </div>
                    </div>
                    <div class="stat-value">{{ $pengajuanDitolak }}</div>
                </div>

                <div class="stat-card users">
                    <div class="stat-header">
                        <div class="stat-title">Total User</div>
                        <div class="stat-icon users">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="stat-value">{{ $totalUser }}</div>
                </div>

                <div class="stat-card bidang">
                    <div class="stat-header">
                        <div class="stat-title">Total Bidang</div>
                        <div class="stat-icon bidang">
                            <i class="fas fa-tags"></i>
                        </div>
                    </div>
                    <div class="stat-value">{{ $totalBidang }}</div>
                </div>

                <div class="stat-card documents">
                    <div class="stat-header">
                        <div class="stat-title">Surat Pengantar</div>
                        <div class="stat-icon documents">
                            <i class="fas fa-file-contract"></i>
                        </div>
                    </div>
                    <div class="stat-value">{{ $statusDokumen->ada_surat_pengantar ?? 0 }}</div>
                </div>
            </div>

            <!-- Dashboard Grid -->
            <div class="dashboard-grid">
                <!-- Chart Section -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><i class="fas fa-chart-line"></i> Statistik Bulanan</h5>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="statistikChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Top Universities -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><i class="fas fa-university"></i> Top Universitas</h5>
                    </div>
                    <div class="card-body">
                        <ul class="university-list">
                            @foreach($userPerUniversitas as $univ)
                            <li class="university-item">
                                <span class="university-name">{{ $univ->nama_universitas }}</span>
                                <span class="university-count">{{ $univ->total_user }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Tables Section -->
            <div class="dashboard-grid">
                <!-- Pengajuan per Bidang -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><i class="fas fa-chart-pie"></i> Pengajuan per Bidang</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Bidang</th>
                                        <th>Total</th>
                                        <th>Pending</th>
                                        <th>Diterima</th>
                                        <th>Ditolak</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pengajuanPerBidang as $bidang)
                                    <tr>
                                        <td>{{ $bidang->nama }}</td>
                                        <td><strong>{{ $bidang->total_pengajuan }}</strong></td>
                                        <td><span class="status-badge status-pending">{{ $bidang->pending }}</span></td>
                                        <td><span class="status-badge status-approved">{{ $bidang->diterima }}</span></td>
                                        <td><span class="status-badge status-rejected">{{ $bidang->ditolak }}</span></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- User Terbaru -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><i class="fas fa-user-plus"></i> User Terbaru</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Universitas</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($userTerbaru as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->universitas->nama_universitas ?? '-' }}</td>
                                        <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pengajuan Terbaru -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><i class="fas fa-file-invoice"></i> Pengajuan Terbaru</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Bidang</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pengajuanTerbaru as $pengajuan)
                                <tr>
                                    <td>{{ $pengajuan->user->nama }}</td>
                                    <td>{{ $pengajuan->databidang->nama }}</td>
                                    <td>
                                        @if($pengajuan->status == 'pending')
                                            <span class="status-badge status-pending">Pending</span>
                                        @elseif($pengajuan->status == 'diterima')
                                            <span class="status-badge status-approved">Diterima</span>
                                        @else
                                            <span class="status-badge status-rejected">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>{{ $pengajuan->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <button class="btn btn-primary" onclick="showUserDetails({{ $pengajuan->id }})">
                                            <i class="fas fa-eye"></i> Detail
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="userDetailModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fas fa-user"></i> Detail User</h3>
                <span class="close" onclick="closeModal()">&times;</span>
            </div>
            <div id="userDetailContent"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Chart Configuration
        const ctx = document.getElementById('statistikChart').getContext('2d');
        const statistikData = @json($statistikBulanan);
        
        const labels = statistikData.map(item => {
            const bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
            return bulan[item.bulan - 1] + ' ' + item.tahun;
        });
        
        const data = statistikData.map(item => item.total);
        
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Pengajuan',
                    data: data,
                    borderColor: '#667eea',
                    backgroundColor: 'rgba(102, 126, 234, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#667eea',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0,0,0,0.1)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // Modal Functions
        function showUserDetails(pengajuanId) {
            fetch(`/admin/user-details/${pengajuanId}`)
                .then(response => response.json())
                .then(data => {
                    const content = `
                        <div class="detail-item">
                            <div class="detail-label">Nama:</div>
                            <div class="detail-value">${data.user.nama}</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Email:</div>
                            <div class="detail-value">${data.user.email}</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">NIM:</div>
                            <div class="detail-value">${data.user.nim || '-'}</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">No. HP:</div>
                            <div class="detail-value">${data.user.telepon || '-'}</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Kode Pengajuan:</div>
                            <div class="detail-value">${data.pengajuan.kode_pengajuan}</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Bidang:</div>
                            <div class="detail-value">${data.bidang.nama}</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Status:</div>
                            <div class="detail-value">
                                <span class="status-badge ${data.pengajuan.status === 'pending' ? 'status-pending' : data.pengajuan.status === 'diterima' ? 'status-approved' : 'status-rejected'}">${data.pengajuan.status}</span>
                            </div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Universitas:</div>
                            <div class="detail-value">${data.universitas.nama_universitas}</div>
                        </div>
                    `;
                    document.getElementById('userDetailContent').innerHTML = content;
                    document.getElementById('userDetailModal').style.display = 'block';
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Gagal memuat detail user');
                });
        }

        function closeModal() {
            document.getElementById('userDetailModal').style.display = 'none';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('userDetailModal');
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>
</body>
</html>