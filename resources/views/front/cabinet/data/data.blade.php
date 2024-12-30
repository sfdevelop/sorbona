@extends('layout.sorbona')
@section('content')
{{--    <section class="section">--}}
{{--        <div class="section__container--medium section__container_p">--}}
{{--            <div class="account">--}}

{{--                @include('partials.front.cabinet.sidebar')--}}

{{--                <div class="account__page">--}}
{{--                    <div class="account__main">--}}
{{--                        <h1 class="account__title">Приветствуем вас, {{auth()->user()->name ?? ''}}!</h1>--}}
{{--                        <div class="account-main__head">--}}
{{--                            <div class="account-main-head__text">Дата регистрации:--}}
{{--                                <span>{{auth()->user()->created_at->format('d.m.Y')}}</span></div>--}}
{{--                            <div class="account-main-head__text">Дата подтверждения типа аккаунта:--}}
{{--                                <span>{{auth()->user()->created_at->format('d.m.Y')}}</span></div>--}}
{{--                        </div>--}}
{{--                        <div class="account-main__body">--}}
{{--                            <div class="account-main-body__item">--}}
{{--                                <p>Тип аккаунта</p>--}}
{{--                                <h3>{{translateUserRole(auth()->user()->roles->first()->name)}}</h3>--}}
{{--                            </div>--}}
{{--                            <div class="account-main-body__item">--}}
{{--                                <p>Выполнено заказов на сумму</p>--}}
{{--                                <h3> {{Number::formatCurrencyUAH(auth()->user()->totalCash )}}</h3>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="account-main__content">--}}
{{--                            <p>--}}
{{--                                {{__('front.account_text')}}--}}
{{--                            </p>--}}
{{--                            <ul>--}}
{{--                                <li>{!! __('front.role.user_description') !!}</li>--}}
{{--                                <li>{!! __('front.role.melokoopt_description') !!}</li>--}}
{{--                                <li>{!! __('front.role.opt_description') !!}</li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}




    <section class="section">
        <div class="section__container--medium section__container_p">
            <div class="account">

                @include('partials.front.cabinet.sidebar')

                <div class="account__page">
                    <div class="account__detail">
                        <h1 class="account__title">{{__('front.my_data')}}</h1>
                        <div class="account-detail__item">
                            <div class="account-detail-item__head">
                                <h3>Данные аккаунта</h3>

                                <a
                                        href="#edit-detail"
                                        data-fancybox
                                >
                                    {{__('front.edit')}}
                                </a>

                            </div>
                            <div class="account-detail-item__body">
                                <div class="account-detail-item-body__item">
                                    <span>{{__('front.name')}}</span>
                                    <p>{{auth()->user()->name}}</p>
                                </div>
                                <div class="account-detail-item-body__item">
                                    <span>{{__('front.surname')}}</span>
                                    <p>{{auth()->user()->surname}}</p>
                                </div>
                                <div class="account-detail-item-body__item">
                                    <span>E-mail</span>
                                    <p>{{auth()->user()->email ?? ''}}</p>
                                </div>
                                <div class="account-detail-item-body__item">
                                    <span>{{__('front.phone')}}</span>
                                    <p>{{auth()->user()->phone ?? ''}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="account-detail__item">
                            <div class="account-detail-item__head">
                                <h3>Пароль</h3>
                                <a href="#edit-password" data-fancybox>Изменить пароль</a>
                            </div>
                            <div class="account-detail-item__body">
                                <div class="account-detail-item-body__item">
                                    <span>Текущий пароль</span>
                                    <div class="account-detail-item-body__password">
                                        <input type="password" value="{{ Hash::make(auth()->user()->password)}}"  />
                                        <div class="form-item__password_show"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#deactivate-account" data-fancybox class="account-detail__delete">
                            <svg><use xlink:href="img/icons/icons.svg#icon-close"></use></svg>
                            <span>Деактивировать аккаунт</span>
                        </a>
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
@livewire('cabinet.data-edit-live-wier')
    </div>
</div>
@endsection