<div>
    <div class="form-group__inputs">
        {{--        <div class="form__item">--}}
        {{--            <label for="np-city" class="form__label">{{ __('checkout.delivery_method_np_city') }}</label>--}}
        {{--            <select id="np-city" name="np_city"--}}
        {{--                    wire:model="selectedNpCity"--}}
        {{--                    placeholder="{{ __('checkout.delivery_method_np_city_placeholder') }}" class="form__select wide">--}}
        {{--                <option value="" disabled=""--}}
        {{--                        >{{ __('checkout.delivery_method_np_city_placeholder') }}</option>--}}
        {{--                @foreach($cities as $city)--}}
        {{--                    <option value="{{$city->ref}}" {{ $selectedNpCity == $city->ref ? 'selected' : '' }}>{{$city->name}} </option>--}}
        {{--                @endforeach--}}
        {{--            </select>--}}
        {{--            @if ($errors->has('selectedNpCity'))--}}
        {{--                <div class="invalid-feedback">{{ $errors->first('selectedNpCity') }}</div>--}}
        {{--            @endif--}}
        {{--        </div>--}}

        {{--        @if(!empty($depots))--}}
        {{--            <div class="form__item">--}}
        {{--                <label for="np-depot" class="form__label">{{ __('checkout.delivery_method_np_depot') }}</label>--}}
        {{--                <select id="np-depot"--}}
        {{--                        wire:model="selectedNpDepot"--}}
        {{--                        placeholder="{{ __('checkout.delivery_method_np_depot_placeholder') }}" class="form__select wide">--}}
        {{--                    <option value="" disabled=""--}}
        {{--                            selected="">{{ __('checkout.delivery_method_np_depot_placeholder') }}</option>--}}
        {{--                    @foreach($depots as $depot)--}}
        {{--                        <option value="{{$depot->ref}}" {{ $selectedNpDepot == $depot->ref ? 'selected' : '' }}>{{$depot->name}} </option>--}}
        {{--                    @endforeach--}}
        {{--                </select>--}}
        {{--                @if ($errors->has('selectedNpDepot'))--}}
        {{--                    <div class="invalid-feedback">{{ $errors->first('selectedNpDepot') }}</div>--}}
        {{--                @endif--}}
        {{--            </div>--}}
        {{--        @endif--}}


        <div class="input-wrap wrap_delivery form__item @error('selectedNpCity') error @enderror">
            <input class="form__input" wire:model="city" type="text" placeholder="{{ __('checkout.delivery_method_np_city') }}">


            @if(!empty($cities) && $cities->count()>0)
                <div class="dropdown_cities">
                    @foreach($cities as $citySelect)
                        <div
                                class="dropdown_cities__item"
                                wire:click="selectCity('{{$citySelect->ref}}', '{{$citySelect->name}}')"
                        >
                            {{$citySelect->name}}
                        </div>
                    @endforeach
                </div>
            @endif

            @error('city')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror

                            @if ($errors->has('selectedNpDepot'))
                                <div class="invalid-feedback">{{ $errors->first('selectedNpDepot') }}</div>
                            @endif
        </div>

        @if(!empty($depots) || $depot !== '')
            <div class="input-wrap wrap_delivery form__item @error('selectedNpDepot') error @enderror">
                <input class="form__input" wire:model="depot" type="text" placeholder="{{ __('checkout.delivery_method_np_depot') }}">


                @if(!empty($depots) && $depots->count()>0)
                    <div class="dropdown_cities">
                        @foreach($depots as $cityDepot)
                            <div
                                    class="dropdown_cities__item"
                                    wire:click="selectDepot('{{$cityDepot->ref}}', '{{$cityDepot->name}}')"
                            >
                                {{$cityDepot->name}}
                            </div>
                        @endforeach
                    </div>
                @endif

                @error('selectedNpDepot')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror

            </div>
        @endif

    </div>
</div>

