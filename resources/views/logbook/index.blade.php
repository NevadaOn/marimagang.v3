@extends('layouts.user.app')

@section('content')
<div class="container-fluid px-2 px-md-3">
    <div class="row">
        <div class="col-12">
            <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center mb-3 mb-md-4">
                <h2 class="mb-1 mb-md-0 text-dark fs-4 fs-md-2">Logbook Kegiatan</h2>
                <small class="text-muted">Kelola catatan kegiatan harian Anda</small>
            </div>

            <div class="card shadow-sm mb-3 mb-md-4">
                <div class="card-header bg-white border-bottom p-3">
                    <h5 class="mb-0 text-secondary fs-6 fs-md-5">
                        <i class="fas fa-plus-circle me-2"></i>Input Kegiatan Baru
                    </h5>
                </div>
                <div class="card-body p-3">
                    <form id="logbook-form" method="POST" action="{{ route('logbook.store') }}">
                        @csrf
                        <input type="hidden" id="logbook-id" name="id">

                        <div class="row">
                            <div class="col-12 col-md-3 mb-3">
                                <label for="tanggal" class="form-label fw-semibold text-secondary small">Tanggal</label>
                                <input type="date" class="form-control form-control-sm form-control-md-regular" id="tanggal" name="tanggal" required
                                    value="{{ old('tanggal', date('Y-m-d')) }}">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="kegiatan" class="form-label fw-semibold text-secondary small">Deskripsi Kegiatan</label>
                                <textarea class="form-control form-control-sm form-control-md-regular" 
                                          id="kegiatan" 
                                          name="kegiatan" 
                                          rows="3" 
                                          required 
                                          placeholder="Masukkan detail kegiatan yang dilakukan"
                                          style="resize: vertical; white-space: pre-wrap; min-height: 80px;">{{ old('kegiatan') }}</textarea>
                            </div>
                            <div class="col-12 col-md-3 mb-3">
                                <div class="d-flex flex-column gap-2 mt-md-4">
                                    <button type="submit" class="btn btn-primary btn-sm" id="submit-btn">
                                        <i class="fas fa-save me-1"></i>Simpan
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm d-none" id="cancel-edit-btn">
                                        <i class="fas fa-times me-1"></i>Batal
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card shadow-sm mb-3 mb-md-4">
                <div class="card-header bg-white border-bottom p-3">
                    <h5 class="mb-0 text-secondary fs-6 fs-md-5">
                        <i class="fas fa-print me-2"></i>Ekspor Logbook
                    </h5>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <h6 class="text-muted mb-3 small">Ekspor Cepat</h6>
                            <div class="d-grid d-md-flex gap-2">
                                <form action="{{ route('logbook.exportDoc') }}" method="GET" class="flex-fill">
                                    <input type="hidden" name="type" value="all">
                                    <button type="submit" class="btn btn-dark btn-sm w-100">
                                        <i class="fas fa-file-alt me-1"></i><span class="d-none d-sm-inline">Semua Data</span><span class="d-inline d-sm-none">Semua</span>
                                    </button>
                                </form>
                                <form action="{{ route('logbook.exportDoc') }}" method="GET" class="flex-fill">
                                    <input type="hidden" name="type" value="weekly">
                                    <button type="submit" class="btn btn-primary btn-sm w-100">
                                        <i class="fas fa-calendar-week me-1"></i>Mingguan
                                    </button>
                                </form>
                                <form action="{{ route('logbook.exportDoc') }}" method="GET" class="flex-fill">
                                    <input type="hidden" name="type" value="monthly">
                                    <button type="submit" class="btn btn-secondary btn-sm w-100">
                                        <i class="fas fa-calendar-alt me-1"></i>Bulanan
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <h6 class="text-muted mb-3 small">Ekspor Rentang Tanggal</h6>
                            <form action="{{ route('logbook.exportDoc') }}" method="GET">
                                <input type="hidden" name="type" value="range">
                                <div class="row g-2">
                                    <div class="col-12 col-sm-5">
                                        <label for="start_date" class="form-label small text-muted">Dari Tanggal</label>
                                        <input type="date" id="start_date" name="start_date" required
                                            value="{{ request('start_date', date('Y-m-01')) }}" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-12 col-sm-5">
                                        <label for="end_date" class="form-label small text-muted">Sampai Tanggal</label>
                                        <input type="date" id="end_date" name="end_date" required
                                            value="{{ request('end_date', date('Y-m-t')) }}" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-12 col-sm-2">
                                        <label class="form-label small text-muted d-none d-sm-block">&nbsp;</label>
                                        <button type="submit" class="btn btn-dark btn-sm w-100">
                                            <i class="fas fa-download me-1"></i><span class="d-sm-none">Download</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-white border-bottom p-3">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center gap-2">
                        <h5 class="mb-0 text-secondary fs-6 fs-md-5">
                            <i class="fas fa-list me-2"></i>Daftar Logbook
                        </h5>
                        <small class="text-muted">Total: {{ $logbooks->count() }} kegiatan</small>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="d-md-none">
                        @forelse ($logbooks as $index => $log)
                            <div class="border-bottom p-3">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div class="flex-grow-1">
                                        <div class="fw-semibold text-dark small">
                                            {{ \Carbon\Carbon::parse($log->tanggal)->locale('id')->isoFormat('dddd') }}
                                        </div>
                                        <div class="text-muted" style="font-size: 0.85rem;">
                                            {{ \Carbon\Carbon::parse($log->tanggal)->locale('id')->isoFormat('DD MMM YYYY') }}
                                        </div>
                                    </div>
                                    <span class="badge bg-light text-dark">{{ $index + 1 }}</span>
                                </div>
                                
                                <div class="mb-3">
                                    <div class="text-dark" style="white-space: pre-line; word-wrap: break-word; font-size: 0.9rem; line-height: 1.4;">
                                        {{ $log->kegiatan }}
                                    </div>
                                </div>
                                
                                <div class="d-flex gap-2">
                                    <a href="{{ route('logbook.editPage', $log->id) }}" 
                                       class="btn btn-primary btn-sm flex-fill">
                                        <i class="fas fa-edit me-1"></i>Edit
                                    </a>
                                    <form action="{{ route('logbook.delete', $log->id) }}" method="POST" class="flex-fill"
                                        onsubmit="return confirm('Yakin ingin menghapus logbook ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm w-100">
                                            <i class="fas fa-trash me-1"></i>Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-5 p-3">
                                <div class="text-muted">
                                    <i class="fas fa-inbox fa-2x mb-3 d-block"></i>
                                    <h6>Belum ada logbook</h6>
                                    <p class="mb-0 small">Mulai tambahkan kegiatan pertama Anda</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <div class="d-none d-md-block">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="border-0" style="width: 60px;">No</th>
                                        <th class="border-0" style="width: 200px;">Hari, Tanggal</th>
                                        <th class="border-0">Kegiatan</th>
                                        <th class="border-0 text-center" style="width: 120px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($logbooks as $index => $log)
                                        <tr>
                                            <td class="align-middle text-muted">
                                                {{ $index + 1 }}
                                            </td>
                                            <td class="align-middle">
                                                <div class="fw-semibold text-dark">
                                                    {{ \Carbon\Carbon::parse($log->tanggal)->locale('id')->isoFormat('dddd') }}
                                                </div>
                                                <small class="text-muted">
                                                    {{ \Carbon\Carbon::parse($log->tanggal)->locale('id')->isoFormat('DD MMMM YYYY') }}
                                                </small>
                                            </td>
                                            <td class="align-middle">
                                                <div class="text-dark" style="white-space: pre-line; max-width: 600px; word-wrap: break-word;">
                                                    {{ $log->kegiatan }}
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="btn-group btn-group-sm" role="group" >
                                                    <a href="{{ route('logbook.editPage', $log->id) }}" 
                                                       class="btn btn-primary btn-sm" 
                                                       data-bs-toggle="tooltip" title="Edit" style="margin: 5px;">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('logbook.delete', $log->id) }}" method="POST" class="d-inline"  style="margin: 5px;"
                                                        onsubmit="return confirm('Yakin ingin menghapus logbook ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm" 
                                                                data-bs-toggle="tooltip" title="Hapus">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center py-5">
                                                <div class="text-muted">
                                                    <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                                                    <h5>Belum ada logbook</h5>
                                                    <p class="mb-0">Mulai tambahkan kegiatan pertama Anda</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    document.getElementById('kegiatan').addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.stopPropagation();
        }
    });
