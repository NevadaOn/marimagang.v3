@extends('layouts.app')
@section('title', 'Notifikasi')
@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Notifikasi</h1>
                <p class="text-sm text-gray-500">Kelola dan pantau notifikasi terbaru Anda.</p>
            </div>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                {{ $notifications->count() }} {{ Str::plural('Notifikasi', $notifications->count()) }}
            </span>
        </div>

        <!-- Notifikasi Kosong -->
        @if($notifications->isEmpty())
        <div class="bg-white border border-dashed border-gray-200 p-10 text-center rounded-xl shadow-sm">
            <div class="mb-4">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z"/>
                </svg>
            </div>
            <h2 class="text-lg font-medium text-gray-800 mb-1">Tidak ada notifikasi</h2>
            <p class="text-sm text-gray-500">Anda akan melihat notifikasi di sini jika ada aktivitas baru.</p>
        </div>
        @else
        <!-- Daftar Notifikasi -->
        <div class="space-y-4">
            @foreach ($notifications as $notification)
            <div 
                class="notification-card border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition-all duration-200 {{ $notification->is_read ? 'opacity-80' : '' }}" 
                style="{{ !$notification->is_read ? 'background-color: #ebf4ff; border-color: #c3dafe;' : 'background-color: white;' }}"
            >
                <div class="p-5 flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
                    <!-- Kiri: Konten -->
                    <div class="flex gap-3 flex-1">
                        <div class="mt-1">
                            <div class="w-2.5 h-2.5 rounded-full {{ $notification->is_read ? 'bg-gray-300' : 'bg-blue-500' }}"></div>
                        </div>
                        <div>
                            <h3 class="text-base font-semibold leading-tight {{ $notification->is_read ? 'text-gray-700' : 'text-gray-900' }}">
                                {{ $notification->title }}
                            </h3>
                            <p class="text-sm mt-1 {{ $notification->is_read ? 'text-gray-500' : 'text-gray-700' }}">
                                {{ $notification->message }}
                            </p>
                        </div>
                    </div>
                    <!-- Kanan: Timestamp dan Aksi -->
                    <div class="flex flex-col items-end space-y-2 sm:space-y-1">
                        <div class="text-xs text-gray-500 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>{{ $notification->created_at->diffForHumans() }}</span>
                        </div>
                        @if(!$notification->is_read)
                        <form action="{{ route('notifications.read', $notification->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-xs text-blue-600 hover:underline">
                                Tandai dibaca
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Load More -->
        <div class="mt-8 text-center">
            <button class="inline-flex items-center gap-2 px-4 py-2 rounded-lg text-sm texborder border-gray-300t-gray-700 bg-white hover:bg-gray-50 transition">
                Muat lebih banyak
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>
        </div>
        @endif
    </div>
</div>

<style>
.notification-card {
    transition: all 0.2s ease-in-out;
}
.notification-card:hover {
    transform: translateY(-2px);
}
</style>
@endsection