@pushonce('frontJs')
    <script>
        function initNiceSelect() {
//            console.log('Initializing NiceSelect');
//            console.log('Current selectedNpCity:', '{{ $selectedNpCity }}');
//            console.log('Current selectedNpDepot:', '{{ $selectedNpDepot }}');


            destroyNiceSelect('np-city');
            destroyNiceSelect('np-depot');


            if (document.getElementById('np-city')) {
                var options_np_city = {
                    searchable: true,
                    placeholder: "{{ __('checkout.delivery_method_np_city_placeholder') }}",
                    searchtext: "{{ __('checkout.search_text') }}"
                };
                NiceSelect.bind(document.getElementById('np-city'), options_np_city);

                updateNiceSelectDisplay('np-city');
            }


            if (document.getElementById('np-depot')) {
                var options_np_depot = {
                    searchable: true,
                    placeholder: "{{ __('checkout.delivery_method_np_depot_placeholder') }}",
                    searchtext: "{{ __('checkout.search_text') }}"
                };
                NiceSelect.bind(document.getElementById('np-depot'), options_np_depot);


                updateNiceSelectDisplay('np-depot');
            }
        }

        function destroyNiceSelect(selectId) {
            const select = document.getElementById(selectId);
            if (!select) return;

            const niceSelectElement = select.nextElementSibling;
            if (niceSelectElement && niceSelectElement.classList.contains('nice-select')) {
                niceSelectElement.remove();
            }
        }

        function updateNiceSelectDisplay(selectId) {
            const select = document.getElementById(selectId);
            if (!select) return;

            const selectedOption = select.options[select.selectedIndex];
            if (!selectedOption) return;

//            console.log(`Updating ${selectId} display with value:`, selectedOption.value, 'text:', selectedOption.text);

            const niceSelect = select.nextElementSibling;
            if (niceSelect && niceSelect.classList.contains('nice-select')) {
                const current = niceSelect.querySelector('.current');
                if (current) {
                    current.textContent = selectedOption.text;
//                    console.log(`Updated ${selectId} display to:`, current.textContent);
                }

                // Обновляем выбранный элемент в списке
                const list = niceSelect.querySelector('.list');
                if (list) {
                    const items = list.querySelectorAll('li');
                    items.forEach(item => {
                        item.classList.remove('selected');
                        if (item.getAttribute('data-value') === selectedOption.value) {
                            item.classList.add('selected');
                        }
                    });
                }
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
//            console.log('DOMContentLoaded');
            initNiceSelect();

            // Добавляем обработчики событий для синхронизации с Livewire
            document.addEventListener('change', function (e) {
                if (e.target && e.target.id === 'np-city') {
//                    console.log('City changed to:', e.target.value);
                    @this.
                    set('selectedNpCity', e.target.value);
                    @this.
                    set('selectedNpCity', e.target.value);
                }

                if (e.target && e.target.id === 'np-depot') {
//                    console.log('Depot changed to:', e.target.value);
                    @this.
                    set('selectedNpDepot', e.target.value);
                }
            });


            document.addEventListener('click', function (e) {
                if (e.target && e.target.closest('.nice-select')) {
                    const niceSelect = e.target.closest('.nice-select');
                    const selectId = niceSelect.previousElementSibling.id;

                    if (e.target.tagName === 'LI') {
                        const value = e.target.getAttribute('data-value');
//                        console.log(`NiceSelect ${selectId} clicked with value:`, value);


                        const select = document.getElementById(selectId);
                        if (select) {
                            select.value = value;


                            const event = new Event('change', {bubbles: true});
                            select.dispatchEvent(event);
                        }
                    }
                }
            });
        });


        document.addEventListener('livewire:load', function () {
//            console.log('Livewire loaded');

            Livewire.hook('message.processed', (message, component) => {
//                console.log('Livewire message processed', message);
                setTimeout(() => {
                    initNiceSelect();
                }, 100);
            });


            window.addEventListener('updatedNpData', function () {
//                console.log('updatedNpData event received');
                setTimeout(() => {
                    initNiceSelect();
                }, 100);
            });
        });
    </script>
@endpushonce
