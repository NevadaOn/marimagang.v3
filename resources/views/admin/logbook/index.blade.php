@extends('layouts.superadmin')
@section('title', 'Daftar Logbook User')

@section('content')
<div class="container mt-4">
    <h2>Daftar Logbook User</h2>

    {{-- Filter Bidang Magang --}}
    <form method="GET" action="{{ route('admin.logbook.index') }}" class="mb-3">
        <div class="row g-2 align-items-center">
            <div class="col-md-4">
                <select name="bidang" class="form-select">
                    <option value="">-- Semua Bidang --</option>
                    @foreach($bidangs as $bidang)
                        <option value="{{ $bidang->id }}" {{ request('bidang') == $bidang->id ? 'selected' : '' }}>
                            {{ $bidang->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary w-100" type="submit">Filter</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Bidang Magang</th>
                <th>Tanggal Terakhir Logbook</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($logbooks as $index => $logbook)
                <tr>
                    <td>{{ $logbooks->firstItem() + $index }}</td>
                    <td>{{ $logbook->user_name ?? '-' }}</td> {{-- gunakan kolom alias dari join users --}}
                    <td>{{ $logbook->nama_bidang ?? '-' }}</td> {{-- gunakan kolom alias dari join databidang --}}
                    <td>{{ \Carbon\Carbon::parse($logbook->tanggal_terakhir)->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('admin.logbook.show', $logbook->user_id) }}" class="btn btn-info btn-sm">
                            Lihat Selengkapnya
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada data logbook</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $logbooks->links() }}
</div>
@endsection
