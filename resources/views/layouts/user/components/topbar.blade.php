<div class="top-navbar flex-between gap-16">

    <div class="flex-align gap-16">
        <!-- Toggle Button Start -->
        <button type="button" class="toggle-btn d-xl-none d-flex text-26 text-gray-500"><i
                class="ph ph-list"></i></button>
        <!-- Toggle Button End -->

        <form action="#" class="w-350 d-sm-block d-none">
            <div class="position-relative">
                <button type="submit" class="input-icon text-xl d-flex text-gray-100 pointer-event-none"><i
                        class="ph ph-magnifying-glass"></i></button>
                <input type="text"
                    class="form-control ps-40 h-40 border-transparent focus-border-main-600 bg-main-50 rounded-pill placeholder-15"
                    placeholder="Search...">
            </div>
        </form>
    </div>

    <div class="flex-align gap-16">
        <div class="flex-align gap-8">
            <!-- Notification Start -->
            <div class="dropdown">
                @php

                    $notifications = \App\Models\Notification::where('user_id', auth()->id())
                        ->latest()
                        ->take(5)
                        ->get();

                    $hasNew = $notifications->where('is_read', false)->isNotEmpty();
                @endphp

                <button
                    class="dropdown-btn {{ $hasNew ? 'shaking-animation' : '' }} text-gray-500 w-40 h-40 bg-main-50 hover-bg-main-100 transition-2 rounded-circle text-xl flex-center "
                    type="button" data-bs-toggle="dropdown" aria-expanded="false" id="notif-bell-btn">
                    <span class="position-relative">
                        <i class="ph ph-bell"></i>
                        @if ($hasNew)
                            <span class="alarm-notify position-absolute end-0" id="notif-badge"></span>
                        @endif
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu--lg border-0 bg-transparent p-0">
                    <div class="card border border-gray-100 rounded-12 box-shadow-custom p-0 overflow-hidden">
                        <div class="card-body p-0">
                            <div class="py-8 px-24 bg-main-600">
                                <div class="flex-between">
                                    <h5 class="text-xl fw-semibold text-white mb-0">Notifikasi</h5>
                                    <div class="flex-align gap-12">
                                        <button type="button"
                                            class="bg-white rounded-6 text-sm px-8 py-2 hover-text-primary-600">Baru</button>
                                        <button type="button" class="close-dropdown hover-scale-1 text-xl text-white"><i
                                                class="ph ph-x"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div class="p-24 max-h-270 overflow-y-auto scroll-sm">
                                @forelse ($notifications as $notif)
                                    <div
                                        class="d-flex align-items-start gap-12 mb-24 border-bottom border-gray-100 pb-24 justify-content-between">
                                        <div>
                                            <div class="flex-align gap-4 mb-2">
                                                <a href="{{ $notif->url ?? '#' }}"
                                                    class="fw-medium text-15 mb-0 text-gray-300 hover-text-main-600 text-line-2">
                                                    {{ $notif->title ?? 'Tidak ada judul' }}
                                                </a>
                                            </div>
                                            <p class="text-gray-900 text-sm mb-2">{{ $notif->message }}</p>
                                            <span class="text-gray-200 text-13">
                                                {{ \Carbon\Carbon::parse($notif->created_at)->diffForHumans() }}
                                            </span>
                                        </div>
                                        <button type="button" class="btn-delete-notif border-0 bg-transparent text-danger"
                                            data-id="{{ $notif->id }}">
                                            <i class="ph ph-trash text-lg"></i>
                                        </button>
                                    </div>

                                @empty
                                    <div class="text-center text-gray-300 py-3">Tidak ada notifikasi.</div>
                                @endforelse
                            </div>
                            <button type="button" id="btn-delete-all"
                                class="text-sm text-danger px-24 py-2 w-100 text-start border-top border-gray-100 hover-text-decoration-underline">
                                Hapus Semua Notifikasi
                            </button>



                            <a href="{{ route('notifications.user') }}"
                                class="py-13 px-24 fw-bold text-center d-block text-primary-600 border-top border-gray-100 hover-text-decoration-underline">
                                Lihat Semua
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Notification Start -->


        </div>


        <!-- User Profile Start -->
        <div class="dropdown">
            <button
                class="users arrow-down-icon border border-gray-200 rounded-pill p-4 d-inline-block pe-40 position-relative"
                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="position-relative">
                    @if (auth()->user()->foto)
                        <img src="{{ asset('storage/' . auth()->user()->foto) }}" alt="Foto Profil"
                            class="h-32 w-32 rounded-circle">
                    @else
                        {{ strtoupper(substr(auth()->user()->nama, 0, 2)) }}
                    @endif
                    <span
                        class="activation-badge w-8 h-8 position-absolute inset-block-end-0 inset-inline-end-0"></span>
                </span>
            </button>
            <div class="dropdown-menu dropdown-menu--lg border-0 bg-transparent p-0">
                <div class="card border border-gray-100 rounded-12 box-shadow-custom">
                    <div class="card-body">
                        <div class="flex-align gap-8 mb-20 pb-20 border-bottom border-gray-100">
                            @if (auth()->user()->foto)
                                <img src="{{ asset('storage/' . auth()->user()->foto) }}" alt="Foto Profil"
                                    class="w-54 h-54 rounded-circle">
                            @else
                                {{ strtoupper(substr(auth()->user()->nama, 0, 2)) }}
                            @endif
                            <div class="">
                                <h4 class="mb-0">{{ auth()->user()->nama }}</h4>
                                <p class="fw-medium text-13 text-gray-200">{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                        <ul class="max-h-270 overflow-y-auto scroll-sm pe-4">
                            <li class="mb-4">
                                <a href="{{ route('profile.edit') }}"
                                    class="py-12 text-15 px-20 hover-bg-gray-50 text-gray-300 rounded-8 flex-align gap-8 fw-medium text-15">
                                    <span class="text-2xl text-primary-600 d-flex"><i class="ph ph-gear"></i></span>
                                    <span class="text">Account Settings</span>
                                </a>
                            </li>
                            <li class="pt-8 border-top border-gray-100">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="py-12 text-15 px-20 hover-bg-danger-50 text-gray-300 hover-text-danger-600 rounded-8 flex-align gap-8 fw-medium text-15"
                                        style="background: none; border: none; width: 100%; text-align: left;">
                                        <span class="text-2xl text-danger-600 d-flex"><i
                                                class="ph ph-sign-out"></i></span>
                                        <span class="text">Log Out</span>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- User Profile Start -->

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const notifBtn = document.querySelector('.dropdown .dropdown-btn');

       

        // Hapus notifikasi satuan
        document.querySelectorAll('.btn-delete-notif').forEach(btn => {
            btn.addEventListener('click', async function () {
                const notifId = this.dataset.id;
                const confirmed = confirm('Yakin hapus notifikasi ini?');
                if (!confirmed) return;

                try {
                    const response = await fetch(`/notifications/${notifId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        }
                    });

                    if (response.ok) {
                        this.closest('.d-flex').remove();
                    }
                } catch (err) {
                    console.error('Gagal hapus notifikasi:', err);
                }
            });
        });
    });
    

</script>