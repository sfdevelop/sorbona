<div class="form__group">
    <div class="rc-login">
        <div class="rc-login__head">
            <h3 class="rc-login-head__title">{{ __('checkout.login_title') }}</h3>
        </div>
        <form action="#" class="rc-login__form form">
            <div class="form-group__inputs_line">
                <div class="form__item">
                    <label for="login_info" class="form__label">{{ __('checkout.email_or_phone') }}</label>
                    <input wire:model.lazy="login" type="text" name="login_info" id="login_info" class="form__input" placeholder="{{ __('checkout.email_or_phone_placeholder') }}" required="">
                    @if ($errors->has('login'))
                        <div class="invalid-feedback">{{ $errors->first('login') }}</div>
                    @endif
                </div>
                <div class="form__item">
                    <label for="password" class="form__label">{{ __('checkout.password') }}</label>
                    <div class="form-item__password">
                        <input wire:model.lazy="password" type="password" name="password" id="password" class="form__input" placeholder="{{ __('checkout.password_placeholder') }}" required="">
                        <div class="form-item__password_show"></div>
                    </div>
                    @if ($errors->has('password'))
                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                    @endif
                </div>
            </div>

            <div class="form__buttons">
                <button wire:click.prevent="doLogin" type="submit" class="form__button btn">{{ __('checkout.btn_login') }}</button>
                <a href="#" onclick="checkoutDoAsGuest();" class="form__button btn btn--line">{{ __('checkout.buy_as_guest') }}</a>
            </div>
        </form>
    </div>
</div>
