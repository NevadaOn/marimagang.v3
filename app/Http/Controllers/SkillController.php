<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Skill;
use App\Models\UserSkill;
use App\Services\NotificationService;


class SkillController extends Controller
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function edit()
    {
        $user = Auth::user();

        $userSkills = UserSkill::with('skill')
            ->where('user_id', $user->id)
            ->get();

        return view('skills.edit', compact('userSkills', 'user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'skills.*.nama' => 'required|string|max:100',
            'skills.*.level' => 'nullable|string|max:50',
            'skills.*.sertifikat' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',

            'projects.*.target_skill_id' => 'nullable|exists:skill,id',
            'projects.*.judul_proyek' => 'nullable|string|max:255',
            'projects.*.deskripsi' => 'nullable|string',
            'projects.*.link_project' => 'nullable|string|max:500',
            'projects.*.file_path' => 'nullable|file|mimes:jpg,jpeg,png,pdf,zip,rar|max:2048',

            'new_skill.nama' => 'nullable|string|max:100',
            'new_skill.level' => 'nullable|string|max:50',
            'new_skill.sertifikat' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',

            'new_project.judul_proyek' => 'nullable|string|max:255',
            'new_project.deskripsi' => 'nullable|string',
            'new_project.link_project' => 'nullable|string|max:500',
            'new_project.file_path' => 'nullable|file|mimes:jpg,jpeg,png,pdf,zip,rar|max:2048',
        ]);

        if ($request->has('skills')) {
            foreach ($request->skills as $data) {
                if (!empty($data['nama'])) {
                    $skill = Skill::firstOrCreate(['nama' => $data['nama']]);

                    $sertifikatPath = null;
                    if (isset($data['sertifikat']) && $data['sertifikat']) {
                        // Hapus sertifikat lama jika ada
                        $existingUserSkill = UserSkill::where('user_id', $user->id)
                            ->where('skill_id', $skill->id)
                            ->first();
                        
                        if ($existingUserSkill && $existingUserSkill->sertifikat_path) {
                            Storage::disk('public')->delete($existingUserSkill->sertifikat_path);
                        }
                        
                        $sertifikatPath = $data['sertifikat']->store('sertifikat', 'public');
                    }

                    UserSkill::updateOrCreate(
                        ['user_id' => $user->id, 'skill_id' => $skill->id],
                        [
                            'level' => $data['level'] ?? 'Dasar',
                            'sertifikat_path' => $sertifikatPath ?? $user->userSkills()
                                ->where('skill_id', $skill->id)->value('sertifikat_path'),
                        ]
                    );
                }
            }
        }

        if ($request->has('projects')) {
            foreach ($request->projects as $projectData) {
                if (!empty($projectData['target_skill_id']) && !empty($projectData['judul_proyek'])) {
                    $skill = Skill::find($projectData['target_skill_id']);
                    
                    if ($skill) {
                        // Validasi dan perbaiki URL
                        $linkProject = $projectData['link_project'] ?? null;
                        if ($linkProject && !filter_var($linkProject, FILTER_VALIDATE_URL)) {
                            if (!preg_match('/^https?:\/\//', $linkProject)) {
                                $linkProject = 'https://' . $linkProject;
                            }
                            
                            if (!filter_var($linkProject, FILTER_VALIDATE_URL)) {
                                return redirect()->route('skills.edit')
                                    ->with('error', 'Format link project tidak valid untuk: ' . $projectData['judul_proyek']);
                            }
                        }

                        // Update project data
                        $skill->judul_proyek = $projectData['judul_proyek'];
                        $skill->deskripsi = $projectData['deskripsi'] ?? null;
                        $skill->link_project = $linkProject;

                        if (isset($projectData['file_path']) && $projectData['file_path']) {
                            if ($skill->file_path && Storage::disk('public')->exists($skill->file_path)) {
                                Storage::disk('public')->delete($skill->file_path);
                            }
                            $skill->file_path = $projectData['file_path']->store('projects', 'public');
                        }

                        $skill->save();
                    }
                }
            }
        }

        $newSkill = null;
        if (!empty($request->new_skill['nama'])) {
            $newSkill = Skill::firstOrCreate(['nama' => $request->new_skill['nama']]);

            $sertifikatPath = null;
            if ($request->hasFile('new_skill.sertifikat')) {
                $sertifikatPath = $request->file('new_skill.sertifikat')->store('sertifikat', 'public');
            }

            UserSkill::create([
                'user_id' => $user->id,
                'skill_id' => $newSkill->id,
                'level' => $request->new_skill['level'] ?? 'Dasar',
                'sertifikat_path' => $sertifikatPath,
            ]);
                               $this->notificationService->skillAdded($user->id, $newSkill->nama);

            if (!empty($request->new_project['judul_proyek'])) {
                $linkProject = $request->new_project['link_project'] ?? null;
                if ($linkProject && !filter_var($linkProject, FILTER_VALIDATE_URL)) {
                    if (!preg_match('/^https?:\/\//', $linkProject)) {
                        $linkProject = 'https://' . $linkProject;
                    }
                    
                    if (!filter_var($linkProject, FILTER_VALIDATE_URL)) {
                        return redirect()->route('skills.edit')
                            ->with('error', 'Format link project tidak valid untuk: ' . $request->new_project['judul_proyek']);
                    }
                }

                $newSkill->judul_proyek = $request->new_project['judul_proyek'];
                $newSkill->deskripsi = $request->new_project['deskripsi'] ?? null;
                $newSkill->link_project = $linkProject;

                if ($request->hasFile('new_project.file_path')) {
                    $newSkill->file_path = $request->file('new_project.file_path')->store('projects', 'public');
                }

                $newSkill->save();
            }
        }

        return redirect()->route('skills.edit')->with('success', 'Data keahlian dan proyek berhasil diperbarui.');
    }

    public function destroy($userSkillId)
    {
        $user = Auth::user();
        
        $userSkill = UserSkill::where('id', $userSkillId)
            ->where('user_id', $user->id)
            ->with('skill')
            ->first();

        if (!$userSkill) {
            return redirect()->route('skills.edit')->with('error', 'Skill tidak ditemukan.');
        }

        $skill = $userSkill->skill;

        if ($userSkill->sertifikat_path && Storage::disk('public')->exists($userSkill->sertifikat_path)) {
            Storage::disk('public')->delete($userSkill->sertifikat_path);
        }

        $otherUsers = UserSkill::where('skill_id', $skill->id)
            ->where('id', '!=', $userSkill->id)
            ->count();

        if ($otherUsers == 0) {
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

        // Hapus UserSkill
        $userSkill->delete();

        return redirect()->route('skills.edit')->with('success', 'Skill berhasil dihapus.');
    }

    public function destroyProject($skillId)
    {
        $user = Auth::user();
        
        $skill = Skill::find($skillId);
        
        if (!$skill) {
            return redirect()->route('skills.edit')->with('error', 'Skill tidak ditemukan.');
        }
        
        $userSkill = UserSkill::where('user_id', $user->id)
            ->where('skill_id', $skill->id)
            ->first();

        if (!$userSkill) {
            return redirect()->route('skills.edit')->with('error', 'Anda tidak memiliki akses untuk menghapus project ini.');
        }

        if (!$skill->judul_proyek) {
            return redirect()->route('skills.edit')->with('error', 'Project tidak ditemukan.');
        }

        if ($skill->file_path && Storage::disk('public')->exists($skill->file_path)) {
            Storage::disk('public')->delete($skill->file_path);
        }

        $skill->update([
            'judul_proyek' => null,
            'deskripsi' => null,
            'link_project' => null,
            'file_path' => null,
        ]);

        return redirect()->route('skills.edit')->with('success', 'Project berhasil dihapus.');
    }
}