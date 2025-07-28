@extends('layouts.superadmin')

@section('content')
<div class="container py-4">
    <h1 class="h4 fw-bold mb-4">Tambah Admin Baru</h1>

    <form method="POST" action="{{ route('admin.admin.store') }}" class="bg-white p-4 rounded shadow-sm">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>

        <div class="mb-4">
            <label for="role" class="form-label">Role</label>
            <select name="role" id="role" class="form-select" required>
                <option value="admin_bidang">Admin Bidang</option>
                <option value="superadmin">Super Admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fas fa-save me-1"></i> Simpan
        </button>
    </form>
</div>
@endsection
