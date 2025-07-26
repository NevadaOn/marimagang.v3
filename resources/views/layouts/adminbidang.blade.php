<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>@yield('title', 'Admin Bidang Dashboard - Diskominfo Kab.malang')</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    {{-- Anda bisa menambahkan CSS atau script tambahan khusus untuk head di sini --}}
    @stack('styles')
    <style>
        margin-left: 260px;
    min-height: 100vh;
    padding: 20px;
    position: relative;
    z-index: 1;

    
.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 260px;
    height: 100vh;
    z-index: 1000;
    backdrop-filter: blur(20px);
    background: rgba(13, 0, 255, 0.08);
    border-right: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
}

.sidebar-content {
    height: 100%;
    padding: 1rem 0;
    overflow-y: auto;
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
}

.logo-container .logo-image {
    width: 110px;
    height: 110px;
    border-radius: 50%;
    padding: 12px;
    background: rgb(0, 0, 0);
    border: 2px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 0 25px rgba(102, 212, 255, 0.4);
    transition: all 0.3s ease;
}

.logo-container .logo-image:hover {
    transform: scale(1.05);
    box-shadow: 0 0 35px rgba(102, 212, 255, 0.6);
}

.brand-text {
    color: #fff;
    text-align: center;
}

.brand-subtitle {
    font-size: 0.85rem;
    opacity: 0.7;
}

.brand-title {
    font-size: 1rem;
    font-weight: 600;
    background: linear-gradient(135deg, #ffffff, #e0e0e0);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.sidebar-nav {
    list-style: none;
    margin-top: 1rem;
}

.sidebar-header {
    padding: 0.75rem 0.5rem;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: rgba(255, 255, 255, 0.5);
}

.sidebar-item {
    margin: 0.25rem 0;
}

.sidebar-link {
    display: flex;
    align-items: center;
    padding: 0.75rem 1rem;
    text-decoration: none;
    border-radius: 10px;
    color: rgba(255, 255, 255, 0.85);
    transition: all 0.3s ease;
    position: relative;
    backdrop-filter: blur(5px);
}

.sidebar-link i {
    margin-right: 12px;
    width: 20px;
    text-align: center;
}

.sidebar-link:hover {
    background: rgba(255, 255, 255, 0.15);
    color: #fff;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    transform: translateX(5px);
}

.sidebar-item.active .sidebar-link {
    background: rgba(255, 255, 255, 0.2);
    color: #fff;
    font-weight: 600;
    box-shadow: inset 4px 0 0 #4fc3f7;
}

.disabled {
    opacity: 0.5;
}




             .main {
                background: 
      radial-gradient(circle at top right, rgba(148, 169, 201, 0.2), transparent 50%),
      radial-gradient(circle at bottom left, rgba(148, 169, 201, 0.15), transparent 50%),
      #0F172A ;
    min-height: 100vh;
    }

    .div.wrapper{
        background-color: #0F172A
    }

    .main > * {
        position: relative;
    }
    
        .navbar {
            background-color: rgba(23, 32, 46, 0) !important;
        }
    
        div.sidebar-content.js-simplebar.bg-nav {
            background-color: #0F172A !important;
        }
    
        a.sidebar-link {
            background-color: transparent;
        }
    </style>
    
</head>
<body>
    <div class="wrapper">
        @include('partials.sidebarbidang') 

        <div class="main" style="">
            @include('partials.navbar')

                    @yield('content')
        </div>
    </div>
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>