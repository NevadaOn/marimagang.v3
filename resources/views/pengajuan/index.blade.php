@extends('layouts.app')

@section('title', 'Daftar Pengajuan')

@section('content')
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
    <div class="alert alert-info d-flex align-items-center" role="alert">
        <i class="fas fa-user-check me-2"></i>
        <div>
            Status Profil:
            @if($completionLevel === 'incomplete')
                <span class="badge bg-danger">Belum Lengkap</span>
            @elseif($completionLevel === 'profile-complete')
                <span class="badge bg-warning text-dark">Profil Lengkap, Skill Belum</span>
            @elseif($completionLevel === 'skills-complete')
                <span class="badge bg-success">Profil & Skill Lengkap</span>
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
