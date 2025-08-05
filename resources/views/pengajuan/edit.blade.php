@extends('layouts.user.app')

@section('content')
<div class="container">
    <h3>Edit Pengajuan</h3>

    <form action="{{ route('pengajuan.update', $pengajuan->kode_pengajuan) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $pengajuan->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai', $pengajuan->tanggal_mulai->format('Y-m-d')) }}">
        </div>

        <div class="mb-3">
            <label>Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" value="{{ old('tanggal_selesai', $pengajuan->tanggal_selesai->format('Y-m-d')) }}">
        </div>

        <hr>
        <h5>Dokumen</h5>
        @php
            $dokumenTypes = ['surat_pengantar' => 'Surat Pengantar', 'proposal' => 'Proposal'];
        @endphp

        @foreach ($dokumenTypes as $type => $label)
            @php
                $existing = $pengajuan->documents->firstWhere('document_type', $type);
            @endphp
            <div class="mb-3">
                <label>{{ $label }}</label>
                @if ($existing)
                    <p>Dokumen lama: <a href="{{ asset('storage/' . $existing->file_path) }}" target="_blank">{{ $existing->file_name }}</a></p>
                @endif
                <input type="file" name="dokumen[{{ $type }}]" class="form-control">
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Perbarui Pengajuan</button>
    </form>
</div>
@endsection
