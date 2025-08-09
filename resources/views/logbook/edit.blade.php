@extends('layouts.user.app')

@section('content')
<div class="container-fluid px-2 px-md-3">
    <div class="row justify-content-center">
        <div>
            <div class="d-flex align-items-center justify-content-between mb-3 mb-md-4">
                <a href="{{ route('logbook.index') }}" class="btn btn-secondary btn-sm me-3">
                    <i class="fas fa-arrow-left me-1"></i>
                    <span class="d-none d-sm-inline">Kembali</span>
                </a>
                <div style="text-align:right;">
                    <h2 class="mb-0 text-dark fs-4 fs-md-2">Edit Logbook</h2>
                    <small class="text-muted">Perbarui catatan kegiatan Anda</small>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-white border-bottom p-3">
                    <h5 class="mb-0 text-secondary fs-6 fs-md-5">
                        <i class="fas fa-edit me-2"></i>Form Edit Kegiatan
                    </h5>
                </div>
                <div class="card-body p-3 p-md-4">
                    <form method="POST" action="{{ route('logbook.update', $logbook->id) }}">
                        @csrf

                        <div class="mb-4">
                            <label for="tanggal" class="form-label fw-semibold text-secondary small">
                                <i class="fas fa-calendar me-1"></i>Tanggal
                            </label>
                            <input type="date" 
                                   class="form-control form-control-sm form-control-md-regular" 
                                   id="tanggal" 
                                   name="tanggal" 
                                   required
                                   value="{{ old('tanggal', $logbook->tanggal->format('Y-m-d')) }}">
                            @error('tanggal')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="kegiatan" class="form-label fw-semibold text-secondary small">
                                <i class="fas fa-tasks me-1"></i>Deskripsi Kegiatan
                            </label>
                            <textarea class="form-control form-control-sm form-control-md-regular" 
                                      id="kegiatan" 
                                      name="kegiatan" 
                                      rows="6" 
                                      required
                                      placeholder="Masukkan detail kegiatan yang dilakukan"
                                      style="resize: vertical; white-space: pre-wrap; min-height: 120px;">{{ old('kegiatan', $logbook->kegiatan) }}</textarea>
                            @error('kegiatan')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex flex-column flex-sm-row gap-2 gap-sm-3">
                            <button type="submit" class="btn btn-primary flex-fill flex-sm-grow-0 px-4">
                               Update Logbook
                            </button>
                            <a href="{{ route('logbook.index') }}" class="btn btn-outline-secondary flex-fill flex-sm-grow-0 px-4">
                                <i class="fas fa-times me-2"></i>Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card shadow-sm mt-3 bg-light border-0">
                <div class="card-body p-3">
                    <div class="row text-center">
                        <div class="col-4">
                            <div class="text-muted small">
                                <i class="fas fa-calendar-day d-block mb-1"></i>
                                <strong>Tanggal Asli</strong><br>
                                {{ $logbook->tanggal->locale('id')->isoFormat('DD MMM YYYY') }}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="text-muted small">
                                <i class="fas fa-clock d-block mb-1"></i>
                                <strong>Dibuat</strong><br>
                                {{ $logbook->created_at->locale('id')->isoFormat('DD MMM') }}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="text-muted small">
                                <i class="fas fa-edit d-block mb-1"></i>
                                <strong>Terakhir Edit</strong><br>
                                {{ $logbook->updated_at->locale('id')->isoFormat('DD MMM') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('kegiatan').addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.stopPropagation();
        }
    });

    function autoResizeTextarea() {
        const textarea = document.getElementById('kegiatan');
        textarea.style.height = 'auto';
        textarea.style.height = Math.max(120, textarea.scrollHeight) + 'px';
    }

    document.addEventListener('DOMContentLoaded', function() {
        const textarea = document.getElementById('kegiatan');
        textarea.addEventListener('input', autoResizeTextarea);
        autoResizeTextarea(); 
    });

    let originalFormData = new FormData(document.querySelector('form'));
    let formChanged = false;

    document.querySelector('form').addEventListener('input', function() {
        formChanged = true;
    });

    document.querySelector('a[href*="logbook.index"]').addEventListener('click', function(e) {
        if (formChanged) {
            if (!confirm('Anda memiliki perubahan yang belum disimpan. Yakin ingin keluar?')) {
                e.preventDefault();
            }
        }
    });
</script>

<style>
    .card-body{
        margin: 5px;
    }
    .card-header{
        margin: 5px;
    }
    @media (max-width: 768px) {
        .form-control-sm.form-control-md-regular {
            font-size: 0.9rem;
            padding: 0.6rem 0.75rem;
        }
        
        .card-body {
            padding: 1rem !important;
        }
        
        .btn {
            font-size: 0.9rem;
            padding: 0.6rem 1.2rem;
        }
        
        .btn-sm {
            font-size: 0.85rem;
            padding: 0.5rem 0.8rem;
        }
    }
    
    @media (max-width: 576px) {
        .container-fluid {
            padding-left: 10px;
            padding-right: 10px;
        }
        
        .fs-4 {
            font-size: 1.1rem !important;
        }
        
        .btn {
            font-size: 0.85rem;
            padding: 0.5rem 1rem;
        }
        
        .card-body {
            padding: 0.75rem !important;
        }
    }
    
    #kegiatan {
        white-space: pre-wrap !important;
        word-wrap: break-word !important;
        resize: vertical !important;
        line-height: 1.5;
        transition: height 0.2s ease;
    }
    
    #kegiatan:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    }
    
    @media (max-width: 576px) {
        .gap-2 {
            gap: 0.75rem !important;
        }
    }
    
    .bg-light {
        background-color: #f8f9fa !important;
    }
    
    .text-muted.small {
        font-size: 0.8rem;
        line-height: 1.3;
    }
    
    .btn:disabled {
        opacity: 0.65;
        cursor: not-allowed;
    }

    .form-control.is-invalid {
        border-color: #dc3545;
    }
    
    .form-control.is-valid {
        border-color: #198754;
    }
</style>
@endpush
@endsection