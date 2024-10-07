<div class="cart__right">
    <h4 class="">
        {{__('front.product')}}
    </h4>

    @foreach($productsInCart as $cartProduct)
        <div class="cart__item ">
            <button class="cart__item-close" wire:click.prevent="deleteProductOnCart({{$cartProduct}})">
                <img src="{{asset('front/images/dest/icons/close.svg')}}" alt="close">
            </button>
            <h6>
                {{$cartProduct->title}}
            </h6>
            <div class="cart__info">
                @if($cartProduct->options['size'])
                    <div class="cart__info-size">Size: <span>{{$cartProduct->options['size']}}</span></div>
                @endif

                @if($cartProduct->options['color'])
                    <div class="cart__info-color">Color: <span>{{$cartProduct->options['color']}}</span></div>
                @endif
            </div>
            <div class="cart__bottom">
                <div class="cart__calc">
                    <button class="cart__minus" wire:click.prevent="itemMinus({{$cartProduct}})">
                        <img src="{{asset('front/images/dest/icons/minus.svg')}}" alt="minus">
                    </button>
                    <input type="text" readonly value="{{$cartProduct->quantity}}">
                    <button class="cart__plus" wire:click.prevent="itemPlus({{$cartProduct}})">
                        <img src="{{asset('front/images/dest/icons/plus.svg')}}" alt="plus">
                    </button>
                </div>
                <div class="cart__price">
                    {{Number::currency($cartProduct->price * $cartProduct->quantity, in:'EUR', locale: 'lt') }}
                </div>
            </div>
        </div>
    @endforeach

    <div class="cart__total-price ">
        <p>{{__('front.total')}}</p>
        <span>{{Number::currency($total, in:'EUR', locale: 'lt') }}</span>
    </div>
    <div
            class="btn btn--transparent "
            wire:click.prevent="createOrderRight"
    >
        {{__('front.confirm_order')}} <img src="{{asset('front/images/dest/icons/arrow-btn.svg')}}" alt="decor">
    </div>
</div>

@push('css_front')
    <link rel="stylesheet" href="{{asset('front/css/custom.css')}}">
@endpush