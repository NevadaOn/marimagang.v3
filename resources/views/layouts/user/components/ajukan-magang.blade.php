@php
    $completionLevel = $completionLevel ?? null;
    $pengajuanAktif = $pengajuanAktif ?? null;
    $displayPengajuan = $pengajuanAktif;
    
    // DEBUG: Log untuk melihat kondisi
    \Log::info('Component ajukan-magang loaded', [
        'user_id' => auth()->id(),
        'completion_level' => $completionStatus['level'] ?? 'unknown',
        'has_pengajuan_aktif' => $pengajuanAktif ? true : false,
        'pengajuan_status' => $pengajuanAktif->status ?? 'no_pengajuan'
    ]);
@endphp

<div class="">
    {{-- Komentar Admin jika ada --}}
    @if($displayPengajuan && $displayPengajuan->komentar_admin)
        <div class="mt-24 mb-24">
            <div class="flex-align mb-8 gap-16">
                <span class="text-sm text-gray-300 flex-shrink-0">Hari ini</span>
                <span class="border border-gray-50 border-dashed flex-grow-1"></span>
            </div>
            <div class="event-item bg-gray-50 rounded-8 p-16">
                <div class="flex-between gap-4">
                    <div>
                        <h6 class="mb-2">Komentar Admin:</h6>
                        <span>{{ $displayPengajuan->komentar_admin }}</span>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- PERBAIKAN: Tambah kondisi untuk cek pengajuan aktif --}}
    @if ($completionStatus['level'] !== 'skills-complete')
        <div class="position-relative rounded-16 bg-warning-50 overflow-hidden gap-16 flex-wrap z-1 mt-20">
            <div class="row gy-4">
                <div class="col-sm-12">
                    <div class="px-20 py-20">
                        <div class="d-flex justify-content-between align-items-center mt-3">                  
                            <div>
                                <h4 class="mb-2"> Lengkapi Profil Terlebih Dahulu </h4>
                                <p class="mb-3">
                                    @switch($completionLevel)
                                        @case('incomplete')
                                            Lengkapi data universitas dan informasi pribadi Anda terlebih dahulu.
                                            @break
                                        @case('profile-complete')
                                            Tambahkan keahlian Anda untuk melengkapi profil.
                                            @break
                                        @case('skills-complete')
                                            Periksa kembali bagian profil agar lengkap seluruhnya.
                                            @break
                                        @default
                                            Silakan lengkapi semua bagian profil Anda terlebih dahulu.
                                    @endswitch
                                </p>
                            </div>
                            <a href="{{ route('profile.edit') }}" class="btn btn-warning">Lengkapi Profil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif($pengajuanAktif)
        {{-- TAMBAHAN: Tampilkan status pengajuan aktif --}}
        <div class="position-relative rounded-16 bg-info-100 overflow-hidden gap-16 flex-wrap z-1 mt-20">
            <div class="row gy-4">
                <div class="col-sm-12">
                    <div class="px-20 py-20">
                        <div class="d-flex justify-content-between align-items-center mt-3">                  
                            <div>
                                <h4 class="mb-2">Pengajuan Aktif Ditemukan</h4> 
                                <p>Anda memiliki pengajuan dengan status: <strong>{{ ucfirst($pengajuanAktif->status) }}</strong></p>
                                <small class="text-muted">Kode: {{ $pengajuanAktif->kode_pengajuan ?? 'N/A' }}</small>                   
                            </div>
                            <a href="{{ route('pengajuan.index') }}" class="btn btn-info">Lihat Pengajuan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif(!$pengajuanAktif && $completionStatus['level'] === 'skills-complete')
        {{-- PERBAIKAN: Tambah kondisi lebih ketat --}}
        <div class="position-relative rounded-16 bg-primary-100 overflow-hidden gap-16 flex-wrap z-1 mt-20">
            <div class="row gy-4">
                <div class="col-sm-12">
                    <div class="px-20 py-20">
                        <div class="d-flex justify-content-between align-items-center mt-3">                  
                            <div>
                                <h4 class="mb-2">Profil Anda Sudah Lengkap</h4> 
                                <p>Anda dapat melakukan pengajuan magang sekarang</p>                   
                            </div>
                            {{-- PERBAIKAN: Tambah onclick confirmation untuk debug --}}
                            <a href="{{ route('pengajuan.tipe') }}" 
                               class="btn btn-primary"
                               onclick="console.log('Button clicked:', new Date()); return true;">
                                Ajukan Magang Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        {{-- DEBUG: Tampilkan kondisi yang tidak terpenuhi --}}
        <div class="position-relative rounded-16 bg-secondary-100 overflow-hidden gap-16 flex-wrap z-1 mt-20">
            <div class="row gy-4">
                <div class="col-sm-12">
                    <div class="px-20 py-20">
                        <div class="d-flex justify-content-between align-items-center mt-3">                  
                            <div>
                                <h4 class="mb-2">Debug Info</h4> 
                                <p>Completion Level: {{ $completionStatus['level'] ?? 'unknown' }}</p>
                                <p>Has Pengajuan Aktif: {{ $pengajuanAktif ? 'Yes' : 'No' }}</p>
                                <p>Pengajuan Status: {{ $pengajuanAktif->status ?? 'N/A' }}</p>                   
                            </div>
                            <a href="{{ route('pengajuan.index') }}" class="btn btn-secondary">Lihat Status</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>