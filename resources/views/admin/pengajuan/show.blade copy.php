<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengajuan - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .preview-container {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 600;
        }
        
        .status-disetujui {
            background-color: #dcfce7;
            color: #166534;
        }
        
        .status-ditolak {
            background-color: #fef2f2;
            color: #991b1b;
        }
        
        .status-menunggu {
            background-color: #fef3c7;
            color: #92400e;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-clipboard-list text-2xl text-blue-600"></i>
                    <h1 class="text-2xl font-bold text-gray-800">Admin Panel</h1>
                </div>
                <nav class="flex items-center space-x-4">
                    <a href="#" class="text-gray-600 hover:text-blue-600 transition-colors">
                        <i class="fas fa-home mr-2"></i>Dashboard
                    </a>
                    <a href="#" class="text-gray-600 hover:text-blue-600 transition-colors">
                        <i class="fas fa-file-alt mr-2"></i>Pengajuan
                    </a>
                    <a href="#" class="text-gray-600 hover:text-blue-600 transition-colors">
                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-6">
        <!-- Breadcrumb -->
        <div class="mb-6">
            <nav class="flex items-center space-x-2 text-sm text-gray-600">
                <a href="#" class="hover:text-blue-600">Dashboard</a>
                <i class="fas fa-chevron-right text-xs"></i>
                <a href="#" class="hover:text-blue-600">Pengajuan</a>
                <i class="fas fa-chevron-right text-xs"></i>
                <span class="text-gray-800 font-medium">Detail Pengajuan</span>
            </nav>
        </div>

        <!-- Page Title -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Detail Pengajuan</h2>
            <p class="text-gray-600">Informasi lengkap pengajuan magang mahasiswa</p>
        </div>

        <!-- Informasi Umum -->
        <div class="bg-white rounded-lg shadow-sm border mb-6 fade-in">
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-info-circle mr-2 text-blue-600"></i>
                    Informasi Umum
                </h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-3">
                        <div class="flex items-center justify-between border-b pb-2">
                            <span class="font-medium text-gray-700">Kode Pengajuan</span>
                            <span class="text-gray-900 font-mono">{{ $pengajuan->kode_pengajuan }}</span>
                        </div>
                        <div class="flex items-center justify-between border-b pb-2">
                            <span class="font-medium text-gray-700">Nama Mahasiswa</span>
                            <span class="text-gray-900">{{ $pengajuan->user->nama ?? '-' }}</span>
                        </div>
                        <div class="flex items-center justify-between border-b pb-2">
                            <span class="font-medium text-gray-700">NIM</span>
                            <span class="text-gray-900 font-mono">{{ $pengajuan->user->nim ?? '-' }}</span>
                        </div>
                        <div class="flex items-center justify-between border-b pb-2">
                            <span class="font-medium text-gray-700">Universitas</span>
                            <span class="text-gray-900">{{ $pengajuan->user->universitas->nama_universitas ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between border-b pb-2">
                            <span class="font-medium text-gray-700">Bidang</span>
                            <span class="text-gray-900">{{ $pengajuan->databidang->nama ?? '-' }}</span>
                        </div>
                        <div class="flex items-center justify-between border-b pb-2">
                            <span class="font-medium text-gray-700">Tanggal Mulai</span>
                            <span class="text-gray-900">{{ $pengajuan->tanggal_mulai->format('d M Y') }}</span>
                        </div>
                        <div class="flex items-center justify-between border-b pb-2">
                            <span class="font-medium text-gray-700">Tanggal Selesai</span>
                            <span class="text-gray-900">{{ $pengajuan->tanggal_selesai->format('d M Y') }}</span>
                        </div>
                        <div class="flex items-center justify-between border-b pb-2 mb-4">
                            <span class="font-medium text-gray-700">Status</span>
                            <span class="status-badge px-3 py-1 rounded text-sm font-semibold inline-flex items-center
                                @switch($pengajuan->status)
                                    @case('diterima') bg-green-100 text-green-700 @break
                                    @case('ditolak') bg-red-100 text-red-700 @break
                                    @case('diproses') bg-yellow-100 text-yellow-800 @break
                                    @case('diteruskan') bg-blue-100 text-blue-700 @break
                                    @default bg-gray-100 text-gray-700
                                @endswitch">
                                @switch($pengajuan->status)
                                    @case('diterima')
                                        <i class="fas fa-check-circle mr-1"></i> Diterima
                                        @break
                                    @case('ditolak')
                                        <i class="fas fa-times-circle mr-1"></i> Ditolak
                                        @break
                                    @case('diproses')
                                        <i class="fas fa-spinner mr-1 animate-spin"></i> Diproses
                                        @break
                                    @case('diteruskan')
                                        <i class="fas fa-paper-plane mr-1"></i> Diteruskan
                                        @break
                                    @default
                                        <i class="fas fa-clock mr-1"></i> Menunggu
                                @endswitch
                            </span>
                        </div>
                    </div>
                </div>
                @if($pengajuan->komentar_admin)
                <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                    <h4 class="font-medium text-gray-700 mb-2">Komentar Admin</h4>
                    <p class="text-gray-900">{{ $pengajuan->komentar_admin }}</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Anggota Kelompok -->
        @if($pengajuan->anggota->count())
        <div class="bg-white rounded-lg shadow-sm border mb-6 fade-in">
            <div class="bg-gradient-to-r from-green-50 to-emerald-50 px-6 py-4 border-b">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-users mr-2 text-green-600"></i>
                    Anggota Kelompok
                    <span class="ml-2 bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded-full">
                        {{ $pengajuan->anggota->count() }} Anggota
                    </span>
                </h3>
            </div>
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-4 py-3 border text-left text-sm font-medium text-gray-700">No</th>
                                <th class="px-4 py-3 border text-left text-sm font-medium text-gray-700">Nama</th>
                                <th class="px-4 py-3 border text-left text-sm font-medium text-gray-700">NIM</th>
                                <th class="px-4 py-3 border text-center text-sm font-medium text-gray-700">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengajuan->anggota as $i => $anggota)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-4 py-3 border text-center text-sm">{{ $i + 1 }}</td>
                                <td class="px-4 py-3 border text-sm">{{ $anggota->user->nama ?? '-' }}</td>
                                <td class="px-4 py-3 border text-sm font-mono">{{ $anggota->user->nim ?? '-' }}</td>
                                <td class="px-4 py-3 border text-center">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                        {{ ucfirst($anggota->status) }}
                                    </span>
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
        <div class="bg-white rounded-lg shadow-sm border mb-6 fade-in">
            <div class="bg-gradient-to-r from-purple-50 to-pink-50 px-6 py-4 border-b">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-file-alt mr-2 text-purple-600"></i>
                    Dokumen Pengajuan
                    <span class="ml-2 bg-purple-100 text-purple-800 text-xs font-medium px-2 py-1 rounded-full">
                        {{ $pengajuan->documents->count() }} Dokumen
                    </span>
                </h3>
            </div>
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-4 py-3 border text-left text-sm font-medium text-gray-700">No</th>
                                <th class="px-4 py-3 border text-left text-sm font-medium text-gray-700">Jenis Dokumen</th>
                                <th class="px-4 py-3 border text-left text-sm font-medium text-gray-700">Nama File</th>
                                <th class="px-4 py-3 border text-left text-sm font-medium text-gray-700">Ukuran</th>
                                <th class="px-4 py-3 border text-center text-sm font-medium text-gray-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengajuan->documents as $i => $doc)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-4 py-3 border text-center text-sm">{{ $i + 1 }}</td>
                                <td class="px-4 py-3 border text-sm">
                                    <span class="px-2 py-1 bg-indigo-100 text-indigo-800 text-xs font-medium rounded">
                                        {{ ucfirst(str_replace('_', ' ', $doc->document_type)) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 border text-sm font-mono">{{ $doc->file_name }}</td>
                                <td class="px-4 py-3 border text-sm">{{ number_format($doc->file_size / 1024, 2) }} KB</td>
                                <td class="px-4 py-3 border text-center">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button onclick="showPreview('{{ route('admin.pengajuan.download', ['id' => $pengajuan->id, 'document' => $doc->file_name]) }}')" 
                                                class="inline-flex items-center px-3 py-1 text-xs font-medium text-indigo-700 bg-indigo-100 rounded-full hover:bg-indigo-200 transition-colors">
                                            <i class="fas fa-eye mr-1"></i>
                                            Preview
                                        </button>
                                    </div>
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

        {{-- === Kelola Surat & Komentar (khusus superadmin dan admin_dinas) === --}}
        @if (in_array($admin->role, ['superadmin', 'admin_dinas']))
            <div class="bg-white rounded-lg shadow-sm border mb-6 p-6 fade-in w-full">
                <h2 class="text-lg font-semibold mb-4">Kelola Surat & Komentar</h2>

                {{-- Form upload surat PDF --}}
                <form action="{{ route('admin.pengajuan.uploadSurat', $pengajuan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4 mb-6">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Unggah Surat (PDF)</label>
                        <input type="file" name="surat_pdf" accept="application/pdf" class="block w-full border rounded px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Komentar Admin</label>
                        <textarea name="komentar_admin" rows="4" class="w-full bg-gray-100 border rounded px-3 py-2">{{ old('komentar_admin', $pengajuan->komentar_admin) }}</textarea>
                    </div>

                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan Surat & Komentar</button>
                </form>

                {{-- Form generate surat otomatis --}}
                <p>Buat Surat Otomatis</p>

                <form action="{{ route('admin.pengajuan.generateSurat', $pengajuan->id) }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Surat</label>
                        <input type="text" name="nomor_surat" class="w-full border rounded px-3 py-2" placeholder="Contoh: 001/ADM/PKL/2025" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">NIP</label>
                        <input type="text" name="nip_penanggung_jawab" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Penanggung Jawab</label>
                        <input type="text" name="nama_penanggung_jawab" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
                        <input type="text" name="jabatan_penanggung_jawab" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kegiatan</label>
                        <input type="text" name="nama_kegiatan" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                        Buat Surat Otomatis
                    </button>
                </form>

                <br>
                @if ($pengajuan->surat_pdf)
                    <button 
                        onclick="showPreview('{{ asset('storage/' . $pengajuan->surat_pdf) }}', '{{ basename($pengajuan->surat_pdf) }}')"
                        class="inline-flex items-center px-3 py-1 text-xs font-medium text-indigo-700 bg-indigo-100 rounded-full hover:bg-indigo-200 transition-colors">
                        <i class="fas fa-eye mr-1"></i>
                        Lihat / Unduh Surat PDF
                    </button>
                @endif
            </div>
        @endif

        {{-- === Aksi Pengajuan & Perubahan Status === --}}
        @if (!empty($statusOptions))
            <div class="bg-white rounded-lg shadow-sm border p-6 fade-in">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <h3 class="text-lg font-semibold text-gray-800">Aksi Pengajuan</h3>
                        <div class="text-sm text-gray-500">
                            Silakan pilih tindakan yang ingin dilakukan terhadap pengajuan ini
                        </div>
                    </div>
                    <div class="flex space-x-3">
                        <form action="{{ route('admin.pengajuan.updateStatus', $pengajuan->id) }}" method="POST" class="inline-flex space-x-2 items-center">
                            @csrf
                            @method('PUT')

                            <label for="status" class="mr-2 font-medium">Ubah Status:</label>
                            <select name="status" id="status" class="border rounded px-2 py-1 text-sm">
                                @foreach ($statusOptions as $status)
                                    <option value="{{ $status }}" {{ $pengajuan->status === $status ? 'selected' : '' }}>
                                        {{ ucfirst($status) }}
                                    </option>
                                @endforeach
                            </select>

                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin mengubah status?')" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 text-sm">
                                Simpan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endif

    </main>

    <!-- Preview Modal Popup -->
    <div id="previewModal" class="fixed inset-0 bg-black bg-opacity-70 z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-2xl overflow-hidden flex flex-col w-full max-w-4xl h-5/6 max-h-screen">
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-blue-400 to-blue-900 p-4 text-white flex items-center justify-between">
                <div class="flex items-center">
                    <i class="fas fa-file-alt mr-3 text-xl"></i>
                    <div>
                        <h3 class="text-lg font-semibold">Preview Dokumen</h3>
                        <p class="text-sm opacity-90" id="previewTitle">Memuat dokumen...</p>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <button onclick="toggleFullscreen()" class="text-white hover:text-gray-200 transition-colors p-2 rounded-lg hover:bg-white hover:bg-opacity-10">
                        <i class="fas fa-expand text-lg" id="fullscreenIcon"></i>
                    </button>
                    <button onclick="closePreview()" class="text-white hover:text-gray-200 transition-colors p-2 rounded-lg hover:bg-white hover:bg-opacity-10">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>
            </div>
            
            <div class="flex-1 relative bg-gray-100 overflow-hidden">
                <div id="previewLoading" class="absolute inset-0 flex items-center justify-center bg-white z-10">
                    <div class="text-center">
                        <div class="animate-spin rounded-full h-12 w-12 border-4 border-blue-600 border-t-transparent mx-auto mb-4"></div>
                        <p class="text-gray-600 font-medium">Memuat dokumen...</p>
                    </div>
                </div>
                
                <div id="previewContent" class="hidden h-full">
                    <div id="pdfPreview" class="hidden h-full">
                        <embed id="pdfEmbed" src="" type="application/pdf" class="w-full h-full">
                    </div>
                    
                    <div id="docPreview" class="hidden h-full">
                        <iframe id="docFrame" src="" class="w-full h-full border-none"></iframe>
                    </div>
                    
                    <div id="imagePreview" class="hidden h-full flex items-center justify-center p-4 bg-gray-50">
                        <img id="previewImage" src="" alt="Preview" class="max-w-full max-h-full object-contain rounded-lg shadow-lg">
                    </div>
                    
                    <div id="textPreview" class="hidden h-full p-6 overflow-auto bg-white">
                        <pre id="textContent" class="whitespace-pre-wrap text-sm text-gray-800 font-mono bg-gray-50 p-4 rounded-lg border"></pre>
                    </div>
                    
                    <div id="unsupportedPreview" class="hidden h-full flex items-center justify-center bg-white">
                        <div class="text-center">
                            <i class="fas fa-file-alt text-6xl text-gray-400 mb-4"></i>
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Preview Tidak Tersedia</h3>
                            <p class="text-gray-600 mb-4">Tipe file ini tidak dapat ditampilkan dalam preview.</p>
                            <button onclick="downloadFile()" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                <i class="fas fa-download mr-2"></i>
                                Download File
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-gray-50 border-t p-3 flex items-center justify-between">
                <div class="text-sm text-gray-600">
                    <i class="fas fa-info-circle mr-1"></i>
                    <span id="fileInfo">Informasi file akan muncul di sini</span>
                </div>
                <div class="flex items-center space-x-2">
                    <button onclick="downloadFile()" class="px-3 py-1.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm">
                        <i class="fas fa-download mr-1"></i>
                        Download
                    </button>
                    <button onclick="closePreview()" class="px-3 py-1.5 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors text-sm">
                        <i class="fas fa-times mr-1"></i>
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
   
    <script>
        let currentFileUrl = '';
        let currentFileName = '';
        let isFullscreen = false;

        function showPreview(url, fileName = '') {
            const modal = document.getElementById('previewModal');
            const loading = document.getElementById('previewLoading');
            const content = document.getElementById('previewContent');
            const titleElement = document.getElementById('previewTitle');
            
            hideAllPreviewTypes();
            
            modal.classList.remove('hidden');
            loading.classList.remove('hidden');
            content.classList.add('hidden');
            
            currentFileUrl = url;
            currentFileName = fileName || 'dokumen';
            titleElement.textContent = currentFileName;
            
            const fileExtension = getFileExtension(currentFileName);
            
            setTimeout(() => {
                showPreviewByType(url, fileExtension);
            }, 800);
        }

        function getFileExtension(filename) {
            if (!filename) return '';
            return filename.split('.').pop().toLowerCase();
        }

        function hideAllPreviewTypes() {
            document.getElementById('pdfPreview').classList.add('hidden');
            document.getElementById('docPreview').classList.add('hidden');
            document.getElementById('imagePreview').classList.add('hidden');
            document.getElementById('textPreview').classList.add('hidden');
            document.getElementById('unsupportedPreview').classList.add('hidden');
        }

        function showPreviewByType(url, extension) {
            const loading = document.getElementById('previewLoading');
            const content = document.getElementById('previewContent');
            const fileInfo = document.getElementById('fileInfo');
            
            fileInfo.textContent = `${extension ? extension.toUpperCase() : 'FILE'} • ${currentFileName}`;
            
            if (extension === 'pdf') {
                const pdfContainer = document.getElementById('pdfPreview');
                const pdfEmbed = document.getElementById('pdfEmbed');
                
                pdfEmbed.src = url + '#toolbar=1&navpanes=1&scrollbar=1&view=FitH';
                pdfContainer.classList.remove('hidden');
                
                loading.classList.add('hidden');
                content.classList.remove('hidden');
                
                pdfEmbed.onerror = function() {
                    console.log('PDF embed failed, trying iframe fallback');
                    pdfContainer.classList.add('hidden');
                    showDocumentFallback(url);
                };
                
            } else if (['doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx'].includes(extension)) {
                showDocumentFallback(url);
                
            } else if (['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'webp'].includes(extension)) {
                const imageContainer = document.getElementById('imagePreview');
                const image = document.getElementById('previewImage');
                
                image.src = url;
                image.alt = currentFileName;
                
                image.onload = function() {
                    loading.classList.add('hidden');
                    content.classList.remove('hidden');
                    imageContainer.classList.remove('hidden');
                };
                
                image.onerror = function() {
                    showUnsupportedPreview();
                };
                
            } else if (['txt', 'csv', 'json', 'xml', 'html', 'css', 'js', 'php', 'py'].includes(extension)) {
                // Text file preview
                showTextPreview(url);
                
            } else {
                // Unsupported file type
                showUnsupportedPreview();
            }
        }

        function showDocumentFallback(url) {
            const loading = document.getElementById('previewLoading');
            const content = document.getElementById('previewContent');
            const docContainer = document.getElementById('docPreview');
            const iframe = document.getElementById('docFrame');
            
            const googleViewerUrl = `https://docs.google.com/viewer?url=${encodeURIComponent(url)}&embedded=true`;
            iframe.src = googleViewerUrl;
            
            iframe.onload = function() {
                loading.classList.add('hidden');
                content.classList.remove('hidden');
                docContainer.classList.remove('hidden');
            };
            
            iframe.onerror = function() {
                console.log('Google Docs Viewer failed, trying direct load');
                iframe.src = url;
            };
            
            setTimeout(() => {
                if (loading.classList.contains('hidden') === false) {
                    loading.classList.add('hidden');
                    content.classList.remove('hidden');
                    docContainer.classList.remove('hidden');
                }
            }, 5000);
        }

        function showTextPreview(url) {
            const loading = document.getElementById('previewLoading');
            const content = document.getElementById('previewContent');
            const textContainer = document.getElementById('textPreview');
            const textContent = document.getElementById('textContent');
            
            fetch(url)
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.text();
                })
                .then(text => {
                    textContent.textContent = text;
                    loading.classList.add('hidden');
                    content.classList.remove('hidden');
                    textContainer.classList.remove('hidden');
                })
                .catch(error => {
                    console.error('Error loading text file:', error);
                    showUnsupportedPreview();
                });
        }

        function showUnsupportedPreview() {
            const loading = document.getElementById('previewLoading');
            const content = document.getElementById('previewContent');
            const unsupported = document.getElementById('unsupportedPreview');
            
            loading.classList.add('hidden');
            content.classList.remove('hidden');
            unsupported.classList.remove('hidden');
        }

        function closePreview() {
            const modal = document.getElementById('previewModal');
            const pdfEmbed = document.getElementById('pdfEmbed');
            const iframe = document.getElementById('docFrame');
            const image = document.getElementById('previewImage');
            
            modal.classList.add('hidden');
            pdfEmbed.src = '';
            iframe.src = '';
            image.src = '';
            
            // Reset fullscreen
            if (isFullscreen) {
                exitFullscreen();
            }
            
            // Reset variables
            currentFileUrl = '';
            currentFileName = '';
        }

        function toggleFullscreen() {
            const modal = document.querySelector('#previewModal .bg-white');
            const icon = document.getElementById('fullscreenIcon');
            
            if (!isFullscreen) {
                modal.classList.remove('max-w-4xl', 'h-5/6');
                modal.classList.add('w-full', 'h-full', 'max-w-none', 'rounded-none');
                icon.classList.remove('fa-expand');
                icon.classList.add('fa-compress');
                isFullscreen = true;
            } else {
                exitFullscreen();
            }
        }

        function exitFullscreen() {
            const modal = document.querySelector('#previewModal .bg-white');
            const icon = document.getElementById('fullscreenIcon');
            
            modal.classList.remove('w-full', 'h-full', 'max-w-none', 'rounded-none');
            modal.classList.add('max-w-4xl', 'h-5/6');
            icon.classList.remove('fa-compress');
            icon.classList.add('fa-expand');
            isFullscreen = false;
        }

        function downloadFile() {
            if (currentFileUrl) {
                window.open(currentFileUrl, '_blank');
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
            if (e.key === 'Escape' && !document.getElementById('previewModal').classList.contains('hidden')) {
                closePreview();
            }
        });

        // Update preview button calls to include filename
        document.addEventListener('DOMContentLoaded', function() {
            // Update all preview buttons to pass filename
            const previewButtons = document.querySelectorAll('button[onclick*="showPreview"]');
            previewButtons.forEach(button => {
                const row = button.closest('tr');
                const fileNameCell = row.querySelector('td:nth-child(3)'); // File name column
                const fileName = fileNameCell ? fileNameCell.textContent.trim() : '';
                
                // Update onclick to include filename
                const currentOnClick = button.getAttribute('onclick');
                const urlMatch = currentOnClick.match(/showPreview\('([^']+)'\)/);
                if (urlMatch) {
                    const url = urlMatch[1];
                    button.setAttribute('onclick', `showPreview('${url}', '${fileName}')`);
                }
            });
        });

        document.querySelectorAll('form button[type="submit"]').forEach(button => {
            button.addEventListener('click', function (e) {
                const form = this.closest('form');
                if (form.checkValidity()) {
                    e.preventDefault(); 
                    const originalText = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Memproses...';
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
</body>
</html>