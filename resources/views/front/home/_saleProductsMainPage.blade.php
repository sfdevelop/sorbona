<section class="section">
    <div class="section__container section__container_pb section__container_fullmob">
        <h2 class="section__title">{{__('front.sale_product')}}</h2>
        <div class="product-list">

            @foreach ($mainPageSaleProducts as $productSale)
                @include('layout.front.product._product', ['product' => $productSale] )
            @endforeach
        </div>
    </div>
</section>