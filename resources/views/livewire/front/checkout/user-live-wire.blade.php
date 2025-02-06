<div class="checkout__body">
    <div class="checkout-body__head">
        @guest
        <button class="checkout-body-head__tab checkout-body-head__tab--active">{{ __('checkout.new_user') }}</button>
        @endguest
        <button class="checkout-body-head__tab">{{ __('checkout.registered_user') }}</button>
    </div>
    <div>
        <div class="checkout-body__content checkout-body__content--active">
            <form action="#" id="checkout_form" class="checkout__form form">
                <div class="form__group">
                    <div class="form-group__head">
                        <h3 class="form-group__head-title">Контактные данные</h3>
                    </div>
                    <div class="form-group__inputs">
                        <div class="form__item">
                            <label for="name" class="form__label">Имя</label>
                            <input value="{{ auth()->user()->name ?? '' }}" type="text" name="name" id="name" class="form__input" placeholder="Введите ваше имя" required="">
                        </div>
                        <div class="form__item">
                            <label for="surname" class="form__label">Фамилия</label>
                            <input value="{{ auth()->user()->surname ?? '' }}" type="text" name="surname" id="surname" class="form__input" placeholder="Введите вашу фамилию" required="">
                        </div>
                        <div class="form__item">
                            <label for="phone" class="form__label">Телефон</label>
                            <input value="{{ auth()->user()->phone ?? '' }}" type="phone" name="phone" id="phone" class="form__input" placeholder="+38 (___) ___ __ __ " required="" inputmode="text">
                        </div>
                        <div class="form__item">
                            <label for="email" class="form__label">E-mail</label>
                            <input value="{{ auth()->user()->email ?? '' }}" type="email" name="email" id="email" class="form__input" placeholder="Введите ваш e-mail" required="">
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form-group__head">
                        <h3 class="form-group__head-title">Способ доставки</h3>
                    </div>
                    <div class="form-group__radio form-group__radio-delivery">
                        <div class="form__radio">
                            <div class="radio">
                                <label class="radio__label">
                                    <input type="radio" name="delivery_method" class="radio__input" value="">
                                    <span class="radio__icon"></span>
                                    <span class="radio__text">Самовывоз (Харьков)</span>
                                </label>
                            </div>
                            <div class="form-radio__body">
                                <p>Украина, г.Харьков, пр. Московский, 196/1 студия "АртУм"</p>
                                <p>Пн - Вс 10:00 - 17:00</p>
                            </div>
                        </div>
                        <div class="form__radio">
                            <div class="radio">
                                <label class="radio__label">
                                    <input type="radio" name="delivery_method" class="radio__input" value="">
                                    <span class="radio__icon"></span>
                                    <span class="radio__text">В отделение новой почты</span>
                                </label>
                            </div>
                            <div class="form-radio__body">
                                <div class="form-group__inputs">
                                    <div class="form__item">
                                        <label for="city_order" class="form__label">Город</label>
                                        <select id="city_order" placeholder="Выберите город" class="form__select form__select_search wide" style="opacity: 0; width: 0px; padding: 0px; height: 0px;">
                                            <option value="" disabled="" selected="">Выберите город</option>
                                            <option value="1">Харьков</option>
                                            <option value="2">Киев</option>
                                            <option value="3">Сумы</option>
                                        </select>
                                    </div>
                                    <div class="form__item">
                                        <label for="branch_order" class="form__label">Отделение</label>
                                        <select id="branch_order" placeholder="Выберите отделение" class="form__select form__select_search wide">
                                            <option value="" disabled selected>Выберите отделение</option>
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
                                    <span class="radio__text">В отделение Укрпочты</span>
                                </label>
                            </div>
                            <div class="form-radio__body">
                                <div class="form-group__line">
                                    <div class="form__item">
                                        <label for="region" class="form__label">Область </label>
                                        <input type="text" name="region" id="region" class="form__input" placeholder="Введите область" required="">
                                    </div>
                                    <div class="form__item">
                                        <label for="locality" class="form__label">Населенный пункт</label>
                                        <input type="text" name="locality" id="locality" class="form__input" placeholder="Введите населенный пункт" required="">
                                    </div>
                                    <div class="form__item">
                                        <label for="index" class="form__label">Индекс</label>
                                        <input type="number" name="index" id="index" class="form__input" placeholder="__ ___" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form__group">
                    <div class="form-group__head">
                        <h3 class="form-group__head-title">Способ оплаты</h3>
                    </div>
                    <div class="form-group__radio form-group__radio-payment">
                        <div class="form__radio">
                            <div class="radio">
                                <label class="radio__label">
                                    <input type="radio" name="payment_method" class="radio__input" value="">
                                    <span class="radio__icon"></span>
                                    <span class="radio__text">Наложенный платеж</span>
                                </label>
                            </div>
                        </div>
                        <div class="form__radio">
                            <div class="radio">
                                <label class="radio__label">
                                    <input type="radio" name="payment_method" class="radio__input" value="">
                                    <span class="radio__icon"></span>
                                    <span class="radio__text">Оплата картой онлайн (Приват 24, Google pay, Apple pay)</span>
                                </label>
                            </div>
                        </div>
                        <div class="form__radio">
                            <div class="radio">
                                <label class="radio__label">
                                    <input type="radio" name="payment_method" class="radio__input" value="">
                                    <span class="radio__icon"></span>
                                    <span class="radio__text">На расчетный счет компании (Сформируем счет-фактуру для оплаты)</span>
                                </label>
                            </div>
                            <div class="form-radio__body">
                                <div class="form-group__inputs_line">
                                    <div class="form__item">
                                        <label for="company-name" class="form__label">Название предприятия</label>
                                        <input type="text" name="company-name" id="company-name" class="form__input" placeholder="Введите юридическое название или ФОП" required="">
                                    </div>
                                    <div class="form__item">
                                        <label for="inn" class="form__label">ИНН</label>
                                        <input type="text" name="inn" id="inn" class="form__input" placeholder="Введите ИНН" required="">
                                    </div>
                                    <div class="form__item">
                                        <label for="edrpou" class="form__label">ЕГРПОУ</label>
                                        <input type="text" name="edrpou" id="edrpou" class="form__input" placeholder="Введите ЕГРПОУ" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form__group">
                    <div class="form-group__head">
                        <h3 class="form-group__head-title">Комментарий к заказу</h3>
                        <button class="form-group__head-delete">Очистить</button>
                    </div>
                    <div class="form-group__inputs_line">
                        <div class="form__item">
                            <label for="comment" class="form__label">Ваш комментарий</label>
                            <textarea name="comment" id="comment" class="form__input" placeholder="Комментарий"></textarea>
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
                        <h3 class="rc-login-head__title">Войдите в профиль</h3>
                    </div>
                    <form action="#" class="rc-login__form form">
                        <div class="form-group__inputs_line">
                            <div class="form__item">
                                <label for="login_info" class="form__label">Email или телефон</label>
                                <input type="text" name="login_info" id="login_info" class="form__input" placeholder="Введите ваше имя" required="">
                            </div>
                            <div class="form__item">
                                <label for="password" class="form__label">Пароль</label>
                                <div class="form-item__password">
                                    <input type="password" name="password" id="password" class="form__input" placeholder="Введите ваше имя" required="">
                                    <div class="form-item__password_show"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form__buttons">
                            <button type="submit" class="form__button btn" disabled="">Войти</button>
                            <a href="#" class="form__button btn btn--line">Купить как гость</a>Ч
                        </div>
                    </form>
                </div>
            </div>

        </div>
        @endguest
    </div>
</div>
