<div class="checkout__body">
    <div class="checkout-body__head">
        @guest
        <button id="btnCheckoutAsGuest" class="checkout-body-head__tab checkout-body-head__tab--active">{{ __('checkout.new_user') }}</button>
        @endguest
{{--        <button class="checkout-body-head__tab--}}
{{--        @if($isTryLogin)--}}
{{--        checkout-body-head__tab--active')--}}
{{--        @endif--}}
{{--        ">{{ __('checkout.registered_user') }}</button>--}}
    </div>
    <div>
        <div class="checkout-body__content
        @if (!$isTryLogin)
            checkout-body__content--active
        @endif">
            <form action="#" id="checkout_form" class="checkout__form form">
                <div class="form__group">
                    <div class="form-group__head">
                        <h3 class="form-group__head-title">{{ __('checkout.contact_info') }}</h3>
                    </div>
                    <div class="form-group__inputs">
                        <div class="form__item">
                            <label for="name" class="form__label">{{ __('checkout.first_name') }}</label>
                            <input @readonly(Auth::check()) wire:model.lazy="name" value="{{ $name }}" type="text" name="name" id="name" class="form__input" placeholder="{{ __('checkout.first_name_placeholder') }}" required="">
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="form__item">
                            <label for="surname" class="form__label">{{ __('checkout.last_name') }}</label>
                            <input @readonly(Auth::check()) wire:model.lazy="surname" value="{{ $surname }}" type="text" name="surname" id="surname" class="form__input" placeholder="{{ __('checkout.last_name_placeholder') }}" required="">
                            @if ($errors->has('surname'))
                                <div class="invalid-feedback">{{ $errors->first('surname') }}</div>
                            @endif
                        </div>
                        <div class="form__item">
                            <label for="phone" class="form__label">{{ __('checkout.phone') }}</label>
                            <input @readonly(Auth::check()) wire:model.lazy="phone" value="{{ $phone }}" type="phone" name="phone" id="phone" class="form__input" placeholder="{{ __('checkout.phone_placeholder') }}" required="" inputmode="text">
                            @if ($errors->has('phone'))
                                <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
                            @endif

                        </div>
                        <div class="form__item">
                            <label for="email" class="form__label">{{ __('checkout.email') }}</label>
                            <input @readonly(Auth::check()) wire:model.lazy="email" value="{{ $email }}" type="email" name="email" id="email" class="form__input" placeholder="{{ __('checkout.email_placeholder') }}" required="">
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="form__group blur_delivery"
                     wire:loading.class="loading"
                     wire:target="selectDelivery"
                >
                    <div class="form-group__head">
                        <h3 class="form-group__head-title">{{ __('checkout.delivery_method') }}</h3>
                    </div>
                    <div class="form-group__radio form-group__radio-delivery">
                        <div class="form__radio">
                            <div class="radio">
                                <label class="radio__label">
                                    <input type="radio" name="delivery_method" class="radio__input"
                                           wire:click.prevent="selectDelivery('deliveryMethodLocal')"
                                           @checked($delivery == 'deliveryMethodLocal')
                                           value="deliveryMethodLocal">
                                    <span class="radio__icon"></span>
                                    <span class="radio__text">{{ __('checkout.delivery_method_local') }}</span>
                                </label>
                            </div>
                            <div @class(['form-radio__body', 'show' => $delivery == 'deliveryMethodLocal'])>
                                <p>{{ $settings->default_address }}</p>
                                <p>{{ __('checkout.delivery_method_local_address_2') }}</p>
                            </div>
                        </div>
                        <div class="form__radio">
                            <div class="radio">
                                <label class="radio__label">
                                    <input type="radio" name="delivery_method" class="radio__input"
                                           wire:click.prevent="selectDelivery('deliveryMethodNp')"
                                           @checked($delivery == 'deliveryMethodNp')
                                           value="deliveryMethodNp">
                                    <span class="radio__icon"></span>
                                    <span class="radio__text">{{ __('checkout.delivery_method_np') }} </span>
                                </label>
                            </div>
                            @if ($delivery == 'deliveryMethodNp')
                            @livewire('select')
                            @endif
                        </div>
                        <div class="form__radio">
                            <div class="radio">
                                <label class="radio__label">
                                    <input type="radio" name="delivery_method" class="radio__input"
                                           wire:click.prevent="selectDelivery('deliveryMethodUp')"
                                           @checked($delivery == 'deliveryMethodUp')
                                           value="deliveryMethodUp">
                                    <span class="radio__icon"></span>
                                    <span class="radio__text">{{ __('checkout.delivery_method_up') }}</span>
                                </label>
                            </div>
                            <div @class(['form-radio__body', 'show' => $delivery == 'deliveryMethodUp'])>
                                <div class="form-group__line">
                                    <div class="form__item">
                                        <label for="region" class="form__label">{{ __('checkout.delivery_method_up_region') }}</label>
                                        <input wire:model.lazy="region" type="text" name="region" id="region" class="form__input" placeholder="{{ __('checkout.delivery_method_up_region_placeholder') }}">
                                        @if ($errors->has('region'))
                                            <div class="invalid-feedback">{{ $errors->first('region') }}</div>
                                        @endif

                                    </div>
                                    <div class="form__item">
                                        <label for="locality" class="form__label">{{ __('checkout.delivery_method_up_city') }}</label>
                                        <input wire:model.lazy="locality" type="text" name="locality" id="locality" class="form__input" placeholder="{{ __('checkout.delivery_method_up_city_placeholder') }}">
                                        @if ($errors->has('locality'))
                                            <div class="invalid-feedback">{{ $errors->first('locality') }}</div>
                                        @endif
                                    </div>
                                    <div class="form__item">
                                        <label for="index" class="form__label">{{ __('checkout.delivery_method_up_index') }}</label>
                                        <input wire:model.lazy="index" type="number" name="index" id="index" class="form__input" placeholder="{{ __('checkout.delivery_method_up_index_placeholder') }}">
                                        @if ($errors->has('index'))
                                            <div class="invalid-feedback">{{ $errors->first('index') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form__group">
                    <div class="form-group__head">
                        <h3 class="form-group__head-title">{{ __('checkout.payment_method') }}</h3>
                    </div>
                    <div class="form-group__radio form-group__radio-payment">
                        <div class="form__radio">
                            <div class="radio">
                                <label class="radio__label">
                                    <input type="radio" name="payment_method" class="radio__input"
                                           wire:click.prevent="selectPayment('paymentMethodCod')"
                                           @checked($payment == 'paymentMethodCod')
                                           value="paymentMethodCod">
                                    <span class="radio__icon"></span>
                                    <span class="radio__text">{{ __('checkout.payment_method_cod') }}</span>
                                </label>
                            </div>
                        </div>
                        <div class="form__radio">
                            <div class="radio">
                                <label class="radio__label">
                                    <input type="radio" name="payment_method" class="radio__input"
                                           wire:click.prevent="selectPayment('paymentMethodCard')"
                                           @checked($payment == 'paymentMethodCard')
                                           value="paymentMethodCard">
                                    <span class="radio__icon"></span>
                                    <span class="radio__text">{{ __('checkout.payment_method_card') }}</span>
                                </label>
                            </div>
                        </div>
                        <div class="form__radio">
                            <div class="radio">
                                <label class="radio__label">
                                    <input type="radio" name="payment_method" class="radio__input"
                                           wire:click.prevent="selectPayment('paymentMethodBank')"
                                           @checked($payment == 'paymentMethodBank')
                                           value="paymentMethodBank">
                                    <span class="radio__icon"></span>
                                    <span class="radio__text">{{ __('checkout.payment_method_bank') }}</span>
                                </label>
                            </div>
                            <div @class(['form-radio__body', 'show' => $payment == 'paymentMethodBank'])>
                                <div class="form-group__inputs_line">
                                    <div class="form__item">
                                        <label for="company-name" class="form__label">{{ __('checkout.payment_method_bank_company_name') }}</label>
                                        <input type="text"  wire:model.lazy="companyName" name="company-name" id="company-name" class="form__input" placeholder="{{ __('checkout.payment_method_bank_company_name_placeholder') }}">
                                        @if ($errors->has('companyName'))
                                            <div class="invalid-feedback">{{ $errors->first('companyName') }}</div>
                                        @endif
                                    </div>
                                    <div class="form__item">
                                        <label for="inn" class="form__label">{{ __('checkout.payment_method_bank_inn') }}</label>
                                        <input wire:model.lazy="inn" type="text" name="inn" id="inn" class="form__input" placeholder="{{ __('checkout.payment_method_bank_inn_placeholder') }}">
                                        @if ($errors->has('inn'))
                                            <div class="invalid-feedback">{{ $errors->first('inn') }}</div>
                                        @endif
                                    </div>
                                    <div class="form__item">
                                        <label for="edrpou" class="form__label">{{ __('checkout.payment_method_bank_edrpou') }}</label>
                                        <input wire:model.lazy="edrpou" type="text" name="edrpou" id="edrpou" class="form__input" placeholder="{{ __('checkout.payment_method_bank_edrpou_placeholder') }}">
                                        @if ($errors->has('edrpou'))
                                            <div class="invalid-feedback">{{ $errors->first('edrpou') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form__group">
                    <div class="form-group__head">
                        <h3 class="form-group__head-title">{{ __('checkout.comment') }}</h3>
                        <button wire:click.prevent="clearComment" class="form-group__head-delete">{{ __('checkout.comment_clear') }}</button>
                    </div>
                    <div class="form-group__inputs_line">
                        <div class="form__item">
                            <label for="comment" class="form__label">{{ __('checkout.comment_label') }}</label>
                            <textarea wire:model.lazy="comment" name="comment" id="comment" class="form__input" placeholder="{{ __('checkout.comment_placeholder') }}"></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @guest
        <div class="checkout-body__content">
            @livewire('front.checkout.login-live-wire')
        </div>
        @endguest
    </div>
</div>
@pushonce('frontJs')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
//            console.log('Make phone masked');
            $("input[type=phone]").inputmask({mask: "+38 (999) 999-99-99"});

            $('#phone').on('change', function(e) {
//                console.log('Phone changed');
                livewire.emit('changePhoneNumber', $(this).val());
            });
            Livewire.hook('message.processed', (message, component) => {
//                console.log('Livewire message processed', message);
//                $("input[type=phone]").inputmask({mask: "+38 (999) 999-99-99"});
            });
        });
    </script>
@endpushonce
