@extends('layouts.user.app')

@section('title', 'Daftar Pengajuan')

@section('content')
        @include('layouts.user.components.breadcrumb', [
        'items' => [
            ['label' => 'Pengajuan', 'url' => null]
        ]
    ])

        <div class="container py-4">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold">Daftar Pengajuan</h4>
                @if($completionLevel !== 'skills-complete')
                    <a href="{{ route('profile.edit') }}" class="btn btn-warning">
                        <i class="fas fa-user-edit me-1"></i> Lengkapi Profil Terlebih Dahulu
                    </a>
                @elseif(!$statusAktif)
                    <a href="{{ route('pengajuan.tipe') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle me-1"></i> Buat Pengajuan Baru
                    </a>
                @endif
            </div>

            <!-- Status Profil -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user-check text-primary me-2"></i>
                            <h6 class="mb-0 fw-semibold">Status Profil</h6>
                        </div>
                        <span class="badge 
                            @if($completionLevel === 'incomplete') bg-danger 
                            @elseif($completionLevel === 'profile-complete') bg-warning text-dark 
                            @else bg-success @endif">
                            @if($completionLevel === 'incomplete') Belum Lengkap 
                            @elseif($completionLevel === 'profile-complete') Profil Lengkap, Skill Belum 
                            @else Profil & Skill Lengkap @endif
                        </span>
                    </div>

                    @if($completionLevel === 'skills-complete')
                                            <div class="row align-items-center">
                            <div class="col-md-3 text-center mb-3 mb-md-0">
                                <div class="profile-image-wrapper mx-auto">
                                    <img src="{{ $user->foto ? asset('storage/' . $user->foto) : asset('style/images/thumbs/setting-profile-img.jpg') }}"
                                         alt="Foto Profil"
                                         class="profile-image" style="border-radius: 8px; border: 4px solid #ccc;">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row mb-2">
                                    <div class="col-4 text-muted fw-medium">Nama</div>
                                    <div class="col-8 text-dark">{{ old('nama', $user->nama) }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4 text-muted fw-medium">Email</div>
                                    <div class="col-8 text-dark">{{ old('email', $user->email) }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4 text-muted fw-medium">Telepon</div>
                                    <div class="col-8 text-dark">{{ old('telepon', $user->telepon) }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4 text-muted fw-medium">Alamat</div>
                                    <div class="col-8 text-dark">{{ old('alamat', $user->alamat) }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4 text-muted fw-medium">Universitas</div>
                                    <div class="col-8 text-dark">{{ old('nama_universitas', $user->universitas->nama_universitas ?? '-') }}</div>
                                </div>
                            </div>
                        </div>

                        

                    @endif
                </div>
            </div>

            <!-- Daftar Pengajuan -->
            <h5 class="fw-bold mb-3">Pengajuan Magang Saya</h5>
            @forelse($pengajuan as $item)
                <div class="card mb-3 shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $item->kode_pengajuan }}</strong>
                            <span class="badge bg-secondary ms-2">{{ ucfirst($item->status) }}</span>
                            @if($item->user_id === auth()->id())
                                <span class="badge bg-info ms-2">Sebagai Ketua</span>
                            @else
                                <span class="badge bg-dark ms-2">Sebagai Anggota</span>
                            @endif
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{ $item->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                Aksi
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton{{ $item->id }}">
                                <li>
                                    <a class="dropdown-item" href="{{ route('pengajuan.edit', $item->kode_pengajuan) }}">
                                        <i class="fas fa-edit me-2"></i>Edit Pengajuan
                                    </a>
                                </li>
                                <li>
                                    <form action="{{ route('pengajuan.batal', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin membatalkan pengajuan ini?')">
                                        @csrf
                                        <button class="dropdown-item text-danger" type="submit">
                                            <i class="fas fa-times-circle me-2"></i>Batalkan Pengajuan
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="mb-1"><strong>Bidang:</strong> {{ $item->databidang->nama ?? '-' }}</p>
                        <p class="mb-1"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($item->tanggal_mulai)->translatedFormat('d F Y') }} - {{ \Carbon\Carbon::parse($item->tanggal_selesai)->translatedFormat('d F Y') }}</p>
                        @if ($item->documents->count())
                            <p class="mb-1"><strong>Dokumen:</strong></p>
                            <ul class="ps-3">
                                @foreach ($item->documents as $doc)
                                    <li>
                                        {{ ucfirst(str_replace('_', ' ', $doc->document_type)) }}:
                                        <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="text-decoration-none">
                                            {{ $doc->file_name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        <p class="mb-1"><strong>Ketua:</strong> {{ $item->user->nama }} ({{ $item->user->nim }})</p>
                        @if($item->anggota->count())
                            <p class="mb-1"><strong>Anggota:</strong></p>
                            <ul class="ps-3">
                                @foreach ($item->anggota as $anggota)
                                    <li>{{ $anggota->nama }} ({{ $anggota->nim }})</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                </div>
            @empty
                <div class="alert alert-secondary">
                    <i class="fas fa-info-circle me-2"></i> Belum ada pengajuan yang terdaftar.
                </div>
            @endforelse
        </div>
@endsection
