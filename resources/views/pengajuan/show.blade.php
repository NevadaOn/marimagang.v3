@extends('layouts.user.app')

@section('title', 'Detail Pengajuan')

@section('content')
@include('layouts.user.components.breadcrumb', [
    'items' => [
        ['label' => 'Pengajuan', 'url' => route('pengajuan.index')],
        ['label' => 'Detail Pengajuan', 'url' => null]
  
    ]
])
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            

            <!-- Status Alert -->
            @if($pengajuan->status === 'disetujui')
                <div class="alert alert-success">
                    <i class="fas fa-check-circle me-2"></i>
                    <strong>Pengajuan Disetujui!</strong> Selamat, pengajuan magang Anda telah disetujui.
                </div>
            @elseif($pengajuan->status === 'ditolak')
                <div class="alert alert-danger">
                    <i class="fas fa-times-circle me-2"></i>
                    <strong>Pengajuan Ditolak.</strong> Silakan periksa kembali persyaratan atau hubungi admin.
                </div>
            @elseif($pengajuan->status === 'dibatalkan')
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Pengajuan Dibatalkan.</strong> Pengajuan ini telah dibatalkan.
                </div>
            @elseif($pengajuan->status === 'diproses')
                <div class="alert alert-info">
                    <i class="fas fa-clock me-2"></i>
                    <strong>Pengajuan Sedang Diproses.</strong> Mohon tunggu konfirmasi dari admin.
                </div>
            @endif

            <div class="row">
                <!-- Informasi Utama -->
                <div class="col-lg-8">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-primary-500 ">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 text-white">
                                    <i class="fas fa-info-circle me-2"></i>Informasi Pengajuan
                                </h5>
                                <span class="badge bg-light text-dark">{{ $pengajuan->kode_pengajuan }}</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-2">
                                        <strong>Kode Pengajuan:</strong><br>
                                        <span class="text-muted">{{ $pengajuan->kode_pengajuan }}</span>
                                    </p>
                                    <p class="mb-2">
                                        <strong>Status:</strong><br>
                                        @php
                                            $badgeClass = match($pengajuan->status) {
                                                'disetujui' => 'bg-success',
                                                'ditolak' => 'bg-danger', 
                                                'dibatalkan' => 'bg-warning',
                                                'diproses' => 'bg-info',
                                                'selesai' => 'bg-dark',
                                                default => 'bg-secondary'
                                            };
                                        @endphp
                                        <span class="badge {{ $badgeClass }}">{{ ucfirst($pengajuan->status) }}</span>
                                    </p>
                                    <p class="mb-2">
                                        <strong>Bidang Magang:</strong><br>
                                        <span class="text-muted">{{ $pengajuan->databidang->nama ?? '-' }}</span>
                                    </p>
                                    @if($pengajuan->databidang->deskripsi)
                                        <p class="mb-2">
                                            <strong>Deskripsi Bidang:</strong><br>
                                            <small class="text-muted">{{ $pengajuan->databidang->deskripsi }}</small>
                                        </p>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-2">
                                        <strong>Tanggal Mulai:</strong><br>
                                        <span class="text-muted">{{ \Carbon\Carbon::parse($pengajuan->tanggal_mulai)->translatedFormat('d F Y') }}</span>
                                    </p>
                                    <p class="mb-2">
                                        <strong>Tanggal Selesai:</strong><br>
                                        <span class="text-muted">{{ \Carbon\Carbon::parse($pengajuan->tanggal_selesai)->translatedFormat('d F Y') }}</span>
                                    </p>
                                    <p class="mb-2">
                                        <strong>Durasi:</strong><br>
                                        @php
                                            $durasi = \Carbon\Carbon::parse($pengajuan->tanggal_mulai)->diffInDays(\Carbon\Carbon::parse($pengajuan->tanggal_selesai));
                                        @endphp
                                        <span class="text-muted">{{ $durasi }} hari</span>
                                    </p>
                                    <p class="mb-2">
                                        <strong>Tanggal Pengajuan:</strong><br>
                                        <span class="text-muted">{{ \Carbon\Carbon::parse($pengajuan->created_at)->translatedFormat('d F Y H:i') }}</span>
                                    </p>
                                </div>
                            </div>
                            
                            @if($pengajuan->deskripsi)
                                <hr>
                                <p class="mb-0">
                                    <strong>Deskripsi Pengajuan:</strong><br>
                                    <span class="text-muted">{{ $pengajuan->deskripsi }}</span>
                                </p>
                            @endif
                        </div>
                    </div>

                    <!-- Dokumen -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="fas fa-file-alt me-2"></i>Dokumen Pengajuan
                            </h5>
                        </div>
                        <div class="card-body">
                            @if($pengajuan->documents->count() > 0)
                                <div class="row">
                                    @foreach($pengajuan->documents as $doc)
                                        <div class="col-md-6 mb-3">
                                            <div class="border rounded p-3 h-100">
                                                <div class="d-flex align-items-center mb-2">
                                                    <i class="fas fa-file-pdf text-danger me-2"></i>
                                                    <strong>{{ ucfirst(str_replace('_', ' ', $doc->document_type)) }}</strong>
                                                </div>
                                                <p class="mb-2 text-muted small">
                                                    <i class="fas fa-file me-1"></i>{{ $doc->file_name }}<br>
                                                    <i class="fas fa-weight me-1"></i>{{ number_format($doc->file_size / 1024, 2) }} KB<br>
                                                    <i class="fas fa-clock me-1"></i>{{ \Carbon\Carbon::parse($doc->uploaded_at)->translatedFormat('d M Y H:i') }}
                                                </p>
                                                <a href="{{ asset('storage/' . $doc->file_path) }}" 
                                                   target="_blank" 
                                                   class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-external-link-alt me-1"></i>Lihat Dokumen
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center text-muted py-4">
                                    <i class="fas fa-file-alt fa-3x mb-3 opacity-50"></i>
                                    <p>Belum ada dokumen yang diunggah.</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Anggota Tim (jika ada) -->
                    @if($pengajuan->anggota->count() > 0)
                        <div class="card shadow-sm mb-4">
                            <div class="card-header">
                                <h5 class="mb-0">
                                    <i class="fas fa-users me-2"></i>Anggota Tim
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach($pengajuan->anggota as $anggota)
                                        <div class="col-md-6 mb-3">
                                            <div class="border rounded p-3">
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="avatar-circle me-3">
                                                        {{ strtoupper(substr($anggota->nama, 0, 1)) }}
                                                    </div>
                                                    <div>
                                                        <strong>{{ $anggota->nama }}</strong>
                                                        @if($anggota->role === 'ketua')
                                                            <span class="badge bg-info ms-2">Ketua</span>
                                                        @else
                                                            <span class="badge bg-secondary ms-2">Anggota</span>
                                                        @endif
                                                        <br>
                                                        <small class="text-muted">{{ $anggota->nim }}</small>
                                                    </div>
                                                </div>
                                                @if($anggota->universitas)
                                                    <p class="mb-1 small"><strong>Universitas:</strong> {{ $anggota->universitas }}</p>
                                                @endif
                                                @if($anggota->prodi)
                                                    <p class="mb-1 small"><strong>Program Studi:</strong> {{ $anggota->prodi }}</p>
                                                @endif
                                                @if($anggota->email)
                                                    <p class="mb-1 small"><strong>Email:</strong> {{ $anggota->email }}</p>
                                                @endif
                                                @if($anggota->no_hp)
                                                    <p class="mb-1 small"><strong>No. HP:</strong> {{ $anggota->no_hp }}</p>
                                                @endif
                                                @if($anggota->skill)
                                                    <p class="mb-0 small"><strong>Skill:</strong> {{ $anggota->skill }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Info Ketua -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="fas fa-user-tie me-2"></i>Ketua Tim
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <div class="profile-image-wrapper mx-auto">
                                    @if(!empty($pengajuan->user->foto))
                                        <img src="{{ asset('storage/' . $pengajuan->user->foto) }}"   alt="Foto Profil"
                                         class="profile-image"
                                         style="border-radius: 8px; border: 4px solid #ccc; width: 150px; height: 200px; object-fit: cover;">
                                    @else
                                        <div class="profile-image text-white" style="border-radius: 8px; border: 4px solid #ccc; width: 150px; height: 200px; object-fit: cover;">
                                            {{ strtoupper(substr($pengajuan->user->nama, 0, 2)) }}
                                        </div>
                                    @endif
                                </div><br>

                                <h5 class="mb-1">{{ $pengajuan->user->nama }}</h5>
                                <p class="text-muted mb-0">{{ $pengajuan->user->nim }}</p>
                            </div>
                            
                            @if($pengajuan->user->universitas)
                                <p class="mb-2">
                                    <strong>Universitas:</strong><br>
                                    <small class="text-muted">{{ $pengajuan->user->universitas->nama_universitas }}</small>
                                </p>
                            @endif
                            
                            @if($pengajuan->user->prodi)
                                <p class="mb-2">
                                    <strong>Program Studi:</strong><br>
                                    <small class="text-muted">{{ $pengajuan->user->prodi }}</small>
                                </p>
                            @endif
                            
                            @if($pengajuan->user->fakultas)
                                <p class="mb-2">
                                    <strong>Fakultas:</strong><br>
                                    <small class="text-muted">{{ $pengajuan->user->fakultas }}</small>
                                </p>
                            @endif

                            @if($pengajuan->user->email)
                                <p class="mb-2">
                                    <strong>Email:</strong><br>
                                    <small class="text-muted">{{ $pengajuan->user->email }}</small>
                                </p>
                            @endif

                            @if($pengajuan->user->telepon)
                                <p class="mb-0">
                                    <strong>Telepon:</strong><br>
                                    <small class="text-muted">{{ $pengajuan->user->telepon }}</small>
                                </p>
                            @endif
                        </div>
                    </div>

                    <!-- Skills Ketua -->
                    @if($pengajuan->user->userSkills && $pengajuan->user->userSkills->count() > 0)
                        <div class="card shadow-sm mb-4">
                            <div class="card-header">
                                <h5 class="mb-0">
                                    <i class="fas fa-cogs me-2"></i>Skills Ketua
                                </h5>
                            </div>
                            <div class="card-body">
                                @foreach($pengajuan->user->userSkills as $userSkill)
                                    @if($userSkill->skill)
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                <span class="fw-medium">{{ $userSkill->skill->nama }}</span>
                                                <span class="badge bg-primary">{{ ucfirst($userSkill->level) }}</span>
                                            </div>
                                            <div class="progress" style="height: 6px;">
                                                @php
                                                    $percentage = match($userSkill->level) {
                                                        'beginner' => 25,
                                                        'intermediate' => 50,
                                                        'advanced' => 75,
                                                        'expert' => 100,
                                                        default => 0
                                                    };
                                                @endphp
                                                <div class="progress-bar" style="width: {{ $percentage }}%"></div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif

                    
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.avatar-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #007bff;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
}

.avatar-large {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background-color: #007bff;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 1.5rem;
}
</style>
@endsection