@extends('layout.sorbona')
@section('content')
    <section class="section">
        <div class="section__container--medium section__container_p">
            <div class="account">

                @include('partials.front.cabinet.sidebar')

                <div class="account__page">
                    <div class="account__main">
                        <h1 class="account__title">{{__('front.info_hello')}} {{auth()->user()->name ?? ''}}!</h1>
                        <div class="account-main__head">
                            <div class="account-main-head__text">{{__('front.data_registration')}}
                                <span>{{auth()->user()->created_at->format('d.m.Y')}}</span></div>
                            <div class="account-main-head__text">{{__('front.data_confirm_type_account')}}
                                <span>{{auth()->user()->created_at->format('d.m.Y')}}</span></div>
                        </div>
                        <div class="account-main__body">
                            <div class="account-main-body__item">
                                <p>{{__('front.type_account')}}</p>
                                <h3>{{translateUserRole(auth()->user()->roles->first()->name)}}</h3>
                            </div>
                            <div class="account-main-body__item">
                                <p>{{__('admin.order_total')}}</p>
                                <h3> {{Number::formatCurrencyUAH(auth()->user()->totalCash )}}</h3>
                            </div>
                        </div>
                        <div class="account-main__content">
                            <p>
                                {{__('front.account_text')}}
                            </p>
                            <ul>
                                <li>{!! __('front.role.user_description') !!}</li>
                                <li>{!! __('front.role.melokoopt_description') !!}</li>
                                <li>{!! __('front.role.opt_description') !!}</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection