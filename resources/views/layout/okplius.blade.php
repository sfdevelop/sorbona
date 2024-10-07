<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

@include('layout.front.header')

<body>

@include('layout.front.menu')

<div class="wrapper">

    <main class="main">
        @yield('content')
    </main>

    @include('layout.front.footer')

</div>


@include('layout.front.footerJs')

</body>

</html>