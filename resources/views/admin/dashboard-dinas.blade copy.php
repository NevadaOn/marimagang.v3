@extends('layouts.admindinas')

@section('title', 'Dashboard Admin Dinas')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Dashboard Admin Dinas</h1>

    <div class="bg-white p-4 rounded shadow">
        <div class="text-sm text-gray-500">Total Pengajuan</div>
        <div class="text-2xl font-bold">{{ $totalPengajuan }}</div>
    </div>


    <h2 class="text-lg font-semibold mb-2">Pengajuan Terbaru</h2>
    <div class="bg-white shadow rounded p-4 mb-6">
        <ul>
            @foreach ($pengajuanTerbaru as $item)
                <li class="mb-2">
                    <strong>{{ $item->user->nama }}</strong> mengajukan ke <em>{{ $item->databidang->nama }}</em> pada {{ $item->created_at->format('d M Y') }}
                </li>
            @endforeach
        </ul>
    </div>

    <h2 class="text-lg font-semibold mb-2">Statistik Pengguna per Universitas</h2>
    <div class="bg-white shadow rounded p-4">
        <ul>
            @foreach ($userPerUniversitas as $item)
                <li>{{ $item->nama_universitas }}: {{ $item->total_user }} pengguna</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
