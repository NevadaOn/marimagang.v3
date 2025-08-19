@extends('layouts.superadmin')
@section('title', 'Logbook Detail: ' . ($user->nama ?? '-'))

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Logbook Detail: {{ $user->nama ?? '-' }}</h2>

    {{-- Filter Form --}}
    <form method="GET" action="{{ route('admin.logbook.show', $user->id) }}" class="mb-4">
        <div class="row g-2">
            {{-- Filter Dropdown --}}
            <div class="col-12 col-md-3">
                <select name="filter" id="filter" class="form-select w-100" onchange="toggleCustomDate(this.value)">
                    <option value="all" {{ ($filter ?? 'all') == 'all' ? 'selected' : '' }}>Semua Catatan</option>
                    <option value="weekly" {{ ($filter ?? '') == 'weekly' ? 'selected' : '' }}>Mingguan</option>
                    <option value="monthly" {{ ($filter ?? '') == 'monthly' ? 'selected' : '' }}>Bulanan</option>
                    <option value="custom" {{ ($filter ?? '') == 'custom' ? 'selected' : '' }}>Rentang Tanggal</option>
                </select>
            </div>

            {{-- Custom Date Range --}}
            <div class="col-12 col-md-5" id="custom-date-range" 
                 style="display: {{ ($filter ?? '') == 'custom' ? 'flex' : 'none' }}; gap: 0.5rem; flex-wrap: wrap;">
                <input type="date" name="start_date" class="form-control flex-grow-1" value="{{ $startDate ?? '' }}">
                <span class="align-self-center">s/d</span>
                <input type="date" name="end_date" class="form-control flex-grow-1" value="{{ $endDate ?? '' }}">
            </div>

            {{-- Filter Button --}}
            <div class="col-6 col-md-2">
                <button type="submit" class="btn btn-primary w-100">Filter</button>
            </div>

            {{-- Print Button --}}
            <div class="col-6 col-md-2">
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
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width: 50px;">No</th>
                    <th style="width: 150px;">Tanggal</th>
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
</div>

<script>
function toggleCustomDate(val) {
    var el = document.getElementById('custom-date-range');
    el.style.display = (val === 'custom') ? 'flex' : 'none';
}
</script>
@endsection
