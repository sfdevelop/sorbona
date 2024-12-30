<div class="form__buttons">

    <a
            wire:click.prevent="deleteAccount"
            href="#"
            class="form__button btn"
    >
        {{__('front.yes_delete')}}
    </a>

    <a
            data-fancybox-close
            class="form__button btn btn--line"
    >
        {{__('front.reset')}}
    </a>

</div>
