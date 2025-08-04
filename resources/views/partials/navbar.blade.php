<nav class="bg-white/10 backdrop-blur-md shadow-sm border-b border-white/10 px-4 py-3 rounded-xl flex items-center justify-between relative z-50">
  <!-- Sidebar Toggle -->
  <button class="text-white hover:text-gray-200 focus:outline-none js-sidebar-toggle">
    
  </button>

  <!-- Right Items -->
  <div class="flex items-center gap-6">
    
    <!-- Notifikasi -->
    <div class="relative">
      <button onclick="toggleDropdown('notifDropdown')" class="text-white relative text-lg">
        <i class="fas fa-bell"></i>
        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">4</span>
      </button>
      <div id="notifDropdown" class="absolute right-0 mt-2 w-80 bg-black/70 backdrop-blur-2xl text-white rounded-lg shadow-lg hidden z-40">
        <div class="px-4 py-2 font-semibold border-b border-white/20">4 Notifikasi Baru</div>
        <div class="divide-y divide-white/10">
          <a href="#" class="block px-4 py-2 hover:bg-white/5">
            <i class="fas fa-exclamation-circle text-red-500 me-2"></i>
            Server butuh restart. <div class="text-xs text-gray-300">30m lalu</div>
          </a>
          <a href="#" class="block px-4 py-2 hover:bg-white/5">
            <i class="fas fa-bell text-yellow-400 me-2"></i>
            Reminder acara. <div class="text-xs text-gray-300">2 jam lalu</div>
          </a>
          <a href="#" class="block px-4 py-2 hover:bg-white/5">
            <i class="fas fa-sign-in-alt text-blue-500 me-2"></i>
            Login baru terdeteksi. <div class="text-xs text-gray-300">5 jam lalu</div>
          </a>
          <a href="#" class="block px-4 py-2 hover:bg-white/5">
            <i class="fas fa-user-plus text-green-500 me-2"></i>
            Permintaan koneksi. <div class="text-xs text-gray-300">14 jam lalu</div>
          </a>
        </div>
        <div class="px-4 py-2 text-sm text-indigo-400 text-center hover:underline">
          <a href="#">Lihat semua notifikasi</a>
        </div>
      </div>
    </div>

    <!-- Pesan -->
    <div class="relative">
      <button onclick="toggleDropdown('pesanDropdown')" class="text-white">
        <i class="fas fa-envelope"></i>
      </button>
      <div id="pesanDropdown" class="absolute right-0 mt-2 w-80 bg-black/70 backdrop-blur-md text-white rounded-lg shadow-lg hidden z-40">
        <div class="px-4 py-2 font-semibold border-b border-white/20">4 Pesan Baru</div>
        <div class="divide-y divide-white/10">
          <a href="#" class="flex items-start gap-3 px-4 py-3 hover:bg-white/5">
            <img src="{{ asset('img/kab_malang.jpg') }}" class="w-8 h-8 rounded-full" />
            <div>
              <div class="font-semibold">Vanessa Tucker</div>
              <div class="text-sm text-gray-300">Nam pretium turpis et arcu.</div>
              <div class="text-xs text-gray-400">15m lalu</div>
            </div>
          </a>
        </div>
        <div class="px-4 py-2 text-sm text-indigo-400 text-center hover:underline">
          <a href="#">Lihat semua pesan</a>
        </div>
      </div>
    </div>

    <!-- Profil -->
    <div class="relative">
      <button onclick="toggleDropdown('profileDropdown')" class="text-white flex items-center gap-2">
        <span>{{ auth()->guard('admin')->user()->nama ?? 'Guest' }}</span>
        <i class="fas fa-chevron-down text-sm"></i>
      </button>
      <div id="profileDropdown" class="absolute right-0 mt-2 w-56 bg-black/70 backdrop-blur-md text-white rounded-lg shadow-lg hidden z-40">
        <a href="#" class="block px-4 py-2 hover:bg-white/5"><i class="fas fa-user me-2"></i> Profile</a>
        <a href="#" class="block px-4 py-2 hover:bg-white/5"><i class="fas fa-chart-pie me-2"></i> Analytics</a>
        <hr class="border-white/20 my-1">
        <a href="#" class="block px-4 py-2 hover:bg-white/5"><i class="fas fa-cog me-2"></i> Settings</a>
        <a href="#" class="block px-4 py-2 hover:bg-white/5"><i class="fas fa-question-circle me-2"></i> Help Center</a>
        <hr class="border-white/20 my-1">
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-red-400 hover:bg-white/5">
          <i class="fas fa-sign-out-alt me-2"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
      </div>
    </div>
  </div>
</nav>

<!-- Script toggle -->
<script>
  function toggleDropdown(id) {
    const dropdowns = document.querySelectorAll('[id$="Dropdown"]');
    dropdowns.forEach(el => {
      if (el.id !== id) {
        el.classList.add('hidden');
      }
    });

    const target = document.getElementById(id);
    if (target) {
      target.classList.toggle('hidden');
    }
  }

  // Optional: klik luar tutup dropdown
  document.addEventListener('click', function (event) {
    const isDropdownBtn = event.target.closest('button[onclick]');
    if (!isDropdownBtn) {
      document.querySelectorAll('[id$="Dropdown"]').forEach(el => el.classList.add('hidden'));
    }
  });

  const burger = document.getElementById('burger');
  const sidebar = document.getElementById('sidebar');

  burger.addEventListener('click', () => {
    sidebar.classList.toggle('hidden');
  });
</script>
