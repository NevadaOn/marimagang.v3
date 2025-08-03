@extends('layouts.user.app')

@section('title', 'Daftar Pengajuan')

@section('content')
        @include('layouts.user.components.breadcrumb', [
        'items' => [
            ['label' => 'Pengajuan', 'url' => null]

        ]
    ])
        <div class="container py-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4>Pengajuan Magang Saya</h4>

                @if(!$statusAktif)
                    <a href="{{ route('pengajuan.tipe') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle me-1"></i> Buat Pengajuan Baru
                    </a>
                @endif
            </div>

            {{-- Kelengkapan Profil --}}
            <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-4">
            <!-- Header -->
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-user-check text-primary me-2"></i>
                    <h6 class="mb-0 fw-semibold">Status Profil</h6>
                </div>
                @if($completionLevel === 'incomplete')
                    <span class="badge bg-danger">Belum Lengkap</span>
                @elseif($completionLevel === 'profile-complete')
                    <span class="badge bg-warning text-dark">Profil Lengkap, Skill Belum</span>
                @elseif($completionLevel === 'skills-complete')
                    <span class="badge bg-success">Profil & Skill Lengkap</span>
                @endif
            </div>

            @if($completionLevel === 'skills-complete')
            <!-- Profile Section -->
            <div class="row">
                <div class="col-md-3 text-center mb-3 mb-md-0">
                    <img src="{{ $user->foto ? asset('storage/' . $user->foto) : asset('style/images/thumbs/setting-profile-img.jpg') }}"
                         alt="Foto Profil"
                         class="rounded-circle shadow-sm"
                         style="width: 100px; height: 100px; object-fit: cover;">
                </div>

                <div class="col-md-9">
                    @error('nama')
                        <div class="text-danger small mb-3">{{ $message }}</div>
                    @enderror

                    <!-- Profile Information -->
                    <div class="profile-info">
                        <div class="row mb-2">
                            <div class="col-3">
                                <span class="text-muted fw-medium">Nama</span>
                            </div>
                            <div class="col-1 text-center">
                                <span class="text-muted">:</span>
                            </div>
                            <div class="col-8">
                                <span class="text-dark fs-5 fw-semibold">{{ old('nama', $user->nama) }}</span>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-3">
                                <span class="text-muted fw-medium">Email</span>
                            </div>
                            <div class="col-1 text-center">
                                <span class="text-muted">:</span>
                            </div>
                            <div class="col-8">
                                <span class="text-dark">{{ old('email', $user->email) }}</span>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-3">
                                <span class="text-muted fw-medium">Telepon</span>
                            </div>
                            <div class="col-1 text-center">
                                <span class="text-muted">:</span>
                            </div>
                            <div class="col-8">
                                <span class="text-dark">{{ old('telepon', $user->telepon) }}</span>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-3">
                                <span class="text-muted fw-medium">Alamat</span>
                            </div>
                            <div class="col-1 text-center">
                                <span class="text-muted">:</span>
                            </div>
                            <div class="col-8">
                                <span class="text-dark">{{ old('alamat', $user->alamat) }}</span>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-3">
                                <span class="text-muted fw-medium">NIM</span>
                            </div>
                            <div class="col-1 text-center">
                                <span class="text-muted">:</span>
                            </div>
                            <div class="col-8">
                                <span class="text-dark">{{ old('nim', $user->nim) }}</span>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-3">
                                <span class="text-muted fw-medium">Universitas</span>
                            </div>
                            <div class="col-1 text-center">
                                <span class="text-muted">:</span>
                            </div>
                            <div class="col-8">
                                <span class="text-dark">{{ old('nama_universitas', $user->universitas->nama_universitas ?? '-') }}</span>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-3">
                                <span class="text-muted fw-medium">Fakultas</span>
                            </div>
                            <div class="col-1 text-center">
                                <span class="text-muted">:</span>
                            </div>
                            <div class="col-8">
                                <span class="text-dark">{{ old('fakultas', $user->universitas->fakultas ?? '-') }}</span>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-3">
                                <span class="text-muted fw-medium">Program Studi</span>
                            </div>
                            <div class="col-1 text-center">
                                <span class="text-muted">:</span>
                            </div>
                            <div class="col-8">
                                <span class="text-dark">{{ old('prodi', $user->universitas->prodi ?? '-') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>          

            {{-- Daftar Pengajuan --}}
            @forelse($pengajuan as $item)
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <strong>{{ $item->kode_pengajuan }}</strong>
                            <span class="badge bg-secondary ms-2">{{ ucfirst($item->status) }}</span>
                            @if($item->user_id === auth()->id())
                                <span class="badge bg-info ms-2">Sebagai Ketua</span>
                            @else
                                <span class="badge bg-dark ms-2">Sebagai Anggota</span>
                            @endif
                        </div>

                        <a href="{{ route('pengajuan.show', $item) }}" class="btn btn-sm btn-outline-primary">
                            Detail
                        </a>
                    </div>
                    <div class="card-body">
                        <p class="mb-1"><strong>Bidang:</strong> {{ $item->databidang->nama ?? '-' }}</p>
                        <p class="mb-1">
                            <strong>Tanggal:</strong>
                            {{ \Carbon\Carbon::parse($item->tanggal_mulai)->translatedFormat('d F Y') }}
                            -
                            {{ \Carbon\Carbon::parse($item->tanggal_selesai)->translatedFormat('d F Y') }}
                        </p>

                        <p class="mb-1">
                            <strong>Dokumen:</strong>
                            @if($item->dokumen_lengkap)
                                <span class="badge bg-success">Lengkap</span>
                            @else
                                <span class="badge bg-danger">Belum Lengkap</span>
                            @endif
                        </p>

                        {{-- Status Anggota --}}
                        @if($item->anggota->count())
                            <p class="mb-1">
                                <strong>Anggota:</strong> {{ $item->total_anggota }}
                                @if($item->anggota_pending > 0)
                                    <span class="badge bg-warning text-dark ms-2">{{ $item->anggota_pending }} Belum Konfirmasi</span>
                                @else
                                    <span class="badge bg-success ms-2">Semua Dikonfirmasi</span>
                                @endif
                            </p>
                        @endif

                        {{-- Status Lengkap Keseluruhan --}}
                        <p class="mt-2">
                            <strong>Status Kelengkapan:</strong>
                            @if($item->status_lengkap)
                                <span class="badge bg-success">Siap Divalidasi</span>
                            @else
                                <span class="badge bg-secondary">Belum Lengkap</span>
                            @endif
                        </p>
                    </div>
                </div>
            @empty
                <div class="alert alert-secondary">
                    <i class="fas fa-info-circle me-2"></i>
                    Belum ada pengajuan yang terdaftar.
                </div>
            @endforelse
        </div>
@endsection
