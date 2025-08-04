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
<link rel="shortcut icon" href="{{ asset('style/images/logo/favicon.png') }}">
<link rel="apple-touch-icon" href="{{ asset('style/images/logo/apple-touch-icon.png') }}">

<!-- Preload critical resources -->
<link rel="preload" href="{{ asset('style/css/main.css') }}" as="style">
<link rel="preload" href="{{ asset('style/js/main.js') }}" as="script">

<!-- Bootstrap (Muat di seluruh halaman) -->
<link rel="stylesheet" href="{{ asset('style/css/bootstrap.min.css') }}">

<!-- File Upload -->
<link rel="stylesheet" href="{{ asset('style/css/file-upload.css') }}">

<!-- Plyr -->
<link rel="stylesheet" href="{{ asset('style/css/plyr.css') }}">

<!-- DataTables - gunakan asset lokal -->
<link rel="stylesheet" href="{{ asset('style/css/dataTables.min.css') }}">

<!-- Full Calendar -->
@if(request()->is('dashboard'))
    <link rel="stylesheet" href="{{ asset('style/css/full-calendar.css') }}">
@endif

<!-- jQuery UI -->
<link rel="stylesheet" href="{{ asset('style/css/jquery-ui.css') }}">

<!-- Editor Quill -->
<link rel="stylesheet" href="{{ asset('style/css/editor-quill.css') }}">

<!-- Apex Charts -->
<link rel="stylesheet" href="{{ asset('style/css/apexcharts.css') }}">

<!-- Calendar -->
<link rel="stylesheet" href="{{ asset('style/css/calendar.css') }}">

<!-- JVector Map -->
<link rel="stylesheet" href="{{ asset('style/css/jquery-jvectormap-2.0.5.css') }}">

<!-- Main CSS (Digunakan di hampir semua halaman) -->
<link rel="stylesheet" href="{{ asset('style/css/main.css') }}">

<!-- JS tambahan untuk halaman tertentu -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<!-- Aset tambahan dari halaman tertentu -->
@stack('styles') {{-- Untuk menambahkan gaya tambahan dari halaman tertentu --}}