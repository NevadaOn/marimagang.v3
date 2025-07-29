@extends('layouts.adminbidang')

@section('title', 'Detail Pengajuan')

@push('styles')
{{-- CDN LENGKAP: Font Awesome, Tailwind, Bootstrap (untuk Modal), Alpine (untuk Tab) --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style>
    /* Seluruh CSS dari file Anda diterapkan di sini untuk memastikan visual yang sama persis */
    :root {
        --primary-color: #1e3a8a; /* Biru Kominfo */
        --secondary-color: #000000; /* Hitam */
        --accent-color: #3b82f6;
        --glass-bg: rgba(255, 255, 255, 0.06);
        --glass-border: rgba(255, 255, 255, 0.1);
        --text-primary: rgba(255, 255, 255, 0.95);
        --text-secondary: rgba(255, 255, 255, 0.7);
        --gradient-1: linear-gradient(135deg, #1e3a8a, #3b82f6);
        --gradient-2: linear-gradient(135deg, #000000, #374151);
        --gradient-success: linear-gradient(135deg, #059669, #10b981);
        --gradient-danger: linear-gradient(135deg, #dc2626, #ef4444);
        --gradient-warning: linear-gradient(135deg, #d97706, #f59e0b);
        --gradient-info: linear-gradient(135deg, #0891b2, #06b6d4);
    }
    body { background: #000000; min-height: 100vh; overflow-x: hidden; color: var(--text-secondary); }
    .card { background: var(--glass-bg); backdrop-filter: blur(30px); -webkit-backdrop-filter: blur(30px); border: 1px solid var(--glass-border); border-radius: 24px; margin-bottom: 0; /* Dihapus margin bottom agar spacing dikontrol oleh grid */ box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3); overflow: hidden; animation: fadeInUp 0.6s ease-out; }
    .card-header { background: rgba(255, 255, 255, 0.05); border-bottom: 1px solid var(--glass-border); padding: 1.5rem; position: relative; }
    .card-header::before { content: ''; position: absolute; bottom: 0; left: 0; width: 100%; height: 3px; background: var(--gradient-1); }
    .card-header h5 { color: var(--text-primary); font-weight: 700; margin: 0; display: flex; align-items: center; }
    .card-header i { margin-right: 0.75rem; color: #3b82f6; font-size: 1.2rem; }
    .info-row { display: flex; justify-content: space-between; align-items: center; padding: 1rem; border-bottom: 1px solid rgba(255, 255, 255, 0.08); }
    .info-row:last-child { border-bottom: none; }
    .table-responsive { max-height: 600px; overflow-y: auto; }
    .status-badge { padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.875rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; display: inline-flex; align-items: center; backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2); }
    .status-diterima { background: var(--gradient-success); color: white; }
    .status-ditolak { background: var(--gradient-danger); color: white; }
    .status-menunggu { background: var(--gradient-warning); color: white; }
    .status-diproses { background: var(--gradient-info); color: white; }
    .status-diteruskan { background: var(--gradient-2); color: white; }
    .btn { padding: 0.75rem 1.5rem; border-radius: 16px; border: none; font-weight: 600; text-align: center; cursor: pointer; transition: all 0.3s ease; backdrop-filter: blur(10px); position: relative; overflow: hidden; text-transform: uppercase; letter-spacing: 0.5px; font-size: 0.85rem; }
    .btn-primary { background: var(--gradient-1); color: white; box-shadow: 0 4px 16px rgba(30, 58, 138, 0.4); }
    .btn-success { background: var(--gradient-success); color: white; box-shadow: 0 4px 16px rgba(16, 185, 129, 0.4); }
    .btn-warning { background: var(--gradient-warning); color: white; box-shadow: 0 4px 16px rgba(245, 158, 11, 0.4); }
    .form-control, .form-select { color: var(--text-primary); background: rgba(255, 255, 255, 0.08); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.15); border-radius: 16px; transition: all 0.3s ease; }
    .form-control:focus, .form-select:focus { background: rgba(255, 255, 255, 0.12); border-color: #3b82f6; outline: 0; box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25); }
    .form-label { margin-bottom: 0.75rem; font-weight: 700; color: var(--text-primary); text-transform: uppercase; letter-spacing: 0.5px; font-size: 0.85rem; }
    .badge { backdrop-filter: blur(10px); }
    .badge-success { background: var(--gradient-success); }
    .badge-info { background: var(--gradient-info); }
    
      .modal {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1050;
        display: none;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }
    
    .modal.show {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
    }
    
    .modal-dialog {
        max-width: 90%;
        width: 900px;
        max-height: 90vh;
        position: relative;
    }
    
    .modal-content {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(30px);
        -webkit-backdrop-filter: blur(30px);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 24px;
        box-shadow: 
            0 20px 40px rgba(0, 0, 0, 0.5),
            0 4px 16px rgba(255, 255, 255, 0.1) inset;
        display: flex;
        flex-direction: column;
        height: 85vh;
        overflow: hidden;
    }
    
    .modal-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1.5rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        background: rgba(30, 58, 138, 0.2);
        color: var(--text-primary);
        position: relative;
    }

    .modal-header::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: var(--gradient-1);
    }

    .modal-title {
        font-weight: 700;
        color: var(--text-primary);
    }
    
    .modal-body {
        flex: 1;
        padding: 0;
        overflow: hidden;
        background: rgba(0, 0, 0, 0.2);
    }
    
    .modal-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1.5rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        background: rgba(255, 255, 255, 0.03);
    }
    
    .close {
        background: none;
        border: 0;
        font-size: 1.5rem;
        color: var(--text-primary);
        cursor: pointer;
        padding: 0.5rem;
        border-radius: 50%;
        transition: all 0.3s ease;
    }
    
    .close:hover {
        background: rgba(255, 255, 255, 0.1);
        transform: scale(1.1);
    }
    
    .preview-container {
        width: 100%;
        height: 100%;
        border: none;
        background: white;
    }
    
    .loading-spinner {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 200px;
        flex-direction: column;
        color: var(--text-secondary);
    }
    
    .spinner {
        width: 40px;
        height: 40px;
        border: 4px solid rgba(255, 255, 255, 0.1);
        border-top: 4px solid #3b82f6;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    /* Style spesifik untuk Preview Modal dari JS baru Anda */
    #previewModal { position: fixed; top: 0; left: 0; z-index: 1055; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.8); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); display: none; }
    #previewModal.show { display: flex; align-items: center; justify-content: center; }
    .spinner { width: 40px; height: 40px; border: 4px solid rgba(255, 255, 255, 0.1); border-top: 4px solid #3b82f6; border-radius: 50%; animation: spin 1s linear infinite; }
    @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
    @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }


    /* Scrollbar styling */
    ::-webkit-scrollbar { width: 8px; height: 8px; }
    ::-webkit-scrollbar-track { background: rgba(255, 255, 255, 0.05); }
    ::-webkit-scrollbar-thumb { background: var(--gradient-1); border-radius: 4px; }
    @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
</style>
@endpush

@section('content')
<div class="p-4 sm:p-6 lg:p-8">

    <div class="mb-4 card p-4" style="text-align: left; padding: 20px 50px 10px 0px;">
        <h1 class="h3 mb-3 fw-bold fs-1 " style="color: white; background: var(--gradient-1); text;background-clip: text;">Detail Pengajuan</h1>
        <p class="text-muted">Informasi lengkap pengajuan magang mahasiswa</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- ============================================= --}}
        {{-- ============ KOLOM KIRI: KONTEN UTAMA ============ --}}
        {{-- ============================================= --}}
        <div class="lg:col-span-2 space-y-8">

            {{-- START: Kartu Informasi Umum --}}
            <div class="card">
                <div class="card-header"><h5><i class="fas fa-info-circle"></i>Informasi Umum</h5></div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-row"><span class="fw-bold text-white">Kode Pengajuan:</span><span class="card p-2 font-monospace text-blue-400">{{ $pengajuan->kode_pengajuan }}</span></div>
                            <div class="info-row"><span class="fw-bold text-white">Nama Mahasiswa:</span><span>{{ $pengajuan->user->nama ?? '-' }}</span></div>
                            <div class="info-row"><span class="fw-bold text-white">NIM:</span><span class="card p-2  font-monospace text-cyan-400">{{ $pengajuan->user->nim ?? '-' }}</span></div>
                            <div class="info-row"><span class="fw-bold text-white">Universitas:</span><span class="">{{ $pengajuan->user->universitas->nama_universitas ?? '-' }}</span></div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-row"><span class="fw-bold text-white">Bidang:</span><span>{{ $pengajuan->databidang->nama ?? '-' }}</span></div>
                            <div class="info-row"><span class="fw-bold text-white">Tanggal Mulai:</span><span>{{ $pengajuan->tanggal_mulai->format('d M Y') }}</span></div>
                            <div class="info-row"><span class="fw-bold text-white">Tanggal Selesai:</span><span>{{ $pengajuan->tanggal_selesai->format('d M Y') }}</span></div>
                            <div class="info-row"><span class="fw-bold text-white">Status:</span>
                                <span class="status-badge @switch($pengajuan->status) @case('diterima') status-diterima @break @case('ditolak') status-ditolak @break @case('diproses') status-diproses @break @case('diteruskan') status-diteruskan @break @default status-menunggu @endswitch">
                                    @switch($pengajuan->status)
                                        @case('diterima')<i class="fas fa-check-circle me-1"></i> Diterima @break
                                        @case('ditolak')<i class="fas fa-times-circle me-1"></i> Ditolak @break
                                        @case('diproses')<i class="fas fa-spinner fa-spin me-1"></i> Diproses @break
                                        @case('diteruskan')<i class="fas fa-paper-plane me-1"></i> Diteruskan @break
                                        @default<i class="fas fa-clock me-1"></i> Menunggu
                                    @endswitch
                                </span>
                            </div>
                        </div>
                    </div>
                    @if($pengajuan->komentar_admin)
                    <div class="admin-comment mt-4 p-4"><h6>Catatan Admin Dinas</h6><p class="mb-0">{{ $pengajuan->komentar_admin }}</p></div>
                    @endif
                </div>
            </div>
            {{-- END: Kartu Informasi Umum --}}

            {{-- START: Tabel Anggota Kelompok --}}
            @php
                $semuaMahasiswa = collect([['user' => $pengajuan->user, 'status' => 'Ketua']])->merge($pengajuan->anggota->map(fn ($anggota) => ['user' => $anggota->user, 'status' => ucfirst($anggota->status)]))->unique(fn($item) => $item['user']->id);
            @endphp
            @if($semuaMahasiswa->count())
            <div class="card">
                <div class="card-header"><h5><i class="fas fa-users"></i>Anggota Kelompok <span class="badge badge-success ms-2">{{ $semuaMahasiswa->count() }} Orang</span></h5></div>
                <div class="table-responsive">
                     <table class="min-w-full divide-y divide-white/10 text-sm text-left text-white">
        <thead class=" bg-white/5 backdrop-blur-sm text-white">
            <tr>
                <th class="px-4 py-3 font-semibold text-center">No</th>
                <th class="px-4 py-3 font-semibold">Nama</th>
                <th class="px-4 py-3 font-semibold">NIM</th>
                <th class="px-4 py-3 font-semibold text-center">Status</th>
                <th class="px-4 py-3 font-semibold">Keahlian</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/10 ">
            @foreach($semuaMahasiswa->values() as $i => $entry)
                @php $user = $entry['user']; @endphp
                <tr class="hover:bg-white/10 transition duration-150">
                    <td class="px-4 py-3 text-center">{{ $i + 1 }}</td>
                    <td class="px-4 py-3">{{ $user->nama }}</td>
                    <td class="px-4 py-3 font-mono">{{ $user->nim }}</td>
                    <td class="px-4 py-3 text-center">
                        <span class="inline-block rounded-full bg-blue-600/80 px-2 py-1 text-xs font-semibold text-white">
                            {{ $entry['status'] }}
                        </span>
                    </td>
                    <td class="px-4 py-3">
                        @if($user->userSkills->isNotEmpty())
                            <ul class="space-y-1 pl-4 list-disc">
                                @foreach($user->userSkills as $userSkill)
                                    <li>
                                        {{ $userSkill->skill->nama ?? 'Skill tidak ditemukan' }}
                                        ({{ ucfirst($userSkill->level) }})
                                        @if ($userSkill->sertifikat_path)
                                            <button onclick="showPreview('{{ asset('storage/' . $userSkill->sertifikat_path) }}', '{{ basename($userSkill->sertifikat_path) }}')" class="ml-2 inline-flex items-center gap-1 px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white text-xs rounded shadow">
                                                <i class="fas fa-eye"></i> Sertifikat
                                            </button>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <span class="text-gray-300 italic">Belum ada keahlian</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
                </div>
            </div>
            @endif
            {{-- END: Tabel Anggota Kelompok --}}

            {{-- START: Tabel Dokumen Pengajuan --}}
            @if($pengajuan->documents->count())
            <div class="card">
                <div class="card-header"><h5><i class="fas fa-file-alt"></i>Dokumen Pengajuan <span class="badge badge-info ms-2">{{ $pengajuan->documents->count() }} Dokumen</span></h5></div>
                <div class="table-responsive">
                   <table class="min-w-full divide-y divide-gray-300 text-sm text-left text-white">
        <thead class="bg-gray-800 text-xs uppercase">
            <tr>
                <th class="px-4 py-3 text-center">No</th>
                <th class="px-4 py-3">Jenis Dokumen</th>
                <th class="px-4 py-3">Nama File</th>
                <th class="px-4 py-3">Ukuran</th>
                <th class="px-4 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-700 bg-gray-900/40 backdrop-blur-sm">
        @foreach($pengajuan->documents as $i => $doc)
            <tr>
                <td class="px-4 py-3 text-center">{{ $i + 1 }}</td>
                <td class="px-4 py-3">
                    <span class="inline-block bg-indigo-600 text-white text-xs font-semibold px-3 py-1 rounded-full">
                        {{ ucfirst(str_replace('_', ' ', $doc->document_type)) }}
                    </span>
                </td>
                <td class="px-4 py-3 font-mono">{{ $doc->file_name }}</td>
                <td class="px-4 py-3">{{ number_format($doc->file_size / 1024, 2) }} KB</td>
                <td class="px-4 py-3 text-center">
                    <button 
                        onclick="showPreview('{{ route('admin.pengajuan.download', ['id' => $pengajuan->id, 'document' => $doc->file_name]) }}', '{{ $doc->file_name }}')" 
                        class="inline-flex items-center px-3 py-1 text-xs bg-blue-500 text-white rounded hover:bg-blue-600">
                        <i class="fas fa-eye mr-1"></i>Preview
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
                </div>
            </div>
            @endif
            {{-- END: Tabel Dokumen Pengajuan --}}

        </div>

        {{-- ============================================= --}}
        {{-- ============ KOLOM KANAN: PANEL AKSI ============ --}}
        {{-- ============================================= --}}
       <div class="lg:col-span-1 space-y-8 lg:sticky top-8"">
   
    {{-- Card Tab Utama --}}
    <div class="card p-6 space-y-6">
        @php
            $admin = auth('admin')->user();
            $statusOptions = [];
            if ($admin->role === 'superadmin') { $statusOptions = ['pending', 'diproses', 'diteruskan', 'diterima', 'ditolak']; } 
            elseif ($admin->role === 'admin_dinas' && $pengajuan->status === 'pending') { $statusOptions = ['diteruskan', 'ditolak']; } 
            elseif ($admin->role === 'admin_bidang' && $pengajuan->status === 'diteruskan') { $statusOptions = ['diproses', 'diterima', 'ditolak']; }
        @endphp
{{-- Card Tab Surat --}}
@if (in_array($admin->role, ['superadmin', 'admin_dinas']))
<div class="card p-6 space-y-6">
    <div class="card p-3">
        <form action="{{ route('admin.pengajuan.uploadSurat', $pengajuan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="form-label">Unggah Surat (PDF)</label>
            <input type="file" name="surat_pdf" accept="application/pdf" class="form-control">
            <button type="submit" class="btn btn-primary w-100 mt-3">Simpan Surat</button>
        </form>
    </div>
    <div class="card p-3">
        <h6 class="form-label">Buat Surat Otomatis</h6>
        <form action="{{ route('admin.pengajuan.generateSurat', $pengajuan->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success w-100 mt-3">Buat Surat Otomatis</button>
        </form>
    </div>
    @if ($pengajuan->surat_pdf)
    <div class="text-center">
        <button onclick="showPreview('{{ asset('storage/' . $pengajuan->surat_pdf) }}', '{{ basename($pengajuan->surat_pdf) }}')" class="btn btn-primary btn-sm">Lihat Surat PDF</button>
    </div>
    @endif
</div>
@endif

        @if (!empty($statusOptions))
        <div class="card p-3">
            <label class="form-label">Ubah Status</label>
            <form action="{{ route('admin.pengajuan.updateStatus', $pengajuan->id) }}" method="POST" class="d-flex align-items-center">
                @csrf @method('PUT')
                <select name="status" class="form-select me-2" style="flex-grow:1;">
                    @foreach ($statusOptions as $status)
                        <option value="{{ $status }}" {{ $pengajuan->status === $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                    @endforeach
                </select>
                <button type="submit" onclick="return confirm('Anda yakin ingin mengubah status?')" class="btn btn-primary flex-shrink-0">
                    <i class="fas fa-save"></i>
                </button>
            </form>
        </div>
        @endif

        <div class="card p-3">
            <label class="form-label">Kirim Komentar</label>
            <form action="{{ route('admin.pengajuan.kirimCatatan', $pengajuan->id) }}" method="POST" class="space-y-3">
                @csrf
                <textarea name="komentar_admin" class="form-control" rows="3" placeholder="Tulis komentar..." required>{{ old('komentar_admin') }}</textarea>
                <div class="d-flex justify-content-between align-items-center">
                    <select name="tujuan" class="form-select" style="width: 48%;">
                        <option value="user">User</option>
                        <option value="admin_bidang">Admin Bidang</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>

    

    {{-- Card Tab Lainnya --}}
    <div  class="card p-6 space-y-4">
        <button type="button" class="btn btn-warning w-100" onclick="openModal()">Ubah Tanggal Magang</button>

        @if (in_array($admin->role, ['superadmin', 'admin_dinas']))
        <div class="card p-3">
            <form action="{{ route('admin.pengajuan.updateBidang', $pengajuan->id) }}" method="POST">
                @csrf @method('PATCH')
                <label for="databidang_id" class="form-label">Pilih Bidang</label>
                <select name="databidang_id" class="form-select" required>
                    @foreach ($listBidang as $bidang)
                        <option value="{{ $bidang->id }}" {{ $pengajuan->databidang_id == $bidang->id ? 'selected' : '' }}>{{ $bidang->nama }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary mt-2 w-100">Simpan Bidang</button>
            </form>
        </div>
        @endif

        @if(auth('admin')->check() && (($admin->role === 'admin_bidang' && $admin->id === $pengajuan->databidang->admin_id) || $admin->role === 'superadmin'))
        <div class="card p-3">
            <form action="{{ route('admin.pengajuan.kesediaan.generate', $pengajuan->id) }}" method="POST">
                @csrf
                <label class="form-label">Buat Form Kesediaan</label>
                <input type="text" name="nomor_surat" class="form-control mb-2" placeholder="Nomor Surat" required>
                <input type="text" name="penanggung_jawab" class="form-control mb-2" placeholder="Penanggung Jawab" required>
                <button type="submit" class="btn btn-primary mt-2 w-100">Generate Form</button>
            </form>
            @if($pengajuan->form_kesediaan_magang)
            <a href="{{ asset('storage/' . $pengajuan->form_kesediaan_magang) }}" class="btn btn-success mt-2 w-100" target="_blank">Lihat Form</a>
            @endif
        </div>
        @endif
    </div>
</div>


{{-- ============================================= --}}
{{-- ================ START: MODALS ================ --}}
{{-- ============================================= --}}

<!-- Modal Manual -->
<div id="updateTanggalModal" class="fixed inset-0 z-50 hidden items-center justify-center">
  
  <!-- Backdrop -->
  <div class="absolute inset-0 bg-black/50" onclick="closeModal()"></div>

  <!-- Modal Box -->
  <div class="relative z-10 bg-white/10 backdrop-blur-md border border-white/20 rounded-xl w-full max-w-md mx-auto shadow-lg" onclick="event.stopPropagation();">
    <form action="{{ route('admin.pengajuan.updateTanggal', $pengajuan->id) }}" method="POST" class="p-5 text-white">
      @csrf
      @method('PUT')

      <!-- Header -->
      <div class="flex items-center justify-between border-b border-white/10 pb-3 mb-4">
        <div>
          <h5 class="text-lg font-semibold">Ubah Tanggal Magang</h5>
          <small class="text-white/70">Perbarui periode magang mahasiswa</small>
        </div>
        <button type="button" onclick="closeModal()" class="text-white hover:text-red-400 text-2xl leading-none">&times;</button>
      </div>

      <!-- Body -->
      <div class="space-y-4">
        <div>
          <label for="tanggal_mulai" class="block text-sm mb-1">Tanggal Mulai</label>
          <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control w-full rounded px-3 py-2 text-black" value="{{ $pengajuan->tanggal_mulai }}">
        </div>
        <div>
          <label for="tanggal_selesai" class="block text-sm mb-1">Tanggal Selesai</label>
          <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control w-full rounded px-3 py-2 text-black" value="{{ $pengajuan->tanggal_selesai }}">
        </div>
      </div>

      <!-- Footer -->
      <div class="mt-6 flex justify-end gap-3 border-t border-white/10 pt-4">
        <button type="button" onclick="closeModal()" class="btn btn-secondary">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>

</div>

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
let currentAbortController = null; 
  function openModal() {
    const modal = document.getElementById('updateTanggalModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
  }

  function closeModal() {
    const modal = document.getElementById('updateTanggalModal');
    modal.classList.remove('flex');
    modal.classList.add('hidden');
  }

  // Tutup modal jika klik backdrop (area luar modal box)
  document.getElementById('updateTanggalModal').addEventListener('click', function (e) {
    // Pastikan hanya backdrop yang diklik, bukan modal box
    if (e.target === this) {
      closeModal();
    }
  });
function showPreview(url, fileName = '') {
    const modal = document.getElementById('previewModal');
    const loading = document.getElementById('previewLoading');
    const content = document.getElementById('previewContent');
    const frame = document.getElementById('previewFrame');
    const title = document.getElementById('previewTitle');
    const fileInfo = document.getElementById('fileInfo');
    
    modal.style.display = 'block';
    modal.classList.add('show');
    loading.style.display = 'flex';
    content.style.display = 'none';
    
    currentFileUrl = url;
    currentFileName = fileName || 'dokumen';
    title.textContent = currentFileName;
    
    const fileExtension = getFileExtension(currentFileName);
    fileInfo.textContent = `${fileExtension ? fileExtension.toUpperCase() : 'FILE'} • ${currentFileName}`;
    
    if (isRouteUrl(url)) {
        handleRoutePreview(url, fileExtension);
    } else {
        handleDirectPreview(url, fileExtension);
    }
}

function isRouteUrl(url) {
    return url.includes('/download') || url.includes('/admin/pengajuan/') || url.includes('?') || url.includes('&');
}

function handleRoutePreview(url, fileExtension) {
    currentAbortController = new AbortController();
    fetch(url, {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,image/*'
        },
        signal: currentAbortController.signal
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.blob();
    })
    .then(blob => {
        const blobUrl = URL.createObjectURL(blob);
        currentFileUrl = blobUrl;
        loadPreviewFrame(blobUrl, fileExtension);
    })
    .catch(error => {
        if (error.name === 'AbortError') {
            console.log('Preview fetch aborted');
            return;
        }
        console.error('Error fetching file:', error);
        showPreviewError('Gagal memuat dokumen. Silakan coba lagi.');
    });
}

function handleDirectPreview(url, fileExtension) {
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
            frame.src = url + '#toolbar=1&navpanes=1&scrollbar=1&view=FitH';
        } else if (['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'].includes(fileExtension)) {
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
            frame.src = `https://docs.google.com/viewer?url=${encodeURIComponent(url)}&embedded=true`;
        }
        
        frame.onload = function() {
            loading.style.display = 'none';
            content.style.display = 'block';
        };
        
        setTimeout(() => {
            if (loading.style.display !== 'none') {
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
                     Download File
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
    modal.style.display = 'none';
    frame.src = '';

    if (currentFileUrl && currentFileUrl.startsWith('blob:')) {
        URL.revokeObjectURL(currentFileUrl);
    }

    if (currentAbortController) {
        currentAbortController.abort();
        currentAbortController = null;
    }

    currentFileUrl = '';
    currentFileName = '';
}

function downloadFile() {
    if (currentFileUrl) {
        if (currentFileUrl.startsWith('blob:')) {
            const link = document.createElement('a');
            link.href = currentFileUrl;
            link.download = currentFileName;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        } else {
            window.open(currentFileUrl, '_blank');
        }
    }
}

document.getElementById('previewModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closePreview();
    }
});

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && document.getElementById('previewModal').classList.contains('show')) {
        closePreview();
    }
});

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