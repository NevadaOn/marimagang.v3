@extends('layouts.superadmin')

@section('content')
<div class="container py-4">
    <h1 class="h4 fw-bold mb-4">Laporan Pengajuan</h1>

    <div class="mb-3">
        <a href="{{ route('admin.reports.export.pengajuan') }}" class="btn btn-success">
            <i class="fas fa-file-excel me-1"></i> Export Excel
        </a>
    </div>

    <div class="table-responsive bg-white shadow-sm rounded">
        <table class="table table-bordered table-hover align-middle mb-0">
            <thead class="table-light">
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
                    <td>
                        <span class="badge 
                            @if($item->status === 'disetujui') bg-success
                            @elseif($item->status === 'ditolak') bg-danger
                            @else bg-secondary
                            @endif">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                    <td>{{ $item->created_at->format('Y-m-d') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
