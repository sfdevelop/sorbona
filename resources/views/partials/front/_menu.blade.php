<header class="header">
    <div class="container">
        <div class="header__inner element-animation">
            <a href="{{route('home')}}" class="header__logo">
                <img src="{{asset('front/images/dest/icons/logo.svg')}}" alt="logo">
            </a>
            <nav class="header__menu">

                <div class="header__menu-top">
                    <div class="header__search">
                        <button type="submit" class="header__search-resalt">
                            <img src="{{asset('front/images/dest/icons/search.svg')}}" alt="search">
                        </button>
                        <form method="GET" action="{{ route('search') }}">
                            <input name="search" id="search" type="text" placeholder="Search">
                        </form>
                    </div>

                    @include('partials.front.__userPart')

                    @livewire('front.wishlist.count-wishlist-live-wier')
                </div>

                <ul>
                    <li>
                        <a href="{{route('home')}}">
                            {{__('front.menu.home')}}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('aboutUs')}}">
                            {{__('front.menu.about')}}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('catalog')}}">
                            {{__('front.menu.catalog')}}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('contacts')}}">
                            {{__('front.menu.contacts')}}
                        </a>
                    </li>
                </ul>

                <ul class="social">
                    @php /** @var \App\Models\Setting $setting */ @endphp
                    <li>
                        <a href="{{$setting->instagram}}" rel="nofollow noopener noreferrer" target="_blank">
                            <img src="{{asset('front/images/dest/icons/inst.svg')}}" alt="icon">
                        </a>
                    </li>
                    <li>
                        <a href="{{$setting->linkedin}}" rel="nofollow noopener noreferrer" target="_blank">
                            <img src="{{asset('front/images/dest/icons/tiktok.svg')}}" alt="icon">
                        </a>
                    </li>
                    <li>
                        <a href="{{$setting->facebook}}" rel="nofollow noopener noreferrer" target="_blank">
                            <img src="{{asset('front/images/dest/icons/fb.svg')}}" alt="icon">
                        </a>
                    </li>
                </ul>

            </nav>

            <div class="header__search cast">
                <div class="header__search-btn">
                    <img src="{{ asset('front/images/dest/icons/search.svg') }}" alt="search-1">
                </div>
                <button class="header__search-resalt">
                    <img src="{{ asset('front/images/dest/icons/search.svg') }}" alt="search">
                </button>
                <form method="GET" action="{{ route('search') }}">
                    <input
                            id="search"
                            name="search"
                            type="text"
                            placeholder="{{__('front.search')}}"
                    >
                </form>
            </div>

            @include('partials.front.__userPart')

            @livewire('front.wishlist.count-wishlist-live-wier')

            @livewire('front.cart.cart-in-front-live-wier')

            @include('partials.front._lang')

            <button class="header__menu-btn">
                <span></span>
            </button>
        </div>
    </div>
</header>

@push('js_front')

@endpush