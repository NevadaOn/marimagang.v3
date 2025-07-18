@extends('layouts.app') {{-- atau layouts.superadmin jika ingin pakai layout admin --}}

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Detail Bidang</h1>

        <div class="bg-white shadow-md rounded p-6">
            <p><strong>Nama Bidang:</strong> {{ $bidang->nama }}</p>
            <p><strong>Deskripsi:</strong> {{ $bidang->deskripsi ?? '-' }}</p>
            <p><strong>Status:</strong> {{ ucfirst($bidang->status) }}</p>
        </div>

    </div>
@endsection
