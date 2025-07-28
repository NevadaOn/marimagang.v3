                    <div class="card">
                        <div class="card-body">
                            <div class="calendar">
                                <div class="calendar__header">
                                    <button type="button" class="calendar__arrow left"><i
                                            class="ph ph-caret-left"></i></button>
                                    <p class="display h6 mb-0">""</p>
                                    <button type="button" class="calendar__arrow right"><i
                                            class="ph ph-caret-right"></i></button>
                                </div>

                                <div class="calendar__week week">
                                    <div class="calendar__week-text">Su</div>
                                    <div class="calendar__week-text">Mo</div>
                                    <div class="calendar__week-text">Tu</div>
                                    <div class="calendar__week-text">We</div>
                                    <div class="calendar__week-text">Th</div>
                                    <div class="calendar__week-text">Fr</div>
                                    <div class="calendar__week-text">Sa</div>
                                </div>
                                <div class="days"></div>
                            </div>
                            @php
                                $completionLevel = $completionLevel ?? null;
                                $pengajuanAktif = $pengajuanAktif ?? null;
                                $undanganPengajuan = $undanganPengajuan ?? null;
                                $keanggotaanAktif = null;

                                if (!$pengajuanAktif && !$undanganPengajuan) {
                                    $keanggotaanAktif = \App\Models\Anggota::where('user_id', auth()->id())
                                        ->where('status', 'accepted')
                                        ->with(['pengajuan.databidang', 'pengajuan.user', 'pengajuan.anggota.user'])
                                        ->first();
                                }

                                $displayPengajuan = $pengajuanAktif ?? ($keanggotaanAktif ? $keanggotaanAktif->pengajuan : null);
                                $isAnggota = !$pengajuanAktif && $keanggotaanAktif;
                            @endphp

                            <div class="">

                                {{-- Komentar Admin jika ada --}}
                                @if($displayPengajuan && $displayPengajuan->komentar_admin)
                                    <div class="mt-24 mb-24">
                                        <div class="flex-align mb-8 gap-16">
                                            <span class="text-sm text-gray-300 flex-shrink-0">Today</span>
                                            <span class="border border-gray-50 border-dashed flex-grow-1"></span>
                                        </div>
                                        <div class="event-item bg-gray-50 rounded-8 p-16">
                                            <div class="flex-between gap-4">
                                                <div>
                                                    <h6 class="mb-2">Komentar Admin:</h6>
                                                    <span>{{ $displayPengajuan->komentar_admin }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($undanganPengajuan)
                                    <div class="event-item bg-gray-50 rounded-8 p-16 mt-16">
                                        <div class="flex-between gap-4">
                                            <div class="flex-align gap-8">
                                                <span class="icon d-flex w-44 h-44 bg-white rounded-8 flex-center text-2xl">
                                                    <i class="ph ph-magic-wand"></i>
                                                </span>
                                                <div>
                                                    <h6 class="mb-2">Anda memiliki undangan untuk bergabung dalam kelompok magang.</h6>
                                                    <p class="mb-3">Silakan terima atau tolak undangan tersebut.</p>
                                                    <form method="POST" action="{{ route('invitation.accept', $undanganPengajuan->id) }}" style="display: inline-block;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success">Terima Undangan</button>
                                                    </form>
                                                    <form method="POST" action="{{ route('invitation.reject', $undanganPengajuan->id) }}" style="display: inline-block;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Tolak Undangan</button>
                                                    </form>
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
                                                            @case('skills-complete')
                                                                Periksa kembali bagian profil agar lengkap seluruhnya.
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
                                @elseif(!$pengajuanAktif && !$keanggotaanAktif)
                                    {{-- Hanya muncul jika profil lengkap & belum ada pengajuan/keanggotaan --}}
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
                  