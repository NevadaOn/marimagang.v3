@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Profil</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- FOTO PROFIL --}}
        <div class="mb-3">
            <label class="form-label">Foto Profil</label><br>
            <img src="{{ $user->foto ? asset('storage/' . $user->foto) : asset('default/user.png') }}"
                 alt="Foto Profil" width="120" class="mb-2 rounded">
            <input type="file" name="foto" class="form-control" accept="image/*">
            @error('foto')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- NAMA --}}
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $user->nama) }}">
            @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- NIM --}}
        <div class="mb-3">
            <label class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control" value="{{ old('nim', $user->nim) }}">
            @error('nim')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- TELEPON --}}
        <div class="mb-3">
            <label class="form-label">No Telepon</label>
            <input type="text" name="telepon" class="form-control" value="{{ old('telepon', $user->telepon) }}">
            @error('telepon')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- NAMA UNIVERSITAS --}}
        <div class="mb-3">
            <label class="form-label">Nama Universitas</label>
            <input type="text" name="nama_universitas" class="form-control"
                value="{{ old('nama_universitas', $user->universitas->nama_universitas ?? '') }}">
            @error('nama_universitas')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- FAKULTAS --}}
        <div class="mb-3">
            <label class="form-label">Fakultas</label>
            <input type="text" name="fakultas" class="form-control"
                value="{{ old('fakultas', $user->universitas->fakultas ?? '') }}">
            @error('fakultas')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- PRODI --}}
        <div class="mb-3">
            <label class="form-label">Program Studi (Prodi)</label>
            <input type="text" name="prodi" class="form-control"
                value="{{ old('prodi', $user->universitas->prodi ?? '') }}">
            @error('prodi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
