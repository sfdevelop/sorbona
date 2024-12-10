<div class="row">
    <h2 class="my-3">{{__('admin.filterProduct')}}</h2>

    <div class="card">
        <div class="car-body">
            @foreach($productFilters as $productFilter)
                <div class="d-flex justify-content-between my-4">
                    <div>
                        {{ $productFilter->filter->title }}:
                        {{$productFilter->title}}
                    </div>
                    <div>
                        <a class="btn btn-sm btn-danger text-center"
                           title="{{__('admin.delete') }}"
                           wire:click.prevent="deleteAttribute('{{ $productFilter->id }}')"
                        >
                            <i class="las la-minus-circle m-0"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">{{__('admin.addFilterProduct')}}</h5>
            <div class="row">
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
                            <label class="il-gray fs-14 fw-500 align-center mb-10">{{__('admin.value')}}</label>
                            <select
                                    name="value_id"
                                    wire:model="value_id"
                                    class="form-control {{ $errors->has('filter_id') ? ' is-invalid' : '' }}"
                                    wire:change="$emit('valueSelected', $event.target.value)"
                            >
                                <option value="{{null}}"></option>
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
            </div>
            <div class="col-12 mt-3">
                <button
                        class="btn btn-primary"
                        wire:click.prevent="addValueFilterToProduct"
                >
                    {{__('admin.add')}}
                </button>
            </div>

        </div>
    </div>
</div>
