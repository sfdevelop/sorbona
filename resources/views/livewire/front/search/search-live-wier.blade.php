<div>
    <button class="search_open-mob">
        <svg><use xlink:href="{{asset('front/img/icons/icons.svg#icon-search')}}"></use></svg>
    </button>
    <button class="search_close-mob">
        <svg><use xlink:href="{{asset('front/img/icons/icons.svg#icon-label-open')}}"></use></svg>
    </button>
    <form class="search" id="search-form">
        <label for="search">
            <svg><use xlink:href="{{asset('front/img/icons/icons.svg#icon-search')}}"></use></svg>
            <input
                wire:model="search"
                name="search"
                id="search"
                placeholder="{{ __('search.placeholder') }}"
                autocomplete="off"
                type="text"
                class="search__input"
                value="{{ $search }}"
                />
            <svg class="search__input_clear"><use xlink:href="{{asset('front/img/icons/icons.svg#icon-close')}}"></use></svg>
        </label>
        <button type="submit" class="search__button btn btn--line">{{__('front.search')}}</button>
    </form>
    @if($searchFourProducts)
    <div id="search-results" class="search-results" style="display:block">
        <div class="search-results__wrap">
            <p class="search-results__title">{{ __('search.found-in-products') }} {{ $productsCount }}</p>
            <div class="search-results__list">
                @foreach($searchFourProducts as $threeProduct)
                <div class="search-results__item">
                    <a href="{{ route('product', $threeProduct->slug) }}" class="search-results-item__picture">
                        <img src="{{ $threeProduct->img_web }}" loading="lazy" class="img-full" alt="product-search-{{ $threeProduct->title }}"/>
                    </a>
                    <div class="search-results-item__body">
                        <a href="{{ route('product', $threeProduct->slug) }}" class="search-results-item__title"
                        >{{ $threeProduct->title }}</a
                        >
                        <p class="search-results-item__article">{{ __('search.sku') }}: {{ $threeProduct->sku }}</p>
                        <p class="search-results-item__price">{{ $threeProduct->now_price }} ₴</p>
                    </div>
                </div>
                @endforeach
            </div>
            @if (count($searchThreeProducts) > 0)
            <a href="{{ route('search') }}?search={{ $search }}" class="search-results__btn btn btn--line">{{ __('search.show-all-results') }}</a>
            @endif
        </div>
    </div>
    @endif
@pushonce('frontJs')
    <script>
        $(document).ready(function() {
            $('#search-form').on('submit', function (e) {
                e.preventDefault();
                let search = $('#search').val();
                if (search.length > 0)
                    location.href = "{{route('search')}}" + "?search=" + encodeURIComponent(search);
            }
        )});
    </script>
@endpushonce
</div>
