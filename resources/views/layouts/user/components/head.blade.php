<!-- head.blade.php -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Dashboard MariMagang Diskominfo Kabupaten Malang">
<meta name="keywords" content="magang, diskominfo, malang, dashboard">
<meta name="author" content="Diskominfo Kab.Malang">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Title -->
<title>@yield('title', 'Dashboard') - MariMagang Diskominfo Kab.Malang</title>

<!-- Favicon -->
<link rel="icon" type="image/png" href="{{ asset('img/rb_30833.png') }}">

<!-- Muat di seluruh halaman -->
<link rel="stylesheet" href="{{ asset('style/css/bootstrap.min.css') }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables - gunakan asset lokal -->
 @if(request()->is('welcome'))
    <link rel="stylesheet" href="{{ asset('style/css/dataTables.min.css') }}">
@endif


<!-- Full Calendar -->
@if(request()->is('dashboard'))

    <link rel="stylesheet" href="{{ asset('style/css/calendar.css') }}">
@endif







<!-- Main CSS (Digunakan di hampir semua halaman) -->
<link rel="stylesheet" href="{{ asset('style/css/main.css') }}">


<!-- Aset tambahan dari halaman tertentu -->
@stack('styles') {{-- Untuk menambahkan gaya tambahan dari halaman tertentu --}}