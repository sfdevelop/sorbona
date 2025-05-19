@extends('layout.sorbona')
@section('content')
    <section class="section section_lite">
        <div class="section__container--medium section__container_checkout">
            <div class="complete">
                <div class="complete__head">
                    <h2 class="complete-head__title">{{ __('cart.thx-title', ['order_id' => '123']) }}</h2>
                </div>
                <div class="complete__wrap">
                    <div class="complete__body">
                        <div class="complete-body__head">
                            <h2 class="complete-body-head__title">{{ __('cart.thx-products-in-order') }}</h2>
                        </div>
                        <div class="complete-body__list">
                            <div class="checkout-order__item">
                                <a href="product.html" class="checkout-order-item__picture">
                                    <img src="img/product/product-img1.png" alt="image" loading="lazy" class="img-full" />
                                </a>
                                <div class="checkout-order-item__body">
                                    <a href="product-autorized.html" class="checkout-order-item__title"
                                    >Кран угловой шаровый 1/2" - 1/2" P0710 (NOV06) ARCO Spain</a
                                    >
                                    <p class="checkout-order-item__article">{{ __('cart.sku') }} 376142</p>
                                    <div class="checkout-order-item__bottom">
                                        <p class="checkout-order-item__num">{{ __('cart.count_long') }}<span>1</span></p>
                                        <div class="checkout-order-item__price">233.10 ₴</div>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout-order__item">
                                <a href="product.html" class="checkout-order-item__picture">
                                    <img src="img/product/product-img1.png" alt="image" loading="lazy" class="img-full" />
                                </a>
                                <div class="checkout-order-item__body">
                                    <a href="product-autorized.html" class="checkout-order-item__title"
                                    >Кран угловой шаровый 1/2" - 1/2" P0710 (NOV06) ARCO Spain</a
                                    >
                                    <p class="checkout-order-item__article">Артикул: 376142</p>
                                    <div class="checkout-order-item__bottom">
                                        <p class="checkout-order-item__num">Кол-во, шт: <span>1</span></p>
                                        <div class="checkout-order-item__price">233.10 ₴</div>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout-order__item">
                                <a href="product.html" class="checkout-order-item__picture">
                                    <img src="img/product/product-img1.png" alt="image" loading="lazy" class="img-full" />
                                </a>
                                <div class="checkout-order-item__body">
                                    <a href="product-autorized.html" class="checkout-order-item__title"
                                    >Кран угловой шаровый 1/2" - 1/2" P0710 (NOV06) ARCO Spain</a
                                    >
                                    <p class="checkout-order-item__article">Артикул: 376142</p>
                                    <div class="checkout-order-item__bottom">
                                        <p class="checkout-order-item__num">Кол-во, шт: <span>1</span></p>
                                        <div class="checkout-order-item__price">233.10 ₴</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="complete__info">
                        <div class="complete-info__item">
                            <h5 class="complete-info__title">Доставка</h5>
                            <p class="complete-info__text">В отделение новой почты</p>
                            <p class="complete-info__text">г. Харьков, отд. №164, ул. Тракторостроителей 64б</p>
                            <p class="complete-info__text">TTH: 20450714677564</p>
                        </div>
                        <div class="complete-info__item">
                            <h5 class="complete-info__title">Оплата</h5>
                            <p class="complete-info__text">картой онлайн</p>
                            <p class="complete-info__text">Visa / Mastercard</p>
                            <p class="complete-info__text">**** **** **** 2345</p>
                        </div>
                        <div class="checkout-order-bottom__total">
                            <p class="checkout-order-bottom__total_text">{{ __('cart.cart_total') }}</p>
                            <p class="checkout-order-bottom__total_price">1233.10 ₴</p>
                        </div>
                    </div>
                </div>
                <a href="{{ route('home') }}" class="complete__btn btn">{{ __('front.go-to-home') }}</a>
            </div>
        </div>
    </section>
@endsection
