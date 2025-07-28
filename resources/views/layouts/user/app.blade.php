<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.user.components.head')
    <title>@yield('title', 'MariMagang - Dashboard')</title>
</head>
<body>

    <div class="preloader"><div class="loader"></div></div>
    <div class="side-overlay"></div>

    @include('layouts.user.components.sidebar')

    <div class="dashboard-main-wrapper">
        @include('layouts.user.components.topbar')

        <div class="dashboard-body">
            @yield('content')
            
        </div>

        @include('layouts.user.components.footer')
    </div>

    @include('layouts.user.components.scripts')

</body>
</html>
