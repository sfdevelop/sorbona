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
                                    title="{{__('admin.address')}}*"
                                    name="address"
                                    :item="$item"
                                    :locale="$locale"
                            />

                            <x-input-lang
                                    with="25"
                                    type="text"
                                    title="{{__('admin.text')}}*"
                                    name="text"
                                    :item="$item"
                                    :locale="$locale"
                            />

                            <x-text-area-lang
                                    with="25"
                                    type="text"
                                    title="{{__('admin.textForMail')}}*"
                                    name="textForMail"
                                    :item="$item"
                                    :locale="$locale"
                            />


                            <div class="row">
                                <div class="col col-md-6">
                                    <x-input-lang
                                            with="25"
                                            type="text"
                                            title="{{__('validation.attributes.work')}}"
                                            name="work"
                                            :item="$item"
                                            :locale="$locale"
                                    />
                                </div>
                                <div class="col col-md-6">
                                    <x-input-lang
                                            with="25"
                                            type="text"
                                            title="{{__('validation.attributes.weekend')}}"
                                            name="weekend"
                                            :item="$item"
                                            :locale="$locale"
                                    />
                                </div>
                            </div>
                            @include('layout.SEOData.Seo')
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
        {{--        end tabs--}}
    </div>
</div>


<x-input
        with="25"
        type="email"
        title="Email*"
        name="email"
        :item="$item"
/>
<div class="row">
    <div class="col col-sm-6">
        <x-input
                with="25"
                type="string"
                title="{{__('validation.attributes.phone')}}*"
                name="phone"
                :item="$item"
        />
    </div>
    <div class="col col-sm-6">
        <x-input
                with="25"
                type="string"
                title="{{__('validation.attributes.phone')}}2"
                name="phone2"
                :item="$item"
        />
    </div>
</div>

<div class="row">
    <div class="col col-sm-4">
        <x-input
                with="25"
                type="string"
                title="Viber"
                name="facebook"
                :item="$item"
        />
    </div>

    <div class="col col-sm-4">
        <x-input
                with="25"
                type="string"
                title="Telegram"
                name="instagram"
                :item="$item"
        />
    </div>

    <div class="col col-sm-4">
        <x-input
                with="25"
                type="string"
                title="linkedin"
                name="linkedin"
                :item="$item"
        />
    </div>
</div>

{{--<x-text-area--}}
{{--        with="25"--}}
{{--        title="{{__('validation.attributes.map')}}"--}}
{{--        name="map"--}}
{{--        :item="$item"--}}
{{--/>--}}




