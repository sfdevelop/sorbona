<form id="recover" class="form">
    <div class="form-group__inputs_line">
        <div class="form__item">

            <x-input-live-wier
                    model="emailPhone"
                    title="{{__('front.emailPhone')}}"
                    type="text"
            />

        </div>
    </div>

    <div class="form__buttons">

        <button
                wire:click.prevent="recover"
                type="submit"
                class="form__button btn"
                lass="form__button btn"
        >
            {{__('front.send_password')}}
        </button>

        <a
                href="{{route('login')}}"
                class="form__button btn btn--line"
        >
            {{__('front.reset')}}
        </a>
    </div>
</form>
