@extends('layouts.adminbidang')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        darkMode: 'class',
        theme: {
            extend: {
                animation: {
                    'float': 'float 6s ease-in-out infinite',
                    'glow': 'glow 2s ease-in-out infinite alternate',
                    'slide-up': 'slideUp 0.5s ease-out',
                    'fade-in': 'fadeIn 0.6s ease-out',
                    'bounce-gentle': 'bounceGentle 2s ease-in-out infinite',
                    'rotate-slow': 'rotateSlow 20s linear infinite',
                },
                keyframes: {
                    float: {
                        '0%, 100%': { transform: 'translateY(0px)' },
                        '50%': { transform: 'translateY(-10px)' },
                    },
                    glow: {
                        '0%': { boxShadow: '0 0 20px rgba(59, 130, 246, 0.3)' },
                        '100%': { boxShadow: '0 0 40px rgba(59, 130, 246, 0.6)' },
                    },
                    slideUp: {
                        '0%': { opacity: '0', transform: 'translateY(30px)' },
                        '100%': { opacity: '1', transform: 'translateY(0)' },
                    },
                    fadeIn: {
                        '0%': { opacity: '0' },
                        '100%': { opacity: '1' },
                    },
                    bounceGentle: {
                        '0%, 100%': { transform: 'translateY(0)' },
                        '50%': { transform: 'translateY(-5px)' },
                    },
                    rotateSlow: {
                        '0%': { transform: 'rotate(0deg)' },
                        '100%': { transform: 'rotate(360deg)' },
                    }
                }
            }
        }
    }
</script>

