@extends('layouts.superadmin')

@section('content')
<div class="container py-4">
    <h1 class="h4 fw-bold mb-4">Edit Admin</h1>

    <form method="POST" action="{{ route('admin.admin.update', $admin->id) }}" class="bg-white p-4 rounded shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $admin->nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $admin->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">
                Password <small class="text-muted">(Kosongkan jika tidak diubah)</small>
            </label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <div class="mb-4">
            <label for="role" class="form-label">Role</label>
            <select name="role" id="role" class="form-select">
                <option value="admin_bidang" @selected($admin->role === 'admin_bidang')>Admin Bidang</option>
                <option value="admin_dinas" @selected($admin->role === 'admin_dinas')>Admin Dinas</option>
                <option value="superadmin" @selected($admin->role === 'superadmin')>Super Admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save me-1"></i> Simpan Perubahan
        </button>
    </form>
</div>
@endsection
