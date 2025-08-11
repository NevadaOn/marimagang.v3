@extends('layouts.superadmin')
@section('title', 'Logbook Detail: ' . ($user->nama ?? '-'))

@section('content')
<div class="container mt-4">
    <h2>Logbook Detail: {{ $user->nama ?? '-' }}</h2>

    {{-- Filter Form --}}
    <form method="GET" action="{{ route('admin.logbook.show', $user->id) }}" class="mb-4">
        <div class="row g-2 align-items-center">
            <div class="col-md-3">
                <select name="filter" id="filter" class="form-select" onchange="toggleCustomDate(this.value)">
                    <option value="all" {{ ($filter ?? 'all') == 'all' ? 'selected' : '' }}>Semua Catatan</option>
                    <option value="weekly" {{ ($filter ?? '') == 'weekly' ? 'selected' : '' }}>Mingguan</option>
                    <option value="monthly" {{ ($filter ?? '') == 'monthly' ? 'selected' : '' }}>Bulanan</option>
                    <option value="custom" {{ ($filter ?? '') == 'custom' ? 'selected' : '' }}>Rentang Tanggal</option>
                </select>
            </div>
            <div class="col-md-3" id="custom-date-range" style="display: {{ ($filter ?? '') == 'custom' ? 'flex' : 'none' }};">
                <input type="date" name="start_date" class="form-control" value="{{ $startDate ?? '' }}">
                <span class="mx-2 align-self-center">s/d</span>
                <input type="date" name="end_date" class="form-control" value="{{ $endDate ?? '' }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Filter</button>
            </div>
            <div class="col-md-2">
                <a href="{{ route('admin.logbook.print', [
                    'user' => $user->id, 
                    'filter' => $filter ?? 'all', 
                    'start_date' => $startDate ?? '', 
                    'end_date' => $endDate ?? ''
                ]) }}" target="_blank" class="btn btn-success w-100">Cetak</a>
            </div>
        </div>
    </form>

    {{-- Tabel Logbook --}}
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kegiatan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($logbooks as $i => $logbook)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($logbook->tanggal)->format('d-m-Y') }}</td>
                    <td>{{ $logbook->kegiatan }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Belum ada catatan logbook</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
function toggleCustomDate(val) {
    var el = document.getElementById('custom-date-range');
    if (val === 'custom') {
        el.style.display = 'flex';
    } else {
        el.style.display = 'none';
    }
}
</script>

@endsection
