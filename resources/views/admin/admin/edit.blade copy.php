@extends('layouts.superadmin')

@section('content')
<h1 class="text-xl font-bold mb-4">Edit Admin</h1>

<form method="POST" action="{{ route('admin.admin.update', $admin->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label>Nama</label>
        <input type="text" name="nama" class="input" value="{{ old('nama', $admin->nama) }}" required>
    </div>
    <div class="mb-4">
        <label>Email</label>
        <input type="email" name="email" class="input" value="{{ old('email', $admin->email) }}" required>
    </div>
    <div class="mb-4">
        <label>Password <small>(Kosongkan jika tidak diubah)</small></label>
        <input type="password" name="password" class="input">
    </div>
    <div class="mb-4">
        <label>Role</label>
        <select name="role" class="input">
            <option value="admin_bidang" @selected($admin->role === 'admin_bidang')>Admin Bidang</option>
             <option value="admin_dinas" @selected($admin->role === 'admin_dinas')>Admin Dinas</option>
            <option value="superadmin" @selected($admin->role === 'superadmin')>Super Admin</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>
@endsection
