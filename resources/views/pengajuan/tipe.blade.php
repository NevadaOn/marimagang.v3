@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pilih Tipe Pengajuan</h1>

    <form action="{{ route('pengajuan.selectType') }}" method="POST">
        @csrf

        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipe" id="mandiri" value="mandiri" required>
            <label class="form-check-label" for="mandiri">Mandiri</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipe" id="kelompok" value="kelompok" required>
            <label class="form-check-label" for="kelompok">Kelompok</label>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Lanjutkan</button>
    </form>
</div>
@endsection
