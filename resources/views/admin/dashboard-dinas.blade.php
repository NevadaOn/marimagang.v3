@extends('layouts.admindinas')

@section('title', 'Dashboard Admin Dinas')

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>

<style>
    :root {
        --primary-color: #1e3a8a;
        --secondary-color: #000000;
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

    body {
        background: linear-gradient(135deg, #0f0f0f 0%, #1a1a1a 50%, #0f0f0f 100%);
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
    }

    /* Animated background elements */
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 20%, rgba(59, 130, 246, 0.08) 0%, transparent 50%),
            radial-gradient(circle at 80% 30%, rgba(139, 92, 246, 0.06) 0%, transparent 50%),
            radial-gradient(circle at 40% 70%, rgba(16, 185, 129, 0.04) 0%, transparent 50%),
            radial-gradient(circle at 90% 80%, rgba(245, 158, 11, 0.05) 0%, transparent 50%);
        animation: backgroundFloat 20s ease-in-out infinite;
        z-index: -2;
    }

    body::after {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            linear-gradient(45deg, transparent 48%, rgba(59, 130, 246, 0.02) 50%, transparent 52%),
            linear-gradient(-45deg, transparent 48%, rgba(139, 92, 246, 0.02) 50%, transparent 52%);
        animation: gridMove 30s linear infinite;
        z-index: -1;
    }

    @keyframes backgroundFloat {
        0%, 100% { 
            transform: translateY(0) rotate(0deg);
            opacity: 1;
        }
        50% { 
            transform: translateY(-20px) rotate(1deg);
            opacity: 0.8;
        }
    }

    @keyframes gridMove {
        0% { background-position: 0 0; }
        100% { background-position: 100px 100px; }
    }

    /* Glass card styling */
    .glass-card {
        background: var(--glass-bg);
        backdrop-filter: blur(25px);
        -webkit-backdrop-filter: blur(25px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        box-shadow: 
            0 8px 32px rgba(0, 0, 0, 0.3),
            0 0 0 1px rgba(255, 255, 255, 0.05),
            inset 0 1px 0 rgba(255, 255, 255, 0.1);
        position: relative;
        overflow: hidden;
    }

    .glass-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    }

    .glass-card:hover::before {
        left: 100%;
    }

    .glass-card:hover {
        transform: translateY(-8px) scale(1.02);
        border-color: rgba(255, 255, 255, 0.2);
        box-shadow: 
            0 16px 64px rgba(0, 0, 0, 0.4),
            0 0 0 1px rgba(255, 255, 255, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
    }

    /* Stats card specific styling */
    .stats-card {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        padding: 2rem;
        position: relative;
        overflow: hidden;
    }

    .stats-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-1);
        border-radius: 20px 20px 0 0;
    }

    .stats-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 60px rgba(59, 130, 246, 0.2);
    }

    /* Header styling */
    .dashboard-header {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
        animation: slideUp 0.4s ease-out;
    }

    .dashboard-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: var(--gradient-1);
    }

    /* Typography */
    .dashboard-title {
        font-size: 2.5rem;
        font-weight: 800;
        background: var(--gradient-1);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 0.5rem;
    }

    .dashboard-subtitle {
        color: var(--text-secondary);
        font-size: 1rem;
        font-weight: 500;
    }

    /* List styling */
    .glass-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .glass-list-item {
        padding: 1.5rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .glass-list-item:last-child {
        border-bottom: none;
    }

    .glass-list-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 4px;
        height: 100%;
        background: var(--gradient-1);
        transform: scaleY(0);
        transition: transform 0.3s ease;
        transform-origin: bottom;
    }

    .glass-list-item:hover::before {
        transform: scaleY(1);
    }

    .glass-list-item:hover {
        background: rgba(255, 255, 255, 0.05);
        padding-left: 2rem;
    }

    /* Badge styling */
    .status-badge {
        padding: 0.5rem 1rem;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
    }

    .badge-primary {
        background: var(--gradient-1);
        color: white;
    }

    .badge-success {
        background: var(--gradient-success);
        color: white;
    }

    .badge-info {
        background: var(--gradient-info);
        color: white;
    }

    /* Icon styling */
    .section-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 12px;
        background: var(--gradient-1);
        color: white;
        margin-right: 1rem;
        font-size: 1.2rem;
    }

    .section-title {
        color: var(--text-primary);
        font-size: 1.25rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    /* Number counter animation */
    .counter {
        font-size: 3rem;
        font-weight: 900;
        color: var(--text-primary);
        text-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .dashboard-title {
            font-size: 2rem;
        }
        
        .counter {
            font-size: 2.5rem;
        }
        
        .stats-card {
            padding: 1.5rem;
        }
        
        .glass-card {
            margin-bottom: 1rem;
        }
    }

    /* Scrollbar styling */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb {
        background: var(--gradient-1);
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
    }

    /* Hover effects untuk interactivitas */
    .interactive-element {
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .interactive-element:hover {
        transform: translateX(10px);
    }
</style>
@endpush

@section('content')
<div class="container mx-auto px-4 py-8 space-y-8 relative z-10">
    <!-- Header Dashboard -->
    <div class="dashboard-header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div class="animate-delay-100">
                <h1 class="dashboard-title">Dashboard Admin Dinas</h1>
                <p class="dashboard-subtitle">Ringkasan data dan aktivitas sistem magang</p>
            </div>
            <div class="animate-delay-200">
                <div class="flex items-center space-x-4">
                    <div class="status-badge badge-success">
                        <i class="fas fa-circle text-green-400"></i>
                        <span>System Online</span>
                    </div>
                    <div class="text-sm text-gray-400">
                        <i class="fas fa-clock mr-2"></i>
                        {{ now()->format('d M Y, H:i') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Pengajuan Card -->
        <div class="stats-card animate-delay-200 animate-float">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm font-medium text-gray-400 mb-2">Total Pengajuan</div>
                    <div class="counter" id="totalPengajuan">{{ $totalPengajuan }}</div>
                    <div class="text-xs text-green-400 mt-2">
                        <i class="fas fa-arrow-up mr-1"></i>
                        +12% dari bulan lalu
                    </div>
                </div>
                <div class="section-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
            </div>
        </div>

        <!-- Pengajuan Pending Card -->
        <div class="stats-card animate-delay-300 animate-float">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm font-medium text-gray-400 mb-2">Menunggu Review</div>
                    <div class="counter text-yellow-400">{{ $pengajuanPending ?? 0 }}</div>
                    <div class="text-xs text-yellow-400 mt-2">
                        <i class="fas fa-clock mr-1"></i>
                        Perlu tindakan
                    </div>
                </div>
                <div class="section-icon" style="background: var(--gradient-warning);">
                    <i class="fas fa-hourglass-half"></i>
                </div>
            </div>
        </div>

        <!-- Pengajuan Diterima Card -->
        <div class="stats-card animate-delay-400 animate-float">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm font-medium text-gray-400 mb-2">Diterima</div>
                    <div class="counter text-green-400">{{ $pengajuanDiterima ?? 0 }}</div>
                    <div class="text-xs text-green-400 mt-2">
                        <i class="fas fa-check-circle mr-1"></i>
                        Status positif
                    </div>
                </div>
                <div class="section-icon" style="background: var(--gradient-success);">
                    <i class="fas fa-check"></i>
                </div>
            </div>
        </div>

        <!-- Total Universitas Card -->
        <div class="stats-card animate-delay-500 animate-float">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm font-medium text-gray-400 mb-2">Universitas</div>
                    <div class="counter text-blue-400">{{ $userPerUniversitas->count() }}</div>
                    <div class="text-xs text-blue-400 mt-2">
                        <i class="fas fa-university mr-1"></i>
                        Mitra aktif
                    </div>
                </div>
                <div class="section-icon" style="background: var(--gradient-info);">
                    <i class="fas fa-graduation-cap"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    
        <!-- Pengajuan Terbaru -->
        <div class="glass-card animate-delay-300">
            <div class="p-6">
                <h2 class="section-title">
                    <div class="section-icon">
                        <i class="fas fa-file-text"></i>
                    </div>
                    Pengajuan Terbaru
                    <span class="status-badge badge-primary ml-auto">
                        {{ $pengajuanTerbaru->count() }} items
                    </span>
                </h2>
                
                @if($pengajuanTerbaru->count() > 0)
                  <ul id="pengajuan-list" class="glass-list">
    @foreach ($pengajuanTerbaru as $index => $item)
        <li class="glass-list-item interactive-element animate-delay-{{ 300 + ($index * 100) }}">
            <div class="flex justify-between items-start">
                <div class="flex-1">
                    <div class="flex items-center space-x-3 mb-2">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white font-bold text-sm">
                            {{ substr($item->user->nama, 0, 1) }}
                        </div>
                        <div>
                            <div class="font-semibold text-white">{{ $item->user->nama }}</div>
                            <div class="text-sm text-gray-400">{{ $item->user->nim }}</div>
                        </div>
                    </div>
                    <div class="text-sm text-gray-300 ml-13">
                        Mengajukan ke <span class="text-blue-400 font-medium">{{ $item->databidang->nama }}</span>
                    </div>
                    <div class="flex items-center space-x-4 mt-3">
                        <span class="status-badge badge-info">
                            <i class="fas fa-calendar mr-1"></i>
                            {{ $item->created_at->format('d M Y') }}
                        </span>
                        <span class="status-badge" style="background: var(--gradient-{{ $item->status === 'pending' ? 'warning' : ($item->status === 'diterima' ? 'success' : 'info') }});">
                            <i class="fas fa-{{ $item->status === 'pending' ? 'clock' : ($item->status === 'diterima' ? 'check' : 'info-circle') }} mr-1"></i>
                            {{ ucfirst($item->status) }}
                        </span>
                    </div>
                </div>
                <div class="text-right">
                    <button class="text-blue-400 hover:text-blue-300 transition-colors">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </li>
    @endforeach
</ul>
                    <!-- Tombol Navigasi -->
<div class="flex justify-between mt-4">
    <button id="prevBtn" class="px-4 py-2 bg-gray-700 rounded-lg hover:bg-gray-600 text-white">&laquo; Sebelumnya</button>
    <button id="nextBtn" class="px-4 py-2 bg-gray-700 rounded-lg hover:bg-gray-600 text-white">Selanjutnya &raquo;</button>
</div>
                @else
                    <div class="text-center py-12">
                        <i class="fas fa-inbox text-gray-500 text-4xl mb-4"></i>
                        <p class="text-gray-400">Belum ada pengajuan terbaru</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Statistik Universitas -->
        <div class="glass-card animate-delay-400">
            <div class="p-6">
                <h2 class="section-title">
                    <div class="section-icon">
                        <i class="fas fa-university"></i>
                    </div>
                    Statistik Universitas
                    <span class="status-badge badge-success ml-auto">
                        {{ $userPerUniversitas->sum('total_user') }} mahasiswa
                    </span>
                </h2>
                
                @if($userPerUniversitas->count() > 0)
                    <ul class="glass-list">
                        @foreach ($userPerUniversitas as $index => $item)
                            <li class="glass-list-item interactive-element animate-delay-{{ 400 + ($index * 100) }}">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center text-white font-bold">
                                            {{ substr($item->nama_universitas, 0, 2) }}
                                        </div>
                                        <div>
                                            <div class="font-semibold text-white text-sm">{{ $item->nama_universitas }}</div>
                                            <div class="text-xs text-gray-400">Universitas Mitra</div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-white">{{ $item->total_user }}</div>
                                        <div class="text-xs text-gray-400">mahasiswa</div>
                                    </div>
                                </div>
                                <!-- Progress Bar -->
                                <div class="mt-3 ml-16">
                                    <div class="w-full bg-gray-700 rounded-full h-2">
                                        <div class="bg-gradient-to-r from-purple-400 to-purple-600 h-2 rounded-full transition-all duration-1000 ease-out" 
                                             style="width: {{ ($item->total_user / $userPerUniversitas->max('total_user')) * 100 }}%"></div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="text-center py-12">
                        <i class="fas fa-university text-gray-500 text-4xl mb-4"></i>
                        <p class="text-gray-400">Belum ada data universitas</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Additional Info Cards -->
    <div class="glass-card animate-delay-500">
        <div class="p-6">
            <h2 class="section-title">
                <div class="section-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                Ringkasan Aktivitas Sistem
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                <div class="text-center p-4 bg-black/10 bg-opacity-20 rounded-xl border border-white border-opacity-10">
                    <i class="fas fa-users text-3xl text-blue-400 mb-3"></i>
                    <div class="text-2xl font-bold text-white">{{ $userPerUniversitas->sum('total_user') }}</div>
                    <div class="text-sm text-gray-400">Total Pengguna Aktif</div>
                </div>
                
                <div class="text-center p-4 bg-black/10 bg-opacity-20 rounded-xl border border-white border-opacity-10">
                    <i class="fas fa-building text-3xl text-green-400 mb-3"></i>
                    <div class="text-2xl font-bold text-white">{{ $userPerUniversitas->count() }}</div>
                    <div class="text-sm text-gray-400">Universitas Terdaftar</div>
                </div>
                
                <div class="text-center p-4 bg-black/10 bg-opacity-20 rounded-xl border border-white border-opacity-10">
                    <i class="fas fa-calendar-check text-3xl text-purple-400 mb-3"></i>
                    <div class="text-2xl font-bold text-white">{{ $totalPengajuan }}</div>
                    <div class="text-sm text-gray-400">Total Pengajuan</div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ==== Counter Animation ====
    function animateCounter(element, target) {
        let current = 0;
        const increment = target / 100;
        const timer = setInterval(() => {
            current += increment;
            element.textContent = Math.floor(current);
            if (current >= target) {
                element.textContent = target;
                clearInterval(timer);
            }
        }, 10);
    }

    const totalPengajuan = document.getElementById('totalPengajuan');
    if (totalPengajuan) {
        animateCounter(totalPengajuan, {{ $totalPengajuan }});
    }

    // ==== List Animation Delay ====
    const listItems = document.querySelectorAll('.glass-list-item');
    listItems.forEach((item, index) => {
        item.style.animationDelay = `${index * 0.1}s`;
        item.classList.add('animate-delay-' + (index * 100));
    });

    // ==== Smooth Scroll ====
    document.documentElement.style.scrollBehavior = 'smooth';

    // ==== Pagination ====
    const itemsPerPage = 3;
    const items = document.querySelectorAll("#pengajuan-list li");
    let currentPage = 1;
    const totalPages = Math.ceil(items.length / itemsPerPage);

    function showPage(page) {
        items.forEach((item, index) => {
            item.style.display =
                (index >= (page - 1) * itemsPerPage && index < page * itemsPerPage)
                ? "block"
                : "none";
        });
    }

    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");

    prevBtn.addEventListener("click", function () {
        if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
        }
    });

    nextBtn.addEventListener("click", function () {
        if (currentPage < totalPages) {
            currentPage++;
            showPage(currentPage);
        }
    });

    // Tampilkan halaman awal
    showPage(currentPage);
});

// ==== Parallax Background (gunakan elemen biasa, bukan pseudo-element) ====
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const bg = document.querySelector('.parallax-bg');
    if (bg) {
        bg.style.transform = `translateY(${scrolled * 0.5}px)`;
    }
});
</script>

@endpush
@endsection