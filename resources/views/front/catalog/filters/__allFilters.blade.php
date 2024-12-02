@foreach($productsAllFilters as $filter)
    @php $showAccordion = in_array($filter['filter_parent_slug'], $arrayUrlParameters) @endphp
    <div @class(['filters__item ui accordion', 'is-active' => $showAccordion])>
        <div @class(['filters-item__head title', 'active' => $showAccordion])>
            <span class="filters-item__head-title">
                {{ $filter['filter_name'] }}
            </span>
            <svg>
                <use xlink:href="{{ asset('front/img/icons/icons.svg#icon-label-open') }}"></use>
            </svg>
        </div>
        <div @class(['filters-item__body content ', 'active' => $showAccordion])>
            <div class="filters-item__checkboxes unique-filter-container">
                @foreach($filter['values'] as $filterValue)
                    <div class="chbox">
                        <label class="chbox__label">
                            <input
{{--                                @disabled(!in_array($filterValue['slug'], $arrayParametersValues))--}}
{{--                                @readonly(!in_array($filterValue['slug'], $arrayParametersValues))--}}
                                data-filter_id="{{ $filter['filter_id'] }}"
                                data-parent="{{ $filter['filter_parent_slug'] }}"
                                @checked(in_array($filterValue['slug'], $arrayParametersValues))
                                type="checkbox"
                                name="filters[]"
                                class="chbox__input"
                                value="{{ $filterValue['slug'] }}"
                            />
                            <span
                                    class="chbox__icon"
{{--                                    @readonly(!in_array($filterValue['slug'], $arrayParametersValues))--}}
{{--                                    @disabled(!in_array($filterValue['slug'], $arrayParametersValues))--}}
                            ></span>
                            <p class="chbox__text">
                                {{ $filterValue['title'] }}
{{--                                <span>({{ $filterValue['id'] }})</span>--}}
                            </p>
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endforeach
<style>
    input[type="checkbox"]:disabled + .chbox__icon + .chbox__text {
        color: #ccc!important; /* Text color for the <p> element */
    }
</style>
@pushonce('frontJs')
    <script>
        $(document).ready(function() {
            $('.unique-filter-container input[type="checkbox"]').on('change', function() {
                let url = new URL(window.location.href);
                let params = new URLSearchParams(url.search);
                let parent = $(this).data('parent');
                let value = $(this).val();

                if (this.checked) {
                    // Додаємо новий параметр
                    params.append(parent, value);
                } else {
                    // Видаляємо параметр
                    let entries = params.entries();
                    params = new URLSearchParams();
                    for(let pair of entries) {
                        if (!(pair[0] === parent && pair[1] === value)) {
                            params.append(pair[0], pair[1]);
                        }
                    }
                }

                // Оновлюємо URL і перезавантажуємо сторінку
                url.search = params.toString();
                window.location.href = url.toString();
            });
        });
    </script>
@endpushonce