@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Dashboard Super Admin</h1>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-white shadow rounded p-4">
            <div class="text-gray-600">Total Pengajuan</div>
            <div class="text-2xl font-bold text-indigo-600">{{ $totalPengajuan }}</div>
        </div>
        <div class="bg-white shadow rounded p-4">
            <div class="text-gray-600">Pending</div>
            <div class="text-2xl font-bold text-yellow-600">{{ $pengajuanPending }}</div>
        </div>
        <div class="bg-white shadow rounded p-4">
            <div class="text-gray-600">Diterima</div>
            <div class="text-2xl font-bold text-green-600">{{ $pengajuanDiterima }}</div>
        </div>
        <div class="bg-white shadow rounded p-4">
            <div class="text-gray-600">Ditolak</div>
            <div class="text-2xl font-bold text-red-600">{{ $pengajuanDitolak }}</div>
        </div>
        <div class="bg-white shadow rounded p-4">
            <div class="text-gray-600">Total User</div>
            <div class="text-2xl font-bold text-indigo-600">{{ $totalUser }}</div>
        </div>
        <div class="bg-white shadow rounded p-4">
            <div class="text-gray-600">Total Bidang</div>
            <div class="text-2xl font-bold text-indigo-600">{{ $totalBidang }}</div>
        </div>
    </div>

    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-2">Pengajuan Per Bidang</h2>
        <table class="w-full table-auto border border-collapse border-gray-300 text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-2 py-1 text-left">Bidang</th>
                    <th class="border px-2 py-1 text-center">Total</th>
                    <th class="border px-2 py-1 text-center">Pending</th>
                    <th class="border px-2 py-1 text-center">Diterima</th>
                    <th class="border px-2 py-1 text-center">Ditolak</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengajuanPerBidang as $data)
                <tr>
                    <td class="border px-2 py-1">{{ $data->nama }}</td>
                    <td class="border px-2 py-1 text-center">{{ $data->total_pengajuan }}</td>
                    <td class="border px-2 py-1 text-center">{{ $data->pending }}</td>
                    <td class="border px-2 py-1 text-center">{{ $data->diterima }}</td>
                    <td class="border px-2 py-1 text-center">{{ $data->ditolak }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="grid md:grid-cols-2 gap-6">
        <div>
            <h2 class="text-xl font-semibold mb-2">Pengajuan Terbaru</h2>
            <ul class="list-disc pl-6 text-sm">
                @foreach($pengajuanTerbaru as $item)
                <li>{{ $item->user->nama }} - {{ $item->databidang->nama }} ({{ $item->status }})</li>
                @endforeach
            </ul>
        </div>

        <div>
            <h2 class="text-xl font-semibold mb-2">Pengguna Terbaru</h2>
            <ul class="list-disc pl-6 text-sm">
                @foreach($userTerbaru as $user)
                <li>{{ $user->nama }} ({{ $user->universitas->nama_universitas ?? '-' }})</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
