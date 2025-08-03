<div class="card">
    <div class="card-body">
        <div class="calendar">
            <div class="calendar__header">
                <button type="button" class="calendar__arrow left"><i class="ph ph-caret-left"></i></button>
                <p class="display h6 mb-0">""</p>
                <button type="button" class="calendar__arrow right"><i class="ph ph-caret-right"></i></button>
            </div>

            <div class="calendar__week week">
                @foreach(['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'] as $day)
                    <div class="calendar__week-text">{{ $day }}</div>
                @endforeach
            </div>
            <div class="days"></div>
        </div>

        @php
            use App\Models\Pengajuan;

            $completionLevel = $completionLevel ?? null;
            $completionStatus = $completionStatus ?? ['level' => null];
            $pengajuanAktif = Pengajuan::where('user_id', auth()->id())
                ->with(['databidang', 'anggota'])
                ->first();
        @endphp

        <div>
            {{-- Komentar Admin jika ada --}}
            @if($pengajuanAktif && $pengajuanAktif->komentar_admin)
                <div class="mt-24 mb-24">
                    <div class="flex-align mb-8 gap-16">
                        <span class="text-sm text-gray-300 flex-shrink-0">Today</span>
                        <span class="border border-gray-50 border-dashed flex-grow-1"></span>
                    </div>
                    <div class="event-item bg-gray-50 rounded-8 p-16">
                        <div class="flex-between gap-4">
                            <div>
                                <h6 class="mb-2">Komentar Admin:</h6>
                                <span>{{ $pengajuanAktif->komentar_admin }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Tindakan jika profil belum lengkap --}}
            @if ($completionStatus['level'] !== 'skills-complete')
                <div class="event-item bg-gray-50 rounded-8 p-16 mt-16">
                    <div class="flex-between gap-4">
                        <div class="flex-align gap-8">
                            <span class="icon d-flex w-44 h-44 bg-white rounded-8 flex-center text-2xl">
                                <i class="ph ph-warning"></i>
                            </span>
                            <div>
                                <h6 class="mb-2">Lengkapi Profil Terlebih Dahulu</h6>
                                <p class="mb-3">
                                    @switch($completionLevel)
                                        @case('incomplete')
                                            Lengkapi data universitas dan informasi pribadi Anda terlebih dahulu.
                                            @break
                                        @case('profile-complete')
                                            Tambahkan keahlian Anda untuk melengkapi profil.
                                            @break
                                        @default
                                            Silakan lengkapi semua bagian profil Anda terlebih dahulu.
                                    @endswitch
                                </p>
                                <a href="{{ route('profile.edit') }}" class="btn btn-primary">Lengkapi Profil</a>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif(!$pengajuanAktif)
                {{-- Hanya muncul jika profil lengkap & belum ada pengajuan --}}
                <div class="event-item bg-gray-50 rounded-8 p-16 mt-16">
                    <div class="flex-between gap-4">
                        <div class="flex-align gap-8">
                            <span class="icon d-flex w-44 h-44 bg-white rounded-8 flex-center text-2xl">
                                <i class="ph ph-briefcase"></i>
                            </span>
                            <div>
                                <h6 class="mb-2">Siap untuk Mengajukan Magang</h6>
                                <p class="mb-3">Profil Anda sudah lengkap. Klik tombol di bawah untuk memulai pengajuan magang.</p>
                                <a href="{{ route('pengajuan.tipe') }}" class="btn btn-primary">Ajukan Magang Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <a href="{{ route('pengajuan.index') }}" class="btn btn-main w-100 mt-24">Cek Status Pengajuan</a>
        </div>
    </div>
</div>
