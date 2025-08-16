<nav class="navbar navbar-expand navbar-light navbar-bg">
	<a class="sidebar-toggle js-sidebar-toggle">
		<i class="hamburger align-self-center"></i>
	</a>

	<div class="navbar-collapse collapse">
		<ul class="navbar-nav navbar-align">
			<li class="nav-item dropdown">
				<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
					<div class="position-relative">
						<i class="align-middle" data-feather="bell"></i>
						@if($notifikasiPengajuan->count() > 0)
							<span class="indicator">{{ $notifikasiPengajuan->count() }}</span>
						@endif
					</div>
				</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
					<div class="dropdown-menu-header d-flex justify-content-between align-items-center px-3 py-2">
						<span>{{ $notifikasiPengajuan->count() }} Notifikasi Pengajuan</span>

						@php
							$finalCount = $notifikasiPengajuan->whereIn('status', ['diterima', 'ditolak'])->count();
						@endphp

						@if($finalCount > 0)
							<form action="{{ route('admin.pengajuan.markFinalAsRead') }}" method="POST" style="margin: 0;">
								@csrf
								<button type="submit" class="btn btn-sm btn-link text-decoration-none p-0">
									Tandai pengajuan sudah dibaca
								</button>
							</form>
						@endif
					</div>
					<div class="list-group">
						@forelse($notifikasiPengajuan as $notif)
							<a href="{{ route('admin.pengajuan.show', $notif->id) }}" class="list-group-item">
								<div class="row g-0 align-items-center">
									<div class="col-2">
										@if($notif->status === 'di proses')
											<i class="text-warning" data-feather="clock"></i>
										@elseif($notif->status === 'diteruskan')
											<i class="text-info" data-feather="share"></i>
										@else
											<i class="text-primary" data-feather="plus-circle"></i>
										@endif
									</div>
									<div class="col-10">
										<div class="text-dark">
											Pengajuan #{{ $notif->id }} - {{ ucfirst($notif->status) }}
										</div>
										<div class="text-muted small mt-1">
											{{ $notif->user->nama ?? 'Pengaju Tidak Diketahui' }}
										</div>
										<div class="text-muted small mt-1">
											{{ $notif->created_at->diffForHumans() }}
										</div>
									</div>
								</div>
							</a>
						@empty
							<div class="list-group-item text-center text-muted">
								Tidak ada notifikasi baru
							</div>
						@endforelse
					</div>
					<div class="dropdown-menu-footer">
						<a href="{{ route('admin.pengajuan.index') }}" class="text-muted">Lihat semua pengajuan</a>
					</div>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
					<div class="position-relative">
						<i class="align-middle" data-feather="message-square"></i>
						@if($latestChats->count() > 0)
							<span class="indicator">{{ $latestChats->count() }}</span>
						@endif
					</div>
				</a>

				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
					<div class="dropdown-menu-header">
						<div class="position-relative">
							{{ $latestChats->count() }} Pesan Terbaru
						</div>
					</div>
					<div class="list-group">
						@forelse($latestChats as $chat)
							<a href="{{ $chat->sender ? route('admin.chat.index', ['user_id' => $chat->sender->id]) : '#' }}"
								class="list-group-item">
								<div class="row g-0 align-items-center">
									<div class="col-2">
										<img src="{{ $chat->sender?->profile_photo_url ?? asset('img/default-avatar.png') }}"
											class="avatar img-fluid rounded-circle"
											alt="{{ $chat->sender?->nama ?? 'Pengirim tidak ditemukan' }}">
									</div>
									<div class="col-10 ps-2">
										<div class="text-dark">{{ $chat->sender?->nama ?? 'Pengirim tidak ditemukan' }}
										</div>
										<div class="text-muted small mt-1">
											{{ \Illuminate\Support\Str::limit($chat->message, 30) }}</div>
										<div class="text-muted small mt-1">{{ $chat->created_at->diffForHumans() }}</div>
									</div>
								</div>
							</a>
						@empty
							<div class="list-group-item text-muted">Belum ada Pesan Terbaru</div>
						@endforelse
					</div>
					<div class="dropdown-menu-footer">
						<a href="{{ route('admin.chat.index') }}" class="text-muted">Lihat Semua Pesan</a>
					</div>
				</div>

			</li>
			<li class="nav-item dropdown">
				<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
					<i class="align-middle" data-feather="settings"></i>
				</a>

				<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
					<span class="text-dark">{{ auth()->guard('admin')->user()->nama ?? 'Guest' }}</span>
				</a>
				<div class="dropdown-menu dropdown-menu-end">
					<a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1"
							data-feather="user"></i> Profile</a>
					<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i>
						Analytics</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="index.html"><i class="align-middle me-1" data-feather="settings"></i>
						Settings & Privacy</a>
					<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help
						Center</a>
					<div class="dropdown-divider"></div>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="dropdown-item">
						@csrf
						<button type="submit" class="dropdown-item"
							style="color:red; border:none; background:none; padding:0;">Log out</button>
					</form>
				</div>
			</li>
		</ul>
	</div>
</nav>