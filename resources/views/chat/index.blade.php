@extends('layouts.user.app')

@section('title', 'Chat dengan Superadmin')

@section('content')
<div class="container py-4">
    <h4 class="mb-3">Chat dengan Superadmin</h4>

    <div class="card">
        <div id="chat-container" class="card-body" style="max-height: 400px; overflow-y: auto;">
            @forelse($chats as $chat)
                @php
                    $isFromSuperadmin = $chat->sender_type === 'App\\Models\\Admin';
                @endphp

                <div class="d-flex mb-2" style="justify-content: {{ $isFromSuperadmin ? 'flex-start' : 'flex-end' }};">
                    <div class="chat-bubble {{ $isFromSuperadmin ? 'chat-superadmin' : 'chat-user' }}">
                        <strong class="d-block mb-1">
                            {{ $isFromSuperadmin ? (optional($chat->sender)->nama ?? 'Superadmin') : (optional($chat->sender)->nama ?? 'Anda') }}
                        </strong>
                        <div style="white-space: pre-wrap;">{{ $chat->message }}</div>
                        <small class="d-block mt-1 text-muted" style="font-size: 0.75rem;">
                            {{ $chat->created_at->format('d M Y H:i') }}
                        </small>
                    </div>
                </div>
            @empty
                <p class="text-muted">Belum ada pesan</p>
            @endforelse
        </div>

        <div class="card-footer">
            <form action="{{ route('chat.send') }}" method="POST">
                @csrf
                @if($superadmin)
                    <input type="hidden" name="receiver_id" value="{{ $superadmin->id }}">
                    <input type="hidden" name="receiver_type" value="App\Models\Admin">
                    <div class="input-group">
                        <input type="text" name="message" class="form-control" placeholder="Ketik pesan..." required>
                        <button class="btn btn-primary" type="submit">Kirim</button>
                    </div>
                @else
                    <p class="text-danger mb-0">Superadmin tidak ditemukan, tidak bisa mengirim pesan.</p>
                @endif
            </form>
        </div>
    </div>
</div>

<style>
.chat-bubble {
    max-width: 70%;
    padding: 10px 15px;
    border-radius: 15px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    word-wrap: break-word;
    position: relative;
}

.chat-superadmin {
    background-color: #e9ecef;
    color: #212529 !important;
    border: 1px solid #d6d8db;
}

.chat-user {
    background-color: #99ccff;
    color: #020e1b !important;
    border: 1px solid #99c2ff;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const chatContainer = document.getElementById('chat-container');
    if (chatContainer) {
        chatContainer.scrollTop = chatContainer.scrollHeight;
    }
});
</script>
@endsection
