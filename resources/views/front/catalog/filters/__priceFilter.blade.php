<div @class(['filters__item ui accordion', 'is-active' => request()->price])>
    <div @class(['filters-item__head title', 'active' => request()->price]) >
        <span @class(['filters-item__head-title', 'active' => request()->price])>{{__('front.price')}}</span>
        <svg>
            <use xlink:href="{{asset('front/img/icons/icons.svg#icon-label-open')}}"></use>
        </svg>
    </div>
    <div @class(['filters-item__body content ', 'active' => request()->price])>
        <div class="filters-item__range">

            <input
                    data-min="{{$minPrice}}"
                    data-max="{{$maxPrice}}"
                    data-from="{{(request()->price)? explode(',', request()->price)[0] : $minPrice}}"
                    data-to="{{(request()->price)? explode(',', request()->price)[1] : $maxPrice}}"
                    type="range"
                    name=""
                    class="js-range-slider"
                    id="js-range-slider"
            />

            <div class="filters-item__range_num">
                        <span>{{__('front.in')}}<input type="text" name="area_from" class="js-input-from rang_slider_from sf_from"
                                        value="100" readonly/></span>
                <span>{{__('front.to')}} <input type="text" name="area_to" class="js-input-to rang_slider_to" value="5000"
                                readonly/></span>
            </div>

        </div>
    </div>
</div>

@pushonce('frontJs')
    <script>
        $(document).ready(function () {

            let ionSlider = $("#js-range-slider")
            let sliderInstance = ionSlider.data("ionRangeSlider");
            let debounceTimer;

            ionSlider.on("change", function (event) {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(function () {
                    let data = sliderInstance.result;


                    let minSelected = data.from;
                    let maxSelected = data.to;

                    updateUrlParameterAndReload('price', `${minSelected},${maxSelected}`);
                }, 300);
            });

            function updateUrlParameterAndReload(param, value) {
                let url = new URL(window.location.href);
                let params = new URLSearchParams(url.search);

                params.set(param, value);

                window.location.href = `${url.pathname}?${params}`;
            }
        });
    </script>
@endpushonce