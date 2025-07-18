<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

public function update(Request $request)
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
    ]);

    $universitas = Universitas::firstOrCreate([
        'nama_universitas' => $request->nama_universitas,
        'fakultas' => $request->fakultas,
        'prodi' => $request->prodi,
    ]);

    $path = $user->foto;
    if ($request->hasFile('foto')) {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
        $path = $request->file('foto')->store('foto_user', 'public');
    }

    $isFirstTime = is_null($user->profile_completed_at);

    $user->update([
        'nama' => $request->nama,
        'nim' => $request->nim,
        'telepon' => $request->telepon,
        'universitas_id' => $universitas->id,
        'foto' => $path,
        'profile_completed_at' => $isFirstTime ? now() : $user->profile_completed_at,
    ]);

    if ($isFirstTime) {
        $alreadyNotified = \App\Models\Notification::where('user_id', $user->id)
            ->where('type', \App\Services\NotificationService::TYPE_PROFILE_UPDATE)
            ->where('title', 'Profil Berhasil Dibuat')
            ->exists();

        if (!$alreadyNotified) {
            $this->notificationService->profileUpdated($user->id, $isFirstTime);
        }
    }

    return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui.');
}


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
}
