@extends('layout.sorbona')
@section('content')
    <section class="section">
        <div class="section__container--medium section__container_p">
            <div class="account">

                @include('partials.front.cabinet.sidebar')

                <div class="account__page">
                    <div class="account__detail">
                        <h1 class="account__title">{{__('front.my_data')}}</h1>
                        <div class="account-detail__item">
                            <div class="account-detail-item__head">
                                <h3>{{__('front.account_data')}}</h3>

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
                                <a href="#edit-password" data-fancybox>{{__('front.change_password')}}</a>
                            </div>
                            <div class="account-detail-item__body">
                                <div class="account-detail-item-body__item">
                                    <span>{{__('front.current_password')}}</span>
                                    <div class="account-detail-item-body__password">
                                        <input type="password" value="{{ Hash::make(auth()->user()->password)}}"/>
                                        <div class="form-item__password_show"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#deactivate-account" data-fancybox class="account-detail__delete">
                            <svg>
                                <use xlink:href="{{asset('front/img/icons/icons.svg#icon-close')}}"></use>
                            </svg>
                            <span>{{__('front.delete_account')}}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal" id="edit-detail">
        <div class="modal__wrap">
            <div class="modal__head">
                <h3 class="modal__title">{{__('front.edit_data_account')}}</h3>
                <button class="modal__close" data-fancybox-close>
                    <svg>
                        <use xlink:href="{{asset('front/img/icons/icons.svg#icon-close')}}"></use>
                    </svg>
                </button>
            </div>

            @livewire('cabinet.data-edit-live-wier')

        </div>
    </div>

    <div class="modal" id="edit-password">
        <div class="modal__wrap">
            <div class="modal__head">
                <h3 class="modal__title">{{__("front.change_password")}}</h3>
                <button class="modal__close" data-fancybox-close>
                    <svg>
                        <use xlink:href="{{asset('front/img/icons/icons.svg#icon-close')}}"></use>
                    </svg>
                </button>
            </div>

            @livewire('cabinet.password-edit-live-wier')

        </div>
    </div>

    <div class="modal" id="deactivate-account">
        <div class="modal__wrap">
            <div class="modal__head">
                <h3 class="modal__title">{{__('front.delete_account')}}</h3>
                <button class="modal__close" data-fancybox-close>
                    <use xlink:href="{{asset('front/img/icons/icons.svg#icon-close')}}"></use>
                </button>
            </div>
            <p class="modal__text">
               {{__('front.account_delete_text')}}
            </p>
            @livewire('cabinet.delete-account-live-wier')
        </div>
    </div>
@endsection