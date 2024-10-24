<div class="row">
    <div class="col-12 col-lg-8 order-1 order-lg-0">
        <div class=" mb-25">
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
                                            title="{{__('admin.titleSectionAboutUs')}}"
                                            name="titleSectionAboutUs"
                                            :item="$item"
                                            :locale="$locale"
                                    />

                                    <x-text-area-lang
                                            with="25"
                                            type="text"
                                            title="{{__('admin.description')}}"
                                            name="description"
                                            :item="$item"
                                            :locale="$locale"
                                    />

                                    <x-input-lang
                                            with="25"
                                            type="text"
                                            title="{{__('admin.titleDownAboutUs')}}"
                                            name="titleDownAboutUs"
                                            :item="$item"
                                            :locale="$locale"
                                    />

                                    <x-text-area-lang
                                            with="25"
                                            type="text"
                                            title="{{__('admin.descriptionRememberAboutUs')}}"
                                            name="descriptionRememberAboutUs"
                                            :item="$item"
                                            :locale="$locale"
                                    />

                                    <x-text-area-lang
                                            with="25"
                                            type="text"
                                            title="{{__('admin.textFeedBackAboutUs')}}"
                                            name="textFeedBackAboutUs"
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
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4 order-0 order-lg-1">
        @include('layout.admin.vertical_img_from_about')

        <div class="mb-4">
            <small class="text-success">{{__('admin.size_photo')}} 625px*770px</small>
        </div>
    </div>
</div>
