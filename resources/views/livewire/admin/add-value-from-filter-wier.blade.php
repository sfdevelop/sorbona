<div>
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="pb-3">{{__('admin.filterValues')}}</h5>
            <div class="row">
                @foreach($filters as $item)
                    <div class="d-flex justify-content-between col-lg-12 col-xs-12 mb-4 position-relative">
                        <div class="d-flex w-50 justify-content-between">
                            <div>
                                {{$item->title}}
                            </div>
                            <div>
                                {{$item->sort}}
                            </div>
                        </div>
                        <a title="{{__('admin.delete')}}"
                           href="#"
                           wire:click.prevent="deleteValue( {{ $item->id }} )"
                           class="  btn-danger btn-sm btn-icon text-center">
                            <i class="las la-minus-circle"></i>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row border-top py-3">
                <h5 class="pb-3">{{__('admin.addValue')}}</h5>

                <div class="col-12 col-lg-6">
                    <x-input-live-wier
                            model="title_uk"
                            title="{{__('admin.value')}} UK*"
                    />
                </div>

                <div class="col-12 col-lg-6">
                    <x-input-live-wier
                            model="title_ru"
                            title="{{__('admin.value')}} RU*"
                    />
                </div>

                <div class="col-12">
                    <x-input-live-wier
                            type="number"
                            model="sort"
                            title="{{__('admin.sort')}}*"
                    />
                </div>

                <div class="col-1 mt-3">
                    <button
                            class="btn btn-primary"
                            wire:click.prevent="addValue"
                    >
                        {{__('admin.add')}}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
