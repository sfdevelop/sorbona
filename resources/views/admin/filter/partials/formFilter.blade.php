<div class="row">
    <div class="col-12 col-lg-12 order-1 order-lg-0">
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
                                            title="{{__('admin.title')}}"
                                            name="title"
                                            :item="$item"
                                            :locale="$locale"
                                    />

{{--                                    <x-ckeditor-lang--}}
{{--                                            :item="$item"--}}
{{--                                            :locale="$locale"--}}
{{--                                    />--}}

                                    {{--                            @include('layout.SEOData.Seo')--}}

                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                {{--        end tabs--}}

{{--                <x-input--}}
{{--                        with="25"--}}
{{--                        type="number"--}}
{{--                        title="{{__('admin.sort')}}"--}}
{{--                        name="sort"--}}
{{--                        :item="$item"--}}
{{--                />--}}

                <div class="" style="">
                    <label for="numeric">{{__('admin.show_uk_field')}}</label>
                    <input
                            @checked($item->numeric)
                            type="checkbox"
                            name="numeric"
                            id="numeric"
                    >
                </div>
            </div>
        </div>
    </div>
</div>
