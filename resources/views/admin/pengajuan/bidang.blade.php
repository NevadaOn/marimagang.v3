@extends('layouts.superadmin')

@section('title', 'Kelola Pengajuan')

@section('content')
<div data-bs-theme="dark">
    <div class="container py-5">
    <h1 class="fw-bold mb-4 title">Daftar Pengajuan</h1>


        @if (session('success'))
            <div class="alert bg-glass border-success mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-glass rounded-4 shadow-lg p-2">
            <table class="table table-glass align-middle mb-0">
                <thead>
                    <tr>
                        <th scope="col" class="text-center py-3 px-3" style="width: 5%;">No</th>
                        <th scope="col" class="py-3 px-3" style="width: 18%;">Nama Pengusul</th>
                        <th scope="col" class="py-3 px-3" style="width: 15%;">NIM</th>
                        <th scope="col" class="py-3 px-3" style="width: 20%;">Bidang</th>
                        <th scope="col" class="text-center py-3 px-3 bg" style="width: 15%;">Mulai</th>
                        <th scope="col" class="text-center py-3 px-3" style="width: 15%;">Selesai</th>
                        <th scope="col" class="text-center py-3 px-3 bg" style="width: 15%;">Diajukan</th>
                        <th scope="col" class="text-center py-3 px-3" style="width: 15%;">Status</th>
                        <th scope="col" class="text-center py-3 px-3" style="width: 10%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengajuan as $index => $item)
                        <tr>
                            <td class="text-center py-3 px-3 ">{{ $pengajuan->firstItem() + $index }}</td>
                            <td class="py-3 px-3">{{ $item->user->nama }}</td>
                            <td class="py-3 px-3 ">{{ $item->user->nim }}</td>
                            <td class="py-3 px-3">{{ $item->databidang->nama ?? '-' }}</td>
                            <td class="text-center py-3 px-3 bg">{{ optional($item->tanggal_mulai)->format('d M Y') }}</td>
                            <td class="text-center py-3 px-3">{{ optional($item->tanggal_selesai)->format('d M Y') }}</td>
                            <td class="text-center py-3 px-3 bg">{{ $item->created_at->format('d M Y') }}</td>
                            <td class="text-center py-3 px-3 ">
                                @if ($item->status == 'disetujui')
                                    <span class="badge-glass status-disetujui">Disetujui</span>
                                @elseif($item->status == 'ditolak')
                                    <span class="badge-glass status-ditolak">Ditolak</span>
                                @else
                                    <span class="badge-glass status-menunggu">Menunggu</span>
                                @endif
                            </td>
                            
                            <td class="text-center py-3 px-3 ">
                                <a href="{{ route('admin.pengajuan.showbidang', $item->id) }}"
                                    class="btn btn-glass-action text-decoration-none">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-5 text-body-secondary">Tidak ada data pengajuan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($pengajuan->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $pengajuan->links() }}
        </div>
        @endif
    </div>
</div>
@endsection