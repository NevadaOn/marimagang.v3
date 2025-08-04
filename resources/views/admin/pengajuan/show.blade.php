@extends('layouts.superadmin')

@section('title', 'Detail Pengajuan')

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<style>
    .card {
        border: 1px solid #e3e6f0;
        border-radius: 0.35rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        margin-left: 10px;
        margin-right: 10px;
    }
    
    .card-header {
        background-color: #f8f9fc;
        border-bottom: 1px solid #e3e6f0;
        padding: 1rem 1.25rem;
        border-radius: 0.35rem 0.35rem 0 0;
    }
    
    .card-body {
        padding: 1.25rem;
    }
    
    .status-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        font-size: 0.875rem;
        font-weight: 600;
    }
    
    .status-diterima {
        background-color: #d4edda;
        color: #155724;
    }
    
    .status-ditolak {
        background-color: #f8d7da;
        color: #721c24;
    }
    
    .status-menunggu {
        background-color: #fff3cd;
        color: #856404;
    }
    
    .status-diproses {
        background-color: #cce5ff;
        color: #004085;
    }
    
    .status-diteruskan {
        background-color: #e2e3e5;
        color: #383d41;
    }
    
    .info-row {
        display: flex;
        justify-content: space-between;
        padding: 0.5rem 0;
        border-bottom: 1px solid #eee;
    }
    
    .info-row:last-child {
        border-bottom: none;
    }
    
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 1rem;
    }
    
    .table th,
    .table td {
        padding: 0.75rem;
        border: 1px solid #dee2e6;
        text-align: left;
    }
    
    .table th {
        background-color: #f8f9fa;
        font-weight: 600;
    }
    
    .table tbody tr:hover {
        background-color: #f5f5f5;
    }
    
    .btn {
        padding: 0.375rem 0.75rem;
        border-radius: 0.25rem;
        border: 1px solid transparent;
        font-weight: 400;
        line-height: 1.5;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.15s ease-in-out;
    }
    
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
    }
    
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
    
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        color: #fff;
    }
    
    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }
    
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }
    
    .form-control {
        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    
    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
    
    .form-group {
        margin-bottom: 1rem;
    }
    
    .form-label {
        margin-bottom: 0.5rem;
        font-weight: 600;
    }
    
    .badge {
        display: inline-block;
        padding: 0.25em 0.4em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0.25rem;
    }
    
    .badge-primary {
        color: #fff;
        background-color: #007bff;
    }
    
    .badge-success {
        color: #fff;
        background-color: #28a745;
    }
    
    .badge-info {
        color: #fff;
        background-color: #17a2b8;
    }
    
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1050;
        display: none;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }
    
    .modal.show {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
    }
    
    .modal-dialog {
        max-width: 90%;
        width: 800px;
        max-height: 90vh;
        position: relative;
    }
    
    .modal-content {
        background-color: #fff;
        border-radius: 0.3rem;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        display: flex;
        flex-direction: column;
        height: 80vh;
    }
    
    .modal-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem 1.5rem;
        border-bottom: 1px solid #dee2e6;
        background: linear-gradient(135deg, rgb(11, 87, 189) 0%, rgb(95, 164, 228) 50%, rgb(160, 210, 235) 100%);
        color: #fff;
    }
    
    .modal-body {
        flex: 1;
        padding: 0;
        overflow: hidden;
    }
    .modal-title{
        color: white;
    }
    
    .modal-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem 1.5rem;
        border-top: 1px solid #dee2e6;
        background-color: #f8f9fa;
    }
    
    .close {
        background: none;
        border: 0;
        font-size: 1.5rem;
        color: #fff;
        cursor: pointer;
    }
    
    .close:hover {
        opacity: 0.75;
    }
    
    .preview-container {
        width: 100%;
        height: 100%;
        border: none;
    }
    
    .loading-spinner {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 200px;
        flex-direction: column;
    }
    
    .spinner {
        width: 40px;
        height: 40px;
        border: 4px solid #f3f3f3;
        border-top: 4px solid #007bff;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
    }
    
    .col-md-6 {
        flex: 0 0 50%;
        max-width: 50%;
        padding-right: 15px;
        padding-left: 15px;
    }
    
    .col-12 {
        flex: 0 0 100%;
        max-width: 100%;
        padding-right: 15px;
        padding-left: 15px;
    }
    
    .text-center {
        text-align: center;
    }
    
    .mb-3 {
        margin-bottom: 1rem;
    }
    
    .mb-4 {
        margin-bottom: 1.5rem;
    }
    
    .d-flex {
        display: flex;
    }
    
    .align-items-center {
        align-items: center;
    }
    
    .justify-content-between {
        justify-content: space-between;
    }
    
    .me-2 {
        margin-right: 0.5rem;
    }
    
    .me-3 {
        margin-right: 1rem;
    }
    
    .breadcrumb {
        display: flex;
        flex-wrap: wrap;
        padding: 0.75rem 1rem;
        margin-bottom: 1rem;
        list-style: none;
        background-color: #e9ecef;
        border-radius: 0.25rem;
    }
    
    .breadcrumb-item {
        display: flex;
        align-items: center;
    }
    
    .breadcrumb-item:not(:last-child):after {
        content: "/";
        padding: 0 0.5rem;
        color: #6c757d;
    }
    
    .breadcrumb-item a {
        color: #007bff;
        text-decoration: none;
    }
    
    .breadcrumb-item a:hover {
        text-decoration: underline;
    }
    
    .breadcrumb-item.active {
        color: #6c757d;
    }
