@extends('layouts.adminbidang')
@section('content')
<h1 class="text-xl font-bold mb-4 text-white">Edit Bidang</h1>

@if ($errors->any())
    <div class="bg-red-900 text-red-200 p-3 mb-4 rounded border border-red-700">
        <ul class="text-sm list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('admin.bidang.update', $bidang->id) }}" enctype="multipart/form-data" class="bg-gray-900 p-6 rounded-lg shadow-lg">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block text-gray-300 mb-1">Nama Bidang</label>
        <input type="text" name="nama" value="{{ old('nama', $bidang->nama) }}" 
               class="w-full bg-gray-800 border border-gray-700 rounded p-2 text-white focus:ring focus:ring-blue-500">
        @error('nama') <div class="text-red-400 text-sm">{{ $message }}</div> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-300 mb-1">Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $bidang->slug) }}" 
               class="w-full bg-gray-800 border border-gray-700 rounded p-2 text-white focus:ring focus:ring-blue-500">
        @error('slug') <div class="text-red-400 text-sm">{{ $message }}</div> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-300 mb-1">Deskripsi</label>
        <textarea name="deskripsi" rows="4" 
                  class="w-full bg-gray-800 border border-gray-700 rounded p-2 text-white focus:ring focus:ring-blue-500">{{ old('deskripsi', $bidang->deskripsi) }}</textarea>
        @error('deskripsi') <div class="text-red-400 text-sm">{{ $message }}</div> @enderror
    </div>

    @if(isset($admins) && $admins)
    <div class="mb-4">
        <label for="admin_id" class="block text-gray-300 mb-1">Admin Penanggung Jawab</label>
        <select name="admin_id" id="admin_id" required
                class="w-full bg-gray-800 border border-gray-700 rounded p-2 text-white focus:ring focus:ring-blue-500">
            <option value="">-- Pilih Admin --</option>
            @foreach($admins as $admin)
                <option value="{{ $admin->id }}" {{ old('admin_id', $bidang->admin_id) == $admin->id ? 'selected' : '' }}>
                    {{ $admin->nama }}
                </option>
            @endforeach
        </select>
        @error('admin_id') <div class="text-red-400 text-sm">{{ $message }}</div> @enderror
    </div>
    @endif

    <div class="mb-4">
        <label class="block text-gray-300 mb-1">Kuota</label>
        <input type="number" name="kuota" min="1" value="{{ old('kuota', $bidang->kuota) }}"
               class="w-full bg-gray-800 border border-gray-700 rounded p-2 text-white focus:ring focus:ring-blue-500">
        @error('kuota') <div class="text-red-400 text-sm">{{ $message }}</div> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-300 mb-1">Status</label>
        <select name="status" class="w-full bg-gray-800 border border-gray-700 rounded p-2 text-white focus:ring focus:ring-blue-500">
            <option value="buka" {{ old('status', $bidang->status) === 'buka' ? 'selected' : '' }}>Buka</option>
            <option value="tutup" {{ old('status', $bidang->status) === 'tutup' ? 'selected' : '' }}>Tutup</option>
        </select>
        @error('status') <div class="text-red-400 text-sm">{{ $message }}</div> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-300 mb-1">Thumbnail (opsional)</label>
        @if ($bidang->thumbnail)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $bidang->thumbnail) }}" alt="Thumbnail" class="w-32 rounded border border-gray-700">
            </div>
        @endif
        <input type="file" name="thumbnail" 
               class="w-full bg-gray-800 border border-gray-700 rounded p-2 text-white file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-blue-600 file:text-white hover:file:bg-blue-700">
        @error('thumbnail') <div class="text-red-400 text-sm">{{ $message }}</div> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-300 mb-1">Photo (opsional)</label>
        @if ($bidang->photo)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $bidang->photo) }}" alt="Photo" class="w-32 rounded border border-gray-700">
            </div>
        @endif
        <input type="file" name="photo"
               class="w-full bg-gray-800 border border-gray-700 rounded p-2 text-white file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-blue-600 file:text-white hover:file:bg-blue-700">
        @error('photo') <div class="text-red-400 text-sm">{{ $message }}</div> @enderror
    </div>

    <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">Simpan Perubahan</button>
</form>
@endsection
