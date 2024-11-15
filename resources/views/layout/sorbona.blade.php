<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

@include('layout.front.header')

<body>

@include('layout.front.menu')

@include('partials.front._catalog_mobile')


<main>

    @yield('content')

</main>

<!-- END main page -->

@include('partials.front.__footer')

<script src="{{asset('front/js/plugins/plugins.min.js')}}"></script>

<script src="{{asset('front/js/app.min.js')}}"></script>

</body>

</html>