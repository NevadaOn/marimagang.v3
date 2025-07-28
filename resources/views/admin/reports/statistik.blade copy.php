@extends('layouts.superadmin')
@section('content')
<h1 class="text-xl font-bold mb-4">Statistik Sistem</h1>

<ul class="list-disc ml-6 space-y-2">
    <li>Total Pengguna: {{ $totalPengguna }}</li>
    <li>Total Pengajuan: {{ $totalPengajuan }}</li>
    <li>Disetujui: {{ $pengajuanDisetujui }}</li>
    <li>Ditolak: {{ $pengajuanDitolak }}</li>
</ul>
@endsection
