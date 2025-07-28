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

<!-- Bootstrap -->
<link rel="stylesheet" href="{{ asset('style/css/bootstrap.min.css') }}">

<!-- File Upload -->
<link rel="stylesheet" href="{{ asset('style/css/file-upload.css') }}">

<!-- Plyr -->
<link rel="stylesheet" href="{{ asset('style/css/plyr.css') }}">

<!-- DataTables - gunakan asset lokal -->
<link rel="stylesheet" href="{{ asset('style/css/dataTables.min.css') }}">

<!-- Full Calendar -->
<link rel="stylesheet" href="{{ asset('style/css/full-calendar.css') }}">

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

<!-- Main CSS -->
<link rel="stylesheet" href="{{ asset('style/css/main.css') }}">

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>


<!-- Additional page-specific CSS -->
@stack('styles')