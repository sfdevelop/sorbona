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
                <form action="" method="get" class="search">
                    <label for="search">
                        <svg>
                            <use xlink:href="{{asset('front/img/icons/icons.svg#icon-search')}}"></use>
                        </svg>
                        <input name="search" id="search" placeholder="{{__('front.search')}}" type="search" class="search__input"/>
                        <svg class="search__input_clear">
                            <use xlink:href="{{asset('front/img/icons/icons.svg#icon-close')}}"></use>
                        </svg>
                    </label>
                    <button type="submit" class="search__button btn btn--line">{{__('front.search')}}</button>
                </form>
                <div id="search-results" class="search-results">
                    <div class="search-results__wrap">
                        <p class="search-results__title">Найдено в товарах</p>
                        <div class="search-results__list">
                            <div class="search-results__item">
                                <a href="product.html" class="search-results-item__picture">
                                    <img src="img/product/product-img1.png" alt="image" loading="lazy"
                                         class="img-full"/>
                                </a>
                                <div class="search-results-item__body">
                                    <a href="product.html" class="search-results-item__title"
                                    >Кран угловой шаровый 1/2" - 1/2" P0710 (NOV06) ARCO Spain</a
                                    >
                                    <p class="search-results-item__article">Артикул: 376142</p>
                                    <p class="search-results-item__price">233.10 ₴</p>
                                </div>
                            </div>
                            <div class="search-results__item">
                                <a href="product.html" class="search-results-item__picture">
                                    <img src="img/product/product-img1.png" alt="image" loading="lazy"
                                         class="img-full"/>
                                </a>
                                <div class="search-results-item__body">
                                    <a href="product.html" class="search-results-item__title"
                                    >Кран угловой шаровый 1/2" - 1/2" P0710 (NOV06) ARCO Spain</a
                                    >
                                    <p class="search-results-item__article">Артикул: 376142</p>
                                    <p class="search-results-item__price">233.10 ₴</p>
                                </div>
                            </div>
                            <div class="search-results__item">
                                <a href="product.html" class="search-results-item__picture">
                                    <img src="img/product/product-img1.png" alt="image" loading="lazy"
                                         class="img-full"/>
                                </a>
                                <div class="search-results-item__body">
                                    <a href="product.html" class="search-results-item__title"
                                    >Кран угловой шаровый 1/2" - 1/2" P0710 (NOV06) ARCO Spain</a
                                    >
                                    <p class="search-results-item__article">Артикул: 376142</p>
                                    <p class="search-results-item__price">233.10 ₴</p>
                                </div>
                            </div>
                            <div class="search-results__item">
                                <a href="product.html" class="search-results-item__picture">
                                    <img src="img/product/product-img1.png" alt="image" loading="lazy"
                                         class="img-full"/>
                                </a>
                                <div class="search-results-item__body">
                                    <a href="product.html" class="search-results-item__title"
                                    >Кран угловой шаровый 1/2" - 1/2" P0710 (NOV06) ARCO Spain</a
                                    >
                                    <p class="search-results-item__article">Артикул: 376142</p>
                                    <p class="search-results-item__price">233.10 ₴</p>
                                </div>
                            </div>
                            <div class="search-results__item">
                                <a href="product.html" class="search-results-item__picture">
                                    <img src="img/product/product-img1.png" alt="image" loading="lazy"
                                         class="img-full"/>
                                </a>
                                <div class="search-results-item__body">
                                    <a href="product.html" class="search-results-item__title"
                                    >Кран угловой шаровый 1/2" - 1/2" P0710 (NOV06) ARCO Spain</a
                                    >
                                    <p class="search-results-item__article">Артикул: 376142</p>
                                    <p class="search-results-item__price">233.10 ₴</p>
                                </div>
                            </div>
                        </div>
                        <a href="search-results-page.html" class="search-results__btn btn btn--line">Показать все
                            результаты поиска</a>
                    </div>
                </div>
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
            <div class="layout"></div>

            @include('partials.front._lang')
        </div>
    </div>


    <div class="menu" id="menu">
        <div class="menu__container">
            <div class="menu__wrap">
                <div class="header__catalog">
                    <div class="catalog-btn">
                        <svg>
                            <use xlink:href="{{asset('front/img/icons/icons.#icon-burger')}}"></use>
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