<div class="checkout__body">
    <div class="checkout-body__head">
        @guest
        <button id="btnCheckoutAsGuest" class="checkout-body-head__tab checkout-body-head__tab--active">{{ __('checkout.new_user') }}</button>
        @endguest
        <button class="checkout-body-head__tab">{{ __('checkout.registered_user') }}</button>
    </div>
    <div>
        <div class="checkout-body__content checkout-body__content--active">
            <form action="#" id="checkout_form" class="checkout__form form">
                <div class="form__group">
                    <div class="form-group__head">
                        <h3 class="form-group__head-title">{{ __('checkout.contact_info') }}</h3>
                    </div>
                    <div class="form-group__inputs">
                        <div class="form__item">
                            <label for="name" class="form__label">{{ __('checkout.first_name') }}</label>
                            <input value="{{ auth()->user()->name ?? '' }}" type="text" name="name" id="name" class="form__input" placeholder="{{ __('checkout.first_name_placeholder') }}" required="">
                        </div>
                        <div class="form__item">
                            <label for="surname" class="form__label">{{ __('checkout.last_name') }}</label>
                            <input value="{{ auth()->user()->surname ?? '' }}" type="text" name="surname" id="surname" class="form__input" placeholder="{{ __('checkout.last_name_placeholder') }}" required="">
                        </div>
                        <div class="form__item">
                            <label for="phone" class="form__label">{{ __('checkout.phone') }}</label>
                            <input value="{{ auth()->user()->phone ?? '' }}" type="phone" name="phone" id="phone" class="form__input" placeholder="{{ __('checkout.phone_placeholder') }}" required="" inputmode="text">
                        </div>
                        <div class="form__item">
                            <label for="email" class="form__label">{{ __('checkout.email') }}</label>
                            <input value="{{ auth()->user()->email ?? '' }}" type="email" name="email" id="email" class="form__input" placeholder="{{ __('checkout.email_placeholder') }}" required="">
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form-group__head">
                        <h3 class="form-group__head-title">{{ __('checkout.delivery_method') }}</h3>
                    </div>
                    <div class="form-group__radio form-group__radio-delivery">
                        <div class="form__radio">
                            <div class="radio">
                                <label class="radio__label">
                                    <input type="radio" name="delivery_method" class="radio__input" value="">
                                    <span class="radio__icon"></span>
                                    <span class="radio__text">{{ __('checkout.delivery_method_local') }}</span>
                                </label>
                            </div>
                            <div class="form-radio__body">
                                <p>{{ __('checkout.delivery_method_local_address_1') }}</p>
                                <p>{{ __('checkout.delivery_method_local_address_2') }}</p>
                            </div>
                        </div>
                        <div class="form__radio">
                            <div class="radio">
                                <label class="radio__label">
                                    <input type="radio" name="delivery_method" class="radio__input" value="">
                                    <span class="radio__icon"></span>
                                    <span class="radio__text">{{ __('checkout.delivery_method_np') }}</span>
                                </label>
                            </div>
                            <div class="form-radio__body">
                                <div class="form-group__inputs">
                                    <div class="form__item">
                                        <label for="city_order" class="form__label">{{ __('checkout.delivery_method_np_city') }}</label>
                                        <select id="city_order" placeholder="{{ __('checkout.delivery_method_np_city_placeholder') }}" class="form__select form__select_search wide" style="opacity: 0; width: 0px; padding: 0px; height: 0px;">
                                            <option value="" disabled="" selected="">{{ __('checkout.delivery_method_np_city_placeholder') }}</option>
                                            <option value="1">Харьков</option>
                                            <option value="2">Киев</option>
                                            <option value="3">Сумы</option>
                                        </select>
                                    </div>
                                    <div class="form__item">
                                        <label for="branch_order" class="form__label">{{ __('checkout.delivery_method_np_depot') }}</label>
                                        <select id="branch_order" placeholder="{{ __('checkout.delivery_method_np_depot_placeholder') }}" class="form__select form__select_search wide">
                                            <option value="" disabled selected>{{ __('checkout.delivery_method_np_depot_placeholder') }}</option>
                                            <option value="1">Отделение 1</option>
                                            <option value="2">Отделение 2</option>
                                            <option value="3">Отделение 3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form__radio">
                            <div class="radio">
                                <label class="radio__label">
                                    <input type="radio" name="delivery_method" class="radio__input" value="">
                                    <span class="radio__icon"></span>
                                    <span class="radio__text">{{ __('checkout.delivery_method_up') }}</span>
                                </label>
                            </div>
                            <div class="form-radio__body">
                                <div class="form-group__line">
                                    <div class="form__item">
                                        <label for="region" class="form__label">{{ __('checkout.delivery_method_up_region') }}</label>
                                        <input type="text" name="region" id="region" class="form__input" placeholder="{{ __('checkout.delivery_method_up_region_placeholder') }}" required="">
                                    </div>
                                    <div class="form__item">
                                        <label for="locality" class="form__label">{{ __('checkout.delivery_method_up_city') }}</label>
                                        <input type="text" name="locality" id="locality" class="form__input" placeholder="{{ __('checkout.delivery_method_up_city_placeholder') }}" required="">
                                    </div>
                                    <div class="form__item">
                                        <label for="index" class="form__label">{{ __('checkout.delivery_method_up_index') }}</label>
                                        <input type="number" name="index" id="index" class="form__input" placeholder="{{ __('checkout.delivery_method_up_index_placeholder') }}" required="">
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
                                    <input type="radio" name="payment_method" class="radio__input" value="">
                                    <span class="radio__icon"></span>
                                    <span class="radio__text">{{ __('checkout.payment_method_cod') }}</span>
                                </label>
                            </div>
                        </div>
                        <div class="form__radio">
                            <div class="radio">
                                <label class="radio__label">
                                    <input type="radio" name="payment_method" class="radio__input" value="">
                                    <span class="radio__icon"></span>
                                    <span class="radio__text">{{ __('checkout.payment_method_card') }}</span>
                                </label>
                            </div>
                        </div>
                        <div class="form__radio">
                            <div class="radio">
                                <label class="radio__label">
                                    <input type="radio" name="payment_method" class="radio__input" value="">
                                    <span class="radio__icon"></span>
                                    <span class="radio__text">{{ __('checkout.payment_method_bank') }}</span>
                                </label>
                            </div>
                            <div class="form-radio__body">
                                <div class="form-group__inputs_line">
                                    <div class="form__item">
                                        <label for="company-name" class="form__label">{{ __('checkout.payment_method_bank_company_name') }}</label>
                                        <input type="text" name="company-name" id="company-name" class="form__input" placeholder="{{ __('checkout.payment_method_bank_company_name_placeholder') }}" required="">
                                    </div>
                                    <div class="form__item">
                                        <label for="inn" class="form__label">{{ __('checkout.payment_method_bank_inn') }}</label>
                                        <input type="text" name="inn" id="inn" class="form__input" placeholder="{{ __('checkout.payment_method_bank_inn_placeholder') }}" required="">
                                    </div>
                                    <div class="form__item">
                                        <label for="edrpou" class="form__label">{{ __('checkout.payment_method_bank_edrpou') }}</label>
                                        <input type="text" name="edrpou" id="edrpou" class="form__input" placeholder="{{ __('checkout.payment_method_bank_edrpou_placeholder') }}" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form__group">
                    <div class="form-group__head">
                        <h3 class="form-group__head-title">{{ __('checkout.comment') }}</h3>
                        <button onclick="$('#comment').val('');return false;" class="form-group__head-delete">{{ __('checkout.comment_clear') }}</button>
                    </div>
                    <div class="form-group__inputs_line">
                        <div class="form__item">
                            <label for="comment" class="form__label">{{ __('checkout.comment_label') }}</label>
                            <textarea name="comment" id="comment" class="form__input" placeholder="{{ __('checkout.comment_placeholder') }}"></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @guest
        <div class="checkout-body__content">
            <div class="form__group">
                <div class="rc-login">
                    <div class="rc-login__head">
                        <h3 class="rc-login-head__title">{{ __('checkout.login_title') }}</h3>
                    </div>
                    <form action="#" class="rc-login__form form">
                        <div class="form-group__inputs_line">
                            <div class="form__item">
                                <label for="login_info" class="form__label">{{ __('checkout.email_or_phone') }}</label>
                                <input type="text" name="login_info" id="login_info" class="form__input" placeholder="{{ __('checkout.email_or_phone_placeholder') }}" required="">
                            </div>
                            <div class="form__item">
                                <label for="password" class="form__label">{{ __('checkout.password') }}</label>
                                <div class="form-item__password">
                                    <input type="password" name="password" id="password" class="form__input" placeholder="{{ __('checkout.password_placeholder') }}" required="">
                                    <div class="form-item__password_show"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form__buttons">
                            <button type="submit" class="form__button btn" disabled="">{{ __('checkout.btn_login') }}</button>
                            <a href="#" onclick="checkoutDoAsGuest();" class="form__button btn btn--line">{{ __('checkout.buy_as_guest') }}</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        @endguest
    </div>
</div>
