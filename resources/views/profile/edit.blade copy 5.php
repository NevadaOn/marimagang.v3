<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile & Skills</title>
</head>
<body>
    
    <!-- Display Success/Error Messages -->
    @if(session('success'))
        <div style="color: green; border: 1px solid green; padding: 10px; margin: 10px 0;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="color: red; border: 1px solid red; padding: 10px; margin: 10px 0;">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div style="color: red; border: 1px solid red; padding: 10px; margin: 10px 0;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- ========== FORM 1: UPDATE PROFILE ========== -->
    <h2>Update Profile</h2>
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <td><label for="nama">Nama Lengkap:</label></td>
                <td>
                    <input type="text" id="nama" name="nama" value="{{ old('nama', $user->nama) }}" required>
                </td>
            </tr>
            <tr>
                <td><label for="nim">NIM:</label></td>
                <td>
                    <input type="text" id="nim" name="nim" value="{{ old('nim', $user->nim) }}">
                </td>
            </tr>
            <tr>
                <td><label for="telepon">Telepon:</label></td>
                <td>
                    <input type="text" id="telepon" name="telepon" value="{{ old('telepon', $user->telepon) }}">
                </td>
            </tr>
            <tr>
                <td><label for="nama_universitas">Nama Universitas:</label></td>
                <td>
                    <input type="text" id="nama_universitas" name="nama_universitas" 
                           value="{{ old('nama_universitas', optional($user->universitas)->nama_universitas) }}" required>
                </td>
            </tr>
            <tr>
                <td><label for="fakultas">Fakultas:</label></td>
                <td>
                    <input type="text" id="fakultas" name="fakultas" 
                           value="{{ old('fakultas', optional($user->universitas)->fakultas) }}" required>
                </td>
            </tr>
            <tr>
                <td><label for="prodi">Program Studi:</label></td>
                <td>
                    <input type="text" id="prodi" name="prodi" 
                           value="{{ old('prodi', optional($user->universitas)->prodi) }}" required>
                </td>
            </tr>
            <tr>
                <td><label for="foto">Foto Profile:</label></td>
                <td>
                    <input type="file" id="foto" name="foto" accept="image/*">
                    @if($user->foto)
                        <br><small>Current: <a href="{{ asset('storage/' . $user->foto) }}" target="_blank">View Current Photo</a></small>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="bio">Bio:</label></td>
                <td>
                    <textarea id="bio" name="bio" rows="4" cols="50">{{ old('bio', $user->bio) }}</textarea>
                </td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat:</label></td>
                <td>
                    <textarea id="alamat" name="alamat" rows="3" cols="50">{{ old('alamat', $user->alamat) }}</textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Update Profile">
                    <input type="reset" value="Reset Form">
                </td>
            </tr>
        </table>
    </form>

    <hr>

    <!-- ========== FORM 2: ADD NEW SKILL ========== -->
    <h2>Add New Skill</h2>
    <form action="{{ route('profile.skills.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <td><label for="nama_skill">Nama Skill:</label></td>
                <td>
                    <input type="text" id="nama_skill" name="nama_skill" value="{{ old('nama_skill') }}" required>
                </td>
            </tr>
            <tr>
                <td><label for="level">Level:</label></td>
                <td>
                    <select id="level" name="level" required>
                        <option value="">Pilih Level</option>
                        <option value="Pemula" {{ old('level') == 'Pemula' ? 'selected' : '' }}>Pemula</option>
                        <option value="Menengah" {{ old('level') == 'Menengah' ? 'selected' : '' }}>Menengah</option>
                        <option value="Mahir" {{ old('level') == 'Mahir' ? 'selected' : '' }}>Mahir</option>
                        <option value="Ahli" {{ old('level') == 'Ahli' ? 'selected' : '' }}>Ahli</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="sertifikat">Sertifikat (Optional):</label></td>
                <td>
                    <input type="file" id="sertifikat" name="sertifikat" accept=".pdf,.jpg,.jpeg,.png">
                </td>
            </tr>
            <tr>
                <td colspan="2"><strong>Project Information (Optional)</strong></td>
            </tr>
            <tr>
                <td><label for="judul_proyek">Judul Project:</label></td>
                <td>
                    <input type="text" id="judul_proyek" name="judul_proyek" value="{{ old('judul_proyek') }}">
                </td>
            </tr>
            <tr>
                <td><label for="deskripsi_proyek">Deskripsi Project:</label></td>
                <td>
                    <textarea id="deskripsi_proyek" name="deskripsi_proyek" rows="4" cols="50">{{ old('deskripsi_proyek') }}</textarea>
                </td>
            </tr>
            <tr>
                <td><label for="link_project">Link Project:</label></td>
                <td>
                    <input type="url" id="link_project" name="link_project" value="{{ old('link_project') }}" placeholder="https://example.com">
                </td>
            </tr>
            <tr>
                <td><label for="file_project">File Project:</label></td>
                <td>
                    <input type="file" id="file_project" name="file_project" accept=".jpg,.jpeg,.png,.pdf,.zip,.rar">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Add Skill">
                    <input type="reset" value="Reset Form">
                </td>
            </tr>
        </table>
    </form>

    <hr>

    <!-- ========== EXISTING SKILLS LIST ========== -->
    <h2>Your Skills</h2>
    
    @if($userSkills->count() > 0)
        <table border="1" cellpadding="5" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Skill Name</th>
                    <th>Level</th>
                    <th>Certificate</th>
                    <th>Project</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($userSkills as $index => $userSkill)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $userSkill->skill->nama }}</td>
                    <td>{{ $userSkill->level }}</td>
                    <td>
                        @if($userSkill->sertifikat_path)
                            <a href="{{ asset('storage/' . $userSkill->sertifikat_path) }}" target="_blank">View Certificate</a>
                        @else
                            <em>No Certificate</em>
                        @endif
                    </td>
                    <td>
                        @if($userSkill->skill->judul_proyek)
                            <strong>{{ $userSkill->skill->judul_proyek }}</strong><br>
                            @if($userSkill->skill->deskripsi)
                                <small>{{ Str::limit($userSkill->skill->deskripsi, 50) }}</small><br>
                            @endif
                            @if($userSkill->skill->link_project)
                                <a href="{{ $userSkill->skill->link_project }}" target="_blank">View Project</a><br>
                            @endif
                            @if($userSkill->skill->file_path)
                                <a href="{{ asset('storage/' . $userSkill->skill->file_path) }}" target="_blank">Download File</a>
                            @endif
                        @else
                            <em>No Project</em>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('profile.edit', ['skill' => $userSkill->id]) }}">Edit</a> |
                        @if($userSkill->skill->judul_proyek)
                            <form method="POST" action="{{ route('profile.projects.destroy', $userSkill->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete Project" onclick="return confirm('Delete this project?')">
                            </form> |
                        @endif
                        <form method="POST" action="{{ route('profile.skills.destroy', $userSkill->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete Skill" onclick="return confirm('Delete this skill completely?')">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p><em>You haven't added any skills yet.</em></p>
    @endif

    <!-- ========== EDIT SKILL FORM (appears when editing) ========== -->
    @if($editingSkill)
        <hr>
        <h2>Edit Skill: {{ $editingSkill->skill->nama }}</h2>
        <form action="{{ route('profile.skills.update', $editingSkill->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            
            <table border="1" cellpadding="5" cellspacing="0">
                <tr>
                    <td><label for="edit_level">Level:</label></td>
                    <td>
                        <select id="edit_level" name="level" required>
                            <option value="Pemula" {{ $editingSkill->level == 'Pemula' ? 'selected' : '' }}>Pemula</option>
                            <option value="Menengah" {{ $editingSkill->level == 'Menengah' ? 'selected' : '' }}>Menengah</option>
                            <option value="Mahir" {{ $editingSkill->level == 'Mahir' ? 'selected' : '' }}>Mahir</option>
                            <option value="Ahli" {{ $editingSkill->level == 'Ahli' ? 'selected' : '' }}>Ahli</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="edit_sertifikat">Update Sertifikat:</label></td>
                    <td>
                        <input type="file" id="edit_sertifikat" name="sertifikat" accept=".pdf,.jpg,.jpeg,.png">
                        @if($editingSkill->sertifikat_path)
                            <br><small>Current: <a href="{{ asset('storage/' . $editingSkill->sertifikat_path) }}" target="_blank">View Current Certificate</a></small>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><strong>Project Information</strong></td>
                </tr>
                <tr>
                    <td><label for="edit_judul_proyek">Judul Project:</label></td>
                    <td>
                        <input type="text" id="edit_judul_proyek" name="judul_proyek" 
                               value="{{ old('judul_proyek', $editingSkill->skill->judul_proyek) }}">
                    </td>
                </tr>
                <tr>
                    <td><label for="edit_deskripsi_proyek">Deskripsi Project:</label></td>
                    <td>
                        <textarea id="edit_deskripsi_proyek" name="deskripsi_proyek" rows="4" cols="50">{{ old('deskripsi_proyek', $editingSkill->skill->deskripsi) }}</textarea>
                    </td>
                </tr>
                <tr>
                    <td><label for="edit_link_project">Link Project:</label></td>
                    <td>
                        <input type="url" id="edit_link_project" name="link_project" 
                               value="{{ old('link_project', $editingSkill->skill->link_project) }}">
                    </td>
                </tr>
                <tr>
                    <td><label for="edit_file_project">Update File Project:</label></td>
                    <td>
                        <input type="file" id="edit_file_project" name="file_project" accept=".jpg,.jpeg,.png,.pdf,.zip,.rar">
                        @if($editingSkill->skill->file_path)
                            <br><small>Current: <a href="{{ asset('storage/' . $editingSkill->skill->file_path) }}" target="_blank">View Current File</a></small>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Update Skill">
                        <a href="{{ route('profile.edit') }}">Cancel</a>
                    </td>
                </tr>
            </table>
        </form>
    @endif

    <hr>
    <p><a href="{{ url('/') }}">Back to Home</a></p>

</body>
</html>