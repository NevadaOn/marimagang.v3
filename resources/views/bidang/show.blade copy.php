@extends('layouts.app') {{-- sesuaikan dengan layoutmu --}}

@section('title', $bidang->nama)

@section('content')
<div class="container py-5">
    <div class="row">
        {{-- FOTO UTAMA --}}
        <div class="col-md-6 mb-4">
            @if($bidang->photo)
                <img src="{{ asset('storage/' . $bidang->photo) }}" alt="Foto Bidang" class="img-fluid rounded shadow">
            @else
                <div class="bg-light text-center py-5 rounded">Tidak ada foto bidang</div>
            @endif
        </div>

        {{-- INFO UTAMA --}}
        <div class="col-md-6">
            <h2 class="mb-3">{{ $bidang->nama }}</h2>
            <p class="text-muted">{{ $bidang->deskripsi }}</p>

            <ul class="list-unstyled mt-4">
                <li><strong>Status:</strong> {{ ucfirst($bidang->status) }}</li>
                <li><strong>Kuota:</strong> {{ $bidang->kuota }}</li>
                <li><strong>Terisi:</strong> {{ $bidang->kuota_terisi }}</li>
                <li><strong>Sisa Kuota:</strong> {{ $bidang->kuota - $bidang->kuota_terisi }}</li>
                <li><strong>Admin Penanggung Jawab:</strong> {{ $bidang->admin->name }}</li>
                <li><strong>Jumlah Pengajuan:</strong> {{ $bidang->pengajuan->count() }}</li>
            </ul>
        </div>
    </div>

    {{-- SKILLS TERKAIT --}}
    <div class="mt-5">
        <h4>Keahlian yang Dibutuhkan</h4>
        @if ($bidang->skills->count())
            <ul class="list-group">
                @foreach ($bidang->skills as $skill)
                    <li class="list-group-item">
                        {{ $skill->nama }}
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-muted">Belum ada keahlian ditentukan.</p>
        @endif
    </div>
</div>
@endsection
