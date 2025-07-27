@extends('layouts.app')

@section('content')
<div>
    <h1>Kelola Keahlian & Proyek</h1>

    @if(session('success'))
        <div style="color: green; background: #e8f5e8; padding: 10px; margin: 10px 0;">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div style="color: red; background: #f5e8e8; padding: 10px; margin: 10px 0;">{{ session('error') }}</div>
    @endif

    <form action="{{ route('skills.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <h3>Keahlian Anda</h3>
        
        @forelse ($userSkills as $index => $userSkill)
            <div style="border: 1px solid #ddd; padding: 20px; margin: 20px 0;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h4>Skill #{{ $index + 1 }}</h4>
                    <button type="button" onclick="deleteSkill({{ $userSkill->id }}, '{{ $userSkill->skill->nama }}')">
                        Hapus Skill
                    </button>
                </div>

                <div>
                    <label>Nama Skill:</label><br>
                    <input type="text" name="skills[{{ $index }}][nama]" 
                           value="{{ old("skills.$index.nama", $userSkill->skill->nama) }}" required>
                </div>

                <div>
                    <label>Tingkat Keahlian:</label><br>
                    <select name="skills[{{ $index }}][level]">
                        <option value="Dasar" {{ $userSkill->level == 'Dasar' ? 'selected' : '' }}>Dasar</option>
                        <option value="Menengah" {{ $userSkill->level == 'Menengah' ? 'selected' : '' }}>Menengah</option>
                        <option value="Lanjutan" {{ $userSkill->level == 'Lanjutan' ? 'selected' : '' }}>Lanjutan</option>
                    </select>
                </div>

                <div>
                    <label>Upload Sertifikat (Opsional):</label><br>
                    @if ($userSkill->sertifikat_path)
                        <div>
                            <a href="{{ asset('storage/' . $userSkill->sertifikat_path) }}" target="_blank">
                                Lihat Sertifikat Saat Ini
                            </a>
                        </div>
                    @endif
                    <input type="file" name="skills[{{ $index }}][sertifikat]" accept="application/pdf,image/*">
                    <small>Upload file baru untuk mengganti sertifikat lama</small>
                </div>

                <hr>
                <h4>Proyek untuk {{ $userSkill->skill->nama }}</h4>
                
                @if($userSkill->skill->judul_proyek)
                    <div style="background: #f0f8ff; padding: 15px; margin: 10px 0;">
                        <div style="display: flex; justify-content: space-between;">
                            <div>
                                <strong>{{ $userSkill->skill->judul_proyek }}</strong>
                                <p>{{ $userSkill->skill->deskripsi ?? 'Tidak ada deskripsi' }}</p>
                                @if($userSkill->skill->link_project)
                                    <div>
                                        <a href="{{ $userSkill->skill->link_project }}" target="_blank">Lihat Project</a>
                                    </div>
                                @endif
                                @if($userSkill->skill->file_path)
                                    <div>
                                        <a href="{{ asset('storage/' . $userSkill->skill->file_path) }}" target="_blank">Download File</a>
                                    </div>
                                @endif
                            </div>
                            <button type="button" onclick="deleteProject({{ $userSkill->skill->id }}, '{{ $userSkill->skill->judul_proyek }}')">
                                Hapus Project
                            </button>
                        </div>
                    </div>
                @endif

                <div style="border: 1px solid #ccc; padding: 15px;">
                    <h5>{{ $userSkill->skill->judul_proyek ? 'Edit Project' : 'Tambah Project Baru' }}</h5>
                    
                    <input type="hidden" name="projects[{{ $index }}][target_skill_id]" value="{{ $userSkill->skill->id }}">
                    
                    <div>
                        <label>Judul Proyek:</label><br>
                        <input type="text" name="projects[{{ $index }}][judul_proyek]" 
                               value="{{ old("projects.$index.judul_proyek", $userSkill->skill->judul_proyek) }}"
                               placeholder="Masukkan judul proyek...">
                    </div>
                    
                    <div>
                        <label>Deskripsi:</label><br>
                        <textarea name="projects[{{ $index }}][deskripsi]" rows="3" 
                                  placeholder="Jelaskan tentang proyek ini...">{{ old("projects.$index.deskripsi", $userSkill->skill->deskripsi) }}</textarea>
                    </div>
                    
                    <div>
                        <label>Link Project (Opsional):</label><br>
                        <input type="text" name="projects[{{ $index }}][link_project]" 
                               value="{{ old("projects.$index.link_project", $userSkill->skill->link_project) }}"
                               placeholder="https://github.com/username/project">
                        <small>Contoh: GitHub, demo website, portfolio, dll.</small>
                    </div>
                    
                    <div>
                        <label>Upload File Project (Opsional):</label><br>
                        @if($userSkill->skill->file_path)
                            <div>
                                <small>File saat ini: {{ basename($userSkill->skill->file_path) }}</small>
                            </div>
                        @endif
                        <input type="file" name="projects[{{ $index }}][file_path]" 
                               accept="image/*,application/pdf,.zip,.rar">
                        <small>Format: gambar, PDF, ZIP, RAR (max 2MB)</small>
                    </div>
                </div>
            </div>
        @empty
            <div style="background: #fff3cd; padding: 15px; margin: 10px 0;">
                <h4>Belum ada skill yang ditambahkan</h4>
                <p>Mulai dengan menambahkan skill baru di bawah ini.</p>
            </div>
        @endforelse

        <hr>
        <div style="border: 1px solid #007bff; padding: 20px; margin: 20px 0;">
            <h3>Tambah Skill & Project Baru</h3>
            
            <div>
                <label>Nama Skill:</label><br>
                <input type="text" name="new_skill[nama]" 
                       placeholder="Contoh: JavaScript, PHP, Design Grafis...">
            </div>
            
            <div>
                <label>Tingkat Keahlian:</label><br>
                <select name="new_skill[level]">
                    <option value="Dasar">Dasar</option>
                    <option value="Menengah">Menengah</option>
                    <option value="Lanjutan">Lanjutan</option>
                </select>
            </div>
            
            <div>
                <label>Sertifikat (Opsional):</label><br>
                <input type="file" name="new_skill[sertifikat]" accept="application/pdf,image/*">
            </div>

            <h4>Project untuk Skill Baru (Opsional)</h4>
            <div style="background: #f8f9fa; padding: 15px;">
                <div>
                    <label>Judul Proyek:</label><br>
                    <input type="text" name="new_project[judul_proyek]" 
                           placeholder="Masukkan judul proyek...">
                </div>
                
                <div>
                    <label>Deskripsi:</label><br>
                    <textarea name="new_project[deskripsi]" rows="3" 
                              placeholder="Jelaskan tentang proyek ini..."></textarea>
                </div>
                
                <div>
                    <label>Link Project (Opsional):</label><br>
                    <input type="text" name="new_project[link_project]" 
                           placeholder="https://github.com/username/project">
                </div>
                
                <div>
                    <label>Upload File Project (Opsional):</label><br>
                    <input type="file" name="new_project[file_path]" 
                           accept="image/*,application/pdf,.zip,.rar">
                </div>
            </div>
        </div>

        <div style="text-align: center; margin: 30px 0;">
            <button type="submit" style="padding: 15px 30px; font-size: 16px;">
                Simpan Semua Perubahan
            </button>
        </div>
    </form>
