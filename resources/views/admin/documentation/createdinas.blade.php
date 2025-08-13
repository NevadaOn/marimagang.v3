@extends('layouts.admindinas')
@section('content')
<!-- Background with gradient -->
<div class="min-h-screen relative overflow-hidden">
    <!-- Animated background elements -->
    

    <div class="relative z-10 container mx-auto px-4 py-8">
        <!-- Header with glassmorphism effect -->
        <div class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-3xl p-8 mb-8 shadow-2xl">
            <h2 class="text-4xl font-bold text-white mb-2 bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent">
                Tambah Dokumentasi Kegiatan
            </h2>
            <p class="text-white/70 text-lg">Dokumentasikan kegiatan dan project Anda dengan mudah</p>
        </div>

        <!-- Error Messages with glassmorphism -->
        @if ($errors->any())
        <div class="backdrop-blur-xl bg-red-500/20 border border-red-300/30 rounded-2xl p-6 mb-6 shadow-xl">
            <div class="flex items-center mb-4">
                <svg class="w-6 h-6 text-red-300 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <strong class="text-red-200 font-semibold">Terjadi Kesalahan!</strong>
            </div>
            <ul class="space-y-2">
                @foreach ($errors->all() as $error)
                <li class="text-red-200 flex items-start">
                    <span class="w-2 h-2 bg-red-300 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Main Form with glassmorphism -->
        <div class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-3xl shadow-2xl overflow-hidden">
            <div class="p-8">
                <form action="{{ route('admin.documentation.storedinas') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf

                    <!-- Judul Kegiatan -->
                    <div class="group">
                        <label for="judul_kegiatan" class="block text-white/90 font-semibold mb-3 text-lg group-hover:text-white transition-colors">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Judul Kegiatan
                            </span>
                        </label>
                        <input type="text" 
                               name="judul_kegiatan" 
                               id="judul_kegiatan"
                               value="{{ old('judul_kegiatan') }}"
                               class="w-full px-6 py-4 bg-white/10 border border-white/20 rounded-2xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-400/50 focus:border-transparent backdrop-blur-sm transition-all duration-300 hover:bg-white/15"
                               placeholder="Masukkan judul kegiatan...">
                    </div>

                    <!-- Judul Project -->
                    <div class="group">
                        <label for="judul_project" class="block text-white/90 font-semibold mb-3 text-lg group-hover:text-white transition-colors">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                                Judul Project
                            </span>
                        </label>
                        <input type="text" 
                               name="judul_project" 
                               id="judul_project"
                               value="{{ old('judul_project') }}"
                               class="w-full px-6 py-4 bg-white/10 border border-white/20 rounded-2xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-400/50 focus:border-transparent backdrop-blur-sm transition-all duration-300 hover:bg-white/15"
                               placeholder="Masukkan judul project...">
                    </div>

                    <!-- Deskripsi -->
                    <div class="group">
                        <label for="deskripsi" class="block text-white/90 font-semibold mb-3 text-lg group-hover:text-white transition-colors">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                                </svg>
                                Deskripsi 
                                <span class="text-white/60 font-normal ml-2">(Opsional)</span>
                            </span>
                        </label>
                        <textarea name="deskripsi" 
                                  id="deskripsi"
                                  rows="5"
                                  class="w-full px-6 py-4 bg-white/10 border border-white/20 rounded-2xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-400/50 focus:border-transparent backdrop-blur-sm transition-all duration-300 hover:bg-white/15 resize-none"
                                  placeholder="Masukkan deskripsi kegiatan atau project...">{{ old('deskripsi') }}</textarea>
                    </div>

                    <!-- Upload Images -->
                    <div class="group">
                        <label for="images" class="block text-white/90 font-semibold mb-3 text-lg group-hover:text-white transition-colors">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Upload Gambar
                            </span>
                        </label>
                        
                        <!-- Custom file upload area -->
                        <div class="relative">
                            <input type="file" 
                                   name="images[]" 
                                   id="images"
                                   multiple 
                                   required 
                                   accept="image/*"
                                   class="hidden"
                                   onchange="handleFileSelect(this)">
                            
                            <label for="images" class="flex flex-col items-center justify-center w-full h-32 bg-white/10 border-2 border-white/30 border-dashed rounded-2xl cursor-pointer hover:bg-white/15 transition-all duration-300 group">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-10 h-10 mb-3 text-white/70 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="mb-2 text-white/70 group-hover:text-white transition-colors">
                                        <span class="font-semibold">Klik untuk upload</span> atau drag & drop
                                    </p>
                                    <p class="text-xs text-white/50">PNG, JPG, JPEG (Max 2MB per file)</p>
                                </div>
                            </label>
                        </div>
                        
                        <!-- File info -->
                        <div id="file-info" class="mt-4 space-y-2 hidden">
                            <p class="text-white/70 text-sm font-medium">File yang dipilih:</p>
                            <div id="file-list" class="space-y-1"></div>
                        </div>
                        
                        <p class="mt-3 text-white/60 text-sm flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Bisa pilih lebih dari satu gambar (Max 2MB per file)
                        </p>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-6">
                        <button type="submit" 
                                class="w-full bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-bold py-4 px-8 rounded-2xl shadow-2xl transform transition-all duration-300 hover:scale-105 hover:shadow-blue-500/25 focus:outline-none focus:ring-4 focus:ring-blue-500/50">
                            <span class="flex items-center justify-center">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                                </svg>
                                Simpan Dokumentasi
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function handleFileSelect(input) {
    const fileInfo = document.getElementById('file-info');
    const fileList = document.getElementById('file-list');
    
    if (input.files.length > 0) {
        fileInfo.classList.remove('hidden');
        fileList.innerHTML = '';
        
        Array.from(input.files).forEach((file, index) => {
            const fileItem = document.createElement('div');
            fileItem.className = 'flex items-center text-white/80 text-sm bg-white/5 rounded-lg px-3 py-2';
            fileItem.innerHTML = `
                <svg class="w-4 h-4 mr-2 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="flex-1">${file.name}</span>
                <span class="text-xs text-white/50 ml-2">${(file.size / 1024 / 1024).toFixed(2)} MB</span>
            `;
            fileList.appendChild(fileItem);
        });
    } else {
        fileInfo.classList.add('hidden');
    }
}

// Add some interactive animations
document.addEventListener('DOMContentLoaded', function() {
    // Add floating animation to background elements
    const floatingElements = document.querySelectorAll('.absolute.top-10, .absolute.top-96, .absolute.bottom-20');
    floatingElements.forEach((el, index) => {
        el.style.animation = `float ${3 + index}s ease-in-out infinite`;
    });
});

// CSS animation for floating effect
const style = document.createElement('style');
style.textContent = `
    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        33% { transform: translateY(-10px) rotate(1deg); }
        66% { transform: translateY(5px) rotate(-1deg); }
    }
`;
document.head.appendChild(style);
</script>
@endsection