<div class="row">

    <div class="col-12 col-lg-8 order-1 order-lg-0">
        <div class=" mb-25">
            @php /** @var \App\Models\Product $item */ @endphp


            <div class="card mt-25 p-4">

                {{--        tabs--}}
                <div class="tab-wrapper">

                    <div class="dm-tab tab-horizontal">
                        <ul class="nav nav-tabs vertical-tabs" role="tablist">

                            @foreach(config('translatable.locales') as $key=> $locale)
                                <li class="nav-item">
                                    <a
                                            @class([
                                                'nav-link',
                                                'active'=> $key==0,
                                            ])
                                            id="tab-v-{{ strtoupper($locale) }}-tab"
                                            data-bs-toggle="tab"
                                            href="#tab-v-{{ strtoupper($locale) }}"
                                            role="tab"
                                            aria-selected="true"
                                    >
                                        {{ strtoupper($locale) }}
                                    </a>
                                </li>

                            @endforeach
                        </ul>

                        <div class="tab-content">
                            @foreach(config('translatable.locales') as $key=> $locale)
                                <div
                                        @class([
                                            'tab-pane fade show',
                                            'active'=> $key==0,
                                        ])
                                        id="tab-v-{{ strtoupper($locale) }}"
                                        role="tabpanel"
                                        aria-labelledby="tab-v-{{ strtoupper($locale) }}-tab"
                                >
                                    {{--                            <p>{{ strtoupper($locale) }}</p>--}}

                                    <x-input-lang
                                            with="25"
                                            type="text"
                                            title="{{__('admin.title')}}"
                                            name="title"
                                            :item="$item"
                                            :locale="$locale"
                                    />

                                    <x-ckeditor-lang
                                            :item="$item"
                                            :locale="$locale"
                                    />

                                    {{--                                    @include('layout.SEOData.Seo')--}}

                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                {{--        end tabs--}}


                <div class="card mt-25">
                    <div class="card-body">

                        @include('admin.product.partials._category')

                        <div class="row">

                            @include('admin.product.partials._manufacturer')

                            <div class="col-12 col-lg-6">

                                <x-input
                                        with="25"
                                        type="text"
                                        title="{{__('admin.sku')}}"
                                        name="sku"
                                        :item="$item"
                                />

                            </div>
                        </div>
                    </div>
                </div>

                @include('admin.product.partials._price')

                <div class="card mt-4">
                    <div class="card-body">
                        @if($item->exists)
                            <x-input
                                    with="25"
                                    type="number"
                                    title="{{__('admin.sort')}}"
                                    name="sort"
                                    :item="$item"
                            />
                        @endif
                        <div class="d-flex flex-column">

                            <div class="mr-3 ">
                                <label for="is_new">{{__('admin.new')}}</label>
                                <input
                                        @checked($item->is_new)
                                        type="checkbox"
                                        name="is_new"
                                        id="is_new"
                                >
                            </div>

                            <div class="" style="">
                                <label for="is_public">{{__('admin.is_public')}}</label>
                                <input
                                        @checked($item->is_public)
                                        type="checkbox"
                                        name="is_public"
                                        id="is_public"
                                >
                            </div>

                            <div class="" style="">
                                <label for="is_top">{{__('admin.is_top')}}</label>
                                <input
                                        @checked($item->is_top)
                                        type="checkbox"
                                        name="is_top"
                                        id="is_top"
                                >
                            </div>

                            <div class="" style="">
                                <label for="in_stock">{{__('admin.in_stock')}}</label>
                                <input
                                        @checked($item->in_stock)
                                        type="checkbox"
                                        name="in_stock"
                                        id="in_stock"
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4 order-0 order-lg-1">
        @include('layout.admin.vertical_img')

        <div class="mb-4">
            <small class="text-success">{{__('admin.size_photo')}} 1060px*1000px</small>
        </div>
    </div>
</div>
<style>
    .select2-selection--multiple {
        overflow: hidden !important;
        height: auto !important;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .select2-selection__choice {
        margin-top: 4px;
        margin-bottom: 4px;
    }
</style>
@pushonce('js')
    <script src="{{asset('js/OnlyNumberOrDotInDecimal.js')}}"></script>
@endpushonce