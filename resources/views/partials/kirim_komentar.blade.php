<form action="{{ route('admin.pengajuan.kirimCatatan', $pengajuan->id) }}" method="POST" style="padding: 5px;">
    @csrf

    <div class="mb-3">
        <label for="tujuan" class="form-label">Tujuan Komentar</label>
        <select name="tujuan" id="tujuan" class="form-select" required>
            <option value="user">User</option>
            <option value="admin_bidang">Admin Bidang</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="komentar_admin" class="form-label">Isi Komentar</label>
        <textarea name="komentar_admin" class="form-control" rows="4" required>{{ old('komentar_admin') }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Kirim</button>
</form>