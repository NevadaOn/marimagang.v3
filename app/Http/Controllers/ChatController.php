<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
public function index()
{
    $superadmin = \App\Models\Admin::where('role', 'superadmin')->first();

    $chats = Chat::where(function ($query) {
            $query->where('sender_id', auth()->id())
                  ->where('sender_type', get_class(auth()->user()));
        })
        ->orWhere(function ($query) {
            $query->where('receiver_id', auth()->id())
                  ->where('receiver_type', get_class(auth()->user()));
        })
        ->with(['sender', 'receiver'])
        ->orderBy('created_at', 'asc')
        ->get();

    return view('chat.index', compact('chats', 'superadmin'));
}

public function send(Request $request)
{
    $request->validate([
        'message' => 'required|string',
    ]);

    $superadmin = \App\Models\Admin::where('role', 'superadmin')->first();
    if (!$superadmin) {
        return back()->withErrors(['message' => 'Superadmin tidak ditemukan.']);
    }

    Chat::create([
        'sender_id'    => auth()->id(),
        'sender_type'  => get_class(auth()->user()),
        'receiver_id'  => $superadmin->id,
        'receiver_type'=> \App\Models\Admin::class,
        'message'      => $request->message,
    ]);

    return back();
}
}
