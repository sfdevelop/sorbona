<div class="col-lg-12 mb-25">
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
                                    title="{{__('admin.title')}}*"
                                    name="title"
                                    :item="$item"
                                    :locale="$locale"
                            />

                            <x-text-area-lang
                                with="25"
                                title="{{__('admin.description')}}"
                                name="description"
                                :item="$item"
                                :locale="$locale"
                            />

                        </div>
                    @endforeach
                </div>
            </div>

        </div>
        {{--        end tabs--}}
    </div>
</div>
