@extends('layouts.admindinas')

@section('title', 'Kelola Bidang')

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

    /* Animated background */
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
            radial-gradient(circle at 40% 70%, rgba(16, 185, 129, 0.04) 0%, transparent 50%);
        animation: backgroundFloat 20s ease-in-out infinite;
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

    /* Main container */
    .grid-wrapper {
        margin: 2rem auto;
        padding: 2rem;
        max-width: 1400px;
        position: relative;
        z-index: 10;
    }

    /* Header section */
    .documentation-header {
        background: var(--glass-bg);
        backdrop-filter: blur(25px);
        -webkit-backdrop-filter: blur(25px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
        animation: slideUp 0.6s ease-out;
    }

    .documentation-header::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: var(--gradient-1);
        border-radius: 0 0 20px 20px;
    }

    .documentation-title {
        font-size: 2.5rem;
        font-weight: 800;
        background: var(--gradient-1);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .documentation-subtitle {
        color: var(--text-secondary);
        font-size: 1rem;
        font-weight: 500;
    }

    /* Add button styling */
    .btn-create {
        background: var(--gradient-1);
        color: white;
        padding: 1rem 2rem;
        border-radius: 16px;
        font-weight: 700;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        box-shadow: 0 8px 32px rgba(30, 58, 138, 0.3);
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }

    .btn-create::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.6s ease;
    }

    .btn-create:hover::before {
        left: 100%;
    }

    .btn-create:hover {
        transform: translateY(-4px) scale(1.05);
        box-shadow: 0 12px 48px rgba(30, 58, 138, 0.4);
        border-color: rgba(255, 255, 255, 0.2);
    }

    .btn-create i {
        font-size: 1.1em;
    }

    /* Image grid styling */
    .image-grid-js {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
        animation: fadeIn 0.8s ease-out;
    }

    .image-box {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        position: relative;
        animation: slideUp 0.6s ease-out;
        animation-fill-mode: both;
    }

    .image-box::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, transparent, rgba(59, 130, 246, 0.1));
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 1;
        pointer-events: none;
    }

    .image-box:hover::before {
        opacity: 1;
    }

    .image-box:hover {
        transform: translateY(-12px) scale(1.02);
        border-color: rgba(255, 255, 255, 0.2);
        box-shadow: 0 20px 64px rgba(59, 130, 246, 0.2);
    }

    .image-box img {
        width: 100%;
        height: 240px;
        object-fit: cover;
        display: block;
        transition: transform 0.4s ease;
    }

    .image-box:hover img {
        transform: scale(1.1);
    }

    .caption {
        padding: 1.5rem;
        text-align: left;
        position: relative;
        z-index: 2;
    }

    .caption-title {
        color: var(--text-primary);
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        line-height: 1.4;
    }

    .caption-meta {
        color: var(--text-secondary);
        font-size: 0.8rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Enhanced Modal Styling */
    .modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        opacity: 0;
        transition: opacity 0.4s ease;
        align-items: center;
        justify-content: center;
    }

    .modal.show {
        opacity: 1;
    }

    .modal-content {
        background: var(--glass-bg);
        backdrop-filter: blur(25px);
        -webkit-backdrop-filter: blur(25px);
        border: 1px solid var(--glass-border);
        border-radius: 24px;
        padding: 2rem;
        width: 90%;
        max-width: 700px;
        position: relative;
        box-shadow: 
            0 20px 80px rgba(0, 0, 0, 0.5),
            0 0 0 1px rgba(255, 255, 255, 0.05),
            inset 0 1px 0 rgba(255, 255, 255, 0.1);
        transform: scale(0.8) translateY(50px);
        transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        animation: modalSlideIn 0.4s ease-out;
        max-height: 90vh;
        overflow-y: auto;
    }

    .modal.show .modal-content {
        transform: scale(1) translateY(0);
    }

    .close {
        position: absolute;
        top: 1rem;
        right: 1rem;
        width: 3rem;
        height: 3rem;
        border-radius: 50%;
        background: rgba(239, 68, 68, 0.2);
        border: 1px solid rgba(239, 68, 68, 0.3);
        color: #ef4444;
        font-size: 1.2rem;
        font-weight: bold;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }

    .close:hover {
        background: rgba(239, 68, 68, 0.3);
        transform: rotate(90deg);
        border-color: rgba(239, 68, 68, 0.5);
    }

    .modal-content img {
        width: 100%;
        max-height: 400px;
        object-fit: contain;
        display: block;
        margin: 0 auto 1.5rem;
        border-radius: 16px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }

    .modal-caption {
        color: var(--text-primary);
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 1rem;
        text-align: center;
    }

    /* Button styling */
    .btn {
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.85rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        position: relative;
        overflow: hidden;
    }

    .btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .btn:hover::before {
        left: 100%;
    }

    .btn-danger {
        background: var(--gradient-danger);
        color: white;
        box-shadow: 0 4px 16px rgba(220, 38, 38, 0.3);
    }

    .btn-danger:hover {
        background: linear-gradient(135deg, #b91c1c, #dc2626);
        box-shadow: 0 8px 24px rgba(220, 38, 38, 0.4);
        transform: translateY(-2px);
    }

    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        animation: slideUp 0.6s ease-out;
    }

    .empty-state i {
        font-size: 4rem;
        color: var(--text-secondary);
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    .empty-state h3 {
        color: var(--text-primary);
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .empty-state p {
        color: var(--text-secondary);
        font-size: 0.9rem;
    }

    /* Animation keyframes */
    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    @keyframes modalSlideIn {
        from {
            opacity: 0;
            transform: scale(0.8) translateY(50px);
        }
        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .grid-wrapper {
            padding: 1rem;
        }

        .documentation-title {
            font-size: 2rem;
        }

        .image-grid-js {
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 1.5rem;
        }

        .modal-content {
            width: 95%;
            padding: 1.5rem;
            margin: 1rem;
        }

        .btn-create {
            padding: 0.875rem 1.5rem;
            font-size: 0.8rem;
        }
    }

    @media (max-width: 480px) {
        .image-grid-js {
            grid-template-columns: 1fr;
        }

        .documentation-title {
            font-size: 1.75rem;
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }
    }

    /* Loading animation */
    .loading {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 3px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top-color: #3b82f6;
        animation: spin 1s ease-in-out infinite;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
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
</style>
@endpush

@section('content')
<div class="grid-wrapper">
    <!-- Header Section -->
    <div class="documentation-header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="documentation-title">
                    <i class="fas fa-images"></i>
                    Dokumentasi Gallery
                </h1>
                <p class="documentation-subtitle">Kelola dan tampilkan koleksi dokumentasi kegiatan</p>
            </div>
            <div>
                <a href="{{ route('admin.documentation.createdinas') }}" class="btn-create">
                    <i class="fas fa-plus"></i>
                    Tambah Dokumentasi
                </a>
            </div>
        </div>
    </div>

    <!-- Image Grid -->
    <div id="imageGrid" class="image-grid-js">
        <!-- Images will be populated by JavaScript -->
    </div>

    <!-- Empty State (shown when no images) -->
    <div id="emptyState" class="empty-state" style="display: none;">
        <i class="fas fa-image"></i>
        <h3>Belum Ada Dokumentasi</h3>
        <p>Mulai tambahkan dokumentasi pertama Anda dengan mengklik tombol "Tambah Dokumentasi" di atas.</p>
    </div>

    <!-- Loading State -->
    <div id="loadingState" class="text-center py-8" style="display: none;">
        <div class="loading"></div>
        <p class="text-gray-400 mt-4">Memuat dokumentasi...</p>
    </div>
</div>

<!-- Enhanced Modal -->
<div id="imageModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">
            <i class="fas fa-times"></i>
        </span>
        
        <img id="modalImage" src="" alt="Gambar" class="modal-image">
        
        <div class="text-center">
            <p id="modalCaption" class="modal-caption"></p>
            
            <div class="flex justify-center space-x-4 mt-6">
                <form id="deleteForm" method="POST" onsubmit="return confirmDelete()" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                        Hapus Gambar
                    </button>
                </form>
                
                <button onclick="closeModal()" class="btn" style="background: var(--gradient-2); color: white;">
                    <i class="fas fa-times"></i>
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Image data from Laravel
    const images = [
        @foreach ($documentations as $doc)
            @foreach ($doc->images as $img)
                {
                    src: "{{ asset('storage/' . $img->image_path) }}",
                    caption: @json($img->caption ?? 'Tidak ada keterangan'),
                    deleteUrl: "{{ route('admin.documentation.destroy', $img->id) }}",
                    createdAt: "{{ $img->created_at->format('d M Y') }}"
                },
            @endforeach
        @endforeach
    ];

    // DOM elements
    const grid = document.getElementById('imageGrid');
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    const modalCaption = document.getElementById('modalCaption');
    const deleteForm = document.getElementById('deleteForm');
    const emptyState = document.getElementById('emptyState');
    const loadingState = document.getElementById('loadingState');

    // Show loading initially
    loadingState.style.display = 'block';

    // Modal functions
    function openModal(img) {
        modalImage.src = img.src;
        modalCaption.textContent = img.caption;
        deleteForm.action = img.deleteUrl;
        
        modal.style.display = 'flex';
        setTimeout(() => {
            modal.classList.add('show');
        }, 10);
        
        // Prevent body scroll
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        modal.classList.remove('show');
        setTimeout(() => {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }, 400);
    }

    // Close modal on outside click
    modal.addEventListener('click', function(event) {
        if (event.target === modal) {
            closeModal();
        }
    });

    // Close modal on escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && modal.classList.contains('show')) {
            closeModal();
        }
    });

    // Confirm delete
    function confirmDelete() {
        return confirm('Apakah Anda yakin ingin menghapus gambar ini? Tindakan ini tidak dapat dibatalkan.');
    }

    // Create image elements
    function createImageGrid() {
        // Hide loading
        loadingState.style.display = 'none';
        
        if (images.length === 0) {
            emptyState.style.display = 'block';
            return;
        }

        images.forEach((img, index) => {
            const box = document.createElement('div');
            box.className = 'image-box';
            box.style.animationDelay = `${index * 0.1}s`;

            const image = document.createElement('img');
            image.src = img.src;
            image.alt = img.caption;
            image.loading = 'lazy'; // Lazy loading for better performance
            
            // Add error handling for broken images
            image.onerror = function() {
                this.src = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDMwMCAyMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIzMDAiIGhlaWdodD0iMjAwIiBmaWxsPSIjMzc0MTUxIi8+CjxwYXRoIGQ9Ik0xNTAgMTAwTDEyMCA4MEwyMDAgMTIwTDE4MCA4MEwyMDAgMTIwWiIgZmlsbD0iIzZCNzI4MCIvPgo8dGV4dCB4PSIxNTAiIHk9IjEwNSIgZm9udC1mYW1pbHk9IkFyaWFsIiBmb250LXNpemU9IjE0IiBmaWxsPSIjOUI5Qjk5IiB0ZXh0LWFuY2hvcj0ibWlkZGxlIj5HYW1iYXIgdGlkYWsgZGFwYXQgZGltdWF0PC90ZXh0Pgo8L3N2Zz4K';
                this.classList.add('error-image');
            };

            const caption = document.createElement('div');
            caption.className = 'caption';
            
            const captionTitle = document.createElement('div');
            captionTitle.className = 'caption-title';
            captionTitle.textContent = img.caption;
            
            const captionMeta = document.createElement('div');
            captionMeta.className = 'caption-meta';
            captionMeta.innerHTML = `
                <i class="fas fa-calendar-alt"></i>
                <span>${img.createdAt}</span>
            `;

            caption.appendChild(captionTitle);
            caption.appendChild(captionMeta);

            // Add click handler
            box.addEventListener('click', () => openModal(img));

            box.appendChild(image);
            box.appendChild(caption);
            grid.appendChild(box);
        });
    }

    // Initialize when DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Simulate loading delay for smooth transition
        setTimeout(() => {
            createImageGrid();
        }, 500);

        // Add smooth scroll behavior
        document.documentElement.style.scrollBehavior = 'smooth';
    });

    // Add intersection observer for animation on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animationPlayState = 'running';
            }
        });
    }, observerOptions);

    // Observe all image boxes when they're created
    setTimeout(() => {
        document.querySelectorAll('.image-box').forEach(box => {
            observer.observe(box);
        });
    }, 600);
</script>
@endpush
@endsection