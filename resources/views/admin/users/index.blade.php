@extends('layouts.superadmin')

@section('content')
<div class="container py-4">
    <h1 class="h4 fw-bold mb-4">Manajemen Pengguna</h1>

    <div class="table-responsive bg-white rounded shadow-sm">
        <table class="table table-bordered table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>NIM</th>
                    <th>Status</th>
                    <th class="text-center">Jumlah Pengajuan</th>
                    <th class="text-center">Aksi</th>
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
                            {{ $user->status === 'aktif' ? 'bg-success' : 'bg-warning text-dark' }}">
                            {{ ucfirst($user->status) }}
                        </span>
                    </td>
                    <td class="text-center">{{ $user->pengajuan_count }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-info me-1 text-white">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                        <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" class="d-inline" 
                            onsubmit="return confirm('Hapus pengguna ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
