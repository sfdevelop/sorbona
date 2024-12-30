@extends('layout.sorbona')
@section('content')
    <section class="section">
        <div class="section__container section__container_p">
            <div class="section__wrapper">
                <div class="at">
                    <div class="at__head">
                        <a href="{{route('login')}}" class="at-head__link current">{{__('front.enter')}}</a>
                        <a href="{{route('signUp')}}" class="at-head__link">{{__('front.registration')}}</a>
                    </div>
                    <div class="at__body">
                        <div class="rc-login">
                            <div class="rc-login__head">
                                <h3 class="rc-login-head__title">{{__('front.enter_profile')}}</h3>
                            </div>

                            @livewire('front.user.log-in-live-wier')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal" id="edit-detail">
        <div class="modal__wrap">
            <div class="modal__head">
                <h3 class="modal__title">Редактировать данные аккаунта</h3>
                <button class="modal__close" data-fancybox-close>
                    <svg><use xlink:href="img/icons/icons.svg#icon-close"></use></svg>
                </button>
            </div>
            <form action="#" id="edit-detail_form" class="modal__form form">
                <div class="form-group__inputs_line">
                    <div class="form__item">
                        <label for="detail_name" class="form__label">Имя</label>
                        <input
                                type="text"
                                name="detail_name"
                                id="detail_name"
                                class="form__input"
                                placeholder="Введите ваше имя"
                                required
                        />
                    </div>
                    <div class="form__item">
                        <label for="detail_surname" class="form__label">Фамилия</label>
                        <input
                                type="text"
                                name="detail_surname"
                                id="detail_surname"
                                class="form__input"
                                placeholder="Введите вашу фамилию"
                                required
                        />
                    </div>
                    <div class="form__item">
                        <label for="detail_email" class="form__label">E-mail</label>
                        <input
                                type="email"
                                name="detail_email"
                                id="detail_email"
                                class="form__input"
                                placeholder="Введите e-mail"
                                required
                        />
                    </div>
                    <div class="form__item">
                        <label for="detail_tel" class="form__label">Телефон</label>
                        <input
                                type="phone"
                                name="detail_tel"
                                id="detail_tel"
                                class="form__input"
                                placeholder="Введите номер телефона"
                                required
                        />
                    </div>
                </div>
                <div class="form__buttons">
                    <button type="submit" class="form__button btn" disabled>Обновить данные</button>
                    <a data-fancybox-close class="form__button btn btn--line">Отмена</a>
                </div>
            </form>
        </div>
    </div>
@endsection