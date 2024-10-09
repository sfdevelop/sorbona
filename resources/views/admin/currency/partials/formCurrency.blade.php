<div class="row">
    <div class="col-12 col-lg-12 order-1 order-lg-0">
        <div class=" mb-25">
            <div class="card mt-25 p-4" {{($item->title == 'UAH') ?  'hidden' : '' }}>
                <x-input
                        with="25"
                        type="text"
                        title="{{__('admin.title')}}"
                        name="title"
                        :item="$item"
                />

                <x-input
                        with="25"
                        type="text"
                        title="{{__('admin.currency')}}"
                        name="currency"
                        :item="$item"
                />
            </div>
        </div>
    </div>
</div>