</script>

<style>
    .card-header {
        margin:5px;
    }
    .card-body {
        margin:5px;
    }
    @media (max-width: 768px) {
        .form-control-sm.form-control-md-regular {
            font-size: 0.9rem;
            padding: 0.5rem 0.75rem;
        }
        
        .card-body {
            padding: 1rem !important;
        }
        
        .btn-sm {
            font-size: 0.85rem;
            padding: 0.5rem 1rem;
        }
        
        .mobile-logbook-item {
            border-bottom: 1px solid #dee2e6;
            padding: 1rem;
        }
        
        .mobile-logbook-item:last-child {
            border-bottom: none;
        }
    }
    
    @media (max-width: 576px) {
        .container-fluid {
            padding-left: 10px;
            padding-right: 10px;
        }
        
        .card {
            margin-bottom: 1rem;
        }
        
        .fs-4 {
            font-size: 1.1rem !important;
        }
        
        .btn-sm {
            font-size: 0.8rem;
            padding: 0.4rem 0.8rem;
        }
    }
    
    #kegiatan {
        white-space: pre-wrap !important;
        word-wrap: break-word !important;
        resize: vertical !important;
    }
    
    @media (max-width: 768px) {
        .d-grid {
            gap: 0.5rem;
        }
        
        .flex-fill {
            flex: 1 1 auto;
        }
    }
</style>
@endpush
@endsection