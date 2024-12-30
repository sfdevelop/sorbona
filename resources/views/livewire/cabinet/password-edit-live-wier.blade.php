<div>
    <form action="#" id="edit-password_form" class="modal__form form">
        <div class="form-group__inputs_line">

            <x-input-live-wier
                    type="password"
                    model="oldPassword"
                    title="{{__('front.old_password')}}"
            />

            <x-input-live-wier
                    type="password"
                    model="password"
                    title="{{__('front.new_password')}}"
            />
            <x-input-live-wier
                    type="password"
                    model="password_confirmation"
                    title="{{__('front.confirm_password')}}"
            />
        </div>
        <div class="form__buttons">

            <button
                    type="submit"
                    class="form__button btn"
                    wire:click.prevent="updatePassword"
            >
                {{__('front.update_password')}}
            </button>

            <a
                    data-fancybox-close
                    class="form__button btn btn--line"
            >
                {{__('front.reset')}}
            </a>

        </div>
    </form>
</div>
