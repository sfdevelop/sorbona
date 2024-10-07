<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {!! SEO::generate() !!}
    <meta name="google-site-verification" content="WVRfULpcAhr8fLY5XHUc60fWIlO8n3GH5fcDny6kNgg"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
          integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"
          integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="icon" type="image/png" sizes=326x32" href="{{ asset('front/images/dest/content/favicon.png') }}">

    <link rel="stylesheet" href="{{asset('front/css/app.min.css?v=61916')}}">
    <link rel="stylesheet" href="{{asset('front/css/custom.css?v=154330')}}">
    @livewireStyles

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXGGDFX3DG"></script>
    <script>  window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'G-XXGGDFX3DG'); </script>

    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1505978449994515');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=1505978449994515&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Meta Pixel Code -->

</head>

<body
    @style([
        "background-image: url('/front/images/dest/content/main-bg.jpg')",
        "background-image: url('/front/images/dest/content/article-bg.jpg')"=>Request::is(app()->getLocale().'/blog/*'),
        "background-image: url('/front/images/dest/content/article-bg2.jpg')"=>Request::is(app()->getLocale().'/blog/*'),
])
>

<div class="wrapper">
    <div class="content">

        @include('partials.front.__header')

        @yield('content')

    </div>

    <a href="#" class="arrow-up">
        <img src="{{asset('front/images/dest/icons/arrow-up.svg')}}" alt="arrow-up">
    </a>
    <div class="footer">
        <div class="container">
            <div class="footer__inner">
                <a href="#" class="footer__logo">
                    <img src="{{asset('front/images/dest/icons/logo.svg')}}" alt="logo">
                </a>
                <ul>
                    <li>
                        <a href="{{route('home')}}#about">{{__('front.menu.about')}}</a>
                    </li>
                    <li>
                        <a href="{{route('menu')}}">{{__('front.menu.our_menu')}}</a>
                    </li>
                    <li>
                        <a href="{{route('home')}}#preference">{{__('front.menu.our_how')}}</a>
                    </li>
                    <li>
                        <a href="{{route('home')}}#cost">{{__('front.menu.price')}}</a>
                    </li>
                    <li>
                        <a href="{{route('home')}}#reviews">{{__('front.menu.comment')}}</a>
                    </li>
                    <li>
                        <a href="{{route('blog')}}">{{__('front.menu.blog')}}</a>
                    </li>
                    <li>
                        <a href="{{route('home')}}#contacts">{{__('front.menu.contacts')}}</a>
                    </li>
                    <li>
                        <a href="{{route('home')}}#questions">{{__('front.menu.faq')}}</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="container">
                <div class="footer__bottom-inner">
                    <p class="footer__copyright">
                        © Copyright {{now()->format('Y')}}, Розроблено SFdevelop
                    </p>

                    <a class="footer__copyright" target="_blank" href="{{asset('pdf/oferta.pdf')}}">
                        {{__('front.oferta')}}
                    </a>

                    <ul>
                        <li>
                            <img src="{{asset('front/images/dest/content/way.svg')}}" alt="way">
                        </li>
                        <li>
                            <img src="{{asset('front/images/dest/icons/privat.svg')}}" alt="privat">
                        </li>
                        <li>
                            <img src="{{asset('front/images/dest/icons/mono.svg')}}" alt="mono">
                        </li>
                        <li>
                            <img src="{{asset('front/images/dest/icons/master-card.svg')}}" alt="master">
                        </li>
                        <li>
                            <img src="{{asset('front/images/dest/icons/visa.svg')}}" alt="visa">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.front.__modals')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"
        integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<script src="{{asset('front/js/app.min.js?v=61837')}}"></script>
<script src="{{asset('front/js/jquery.ksmoothscroll.min.js')}}"></script>
<script src="{{asset('front/js/modal_review_custom.js')}}"></script>
@livewireScripts

<script>
    (function ($) {
        $(function () {
            $('body').kSmoothScroll({
                duration: 400,
                fixedHeaderHeight: 90,
                fixedHeaderSelector: ".header-offset:visible",
            });
        })
    })(jQuery);
</script>
</body>

</html>
