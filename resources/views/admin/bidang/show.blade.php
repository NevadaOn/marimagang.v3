@extends('layouts.adminbidang')
@section('content')
<h1 class="text-xl font-bold mb-4 text-white">Detail Bidang</h1>

<div class="bg-gray-800 shadow p-4 rounded text-gray-100">
    <h2 class="text-lg font-semibold text-white">{{ $bidang->nama }}</h2>
    <p class="mt-2"><strong class="text-gray-300">Deskripsi:</strong> {{ $bidang->deskripsi }}</p>
    <p class="mt-1">
        <strong class="text-gray-300">Status:</strong> 
        @if($bidang->status === 'buka')
            <span class="bg-green-600 text-white px-2 py-0.5 rounded">Buka</span>
        @else
            <span class="bg-red-600 text-white px-2 py-0.5 rounded">Tutup</span>
        @endif
    </p>
    <p class="mt-1"><strong class="text-gray-300">Kuota:</strong> {{ $bidang->kuota }} <span class="text-sm text-gray-400">(Terisi: {{ $bidang->kuota_terisi }})</span></p>
</div>
@endsection
