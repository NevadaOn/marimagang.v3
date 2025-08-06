<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Skill;
use App\Models\UserSkill;
use App\Models\Universitas;
use App\Models\User;
use App\Services\NotificationService;

class ProfileController extends Controller
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function edit(Request $request)
    {
        $user = Auth::user();

        // Ambil semua skill milik user dengan relasi
        $userSkills = UserSkill::with('skill')
            ->where('user_id', $user->id)
            ->get();

        // Cek jika ada parameter `skill` di URL untuk editing
        $editingSkill = null;
        if ($request->has('skill')) {
            $editingSkill = UserSkill::with('skill')
                ->where('user_id', $user->id)
                ->find($request->skill);
        }

        return view('profile.edit', compact('user', 'userSkills', 'editingSkill'));
    }

    /**
     * Update Profile Data Only
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'nama' => 'required|string|max:100',
            'nim' => 'nullable|string|max:20|unique:users,nim,' . $user->id,
            'telepon' => 'nullable|string|max:15|unique:users,telepon,' . $user->id,
            'nama_universitas' => 'required|string|max:255',
            'fakultas' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'nullable|string|max:1000',
            'alamat' => 'nullable|string|max:500',
        ]);

        DB::beginTransaction();
        try {
            // Handle universitas
            $universitas = Universitas::firstOrCreate([
                'nama_universitas' => $request->nama_universitas,
                'fakultas' => $request->fakultas,
                'prodi' => $request->prodi,
            ]);

            // Handle foto upload
            $fotoPath = $user->foto;
            if ($request->hasFile('foto')) {
                // Delete old photo
                if ($fotoPath && Storage::disk('public')->exists($fotoPath)) {
                    Storage::disk('public')->delete($fotoPath);
                }
                $fotoPath = $request->file('foto')->store('foto_user', 'public');
            }

            $isFirstTime = is_null($user->profile_completed_at);
            
            $user->update([
                'nama' => $request->nama,
                'nim' => $request->nim,
                'telepon' => $request->telepon,
                'universitas_id' => $universitas->id,
                'foto' => $fotoPath,
                'bio' => $request->bio,
                'alamat' => $request->alamat,
                'profile_completed_at' => $isFirstTime ? now() : $user->profile_completed_at,
            ]);

            // Send notification for first time profile completion
            if ($isFirstTime) {
                $this->sendProfileCompletionNotification($user);
            }

            DB::commit();
            return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui.');
            
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('profile.edit')->with('error', 'Gagal memperbarui profil: ' . $e->getMessage());
        }
    }

    /**
     * Add New Skill dengan Project (menggunakan struktur existing)
     */
    public function storeSkill(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama_skill' => 'required|string|max:100',
            'level' => 'required|string|in:Pemula,Menengah,Mahir,Ahli',
            'sertifikat' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            // Project data (akan disimpan di Skill model sesuai struktur existing)
            'judul_proyek' => 'nullable|string|max:255',
            'deskripsi_proyek' => 'nullable|string|max:1000',
            'link_project' => 'nullable|url|max:500',
            'file_project' => 'nullable|file|mimes:jpg,jpeg,png,pdf,zip,rar|max:10240',
        ]);

        DB::beginTransaction();
        try {
            $skillData = [
                'nama' => $request->nama_skill,
                'deskripsi' => $request->deskripsi_proyek,
                'judul_proyek' => $request->judul_proyek,
                'link_project' => $request->link_project,
            ];

            if ($request->hasFile('file_project')) {
                $skillData['file_path'] = $request->file('file_project')->store('projects', 'public');
            }

            $skill = Skill::create($skillData);

            $existingUserSkill = UserSkill::whereHas('skill', function($query) use ($request) {
                $query->where('nama', $request->nama_skill);
            })->where('user_id', $user->id)->first();

            if ($existingUserSkill) {
                DB::rollback();
                return redirect()->route('profile.edit')
                    ->with('error', 'Anda sudah memiliki skill dengan nama tersebut');
            }

            $sertifikatPath = null;
            if ($request->hasFile('sertifikat')) {
                $sertifikatPath = $request->file('sertifikat')->store('sertifikat', 'public');
            }

            $userSkill = UserSkill::create([
                'user_id' => $user->id,
                'skill_id' => $skill->id,
                'level' => $request->level,
                'sertifikat_path' => $sertifikatPath,
                'pengajuan_id' => null,
            ]);

            $this->notificationService->skillAdded($user->id, $skill->nama);

            DB::commit();
            return redirect()->route('profile.edit')->with('success', 'Skill berhasil ditambahkan.');
            
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('profile.edit')->with('error', 'Gagal menambahkan skill: ' . $e->getMessage());
        }
    }

    /**
     * Update Existing Skill
     */
    public function updateSkill(Request $request, $userSkillId)
    {
        $user = Auth::user();
        
        $userSkill = UserSkill::where('id', $userSkillId)
            ->where('user_id', $user->id)
            ->with('skill')
            ->first();

        if (!$userSkill) {
            return redirect()->route('profile.edit')->with('error', 'Skill tidak ditemukan.');
        }

        $request->validate([
            'level' => 'required|string|in:Pemula,Menengah,Mahir,Ahli',
            'sertifikat' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'judul_proyek' => 'nullable|string|max:255',
            'deskripsi_proyek' => 'nullable|string|max:1000',
            'link_project' => 'nullable|url|max:500',
            'file_project' => 'nullable|file|mimes:jpg,jpeg,png,pdf,zip,rar|max:10240',
        ]);

        DB::beginTransaction();
        try {
            $sertifikatPath = $userSkill->sertifikat_path;
            if ($request->hasFile('sertifikat')) {
                if ($sertifikatPath && Storage::disk('public')->exists($sertifikatPath)) {
                    Storage::disk('public')->delete($sertifikatPath);
                }
                $sertifikatPath = $request->file('sertifikat')->store('sertifikat', 'public');
            }

            $userSkill->update([
                'level' => $request->level,
                'sertifikat_path' => $sertifikatPath,
            ]);

            $skill = $userSkill->skill;
            
            $projectFilePath = $skill->file_path;
            if ($request->hasFile('file_project')) {
                // Delete old project file
                if ($projectFilePath && Storage::disk('public')->exists($projectFilePath)) {
                    Storage::disk('public')->delete($projectFilePath);
                }
                $projectFilePath = $request->file('file_project')->store('projects', 'public');
            }

            // Update skill dengan project data
            $skill->update([
                'judul_proyek' => $request->judul_proyek,
                'deskripsi' => $request->deskripsi_proyek,
                'link_project' => $request->link_project,
                'file_path' => $projectFilePath,
            ]);

            DB::commit();
            return redirect()->route('profile.edit')->with('success', 'Skill berhasil diperbarui.');
            
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('profile.edit')->with('error', 'Gagal memperbarui skill: ' . $e->getMessage());
        }
    }

    /**
     * Delete User Skill
     */
    public function destroySkill($userSkillId)
    {
        $user = Auth::user();
        
        $userSkill = UserSkill::where('id', $userSkillId)
            ->where('user_id', $user->id)
            ->with('skill')
            ->first();

        if (!$userSkill) {
            return redirect()->route('profile.edit')->with('error', 'Skill tidak ditemukan.');
        }

        DB::beginTransaction();
        try {
            $skill = $userSkill->skill;
            $skillName = $skill->nama;

            if ($userSkill->sertifikat_path && Storage::disk('public')->exists($userSkill->sertifikat_path)) {
                Storage::disk('public')->delete($userSkill->sertifikat_path);
            }

            $otherUsers = UserSkill::where('skill_id', $skill->id)
                ->where('id', '!=', $userSkill->id)
                ->count();

            $userSkill->delete();

            if ($otherUsers == 0) {
                // Delete project file
                if ($skill->file_path && Storage::disk('public')->exists($skill->file_path)) {
                    Storage::disk('public')->delete($skill->file_path);
                }
                $skill->delete();
            } else {
                $skill->update([
                    'judul_proyek' => null,
                    'deskripsi' => null,
                    'link_project' => null,
                    'file_path' => null,
                ]);
            }

            DB::commit();
            return redirect()->route('profile.edit')->with('success', 'Skill "' . $skillName . '" berhasil dihapus.');
            
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('profile.edit')->with('error', 'Gagal menghapus skill: ' . $e->getMessage());
        }
    }

    /**
     * Delete Project from Skill (sesuai struktur existing)
     */
    public function destroyProject($userSkillId)
    {
        $user = Auth::user();
        
        $userSkill = UserSkill::where('id', $userSkillId)
            ->where('user_id', $user->id)
            ->with('skill')
            ->first();

        if (!$userSkill) {
            return redirect()->route('profile.edit')->with('error', 'Skill tidak ditemukan.');
        }

        $skill = $userSkill->skill;

        if (!$skill->judul_proyek) {
            return redirect()->route('profile.edit')->with('error', 'Project tidak ditemukan.');
        }

        DB::beginTransaction();
        try {
            // Delete project file if exists
            if ($skill->file_path && Storage::disk('public')->exists($skill->file_path)) {
                Storage::disk('public')->delete($skill->file_path);
            }

            // Clear project data dari skill
            $skill->update([
                'judul_proyek' => null,
                'deskripsi' => null,
                'link_project' => null,
                'file_path' => null,
            ]);

            DB::commit();
            return redirect()->route('profile.edit')->with('success', 'Project berhasil dihapus.');
            
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('profile.edit')->with('error', 'Gagal menghapus project: ' . $e->getMessage());
        }
    }

    /**
     * Search User by NIM
     */
    public function searchByNIM(Request $request)
    {
        $request->validate([
            'nim' => 'required|string'
        ]);

        $user = User::where('nim', $request->nim)->first();

        if (!$user || !$user->nim || !$user->universitas_id) {
            return response()->json(['message' => 'User tidak ditemukan atau belum melengkapi profil'], 404);
        }

        return response()->json([
            'id' => $user->id,
            'nama' => $user->nama,
            'nim' => $user->nim,
            'email' => $user->email,
            'foto' => $user->foto ? asset('storage/' . $user->foto) : asset('img/default-profile.png'),
            'prodi' => optional($user->universitas)->prodi ?? '-',
        ]);
    }

    /**
     * Send profile completion notification (avoid duplicates)
     */
    private function sendProfileCompletionNotification($user)
    {
        $alreadyNotified = \App\Models\Notification::where('user_id', $user->id)
            ->where('type', \App\Services\NotificationService::TYPE_PROFILE_UPDATE)
            ->where('title', 'Profil Berhasil Dibuat')
            ->exists();
            
        if (!$alreadyNotified) {
            $this->notificationService->profileUpdated($user->id, true);
        }
    }
}