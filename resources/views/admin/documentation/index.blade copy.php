@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Daftar Dokumentasi</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @foreach($documentations as $d)
        <div class="card my-3">
            <div class="card-body">
                <h5>{{ $d->judul_kegiatan ?? '(Tanpa Judul)' }}</h5>
                <p>{{ $d->deskripsi }}</p>
                <div class="row">
                    @foreach($d->images as $img)
                        <div class="col-md-3">
                            <img src="{{ asset('storage/' . $img->image_path) }}" class="img-fluid mb-2">
                            <small>{{ $img->caption }}</small>
                        </div>
                    @endforeach
                </div>
                <form method="POST" action="{{ route('admin.documentation.destroy', $d->id) }}">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
