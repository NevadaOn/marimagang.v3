@extends('layouts.admin')

@section('title', 'Notifikasi Admin')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-semibold mb-6">Notifikasi Admin</h1>

    @if($notifications->isEmpty())
        <p class="text-gray-500">Belum ada notifikasi baru.</p>
    @else
        <div class="space-y-4">
            @foreach ($notifications as $notification)
                <div class="p-4 bg-white rounded shadow @if(!$notification->is_read) border-l-4 border-blue-600 @endif">
                    <div class="flex justify-between">
                        <div>
                            <h2 class="font-semibold">{{ $notification->title }}</h2>
                            <p class="text-sm text-gray-700">{{ $notification->message }}</p>
                        </div>
                        <div class="text-xs text-gray-400">
                            {{ $notification->created_at->format('d M Y, H:i') }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
