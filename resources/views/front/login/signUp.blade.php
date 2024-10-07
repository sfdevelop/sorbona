@extends('layout.bureviy')
@section('content')
    <section class="sign-up">
        <div class="container">
            <div class="sign-up__inner">
                <div class="sign-up__left">
                    <img src="{{asset('front/images/dest/content/sign-up.jpg')}}" alt="img">
                </div>
                <div class="sign-up__right">
                    <h3 class="title element-animation">
                        {{__('front.log_in')}}
                    </h3>
                    <span>
                {{__('front.already_have_an_account')}} <a href="{{route('login')}}">{{__('front.log_in')}}</a>
              </span>
                    @livewire('front.user.sign-up-live-wier')
                </div>
            </div>
        </div>
    </section>
@endsection