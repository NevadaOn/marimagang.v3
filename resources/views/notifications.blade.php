@extends('layouts.user.app')
@section('title', 'Notifikasi')

@section('content')
    <div class="min-vh-100 bg-light py-4">

        <div class="container" style="max-width: 900px;">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="h2 fw-bold text-dark mb-1">Notifikasi</h1>
                    <p class="text-muted small mb-0">Kelola dan pantau notifikasi terbaru Anda.</p>
                </div>
                <span class="badge bg-primary rounded-pill px-3 py-2">
                    {{ $notifications->count() }} {{ Str::plural('Notifikasi', $notifications->count()) }}
                </span>
            </div>

            @if($notifications->isEmpty())
                <div class="card border-2 border-dashed">
                    <div class="card-body text-center py-5">
                        <svg class="mb-3 text-muted" width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
                        </svg>
                        <h4 class="card-title text-dark mb-2">Tidak ada notifikasi</h4>
                        <p class="card-text text-muted small">Anda akan melihat notifikasi di sini jika ada aktivitas baru.</p>
                    </div>
                </div>
            @else
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <button type="button" id="mark-read-all-btn"
                        class="btn btn-warning btn-sm d-inline-flex align-items-center gap-2">
                        <i class="ph ph-check-circle"></i> Tandai Semua Sudah Dibaca
                    </button>


                    <!-- <button type="button" id="btn-delete-all"
                                class="btn btn-danger btn-sm d-inline-flex align-items-center gap-2">
                                <i class="ph ph-trash"></i> Hapus Semua
                            </button> -->
                </div>

                <div class="d-flex flex-column gap-3">
                    @foreach ($notifications as $notification)
                        <div
                            class="card border {{ $notification->is_read ? 'bg-white opacity-75' : 'bg-primary bg-opacity-10 border-primary border-opacity-25' }}">
                            <div class="card-body d-flex justify-content-between align-items-start gap-3">
                                <div class="d-flex gap-3 flex-grow-1">
                                    <div class="pt-1">
                                        <div class="rounded-circle {{ $notification->is_read ? 'bg-secondary' : 'bg-primary' }}"
                                            style="width: 10px; height: 10px;"></div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="card-title mb-1 {{ $notification->is_read ? 'text-muted' : 'text-dark' }}">
                                            {{ $notification->title }}
                                        </h5>
                                        <p class="card-text small mb-0 {{ $notification->is_read ? 'text-muted' : 'text-body' }}">
                                            {{ $notification->message }}
                                        </p>
                                    </div>
                                </div>
                                <div class="text-muted text-end" style="font-size: 0.75rem;">
                                    {{ $notification->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>

    @push('scripts')
        <script>

            document.addEventListener('DOMContentLoaded', function () {
                const btn = document.getElementById('mark-read-all-btn');

                btn?.addEventListener('click', async () => {
                    const confirmed = confirm('Tandai semua notifikasi sebagai sudah dibaca?');
                    if (!confirmed) return;

                    try {
                        const response = await fetch("{{ route('notifications.readAll') }}", {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({})
                        });

                        if (response.ok) {
                            document.querySelectorAll('.card').forEach(card => {
                                card.classList.remove('bg-primary', 'bg-opacity-10', 'border-primary', 'border-opacity-25');
                                card.classList.add('bg-white', 'opacity-75');

                                const dot = card.querySelector('.rounded-circle');
                                if (dot) {
                                    dot.classList.remove('bg-primary');
                                    dot.classList.add('bg-secondary');
                                }

                                const title = card.querySelector('.card-title');
                                const text = card.querySelector('.card-text');
                                if (title) title.classList.remove('text-dark');
                                if (title) title.classList.add('text-muted');
                                if (text) text.classList.remove('text-body');
                                if (text) text.classList.add('text-muted');
                            });

                             // update bell icon dan badge
                            document.getElementById('notif-badge')?.remove();
                            document.getElementById('notif-bell-btn')?.classList.remove('shaking-animation');

                            console.log('Semua notifikasi ditandai sebagai sudah dibaca.');
                        } else {
                            console.log('Gagal menandai notifikasi.');
                        }
                    } catch (error) {
                        console.error(error);
                        console.log('Terjadi kesalahan saat menandai notifikasi.');
                    }
                });
            });

            
        </script>
    @endpush


    <style>
        .btn-warning {
            background-color: #f59e0b;
            border-color: #f59e0b;
            color: white;
        }

        .btn-warning:hover {
            background-color: #d97706;
            border-color: #d97706;
            color: white;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background-color: #bb2d3b;
            border-color: #bb2d3b;
        }

        .opacity-75 {
            opacity: 0.75;
        }

        .bg-primary.bg-opacity-10 {
            background-color: rgba(13, 110, 253, 0.1) !important;
        }

        .border-primary.border-opacity-25 {
            border-color: rgba(13, 110, 253, 0.25) !important;
        }
    </style>
@endsection