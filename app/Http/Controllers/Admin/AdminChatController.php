<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;


class AdminChatController extends Controller
{
    public function index(Request $request)
    {
        if (auth()->user()->role !== 'superadmin') {
            abort(403, 'Akses ditolak');
        }

        $users = User::withCount([
            'sentChats as unread_count' => function ($q) {
                $q->where('receiver_id', auth()->id())
                  ->where('receiver_type', \App\Models\Admin::class)
                  ->whereNull('read_at');
            }
        ])->get();

        $selectedUser = null;
        $chats = collect();

        if ($request->has('user_id')) {
            $selectedUser = User::findOrFail($request->user_id);

            $chats = Chat::where(function ($q) use ($request) {
                    $q->where('sender_id', $request->user_id)
                      ->where('sender_type', \App\Models\User::class)
                      ->where('receiver_id', auth()->id())
                      ->where('receiver_type', \App\Models\Admin::class);
                })
                ->orWhere(function ($q) use ($request) {
                    $q->where('sender_id', auth()->id())
                      ->where('sender_type', \App\Models\Admin::class)
                      ->where('receiver_id', $request->user_id)
                      ->where('receiver_type', \App\Models\User::class);
                })
                ->with(['sender', 'receiver'])
                ->orderBy('created_at', 'asc')
                ->get();

            Chat::where('sender_id', $request->user_id)
                ->where('sender_type', \App\Models\User::class)
                ->where('receiver_id', auth()->id())
                ->where('receiver_type', \App\Models\Admin::class)
                ->whereNull('read_at')
                ->update(['read_at' => now()]);
        }

        return view('admin.chat.index', compact('users', 'chats', 'selectedUser'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        Chat::create([
            'sender_id' => auth()->id(),
            'sender_type' => \App\Models\Admin::class,
            'receiver_id' => $request->receiver_id,
            'receiver_type' => \App\Models\User::class,
            'message' => $request->message,
        ]);

        return back();
    }

}
