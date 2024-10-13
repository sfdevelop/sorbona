<div class="row">
    <h2>filter</h2>

    <div class="col-12 col-lg-6 ">
        @php /** @var \App\Models\Filter $filter */ @endphp
        <div class="">
            <label class="il-gray fs-14 fw-500 align-center mb-10">{{__('admin.filter')}}</label>
            <select
                    name="filter_id"
                    wire:model="filter_id"
                    class="form-control {{ $errors->has('filter_id') ? ' is-invalid' : '' }}"
                    wire:change="$emit('filterSelected', $event.target.value)"
            >
                <option value="0"></option>
                @foreach($filters as $filter)
                    <option value="{{$filter->id}}">{{$filter->title}}</option>
                @endforeach
            </select>


            @if ($errors->has('filter_id'))
                <span class="error text-danger small">{{ $errors->first('filter_id') }}</span>
            @endif
        </div>
    </div>

    <div class="col-12 col-lg-6 ">
        @php /** @var \App\Models\FilterValue $filterValue */ @endphp
        @if(!empty($filterValues))
            <div class="">
                <label class="il-gray fs-14 fw-500 align-center mb-10">{{__('admin.filter')}}</label>
                <select
                        name="value_id"
                        class="form-control {{ $errors->has('filter_id') ? ' is-invalid' : '' }}"
                        wire:change="$emit('valueSelected', $event.target.value)"
                >
                    <option></option>
                    @foreach($filterValues as $filterValue)
                        <option value="{{$filterValue->id}}">{{$filterValue->title}}</option>
                    @endforeach
                </select>


                @if ($errors->has('value_id'))
                    <span class="error text-danger small">{{ $errors->first('value_id') }}</span>
                @endif
            </div>
        @endif
    </div>

    <button
            class="btn btn-primary"
            wire:click.prevent="addValueFilterToProduct"
    >
        add
    </button>

</div>
