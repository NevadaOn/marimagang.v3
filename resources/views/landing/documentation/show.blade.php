@extends('layouts.landing')

@section('content')
    <div class="cover-home3">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="text-center mt-70">
                        <h1 class="color-linear d-inline-block mb-30">
                            {{ $documentation->judul_kegiatan ?? 'Dokumentasi Kegiatan' }}
                        </h1>
                        <p class="text-xl color-gray-500">
                            {{ $documentation->deskripsi }}
                        </p>
                    </div>

                    <div class="row mt-70 mb-50 justify-content-center">
                        @forelse($documentation->images as $img)
                            <div class="col-12 mb-5">
                                <div class="text-center">
                                    <img src="{{ asset('storage/' . $img->image_path) }}" class="img-fluid rounded hover-up hover-shadow" alt="{{ $img->caption }}">
                                    @if($img->caption)
                                        <p class="text-muted text-center mt-3">{{ $img->caption }}</p>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center">
                                <p class="text-xl color-gray-500">Tidak ada gambar yang tersedia untuk kegiatan ini.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection