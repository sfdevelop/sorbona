<header class="header pc">
    <div class="header__top">
        <div class="header__container--big">
            <a href="{{route('home')}}" class="header__logo">
                <img src="{{asset('front/img/header-logo.svg')}}" alt="Sorbona" loading="lazy" class="img-full"/>
            </a>

            @include('partials.front.__nav')

            <div class="header__top_group">
                <div class="phone">
                    <div class="phone__item">
                        <svg>
                            <use xlink:href="{{asset('front/img/icons/icons.svg#icon-phone')}}"></use>
                        </svg>
                        <a href="tel:{{$settings->phone}}">{{$settings->phone}}</a>
                    </div>
                    <div class="phone__more">
                        <svg>
                            <use xlink:href="{{asset('front/img/icons/icons.svg#icon-label-open')}}"></use>
                        </svg>
                    </div>
                    <div class="phone__list">
                        <a href="tel:{{$settings->phone2}}" class="phone-list__item">{{$settings->phone2}}</a>
                    </div>
                </div>
                @include('partials.front._lang')
            </div>
        </div>
    </div>
    <div class="header__bottom">
        <div class="header__container--big">
            <div class="header__catalog">
                <div class="catalog-btn">
                    <svg><use xlink:href="{{asset('front/img/icons/icons.svg#icon-burger')}}"></use></svg>
                    <p>{{__('front.catalog_products')}}</p>
                </div>

               @include('partials.front._catalog')

            </div>

            @livewire('front.search.search-live-wier')

            <div class="header__line"></div>

            @guest
                <a href="{{route('login')}}"
                   class="header__login"
                >
                    <div class="header__login-icon">
                        <svg><use xlink:href="{{asset('front/img/icons/icons.svg#icon-login')}}"></use></svg>
                    </div>
                    <div class="header__login-text">{{__('front.sign_in')}}</div>
                </a>
            @endguest

            @auth
                <a href="{{route('cabinet')}}" class="header__login autorized">
                    <div class="header__login-icon">
                        <svg><use xlink:href="{{asset('front/img/icons/icons.svg#icon-login')}}"></use></svg>
                    </div>
                    <div class="header__login-text">{{auth()->user()->name ?? ''}}</div>
                </a>
            @endauth



            <span class="header__line"></span>
            <div class="header__basket">
                <div class="header__basket_icon">
                    <svg><use xlink:href="{{asset('front/img/icons/icons.svg#icon-basket')}}"></use></svg>
                </div>
                <span>{{__('front.cart')}}</span>
            </div>
            <div class="mini-cart empty">
                <div class="mini-cart__wrapper">
                    <div class="mini-cart__close">
                        <svg><use xlink:href="{{asset('front/img/icons/icons.svg#icon-close')}}"></use></svg>
                    </div>
                    <div class="mini-cart__empty">
                        <img src="{{asset('front/img/empty-mini-cart.png')}}" alt="image" loading="lazy">
                        <p>{{__('front.cart_empty')}}</p>
                    </div>
                </div>
            </div>
            <div class="layout"></div>

        </div>
    </div>
</header>
