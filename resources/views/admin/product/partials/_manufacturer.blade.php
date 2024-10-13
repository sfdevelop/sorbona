<div class="col-12 col-lg-6">
    @php /** @var \App\Models\Product $item */ @endphp
    <div class="form-group select-px-15 tagSelect-rtl">
        <label class="il-gray fs-14 fw-500 align-center mb-10">{{__('admin.manufacturer')}}</label>
        <select
                name="manufacturer_id"
                class="form-control manufacture {{ $errors->has('manufacture_id') ? ' is-invalid' : '' }}"
        >
            <option></option>
            @foreach(ManufacturerFacade::getAllManufacturers() as $manufacture)
                <option value="{{$manufacture->id}}">{{$manufacture->title}}</option>
            @endforeach
        </select>


        @if ($errors->has('manufacturer_id'))
            <span class="error text-danger small">{{ $errors->first('manufacturer_id') }}</span>
        @endif
    </div>
</div>

@pushonce('js')
    <script>
        $(document).ready(function () {
            $('.manufacture').select2().val({{$item->manufacturer_id ?? null}}).trigger('change')
        });
    </script>
@endpushonce