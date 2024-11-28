<div @class(['filters__item ui accordion', 'is-active' => request()->manuf])>
    <div @class(['filters-item__head title', 'active' => request()->manuf]) >
        <span @class(['filters-item__head-title', 'active' => request()->manuf])>{{__('front.marka')}}</span>
        <svg>
            <use xlink:href="{{asset('front/img/icons/icons.svg#icon-label-open')}}"></use>
        </svg>
    </div>
    <div @class(['filters-item__body content ', 'active' => request()->manuf])>
        <label for="filter-search" class="filters-item__search">
            <svg>
                <use xlink:href="{{asset('front/img/icons/icons.svg#icon-search')}}"></use>
            </svg>
            <input id="filter-search" type="search" placeholder="Поиск" autocomplete="off"/>
        </label>
        <div class="filters-item__checkboxes unique-manufacturer-filter">
            @foreach($productsManufacturers as $manufacturer)
                <div class="chbox">
                    <label class="chbox__label">
                        <input
                                type="checkbox"
                                name=""
                                @checked( in_array($manufacturer->id, array_map('intval', explode(',', request()->input('manuf') ?? ''))))
                                class="chbox__input"
                                value="{{$manufacturer->id}}"
                        />
                        <span class="chbox__icon"></span>
                        <p class="chbox__text">{{$manufacturer->name}}
{{--                            <span>({{$manufacturer->product_count}})</span>--}}
                        </p>
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</div>

@pushonce('frontJs')
    <script>
        $(document).ready(function() {

            function getSelectedCheckboxes() {
                let selectedValues = [];
                $('.unique-manufacturer-filter .chbox__input:checked').each(function() {
                    selectedValues.push($(this).val());
                });
                return selectedValues;
            }

            function updateUrlParameter(param, paramVal) {
                let url = new URL(window.location.href);
                url.searchParams.set(param, paramVal);
                window.history.replaceState(null, null, url.toString());
            }

            $('.unique-manufacturer-filter .chbox__input').on('change', function() {
                let selectedValues = getSelectedCheckboxes();
                updateUrlParameter('manuf', selectedValues.join(','));
                location.reload();
            });
        });
    </script>
@endpushonce