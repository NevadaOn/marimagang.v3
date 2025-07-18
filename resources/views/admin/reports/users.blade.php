@extends('layouts.admin')
@section('content')
<h1 class="text-xl font-bold mb-4">Laporan Pengguna</h1>

<a href="{{ route('admin.reports.export.users') }}" class="btn btn-success mb-4">📥 Export Excel</a>

<table class="table-auto w-full border">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>NIM</th>
            <th>Status</th>
            <th>Jumlah Pengajuan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->nama }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->nim }}</td>
            <td>{{ $user->status }}</td>
            <td>{{ $user->pengajuan_count }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
