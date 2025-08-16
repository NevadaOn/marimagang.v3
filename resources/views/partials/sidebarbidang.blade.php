
  <aside  class="fixed h-screen w-72 bg text-white rounded-xl flex flex-col justify-between p-4">
    <!-- Top Logo & Search -->
    <div>
      <div class="flex items-center gap-3 mb-6 mt-4 ">
        <div class="bg-light text-white text-xl font-bold rounded-lg px-2 py-1"><img src="{{ asset('img/logo-kominfo.png') }}" alt="Logo" class="h-10 w-auto">
</div>
        <div>
          <h1 class="text-base font-semibold text-white">Portal Admin</h1>
          <p class="text-xs text-muted">DISKOMINFO Kab.Malang</p>
        </div>
      </div>

      <div class="mb-5">
        
      </div>

     <!-- Sidebar Menu -->
<nav class="flex flex-col gap-3 text-sm">
    <!-- Dashboard -->
    <a href="{{ route('admin.dashboard') }}"
   class="flex items-center gap-3 px-4 py-2 rounded-lg transition-all duration-150
          text-sm no-underline hover:no-underline focus:no-underline active:no-underline
          {{ Request::routeIs('admin.dashboard') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
    <i class="fas fa-home w-5"></i>
    <span>Dashboard</span>
</a>


    <!-- Pengajuan -->
    <a href="{{ route('admin.pengajuan.bidang') }}"
   class="flex items-center gap-3 px-4 py-2 rounded-lg transition-all duration-150
          text-sm no-underline hover:no-underline focus:no-underline active:no-underline
          {{ Request::routeIs('admin.pengajuan.bidang') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
    <i class="fas fa-chart-line w-5"></i>
    <span>Pengajuan</span>
</a>

</nav>

        <!-- <a href="#" class="flex items-center gap-3 px-4 py-2 hover:bg-gray-800 rounded-lg">
          <i class="fas fa-bell w-5 text-gray-400"></i> Notifications
        </a>
        <a href="#" class="flex items-center gap-3 px-4 py-2 hover:bg-gray-800 rounded-lg">
          <i class="fas fa-chart-pie w-5 text-gray-400"></i> Analytics
        </a>
        <a href="#" class="flex items-center gap-3 px-4 py-2 hover:bg-gray-800 rounded-lg">
          <i class="fas fa-heart w-5 text-gray-400"></i> Likes
        </a>
        <a href="#" class="flex items-center gap-3 px-4 py-2 hover:bg-gray-800 rounded-lg">
          <i class="fas fa-wallet w-5 text-gray-400"></i> Wallets
        </a> -->
      </nav>
    </div>

   
  </aside>






  <div class="p-4 sm:p-6 lg:p-8">

    <div class="mb-4 card p-4 rounded-3xl bg-gradient-to-r from-blue-500/20 via-blue-500/20 to-cyan-500/20 border-b border-white/10" style="text-align: left; padding: 20px 50px 10px 0px;">
        <h1 class="h3 mb-3 fw-bold fs-1 " style="color: white; background: var(--gradient-1); text;background-clip: text;">Detail Pengajuan</h1>
        <p class="text-muted">Informasi lengkap pengajuan magang mahasiswa</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

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

        </div>

       <div class="lg:col-span-1 space-y-8 lg:sticky top-8">
         @php
            $admin = auth('admin')->user();
            $statusOptions = [];
            if ($admin->role === 'superadmin') { $statusOptions = ['diproses', 'diproses', 'diteruskan', 'diterima', 'ditolak']; } 
            elseif ($admin->role === 'admin_dinas' && $pengajuan->status === 'diproses') { $statusOptions = ['diteruskan', 'ditolak']; } 
            elseif ($admin->role === 'admin_bidang' && $pengajuan->status === 'diteruskan') { $statusOptions = ['diproses', 'diterima', 'ditolak']; }
        @endphp
    {{-- Card Tab Lainnya --}}
    <div  class="card p-4 space-y-4">
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
        <div class="card p-3 text-light">
            <form action="{{ route('admin.pengajuan.kesediaan.generate', $pengajuan->id) }}" method="POST">
                @csrf
                <label class="form-label">Buat Form Kesediaan</label>
                <input type="text" name="nomor_surat" class="form-control mb-2 " placeholder="Nomor Surat" required>
                <input type="text" name="penanggung_jawab" class="form-control mb-2" placeholder="Penanggung Jawab" required>
                <button type="submit" class="btn btn-primary mt-2 w-100">Generate Form</button>
            </form>
            @if($pengajuan->form_kesediaan_magang)
            <a href="{{ asset('storage/' . $pengajuan->form_kesediaan_magang) }}" class="btn btn-success mt-2 w-100" target="_blank">Lihat Form</a>
            @endif
        </div>
        @endif
    </div>
    {{-- Card Tab Utama --}}
    <div class="card p-4 space-y-6">
       
{{-- Card Tab Surat --}}
@if (in_array($admin->role, ['superadmin', 'admin_dinas']))
<div class="card p-2 space-y-6">
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

        <div class="card p-3 w-full">
            <label class="form-label">Kirim Komentar</label>
            <form action="{{ route('admin.pengajuan.kirimCatatan', $pengajuan->id) }}" method="POST" class="space-y-3">
                @csrf
                <textarea name="komentar_admin" class="form-control" rows="3" placeholder="Tulis komentar..." required>{{ old('komentar_admin') }}</textarea>
                <div class="d-flex justify-content-between align-items-center gap-2 text-sm">
                    <select name="tujuan" class="form-select w-full">
                        <option value="user">User</option>
                        <option value="admin_bidang">Admin Bidang</option>
                    </select>
                    <button type="submit" class="btn btn-primary w-full">Kirim</button>
                </div>
                
            </form>
        </div>
    </div>

    

   
</div>


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
          <h5 class="text-lg text-light font-semibold">Ubah Tanggal Magang</h5>
          <small class="text-white/70">Perbarui periode magang mahasiswa</small>
        </div>
        <button type="button" onclick="closeModal()" class="text-white hover:text-red-400 text-2xl leading-none">&times;</button>
      </div>

      <!-- Body -->
      <div class="space-y-4">
        <div>
          <label for="tanggal_mulai" class="block text-sm mb-1">Tanggal Mulai</label>
          <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control w-full  rounded px-3 py-2 text-white" value="{{ $pengajuan->tanggal_mulai }}">
        </div>
        <div>
          <label for="tanggal_selesai" class="block text-sm mb-1">Tanggal Selesai</label>
          <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control w-full rounded px-3 py-2 text-white" value="{{ $pengajuan->tanggal_selesai }}">
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




<div class="row">
    @php
        $admin = auth('admin')->user();

        // Default statusOptions kosong
        $statusOptions = [];

        // Tentukan statusOptions sesuai role dan status pengajuan
        if ($admin->role === 'superadmin') {
            $statusOptions = ['diproses', 'diproses', 'diteruskan', 'diterima', 'ditolak'];
        } elseif ($admin->role === 'admin_dinas' && $pengajuan->status === 'diproses') {
            $statusOptions = ['diteruskan', 'ditolak'];
        } elseif ($admin->role === 'admin_bidang' && $pengajuan->status === 'diteruskan') {
            $statusOptions = ['diproses', 'diterima', 'ditolak'];
        }

        // Cek apakah panel aksi boleh ditampilkan di kolom kanan
        $isPanelAksiAllowed = auth('admin')->check() && (
            ($admin->role === 'admin_bidang' && $admin->id === $pengajuan->databidang->admin_id) 
            || $admin->role === 'superadmin'
        );

        // Tentukan class kolom kiri
        $colLeftClass = $isPanelAksiAllowed ? 'col-lg-8' : 'col-lg-12';
    @endphp

    {{-- ===================== KOLOM KIRI ===================== --}}
    <div class="{{ $colLeftClass }}">
        {{-- Informasi Umum --}}
        <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">
                                        <i class="fas fa-info-circle me-2"></i>Informasi Umum
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-muted small">Kode Pengajuan</label>
                                                <div class="fw-bold">{{ $pengajuan->kode_pengajuan ?? 'PG-2024-001' }}</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label text-muted small">Nama Mahasiswa</label>
                                                <div class="fw-bold">{{ $pengajuan->user->nama ?? 'Ahmad Rizki Pratama' }}</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label text-muted small">NIM</label>
                                                <div class="fw-bold font-monospace">{{ $pengajuan->user->nim ?? '2024001001' }}</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label text-muted small">Universitas</label>
                                                <div class="fw-bold">{{ $pengajuan->user->universitas->nama_universitas ?? 'Universitas Brawijaya' }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-muted small">Bidang</label>
                                                <div><span class="badge bg-light-info">{{ $pengajuan->databidang->nama ?? 'Teknologi Informasi' }}</span></div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label text-muted small">Tanggal Mulai</label>
                                                <div class="fw-bold">{{ optional($pengajuan->tanggal_mulai)->format('d M Y') ?? '15 Jan 2025' }}</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label text-muted small">Tanggal Selesai</label>
                                                <div class="fw-bold">{{ optional($pengajuan->tanggal_selesai)->format('d M Y') ?? '15 Mar 2025' }}</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label text-muted small">Status</label>
                                                <div>
                                                    @php
                                                        $status = $pengajuan->status ?? 'pending';
                                                    @endphp
                                                    @if ($status == 'disetujui')
                                                        <span class="badge bg-success">
                                                            <i class="fas fa-check me-1"></i>Disetujui
                                                        </span>
                                                    @elseif($status == 'ditolak')
                                                        <span class="badge bg-danger">
                                                            <i class="fas fa-times me-1"></i>Ditolak
                                                        </span>
                                                    @elseif($status == 'diproses')
                                                        <span class="badge bg-info">
                                                            <i class="fas fa-cog me-1"></i>Diproses
                                                        </span>
                                                    @elseif($status == 'diteruskan')
                                                        <span class="badge bg-primary">
                                                            <i class="fas fa-paper-plane me-1"></i>Diteruskan
                                                        </span>
                                                    @else
                                                        <span class="badge bg-warning">
                                                            <i class="fas fa-clock me-1"></i>Menunggu
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @if($pengajuan->komentar_admin ?? false)
                                    <div class="alert alert-light-info mt-3">
                                        <h6 class="mb-2">Catatan Admin</h6>
                                        <p class="mb-0">{{ $pengajuan->komentar_admin }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>

        {{-- Anggota Kelompok --}}
        @php
            $semuaMahasiswa = collect([['user' => $pengajuan->user, 'status' => 'Ketua']])
                ->merge($pengajuan->anggota->map(fn ($anggota) => ['user' => $anggota->user, 'status' => ucfirst($anggota->status)]))
                ->unique(fn($item) => $item['user']->id);
        @endphp 
        @if($semuaMahasiswa->count())
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-users me-2"></i>Anggota Kelompok
                    <span class="badge bg-success ms-2">{{ $semuaMahasiswa->count() }}</span>
                </h5>
            </div>
            <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>NIM</th>
                                                    <th>Status</th>
                                                    <th>Keahlian</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($semuaMahasiswa->values() as $i => $entry)
                                                @php $user = $entry['user']; @endphp
                                                <tr>
                                                    <td>{{ $i + 1 }}</td>
                                                    <td>{{ $user->nama }}</td>
                                                    <td class="font-monospace">{{ $user->nim }}</td>
                                                    <td><span class="badge bg-primary">{{ $entry['status'] }}</span></td>
                                                    <td>
                                                        @if($user->userSkills->isNotEmpty())
                                                        <ul class="mb-0 ps-3">
                                                            @foreach($user->userSkills as $userSkill)
                                                            <li>Web Development (Expert)
                                                                {{ $userSkill->skill->nama ?? 'Skill tidak ditemukan' }}
                                                                ({{ ucfirst($userSkill->level) }})
                                                                @if ($userSkill->sertifikat_path)
                                                                <button onclick="showPreview('{{ asset('storage/' . $userSkill->sertifikat_path) }}', '{{ basename($userSkill->sertifikat_path) }}')" 
                                                                    class="btn btn-sm btn-light-primary ms-2">
                                                                    <i class="fas fa-eye"></i> Sertifikat
                                                                </button>
                                                                @endif
                                                            </li>
                                                            @endforeach
                                                            <li>Database Design (Advanced)</li>
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
        </div>
        @endif

        {{-- Dokumen Pengajuan --}}
        @if($pengajuan->documents->count())
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-file-alt me-2"></i>Dokumen Pengajuan
                    <span class="badge bg-info ms-2">{{ $pengajuan->documents->count() }} Dokumen</span>
                </h5>
            </div>
            <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Jenis Dokumen</th>
                                                    <th>Nama File</th>
                                                    <th>Ukuran</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($pengajuan->documents as $i => $doc)
                                                <tr>
                                                    <td>{{ $i + 1 }}</td>
                                                    <td><span class="badge bg-primary">{{ ucfirst(str_replace('_', ' ', $doc->document_type)) }}</span></td>
                                                    <td class="font-monospace">{{ $doc->file_name }}</td>
                                                    <td>{{ number_format($doc->file_size / 1024, 2) }} KB</td>
                                                    <td>
                                                        <button onclick="showPreview('{{ route('admin.pengajuan.download', ['id' => $pengajuan->id, 'document' => $doc->file_name]) }}', '{{ $doc->file_name }}')" 
                                                            class="btn btn-sm btn-primary">
                                                            <i class="fas fa-eye me-1"></i>Preview
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
    </div>

    {{-- ===================== KOLOM KANAN ===================== --}}
    @if($isPanelAksiAllowed)
    <div class="col-lg-4">
        {{-- Panel Aksi Utama --}}
        <div class="card mb-4">
                            
                            <div class="card-header">
                                <h6 class="card-title mb-0">Panel Aksi</h6>
                            </div>
                            
                            <div class="card-body">
                                
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-warning" onclick="openModal()">
                                        <i class="fas fa-calendar-alt me-2"></i>Ubah Tanggal Magang
                                    </button>
                                </div>
                                

                                {{-- Update Bidang --}}
                                
                                <div class="mt-3">
                                    <form action="{{ route('admin.pengajuan.updateBidang', $pengajuan->id) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <label for="databidang_id" class="form-label">Pilih Bidang</label>
                                        <select name="databidang_id" class="form-select mb-2" required>
                                            @foreach ($listBidang as $bidang)
                                                <option value="{{ $bidang->id }}" {{ $pengajuan->databidang_id == $bidang->id ? 'selected' : '' }}>
                                                    {{ $bidang->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-primary w-100">
                                            <i class="fas fa-save me-2"></i>Simpan Bidang
                                        </button>
                                    </form>
                                </div>
                             

                                {{-- Generate Form Kesediaan --}}
                                
                                <div class="mt-4 pt-3 border-top">
                                    <h6 class="mb-3">Form Kesediaan</h6>
                                    <form action="{{ route('admin.pengajuan.kesediaan.generate', $pengajuan->id) }}" method="POST">
                                        @csrf
                                        <input type="text" name="nomor_surat" class="form-control mb-2" placeholder="Nomor Surat" required>
                                        <input type="text" name="penanggung_jawab" class="form-control mb-2" placeholder="Penanggung Jawab" required>
                                        <button type="submit" class="btn btn-success w-100 mb-2">
                                            <i class="fas fa-file-text me-2"></i>Generate Form
                                        </button>
                                    </form>
                                    @if($pengajuan->form_kesediaan_magang)
                                    <a href="{{ asset('storage/' . $pengajuan->form_kesediaan_magang) }}" class="btn btn-light-success w-100" target="_blank">
                                        <i class="fas fa-eye me-2"></i>Lihat Form
                                    </a>
                                    @endif
                                </div>
                               
                            </div>
                        </div>


        {{-- Panel Upload Surat --}}
        
            <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Manajemen Surat</h6>
                            </div>
                            <div class="card-body">
                                {{-- Upload Manual --}}
                                <div class="mb-3">
                                    <form action="{{ route('admin.pengajuan.uploadSurat', $pengajuan->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <label class="form-label">Unggah Surat (PDF)</label>
                                        <input type="file" name="surat_pdf" accept="application/pdf" class="form-control mb-2">
                                        <button type="submit" class="btn btn-primary w-100">
                                            <i class="fas fa-upload me-2"></i>Simpan Surat
                                        </button>
                                    </form>
                                </div>

                                {{-- Generate Otomatis --}}
                                <div class="mb-3 pt-2 border-top">
                                    <form action="{{ route('admin.pengajuan.generateSurat', $pengajuan->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success w-100">
                                            <i class="fas fa-magic me-2"></i>Buat Surat Otomatis
                                        </button>
                                    </form>
                                </div>

                                {{-- Lihat Surat --}}
                                @if ($pengajuan->surat_pdf)
                                <div class="text-center">
                                    <button onclick="showPreview('{{ asset('storage/' . $pengajuan->surat_pdf) }}', '{{ basename($pengajuan->surat_pdf) }}')" 
                                        class="btn btn-light-primary btn-sm">
                                        <i class="fas fa-eye me-2"></i>Lihat Surat PDF
                                    </button>
                                </div>
                                @endif
                            </div>
                        </div>
     

        {{-- Panel Update Status & Komentar --}}
        @if (!empty($statusOptions))
            <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Update Status & Komentar</h6>
                            </div>
                            <div class="card-body">
                                {{-- Update Status --}}
                                <div class="mb-3">
                                    <label class="form-label">Ubah Status</label>
                                    <form action="{{ route('admin.pengajuan.updateStatus', $pengajuan->id) }}" method="POST" class="d-flex gap-2">
                                        @csrf @method('PUT')
                                        <select name="status" class="form-select">
                                            @foreach ($statusOptions as $status)
                                                <option value="{{ $status }}" {{ $pengajuan->status === $status ? 'selected' : '' }}>
                                                    {{ ucfirst($status) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <button type="submit" onclick="return confirm('Anda yakin ingin mengubah status?')" class="btn btn-primary">
                                            <i class="fas fa-save"></i>
                                        </button>
                                    </form>
                                </div>

                                {{-- Kirim Komentar --}}
                                <div>
                                    <label class="form-label">Kirim Komentar</label>
                                    <form action="{{ route('admin.pengajuan.kirimCatatan', $pengajuan->id) }}" method="POST">
                                        @csrf
                                        <textarea name="komentar_admin" class="form-control mb-2" rows="3" placeholder="Tulis komentar..." required></textarea>
                                        <div class="d-flex gap-2 mb-2">
                                            <select name="tujuan" class="form-select">
                                                <option value="user">User</option>
                                                <option value="admin_bidang">Admin Bidang</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-paper-plane me-1"></i>Kirim
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
        @endif
    </div>
    @endif
</div>
<footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2023 &copy; Diskominfo Kab. Malang</p>
                        </div>
                        <div class="float-end">
                            <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                                by <a href="https://kominfo.malangkab.go.id/">Diskominfo</a></p>
                        </div>
                    </div>
                </footer>

