{{-- resources/views/landing/documentation/show.blade.php --}}
@extends('layouts.app') {{-- atau layouts.user / public, tergantung struktur kamu --}}

@section('content')
<div class="container">
    <h2>{{ $documentation->judul_kegiatan ?? '(Tanpa Judul)' }}</h2>
    <p>{{ $documentation->deskripsi }}</p>

    <div class="row mt-4">
        @foreach($documentation->images as $img)
            <div class="col-md-4 mb-3">
                <img src="{{ asset('storage/' . $img->image_path) }}" class="img-fluid rounded">
                @if($img->caption)
                    <p class="text-muted mt-1">{{ $img->caption }}</p>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection
