<div>
    <form action="#" id="login" class="rc-login__form form">
        <div class="form-group__inputs_line">

            <x-input-live-wier
                    model="login"
                    type="text"
                    title="{{__('front.emailPhone')}}"
            />

            <x-input-live-wier
                    model="password"
                    type="password"
                    title="{{__('front.password')}}"
            />

        </div>
        <div class="form__line">
            <div class="chbox">
                <label class="chbox__label">
                    <input type="checkbox" name="" class="chbox__input" value="" />
                    <span class="chbox__icon"></span>
                    <p class="chbox__text">Запомнить меня</p>
                </label>
            </div>
            <a href="recover.html" class="form__link">Восстановить пароль</a>
        </div>
        <button
                wire:click.prevent="login"
                type="submit"
                class="form__button btn btn--full"
        >
            Войти
        </button>
    </form>
</div>
