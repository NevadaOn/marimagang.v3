@extends('layouts.admindinas')
@section('title', 'Logbook Detail: ' . ($user->nama ?? '-'))

@section('content')
<div class="min-h-screen  m-6 pt-6 rounded-3xl backdrop-blur-lg bg-white/5 ">
    <h2 class="text-3xl font-bold text-white mb-6 text-center">
            Logbook Detail: {{ $user->nama ?? '-' }}
        </h2>
    <div class="max-w-5xl mx-auto mb-6">

        {{-- Filter Form --}}
        <form method="GET" action="{{ route('admin.logbook.show', $user->id) }}" 
              class="backdrop-blur-lg bg-white/30 border border-white/40 rounded-2xl shadow-lg p-4 mb-5">
            <div class="flex flex-wrap gap-4 items-center">
                <select name="filter" id="filter" onchange="toggleCustomDate(this.value)"
                        class="px-3 py-2 rounded-lg bg-white/50 border border-white/30 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    <option value="all" {{ ($filter ?? 'all') == 'all' ? 'selected' : '' }}>Semua Catatan</option>
                    <option value="weekly" {{ ($filter ?? '') == 'weekly' ? 'selected' : '' }}>Mingguan</option>
                    <option value="monthly" {{ ($filter ?? '') == 'monthly' ? 'selected' : '' }}>Bulanan</option>
                    <option value="custom" {{ ($filter ?? '') == 'custom' ? 'selected' : '' }}>Rentang Tanggal</option>
                </select>

                <div id="custom-date-range" 
                     style="display: {{ ($filter ?? '') == 'custom' ? 'flex' : 'none' }};" 
                     class="flex gap-2 items-center">
                    <input type="date" name="start_date" value="{{ $startDate ?? '' }}" 
                           class="px-3 py-2 rounded-lg bg-white/50 border border-white/30 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    <span class="text-gray-600">s/d</span>
                    <input type="date" name="end_date" value="{{ $endDate ?? '' }}" 
                           class="px-3 py-2 rounded-lg bg-white/50 border border-white/30 focus:outline-none focus:ring-2 focus:ring-blue-300">
                </div>

                <button type="submit" 
                        class="px-4 py-2 bg-blue-500 text-black rounded-lg shadow-md hover:bg-blue-600 transition">
                    Filter
                </button>

                <a href="{{ route('admin.logbook.print', [
                    'user' => $user->id, 
                    'filter' => $filter ?? 'all', 
                    'start_date' => $startDate ?? '', 
                    'end_date' => $endDate ?? ''
                ]) }}" target="_blank" 
                   class="px-4 py-2 bg-green-500 text-white rounded-lg shadow-md hover:bg-green-600 transition">
                    Cetak
                </a>
            </div>
        </form>

        {{-- Tabel Logbook --}}
        <div class="overflow-x-auto backdrop-blur-lg bg-white/30 border border-white/40 rounded-2xl shadow-lg">
            <table class="min-w-full text-left text-gray-800">
                <thead>
                    <tr class="bg-white/40">
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Tanggal</th>
                        <th class="px-4 py-3">Kegiatan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logbooks as $i => $logbook)
                        <tr class="hover:bg-white/50 transition">
                            <td class="px-4 py-3">{{ $i + 1 }}</td>
                            <td class="px-4 py-3">{{ \Carbon\Carbon::parse($logbook->tanggal)->format('d-m-Y') }}</td>
                            <td class="px-4 py-3">{{ $logbook->kegiatan }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-4 py-6 text-center text-gray-500">Belum ada catatan logbook</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function toggleCustomDate(val) {
    var el = document.getElementById('custom-date-range');
    el.style.display = (val === 'custom') ? 'flex' : 'none';
}
</script>
@endsection
