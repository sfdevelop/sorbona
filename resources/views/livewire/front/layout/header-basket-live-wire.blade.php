<div>
    <div class="header__basket">
        <div class="header__basket_icon">
            <svg>
                <use xlink:href="{{ asset('front/img/icons/icons.svg#icon-basket') }}"></use>
            </svg>
            <span class="header__basket_label">{{ $countInCart }}</span>
        </div>
        <span>Корзина</span>
    </div>

    <div class="mini-cart" @if ($showAddToCart) style="display:block"@endif>
        <div class="mini-cart__wrapper">
            <div class="mini-cart__close">
                <svg>
                    <use xlink:href="{{ asset('front/img/icons/icons.svg#icon-close') }}"></use>
                </svg>
            </div>
            <div class="mini-cart__head">
                <h3 class="mini-cart-head__title">Товар добавлен в корзину</h3>
                <p class="mini-cart-head__pos">1 из 1 позиций</p>
            </div>
            <div class="mini-cart__list">
                <div class="mini-cart__item">
                    <div class="mini-cart-item__col">
                        <a href="product-autorized.html" class="mini-cart-item__img">
                            <img src="img/product/product-img1.png" alt="image" loading="lazy" class="img-full">
                        </a>
                        <div class="mini-cart-item__body">
                            <a href="product-autorized.html" class="mini-cart-item__title">Кран угловой шаровый 1/2" -
                                1/2" P0710 (NOV06) ARCO Spain</a>
                            <p class="mini-cart-item__num">Кол-во: <span>1</span></p>
                        </div>
                    </div>
                    <div class="mini-cart-item__price">233.10 ₴</div>
                </div>
            </div>
            <div class="mini-cart__bottom">
                <div class="mini-cart-bottom__total">
                    <p class="mini-cart-bottom__total_text">Итого в корзине товаров на сумму</p>
                    <p class="mini-cart-bottom__total_price">233.10 ₴</p>
                </div>
                <div class="mini-cart-bottom__buttons">
                    <a href="#" class="mini-cart-bottom__btn btn btn--line">Продолжить покупки</a>
                    <a href="cart.html" class="mini-cart-bottom__btn btn">Перейти в корзину</a>
                </div>
            </div>
        </div>
    </div>
</div>