<style>
    body {
        background: radial-gradient(ellipse at top, #1e293b 0%, #0f172a 100%);
        min-height: 100vh;
    }
    
    .glass-morphism {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .glass-strong {
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(30px);
        -webkit-backdrop-filter: blur(30px);
        border: 1px solid rgba(255, 255, 255, 0.15);
    }
    
    .floating-elements::before {
        content: '';
        position: fixed;
        top: -10%;
        left: -10%;
        width: 120%;
        height: 120%;
        background: radial-gradient(circle at 20% 30%, rgba(59, 130, 246, 0.1) 0%, transparent 40%),
                    radial-gradient(circle at 80% 20%, rgba(139, 92, 246, 0.08) 0%, transparent 50%),
                    radial-gradient(circle at 40% 80%, rgba(16, 185, 129, 0.06) 0%, transparent 60%);
        animation: float 20s ease-in-out infinite;
        pointer-events: none;
        z-index: -1;
    }
</style>

<div class="min-h-screen text-white relative floating-elements">
    <div class="container mx-auto px-4 py-8 space-y-8">
        
        @if(!$bidang)
        <!-- Alert Section dengan Layout Baru -->
        <div class="relative overflow-hidden">
            <div class="glass-morphism rounded-3xl p-8 border shadow-2xl animate-slide-up">
                <div class="flex items-start space-x-6">
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-2xl flex items-center justify-center animate-bounce-gentle">
                            <i class="fas fa-exclamation-triangle text-white text-2xl"></i>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-white mb-2">Akses Ditolak</h3>
                        <p class="text-white/80 mb-4">Anda belum ditugaskan ke bidang manapun. Silakan hubungi Super Admin untuk informasi lebih lanjut.</p>
                        <div class="flex flex-wrap gap-3">
                            <button class="px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 rounded-xl text-white font-semibold transform hover:scale-105 transition-all duration-200">
                                Hubungi Admin
                            </button>
                            <button class="px-4 py-2 glass-morphism hover:bg-white/20 rounded-xl text-white font-semibold border border-white/20 transform hover:scale-105 transition-all duration-200">
                                Kembali
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else

        <!-- Hero Dashboard Section dengan Layout Grid Modern -->
        <div class="grid lg:grid-cols-3 gap-8 animate-fade-in">
            <!-- Main Dashboard Info -->
            <div class="lg:col-span-2">
                <div class="glass-strong rounded-3xl p-8 h-full">
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <h1 class="text-4xl font-black text-white mb-2">Dashboard Admin</h1>
                            <p class="text-white/60 text-lg">Selamat datang kembali! Kelola pengajuan dengan mudah.</p>
                        </div>
                        <div class="hidden md:block">
                            <div class="w-20 h-20 bg-gradient-to-br from-blue-400 via-purple-500 to-cyan-400 rounded-3xl flex items-center justify-center animate-rotate-slow">
                                <i class="fas fa-tachometer-alt text-white text-3xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Informasi Bidang dalam Card Terpisah -->
                    <div class="glass-morphism rounded-2xl p-6 border border-white/20 w-auto">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-building text-white text-xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-white">{{ $bidang->nama }}</h3>
                        </div>
                        <p class="text-white/80">{{ $bidang->deskripsi ?? 'Tidak ada deskripsi tersedia' }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Quick Stats Sidebar -->
            <div class="space-y-6">
                <div class="glass-strong rounded-3xl p-8">
                    <h3 class="text-2xl font-bold text-white mb-6 flex items-center">
                        <i class="fas fa-chart-line mr-3 text-cyan-400"></i>
                        Ringkasan Hari Ini
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 glass-morphism rounded-xl">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-green-400 rounded-full mr-3 animate-pulse"></div>
                                <span class="text-white/80">Pengajuan Baru</span>
                            </div>
                            <span class="text-2xl font-bold text-green-400">+{{ $pengajuanPending }}</span>
                        </div>
                        <div class="flex items-center justify-between p-4 glass-morphism rounded-xl">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-blue-400 rounded-full mr-3 animate-pulse"></div>
                                <span class="text-white/80">Total Diproses</span>
                            </div>
                            <span class="text-2xl font-bold text-blue-400">{{ $pengajuanDiterima }}</span>
                        </div>
                        <div class="flex items-center justify-between p-4 glass-morphism rounded-xl">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-red-400 rounded-full mr-3 animate-pulse"></div>
                                <span class="text-white/80">Perlu Review</span>
                            </div>
                            <span class="text-2xl font-bold text-red-400">{{ $pengajuanDitolak }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div class="d-flex justify-center space-x-7">
    <!-- Statistics Grid dengan Layout Hexagonal -->
     <div class="glass-strong rounded-3xl overflow-hidden  shadow-2xl">
        <div class="lass-strong rounded-3xl p-8">
            <!-- Total Pengajuan -->
                         <div class="flex w-full mb-3 items-center justify-between p-4 glass-morphism rounded-xl">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-green-400 rounded-full mr-3 animate-pulse"></div>
                                <span class="text-white/80">Pengajuan Baru</span>
                            </div>
                            <span class="text-2xl font-bold text-green-400">+{{ $pengajuanPending }}</span>
                        </div>
                        <div class="flex w-full mb-3 items-center justify-between p-4 glass-morphism rounded-xl">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-blue-400 rounded-full mr-3 animate-pulse"></div>
                                <span class="text-white/80">Total Diproses</span>
                            </div>
                            <span class="text-2xl font-bold text-blue-400">{{ $pengajuanDiterima }}</span>
                        </div>
                        <div class="flex w-full mb-3 items-center justify-between p-4 glass-morphism rounded-xl">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-red-400 rounded-full mr-3 animate-pulse"></div>
                                <span class="text-white/80">Perlu Review</span>
                            </div>
                            <span class="text-2xl font-bold text-red-400">{{ $pengajuanDitolak }}</span>
                        </div>
                        <div class="flex w-full mb-3 items-center justify-between p-4 glass-morphism rounded-xl">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-purple-400 rounded-full mr-3 animate-pulse"></div>
                                <span class="text-white/80">Surat Pengantar</span>
                            </div>
                            <span class="text-2xl font-bold text-purple-400">{{ $statusDokumen->ada_surat_pengantar ?? 0 }}</span>
                        </div>
                        <div class="flex w-full mb-3 items-center justify-between p-4 glass-morphism rounded-xl">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-yellow-400 rounded-full mr-3 animate-pulse"></div>
                                <span class="text-white/80">Proposal</span>
                            </div>
                            <span class="text-2xl font-bold text-yellow-400">{{ $statusDokumen->ada_proposal ?? 0 }}</span>
                        </div>
        </div></div>

        <!-- Statistik Bidang -->
                <div class="glass-strong rounded-3xl overflow-hidden  shadow-2xl">
                    <div class="bg-gradient-to-r from-emerald-500/20 via-teal-500/20 to-cyan-500/20 p-3 border-b border-white/10">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-teal-500 rounded-xl flex items-center justify-center">
                                <i class="fas fa-chart-bar text-white text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white">Statistik Bidang</h3>
                                <p class="text-white/60">Overview semua bidang</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-3 space-y-2">
                        @foreach ($bidangStats as $b)
                        <div class="flex items-center justify-between p-4 glass-morphism rounded-xl hover:border-emerald-400/30 transition-all duration-300 group">
                            <div class="flex items-center space-x-3">
                                <div class="w-3 h-3 bg-gradient-to-r from-emerald-400 to-teal-400 rounded-full animate-pulse"></div>
                                <span class="text-white/90 font-semibold">{{ $b->nama }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="text-2xl font-bold text-emerald-400">{{ $b->total_pengajuan }}</span>
                                <div class="w-8 h-8 bg-gradient-to-br from-emerald-500 to-teal-500 rounded-lg flex items-center justify-center group-hover:animate-bounce-gentle">
                                    <i class="fas fa-arrow-up text-white text-sm"></i>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Recent Activity Section -->
        <div class="animate-slide-up ">
            <div class="glass-strong rounded-3xl overflow-hidden shadow-2xl">
                <div class="bg-gradient-to-r from-indigo-500/20 via-purple-500/20 to-pink-500/20 p-6 border-b border-white/10">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-history text-white text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-white">Aktivitas Terbaru</h3>
                                <p class="text-white/60">Update terkini dari sistem</p>
                            </div>
                        </div>
                        <button class="px-4 py-2 glass-morphism hover:bg-white/20 rounded-xl text-white font-semibold border border-white/20 transition-all duration-200">
                            <i class="fas fa-sync-alt mr-2"></i>Refresh
                        </button>
                    </div>
                </div>
                
                <div class="p-6">
                    <div class="space-y-4">
                        @forelse($userPengajuan->take(5) as $activity)
                        <div class="flex items-start space-x-4 p-4 glass-morphism rounded-xl hover:border-purple-400/30 transition-all duration-300 group">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white font-bold group-hover:animate-bounce-gentle">
                                    {{ substr($activity->nama, 0, 1) }}
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="text-white font-semibold">{{ $activity->nama }}</h4>
                                        <p class="text-white/70 text-sm">
                                            @if($activity->status == 'pending')
                                                Mengajukan permohonan baru
                                            @elseif($activity->status == 'diterima')
                                                Pengajuan telah diterima
                                            @else
                                                Pengajuan ditolak
                                            @endif
                                        </p>
                                        <p class="text-white/50 text-xs">{{ $activity->nama_universitas }}</p>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-white/60 text-sm">{{ \Carbon\Carbon::parse($activity->tanggal_pengajuan)->diffForHumans() }}</div>
                                        @if($activity->status == 'pending')
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-gradient-to-r from-yellow-400 to-orange-500 text-white mt-1">
                                                Pending
                                            </span>
                                        @elseif($activity->status == 'diterima')
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-gradient-to-r from-green-400 to-emerald-500 text-white mt-1">
                                                Diterima
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-gradient-to-r from-red-400 to-pink-500 text-white mt-1">
                                                Ditolak
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-12">
                            <div class="w-20 h-20 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-clock text-white/30 text-3xl"></i>
                            </div>
                            <h4 class="text-xl font-semibold text-white/80 mb-2">Belum ada aktivitas</h4>
                            <p class="text-white/50">Aktivitas terbaru akan muncul di sini</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        @endif
    </div>
</div>

</div>
        

        <!-- Main Content Grid - 2 Column Layout -->
<div class="w-full px-4 md:px-8">


    <!-- Tabel User - Span 3 columns -->
    <div class="lg:col-span-3">
        <div class="glass-strong rounded-3xl overflow-hidden shadow-2xl">
            <div class="bg-gradient-to-r from-blue-500/20 via-purple-500/20 to-cyan-500/20 p-6 border-b border-white/10">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-users text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white">Daftar User Pengajuan</h3>
                            <p class="text-white/60">Kelola semua pengajuan pengguna</p>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <button class="px-4 py-2 glass-morphism hover:bg-white/20 rounded-xl text-white font-semibold border border-white/20 transition-all duration-200">
                            <i class="fas fa-filter mr-2"></i>Filter
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-white">
                    <thead class="bg-white/5">
                        <tr>
                            <th class="px-3 py-4 text-left text-sm font-bold text-white/90 uppercase tracking-wide">Nama</th>
                            <th class="px-3 py-4 text-left text-sm font-bold text-white/90 uppercase tracking-wide">Email</th>
                            <th class="px-3 py-4 text-left text-sm font-bold text-white/90 uppercase tracking-wide">Universitas</th>
                            <th class="px-3 py-4 text-left text-sm font-bold text-white/90 uppercase tracking-wide">Status</th>
                            <th class="px-3 py-4 text-left text-sm font-bold text-white/90 uppercase tracking-wide">Tanggal</th>
                            <th class="px-3 py-4 text-left text-sm font-bold text-white/90 uppercase tracking-wide">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse($userPengajuan as $user)
                        <tr class="hover:bg-gradient-to-r hover:from-blue-500/10 hover:to-purple-500/5 transition-all duration-300 group">
                            <td class="px-3 py-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-purple-500 rounded-full flex items-center justify-center text-white font-bold">
                                        {{ substr($user->nama, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="text-white/90 font-semibold">{{ $user->nama }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-3 py-4 text-white/80">{{ $user->email }}</td>
                            <td class="px-3 py-4 text-white/80">{{ $user->nama_universitas }}</td>
                            <td class="px-3 py-4">
                                @if($user->status == 'pending')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-gradient-to-r from-yellow-400 to-orange-500 text-white">
                                        <i class="fas fa-clock mr-1"></i>{{ ucfirst($user->status) }}
                                    </span>
                                @elseif($user->status == 'diterima')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-gradient-to-r from-green-400 to-emerald-500 text-white">
                                        <i class="fas fa-check mr-1"></i>{{ ucfirst($user->status) }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-gradient-to-r from-red-400 to-pink-500 text-white">
                                        <i class="fas fa-times mr-1"></i>{{ ucfirst($user->status) }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-3 py-4 text-white/80">{{ \Carbon\Carbon::parse($user->tanggal_pengajuan)->format('d/m/Y') }}</td>
                            <td class="px-3 py-4">
                                <div class="flex space-x-2 opacity-100 lg:opacity-0 lg:group-hover:opacity-100 transition-opacity duration-300">
                                    <button onclick="showUserDetails({{ $user->pengajuan_id }})" 
                                            class="px-3 py-1 text-sm glass-morphism hover:bg-white/20 border border-white/20 rounded-lg text-white font-semibold transition-all duration-200 hover:scale-105">
                                        <i class="fas fa-eye mr-1"></i>Detail
                                    </button>
                                    <a href="{{ route('admin.pengajuan.showbidang', $user->pengajuan_id) }}" 
                                       class="px-3 py-1 text-sm bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 rounded-lg text-white font-semibold transition-all duration-200 hover:scale-105">
                                        <i class="fas fa-edit mr-1"></i>Edit
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center space-y-4">
                                    <div class="w-24 h-24 bg-white/5 rounded-full flex items-center justify-center">
                                        <i class="fas fa-inbox text-white/30 text-4xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-xl font-semibold text-white/80 mb-2">Belum ada pengajuan</h4>
                                        <p class="text-white/50">Data pengajuan akan muncul di sini ketika ada user yang mengajukan</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Statistik Bidang Sidebar - Span 2 columns -->
    <div class="lg:col-span-2 space-y-6">
        {{-- Konten statistik atau info lainnya di sini --}}
    </div>
</div>

<!-- Modal untuk Detail User -->
<div id="userDetailModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm">
    <div class="glass-strong rounded-3xl p-8 max-w-2xl w-full mx-4 border border-white/20 shadow-2xl animate-slide-up">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-2xl font-bold text-white flex items-center">
                <i class="fas fa-user-circle mr-3 text-blue-400"></i>
                Detail Pengajuan
            </h3>
            <button onclick="closeUserDetails()" class="w-10 h-10 glass-morphism hover:bg-white/20 rounded-xl flex items-center justify-center text-white border border-white/20 transition-all duration-200">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <div id="userDetailContent" class="space-y-4">
            <!-- Content will be loaded here -->
        </div>
    </div>
</div>


<script>
// Fungsi untuk menampilkan detail user
function showUserDetails(pengajuanId) {
    const modal = document.getElementById('userDetailModal');
    const content = document.getElementById('userDetailContent');
    
    // Show loading
    content.innerHTML = `
        <div class="flex items-center justify-center py-12">
            <div class="w-12 h-12 border-4 border-blue-400 border-t-transparent rounded-full animate-spin"></div>
        </div>
    `;
    
    // Show modal
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    
    // Simulate loading data (replace with actual AJAX call)
    setTimeout(() => {
        content.innerHTML = `
            <div class="grid md:grid-cols-2 gap-6">
                <div class="glass-morphism rounded-2xl p-4 border border-white/10">
                    <h4 class="text-lg font-semibold text-white mb-4 flex items-center">
                        <i class="fas fa-user mr-2 text-blue-400"></i>
                        Informasi Pribadi
                    </h4>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-white/70">Nama:</span>
                            <span class="text-white font-semibold">Loading...</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-white/70">Email:</span>
                            <span class="text-white font-semibold">Loading...</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-white/70">Universitas:</span>
                            <span class="text-white font-semibold">Loading...</span>
                        </div>
                    </div>
                </div>
                
                <div class="glass-morphism rounded-2xl p-4 border border-white/10">
                    <h4 class="text-lg font-semibold text-white mb-4 flex items-center">
                        <i class="fas fa-file-alt mr-2 text-green-400"></i>
                        Status Pengajuan
                    </h4>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-white/70">Status:</span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-gradient-to-r from-yellow-400 to-orange-500 text-white">
                                <i class="fas fa-clock mr-1"></i>Pending
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-white/70">Tanggal:</span>
                            <span class="text-white font-semibold">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="glass-morphism rounded-2xl p-4 border border-white/10">
                <h4 class="text-lg font-semibold text-white mb-4 flex items-center">
                    <i class="fas fa-paperclip mr-2 text-purple-400"></i>
                    Dokumen Terlampir
                </h4>
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="flex items-center p-3 glass-morphism rounded-xl border border-white/10">
                        <i class="fas fa-file-pdf text-red-400 text-xl mr-3"></i>
                        <div>
                            <div class="text-white font-semibold">Surat Pengantar</div>
                            <div class="text-white/60 text-sm">PDF • 2.5 MB</div>
                        </div>
                    </div>
                    <div class="flex items-center p-3 glass-morphism rounded-xl border border-white/10">
                        <i class="fas fa-file-word text-blue-400 text-xl mr-3"></i>
                        <div>
                            <div class="text-white font-semibold">Proposal</div>
                            <div class="text-white/60 text-sm">DOC • 1.8 MB</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-end space-x-3 pt-4 border-t border-white/10">
                <button onclick="closeUserDetails()" class="px-6 py-2 glass-morphism hover:bg-white/20 rounded-xl text-white font-semibold border border-white/20 transition-all duration-200">
                    Tutup
                </button>
                <button class="px-6 py-2 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 rounded-xl text-white font-semibold transition-all duration-200">
                    <i class="fas fa-check mr-2"></i>Terima
                </button>
                <button class="px-6 py-2 bg-gradient-to-r from-red-500 to-pink-600 hover:from-red-600 hover:to-pink-700 rounded-xl text-white font-semibold transition-all duration-200">
                    <i class="fas fa-times mr-2"></i>Tolak
                </button>
            </div>
        `;
    }, 1000);
}

// Fungsi untuk menutup modal
function closeUserDetails() {
    const modal = document.getElementById('userDetailModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

// Close modal when clicking outside
document.getElementById('userDetailModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeUserDetails();
    }
});

// Animate elements on scroll
window.addEventListener('scroll', function() {
    const elements = document.querySelectorAll('.animate-slide-up');
    elements.forEach(element => {
        const elementTop = element.getBoundingClientRect().top;
        const elementVisible = 150;
        
        if (elementTop < window.innerHeight - elementVisible) {
            element.classList.add('opacity-100');
        }
    });
});

// Initialize animations
document.addEventListener('DOMContentLoaded', function() {
    // Add staggered animations to stat cards
    const statCards = document.querySelectorAll('.group');
    statCards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
    });
    
    // Add hover effects to interactive elements
    const interactiveElements = document.querySelectorAll('button, .group');
    interactiveElements.forEach(element => {
        element.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        element.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>

@endsection