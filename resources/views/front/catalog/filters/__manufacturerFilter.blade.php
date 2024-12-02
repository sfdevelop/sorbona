<div @class(['filters__item ui accordion', 'is-active' => request()->brand])>
    <div @class(['filters-item__head title', 'active' => request()->brand]) >
        <span @class(['filters-item__head-title', 'active' => request()->brand])>{{__('front.marka')}}</span>
        <svg>
            <use xlink:href="{{asset('front/img/icons/icons.svg#icon-label-open')}}"></use>
        </svg>
    </div>
    <div @class(['filters-item__body content ', 'active' => request()->brand])>
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
                                @checked(in_array($manufacturer->slug, $manufacturerArray))
                                class="chbox__input"
                                value="{{$manufacturer->slug}}"
                        />
                        <span class="chbox__icon"></span>
                        <p class="chbox__text">{{$manufacturer->name}}
                                                            <span>({{ }})</span>
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

            function updateUrlParameter(param, paramVal, action) {
                let url = new URL(window.location.href);
                let params = url.searchParams;

                if (action === 'add') {
                    params.append(param, paramVal);
                } else if (action === 'remove') {
                    let values = params.getAll(param);
                    params.delete(param);
                    values.forEach(value => {
                        if (value !== paramVal) {
                            params.append(param, value);
                        }
                    });
                }

                window.history.replaceState(null, null, url.toString());
            }

            $('.unique-manufacturer-filter .chbox__input').on('change', function() {
                let value = $(this).val();
                if ($(this).is(':checked')) {
                    updateUrlParameter('brand', value, 'add');
                } else {
                    updateUrlParameter('brand', value, 'remove');
                }
                location.reload();
            });
        });
    </script>
@endpushonce