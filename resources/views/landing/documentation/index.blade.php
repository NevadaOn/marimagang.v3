@extends('layouts.landing')

@section('content')
    <div class="cover-home3">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="text-center mt-70">
                        <h1 class="color-linear d-inline-block mb-30">Dokumentasi Kegiatan</h1>
                        <p class="text-xl color-gray-500">Lihat dokumentasi dari berbagai kegiatan yang telah kami laksanakan.</p>
                    </div>

                    <div class="mt-70 mb-50">
                        <div class="row">
                            @forelse($documentations as $doc)
                                <div class="col-lg-4 col-md-6 mb-4 wow animate__animated animate__fadeInUp">
                                    <div class="documentation-card border-gray-800 p-4 rounded-2xl">
                                        <div class="image-wrapper position-relative overflow-hidden rounded-2xl mb-3">
                                            <a href="{{ route('landing.documentation.show', $doc->id) }}">
                                                <img src="{{ asset('storage/' . $doc->images->first()->image_path ?? 'placeholder.jpg') }}" class="img-fluid rounded hover-up" alt="{{ $doc->judul_kegiatan }}">
                                                <div class="image-overlay d-flex align-items-center justify-content-center">
                                                    <span class="btn btn-linear btn-sm">Lihat Selengkapnya</span>
                                                </div>
                                            </a>
                                        </div>
                                        <h4 class="color-white mb-2">{{ $doc->judul_kegiatan ?? '(Tanpa Judul)' }}</h4>
                                        <p class="text-sm color-gray-500">{{ \Illuminate\Support\Str::limit($doc->deskripsi, 100) }}</p>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center">
                                    <p class="text-xl color-gray-500">Tidak ada dokumentasi tersedia saat ini.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
.documentation-card {
    cursor: pointer;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.documentation-card .image-wrapper {
    flex-grow: 1;
}

.documentation-card img {
    transition: transform 0.5s, filter 0.5s;
    height: 100%;
    object-fit: cover;
}

.documentation-card:hover img {
    transform: scale(1.05);
    filter: blur(2px) brightness(0.7);
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
    opacity: 0;
    transition: opacity 0.5s;
    backdrop-filter: blur(2px);
    -webkit-backdrop-filter: blur(2px);
}

.documentation-card:hover .image-overlay {
    opacity: 1;
}

.image-overlay .btn {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.5s, transform 0.5s;
}

.documentation-card:hover .image-overlay .btn {
    opacity: 1;
    transform: translateY(0);
}
</style>
