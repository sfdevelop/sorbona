@extends('layout.sorbona')
@section('content')
    <section class="section">
        <div class="section__container section__container_p">
            <div class="section__wrapper">
                <div class="rc-login rc-login--full">

                    <div class="rc-login__head">
                        <h3 class="rc-login-head__title">{{__('front.reload_password')}}</h3>
                    </div>

                    <div class="rc-login__text">
                        <p>{{__('front.reset_password_text')}}</p>
                    </div>

                    @livewire('front.recover-live-wier')

                </div>
            </div>
        </div>
    </section>
@endsection