@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Profil & Kelola Keahlian</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- SECTION 1: PROFILE DATA -->
        <div class="card mb-4">
            <div class="card-header">
                <h3>Informasi Profil</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap *</label>
                            <input type="text" id="nama" name="nama" class="form-control" 
                                   value="{{ old('nama', $user->nama) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" id="nim" name="nim" class="form-control" 
                                   value="{{ old('nim', $user->nim) }}" placeholder="Nomor Induk Mahasiswa">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="text" id="telepon" name="telepon" class="form-control" 
                                   value="{{ old('telepon', $user->telepon) }}" placeholder="Nomor telepon">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_universitas">Nama Universitas *</label>
                            <input type="text" id="nama_universitas" name="nama_universitas" class="form-control" 
                                   value="{{ old('nama_universitas', optional($user->universitas)->nama_universitas) }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fakultas">Fakultas *</label>
                            <input type="text" id="fakultas" name="fakultas" class="form-control" 
                                   value="{{ old('fakultas', optional($user->universitas)->fakultas) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="prodi">Program Studi *</label>
                            <input type="text" id="prodi" name="prodi" class="form-control" 
                                   value="{{ old('prodi', optional($user->universitas)->prodi) }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="foto">Foto Profil</label>
                    @if ($user->foto)
                        <div class="current-photo mb-2">
                            <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto Profil" class="img-thumbnail" style="max-width: 150px;">
                            <small class="d-block">Foto saat ini</small>
                        </div>
                    @endif
                    <input type="file" id="foto" name="foto" class="form-control" accept="image/*">
                    <small class="form-text text-muted">Format: JPEG, PNG, JPG, GIF. Maksimal 2MB.</small>
                </div>

                <div class="form-group">
                    <label for="bio">Bio</label>
                    <textarea id="bio" name="bio" class="form-control" rows="3" 
                              placeholder="Ceritakan tentang diri Anda...">{{ old('bio', $user->bio) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" class="form-control" rows="2" 
                              placeholder="Alamat lengkap">{{ old('alamat', $user->alamat) }}</textarea>
                </div>
            </div>
        </div>

        <!-- SECTION 2: SKILLS & PROJECTS -->
        <div class="card mb-4">
            <div class="card-header">
                <h3>Kelola Keahlian & Proyek</h3>
            </div>
            <div class="card-body">
                
                @forelse ($userSkills as $index => $userSkill)
                    <div class="skill-item border p-3 mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5>Skill #{{ $index + 1 }}</h5>
                            <button type="button" class="btn btn-danger btn-sm" 
                                    onclick="deleteSkill({{ $userSkill->id }}, '{{ $userSkill->skill->nama }}')">
                                Hapus Skill
                            </button>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Nama Skill *</label>
                                    <input type="text" name="skills[{{ $index }}][nama]" class="form-control"
                                           value="{{ old("skills.$index.nama", $userSkill->skill->nama) }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tingkat Keahlian</label>
                                    <select name="skills[{{ $index }}][level]" class="form-control">
                                        <option value="Dasar" {{ old("skills.$index.level", $userSkill->level) == 'Dasar' ? 'selected' : '' }}>Dasar</option>
                                        <option value="Menengah" {{ old("skills.$index.level", $userSkill->level) == 'Menengah' ? 'selected' : '' }}>Menengah</option>
                                        <option value="Lanjutan" {{ old("skills.$index.level", $userSkill->level) == 'Lanjutan' ? 'selected' : '' }}>Lanjutan</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Upload Sertifikat (Opsional)</label>
                            @if ($userSkill->sertifikat_path)
                                <div class="current-file mb-2">
                                    <a href="{{ asset('storage/' . $userSkill->sertifikat_path) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                        Lihat Sertifikat Saat Ini
                                    </a>
                                </div>
                            @endif
                            <input type="file" name="skills[{{ $index }}][sertifikat]" class="form-control" accept="application/pdf,image/*">
                            <small class="form-text text-muted">Upload file baru untuk mengganti sertifikat lama. Format: PDF, gambar. Max 2MB.</small>
                        </div>

                        <hr>
                        <h6>Proyek untuk {{ $userSkill->skill->nama }}</h6>
                        
                        @if($userSkill->skill->judul_proyek)
                            <div class="current-project bg-light p-3 mb-3">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="mb-1">{{ $userSkill->skill->judul_proyek }}</h6>
                                        <p class="mb-2">{{ $userSkill->skill->deskripsi ?? 'Tidak ada deskripsi' }}</p>
                                        @if($userSkill->skill->link_project)
                                            <div class="mb-2">
                                                <a href="{{ $userSkill->skill->link_project }}" target="_blank" class="btn btn-outline-info btn-sm">
                                                    Lihat Project
                                                </a>
                                            </div>
                                        @endif
                                        @if($userSkill->skill->file_path)
                                            <div>
                                                <a href="{{ asset('storage/' . $userSkill->skill->file_path) }}" target="_blank" class="btn btn-outline-secondary btn-sm">
                                                    Download File
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="button" class="btn btn-outline-danger btn-sm" 
                                            onclick="deleteProject({{ $userSkill->skill->id }}, '{{ $userSkill->skill->judul_proyek }}')">
                                        Hapus Project
                                    </button>
                                </div>
                            </div>
                        @endif

                        <div class="project-form border p-3">
                            <h6 class="mb-3">{{ $userSkill->skill->judul_proyek ? 'Edit Project' : 'Tambah Project Baru' }}</h6>
                            
                            <input type="hidden" name="projects[{{ $index }}][target_skill_id]" value="{{ $userSkill->skill->id }}">
                            
                            <div class="form-group">
                                <label>Judul Proyek</label>
                                <input type="text" name="projects[{{ $index }}][judul_proyek]" class="form-control"
                                       value="{{ old("projects.$index.judul_proyek", $userSkill->skill->judul_proyek) }}"
                                       placeholder="Masukkan judul proyek...">
                            </div>
                            
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="projects[{{ $index }}][deskripsi]" class="form-control" rows="3"
                                          placeholder="Jelaskan tentang proyek ini...">{{ old("projects.$index.deskripsi", $userSkill->skill->deskripsi) }}</textarea>
                            </div>
                            
                            <div class="form-group">
                                <label>Link Project (Opsional)</label>
                                <input type="text" name="projects[{{ $index }}][link_project]" class="form-control"
                                       value="{{ old("projects.$index.link_project", $userSkill->skill->link_project) }}"
                                       placeholder="https://github.com/username/project">
                                <small class="form-text text-muted">Contoh: GitHub, demo website, portfolio, dll.</small>
                            </div>
                            
                            <div class="form-group">
                                <label>Upload File Project (Opsional)</label>
                                @if($userSkill->skill->file_path)
                                    <div class="current-file mb-2">
                                        <small class="text-muted">File saat ini: {{ basename($userSkill->skill->file_path) }}</small>
                                    </div>
                                @endif
                                <input type="file" name="projects[{{ $index }}][file_path]" class="form-control"
                                       accept="image/*,application/pdf,.zip,.rar">
                                <small class="form-text text-muted">Format: gambar, PDF, ZIP, RAR (max 2MB)</small>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-warning">
                        <h5>Belum ada skill yang ditambahkan</h5>
                        <p class="mb-0">Mulai dengan menambahkan skill baru di bawah ini.</p>
                    </div>
                @endforelse

                <hr>
                
                <!-- ADD NEW SKILL & PROJECT -->
                <div class="new-skill-section border-primary p-4 mb-4">
                    <h4 class="text-primary mb-3">Tambah Skill & Project Baru</h4>
                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Nama Skill</label>
                                <input type="text" name="new_skill[nama]" class="form-control"
                                       value="{{ old('new_skill.nama') }}"
                                       placeholder="Contoh: JavaScript, PHP, Design Grafis...">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tingkat Keahlian</label>
                                <select name="new_skill[level]" class="form-control">
                                    <option value="Dasar" {{ old('new_skill.level') == 'Dasar' ? 'selected' : '' }}>Dasar</option>
                                    <option value="Menengah" {{ old('new_skill.level') == 'Menengah' ? 'selected' : '' }}>Menengah</option>
                                    <option value="Lanjutan" {{ old('new_skill.level') == 'Lanjutan' ? 'selected' : '' }}>Lanjutan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Sertifikat (Opsional)</label>
                        <input type="file" name="new_skill[sertifikat]" class="form-control" accept="application/pdf,image/*">
                        <small class="form-text text-muted">Format: PDF, gambar. Max 2MB.</small>
                    </div>

                    <h5 class="mt-4 mb-3">Project untuk Skill Baru (Opsional)</h5>
                    <div class="bg-light p-3">
                        <div class="form-group">
                            <label>Judul Proyek</label>
                            <input type="text" name="new_project[judul_proyek]" class="form-control"
                                   value="{{ old('new_project.judul_proyek') }}"
                                   placeholder="Masukkan judul proyek...">
                        </div>
                        
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="new_project[deskripsi]" class="form-control" rows="3"
                                      placeholder="Jelaskan tentang proyek ini...">{{ old('new_project.deskripsi') }}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>Link Project (Opsional)</label>
                            <input type="text" name="new_project[link_project]" class="form-control"
                                   value="{{ old('new_project.link_project') }}"
                                   placeholder="https://github.com/username/project">
                            <small class="form-text text-muted">Contoh: GitHub, demo website, portfolio, dll.</small>
                        </div>
                        
                        <div class="form-group">
                            <label>Upload File Project (Opsional)</label>
                            <input type="file" name="new_project[file_path]" class="form-control"
                                   accept="image/*,application/pdf,.zip,.rar">
                            <small class="form-text text-muted">Format: gambar, PDF, ZIP, RAR (max 2MB)</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SUBMIT BUTTON -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg px-5">
                Simpan Semua Perubahan
            </button>
        </div>
    </form>
</div>

<!-- Modal Konfirmasi Hapus -->
<div id="deleteModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000;">
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 30px; border-radius: 5px; min-width: 400px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <h5 style="margin-bottom: 20px;">Konfirmasi Hapus</h5>
        <p id="deleteMessage" style="margin-bottom: 25px;"></p>
        <div style="text-align: right;">
            <button type="button" class="btn btn-secondary" onclick="closeModal()" style="margin-right: 10px;">Batal</button>
            <form id="deleteForm" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
            </form>
        </div>
    </div>
</div>

<script>
function deleteSkill(userSkillId, skillName) {
    document.getElementById('deleteMessage').innerHTML = 
        `Apakah Anda yakin ingin menghapus skill "<strong>${skillName}</strong>" beserta semua project yang terkait?`;
    document.getElementById('deleteForm').action = `{{ url('/profile/skills') }}/${userSkillId}`;
    document.getElementById('deleteModal').style.display = 'block';
}

function deleteProject(skillId, projectTitle) {
    document.getElementById('deleteMessage').innerHTML = 
        `Apakah Anda yakin ingin menghapus project "<strong>${projectTitle}</strong>"?`;
    document.getElementById('deleteForm').action = `{{ url('/profile/skills') }}/${skillId}/project`;
    document.getElementById('deleteModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('deleteModal').style.display = 'none';
}

// Close modal when clicking outside
document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeModal();
    }
});
</script>
@endsection