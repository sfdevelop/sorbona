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

                                    <x-text-area-lang
                                            with="25"
                                            type="text"
                                            title="{{__('validation.attributes.descriptionShort')}}"
                                            name="descriptionShort"
                                            :item="$item"
                                            :locale="$locale"
                                    />

                                    <x-ckeditor-lang
                                            :item="$item"
                                            :locale="$locale"
                                    />


                                    <div class="form-group">
                                        <label class="col-form-label">{{__('validation.attributes.notoriety')}} {{strtoupper($locale)}}
                                            *</label>
                                        <div
                                                class="form-group{{ $errors->has($locale.'.notoriety') ? ' has-danger' : '' }}">

                                        <textarea
                                                class="w-100 ckeditor"
                                                name="{{$locale}}[notoriety]"
                                                rows="10"
                                        >{{old( $locale.'.notoriety',$item->translate($locale)->notoriety ?? '')  }}</textarea>

                                            @if ($errors->has($locale.'.notoriety'))
                                                <span class="error text-danger small"
                                                >{{ $errors->first($locale.'.notoriety') }}</span>
                                            @endif

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">{{__('validation.attributes.assortment')}} {{strtoupper($locale)}}
                                            *</label>
                                        <div
                                                class="form-group{{ $errors->has($locale.'.assortment') ? ' has-danger' : '' }}">

                                        <textarea
                                                class="w-100 ckeditor"
                                                name="{{$locale}}[assortment]"
                                                rows="10"
                                        >{{old( $locale.'.assortment',$item->translate($locale)->assortment ?? '')  }}</textarea>

                                            @if ($errors->has($locale.'.assortment'))
                                                <span class="error text-danger small"
                                                >{{ $errors->first($locale.'.assortment') }}</span>
                                            @endif

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">{{__('validation.attributes.cooperate')}} {{strtoupper($locale)}}
                                            *</label>
                                        <div
                                                class="form-group{{ $errors->has($locale.'.cooperate') ? ' has-danger' : '' }}">

                                        <textarea
                                                class="w-100 ckeditor"
                                                name="{{$locale}}[cooperate]"
                                                rows="10"
                                        >{{old( $locale.'.cooperate',$item->translate($locale)->cooperate ?? '')  }}</textarea>

                                            @if ($errors->has($locale.'.cooperate'))
                                                <span class="error text-danger small"
                                                >{{ $errors->first($locale.'.cooperate') }}</span>
                                            @endif

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">{{__('validation.attributes.comfort')}} {{strtoupper($locale)}}
                                            *</label>
                                        <div
                                                class="form-group{{ $errors->has($locale.'.comfort') ? ' has-danger' : '' }}">

                                        <textarea
                                                class="w-100 ckeditor"
                                                name="{{$locale}}[comfort]"
                                                rows="10"
                                        >{{old( $locale.'.comfort',$item->translate($locale)->comfort ?? '')  }}</textarea>

                                            @if ($errors->has($locale.'.comfort'))
                                                <span class="error text-danger small"
                                                >{{ $errors->first($locale.'.comfort') }}</span>
                                            @endif

                                        </div>
                                    </div>


                                    {{--                            @include('layout.SEOData.Seo')--}}

                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                {{--        end tabs--}}
            </div>
        </div>
    </div>
</div>

@push('js')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
@endpush