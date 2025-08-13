@extends('layouts.admindinas')
@section('title', 'Daftar Logbook User')

@section('content')
<div class="min-h-screen bg-white/5 backdrop-blur-lg pt-6 m-6 rounded-3xl">
    <div class="max-w-6xl mx-auto bg-white/10 backdrop-blur-lg border border-white/5 rounded-2xl shadow-lg p-6">
        <h2 class="text-2xl font-bold text-white mb-6">Daftar Logbook User</h2>

        {{-- Filter Bidang Magang --}}
        <form method="GET" action="{{ route('admin.logbook.indexdinas') }}" class="mb-3">
            <div class="grid grid-cols-1 md:grid-cols-6 gap-3">
                <div class="md:col-span-4">
                    <select name="bidang" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        <option value="">-- Semua Bidang --</option>
                        @foreach($bidangs as $bidang)
                            <option value="{{ $bidang->id }}" {{ request('bidang') == $bidang->id ? 'selected' : '' }}>
                                {{ $bidang->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="md:col-span-2">
                    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow">
                        Filter
                    </button>
                </div>
            </div>
        </form>

        <div class="overflow-x-auto mt-6">
            <table class="min-w-full table-auto border border-white/20 text-white">
                <thead class="bg-white/10">
                    <tr>
                        <th class="px-4 py-2 text-left">No</th>
                        <th class="px-4 py-2 text-left">Nama User</th>
                        <th class="px-4 py-2 text-left">Bidang Magang</th>
                        <th class="px-4 py-2 text-left">Tanggal Terakhir Logbook</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logbooks as $index => $logbook)
                        <tr class="hover:bg-white/5">
                            <td class="px-4 py-2">{{ $logbooks->firstItem() + $index }}</td>
                            <td class="px-4 py-2">{{ $logbook->user_name ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $logbook->nama_bidang ?? '-' }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($logbook->tanggal_terakhir)->format('d-m-Y') }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('admin.logbook.showdinas', $logbook->user_id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg shadow">
                                    Lihat Selengkapnya
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-4 text-center text-white/70">Belum ada data logbook</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $logbooks->links() }}
        </div>
    </div>
</div>
@endsection
