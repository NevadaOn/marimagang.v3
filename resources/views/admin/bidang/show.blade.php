@extends('layouts.superadmin')
@section('content')
<h1 class="text-xl font-bold mb-4">Detail Bidang</h1>

<div class="bg-white shadow p-4 rounded">
    <h2 class="text-lg font-semibold">{{ $bidang->nama }}</h2>
    <p><strong>Deskripsi:</strong> {{ $bidang->deskripsi }}</p>
    <p><strong>Status:</strong> {{ $bidang->status }}</p>
    <p><strong>Kuota:</strong> {{ $bidang->kuota }} (Terisi: {{ $bidang->kuota_terisi }})</p>
</div>
@endsection
