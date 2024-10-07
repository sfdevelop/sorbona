<header class="header">
    <div class="container">
        <div class="header__inner">
            <a href="{{route('home')}}" class="header__logo">
                <img src="{{asset('front/images/icons/logo.svg')}}" alt="logo">
            </a>
            <nav class="header__nav">
                <ul>
                    <li>
                        <a href="{{route('home')}}">{{__('front.menu.home')}}</a>
                    </li>
                    <li>
                        <a href="{{route('catalog')}}">{{__('front.menu.catalog')}}</a>
                    </li>
                    <li>
                        <a href="{{route('sale')}}">{{__('front.menu.sale')}}</a>
                    </li>
                    <li>
                        <a href="{{route('bestseller')}}">{{__('front.menu.bestsellers')}}</a>
                    </li>
                </ul>
            </nav>
            <form class="header__search">
                <div class="header__search-icon">
                    <img src="{{asset('front/images/icons/search.svg')}}" alt="search">
                </div>
                <div class="header__search-inner">
                    <div class="header__search-input-wrap">
                        <input type="text" required>
                    </div>
                    <button class="header__search-btn">
                        <img src="{{asset('front/images/icons/search.svg')}}" alt="search">
                    </button>
                </div>
            </form>
            <a href="#" class="header__avatar">
                <span>w</span>
            </a>
            <a href="#" class="header__like">
                <img src="{{asset('front/images/icons/heart.svg')}}" alt="like">
            </a>
            <a href="#" class="header__basket">
                <img src="{{asset('front/images/icons/basket.svg')}}" alt="baket">
                <span>3</span>
            </a>
            @include('partials.front._lang')
            <button class="header__menu-btn">
                <span></span>
            </button>
        </div>
    </div>
</header>