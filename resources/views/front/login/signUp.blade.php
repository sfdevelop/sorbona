@extends('layout.sorbona')
@section('content')
    <section class="section">
        <div class="section__container section__container_p">
            <div class="section__wrapper">
                <div class="at">
                    <div class="at__head">
                        <a href="" class="at-head__link">{{__('front.enter')}}</a>
                        <a href="{{route('signup')}}" class="at-head__link current">{{__('front.registration')}}</a>
                    </div>
                    <div class="at__body">
                        <div class="rc-login">
                            <div class="rc-login__head">
                                <h3 class="rc-login-head__title">{{__('front.registration')}}</h3>
                            </div>

                            @livewire('front.user.sign-up-live-wier')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection