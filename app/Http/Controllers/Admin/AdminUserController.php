<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::withCount('pengajuan')->latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::with(['pengajuan.databidang', 'userSkills.skill'])->findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $user = User::findOrFail($id);
        $user->status = $request->status;
        $user->save();

        return back()->with('success', 'Status pengguna diperbarui.');
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('admin.users.index')
                ->with('success', 'Pengguna berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                // Error karena user masih punya relasi di tabel lain
                return redirect()->route('admin.users.index')
                    ->with('error', 'Pengguna tidak dapat dihapus karena masih memiliki data terkait, seperti pengajuan magang. 
                    Hapus pengajuan terlebih dahulu sebelum menghapus pengguna.');
            }

            // Error umum lainnya
            return redirect()->route('admin.users.index')
                ->with('error', 'Terjadi kesalahan saat menghapus pengguna.');
        }
    }

}
