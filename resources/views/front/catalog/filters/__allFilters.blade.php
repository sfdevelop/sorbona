@foreach($productsAllFilters as $filter)
    @php $showAccordion = in_array($filter['filter_id'], array_map('intval', explode(',', request()->input('show') ?? ''))) @endphp
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
                                @disabled(!in_array($filterValue['id'], $allFiltersIds))
                                @readonly(!in_array($filterValue['id'], $allFiltersIds))
                                data-filter_id="{{ $filter['filter_id'] }}"
                                @checked(in_array($filterValue['id'], array_map('intval', explode(',', request()->input('filters') ?? ''))))
                                type="checkbox"
                                name="filters[]"
                                class="chbox__input"
                                value="{{ $filterValue['id'] }}"
                            />
                            <span
                                    class="chbox__icon"
                                    @readonly(!in_array($filterValue['id'], $allFiltersIds))
                                    @disabled(!in_array($filterValue['id'], $allFiltersIds))
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
            $('.unique-filter-container .chbox__input').on('change', function() {
                let url = new URL(window.location.href);
                let params = new URLSearchParams(url.search);

                let existingFilters = params.get('filters') ? params.get('filters').split(',') : [];
                let existingShows = params.get('show') ? params.get('show').split(',') : [];

                let value = $(this).val();
                let filterId = $(this).data('filter_id').toString();

                if ($(this).is(':checked')) {
                    if (!existingFilters.includes(value)) {
                        existingFilters.push(value);
                    }
                    if (!existingShows.includes(filterId)) {
                        existingShows.push(filterId);
                    }
                } else {
                    existingFilters = existingFilters.filter(item => item !== value);
                    if (!$('.unique-filter-container .chbox__input[data-filter_id="' + filterId + '"]:checked').length) {
                        existingShows = existingShows.filter(item => item !== filterId);
                    }
                }

                if (existingFilters.length > 0) {
                    params.set('filters', existingFilters.join(','));
                } else {
                    params.delete('filters');
                }

                if (existingShows.length > 0) {
                    params.set('show', existingShows.join(','));
                } else {
                    params.delete('show');
                }

                window.location.search = params.toString();
            });
        });
    </script>
@endpushonce