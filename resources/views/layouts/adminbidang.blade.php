<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>@yield('title', 'Admin Bidang Dashboard - Diskominfo Kab.malang')</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    {{-- Anda bisa menambahkan CSS atau script tambahan khusus untuk head di sini --}}
    @stack('styles')
    <style>
        .bg-nav{
            background-color: rgb(23, 32, 46) !important;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        @include('partials.sidebarbidang') 

        <div class="main" style="background-image: linear-gradient(135deg, #000000, #374151);">
            @include('partials.navbar')

                    @yield('content')
        </div>
    </div>
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>