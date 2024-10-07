<div class="cabinet__right">
    <div class="cabinet__btn">
        <img src="{{asset('front/images/dest/icons/menu.svg')}}" alt="icon">
        {{__('front.menu_text')}}
    </div>
    <h4 class="">
        {{__('front.change_password')}}
    </h4>
    <form>
        <div class="form">
            <div class="form__md-wrap ">

                <div class="form__inpur-wrap @if ($errors->has('old_password')) error @endif">
                    <span>{{__('front.current_password')}}</span>
                    <input
                            wire:model="old_password"
                            type="password"
                            placeholder="{{__('front.current_password')}}"
                    >

                    @if ($errors->has('old_password'))
                        <span>{{ $errors->first('old_password') }}</span>
                    @endif
                </div>

            </div>

            <div class="form__md-wrap">
                <form action="">

                    <div class="form__inpur-wrap @if ($errors->has('password')) error @endif">
                        <span>{{__('front.new_password')}}</span>
                        <input
                                wire:model="password"
                                type="password"
                                placeholder="{{__('front.new_password')}}"
                        >

                        @if ($errors->has('password'))
                            <span>{{ $errors->first('password') }}</span>
                        @endif

                    </div>

                    <div class="form__inpur-wrap @if ($errors->has('password_confirmation')) error @endif">
                        <span>{{__('front.confirm_new_password')}}</span>
                        <input
                                wire:model="password_confirmation"
                                type="password"
                                placeholder="{{__('front.confirm_new_password')}}"
                        >

                        @if ($errors->has('password_confirmation'))
                            <span>{{ $errors->first('password_confirmation') }}</span>
                        @endif

                    </div>


                </form>
            </div>

            <button
                    wire:click.prevent="updateUserPassword"
                    class="btn btn--transparent2 "
            >
                {{__('front.save_change')}}
                <img src="{{asset('front/images/dest/icons/arrow-btn2.svg')}}" alt="icon">
            </button>
        </div>
    </form>
</div>
