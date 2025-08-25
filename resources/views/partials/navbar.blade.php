<!-- Navigation bar: simplified for the modern design with a light background and orange logo -->
<div class="container-fluid p-0">
    <div class="px-lg-5" style="z-index: 9;">
        <nav class="navbar navbar-expand-lg navbar-light py-3">
            <a href="{{ route('home') }}" class="navbar-brand">
                <h1 class="text-uppercase mb-0">ASSAF CARS</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">الرئيسية</a>
                    <a href="{{ route('shipping') }}" class="nav-item nav-link {{ request()->routeIs('shipping') ? 'active' : '' }}">الشحن و الجمارك</a>
                    <a href="{{ route('electric') }}" class="nav-item nav-link {{ request()->routeIs('electric') ? 'active' : '' }}">الادوات الكهربائية</a>
                    <a href="{{ route('cars') }}" class="nav-item nav-link {{ request()->routeIs('cars') ? 'active' : '' }}">قائمة السيارات</a>
                    @auth
                        @if(auth()->user() && auth()->user()->email === 'admin@assaf.com')
                            <a href="{{ route('dashboard') }}" class="nav-item nav-link">لوحة التحكم</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button class="nav-item nav-link btn btn-link text-dark p-0 m-0">تسجيل الخروج</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="nav-item nav-link">تسجيل الدخول</a>
                    @endauth
                </div>
            </div>
        </nav>
    </div>
</div>