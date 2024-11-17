<sidebar class="category__sidebar">
    <div class="filters">
        <div class="filters__head">
            <h3 class="filters__head-title">Фильтры</h3>
            <a href="#" id="clear-all" class="filters__head-btn">Очистить</a>
            <button class="filters__close">
                <svg>
                    <use xlink:href="{{asset('front/img/icons/icons.svg#icon-close')}}"></use>
                </svg>
            </button>
        </div>

        @include('front.catalog.filters.__priceFilter')
        @include('front.catalog.filters.__manufacturerFilter')



        <div class="filters__item ui accordion">
            <div class="filters-item__head title">
                <span class="filters-item__head-title">Материал корпуса</span>
                <svg>
                    <use xlink:href="img/icons/icons.svg#icon-label-open"></use>
                </svg>
            </div>
            <div class="filters-item__body content">
                <div class="filters-item__checkboxes">
                    <div class="chbox">
                        <label class="chbox__label">
                            <input type="checkbox" name="" class="chbox__input" value=""/>
                            <span class="chbox__icon"></span>
                            <p class="chbox__text">Латунь CW617N никелированная <span>(12)</span></p>
                        </label>
                    </div>
                    <div class="chbox">
                        <label class="chbox__label">
                            <input type="checkbox" name="" class="chbox__input" value=""/>
                            <span class="chbox__icon"></span>
                            <p class="chbox__text">Латунь CW617N хромированная <span>(15)</span></p>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="filters__item ui accordion">
            <div class="filters-item__head title">
                <span class="filters-item__head-title">Покрытие</span>
                <svg>
                    <use xlink:href="img/icons/icons.svg#icon-label-open"></use>
                </svg>
            </div>
            <div class="filters-item__body content">
                <div class="filters-item__checkboxes">
                    <div class="chbox">
                        <label class="chbox__label">
                            <input type="checkbox" name="" class="chbox__input" value=""/>
                            <span class="chbox__icon"></span>
                            <p class="chbox__text">Без покрытия <span>(12)</span></p>
                        </label>
                    </div>
                    <div class="chbox">
                        <label class="chbox__label">
                            <input type="checkbox" name="" class="chbox__input" value=""/>
                            <span class="chbox__icon"></span>
                            <p class="chbox__text">Краска <span>(15)</span></p>
                        </label>
                    </div>
                    <div class="chbox">
                        <label class="chbox__label">
                            <input type="checkbox" name="" class="chbox__input" value=""/>
                            <span class="chbox__icon"></span>
                            <p class="chbox__text">Никель <span>(28)</span></p>
                        </label>
                    </div>
                    <div class="chbox">
                        <label class="chbox__label">
                            <input type="checkbox" name="" class="chbox__input" value=""/>
                            <span class="chbox__icon"></span>
                            <p class="chbox__text">Хром <span>(198)</span></p>
                        </label>
                    </div>
                </div>
            </div>
        </div>
{{--        <div class="filters__buttons">--}}
{{--            <a href="#" id="filter_apply" class="filters__apply">Применить</a>--}}
{{--        </div>--}}
    </div>
</sidebar>

