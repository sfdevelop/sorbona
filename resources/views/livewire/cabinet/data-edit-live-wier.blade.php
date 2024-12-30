<div>
    <form action="#" id="edit-detail_form" class="modal__form form">
        <div class="form-group__inputs_line">

            <x-input-live-wier
                    model="name"
                    type="string"
                    title="{{__('front.name')}}"
            />

            <x-input-live-wier
                    model="surname"
                    type="string"
                    title="{{__('front.surname')}}"
            />

            <x-input-live-wier
                    model="email"
                    type="string"
                    title="{{__('front.email')}}"
            />

            <x-input-live-wier
                    model="phone"
                    type="string"
                    title="{{__('front.phone')}}"
            />

        </div>
        <div class="form__buttons">
            <button
                    wire:click.prevent="updateData"
                    type="submit"
                    class="form__button btn"
            >
                Обновить данные
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
