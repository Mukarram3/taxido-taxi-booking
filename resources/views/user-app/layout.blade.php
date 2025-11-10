<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propositions reçues - Co-transport #CT2024-0847 - Je confie</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')

    <link rel="apple-touch-icon" href="{{asset('assets/images/logo/favicon.png')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @yield('style')

    {{--@laravelPWA--}}
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <script>

        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/sw.js', { scope: '/' })
                .then(() => console.log('✅ Service Worker registered globally'))
                .catch(err => console.error('❌ Service Worker error:', err));
        }
    </script>
</head>

<body>
    <!-- Navigation -->
<nav class="navbar">
    <div class="nav-container">
        <a href="/" class="logo">
            <div class="logo-icon">JC</div>
            <span class="logo-text" data-lang="fr" class="active">Je confie</span>
            <span class="logo-text" data-lang="en">I entrust</span>
        </a>

        <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">☰</button>

        <div class="nav-links" id="navLinks">
            <a href="{{ url('user/my-rides') }}" class="nav-link">
                <span data-lang="fr" class="active">Mes annonces</span>
                <span data-lang="en">My offers</span>
            </a>
            <a href="/messages" class="nav-link">
                <span data-lang="fr" class="active">Messages</span>
                <span data-lang="en">Messages</span>
            </a>
            <a href="{{ url('user/dashboard') }}" class="nav-link">
                <span data-lang="fr" class="active">Tableau de bord</span>
                <span data-lang="en">Dashboard</span>
            </a>
            <a href="/profile" class="nav-link">
                <span data-lang="fr" class="active">Profil</span>
                <span data-lang="en">Profile</span>
            </a>

            <div class="language-switcher">
                <button class="lang-btn active" onclick="switchLanguage('fr')">FR</button>
                <button class="lang-btn" onclick="switchLanguage('en')">EN</button>
            </div>
        </div>
    </div>
</nav>

<div class="mobile-menu-overlay" id="mobileMenuOverlay" onclick="toggleMobileMenu()"></div>

@yield('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    window._token = $('meta[name="csrf-token"]').attr('content')
</script>
@yield('script')

<script>
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
    @endif

    @if(Session::has('error'))
    toastr.error("{{ Session::get('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.info("{{ Session::get('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.warning("{{ Session::get('warning') }}");
    @endif
</script>
</body>
</html>
