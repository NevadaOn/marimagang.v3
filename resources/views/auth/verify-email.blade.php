{{-- resources/views/auth/verify-email.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Verifikasi Email Anda</h1>
    <p>Silakan cek email Anda dan klik tautan verifikasi.</p>

    @if (session('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn btn-primary">Kirim Ulang Email Verifikasi</button>
    </form>
</div>

<script>
    setInterval(async () => {
        try {
            const response = await fetch("{{ route('user.check-verification') }}");
            const data = await response.json();

            if (data.verified) {
                window.location.href = "{{ route('dashboard') }}";
            }
        } catch (e) {
            console.error("Error checking verification:", e);
        }
    }, 5000); // cek setiap 5 detik
</script>
@endsection
