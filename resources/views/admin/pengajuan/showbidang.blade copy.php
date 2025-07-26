@extends('layouts.adminbidang')

@section('title', 'Detail Pengajuan')


@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<style>
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

    body {
        background: #000000;
        min-height: 100vh;
        overflow-x: hidden;
    }

    .container-fluid {
        position: relative;
    }


    

    @keyframes floatingLights {
        0%, 100% {
            transform: translate(0, 0) rotate(0deg);
            opacity: 1;
        }
        33% {
            transform: translate(30px, -30px) rotate(120deg);
            opacity: 0.8;
        }
        66% {
            transform: translate(-20px, 20px) rotate(240deg);
            opacity: 0.9;
        }
    }

    .card {
        background: rgba(255, 255, 255, 0.06);
        backdrop-filter: blur(30px);
        -webkit-backdrop-filter: blur(30px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 24px;
        margin-bottom: 2rem;
        box-shadow: 
            0 8px 32px rgba(0, 0, 0, 0.3),
            0 2px 8px rgba(255, 255, 255, 0.05) inset;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card:hover {
        transform: translateY(-2px);
        background: rgba(255, 255, 255, 0.08);
        border-color: rgba(255, 255, 255, 0.15);
        box-shadow: 
            0 12px 40px rgba(0, 0, 0, 0.4),
            0 4px 16px rgba(255, 255, 255, 0.08) inset;
    }
    
    .card-header {
        background: rgba(255, 255, 255, 0.05);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        padding: 1.5rem;
        position: relative;
        overflow: hidden;
    }

    .card-header::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: var(--gradient-1);
    }

    .card-header h5 {
        color: var(--text-primary);
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
    }

    .card-header i {
        margin-right: 0.75rem;
        color: #3b82f6;
        font-size: 1.2rem;
    }
    
    .card-body {
        padding: 1.5rem;
        color: var(--text-secondary);
    }

    .card-title {
        color: var(--text-primary) !important;
        font-weight: 700;
        margin-bottom: 0 !important;
    }
    
    .status-badge {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-flex;
        align-items: center;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
    }
    
    .status-diterima {
        background: var(--gradient-success);
        color: white;
        border: 1px solid rgba(16, 185, 129, 0.3);
    }
    
    .status-ditolak {
        background: var(--gradient-danger);
        color: white;
        border: 1px solid rgba(239, 68, 68, 0.3);
    }
    
    .status-menunggu {
        background: var(--gradient-warning);
        color: white;
        border: 1px solid rgba(245, 158, 11, 0.3);
    }
    
    .status-diproses {
        background: var(--gradient-info);
        color: white;
        border: 1px solid rgba(6, 182, 212, 0.3);
    }
    
    .status-diteruskan {
        background: var(--gradient-2);
        color: white;
        border: 1px solid rgba(107, 114, 128, 0.3);
    }
    
    .info-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        transition: all 0.3s ease;
    }

    .info-row:hover {
        background: rgba(255, 255, 255, 0.03);
        border-radius: 12px;
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    .info-row:last-child {
        border-bottom: none;
    }

    .info-row .fw-bold {
        color: var(--text-primary);
        font-weight: 700;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .info-row span:not(.fw-bold) {
        color: var(--text-secondary);
        font-weight: 500;
    }

    .font-monospace {
        font-family: 'Courier New', monospace;
        background: rgba(255, 255, 255, 0.05);
        padding: 0.25rem 0.5rem;
        border-radius: 8px;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin-bottom: 1rem;
        background: transparent;
        color: var(--text-secondary);
    }
    
    .table th,
    .table td {
        padding: 1rem;
        border: none;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        text-align: left;
        vertical-align: middle;
    }
    
    .table th {
        background: rgba(255, 255, 255, 0.05);
        font-weight: 700;
        color: var(--text-primary);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.85rem;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .table th:first-child {
        border-radius: 12px 0 0 0;
    }

    .table th:last-child {
        border-radius: 0 12px 0 0;
    }
    
    .table tbody tr {
        transition: all 0.3s ease;
    }

    .table tbody tr:hover {
        background: rgba(30, 58, 138, 0.15);
        transform: translateX(4px);
    }

    .table tbody td {
        color: var(--text-secondary);
    }

    .table tbody td.fw-semibold {
        color: var(--text-primary);
        font-weight: 600;
    }

    .table-responsive {
        border-radius: 0 0 24px 24px;
        max-height: 600px;
        overflow-y: auto;
    }
    
    .btn {
        padding: 0.75rem 1.5rem;
        border-radius: 16px;
        border: none;
        font-weight: 600;
        line-height: 1.5;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        position: relative;
        overflow: hidden;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.85rem;
    }

    .btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .btn:hover::before {
        left: 100%;
    }
    
    .btn-primary {
        background: var(--gradient-1);
        color: white;
        box-shadow: 0 4px 16px rgba(30, 58, 138, 0.4);
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 32px rgba(30, 58, 138, 0.6);
        background: var(--gradient-2);
    }
    
    .btn-success {
        background: var(--gradient-success);
        color: white;
        box-shadow: 0 4px 16px rgba(16, 185, 129, 0.4);
    }
    
    .btn-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 32px rgba(16, 185, 129, 0.6);
    }

    .btn-warning {
        background: var(--gradient-warning);
        color: white;
        box-shadow: 0 4px 16px rgba(245, 158, 11, 0.4);
    }

    .btn-warning:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 32px rgba(245, 158, 11, 0.6);
    }

    .btn-secondary {
        background: rgba(255, 255, 255, 0.1);
        color: var(--text-primary);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateY(-2px);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }
    
    .btn-sm {
        padding: 0.5rem 1rem;
        font-size: 0.75rem;
        border-radius: 12px;
    }
    
    .form-control {
        display: block;
        width: 100%;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        line-height: 1.5;
        color: var(--text-primary);
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 16px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    }
    
    .form-control:focus {
        color: var(--text-primary);
        background: rgba(255, 255, 255, 0.12);
        border-color: #3b82f6;
        outline: 0;
        box-shadow: 
            0 0 0 0.2rem rgba(59, 130, 246, 0.25),
            0 4px 16px rgba(0, 0, 0, 0.2);
        transform: translateY(-1px);
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }

    .form-select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m1 6 7 7 7-7'/%3e%3c/svg%3e");
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-label {
        margin-bottom: 0.75rem;
        font-weight: 700;
        color: var(--text-primary);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.85rem;
    }
    
    .badge {
        display: inline-flex;
        align-items: center;
        padding: 0.5rem 1rem;
        font-size: 0.75rem;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 16px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
    }
    
    .badge-primary {
        background: var(--gradient-1);
        color: white;
        border: 1px solid rgba(30, 58, 138, 0.3);
    }
    
    .badge-success {
        background: var(--gradient-success);
        color: white;
        border: 1px solid rgba(16, 185, 129, 0.3);
    }
    
    .badge-info {
        background: var(--gradient-info);
        color: white;
        border: 1px solid rgba(6, 182, 212, 0.3);
    }

    .bg-primary {
        background: var(--gradient-1) !important;
    }
    
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

    .mb-5 {
        margin-bottom: 2rem;
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

    .ms-2 {
        margin-left: 0.5rem;
    }

    .mt-2 {
        margin-top: 0.5rem;
    }

    .mt-3 {
        margin-top: 1rem;
    }

    .mt-4 {
        margin-top: 1.5rem;
    }

    .ps-3 {
        padding-left: 1rem;
    }

    .p-3 {
        padding: 1rem;
    }

    .list-unstyled {
        list-style: none;
        padding-left: 0;
    }

    .list-unstyled li {
        margin-bottom: 0.5rem;
        padding: 0.5rem;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 8px;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .text-muted {
        color: rgba(255, 255, 255, 0.5) !important;
    }

    .font-bold {
        font-weight: 700;
        color: var(--text-primary);
    }

    /* Page title styling */
    .page-title {
        text-align: end;
        padding: 20px 50px 10px 0px;
        margin-bottom: 2rem;
    }

    .page-title h1 {
        color: var(--text-primary);
        font-weight: 800;
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
        background: var(--gradient-1);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .page-title p {
        color: var(--text-secondary);
        font-size: 1.1rem;
        margin: 0;
    }

    /* Admin comment section */
    .admin-comment {
        background: rgba(30, 58, 138, 0.1);
        border: 1px solid rgba(30, 58, 138, 0.2);
        border-radius: 16px;
        padding: 1.5rem;
        margin-top: 1.5rem;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }

    .admin-comment h6 {
        color: var(--text-primary);
        font-weight: 700;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
    }

    .admin-comment h6::before {
        content: '💬';
        margin-right: 0.5rem;
    }

    .admin-comment p {
        color: var(--text-secondary);
        line-height: 1.6;
        margin: 0;
    }

    /* Scrollbar styling */
    .table-responsive::-webkit-scrollbar,
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    .table-responsive::-webkit-scrollbar-track,
    ::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 4px;
    }

    .table-responsive::-webkit-scrollbar-thumb,
    ::-webkit-scrollbar-thumb {
        background: var(--gradient-1);
        border-radius: 4px;
    }

    .table-responsive::-webkit-scrollbar-thumb:hover,
    ::-webkit-scrollbar-thumb:hover {
        background: var(--gradient-2);
    }

    /* Form styling improvements */
    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }

    .btn-group {
        display: flex;
        gap: 0.5rem;
    }

    /* Status icons */
    .status-badge i {
        margin-right: 0.5rem;
        font-size: 0.9rem;
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .col-md-6 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .page-title {
            text-align: center;
            padding: 20px;
        }

        .page-title h1 {
            font-size: 2rem;
        }

        .modal-dialog {
            max-width: 95%;
            margin: 1rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            font-size: 0.8rem;
        }

        .card-body {
            padding: 1rem;
        }

        .info-row {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }
    }

    /* Animation for cards */
    .card {
        animation: fadeInUp 0.6s ease-out;
    }

    .card:nth-child(1) { animation-delay: 0.1s; }
    .card:nth-child(2) { animation-delay: 0.2s; }
    .card:nth-child(3) { animation-delay: 0.3s; }
    .card:nth-child(4) { animation-delay: 0.4s; }
    .card:nth-child(5) { animation-delay: 0.5s; }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endpush

@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <!-- Page Title -->
            <div class="mb-4" style="text-align: end; padding: 20px 50px 10px 0px;">
                <h1 class="h3 mb-3 text-light fw-bold fs-1">Detail Pengajuan</h1>
                <p class="text-muted">Informasi lengkap pengajuan magang mahasiswa</p>
            </div>

            <!-- Informasi Umum -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        Informasi Umum
                    </h5>
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
                                        @default status-menunggu
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
                                        @default
                                            <i class="fas fa-clock me-1"></i> Menunggu
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
            </div>

           <!-- Anggota Kelompok (termasuk Ketua) -->
@php
    $semuaMahasiswa = collect([[
        'user' => $pengajuan->user,
        'status' => 'Ketua'
    ]])->merge(
        $pengajuan->anggota->map(function ($anggota) {
            return [
                'user' => $anggota->user,
                'status' => ucfirst($anggota->status)
            ];
        })
    )->unique(fn($item) => $item['user']->id);
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
                        @php $user = $entry['user']; @endphp
                        <tr>
                            <td class="text-center">{{ $i + 1 }}</td>
                            <td>{{ $user->nama }}</td>
                            <td class="font-monospace">{{ $user->nim }}</td>
                            <td class="text-center">
                                <span class="badge bg-primary">{{ $entry['status'] }}</span>
                            </td>
                            <td>
                                @if($user->userSkills->isNotEmpty())
                                    <ul class="mb-0 ps-3 list-unstyled">
                                        @foreach($user->userSkills as $userSkill)
                                            <li>
                                                {{ $userSkill->skill->nama ?? 'Skill tidak ditemukan' }}
                                                ({{ ucfirst($userSkill->level) }})
                                                @if ($userSkill->sertifikat_path)
                                                    {{-- <a href="{{ asset('storage/' . $userSkill->sertifikat_path) }}"
                                                       target="_blank"
                                                       class="btn btn-sm btn-link">Cek Sertifikat</a> --}}
                                                       <button onclick="showPreview('{{ asset('storage/' . $userSkill->sertifikat_path) }}', '{{ basename($userSkill->sertifikat_path) }}')"
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

            <!-- Kelola Surat & Komentar -->
            @if (in_array($admin->role, ['superadmin', 'admin_dinas']))
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-file-pdf me-2"></i>
                        Kelola Surat & Komentar
                    </h5>
                </div>
                <div class="card-body">
                    <!-- Form upload surat PDF -->
                    <form action="{{ route('admin.pengajuan.uploadSurat', $pengajuan->id) }}" method="POST" enctype="multipart/form-data" class="mb-4">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Unggah Surat (PDF)</label>
                            <input type="file" name="surat_pdf" accept="application/pdf" class="form-control">
                        </div>
                        {{-- <div class="form-group">
                            <label class="form-label">Komentar Admin</label>
                            <textarea name="komentar_admin" rows="4" class="form-control">{{ old('komentar_admin', $pengajuan->komentar_admin) }}</textarea>
                        </div> --}}
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>
                            Simpan Surat
                        </button>
                    </form>

                    <!-- Form generate surat otomatis -->
                    <h6>Buat Surat Otomatis</h6>
                    <form action="{{ route('admin.pengajuan.generateSurat', $pengajuan->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nomor Surat</label>
                                    <input type="text" name="nomor_surat" class="form-control" placeholder="Contoh: 001/ADM/PKL/2025" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">NIP</label>
                                    <input type="text" name="nip_penanggung_jawab" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nama Penanggung Jawab</label>
                                    <input type="text" name="nama_penanggung_jawab" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Jabatan</label>
                                    <input type="text" name="jabatan_penanggung_jawab" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nama Kegiatan</label>
                                    <input type="text" name="nama_kegiatan" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-plus me-1"></i>
                            Buat Surat Otomatis
                        </button>
                    </form>

                    @if ($pengajuan->surat_pdf)
                    <div class="mt-3">
                        <button onclick="showPreview('{{ asset('storage/' . $pengajuan->surat_pdf) }}', '{{ basename($pengajuan->surat_pdf) }}')"
                                class="btn btn-primary btn-sm">
                            <i class="fas fa-eye me-1"></i>
                            Lihat / Unduh Surat PDF
                        </button>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            <!-- Aksi Pengajuan -->
            @if (!empty($statusOptions))
            <div class="card">
                <div class="card-header">
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
        </div>
    </div>
</div>

<!-- Tombol untuk membuka modal --><div class="d-flex justify-content-center">
    <button type="button" class="btn btn-warning mb-4 w-50" data-bs-toggle="modal" data-bs-target="#updateTanggalModal">
        Ubah Tanggal Magang
    </button>
</div>


<!-- Modal -->
<div class="modal fade bg-transparent" id="updateTanggalModal" tabindex="-1" aria-labelledby="updateTanggalModalLabel" aria-hidden="true">
  <div class="modal-dialog-centered modal-dialog modal-dialog-scrollable">
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
</div>
@if (in_array(auth()->guard('admin')->user()->role, ['superadmin', 'admin_dinas']))
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
@endif

<form action="{{ route('admin.pengajuan.kirimCatatan', $pengajuan->id) }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="tujuan" class="form-label ms-4">Tujuan Komentar</label>
        <select name="tujuan" id="tujuan" class="form-select w-25 ms-3" required>
            <option value="user">User</option>
            <option value="admin_bidang">Admin Bidang</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="komentar_admin" class="form-label ms-4">Isi Komentar</label>
        <textarea name="komentar_admin" class="form-control w-75 ms-3" rows="4" required>{{ old('komentar_admin') }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary mb-5 ms-3">Kirim</button>
</form>

@if(auth('admin')->check() && (
    (auth('admin')->user()->role === 'admin_bidang' && auth('admin')->user()->id === $pengajuan->databidang->admin_id) ||
    auth('admin')->user()->role === 'superadmin'
))
    <form action="{{ route('admin.pengajuan.kesediaan.generate', $pengajuan->id) }}" method="POST">
    @csrf
        @csrf
        <div class="d-flex justify-content-center">
        <label for="tujuan" class="form-label fw-bold fs-4">Buat Form Kesediaan Magang</label>
        </div>
        <div class="mb-2 ms-3 text-light">
            <label>Nomor Surat</label>
            <input type="text" name="nomor_surat" class="form-control w-75 ms-1 mt-2" required>
        </div>

        <div class="mb-2 ms-3 text-light">
            <label>Penanggung Jawab</label>
            <input type="text" name="penanggung_jawab" class="form-control w-75 ms-1 mt-2" required>
        </div>

        <button type="submit" class="btn btn-primary mt-2 ms-3 mb-5">Generate Form</button>
    </form>

    @if($pengajuan->form_kesediaan_magang)
        <a href="{{ asset('storage/' . $pengajuan->form_kesediaan_magang) }}" class="btn btn-success mt-2" target="_blank">
            Lihat Form Kesediaan Magang
        </a>
    @endif
@endif

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