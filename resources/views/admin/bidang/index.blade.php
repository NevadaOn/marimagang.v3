@extends('layouts.superadmin')

@section('title', 'Kelola Bidang')

@section('content')
<div class="container py-4">
    <!-- Header & Tombol -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <h1 class="h4 mb-0">Kelola Bidang</h1>
        <a href="{{ route('admin.bidang.create') }}" class="btn btn-primary">
            + Tambah Bidang
        </a>
    </div>

    <!-- Flash Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Tabel Responsif -->
    @if($bidang->count())
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="thead-light">
                <tr>
                    <th>Nama Bidang</th>
                    <th class="text-center">Slug</th>
                    <th class="text-center">Penanggung Jawab</th>
                    <th class="text-center">Kuota</th>
                    {{-- <th class="text-center">Terisi</th> --}}
                    <th class="text-center">Total Pengajuan</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bidang as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td class="text-center">{{ $item->slug }}</td>
                    <td class="text-center">{{ $item->admin->nama ?? 'Admin tidak ditemukan' }}</td>
                    <td class="text-center">{{ $item->kuota }}</td>
                    {{-- <td class="text-center">{{ $item->kuota_terisi }}</td> --}}
                    <td class="text-center">{{ $item->pengajuan_count ?? 0 }}</td>
                    <td class="text-center">
                        @if($item->status === 'buka')
                            <span class="badge bg-success">Buka</span>
                        @else
                            <span class="badge bg-danger">Tutup</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center flex-wrap gap-1">
                            <a href="{{ route('admin.bidang.show', $item->id) }}" class="btn btn-sm btn-info">Detail</a>
                            <a href="{{ route('admin.bidang.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.bidang.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus bidang ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <p class="text-muted mt-3">Belum ada bidang yang terdaftar.</p>
    @endif
</div>
@endsection
