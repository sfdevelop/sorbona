<section class="section">
    <div class="section__container section__container_pb section__container_fullmob">
        <h2 class="section__title">{{__('front.new_catalog')}}</h2>
        <div class="product-list">

            @foreach ($mainPageNewProducts as $product)
                @include('layout.front.product._product', ['product' => $product] )
            @endforeach
        </div>
    </div>
</section>