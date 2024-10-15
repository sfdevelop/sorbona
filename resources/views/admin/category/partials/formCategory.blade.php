@php /** @var \App\Models\CategoryTest $item */ @endphp

<div class="row">
    <div class="col-12 col-lg-8 order-1 order-lg-0">
        <div class=" mb-25">
            @if($item->childrenCategories->count() < 1 )
                <div class="card mt-25">
                    <div class="card-body">
                        <div class="col-12 col-lg-12">
                            <x-select
                                    title="{{__('admin.category')}}"
                                    name="category_id"
                                    :item="$item"
                                    :categories="CategoryFacade::getMainCategoriesWithChildrenOneLevel()"
                            />
                        </div>
                    </div>
                </div>
            @endif
            <div class="card mt-3">
                <div class="card-body">
                    <x-input
                            with="25"
                            type="text"
                            title="{{__('admin.slug')}}"
                            name="slug"
                            :item="$item"
                    />
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

                                    {{--                            @include('layout.SEOData.Seo')--}}

                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                {{--        end tabs--}}

                <x-input
                        with="25"
                        type="number"
                        title="{{__('admin.sort')}}"
                        name="sort"
                        :item="$item"
                />

                <div class="d-flex flex-column">
                    <div class="mr-3 pr-4">
                        <label for="in_main">{{__('admin.in_main')}}</label>
                        <input @checked($item->in_main) type="checkbox" name="in_main" id="in_main">
                    </div>

                    <div class="mr-3 pr-4">
                        <label for="in_main">{{__('admin.is_public')}}</label>
                        <input @checked($item->is_public) type="checkbox" name="is_public" id="is_public">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4 order-0 order-lg-1">
        @include('layout.admin.vertical_img')

        <div class="mb-4">
            <small class="text-success">Розмір фото повинен бути 100px*100px</small>
        </div>
    </div>
</div>

@push('js')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
@endpush
