<div class="col-12 col-lg-12 ">
    @php /** @var \App\Models\Product $item */ @endphp
    <div class="form-group select-px-15 tagSelect-rtl">
        <label class="il-gray fs-14 fw-500 align-center mb-10">{{__('admin.currency')}}</label>
        <select
                name="currency_id"
                class="form-control currency {{ $errors->has('currency_id') ? ' is-invalid' : '' }}"
        >
            <option></option>
            @foreach(CurrencyFacade::getAllCurrency() as $currency)
                @php /** @var \App\Models\Currency $currency */ @endphp
                <option value="{{$currency->id}}">{{$currency->title}}</option>
            @endforeach
        </select>


        @if ($errors->has('currency_id'))
            <span class="error text-danger small">{{ $errors->first('currency_id') }}</span>
        @endif
    </div>
</div>

@pushonce('js')
    <script>
        $(document).ready(function () {
            $('.currency').select2().val({{$item->currency_id ?? 'null'}}).trigger('change')
        });
    </script>
@endpushonce