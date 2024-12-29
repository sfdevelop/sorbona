@extends('layout.sorbona')
@section('content')
    <section class="section">
        <div class="section__container section__container_p">
            <div class="section__wrapper">
                <div class="at">
                    <div class="at__head">
                        <a href="{{route('login')}}" class="at-head__link current">{{__('front.enter')}}</a>
                        <a href="{{route('register')}}" class="at-head__link">{{__('front.registration')}}</a>
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
@endsection