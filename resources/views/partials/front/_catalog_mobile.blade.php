<header class="header mobile">
    <div class="header__container--big">
        <div class="header__col">
            <button class="header__burger">
                <svg>
                    <use xlink:href="{{asset('front/img/icons/icons.svg#icon-burger')}}"></use>
                </svg>
                <svg>
                    <use xlink:href="{{asset('front/img/icons/icons.svg#icon-close')}}"></use>
                </svg>
            </button>
            <a href="{{route('home')}}" class="header__logo">
                <img src="{{asset('front/img/header-logo.svg')}}" alt="Sorbona" loading="lazy" class="img-full"/>
            </a>
        </div>
        <div class="header__col">
            <div class="header__search">
                <button class="search_open-mob">
                    <svg>
                        <use xlink:href="{{asset('front/img/icons/icons.svg#icon-search')}}"></use>
                    </svg>
                </button>
                <button class="search_close-mob">
                    <svg>
                        <use xlink:href="{{asset('front/img/icons/icons.svg#icon-label-open')}}"></use>
                    </svg>
                </button>
                <!-- search-mobile-live-wire start -->
                <div class="search">
                @livewire('front.search.search-mobile-live-wire')
                </div>
                <!-- search-mobile-live-wire end -->
            </div>

            <div class="header__basket">
                <div class="header__basket_icon">
                    <svg>
                        <use xlink:href="{{asset('front/img/icons/icons.svg#icon-basket')}}"></use>
                    </svg>
                </div>
                <span>{{__('front.cart')}}</span>
            </div>
            <div class="mini-cart empty">
                <div class="mini-cart__wrapper">
                    <div class="mini-cart__close">
                        <svg>
                            <use xlink:href="{{asset('front/img/icons/icons.svg#icon-close')}}"></use>
                        </svg>
                    </div>
                    <div class="mini-cart__empty">
                        <img src="{{asset('front/img/empty-mini-cart.png')}}" alt="image" loading="lazy">
                        <p>{{__('front.cart_empty')}}</p>
                    </div>
                </div>
            </div>

            @include('partials.front._lang')
        </div>
    </div>


    <div class="menu" id="menu">
        <div class="menu__container">
            <div class="menu__wrap">
                <div class="header__catalog">
                    <div class="catalog-btn">
                        <svg>
                            <use xlink:href="{{asset('front/img/icons/icons.svg#icon-burger')}}"></use>
                        </svg>
                        <p>{{__('front.catalog_products')}}</p>
                    </div>

                    @include('partials.front._catalog')

                </div>

                @include('partials.front.__nav')

                <div class="header__line"></div>
                <a href="#authorization" data-fancybox class="header__login">
                    <div class="header__login-icon">
                        <svg>
                            <use xlink:href="{{asset('front/img/icons/icons.svg#icon-login')}}"></use>
                        </svg>
                    </div>
                    <div class="header__login-text">{{__('front.sign_in')}}</div>
                </a>

                <div class="header__line"></div>
                <div class="phone">
                    <div class="phone__item">
                        <svg>
                            <use xlink:href="{{asset('front/img/icons/icons.svg#icon-phone')}}"></use>
                        </svg>
                        <a href="tel:{{$settings->phone}}">{{$settings->phone}}</a>
                    </div>
                    <div class="phone__item">
                        <svg>
                            <use xlink:href="{{asset('front/img/icons/icons.svg#icon-phone')}}"></use>
                        </svg>
                        <a href="tel:{{$settings->phone2}}">{{$settings->phone2}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
