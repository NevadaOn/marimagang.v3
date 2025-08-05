@extends('layouts.user.app')

@section('content')
@include('layouts.user.components.breadcrumb', [
    'items' => [
        ['label' => 'Pengajuan', 'url' => route('pengajuan.index')],
        ['label' => 'Buat Pengajuan', 'url' => route('pengajuan.tipe')],
        ['label' => 'Form Pengajuan', 'url' => null],
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
                                {{ $item->status === 'tutup' ? '(Tutup)' : '(Tersedia)' }}
                            </option>
                        @endforeach
                    </select>
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

                    {{-- Form Input Anggota --}}
                    <div class="card p-3 mb-3">
                        <h5 class="fw-bold" id="form-title">Tambah Anggota</h5>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label>Nama</label>
                                <input type="text" id="input-nama" class="form-control">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>NIM</label>
                                <input type="text" id="input-nim" class="form-control">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Email</label>
                                <input type="email" id="input-email" class="form-control">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>No HP</label>
                                <input type="text" id="input-nohp" class="form-control">
                            </div>
                            <div class="col-12 mb-2">
                                <label>Skill</label>
                                <input type="text" id="input-skill" class="form-control">
                            </div>
                            <div class="col-12 text-end">
                                <button type="button" class="btn btn-primary mt-2" onclick="simpanAnggota()">Simpan Anggota</button>
                            </div>
                        </div>
                    </div>

                    {{-- Daftar Anggota --}}
                    <div id="list-anggota"></div>

                    {{-- Hidden Field untuk Data Final --}}
                    <div id="anggota-hidden-inputs"></div>

                    <script>
                        let anggotaList = []
                        let editingIndex = null;

                        function simpanAnggota() {
                            const nama = document.getElementById('input-nama').value.trim();
                            const nim = document.getElementById('input-nim').value.trim();
                            const email = document.getElementById('input-email').value.trim();
                            const no_hp = document.getElementById('input-nohp').value.trim();
                            const skill = document.getElementById('input-skill').value.trim();

                            if (!nama || !nim) {
                                alert("Nama dan NIM wajib diisi.");
                                return;
                            }

                            const data = { nama, nim, email, no_hp, skill };

                            if (editingIndex !== null) {
                                anggotaList[editingIndex] = data;
                                editingIndex = null;
                            } else {
                                if (anggotaList.length >= 7) {
                                    alert("Maksimal 7 anggota (tidak termasuk ketua).");
                                    return;
                                }
                                anggotaList.push(data);
                            }

                            resetForm();
                            renderAnggotaList();
                            renderHiddenInputs();
                        }

                        function resetForm() {
                            document.getElementById('input-nama').value = '';
                            document.getElementById('input-nim').value = '';
                            document.getElementById('input-email').value = '';
                            document.getElementById('input-nohp').value = '';
                            document.getElementById('input-skill').value = '';
                            document.getElementById('form-title').innerText = 'Tambah Anggota';
                        }

                        function renderAnggotaList() {
                            const container = document.getElementById('list-anggota');
                            container.innerHTML = '';

                            anggotaList.forEach((item, index) => {
                                const card = document.createElement('div');
                                card.className = 'card p-3 mb-2 anggota-card';
                                card.innerHTML = `
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <strong>${item.nama}</strong> (${item.nim}) <br>
                                            <small>${item.email || '-'} | ${item.no_hp || '-'}</small><br>
                                            <em>${item.skill || '-'}</em>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-sm btn-outline-primary me-2" onclick="editAnggota(${index})">Edit</button>
                                            <button type="button" class="btn btn-sm btn-outline-danger" onclick="hapusAnggota(${index})">Hapus</button>
                                        </div>
                                    </div>
                                `;
                                container.appendChild(card);
                            });
                        }

                        function editAnggota(index) {
                            const item = anggotaList[index];
                            document.getElementById('input-nama').value = item.nama;
                            document.getElementById('input-nim').value = item.nim;
                            document.getElementById('input-email').value = item.email;
                            document.getElementById('input-nohp').value = item.no_hp;
                            document.getElementById('input-skill').value = item.skill;
                            editingIndex = index;
                            document.getElementById('form-title').innerText = `Edit Anggota ${index + 1}`;
                        }

                        function hapusAnggota(index) {
                            if (confirm("Hapus anggota ini?")) {
                                anggotaList.splice(index, 1);
                                renderAnggotaList();
                                renderHiddenInputs();
                                resetForm();
                            }
                        }

                        function renderHiddenInputs() {
                            const container = document.getElementById('anggota-hidden-inputs');
                            container.innerHTML = '';
                            anggotaList.forEach((item, i) => {
                                for (const key in item) {
                                    const input = document.createElement('input');
                                    input.type = 'hidden';
                                    input.name = `anggota[${i}][${key}]`;
                                    input.value = item[key];
                                    container.appendChild(input);
                                }
                            });
                        }
                    </script>
                @endif

                {{-- Deskripsi --}}
                <div class="mb-4">
                    <label for="deskripsi" class="form-label fw-semibold">Catatan / Deskripsi (Opsional)</label>
                    <textarea name="deskripsi" class="form-control" rows="3"
                        placeholder="Tambahkan catatan jika perlu..."></textarea>
                </div>

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
@endsection