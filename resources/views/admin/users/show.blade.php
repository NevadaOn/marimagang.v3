@extends('layouts.superadmin')

@section('content')
<h1 class="text-xl font-bold mb-4">Detail Pengguna</h1>

<div class="bg-white shadow rounded p-4 mb-6">
    <h2 class="text-lg font-semibold mb-2">{{ $user->nama }}</h2>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>NIM:</strong> {{ $user->nim }}</p>
    <p><strong>Status:</strong> {{ $user->status }}</p>
    <p><strong>Tanggal Daftar:</strong> {{ $user->created_at->format('d M Y') }}</p>
</div>

<div class="bg-white shadow rounded p-4 mb-6">
    <h3 class="text-lg font-semibold mb-2">Kemampuan</h3>
    @if ($user->userSkills->count())
        <ul class="list-disc ml-6">
            @foreach ($user->userSkills as $userSkill)
                <li>{{ $userSkill->skill->nama ?? '-' }}</li>
            @endforeach
        </ul>
    @else
        <p class="text-gray-500">Belum ada skill ditambahkan.</p>
    @endif
</div>

<div class="bg-white shadow rounded p-4">
    <h3 class="text-lg font-semibold mb-2">Riwayat Pengajuan</h3>
    @if ($user->pengajuan->count())
        <table class="table-auto w-full border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">Kode</th>
                    <th class="border p-2">Bidang</th>
                    <th class="border p-2">Status</th>
                    <th class="border p-2">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user->pengajuan as $pengajuan)
                <tr>
                    <td class="border p-2">{{ $pengajuan->kode_pengajuan }}</td>
                    <td class="border p-2">{{ $pengajuan->databidang->nama ?? '-' }}</td>
                    <td class="border p-2">{{ $pengajuan->status }}</td>
                    <td class="border p-2">{{ $pengajuan->created_at->format('Y-m-d') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-500">Belum ada pengajuan.</p>
    @endif
</div>
@endsection
