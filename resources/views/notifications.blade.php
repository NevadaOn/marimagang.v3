@extends('layouts.app')

@section('title', 'Notifikasi')

@section('content')
<div class="container py-4">
    <h1 class="text-2xl font-semibold mb-4">Notifikasi Saya</h1>

    @if($notifications->isEmpty())
        <div class="text-gray-500">Tidak ada notifikasi saat ini.</div>
    @else
        <ul class="space-y-4">
            @foreach ($notifications as $notification)
                <li class="p-4 bg-white shadow rounded @if(!$notification->is_read) border-l-4 border-blue-500 @endif">
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="font-bold">{{ $notification->title }}</h2>
                            <p class="text-sm text-gray-600">{{ $notification->message }}</p>
                        </div>
                        <small class="text-xs text-gray-400 whitespace-nowrap">
                            {{ $notification->created_at->diffForHumans() }}
                        </small>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
