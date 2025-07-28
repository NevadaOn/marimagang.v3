<!-- Kelola Surat -->
            @if (in_array($admin->role, ['superadmin', 'admin_dinas']))
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-file-pdf me-2"></i>
                        Kelola Surat & Komentar
                    </h5>
                </div>
                <div class="card-body">
                    <!-- Form upload surat PDF -->
                    <form action="{{ route('admin.pengajuan.uploadSurat', $pengajuan->id) }}" method="POST" enctype="multipart/form-data" class="mb-4">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Unggah Surat (PDF)</label>
                            <input type="file" name="surat_pdf" accept="application/pdf" class="form-control">
                        </div>
                        {{-- <div class="form-group">
                            <label class="form-label">Komentar Admin</label>
                            <textarea name="komentar_admin" rows="4" class="form-control">{{ old('komentar_admin', $pengajuan->komentar_admin) }}</textarea>
                        </div> --}}
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>
                            Simpan Surat
                        </button>
                    </form>

                    <!-- Form generate surat otomatis -->
                    <h6>Buat Surat Otomatis</h6>
                    <form action="{{ route('admin.pengajuan.generateSurat', $pengajuan->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nomor Surat</label>
                                    <input type="text" name="nomor_surat" class="form-control" placeholder="Contoh: 001/ADM/PKL/2025" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">NIP</label>
                                    <input type="text" name="nip_penanggung_jawab" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nama Penanggung Jawab</label>
                                    <input type="text" name="nama_penanggung_jawab" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Jabatan</label>
                                    <input type="text" name="jabatan_penanggung_jawab" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nama Kegiatan</label>
                                    <input type="text" name="nama_kegiatan" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-plus me-1"></i>
                            Buat Surat Otomatis
                        </button>
                    </form>

                    @if ($pengajuan->surat_pdf)
                    <div class="mt-3">
                        <button onclick="showPreview('{{ asset('storage/' . $pengajuan->surat_pdf) }}', '{{ basename($pengajuan->surat_pdf) }}')"
                                class="btn btn-primary btn-sm">
                            <i class="fas fa-eye me-1"></i>
                            Lihat / Unduh Surat PDF
                        </button>
                    </div>
                    @endif
                </div>
            </div>
            @endif