{{-- resources/views/landing/documentation/index.blade.php --}}
@extends('layouts.app') {{-- Ganti dengan layout publik utama kamu, misal: layouts.landing --}}

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Dokumentasi Kegiatan</h2>

    @forelse($documentations as $doc)
        <div class="mb-5">
            <h4>{{ $doc->judul_kegiatan ?? '(Tanpa Judul)' }}</h4>
            <p>{{ \Illuminate\Support\Str::limit($doc->deskripsi, 150) }}</p>

            <div class="row">
                @foreach($doc->images->take(3) as $img)
                    <div class="col-md-4 mb-3">
                        <img src="{{ asset('storage/' . $img->image_path) }}" class="img-fluid rounded">
                        @if($img->caption)
                            <p class="text-muted mt-1">{{ $img->caption }}</p>
                        @endif
                    </div>
                @endforeach
            </div>

            <a href="{{ route('landing.documentation.show', $doc->id) }}" class="btn btn-outline-primary btn-sm">Lihat Selengkapnya</a>
        </div>
    @empty
        <p>Tidak ada dokumentasi tersedia.</p>
    @endforelse
</div>
@endsection
