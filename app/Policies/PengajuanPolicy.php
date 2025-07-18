<?php

namespace App\Policies;

use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PengajuanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Pengajuan $pengajuan): bool
    {
        return $pengajuan->user_id === $user->id
            || $pengajuan->anggota->contains('user_id', $user->id);
    }
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Pengajuan $pengajuan): bool
    {
        // Hanya ketua atau pemilik pengajuan yang boleh update
        if ($pengajuan->user_id === $user->id) {
            return true;
        }

        // Jika user adalah ketua dalam anggota
        return $pengajuan->anggota->where('user_id', $user->id)->first()?->role === 'ketua';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Pengajuan $pengajuan): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Pengajuan $pengajuan): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Pengajuan $pengajuan): bool
    {
        return false;
    }
}
