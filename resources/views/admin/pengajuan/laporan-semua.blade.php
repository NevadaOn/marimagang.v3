@extends('layouts.superadmin')

@section('title', 'Laporan Semua Pengajuan Magang')

@section('content')
<div class="container-fluid">
    <h4 class="mb-4"><i class="fas fa-file-alt me-2"></i> Laporan Semua Pengajuan Magang</h4>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <th>Universitas</th>
                            <th>Fakultas</th>
                            <th>Prodi</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pengajuan as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->user->name ?? '-' }}</td>
                                <td>{{ $item->universitas ?? '-' }}</td>
                                <td>{{ $item->fakultas ?? '-' }}</td>
                                <td>{{ $item->prodi ?? '-' }}</td>
                                <td>{{ $item->tanggal_mulai ? \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') : '-' }}</td>
                                <td>{{ $item->tanggal_selesai ? \Carbon\Carbon::parse($item->tanggal_selesai)->format('d M Y') : '-' }}</td>
                                <td>
                                    @switch($item->status)
                                        @case('diterima')
                                            <span class="badge bg-success"><i class="fas fa-check-circle me-1"></i>Diterima</span>
                                            @break
                                        @case('ditolak')
                                            <span class="badge bg-danger"><i class="fas fa-times-circle me-1"></i>Ditolak</span>
                                            @break
                                        @case('diproses')
                                            <span class="badge bg-warning text-dark"><i class="fas fa-spinner me-1"></i>Diproses</span>
                                            @break
                                        @case('diteruskan')
                                            <span class="badge bg-primary"><i class="fas fa-paper-plane me-1"></i>Diteruskan</span>
                                            @break
                                        @case('magang')
                                            <span class="badge bg-info text-dark"><i class="fas fa-user-tie me-1"></i>Magang</span>
                                            @break
                                        @case('selesai')
                                            <span class="badge bg-secondary"><i class="fas fa-check-double me-1"></i>Selesai</span>
                                            @break
                                        @default
                                            <span class="badge bg-secondary"><i class="fas fa-clock me-1"></i>Diproses</span>
                                    @endswitch
                                </td>
                                <td>
                                    <a href="{{ route('admin.pengajuan.show', $item->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Tidak ada data pengajuan magang.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
