@extends('layouts.superadmin')
@section('content')
<style>

.form-card {
    /* background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 24px; */
    padding: 3rem;
    /* box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2); */
}

.form-header {
    text-align: center;
    margin-bottom: 3rem;
}

.form-title {
    font-size: 2.5rem;
    font-weight: 800;
    background: linear-gradient(135deg, #669fea, #4b62a2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 0.5rem;
}

.form-subtitle {
    color: #64748b;
    font-size: 1.1rem;
    font-weight: 500;
}

.form-grid {
    display: grid;
    gap: 2rem;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
}

.form-group {
    position: relative;
}

.form-label {
    display: block;
    font-weight: 600;
    color: #374151;
    margin-bottom: 0.75rem;
    font-size: 0.95rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.form-input {
    width: 100%;
    padding: 1rem 1.25rem;
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    font-size: 1rem;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    background: #ffffff;
    color: #374151;
    outline: none;
}

.form-input:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    transform: translateY(-1px);
}

.form-textarea {
    min-height: 120px;
    resize: vertical;
    font-family: inherit;
}

.form-select {
    appearance: none;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
    background-position: right 0.75rem center;
    background-repeat: no-repeat;
    background-size: 1.5em 1.5em;
    padding-right: 2.5rem;
}

.form-file {
    padding: 0.75rem;
    border-style: dashed;
    background: #f8fafc;
    cursor: pointer;
}

.form-file:hover {
    background: #f1f5f9;
    border-color: #667eea;
}

.error-alert {
    background: linear-gradient(135deg, #fee2e2, #fecaca);
    border: 1px solid #f87171;
    color: #dc2626;
    padding: 1.5rem;
    border-radius: 12px;
    margin-bottom: 2rem;
}

.error-list {
    margin: 0;
    padding-left: 1.25rem;
    font-size: 0.9rem;
    font-weight: 500;
}

.field-error {
    color: #dc2626;
    font-size: 0.85rem;
    margin-top: 0.5rem;
    font-weight: 500;
}

.submit-button {
    background: linear-gradient(135deg, #669bea, #4b58a2);
    color: white;
    border: none;
    padding: 1rem 2.5rem;
    border-radius: 12px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
}

.submit-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 30px rgba(102, 126, 234, 0.6);
}

.submit-button:active {
    transform: translateY(0);
}

.full-width {
    grid-column: 1 / -1;
}

@media (max-width: 768px) {
    .modern-form-container {
        padding: 1rem;
    }
    
    .form-card {
        padding: 2rem 1.5rem;
        border-radius: 16px;
    }
    
    .form-title {
        font-size: 2rem;
    }
    
    .form-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
}

@media (max-width: 480px) {
    .form-card {
        padding: 1.5rem 1rem;
    }
    
    .form-title {
        font-size: 1.75rem;
    }
}
</style>

<div>
    <div class="form-card">
        <div class="form-header">
            <h1 class="form-title">Tambah Bidang Baru</h1>
            <p class="form-subtitle">Kelola bidang organisasi dengan mudah</p>
        </div>

        @if ($errors->any())
        <div class="error-alert">
            <ul class="error-list">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('admin.bidang.store') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label">Nama Bidang</label>
                    <input type="text" 
                           name="nama" 
                           value="{{ old('nama') }}" 
                           class="form-input"
                           placeholder="Masukkan nama bidang">
                    @error('nama') 
                    <div class="field-error">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Slug</label>
                    <input type="text" 
                           name="slug" 
                           value="{{ old('slug') }}" 
                           class="form-input"
                           placeholder="contoh: bidang-teknologi">
                    @error('slug') 
                    <div class="field-error">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="form-group full-width">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" 
                              class="form-input form-textarea"
                              placeholder="Deskripsikan bidang ini...">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi') 
                    <div class="field-error">{{ $message }}</div> 
                    @enderror
                </div>

                @if($admins)
                <div class="form-group">
                    <label class="form-label">Admin Penanggung Jawab</label>
                    <select name="admin_id" class="form-input form-select" required>
                        <option value="">-- Pilih Admin --</option>
                        @foreach($admins as $admin)
                        <option value="{{ $admin->id }}" {{ old('admin_id') == $admin->id ? 'selected' : '' }}>
                            {{ $admin->nama }}
                        </option>
                        @endforeach
                    </select>
                    @error('admin_id') 
                    <div class="field-error">{{ $message }}</div> 
                    @enderror
                </div>
                @endif

                <div class="form-group">
                    <label class="form-label">Kuota</label>
                    <input type="number" 
                           name="kuota" 
                           value="{{ old('kuota') }}" 
                           class="form-input" 
                           min="1"
                           placeholder="0">
                    @error('kuota') 
                    <div class="field-error">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-input form-select">
                        <option value="buka" {{ old('status') === 'buka' ? 'selected' : '' }}>Buka</option>
                        <option value="tutup" {{ old('status') === 'tutup' ? 'selected' : '' }}>Tutup</option>
                    </select>
                    @error('status') 
                    <div class="field-error">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Thumbnail</label>
                    <input type="file" 
                           name="thumbnail" 
                           accept="image/*" 
                           class="form-input form-file">
                    @error('thumbnail') 
                    <div class="field-error">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Foto</label>
                    <input type="file" 
                           name="photo" 
                           accept="image/*" 
                           class="form-input form-file">
                    @error('photo') 
                    <div class="field-error">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="form-group full-width" style="margin-top: 2rem;">
                    <button type="submit" class="submit-button">
                        Simpan Bidang
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection