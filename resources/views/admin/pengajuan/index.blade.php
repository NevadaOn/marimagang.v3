@extends('layouts.superadmin')
@section('title', 'Kelola Pengajuan')
@section('content')
<div data-bs-theme="dark">
    <div class="container-fluid py-4">
        <!-- Header Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="fw-bold mb-2">
                            <i class="fas fa-file-alt me-3 text-primary"></i>
                            Kelola Pengajuan
                        </h1>
                        <p class="text-muted mb-0">Kelola dan monitor semua pengajuan mahasiswa</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-primary btn-sm" onclick="refreshTableById('tabelPengajuan')">
                            Refresh
                        </button>

                    </div>
                </div>
            </div>
        </div>

        <!-- Success Alert -->
        @if (session('success'))
        <div class="row mb-4">
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        </div>
        @endif

        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card bg-gradient-primary border-0 shadow-sm">
                    <div class="card-body p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="small">Total Pengajuan</div>
                                <div class="h4 mb-0">{{ $pengajuan->total() }}</div>
                            </div>
                            <div class="">
                                <i class="fas fa-file-alt fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card bg-gradient-success border-0 shadow-sm">
                    <div class="card-body p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="small">Diterima</div>
                                <div class="h4 mb-0">{{ $pengajuan->where('status', 'diterima')->count() }}</div>
                            </div>
                            <div class="">
                                <i class="fas fa-check-circle fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card bg-gradient-warning border-0 shadow-sm">
                    <div class="card-body p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="small">Menunggu</div>
                                <div class="h4 mb-0">{{ $pengajuan->where('status', 'Diproses')->count() }}</div>
                            </div>
                            <div class="">
                                <i class="fas fa-clock fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card bg-gradient-danger border-0 shadow-sm">
                    <div class="card-body p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="small">Ditolak</div>
                                <div class="h4 mb-0">{{ $pengajuan->where('status', 'ditolak')->count() }}</div>
                            </div>
                            <div class="">
                                <i class="fas fa-times-circle fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Table Card -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-lg">
                    
                    <div class="card-body p-0">
                        <div class="table-responsive" id="tabelPengajuan">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col" class="text-center py-3 px-4" style="width: 5%;">
                                            <i class="fas fa-hashtag"></i>
                                        </th>
                                        <th scope="col" class="py-3 px-4" style="width: 18%;">
                                            <i class="fas fa-user me-2"></i>Nama Pengusul
                                        </th>
                                        <th scope="col" class="py-3 px-4" style="width: 12%;">
                                            <i class="fas fa-id-badge me-2"></i>NIM
                                        </th>
                                        <th scope="col" class="py-3 px-4" style="width: 15%;">
                                            <i class="fas fa-tag me-2"></i>Bidang
                                        </th>
                                        <th scope="col" class="text-center py-3 px-4" style="width: 12%;">
                                            <i class="fas fa-play me-2"></i>Mulai
                                        </th>
                                        <th scope="col" class="text-center py-3 px-4" style="width: 12%;">
                                            <i class="fas fa-stop me-2"></i>Selesai
                                        </th>
                                        <th scope="col" class="text-center py-3 px-4" style="width: 12%;">
                                            <i class="fas fa-calendar me-2"></i>Diajukan
                                        </th>
                                        <th scope="col" class="text-center py-3 px-4" style="width: 10%;">
                                            <i class="fas fa-info-circle me-2"></i>Status
                                        </th>
                                        <th scope="col" class="text-center py-3 px-4" style="width: 8%;">
                                            <i class="fas fa-cogs me-2"></i>Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($pengajuan as $index => $item)
                                    <tr class="border-bottom">
                                        <td class="text-center py-4 px-4 fw-bold">
                                            {{ $pengajuan->firstItem() + $index }}
                                        </td>
                                        <td class="py-4 px-4">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-circle me-3">
                                                    {{ substr($item->user->nama, 0, 2) }}
                                                </div>
                                                <div>
                                                    <div class="fw-semibold">{{ $item->user->nama }}</div>
                                                    {{-- <small class="text-muted">Mahasiswa</small> --}}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4 px-4">
                                            <span class="badge bg-secondary">{{ $item->user->nim }}</span>
                                        </td>
                                        <td class="py-4 px-4">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-bookmark text-primary me-2"></i>
                                                <span>{{ $item->databidang->nama ?? '-' }}</span>
                                            </div>
                                        </td>
                                        <td class="text-center py-4 px-4">
                                            @if($item->tanggal_mulai)
                                                <div class="text-success fw-semibold">
                                                    {{ $item->tanggal_mulai->format('d M Y') }}
                                                </div>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td class="text-center py-4 px-4">
                                            @if($item->tanggal_selesai)
                                                <div class="text-danger fw-semibold">
                                                    {{ $item->tanggal_selesai->format('d M Y') }}
                                                </div>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td class="text-center py-4 px-4">
                                            <div class="text-info fw-semibold">
                                                {{ $item->created_at->format('d M Y') }}
                                            </div>
                                            <small class="text-muted">{{ $item->created_at->diffForHumans() }}</small>
                                        </td>
                                        <td class="text-center py-4 px-4">
                                            @if ($item->status == 'diterima')
                                                <span class="badge bg-success d-inline-flex align-items-center">
                                                    <i class="fas fa-check me-1"></i>Diterima
                                                </span>
                                            @elseif ($item->status == 'ditolak')
                                                <span class="badge bg-danger d-inline-flex align-items-center">
                                                    <i class="fas fa-times me-1"></i>Ditolak
                                                </span>
                                            @elseif ($item->status == 'diteruskan')
                                                <span class="badge btn-secondary d-inline-flex align-items-center">
                                                    <i class="fas fa-paper-plane me-1"></i>Diteruskan
                                                </span>
                                            @elseif ($item->status == 'magang')
                                                <span class="badge bg-info d-inline-flex align-items-center">
                                                    <i class="fas fa-briefcase me-1"></i>Magang
                                                </span>
                                            @elseif ($item->status == 'selesai')
                                                <span class="badge bg-primary d-inline-flex align-items-center">
                                                    <i class="fas fa-flag-checkered me-1"></i>Selesai
                                                </span>
                                            @else
                                                <span class="badge bg-warning d-inline-flex align-items-center">
                                                    <i class="fas fa-clock me-1"></i>Diproses
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-center py-4 px-4">
                                            <a href="{{ auth()->user()->role === 'superadmin' ? route('admin.pengajuan.show', $item->id) : route('admin.pengajuan.showbidang', $item->id) }}">
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="9" class="text-center py-5">
                                            <div class="empty-state">
                                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                                <h5 class="text-muted">Tidak ada data pengajuan</h5>
                                                <p class="text-muted mb-0">Belum ada pengajuan yang tersedia saat ini.</p>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    @if ($pengajuan->hasPages())
                    <div class="card-footer bg-transparent border-0 p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted small">
                                Menampilkan {{ $pengajuan->firstItem() ?? 0 }} hingga {{ $pengajuan->lastItem() ?? 0 }} 
                                dari {{ $pengajuan->total() }} hasil
                            </div>
                            <div>
                                {{ $pengajuan->links() }}
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.bg-gradient-primary {
    background: linear-gradient(45deg, #007bff, #0056b3);
}
.bg-gradient-success {
    background: linear-gradient(45deg, #28a745, #1e7e34);
}
.bg-gradient-warning {
    background: linear-gradient(45deg, #ffc107, #e0a800);
}
.bg-gradient-danger {
    background: linear-gradient(45deg, #dc3545, #bd2130);
}

.avatar-circle {
    width: 60px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(45deg, #94c8ffff, #638abdff);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: bold;
    font-size: 14px;
}

.card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.table-hover tbody tr:hover {
    background-color: rgba(255, 255, 255, 0.05);
}

.empty-state {
    padding: 2rem;
}

.dropdown-menu {
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

@media (max-width: 768px) {
    .table-responsive {
        font-size: 0.875rem;
    }
    
    .avatar-circle {
        width: 32px;
        height: 32px;
        font-size: 12px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Inisialisasi tooltip Bootstrap
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    tooltipTriggerList.forEach(function (el) {
        new bootstrap.Tooltip(el);
    });

    // Tambahan: Bisa tambahkan inisialisasi fitur lain di sini kalau ada
});

// Fungsi untuk refresh elemen tertentu tanpa reload halaman penuh
function refreshTableById(id) {
    const target = document.getElementById(id);
    if (!target) return;

    fetch(window.location.href)
        .then(response => response.text())
        .then(html => {
            const parser = new DOMParser();
            const newDoc = parser.parseFromString(html, 'text/html');
            const newContent = newDoc.getElementById(id);
            if (newContent) {
                target.innerHTML = newContent.innerHTML;
            }
        })
        .catch(error => {
            console.error('Gagal me-refresh tabel:', error);
        });
}
</script>
@endsection