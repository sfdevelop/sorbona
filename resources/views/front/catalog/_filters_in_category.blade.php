<sidebar class="category__sidebar">
    <div class="filters">
        <div class="filters__head">
            <h3 class="filters__head-title">{{__('front.filters')}}</h3>
            <a href="{{route('category', $category->slug)}}" id="clear-all" class="filters__head-btn">{{__('front.clean')}}</a>
            <button class="filters__close">
                <svg>
                    <use xlink:href="{{asset('front/img/icons/icons.svg#icon-close')}}"></use>
                </svg>
            </button>
        </div>

        @include('front.catalog.filters.__priceFilter')
        @include('front.catalog.filters.__manufacturerFilter')
        @include('front.catalog.filters.__allFilters')


{{--        <div class="filters__buttons">--}}
{{--            <a href="#" id="filter_apply" class="filters__apply">Применить</a>--}}
{{--        </div>--}}
    </div>
</sidebar>

