@extends('layouts.admin')
@section('content')
<h1 class="text-xl font-bold mb-4">Laporan Pengajuan</h1>

<a href="{{ route('admin.reports.export.pengajuan') }}" class="btn btn-success mb-4">📥 Export Excel</a>

<table class="table-auto w-full border">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Bidang</th>
            <th>Status</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pengajuan as $item)
        <tr>
            <td>{{ $item->user->nama }}</td>
            <td>{{ $item->databidang->nama ?? '-' }}</td>
            <td>{{ $item->status }}</td>
            <td>{{ $item->created_at->format('Y-m-d') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
