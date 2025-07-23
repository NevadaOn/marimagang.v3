@extends('layouts.adminbidang')

@section('title', 'Data Pengajuan')
@push('styles')
<style>
    .title{
        background-color: rgba(41, 50, 65, 0.5); 
        width: fit-content;
        padding: 20px;
        border-radius: 20px;
    }
     .bg-glass {
        background-color: rgba(41, 50, 65, 0.5); 
        backdrop-filter: blur(18px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        position: relative;
        z-index: 1;
        border-radius: 20px;
    }

    .table-glass {
        width: 100%;
        table-layout: fixed;
        --bs-table-bg: transparent;
        --bs-table-border-color: rgba(255, 255, 255, 0.15);
        --bs-table-hover-bg: rgba(255, 255, 255, 0.1);
        border-collapse: separate;
        border-spacing: 0;
        color: #e0e0e0;
    }

    .table-glass thead th {
        border-bottom: 2px solid rgba(0, 0, 255, 0.15);
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.05em;
        color: #48B6FFFF;
       
    }
   
    .table-glass td, .table-glass th {
        border: none;
        word-wrap: break-word;
        white-space: nowrap; 
    }
    .table-glass .bg{
       background-color: rgba(21, 73, 105, 0.6);
       white-space: wrap;
       border: none;
    }
    .badge-glass {
        padding: 0.4em 0.8em;
        color: #fff;
        font-weight: 600;
        border-radius: 50rem;
        text-transform: capitalize;
        transition: all 0.3s ease;
        white-space: nowrap; 
    }
    .badge-glass:hover {
        transform: translateY(-2px) scale(1.05);
        cursor: default;
        background-color: rgba(25, 93, 135, 0.6);
    }

    .badge-glass.status-disetujui {
        background-color: rgba(25, 135, 84, 0.6);
        box-shadow: 0 0 15px rgba(25, 135, 84, 0.6);
    }
    .badge-glass.status-ditolak {
        background-color: rgba(220, 53, 69, 0.6);
        box-shadow: 0 0 15px rgba(220, 53, 69, 0.6);
    }
    .badge-glass.status-menunggu {
        background-color: rgba(255, 193, 7, 0.6);
        box-shadow: 0 0 15px rgba(255, 193, 7, 0.6);
    }

    .title-glow {
        text-shadow: 0 0 12px rgba(52, 144, 220, 0.4);
    }

    .btn-glass-action {
        padding: 0.25rem 0.75rem;
        font-size: 0.8rem;
        font-weight: 600;
        color: #fff;
        background-color: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 50rem;
        transition: all 0.2s ease-in-out;
    }
    .btn-glass-action:hover {
        background-color: rgba(25, 93, 135, 0.6);
        color: #fff;
        transform: scale(1.05);
    }

    .pagination .page-link { background-color: transparent; border-color: rgba(255, 255, 255, 0.2); }
    .pagination .page-item.active .page-link { background-color: #0d6efd; border-color: #0d6efd; }
    .pagination .page-item.disabled .page-link { border-color: rgba(255, 255, 255, 0.2); color: var(--bs-secondary-color); }
</style>
@endpush

@section('content')
    @include('admin.pengajuan.index', ['pengajuan' => $pengajuan])
@endsection