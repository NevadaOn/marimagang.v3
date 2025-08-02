<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserSearchController extends Controller
{
    public function byNIM(Request $request)
    {
        $request->validate(['nim' => 'required|string']);

        $user = User::where('nim', $request->nim)->first();

        if (!$user) {
            return response()->json(['message' => 'User tidak ditemukan'], 404);
        }

        return response()->json([
            'id' => $user->id,
            'nama' => $user->name,
            'nim' => $user->nim,
            'email' => $user->email,
        ]);
    }
}
