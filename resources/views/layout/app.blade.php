<!doctype html>
<html lang=""{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ (Session::get('layout')=='rtl' ? 'rtl' : 'ltr') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="@yield('description')"/>
    <title>FOXiK Admin Panel | @yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset( 'assets/css/plugin' . Helper::rlt_ext() . '.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style' . Helper::rlt_ext() . '.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/variables' . Helper::rlt_ext() . '.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app' . Helper::rlt_ext() . '.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon.png') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.0/css/line.css">
    @livewireStyles
</head>
<body class="layout-light side-menu">
<div class="mobile-search">
    <form action="/" class="search-form">
        <img src="{{ asset('assets/img/svg/search.svg') }}" alt="search" class="svg">
        <input class="form-control me-sm-2 box-shadow-none" type="search" placeholder="Search..." aria-label="Search">
    </form>
</div>
<div class="mobile-author-actions"></div>
<header class="header-top">
    @include('partials._top_nav')
</header>
<main class="main-content">
    <div class="sidebar-wrapper">
        <aside class="sidebar sidebar-collapse" id="sidebar">
            @include('partials._menu')
        </aside>
    </div>
    <div class="contents">
        @yield('content')
    </div>
    <footer class="footer-wrapper">
        @include('partials._footer')
    </footer>
</main>
<div id="overlayer">
        <span class="loader-overlay">
            <div class="dm-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </span>
</div>
<div class="overlay-dark-sidebar"></div>
<div class="customizer-overlay"></div>
<div class="customizer-wrapper">
    @include('partials._customizer')
</div>

<script>
    var env = {
        iconLoaderUrl: "{{ asset('assets/js/json/icons.json') }}",
        googleMarkerUrl: "{{ asset('assets/img/markar-icon.png') }}",
        editorIconUrl: "{{ asset('assets/img/ui/icons.svg') }}",
        mapClockIcon: "{{ asset('assets/img/svg/clock-ticket1.sv') }}g"
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDduF2tLXicDEPDMAtC6-NLOekX0A5vlnY"></script>
<script src="{{ asset('assets/js/plugins.min.js') }}"></script>
<script src="{{ asset('assets/js/script.min.js') }}"></script>
<script src="{{ asset('js/app.min.js') }}"></script>

@stack('js')
@livewireScripts
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    @if(Session::has('success'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.success("{{ session('success') }}");
    @endif

    @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.info("{{ session('warning') }}");
    @endif

    @if (!empty($errors->all()))
    @foreach ($errors->all() as $error)
    toastr.error("{{$error}}")
    @endforeach
    @endif

    window.addEventListener('alert', event => {
            toastr[event.detail.type](event.detail.message,
                event.detail.title ?? ''), toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }

        if (event.detail.reload) {
            window.location.reload();
        }

        },

    );

</script>
</body>
</html>