</div>

<!-- Modal Konfirmasi Hapus -->
<div id="deleteModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000;">
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 30px; border-radius: 5px; min-width: 400px;">
        <h3>Konfirmasi Hapus</h3>
        <p id="deleteMessage"></p>
        <div style="margin-top: 20px;">
            <button type="button" onclick="closeModal()">Batal</button>
            <form id="deleteForm" method="POST" style="display: inline; margin-left: 10px;">
                @csrf
                @method('DELETE')
                <button type="submit" style="background: red; color: white;">Ya, Hapus</button>
            </form>
        </div>
    </div>
</div>

<script>
function deleteSkill(userSkillId, skillName) {
    document.getElementById('deleteMessage').innerHTML = 
        `Apakah Anda yakin ingin menghapus skill "<strong>${skillName}</strong>" beserta semua project yang terkait?`;
    document.getElementById('deleteForm').action = `/skills/${userSkillId}`;
    document.getElementById('deleteModal').style.display = 'block';
}

function deleteProject(skillId, projectTitle) {
    document.getElementById('deleteMessage').innerHTML = 
        `Apakah Anda yakin ingin menghapus project "<strong>${projectTitle}</strong>"?`;
    document.getElementById('deleteForm').action = `/skills/${skillId}/project`;
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
</script>
@endsection