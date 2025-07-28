@extends('layouts.superadmin')

@section('content')
<h1 class="text-xl font-bold mb-4">Manajemen Admin</h1>

{{-- Flash messages --}}
@if (session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
        {{ session('error') }}
    </div>
@endif

<a href="{{ route('admin.admin.create') }}" class="btn btn-primary mb-4">+ Tambah Admin</a>

<table class="table-auto w-full border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border p-2">Nama</th>
            <th class="border p-2">Email</th>
            <th class="border p-2">Role</th>
            <th class="border p-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($admins as $admin)
        <tr>
            <td class="border p-2">{{ $admin->nama }}</td>
            <td class="border p-2">{{ $admin->email }}</td>
            <td class="border p-2">{{ $admin->role }}</td>
            <td class="border p-2">
                <a href="{{ route('admin.admin.edit', $admin->id) }}" class="btn btn-sm btn-info">Edit</a>
                <form action="{{ route('admin.admin.destroy', $admin->id) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus admin ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
