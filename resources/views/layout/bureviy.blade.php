<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

@include('partials.front._header')

<body
        @class([
            "page-filter"=>Request::is(app()->getLocale().'/category/*') || Request::is('category/*'),
            "page-product"=>Request::is(app()->getLocale().'/product/*') || Request::is('product/*') || Request::is(app()->getLocale().'/search') || Request::is('search') && Request::has('search'),
            "page-contacts"=>Request::is(app()->getLocale().'/contacts') || Request::is('contacts'),
            "u-page page-profile" => Request::is(app()->getLocale() . '/cabinet', 'cabinet', app()->getLocale() . '/cabinet/*', 'cabinet/*'),
    ])
>


<div class="wrapper">
    <div class="content">

        @include('partials.front._menu')

        <div id="cursor">
            <div class="cursor--inner"></div>
        </div>

        @yield('content')

    </div>
    @include('partials.front.__footer')
</div>

@include('partials.front._script')


</body>

</html>