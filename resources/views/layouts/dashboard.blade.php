<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','لوحة التحكم')</title>
    <!-- Include global bootstrap and front styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Font Awesome for dashboard icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <!-- Dashboard specific styles -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <!-- Admin page header with brand and quick links -->
    <header class="admin-header d-flex justify-content-between align-items-center">
        <span class="admin-brand">ASSAF CARS</span>
        <div class="admin-links d-flex align-items-center">
            <!-- Link back to main website home -->
            <a href="{{ route('home') }}" class="me-3"><i class="fas fa-home ms-1"></i> الموقع</a>
            @auth
                <!-- Logout button: styled as text link -->
                <form method="POST" action="{{ route('logout') }}" class="d-inline m-0">
                    @csrf
                    <button type="submit" class="btn btn-link p-0"><i class="fas fa-sign-out-alt ms-1"></i> خروج</button>
                </form>
            @endauth
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 sidebar">
                <h4 class="mb-4">لوحة التحكم</h4>
                {{--
                    Navigation links for the admin area. The link back to the main website is now in the page
                    header (see .admin-header), so only admin sections are listed here.
                --}}
                {{-- The home link is moved to the top header. Only internal admin links are listed here. --}}
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"><i class="fas fa-chart-line ms-1"></i> الملخص</a>
                <a href="{{ route('dashboard.cars') }}" class="{{ request()->routeIs('dashboard.cars') ? 'active' : '' }}"><i class="fas fa-car ms-1"></i> السيارات</a>
                <a href="{{ route('dashboard.devices') }}" class="{{ request()->routeIs('dashboard.devices') ? 'active' : '' }}"><i class="fas fa-plug ms-1"></i> الأجهزة</a>
                <a href="{{ route('dashboard.shipments') }}" class="{{ request()->routeIs('dashboard.shipments') ? 'active' : '' }}"><i class="fas fa-shipping-fast ms-1"></i> الشحن والجمارك</a>
                <a href="{{ route('dashboard.requests') }}" class="{{ request()->routeIs('dashboard.requests') ? 'active' : '' }}"><i class="fas fa-file-alt ms-1"></i> طلبات الخدمات</a>
            </nav>
            <main class="col-md-9 col-lg-10 content">
                @yield('content')
            </main>
        </div>
    </div>
    @livewireScripts
</body>
</html>