</style>
@endpush

@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <!-- Page Title -->
            <div class="mb-4" style="text-align: end; padding: 20px 50px 10px 0px;">
                <h1 class="h3 mb-3">Detail Pengajuan</h1>
                <p class="text-muted">Informasi lengkap pengajuan magang mahasiswa</p>
            </div>

            <!-- Informasi Umum -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        Informasi Umum
                    </h5>

                    <!-- Dropdown Button -->
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Opsi
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalKelolaSurat">
                                    Kelola Surat Bangkespol
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#updateTanggalModal">
                                    Ubah Tanggal
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalBidang">
                                    Ubah Bidang
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalForm">
                                    Form Kesediaan Magang
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalKomentar">
                                    Komentar ke Admin/User
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-row">
                                <span class="fw-bold">Kode Pengajuan:</span>
                                <span class="font-monospace">{{ $pengajuan->kode_pengajuan }}</span>
                            </div>
                            <div class="info-row">
                                <span class="fw-bold">Nama Mahasiswa:</span>
                                <span>{{ $pengajuan->user->nama ?? '-' }}</span>
                            </div>
                            <div class="info-row">
                                <span class="fw-bold">NIM:</span>
                                <span class="font-monospace">{{ $pengajuan->user->nim ?? '-' }}</span>
                            </div>
                            <div class="info-row">
                                <span class="fw-bold">Universitas:</span>
                                <span>{{ $pengajuan->user->universitas->nama_universitas ?? '-' }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-row">
                                <span class="fw-bold">Bidang:</span>
                                <span>{{ $pengajuan->databidang->nama ?? '-' }}</span>
                            </div>
                            <div class="info-row">
                                <span class="fw-bold">Tanggal Mulai:</span>
                                <span>{{ $pengajuan->tanggal_mulai->format('d M Y') }}</span>
                            </div>
                            <div class="info-row">
                                <span class="fw-bold">Tanggal Selesai:</span>
                                <span>{{ $pengajuan->tanggal_selesai->format('d M Y') }}</span>
                            </div>
                            <div class="info-row">
                                <span class="fw-bold">Status:</span>
                                <span class="status-badge
                                    @switch($pengajuan->status)
                                        @case('diterima') status-diterima @break
                                        @case('ditolak') status-ditolak @break
                                        @case('diproses') status-diproses @break
                                        @case('diteruskan') status-diteruskan @break
                                        @case('magang') status-magang @break
                                        @case('selesai') status-selesai @break
                                        @default status-pending
                                    @endswitch">
                                    
                                    @switch($pengajuan->status)
                                        @case('diterima')
                                            <i class="fas fa-check-circle me-1"></i> Diterima
                                            @break
                                        @case('ditolak')
                                            <i class="fas fa-times-circle me-1"></i> Ditolak
                                            @break
                                        @case('diproses')
                                            <i class="fas fa-spinner me-1"></i> Diproses
                                            @break
                                        @case('diteruskan')
                                            <i class="fas fa-paper-plane me-1"></i> Diteruskan
                                            @break
                                        @case('magang')
                                            <i class="fas fa-user-tie me-1"></i> Magang
                                            @break
                                        @case('selesai')
                                            <i class="fas fa-check-double me-1"></i> Selesai
                                            @break
                                        @default
                                            <i class="fas fa-clock me-1"></i> Pending
                                    @endswitch
                                </span>
                            </div>
                        </div>
                    </div>
                    @if($pengajuan->komentar_admin)
                    <div class="mt-4 p-3" style="background-color: #f8f9fa; border-radius: 0.25rem;">
                        <h6 class="fw-bold mb-2">catatan Admin Dinas untuk Admin Bidang</h6>
                        <p class="mb-0">{{ $pengajuan->komentar_admin }}</p>
                    </div>
                    @endif
                </div>
<p class="fw-semibold mb-2" style="text-align: center;">Lampiran surat dari Dinas:</p>
<div class="d-flex justify-content-between align-items-center flex-wrap gap-2" style="margin: 15px;">
    @if($pengajuan->form_kesediaan_magang)
        <a href="{{ asset('storage/' . $pengajuan->form_kesediaan_magang) }}" class="btn btn-success" target="_blank">
            Lihat Form Kesediaan Magang
        </a>
    @endif

    @if ($pengajuan->surat_pdf)
        <button onclick="showPreview('{{ asset('storage/' . $pengajuan->surat_pdf) }}', '{{ basename($pengajuan->surat_pdf) }}')"
                class="btn btn-primary btn-sm">
            <i class="fas fa-eye me-1"></i>
            Lihat Surat Bangkespol
        </button>
    @endif
</div>

            </div>

           <!-- Anggota Kelompok (termasuk Ketua) -->
@php
    $ketuaUser = $pengajuan->user;

    $semuaMahasiswa = collect([
        [
            'nama' => $ketuaUser->nama ?? '-',
            'nim' => $ketuaUser->nim ?? '-',
            'email' => $ketuaUser->email ?? '-',
            'status' => 'Ketua',
            'userSkills' => $ketuaUser->userSkills->map(function ($skill) {
                return [
                    'skill_name' => $skill->skill->nama ?? null,
                    'level' => $skill->level,
                    'sertifikat_path' => $skill->sertifikat_path,
                ];
            })->toArray(),
        ]
    ])->merge(
        $pengajuan->anggota
            ->filter(fn($a) => strtolower($a->role) !== 'ketua')
            ->map(function ($anggota) {
                return [
                    'nama' => $anggota->nama,
                    'nim' => $anggota->nim,
                    'email' => $anggota->email,
                    'status' => ucfirst($anggota->role ?? 'Anggota'),
                    'userSkills' => $anggota->skill ? [[
                        'skill_name' => $anggota->skill,
                        'level' => '....', 
                        'sertifikat_path' => null,
                    ]] : [],
                ];
            })
    );
@endphp


@if($semuaMahasiswa->count())
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">
            <i class="fas fa-users me-2"></i>
            Anggota Kelompok
            <span class="badge badge-success ms-2">{{ $semuaMahasiswa->count() }} Orang</span>
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Keahlian</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($semuaMahasiswa->values() as $i => $entry)
    <tr>
        <td class="text-center">{{ $i + 1 }}</td>
        <td>{{ $entry['nama'] }}</td>
        <td class="font-monospace">{{ $entry['nim'] ?? '-' }}</td>
        <td class="text-center">
            <span class="badge bg-primary">{{ $entry['status'] }}</span>
        </td>
        <td>
            @if(isset($entry['userSkills']) && count($entry['userSkills']) > 0)
                <ul class="mb-0 ps-3 list-unstyled">
                    @foreach($entry['userSkills'] as $userSkill)
                        <li>
                            {{ $userSkill['skill_name'] ?? 'Skill tidak ditemukan' }}
                            ({{ ucfirst($userSkill['level']) }})
                            @if (!empty($userSkill['sertifikat_path']))
                                <button onclick="showPreview('{{ asset('storage/' . $userSkill['sertifikat_path']) }}', '{{ basename($userSkill['sertifikat_path']) }}')"
                                        class="btn btn-primary btn-sm" style="margin: 0px 0px 10px 10px">
                                    <i class="fas fa-eye me-1"></i>
                                    Lihat Sertifikat
                                </button>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @else
                <span class="text-muted">Belum ada keahlian</span>
            @endif
        </td>
    </tr>
@endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endif


            <!-- Dokumen Pengajuan -->
            @if($pengajuan->documents->count())
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-file-alt me-2"></i>
                        Dokumen Pengajuan
                        <span class="badge badge-info ms-2">{{ $pengajuan->documents->count() }} Dokumen</span>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Dokumen</th>
                                    <th>Nama File</th>
                                    <th>Ukuran</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pengajuan->documents as $i => $doc)
                                <tr>
                                    <td class="text-center">{{ $i + 1 }}</td>
                                    <td>
                                        <span class="badge badge-primary">
                                            {{ ucfirst(str_replace('_', ' ', $doc->document_type)) }}
                                        </span>
                                    </td>
                                    <td class="font-monospace">{{ $doc->file_name }}</td>
                                    <td>{{ number_format($doc->file_size / 1024, 2) }} KB</td>
                                    <td class="text-center">
                                        <button onclick="showPreview('{{ route('admin.pengajuan.download', ['id' => $pengajuan->id, 'document' => $doc->file_name]) }}', '{{ $doc->file_name }}')" 
                                                class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye me-1"></i>
                                            Preview
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif

            @php
                $admin = auth('admin')->user();
                $statusOptions = [];

                if ($admin->role === 'superadmin') {
                    $statusOptions = ['pending', 'diproses', 'diteruskan', 'diterima', 'ditolak'];
                } elseif ($admin->role === 'admin_dinas' && $pengajuan->status === 'pending') {
                    $statusOptions = ['diteruskan', 'ditolak'];
                } elseif ($admin->role === 'admin_bidang' && $pengajuan->status === 'diteruskan') {
                    $statusOptions = ['diproses', 'diterima', 'ditolak'];
                }
            @endphp
            <div class="modal fade" id="modalKelolaSurat" tabindex="-1" aria-labelledby="modalKelolaSuratLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); margin: 0;">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalKelolaSuratLabel">
                        Kelola Surat Bakesbangpol
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                        @include('partials.kelola_surat_pengajuan') 
                    </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modalBidang" tabindex="-1" aria-labelledby="modalBidangLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); margin: 0;">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBidangLabel">
                    Ubah Bidang
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <!-- Tempatkan form surat di sini seperti sebelumnya -->
                    @include('partials.ubah_bidang') 
                    {{-- Atau langsung tempel kode form jika tidak menggunakan partial --}}
                </div>
                </div>
            </div>
            </div>
            <div class="modal fade" id="updateTanggalModal" tabindex="-1" aria-labelledby="updateTanggalModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); margin: 0;">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalKelolaSuratLabel">
                    Ubah  Tanggal
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                    <!-- Tempatkan form surat di sini seperti sebelumnya -->
                    @include('partials.ubah_tanggal') 
                    {{-- Atau langsung tempel kode form jika tidak menggunakan partial --}}
                </div>
            </div>
            </div>
            <div class="modal fade" id="modalKomentar" tabindex="-1" aria-labelledby="modalKomentarLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); margin: 0;">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalKomentarLabel">
                    Kirim Komentar
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <!-- Tempatkan form surat di sini seperti sebelumnya -->
                    @include('partials.kirim_komentar') 
                    {{-- Atau langsung tempel kode form jika tidak menggunakan partial --}}
                </div>
                </div>
            </div>
            </div>
            <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="modalFormLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); margin: 0;">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormLabel">
                    Form Kesediaan Magang
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <!-- Tempatkan form surat di sini seperti sebelumnya -->
                    @include('partials.form_kesediaan_magang') 
                    {{-- Atau langsung tempel kode form jika tidak menggunakan partial --}}
                </div>
                </div>
            </div>
            </div>
            

            @if (!empty($statusOptions))
            <div class="card">
                <div class="card-header ">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-cogs me-2"></i>
                        Aksi Pengajuan
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="mb-0">Silakan pilih tindakan yang ingin dilakukan terhadap pengajuan ini</p>
                        </div>
                        <form action="{{ route('admin.pengajuan.updateStatus', $pengajuan->id) }}" method="POST" class="d-flex align-items-center">
                            @csrf
                            @method('PUT')
                            <label for="status" class="form-label me-3 mb-0">Ubah Status:</label>
                            <select name="status" id="status" class="form-control me-2" style="width: auto;">
                                @foreach ($statusOptions as $status)
                                    <option value="{{ $status }}" {{ $pengajuan->status === $status ? 'selected' : '' }}>
                                        {{ ucfirst($status) }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin mengubah status?')" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>
                                Simpan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endif

{{-- <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateTanggalModal">
    Ubah Tanggal Magang
</button> --}}
{{-- <div class="modal fade" id="updateTanggalModal" tabindex="-1" aria-labelledby="updateTanggalModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); margin: 0;">
    <div class="modal-content">
      <form action="{{ route('admin.pengajuan.updateTanggal', $pengajuan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="modal-header">
          <h5 class="modal-title" id="updateTanggalModalLabel">Ubah Tanggal Magang</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" value="{{ $pengajuan->tanggal_mulai }}">
          </div>

          <div class="mb-3">
            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" value="{{ $pengajuan->tanggal_selesai }}">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div> --}}
{{-- @if (in_array(auth()->guard('admin')->user()->role, ['superadmin', 'admin_dinas']))
    <form action="{{ route('admin.pengajuan.updateBidang', $pengajuan->id) }}" method="POST" class="mb-3">
        @csrf
        @method('PATCH')

        <label for="databidang_id" class="form-label">Pilih Bidang</label>
        <select name="databidang_id" id="databidang_id" class="form-select" required>
            @foreach ($listBidang as $bidang)
                <option value="{{ $bidang->id }}" {{ $pengajuan->databidang_id == $bidang->id ? 'selected' : '' }}>
                    {{ $bidang->nama }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary mt-2">Simpan Bidang</button>
    </form>
@endif --}}

{{-- <form action="{{ route('admin.pengajuan.kirimCatatan', $pengajuan->id) }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="tujuan" class="form-label">Tujuan Komentar</label>
        <select name="tujuan" id="tujuan" class="form-select" required>
            <option value="user">User</option>
            <option value="admin_bidang">Admin Bidang</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="komentar_admin" class="form-label">Isi Komentar</label>
        <textarea name="komentar_admin" class="form-control" rows="4" required>{{ old('komentar_admin') }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Kirim</button>
</form> --}}

{{-- @if(auth('admin')->check() && (
    (auth('admin')->user()->role === 'admin_bidang' && auth('admin')->user()->id === $pengajuan->databidang->admin_id) ||
    auth('admin')->user()->role === 'superadmin'
))
    <form action="{{ route('admin.pengajuan.kesediaan.generate', $pengajuan->id) }}" method="POST">
        @csrf
        <h5 class="font-bold mb-3">Buat Form Kesediaan Magang</h5>

        <div class="mb-2">
            <label>Penanggung Jawab</label>
            <input type="text" name="penanggung_jawab" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Nama Project</label>
            <textarea name="nama_project" class="form-control" rows="3" placeholder="Masukkan judul/deskripsi project" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Generate Form</button>
    </form>

    @if($pengajuan->form_kesediaan_magang)
        <a href="{{ asset('storage/' . $pengajuan->form_kesediaan_magang) }}" class="btn btn-success mt-2" target="_blank">
            Lihat Form Kesediaan Magang
        </a>
    @endif
@endif
 --}}

<!-- Preview Modal -->
<div id="previewModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title">Preview Dokumen</h5>
                    <small id="previewTitle">Memuat dokumen...</small>
                </div>
                <button type="button" class="close" onclick="closePreview()">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="previewLoading" class="loading-spinner">
                    <div class="spinner"></div>
                    <p class="mt-3">Memuat dokumen...</p>
                </div>
                <div id="previewContent" style="display: none; height: 100%;">
                    <iframe id="previewFrame" class="preview-container"></iframe>
                </div>
            </div>
            <div class="modal-footer">
                <div>
                    <small id="fileInfo" class="text-muted">Informasi file</small>
                </div>
                <div>
                    <button onclick="downloadFile()" class="btn btn-primary btn-sm">
                        <i class="fas fa-download me-1"></i>
                        Download
                    </button>
                    <button onclick="closePreview()" class="btn btn-secondary btn-sm">
                        <i class="fas fa-times me-1"></i>
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
let currentFileUrl = '';
let currentFileName = '';

function showPreview(url, fileName = '') {
    const modal = document.getElementById('previewModal');
    const loading = document.getElementById('previewLoading');
    const content = document.getElementById('previewContent');
    const frame = document.getElementById('previewFrame');
    const title = document.getElementById('previewTitle');
    const fileInfo = document.getElementById('fileInfo');
    
    modal.classList.add('show');
    loading.style.display = 'flex';
    content.style.display = 'none';
    
    currentFileUrl = url;
    currentFileName = fileName || 'dokumen';
    title.textContent = currentFileName;
    
    const fileExtension = getFileExtension(currentFileName);
    fileInfo.textContent = `${fileExtension ? fileExtension.toUpperCase() : 'FILE'} • ${currentFileName}`;
    
    // Cek apakah URL adalah route download atau direct asset
    if (isRouteUrl(url)) {
        // Jika route download, konversi ke blob URL untuk preview
        handleRoutePreview(url, fileExtension);
    } else {
        // Jika direct asset, gunakan cara lama
        handleDirectPreview(url, fileExtension);
    }
}

function isRouteUrl(url) {
    // Cek apakah URL mengandung route pattern (misal: mengandung 'download' atau parameter)
    return url.includes('/download') || url.includes('/admin/pengajuan/') || url.includes('?') || url.includes('&');
}

function handleRoutePreview(url, fileExtension) {
    // Fetch file melalui route dan convert ke blob
    fetch(url, {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,image/*'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.blob();
    })
    .then(blob => {
        const blobUrl = URL.createObjectURL(blob);
        loadPreviewFrame(blobUrl, fileExtension);
    })
    .catch(error => {
        console.error('Error fetching file:', error);
        showPreviewError('Gagal memuat dokumen. Silakan coba lagi.');
    });
}

function handleDirectPreview(url, fileExtension) {
    // Langsung load dengan delay seperti biasa
    setTimeout(() => {
        loadPreviewFrame(url, fileExtension);
    }, 500);
}

function loadPreviewFrame(url, fileExtension) {
    const frame = document.getElementById('previewFrame');
    const loading = document.getElementById('previewLoading');
    const content = document.getElementById('previewContent');
    
    try {
        if (fileExtension === 'pdf') {
            // Untuk PDF, load langsung
            frame.src = url + '#toolbar=1&navpanes=1&scrollbar=1&view=FitH';
        } else if (['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'].includes(fileExtension)) {
            // Untuk gambar, buat img element di dalam iframe
            const imgHtml = `
                <html>
                <head>
                    <style>
                        body { margin: 0; padding: 20px; text-align: center; background: #f5f5f5; }
                        img { max-width: 100%; height: auto; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
                    </style>
                </head>
                <body>
                    <img src="${url}" alt="Preview Image" />
                </body>
                </html>
            `;
            frame.src = 'data:text/html;charset=utf-8,' + encodeURIComponent(imgHtml);
        } else {
            // Untuk dokumen lain, coba Google Docs Viewer
            frame.src = `https://docs.google.com/viewer?url=${encodeURIComponent(url)}&embedded=true`;
        }
        
        // Handle iframe load event
        frame.onload = function() {
            loading.style.display = 'none';
            content.style.display = 'block';
        };
        
        // Fallback jika iframe tidak load dalam 10 detik
        setTimeout(() => {
            if (loading.style.display !== 'none') {
                // Jika Google Docs Viewer gagal, coba direct link
                if (frame.src.includes('docs.google.com')) {
                    frame.src = url;
                } else {
                    showPreviewError('Dokumen tidak dapat ditampilkan. Silakan download untuk melihat isi file.');
                }
            }
        }, 10000);
        
    } catch (error) {
        console.error('Error loading preview:', error);
        showPreviewError('Terjadi kesalahan saat memuat preview dokumen.');
    }
}

function showPreviewError(message) {
    const loading = document.getElementById('previewLoading');
    const content = document.getElementById('previewContent');
    const frame = document.getElementById('previewFrame');
    
    const errorHtml = `
        <html>
        <head>
            <style>
                body { 
                    margin: 0; 
                    padding: 40px; 
                    text-align: center; 
                    font-family: Arial, sans-serif;
                    background: #f8f9fa;
                }
                .error-container {
                    background: white;
                    padding: 30px;
                    border-radius: 8px;
                    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                    max-width: 500px;
                    margin: 0 auto;
                }
                .error-icon {
                    font-size: 48px;
                    color: #dc3545;
                    margin-bottom: 20px;
                }
                .error-message {
                    color: #6c757d;
                    font-size: 16px;
                    margin-bottom: 20px;
                }
                .download-btn {
                    background: #007bff;
                    color: white;
                    padding: 10px 20px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                    font-size: 14px;
                    text-decoration: none;
                    display: inline-block;
                }
                .download-btn:hover {
                    background: #0056b3;
                }
            </style>
        </head>
        <body>
            <div class="error-container">
                <div class="error-icon">📄</div>
                <div class="error-message">${message}</div>
                <a href="${currentFileUrl}" class="download-btn" target="_blank">
                    📥 Download File
                </a>
            </div>
        </body>
        </html>
    `;
    
    frame.src = 'data:text/html;charset=utf-8,' + encodeURIComponent(errorHtml);
    loading.style.display = 'none';
    content.style.display = 'block';
}

function getFileExtension(filename) {
    if (!filename) return '';
    return filename.split('.').pop().toLowerCase();
}

function closePreview() {
    const modal = document.getElementById('previewModal');
    const frame = document.getElementById('previewFrame');
    
    modal.classList.remove('show');
    frame.src = '';
    
    // Clean up blob URLs to prevent memory leaks
    if (currentFileUrl && currentFileUrl.startsWith('blob:')) {
        URL.revokeObjectURL(currentFileUrl);
    }
    
    currentFileUrl = '';
    currentFileName = '';
}

function downloadFile() {
    if (currentFileUrl) {
        // Jika blob URL, trigger download dengan nama file
        if (currentFileUrl.startsWith('blob:')) {
            const link = document.createElement('a');
            link.href = currentFileUrl;
            link.download = currentFileName;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        } else {
            // Jika URL biasa, buka di tab baru
            window.open(currentFileUrl, '_blank');
        }
    }
}

// Close modal when clicking outside
document.getElementById('previewModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closePreview();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && document.getElementById('previewModal').classList.contains('show')) {
        closePreview();
    }
});

// Submit button loading state
document.querySelectorAll('form button[type="submit"]').forEach(button => {
    button.addEventListener('click', function (e) {
        const form = this.closest('form');
        if (form.checkValidity()) {
            e.preventDefault(); 
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memproses...';
            this.disabled = true;

            setTimeout(() => {
                this.innerHTML = originalText;
                this.disabled = false;
            }, 5000);

            form.submit();
        }
    });
});
</script>
@endpush