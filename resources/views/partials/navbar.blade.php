<nav class="navbar navbar-expand bg-white/10 backdrop-blur-md shadow-sm border-b border-white/10 px-4 py-3 rounded-xl">
  <!-- Sidebar Toggle -->
  <button class="btn btn-sm btn-glass text-white me-3 sidebar-toggle js-sidebar-toggle">
    <i class="fas fa-bars"></i>
  </button>

  <!-- Right Items -->
  <div class="collapse navbar-collapse justify-end">
    <ul class="navbar-nav align-items-center gap-3">
      <!-- Notifikasi -->
      <li class="nav-item dropdown">
        <a class="nav-link relative" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
          <i class="fas fa-bell text-white"></i>
          <span class="badge bg-danger rounded-pill position-absolute top-0 start-100 translate-middle">4</span>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg mt-2 glass">
          <div class="dropdown-header fw-bold">4 Notifikasi Baru</div>
          <div class="list-group list-group-flush">
            <a href="#" class="list-group-item bg-transparent text-white">
              <i class="fas fa-exclamation-circle text-danger me-2"></i>
              Server butuh restart. <small class="d-block text-muted">30m lalu</small>
            </a>
            <a href="#" class="list-group-item bg-transparent text-white">
              <i class="fas fa-bell text-warning me-2"></i>
              Reminder acara. <small class="d-block text-muted">2 jam lalu</small>
            </a>
            <a href="#" class="list-group-item bg-transparent text-white">
              <i class="fas fa-sign-in-alt text-primary me-2"></i>
              Login baru terdeteksi. <small class="d-block text-muted">5 jam lalu</small>
            </a>
            <a href="#" class="list-group-item bg-transparent text-white">
              <i class="fas fa-user-plus text-success me-2"></i>
              Permintaan koneksi. <small class="d-block text-muted">14 jam lalu</small>
            </a>
          </div>
          <div class="dropdown-footer text-center">
            <a href="#" class="text-indigo-400 text-sm">Lihat semua notifikasi</a>
          </div>
        </div>
      </li>

      <!-- Pesan -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
          <i class="fas fa-envelope text-white"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg mt-2 glass">
          <div class="dropdown-header fw-bold">4 Pesan Baru</div>
          <div class="list-group list-group-flush">
            <a href="#" class="list-group-item bg-transparent text-white d-flex align-items-start">
              <img src="{{ asset('img/kab_malang.jpg') }}" class="rounded-circle me-2" width="32" height="32" />
              <div>
                <div class="fw-semibold">Vanessa Tucker</div>
                <div class="text-muted small">Nam pretium turpis et arcu.</div>
                <small class="text-muted">15m lalu</small>
              </div>
            </a>
            <!-- Tambahkan lainnya sesuai kebutuhan -->
          </div>
          <div class="dropdown-footer text-center">
            <a href="#" class="text-indigo-400 text-sm">Lihat semua pesan</a>
          </div>
        </div>
      </li>

      <!-- Profil -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="profileDropdown" data-bs-toggle="dropdown">
          {{ auth()->guard('admin')->user()->nama ?? 'Guest' }}
        </a>
        <div class="dropdown-menu dropdown-menu-end mt-2 glass">
          <a class="dropdown-item" href="">
            <i class="fas fa-user me-2"></i> Profile
          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-chart-pie me-2"></i> Analytics
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="">
            <i class="fas fa-cog me-2"></i> Settings
          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-question-circle me-2"></i> Help Center
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt me-2"></i> Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </li>
    </ul>
  </div>
</nav>
