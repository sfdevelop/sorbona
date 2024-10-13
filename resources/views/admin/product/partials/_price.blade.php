<div class="card mt-25">
    <div class="card-body">
        @include('admin.product.partials._currency')
        <div class="card mb-4">
            <div class="card-body">
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
                                title="{{__('admin.sale_text')}}"
                                name="sale"
                                :item="$item"
                        />
                        <div style="font-size: 11px; margin-top: -20px!important;" class="text-gray small">Діє
                            виключно на 1 товар
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6  ">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{__('admin.milkoOpt')}}</h5>
                        <div class="col-12">
                            <x-input
                                    with="25"
                                    type="text"
                                    title="{{__('admin.qty')}}"
                                    name="qtyMilkoopt"
                                    :item="$item"
                            />
                        </div>

                        <div class="col-12">
                            <x-input
                                    with="25"
                                    type="text"
                                    title="{{__('admin.priceTen')}}"
                                    name="priceTen"
                                    :item="$item"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 ">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{__('admin.opt')}}</h5>
                        <div class="col-12">
                            <x-input
                                    with="25"
                                    type="text"
                                    title="{{__('admin.qty')}}"
                                    name="qtyOpt"
                                    :item="$item"
                            />
                        </div>
                        <div class="col-12">
                            <x-input
                                    with="25"
                                    type="text"
                                    title="{{__('admin.priceTwenty')}}"
                                    name="priceTwenty"
                                    :item="$item"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>