@extends('layouts.user.app')

@section('content')
@include('layouts.user.components.breadcrumb', [
    'items' => [
        ['label' => 'Pengajuan', 'url' => route('pengajuan.index')],
        ['label' => 'Buat Pengajuan', 'url' => route('pengajuan.tipe')],
        ['label' => 'Form Pengajuan', 'url' => null], // terakhir: aktif, tidak punya tautan
    ]
])

    <div class="container py-5">
        <div class="card shadow-sm p-4 mb-4">
            <h1 class="mb-4 h3 fw-bold text-primary">Form Pengajuan Magang <span class="text-dark">—
                    {{ ucfirst($tipe) }}</span></h1>

            <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Pilih Bidang --}}
                <div class="mb-4">
                    <label for="databidang_id" class="form-label fw-semibold">Pilih Bidang Magang</label>
                    <select name="databidang_id" id="databidang_id" class="form-select" required>
                        <option value="">-- Pilih Bidang --</option>
                        @foreach ($bidang as $item)
                            <option value="{{ $item->id }}" {{ $item->status === 'tutup' ? 'disabled' : '' }}
                                style="{{ $item->status === 'tutup' ? 'color: #999;' : '' }}">
                                {{ $item->nama }}
                                {{ $item->status === 'tutup' ? '❌ (Tutup)' : '✅ (Tersedia)' }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Deskripsi --}}
                <div class="mb-4">
                    <label for="deskripsi" class="form-label fw-semibold">Catatan / Deskripsi (Opsional)</label>
                    <textarea name="deskripsi" class="form-control" rows="3"
                        placeholder="Tambahkan catatan jika perlu..."></textarea>
                </div>

                {{-- Tanggal --}}
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="tanggal_mulai" class="form-label fw-semibold">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="tanggal_selesai" class="form-label fw-semibold">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" class="form-control" required>
                    </div>
                </div>

                {{-- Tambah Anggota --}}
                @if ($tipe === 'kelompok')
                    <hr class="my-4">
                    <h4 class="fw-semibold text-primary mb-3">Anggota Kelompok</h4>

                    <div class="alert alert-info small">
                        <strong>Ketua Kelompok:</strong> {{ auth()->user()->nama }} ({{ auth()->user()->nim }}) <br>
                        <span class="text-muted">Anda otomatis menjadi ketua kelompok.</span>
                    </div>

                    <div id="anggota-container">
                        <div class="anggota-item card p-3 mb-3">
                            <h5 class="fw-bold">Anggota 1</h5>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label>Nama</label>
                                    <input type="text" name="anggota[0][nama]" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label>NIM</label>
                                    <input type="text" name="anggota[0][nim]" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label>Email</label>
                                    <input type="email" name="anggota[0][email]" class="form-control">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label>No HP</label>
                                    <input type="text" name="anggota[0][no_hp]" class="form-control">
                                </div>
                                <div class="col-12 mb-2">
                                    <label>Skill</label>
                                    <input type="text" name="anggota[0][skill]" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-outline-primary mb-4" onclick="tambahAnggota()">+ Tambah Anggota</button>

                    <script>
                        let anggotaIndex = 1;
                        function tambahAnggota() {
                            const container = document.getElementById('anggota-container');
                            const item = document.createElement('div');
                            item.className = 'anggota-item card p-3 mb-3';
                            item.innerHTML = `
                                <h5 class="fw-bold">Anggota ${anggotaIndex + 1}</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label>Nama</label>
                                        <input type="text" name="anggota[${anggotaIndex}][nama]" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label>NIM</label>
                                        <input type="text" name="anggota[${anggotaIndex}][nim]" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label>Email</label>
                                        <input type="email" name="anggota[${anggotaIndex}][email]" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label>No HP</label>
                                        <input type="text" name="anggota[${anggotaIndex}][no_hp]" class="form-control">
                                    </div>
                                    <div class="col-12 mb-2">
                                        <label>Skill</label>
                                        <input type="text" name="anggota[${anggotaIndex}][skill]" class="form-control">
                                    </div>
                                    <button type="button" class="btn btn-sm btn-danger mt-2" onclick="this.parentElement.parentElement.parentElement.remove()">Hapus</button>
                                </div>
                            `;
                            container.appendChild(item);
                            anggotaIndex++;
                        }
                    </script>
                @endif

                {{-- Dokumen --}}
                <hr class="my-4">
                <h4 class="fw-semibold text-primary mb-3">Unggah Dokumen</h4>

                <div class="mb-3">
                    <label class="form-label">Surat Pengantar Magang (PDF)</label>
                    <input type="file" name="dokumen[surat_pengantar]" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label class="form-label">Proposal (PDF)</label>
                    <input type="file" name="dokumen[proposal]" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100 mt-3">
                    <i class="ph ph-paper-plane-tilt me-2"></i> Kirim Pengajuan
                </button>
            </form>
        </div>
    </div>


    @if ($tipe === 'kelompok')
        <script>
            const daftarAnggota = new Map();
            const currentUserId = {{ auth()->id() }};

            document.getElementById('nim_cari')?.addEventListener('input', function () {
                const nim = this.value.trim();

                if (nim.length < 6) {
                    document.getElementById('hasil_pencarian').innerText = 'Masukkan minimal 6 karakter NIM.';
                    return;
                }

                fetch(`/user/search-nim?nim=${encodeURIComponent(nim)}`)
                    .then(res => res.json())
                    .then(data => {
                        const hasil = document.getElementById('hasil_pencarian');
                        if (data.message) {
                            hasil.innerText = data.message;
                        } else if (data.id === currentUserId) {
                            hasil.innerText = 'Anda sudah otomatis menjadi ketua kelompok.';
                        } else if (daftarAnggota.has(data.id)) {
                            hasil.innerText = 'Pengguna sudah ditambahkan ke daftar anggota.';
                        } else {
                            hasil.innerHTML = `
                                        <div class="card p-3">
                                            <div><strong>${data.nama}</strong> (${data.nim})</div>
                                            <div class="text-muted">${data.email}</div>
                                            <button class="btn btn-sm btn-success mt-2" onclick="tambahAnggota(${data.id}, '${data.nama}', '${data.nim}')">Tambah Sebagai Anggota</button>
                                        </div>
                                    `;
                        }
                    })
                    .catch(err => {
                        document.getElementById('hasil_pencarian').innerText = 'Terjadi kesalahan saat pencarian.';
                    });
            });

            function tambahAnggota(id, nama, nim) {
                if (daftarAnggota.has(id) || id === currentUserId) return;

                daftarAnggota.set(id, true);

                const container = document.getElementById('daftar_anggota');
                const anggotaDiv = document.createElement('div');
                anggotaDiv.className = 'card p-3 mb-2';
                anggotaDiv.innerHTML = `
                            <div><strong>${nama}</strong> (${nim})</div>
                            <input type="hidden" name="user_ids[]" value="${id}">
                            <div class="mt-2">
                                <label>Peran:</label>
                                <select name="roles[]" class="form-select form-select-sm w-auto d-inline-block ms-2">
                                    <option value="anggota">Anggota</option>
                                    <option value="ketua">Ketua</option>
                                </select>
                                <button type="button" class="btn btn-sm btn-danger ms-2" onclick="hapusAnggota(this, ${id})">Hapus</button>
                            </div>
                        `;
                container.appendChild(anggotaDiv);
                document.getElementById('hasil_pencarian').innerText = '';
                document.getElementById('nim_cari').value = '';
            }

            function hapusAnggota(button, id) {
                daftarAnggota.delete(id);
                button.closest('.card').remove();
            }
        </script>
    @endif
@endsection