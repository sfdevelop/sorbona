<div class="category-listt">
    <div class="category-listt__inner">
        <button class="category-listt__close"></button>
        <ul>
            <button class="category-listt__title active">
                {{__('front.filter_color')}}
            </button>
            <ul class="category-listt__chek-list">
                @foreach($uniqueColors as $color)
                    @php /** @var $color */ @endphp
                    <li>
                        <button
                                data-color_id="{{$color->id}}"
                                @class([
                                             'category-listt__chek',
                                             'active'=> isIdInArray(request()->query('colors'), $color['id'])
                                     ])

                        >
                            <span></span>
                            {{$color->title}}
                        </button>
                    </li>
                @endforeach
            </ul>
        </ul>
    </div>
    <div class="category-listt__box">
        <button
                id="apply-btn"
                class="btn btn--yellow"
        >
            {{__('front.apply')}}
        </button>
        <a
                href="{{route('filter', $category->slug) }}"
                class="btn btn-clear"
        >
            {{__('front.clear')}}
        </a>
    </div>
</div>

@pushonce('frontJs')
    <script src="{{asset('js/filterFromProduct.js')}}"></script>
@endpushonce