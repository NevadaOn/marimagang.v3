@extends('layouts.superadmin')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Dokumentasi Kegiatan</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi Kesalahan!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.documentation.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="judul_kegiatan" class="form-label">Judul Kegiatan</label>
            <input type="text" name="judul_kegiatan" class="form-control" value="{{ old('judul_kegiatan') }}">
        </div>

        <div class="mb-3">
            <label for="judul_project" class="form-label">Judul Project</label>
            <input type="text" name="judul_project" class="form-control" value="{{ old('judul_project') }}">
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi (Opsional)</label>
            <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="images" class="form-label">Upload Gambar</label>
            <input type="file" name="images[]" class="form-control" multiple required accept="image/*">
            <small class="text-muted">Bisa pilih lebih dari satu gambar (Max 2MB per file)</small>
        </div>

        {{-- (Opsional) caption per gambar jika dibutuhkan --}}

        <button type="submit" class="btn btn-primary">Simpan Dokumentasi</button>
    </form>
</div>
@endsection
