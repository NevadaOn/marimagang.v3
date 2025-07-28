@extends('layouts.adminbidang')

@section('title', 'Kelola Pengajuan')

@section('content')
<div class="min-h-screen text-white py-10 px-4">
    <div class="max-w-7xl mx-auto">

         <div class="rounded-3xl mb-4 bg-gradient-to-r from-indigo-500/20 via-purple-500/20 to-pink-500/20 p-3 border-b border-white/10">
                    
        <h1 class="text-3xl font-bold mb-6 m-3 text-white" >Daftar Pengajuan</h1>

        <div class="mb-5">
  <div class="relative">
    <input
      type="text"
      placeholder="Search..."
      class="w-full px-4 py-2 pr-10 rounded-md backdrop-blur-xl bg-white/10 text-sm placeholder-gray-400 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
    />
    <button
      type="submit"
      class="absolute right-1 top-1 bottom-1 px-4  bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white rounded-md text-sm"
    >
      <i class="fas fa-search"></i>
    </button>
  </div>
</div>
</div>
        @if (session('success'))
            <div class="mb-6 bg-white/10 backdrop-blur-md text-green-300 border border-green-500 rounded-lg p-4">
                {{ session('success') }}
            </div>
        @endif


        <div class="bg-white/10 backdrop-blur-xl rounded-xl shadow-lg overflow-x-auto">
            <table class="min-w-full text-sm text-white table-auto">
                <thead>
                    <tr class="text-left text-gray-300 uppercase text-xs border-b border-white/20">
                        <th class="py-4 px-4 text-center">No</th>
                        <th class="py-4 px-4">Nama Pengusul</th>
                        <th class="py-4 px-4">NIM</th>
                        <th class="py-4 px-4">Bidang</th>
                        <th class="py-4 px-4 text-center">Mulai</th>
                        <th class="py-4 px-4 text-center">Selesai</th>
                        <th class="py-4 px-4 text-center">Diajukan</th>
                        <th class="py-4 px-4 text-center">Status</th>
                        <th class="py-4 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengajuan as $index => $item)
                        <tr class="border-b border-white/10 hover:bg-white/5 transition">
                            <td class="py-3 px-4 text-center">{{ $pengajuan->firstItem() + $index }}</td>
                            <td class="py-3 px-4">{{ $item->user->nama }}</td>
                            <td class="py-3 px-4">{{ $item->user->nim }}</td>
                            <td class="py-3 px-4">{{ $item->databidang->nama ?? '-' }}</td>
                            <td class="py-3 px-4 text-center">{{ optional($item->tanggal_mulai)->format('d M Y') }}</td>
                            <td class="py-3 px-4 text-center">{{ optional($item->tanggal_selesai)->format('d M Y') }}</td>
                            <td class="py-3 px-4 text-center">{{ $item->created_at->format('d M Y') }}</td>
                            <td class="py-3 px-4 text-center">
                                @if ($item->status == 'disetujui')
                                    <span class="inline-block px-3 py-1 rounded-full text-sm font-medium bg-green-500/20 text-green-300">
                                        Disetujui
                                    </span>
                                @elseif($item->status == 'ditolak')
                                    <span class="inline-block px-3 py-1 rounded-full text-sm font-medium bg-red-500/20 text-red-300">
                                        Ditolak
                                    </span>
                                @else
                                    <span class="inline-block px-3 py-1 rounded-full text-sm font-medium bg-yellow-500/20 text-yellow-300">
                                        Menunggu
                                    </span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-center">
                                <a href="{{ route('admin.pengajuan.showbidang', $item->id) }}"
                                    class="inline-block px-4 py-1 text-sm font-semibold text-indigo-200 hover:text-white bg-indigo-500/10 hover:bg-indigo-500/20 rounded-md transition">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="py-5 text-center text-gray-400">Tidak ada data pengajuan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($pengajuan->hasPages())
            <div class="flex justify-center mt-6">
                {{ $pengajuan->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
