<h5>
    <span class="">3.</span>
    {{__('front.delivery_nova_pochta')}}
</h5>
<div class="select-wrap ">

    <span>{{__('front.region')}}</span>
    <div class="select">
        <select
                class="region"
                id="region"
                name="region"
                wire:ignore
                wire:model="selectedRegion"
                wire:key="regions-select"
        >

            <option value=""></option>
            @foreach($regions as $region)
                @php /** @var \App\Models\StatesNovaPochta $region */ @endphp
                <option value="{{$region}}">{{$region}}</option>
            @endforeach

        </select>
    </div>

</div>

<div class="select-wrap ">
    <span>{{__('front.city')}}</span>
    <div class="select">
        <select
                class="city"
                id="city"
                name="city"
                wire:model="selectedCity"
                wire:init
        >
            @foreach($cities as $city)
                @php /** @var \App\Models\StatesNovaPochta $city */ @endphp
                <option value="{{$city}}">{{$city}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="select-wrap ">
    <span>{{__('front.department')}}</span>
    <div class="select">
        <select
                class="department"
                id="sectionPochta"
                wire:model="selectedPochta"
                name="sectionPochta"
        >

            @foreach($sectionPochta as $section)
                @php /** @var \App\Models\StatesNovaPochta $section */ @endphp
                <option value="{{$section}}">{{$section}}</option>
            @endforeach

        </select>
    </div>
</div>

@push('js_front')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/uk.min.js"></script>

    <script>

        // Функція для ініціалізації Select2
        function initializeSelect2() {
            $("#region, #city, #sectionPochta").select2({
                // minimumResultsForSearch: -1
                language: "{{app()->getLocale()}}",
                placeholder: ''
            });

            // pochtas();
        }

        // Обробка зміни вибору області
        $('#region').on('change', function () {
            Livewire.emit('selectRegion', $(this).val());

        });

        // Обробка зміни вибору міста
        $('#city').on('change', function () {
            Livewire.emit('selectCity', $(this).val());
        });

        // Обробка зміни відділення
        $('#sectionPochta').on('change', function () {
            Livewire.emit('selectSectionPochta', $(this).val());
        });

        // Ініціалізація Select2 при завантаженні сторінки
        $(document).ready(function () {
            initializeSelect2();
        });

        // Ініціалізація Select2 після завантаження сторінки та обробки повідомлень Livewire
        document.addEventListener('livewire:load', function () {
            Livewire.hook('message.processed', initializeSelect2);
        });


        // pochtomats
        // function pochtas() {
        //
        //     let myInput = $('#myInput');
        //     if (myInput.length > 0 && myInput.val() && myInput.val().length < 1) {
        //         $('#myList').hide();
        //     }
        //
        //     myInput.on('input', function () {
        //         let inputVal = $(this).val();
        //         let myList = $('#myList');
        //         let city = $('#city').val();
        //
        //         if (inputVal.length > 1) {
        //             Livewire.emit('getPochtomatFromSearch', inputVal, city);
        //
        //             myList.show();
        //             myInput.focus();
        //         } else {
        //             myList.hide();
        //         }
        //     });
        //
        //     // Скрываем список при клике вне input'а и списка
        //     $(document).on('click', function (event) {
        //         var target = $(event.target);
        //         if (!target.is('#myInput') && !target.closest('#myList').length) {
        //             $('#myList').hide();
        //         }
        //
        //     });
        //
        //     $('.pochtomat__list div').on('click', function () {
        //         var text = $(this).text();
        //         $('#myInput').val(text);
        //         $('#myList').hide();
        //         Livewire.emit('selectSectionPochta', text);
        //     });
        // }

        window.addEventListener('focusInput', event => {
                let inputFocus = $('#myInput');
                inputFocus.val(event.detail.textSearch);
                inputFocus.focus();
                // inputFocus[0].setSelectionRange(inputFocus.length, inputFocus.length);
            },
        );
    </script>
@endpush