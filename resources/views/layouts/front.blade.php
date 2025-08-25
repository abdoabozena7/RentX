<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'ASSAF CARS')</title>
    <!-- Font Awesome (للعرض الصحيح للأيقونات) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Modern UI stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <!-- Top bar -->
    @include('partials.topbar')
    <!-- Navigation bar -->
    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    <!-- Bootstrap JS (loaded from CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Minimal custom JS -->
    <script src="{{ asset('js/main.js') }}"></script>
    @livewireScripts
</body>
</html>