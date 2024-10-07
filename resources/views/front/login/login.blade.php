@extends('layout.bureviy')
@section('content')
    <section class="sign-up">
        <div class="container">
            <div class="sign-up__inner">
                <div class="sign-up__left">
                    <img src="{{asset('front/images/dest/content/sign-up.jpg')}}" alt="img">
                </div>
                <div class="sign-up__right">
                    <h3 class="title ">
                        {{__('front.log_in')}}
                    </h3>
                    <span>
                {{__('front.dont_have_account')}} <a href="{{route('signUp')}}">{{__('front.sign_up')}}</a>
              </span>
                    @livewire('front.user.log-in-live-wier')
                </div>
            </div>
        </div>
    </section>
@endsection