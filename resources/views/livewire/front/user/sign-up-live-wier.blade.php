<div>
    <form class="form ">

        <div class="form__inpur-wrap @if($errors->has('name')) error @endif ">
            <span>{{__('front.first_and_last_name')}}</span>
            <input
                    type="text"
                    placeholder="{{__('front.first_and_last_name')}}"
                    wire:model="name"
            >

            @if ($errors->has('name'))
                <span class="invalid-feedback">{{ $errors->first('name') }}</span>
            @endif

        </div>

        <div class="form__inpur-wrap @if($errors->has('email')) error @endif ">
            <span>E-mail</span>
            <input
                    type="email"
                    placeholder="E-mail"
                    wire:model="email"
            >
            @if ($errors->has('email'))
                <span class="invalid-feedback">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form__inpur-wrap  @if($errors->has('password')) error @endif ">
            <span>{{__('front.password')}}</span>
            <input
                    type="password"
                    placeholder="{{__('front.password')}}"
                    wire:model="password"
            >
            @if ($errors->has('password'))
                <span>{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form__inpur-wrap @if($errors->has('password_confirmation')) error @endif ">
            <span>{{__('front.repeat_password')}}</span>
            <input
                    type="password"
                    placeholder="{{__('front.repeat_password')}}"
                    wire:model="password_confirmation"
            >
            @if ($errors->has('password_confirmation'))
                <span>{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>

        <button wire:click.prevent="userRegistered" class="btn btn--transparent">
            {{__('front.sign_up')}} <img src="{{asset('front/images/dest/icons/arrow-btn.svg')}}" alt="decor">
        </button>
    </form>
</div>
