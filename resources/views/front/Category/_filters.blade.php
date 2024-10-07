<div class="category-list ">
    <div class="category-list__close">
        <img src="{{asset('front/images/dest/icons/close.svg')}}" alt="close">
    </div>
    <div class="category-list__inner element-animation">
        <ul>
            <button class="category-list__title  active">
                {{__('front.filters_color')}}
            </button>
            <ul class="category-list__chek-list">
                @foreach($filterColors as $color)
                    <li>
                        <button
                                data-colorId="{{$color['id']}}"

                                @class([
                                        'category-list__chek',
                                        'active'=> isIdInArray(request()->query('colors'), $color['id'])
                                ])
                        >
                            <span></span>
                            {{$color['title']}}
                        </button>
                    </li>
                @endforeach

            </ul>
            <button class="category-list__title active">
                {{__('front.filters_size')}}
            </button>
            <ul class="category-list__chek-list">
                @foreach($filterSizes as $size)
                    <li>
                        <button
                                data-sizeId="{{$size['id']}}"
                                @class([
                                         'category-list__chek',
                                         'active'=> isIdInArray(request()->query('sizes'), $size['id'])
                                 ])
                        >
                            <span></span>
                            {{$size['title']}}
                        </button>
                    </li>
                @endforeach
            </ul>
        </ul>
        <div class="range__box">
            <button id="apply" class="category-list__filter-acept">{{__('front.apply')}}</button>
            <a href="{{route('category', $category->slug)}}" class="category-list__filter-clear">{{__('front.clean')}}</a>
        </div>
    </div>
</div>

@push('js_front')
    <script src="{{asset('front/js/filters.js')}}"></script>
@endpush