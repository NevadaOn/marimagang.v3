<form method="POST" action="{{ route('admin.admin.store') }}">
    @csrf
    <div class="mb-4">
        <label>Nama</label>
        <input type="text" name="nama" class="input" required>
    </div>
    <div class="mb-4">
        <label>Email</label>
        <input type="email" name="email" class="input" required>
    </div>
    <div class="mb-4">
        <label>Password</label>
        <input type="password" name="password" class="input" required>
    </div>
    <div class="mb-4">
        <label>Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="input" required>
    </div>
    <div class="mb-4">
        <label>Role</label>
        <select name="role" class="input" required>
            <option value="admin_bidang">Admin Bidang</option>
            <option value="superadmin">Super Admin</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
