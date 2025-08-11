@extends('layouts.superadmin')

@section('title', 'Chat Superadmin')

@section('content')
<div class="row">
    <div class="col-md-3 border-end">
        <h5 class="p-3">Daftar User</h5>
        <ul class="list-group">
            @foreach($users as $user)
                <li class="list-group-item d-flex justify-content-between align-items-center 
                    {{ isset($selectedUser) && $selectedUser->id === $user->id ? 'active' : '' }}">
                    <a href="{{ route('admin.chat.index', ['user_id' => $user->id]) }}" 
                       class="text-decoration-none text-dark w-100">
                        {{ $user->nama }}
                    </a>
                    @if($user->unread_count > 0)
                        <span class="badge bg-danger rounded-pill animate__animated animate__pulse">
                            {{ $user->unread_count }}
                        </span>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>

    <div class="col-md-9 d-flex flex-column" style="height: 80vh;">
        @if($selectedUser)
            <div class="border-bottom p-3">
                <h5>Chat dengan {{ $selectedUser->nama }}</h5>
            </div>
            <div id="chat-container" class="flex-grow-1 overflow-auto p-3" style="background: #f9f9f9;">
                @foreach($chats as $chat)
                    <div class="mb-2 d-flex {{ $chat->sender_id === auth()->id() ? 'justify-content-end' : 'justify-content-start' }}">
                        <div class="p-2 rounded" 
                             style="
                                max-width: 60%; 
                                background-color: {{ $chat->sender_id === auth()->id() ? ($chat->read_at ? '#cce5ff' : '#99ccff') : '#e9ecef' }};
                                color: {{ $chat->sender_id === auth()->id() ? '#004085' : '#212529' }};
                                position: relative;
                             ">
                            {{ $chat->message }}
                            <div class="small text-muted mt-1" style="font-size: 0.7rem;">
                                {{ $chat->created_at->format('d M Y, H:i') }}
                            </div>
                            @if($chat->sender_id === auth()->id())
                                <div class="small text-end mt-1" style="color: {{ $chat->read_at ? '#0d6efd' : '#6c757d' }};">
                                    {!! $chat->read_at 
                                        ? '&#10003;&#10003; Dibaca'  {{-- double checkmark --}}
                                        : '&#10003; Terkirim'         {{-- single checkmark --}}
                                    !!}
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="border-top p-3">
                <form action="{{ route('admin.chat.send') }}" method="POST" class="d-flex">
                    @csrf
                    <input type="hidden" name="receiver_id" value="{{ $selectedUser->id }}">
                    <input type="text" name="message" class="form-control me-2" placeholder="Ketik pesan..." required autofocus>
                    <button class="btn btn-primary" type="submit">Kirim</button>
                </form>
            </div>
        @else
            <div class="d-flex justify-content-center align-items-center h-100">
                <p>Pilih user untuk memulai chat</p>
            </div>
        @endif
    </div>
</div>

@push('styles')
<style>
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.15); }
        100% { transform: scale(1); }
    }
    .animate__pulse {
        animation: pulse 1.5s infinite;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const chatContainer = document.getElementById('chat-container');
        if (chatContainer) {
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }
    });
</script>
@endpush

@endsection
