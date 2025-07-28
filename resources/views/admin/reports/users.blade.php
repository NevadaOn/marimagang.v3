@extends('layouts.superadmin')

@section('content')
<div class="container py-4">
    <h1 class="h4 fw-bold mb-4">Laporan Pengguna</h1>

    <div class="mb-3">
        <a href="{{ route('admin.reports.export.users') }}" class="btn btn-success">
            <i class="fas fa-file-excel me-1"></i> Export Excel
        </a>
    </div>

    <div class="table-responsive bg-white shadow-sm rounded">
        <table class="table table-bordered table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>NIM</th>
                    <th>Status</th>
                    <th class="text-center">Jumlah Pengajuan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->nim }}</td>
                    <td>
                        <span class="badge 
                            @if($user->status === 'aktif') bg-success
                            @elseif($user->status === 'nonaktif') bg-danger
                            @else bg-secondary
                            @endif">
                            {{ ucfirst($user->status) }}
                        </span>
                    </td>
                    <td class="text-center">{{ $user->pengajuan_count }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
