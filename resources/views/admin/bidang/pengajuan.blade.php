@extends('layouts.adminbidang')

@section('title', 'Kelola Pengajuan')

@section('content')
<div class="container mx-auto px-4 py-6 ">
    <div class="card">
         <h1 class=" text-2xl font-semibold  mb-4">Daftar Pengajuan</h1>
    </div>
   

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto border border-gray-200">
            <thead class="bg-gray-100 text-gray-700 text-sm">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Nama Pengusul</th>
                    <th class="px-4 py-2 border">NIM</th>
                    <th class="px-4 py-2 border">Bidang</th>
                    <th class="px-4 py-2 border">Tanggal Mulai</th>
                    <th class="px-4 py-2 border">Tanggal Selesai</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Tanggal Pengajuan</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-800">
                @forelse($pengajuan as $index => $item)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2 border text-center">{{ $index + 1 }}</td>
                    <td class="px-4 py-2 border">{{ $item->user->nama }}</td>
                    <td class="px-4 py-2 border">{{ $item->user->nim }}</td>
                    <td class="px-4 py-2 border">{{ $item->databidang->nama ?? '-' }}</td>
                    <td class="px-4 py-2 border text-center">
                        {{ $item->tanggal_mulai ? \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') : '-' }}
                    </td>
                    <td class="px-4 py-2 border text-center">
                        {{ $item->tanggal_selesai ? \Carbon\Carbon::parse($item->tanggal_selesai)->format('d M Y') : '-' }}
                    </td>
                    <td class="px-4 py-2 border text-center">
                        @if($item->status == 'disetujui')
                            <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">Disetujui</span>
                        @elseif($item->status == 'ditolak')
                            <span class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded">Ditolak</span>
                        @else
                            <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded">Menunggu</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 border text-center">{{ $item->created_at->format('d M Y') }}</td>
                    <td class="px-4 py-2 border text-center">
                        <a href="{{ route('admin.pengajuan.show', $item->id) }}" class="text-blue-600 hover:underline text-sm">Detail</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center py-4 text-gray-500">Tidak ada data pengajuan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
