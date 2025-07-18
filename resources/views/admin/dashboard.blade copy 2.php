<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Super Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-tachometer-alt me-2"></i>Super Admin Dashboard
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt me-1"></i>Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action active">
                                <i class="fas fa-home me-2"></i>Dashboard
                            </a>
                            <a href="{{ route('admin.pengajuan.index') }}" class="list-group-item list-group-item-action">
                                <i class="fas fa-file-alt me-2"></i>Kelola Pengajuan
                            </a>
                            <a href="{{ route('admin.users.index') }}" class="list-group-item list-group-item-action">
                                <i class="fas fa-users me-2"></i>Kelola User
                            </a>
                            <a href="{{ route('admin.bidang.index') }}" class="list-group-item list-group-item-action">
                                <i class="fas fa-briefcase me-2"></i>Kelola Bidang
                            </a>
                            <a href="{{ route('admin.admin.index') }}" class="list-group-item list-group-item-action">
                                <i class="fas fa-users me-2"></i>Kelola Admin
                            </a>
                            <a href="{{ route('admin.reports.pengajuan') }}" class="list-group-item list-group-item-action">
                                <i class="fas fa-chart-bar me-2"></i>Laporan
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10">
                <!-- Stats Cards -->
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">{{ $totalPengajuan }}</h4>
                                        <p class="mb-0">Total Pengajuan</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-file-alt fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">{{ $pengajuanPending }}</h4>
                                        <p class="mb-0">Pending</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-clock fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">{{ $pengajuanDiterima }}</h4>
                                        <p class="mb-0">Diterima</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-check fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">{{ $pengajuanDitolak }}</h4>
                                        <p class="mb-0">Ditolak</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-times fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Stats -->
                <div class="row mb-4">
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">{{ $totalUser }}</h4>
                                        <p class="mb-0">Total User</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-users fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="card bg-secondary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">{{ $totalBidang }}</h4>
                                        <p class="mb-0">Total Bidang</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-briefcase fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="card bg-dark text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">{{ $statusDokumen->ada_surat_pengantar ?? 0 }}</h4>
                                        <p class="mb-0">Surat Pengantar</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-file-pdf fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Pengajuan per Bidang -->
                    <div class="col-lg-8 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-chart-pie me-2"></i>Pengajuan per Bidang
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="table-dark">
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
                                                <td><span class="badge bg-primary">{{ $bidang->total_pengajuan }}</span></td>
                                                <td><span class="badge bg-warning">{{ $bidang->pending }}</span></td>
                                                <td><span class="badge bg-success">{{ $bidang->diterima }}</span></td>
                                                <td><span class="badge bg-danger">{{ $bidang->ditolak }}</span></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- User per Universitas -->
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-university me-2"></i>Top Universitas
                                </h5>
                            </div>
                            <div class="card-body">
                                @foreach($userPerUniversitas as $univ)
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-truncate">{{ $univ->nama_universitas }}</span>
                                    <span class="badge bg-primary">{{ $univ->total_user }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- User Terbaru -->
                    <div class="col-lg-6 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-user-plus me-2"></i>User Terbaru
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm">
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
                    <div class="col-lg-6 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-file-plus me-2"></i>Pengajuan Terbaru
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm">
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
                                                        <span class="badge bg-warning">Pending</span>
                                                    @elseif($pengajuan->status == 'diterima')
                                                        <span class="badge bg-success">Diterima</span>
                                                    @else
                                                        <span class="badge bg-danger">Ditolak</span>
                                                    @endif
                                                </td>
                                                <td>{{ $pengajuan->created_at->format('d/m/Y') }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary" onclick="showUserDetails({{ $pengajuan->id }})">
                                                        <i class="fas fa-eye"></i>
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

                <!-- Statistik Bulanan -->
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-chart-line me-2"></i>Statistik Pengajuan 6 Bulan Terakhir
                                </h5>
                            </div>
                            <div class="card-body">
                                <canvas id="statistikChart" height="100"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail User -->
    <div class="modal fade" id="userDetailModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="userDetailContent">
                    <!-- Content will be loaded here -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Chart untuk statistik bulanan
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
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Function untuk menampilkan detail user
        function showUserDetails(pengajuanId) {
            fetch(`/admin/user-details/${pengajuanId}`)
                .then(response => response.json())
                .then(data => {
                    const content = `
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Informasi User</h6>
                                <p><strong>Nama:</strong> ${data.user.nama}</p>
                                <p><strong>Email:</strong> ${data.user.email}</p>
                                <p><strong>NIM:</strong> ${data.user.nim || '-'}</p>
                                <p><strong>No. HP:</strong> ${data.user.telepon || '-'}</p>
                            </div>
                            <div class="col-md-6">
                                <h6>Informasi Pengajuan</h6>
                                <p><strong>Kode:</strong> ${data.pengajuan.kode_pengajuan}</p>
                                <p><strong>Bidang:</strong> ${data.bidang.nama}</p>
                                <p><strong>Status:</strong> 
                                    <span class="badge bg-${data.pengajuan.status === 'pending' ? 'warning' : data.pengajuan.status === 'diterima' ? 'success' : 'danger'}">
                                        ${data.pengajuan.status}
                                    </span>
                                </p>
                                <p><strong>Universitas:</strong> ${data.universitas.nama_universitas}</p>
                            </div>
                        </div>
                    `;
                    document.getElementById('userDetailContent').innerHTML = content;
                    new bootstrap.Modal(document.getElementById('userDetailModal')).show();
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Gagal memuat detail user');
                });
        }
    </script>
</body>
</html>