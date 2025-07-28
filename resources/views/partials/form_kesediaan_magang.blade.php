@if(auth('admin')->check() && (
    (auth('admin')->user()->role === 'admin_bidang' && auth('admin')->user()->id === $pengajuan->databidang->admin_id) ||
    auth('admin')->user()->role === 'superadmin'
))
    <form action="{{ route('admin.pengajuan.kesediaan.generate', $pengajuan->id) }}" method="POST">
        @csrf
        <h5 class="font-bold mb-3">Buat Form Kesediaan Magang</h5>

        <div class="mb-2">
            <label>Penanggung Jawab</label>
            <input type="text" name="penanggung_jawab" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Nama Project</label>
            <textarea name="nama_project" class="form-control" rows="3" placeholder="Masukkan judul/deskripsi project" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Generate Form</button>
    </form>

    @if($pengajuan->form_kesediaan_magang)
        <a href="{{ asset('storage/' . $pengajuan->form_kesediaan_magang) }}" class="btn btn-success mt-2" target="_blank">
            Lihat Form Kesediaan Magang
        </a>
    @endif
@endif

