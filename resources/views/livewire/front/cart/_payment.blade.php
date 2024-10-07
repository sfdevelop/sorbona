<h5>
    <span class="">2.</span>
    {{__('front.payment_method')}}
</h5>
<label class="basket-form__label ">

    <input
            wire:model="payment"
            class="basket-form__radio"
            type="radio"
            name="payment"
            value="LiqPay"
    >

    <div class="basket-form__check-fake"></div>
    <span class="basket-form__check-text">LiqPay</span>
</label>
<label class="basket-form__label ">

    <input
            wire:model="payment"
            class="basket-form__radio"
            type="radio"
            name="payment"
            value="Payment made"
    >

    <div class="basket-form__check-fake"></div>
    <span class="basket-form__check-text">{{__('front.payment_made')}}</span>
</label>