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
                    <div wire:ignore>
                        <livewire:admin.modal-filter-value-live-wier :filter-value="$item->id"/>
                        <div class="border-bottom mb-3 mt-3"></div>
                    </div>
                @endforeach
            </div>
            <div class="row border-top py-3">
                <h5 class="pb-3">{{__('admin.addValue')}}</h5>
{{--                <br>--}}
{{--                <div class="form-check mb-3">--}}
{{--                    <input class="form-check-input" type="checkbox" wire:model="show" id="showUkField">--}}
{{--                    <label class="form-check-label" for="showUkField">--}}
{{--                        {{ __('admin.show_uk_field') }}--}}
{{--                    </label>--}}
{{--                </div>--}}

                <div class="col-12 col-lg-6">
                    <x-input-live-wier
                            model="title_ru"
                            title="{{__('admin.value')}} {{(!$show) ? 'RU': ''}}"
                    />
                </div>

                @if(! $show)
                    <div class="col-12 col-lg-6">
                        <x-input-live-wier
                                model="title_uk"
                                title="{{__('admin.value')}} UK*"
                        />
                    </div>
                @endif

                <div class="col-12" hidden="">
                    <x-input-live-wier
                            type="number"
                            model="sort"
                            title="{{__('admin.sort')}}*"
                    />
                </div>
                <div class="row">
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
</div>
