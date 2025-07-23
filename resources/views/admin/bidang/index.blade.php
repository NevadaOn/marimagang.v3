@extends('layouts.adminbidang')

@section('title', 'Kelola Bidang')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Kelola Bidang</h1>
        <a href="{{ route('admin.bidang.create') }}" class="btn btn-primary">
            + Tambah Bidang
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if($bidang->count())
    <div class="overflow-x-auto">
        <table class="table-auto w-full border border-gray-200 bg-white shadow rounded">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Nama Bidang</th>
                    <th class="px-4 py-2 text-center">Slug</th>
                    <th class="px-4 py-2 text-center">Penanggung Jawab</th>
                    <th class="px-4 py-2 text-center">Kuota</th>
                    <th class="px-4 py-2 text-center">Terisi</th>
                    <th class="px-4 py-2 text-center">Total Pengajuan</th>
                    <th class="px-4 py-2 text-center">Status</th>
                    <th class="px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bidang as $item)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $item->nama }}</td>
                    <td class="px-4 py-2 text-center">{{ $item->slug }}</td>
                    <td class="px-4 py-2 text-center">
                        {{ $item->admin->nama ?? 'Admin tidak ditemukan' }}
                    </td>
                    <td class="px-4 py-2 text-center">{{ $item->kuota }}</td>
                    <td class="px-4 py-2 text-center">{{ $item->kuota_terisi }}</td>
                    <td class="px-4 py-2 text-center">{{ $item->pengajuan_count ?? 0 }}</td>
                    <td class="px-4 py-2 text-center">
                        @if($item->status === 'buka')
                            <span class="px-2 py-1 text-sm bg-green-100 text-green-700 rounded">Buka</span>
                        @else
                            <span class="px-2 py-1 text-sm bg-red-100 text-red-700 rounded">Tutup</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 text-center space-x-1">
                        <a href="{{ route('admin.bidang.show', $item->id) }}" class="btn btn-sm btn-info">Detail</a>
                        <a href="{{ route('admin.bidang.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.bidang.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus bidang ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <p class="text-gray-600 mt-4">Belum ada bidang yang terdaftar.</p>
    @endif
</div>
@endsection
