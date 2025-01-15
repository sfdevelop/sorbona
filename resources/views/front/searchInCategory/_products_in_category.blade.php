<article class="category__body">
    <div class="category__body-head">
        <div class="category__sort sort">
            <div class="sort_pc">
                <p class="sort__title">{{__('front.sort')}}</p>
                <a
                        href="#"
                        data-value="default"
                        @class(['sort__variant', 'active'=> request()->input('sort') == 'default' || request()->input('sort') == null])
                >
                    {{__('front.sort_popular')}}
                </a>
                <a
                        href="#"
                        data-value="asc"
                        @class(['sort__variant', 'active'=> request()->input('sort') === 'asc'])
                >
                    {{__('front.sort_low')}}
                </a>
                <a
                        href="#"
                        data-value="desc"
                        @class(['sort__variant', 'active'=> request()->input('sort') == 'desc'])
                >
                    {{__('front.sort_height')}}
                </a>
            </div>
            <select name="" id="select_ns" class="select_ns">
                <option value="default">{{__('front.sort_popular')}}</option>
                <option value="desc">{{__('front.sort_low')}}</option>
                <option value="asc">{{__('front.sort_height')}}</option>
            </select>
        </div>
        <a href="#" class="category__filter-btn">
            <svg><use xlink:href="{{asset('front/img/icons/icons.svg#icon-mob-filter')}}"></use></svg>
        </a>
    </div>
    <div class="category__product-list product-list">

        @foreach($products as $productInCategory)
            @include('layout.front.product._product', ['product' => $productInCategory] )
        @endforeach

    </div>

    {{ $products->onEachSide(2)->appends($_GET)->links('pagination::sorbona') }}

</article>

@pushonce('frontJs')
   @pushonce('frontJs')
        <script>
            $(document).ready(function() {
                function updateSortParameter(sortValue) {
                    let url = new URL(window.location.href);
                    let params = new URLSearchParams(url.search);

                    params.set('sort', sortValue);

                    window.location.href = `${url.pathname}?${params}`;
                }

                $('.sort__variant').on('click', function(e) {
                    e.preventDefault();
                    let sortValue = $(this).data('value');
                    updateSortParameter(sortValue);
                });

                $('#select_ns').on('change', function() {
                    let sortValue = $(this).val();
                    updateSortParameter(sortValue);
                });

                let currentSort = '{{ request()->input('sort') }}';
                $('li.option').removeClass('selected').each(function() {
                    if ($(this).data('value') === currentSort) {
                        $(this).addClass('selected');
                        $('span.current').text($(this).text());
                    }
                });
            });
        </script>
    @endpushonce
@endpushonce
