@extends('layouts.superadmin')
@section('content')
<h1 class="text-xl font-bold mb-4">Edit Bidang</h1>

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
        <ul class="text-sm list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('admin.bidang.update', $bidang->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label>Nama Bidang</label>
        <input type="text" name="nama" value="{{ old('nama', $bidang->nama) }}" class="input w-full">
        @error('nama') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
    </div>

    <div class="mb-4">
        <label>Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $bidang->slug) }}" class="input w-full">
        @error('slug') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
    </div>

    <div class="mb-4">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="input w-full">{{ old('deskripsi', $bidang->deskripsi) }}</textarea>
        @error('deskripsi') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
    </div>

    @if(isset($admins) && $admins)
    <div class="mb-4">
        <label for="admin_id">Admin Penanggung Jawab</label>
        <select name="admin_id" id="admin_id" class="input w-full" required>
            <option value="">-- Pilih Admin --</option>
            @foreach($admins as $admin)
                <option value="{{ $admin->id }}" {{ old('admin_id', $bidang->admin_id) == $admin->id ? 'selected' : '' }}>
                    {{ $admin->nama }}
                </option>
            @endforeach
        </select>
        @error('admin_id') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
    </div>
    @endif

    <div class="mb-4">
        <label>Kuota</label>
        <input type="number" name="kuota" value="{{ old('kuota', $bidang->kuota) }}" class="input w-full" min="1">
        @error('kuota') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
    </div>

    <div class="mb-4">
        <label>Status</label>
        <select name="status" class="input w-full">
            <option value="buka" {{ old('status', $bidang->status) === 'buka' ? 'selected' : '' }}>Buka</option>
            <option value="tutup" {{ old('status', $bidang->status) === 'tutup' ? 'selected' : '' }}>Tutup</option>
        </select>
        @error('status') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
    </div>

    <div class="mb-4">
        <label>Thumbnail (opsional)</label>
        @if ($bidang->thumbnail)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $bidang->thumbnail) }}" alt="Thumbnail" class="w-32 rounded">
            </div>
        @endif
        <input type="file" name="thumbnail" class="input w-full">
        @error('thumbnail') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
    </div>

    <div class="mb-4">
        <label>Photo (opsional)</label>
        @if ($bidang->photo)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $bidang->photo) }}" alt="Photo" class="w-32 rounded">
            </div>
        @endif
        <input type="file" name="photo" class="input w-full">
        @error('photo') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
    </div>

    <button class="btn btn-primary">Simpan Perubahan</button>
</form>
@endsection
