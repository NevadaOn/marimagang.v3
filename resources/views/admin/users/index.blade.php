@extends('layouts.superadmin')
@section('content')
    <h1 class="text-xl font-bold mb-4">Manajemen Pengguna</h1>

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">Nama</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">NIM</th>
                <th class="border p-2">Status</th>
                <th class="border p-2">Jumlah Pengajuan</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="border-b">
                <td class="border p-2">{{ $user->nama }}</td>
                <td class="border p-2">{{ $user->email }}</td>
                <td class="border p-2">{{ $user->nim }}</td>
                <td class="border p-2">{{ $user->status }}</td>
                <td class="border p-2 text-center">{{ $user->pengajuan_count }}</td>
                <td class="border p-2">
                    <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-info">Lihat</a>
                    <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Hapus pengguna ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
