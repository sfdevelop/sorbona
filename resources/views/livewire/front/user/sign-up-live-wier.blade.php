<div>
    <form
            id="signup"
            class="form"
    >
        <div class="form-group__inputs_line">

            <x-input-live-wier
                    model="name"
                    type="text"
                    title="{{__('front.name')}}"
            />

            <x-input-live-wier
                    model="surname"
                    type="text"
                    title="{{__('front.surname')}}"
            />

            <x-input-live-wier
                    model="mailPhone"
                    type="text"
                    title="{{__('front.emailPhone')}}"
            />

            <x-input-live-wier
                    model="password"
                    type="password"
                    title="{{__('front.password')}}"
            />

            <x-input-live-wier
                    model="password_confirmation"
                    type="password"
                    title="{{__('front.password')}}"
            />
        </div>

        <p class="form__text">{{__('front.password_text')}}</p>

        <a
                class="form__button btn btn--full"
                wire:click.prevent="userRegistered"
        >
            {{__("front.registration_on")}}
        </a>

        <div class="form__agreement">
            {{__('front.registration_on_click_text')}}
            <a href="{{route('policy')}}">{{__('front.policy')}}</a> {{__('front.and')}}
            <a href="{{route('policy')}}">{{__('front.oferta')}}</a>
        </div>

    </form>
</div>