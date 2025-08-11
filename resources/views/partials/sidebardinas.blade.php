
  <aside  class="fixed h-screen w-72 bg text-white rounded-xl flex flex-col justify-between p-4">
    <!-- Top Logo & Search -->
    <div>
      <div class="flex items-center gap-3 mb-6 mt-4 ">
        <div class="bg-light text-white text-xl font-bold rounded-lg px-2 py-1"><img src="{{ asset('img/logo-kominfo.png') }}" alt="Logo" class="h-10 w-auto">
</div>
        <div>
          <h1 class="text-base font-semibold text-white">Portal Admin</h1>
          <p class="text-xs text-muted">DISKOMINFO Kab.Malang</p>
        </div>
      </div>

      <div class="mb-5">
        
      </div>

     <!-- Sidebar Menu -->
<nav class="flex flex-col gap-3 text-sm">
    <!-- Dashboard -->
    <a href="{{ route('admin.dashboard') }}"
   class="flex items-center gap-3 px-4 py-2 rounded-lg transition-all duration-150
          text-sm no-underline hover:no-underline focus:no-underline active:no-underline
          {{ Request::routeIs('admin.dashboard') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
    <i class="fas fa-home w-5"></i>
    <span>Dashboard</span>
</a>


    <!-- Pengajuan -->
    <a href="{{ route('admin.pengajuan.dinas') }}"
   class="flex items-center gap-3 px-4 py-2 rounded-lg transition-all duration-150
          text-sm no-underline hover:no-underline focus:no-underline active:no-underline
          {{ Request::routeIs('admin.pengajuan.dinas') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
    <i class="fas fa-chart-line w-5"></i>
    <span>Pengajuan</span>
</a>
 <a href="{{ route('admin.documentation.indexdinas') }}"
   class="flex items-center gap-3 px-4 py-2 rounded-lg transition-all duration-150
          text-sm no-underline hover:no-underline focus:no-underline active:no-underline
          {{ Request::routeIs('dmin.documentation.indexdinas') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
    <i class="fas fa-camera"></i>
  
    <span>Dokumentasi</span>
</a>
 <a href="{{ route('admin.logbook.indexdinas') }}"
   class="flex items-center gap-3 px-4 py-2 rounded-lg transition-all duration-150
          text-sm no-underline hover:no-underline focus:no-underline active:no-underline
          {{ Request::routeIs('admin.logbook.indexdinas') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
    <i class="fas fa-book"></i>

    <span>Log Book</span>
</a>

</nav>

        <!-- <a href="#" class="flex items-center gap-3 px-4 py-2 hover:bg-gray-800 rounded-lg">
          <i class="fas fa-bell w-5 text-gray-400"></i> Notifications
        </a>
        <a href="#" class="flex items-center gap-3 px-4 py-2 hover:bg-gray-800 rounded-lg">
          <i class="fas fa-chart-pie w-5 text-gray-400"></i> Analytics
        </a>
        <a href="#" class="flex items-center gap-3 px-4 py-2 hover:bg-gray-800 rounded-lg">
          <i class="fas fa-heart w-5 text-gray-400"></i> Likes
        </a>
        <a href="#" class="flex items-center gap-3 px-4 py-2 hover:bg-gray-800 rounded-lg">
          <i class="fas fa-wallet w-5 text-gray-400"></i> Wallets
        </a> -->
      </nav>
    </div>

   
  </aside>

