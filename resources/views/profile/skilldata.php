<!-- FORM 1: PROFILE DATA -->
<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="profile-section">
        <input name="nama" value="{{ $user->nama }}" required>
        <input name="nim" value="{{ $user->nim }}">
        <input name="telepon" value="{{ $user->telepon }}">
        <!-- dst untuk field profile lainnya -->
        
        <button type="submit" class="btn-update-profile">Update Profile</button>
    </div>
</form>

<!-- FORM 2: SKILLS DATA -->
<form action="{{ route('skills.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="skills-section">
        @foreach($userSkills as $userSkill)
            <input name="skills[{{ $loop->index }}][nama]" value="{{ $userSkill->skill->nama }}">
            <input name="skills[{{ $loop->index }}][level]" value="{{ $userSkill->level }}">
            <!-- dst untuk field skills -->
        @endforeach
        
        <!-- Form untuk new skill -->
        <input name="new_skill[nama]" placeholder="Skill baru">
        <input name="new_skill[level]" placeholder="Level">
        
        <button type="submit" class="btn-update-skills">Update Skills</button>
    </div>
</form>