<div>
<form id="search-form-mobile" class="search">
    <label for="search">
        <svg>
            <use xlink:href="{{asset('front/img/icons/icons.svg#icon-search')}}"></use>
        </svg>
        <input value="{{ $search }}" wire:model="search" autocomplete="off" name="search" id="search-mobile" placeholder="{{__('front.search')}}" type="search" class="search__input"/>
        <svg class="search__input_clear">
            <use xlink:href="{{asset('front/img/icons/icons.svg#icon-close')}}"></use>
        </svg>
    </label>
    <button type="submit" class="search__button btn btn--line">{{__('front.search')}}</button>
</form>
@if($searchFourProducts)
<div id="search-results" class="search-results">
    <div class="search-results__wrap">
        <p class="search-results__title">{{ __('search.found-in-products') }} {{ $productsCount }}</p>
        <div class="search-results__list">
            @foreach($searchFourProducts as $threeProduct)
            <div class="search-results__item">
                <a href="{{ route('product', $threeProduct->slug) }}" class="search-results-item__picture">
                    <img src="{{ $threeProduct->img_web }}" alt="product-search-{{ $threeProduct->title }}" loading="lazy"
                         class="img-full"/>
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
        <a href="{{ route('search', $search) }}" class="search-results__btn btn btn--line">{{ __('search.show-all-results') }}</a>
        @endif
    </div>
</div>
</div>
@endif
@pushonce('frontJs')
    <script>
        $(document).ready(function() {
            $('#search-form-mobile').on('submit', function (e) {
                    e.preventDefault();
                    let search = $('#search-mobile').val();
                    if (search.length > 0)
                        location.href = "{{route('search')}}" + "?search=" + encodeURIComponent(search);
                }
            )});
    </script>
@endpushonce
