<div>
    <form class="form ">

        <div class="form__inpur-wrap">
            <span>E-mail</span>
            <input
                    type="text"
                    placeholder="E-mail"
                    wire:model="email"
            >
        </div>

        <div class="form__inpur-wrap">
            <span>{{__('front.password')}}</span>
            <input
                    type="password"
                    placeholder="{{__('front.password')}}"
                    wire:model="password"
            >
        </div>

        <button wire:click.prevent="login" class="btn btn--transparent">
            {{__('front.log_in')}} <img src="{{asset('front/images/dest/icons/arrow-btn.svg')}}" alt="decor">
        </button>

    </form>
</div>
