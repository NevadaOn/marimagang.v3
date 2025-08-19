@extends('layouts.superadmin')
@section('content')
<div class="container mt-4">
    <h1 class="h4 fw-bold mb-4">Edit Bidang</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li class="small">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.bidang.update', $bidang->id) }}" enctype="multipart/form-data" class="p-4 rounded shadow-sm bg-white">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Bidang</label>
            <input type="text" name="nama" value="{{ old('nama', $bidang->nama) }}"
                   class="form-control">
            @error('nama') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Slug</label>
            <input type="text" name="slug" value="{{ old('slug', $bidang->slug) }}"
                   class="form-control">
            @error('slug') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" rows="4"
                      class="form-control">{{ old('deskripsi', $bidang->deskripsi) }}</textarea>
            @error('deskripsi') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        @if(isset($admins) && $admins)
        <div class="mb-3">
            <label class="form-label">Admin Penanggung Jawab</label>
            <select name="admin_id" id="admin_id" required class="form-select">
                <option value="">-- Pilih Admin --</option>
                @foreach($admins as $admin)
                    <option value="{{ $admin->id }}" {{ old('admin_id', $bidang->admin_id) == $admin->id ? 'selected' : '' }}>
                        {{ $admin->nama }}
                    </option>
                @endforeach
            </select>
            @error('admin_id') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        @endif

        <div class="mb-3">
            <label class="form-label">Kuota</label>
            <input type="number" name="kuota" min="1" value="{{ old('kuota', $bidang->kuota) }}"
                   class="form-control">
            @error('kuota') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="buka" {{ old('status', $bidang->status) === 'buka' ? 'selected' : '' }}>Buka</option>
                <option value="tutup" {{ old('status', $bidang->status) === 'tutup' ? 'selected' : '' }}>Tutup</option>
            </select>
            @error('status') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Thumbnail (opsional)</label>
            @if ($bidang->thumbnail)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $bidang->thumbnail) }}" alt="Thumbnail" class="img-thumbnail" style="width: 130px;">
                </div>
            @endif
            <input type="file" name="thumbnail" class="form-control">
            @error('thumbnail') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Photo (opsional)</label>
            @if ($bidang->photo)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $bidang->photo) }}" alt="Photo" class="img-thumbnail" style="width: 130px;">
                </div>
            @endif
            <input type="file" name="photo" class="form-control">
            @error('photo') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <button class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
