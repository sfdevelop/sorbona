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

            <div class="header__search">
            @livewire('front.search.search-live-wier')
            </div>

            <div class="header__line"></div>

            <div>
                @livewire('front.layout.header-user-live-wire')
            </div>



            <span class="header__line"></span>
            <div>
            @livewire('front.layout.header-basket-live-wire')
            </div>
        </div>
    </div>
</header>
