<div class="row">
    <div class="col-12 col-lg-8 order-1 order-lg-0">
        <div class=" mb-25">
            @php /** @var \App\Models\Product $item */ @endphp
            <div class="card mt-25">
                <div class="card-body">

                    <div class="col-12 col-lg-12 ">

                        <div class="form-group select-px-15 tagSelect-rtl">
                            <label class="il-gray fs-14 fw-500 align-center mb-10">{{__('admin.category')}}</label>
                            <select
                                    name="category[]"
                                    class="form-control category {{ $errors->has('category') ? ' is-invalid' : '' }}"
                                    multiple="multiple"
                            >
                                @foreach(CategoryFacade::getCategoriesWithoutChildrenCategories() as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>


                            @if ($errors->has('category'))
                                <span class="error text-danger small">{{ $errors->first('category') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-12">
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
                                                'active'=> $key==0
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
                                            'active'=> $key==0
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

                                    @include('layout.SEOData.Seo')

                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                {{--        end tabs--}}

                <div class="row">
                    <div class="col-12 col-lg-6">
                        <x-input
                                with="25"
                                type="text"
                                title="{{__('admin.price')}}"
                                name="price"
                                :item="$item"
                        />
                    </div>
                    <div class="col-12 col-lg-6">
                        <x-input
                                with="25"
                                type="text"
                                title="{{__('admin.newPrice')}}"
                                name="newPrice"
                                :item="$item"
                        />
                    </div>
                </div>


                <x-input
                        with="25"
                        type="number"
                        title="{{__('admin.sort')}}"
                        name="sort"
                        :item="$item"
                />

                <div class="d-flex">
                    <div class="mr-3 pr-4">
                        <label for="is_new">{{__('admin.new')}}</label>
                        <input @checked($item->is_new) type="checkbox" name="is_new" id="is_new">
                    </div>
                    <div class="mr-3 ml-5" style="margin-left: 15px;">
                        <label for="is_bestseller">{{__('admin.bestseller')}}</label>
                        <input @checked($item->is_bestseller) type="checkbox" name="is_bestseller" id="is_bestseller">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4 order-0 order-lg-1">
        @include('layout.admin.vertical_img')

        <div class="mb-4">
            <small class="text-success">Розмір фото повинен бути 800px*60px</small>
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
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script src="{{asset('js/OnlyNumberOrDotInDecimal.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('.category').select2().val({{$item->categories->pluck('id')}}).trigger('change')
        });
    </script>

@endpushonce