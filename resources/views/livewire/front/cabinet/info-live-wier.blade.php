<div class="cabinet__right">
    <div class="cabinet__btn">
        <img src="{{asset('front/images/dest/icons/menu.svg')}}" alt="icon">
        {{__('front.menu_text')}}
    </div>
    <h4 class="">
        {{Auth::user()->name}}
        <span> {{Auth::user()->email}}</span>
    </h4>
    <form>
        <div class="form">
            <div class="form__md-wrap">
                <form action="">
                <div class="form__inpur-wrap @if ($errors->has('name')) error @endif">
                    <span>{{__('front.name')}}</span>
                    <input
                            type="text"
                            placeholder="{{__('front.name')}}"
                            name="name"
                           wire:model="name"
                            wire:ignore
                    >
                    @if ($errors->has('name'))
                        <span>{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="form__inpur-wrap @if ($errors->has('email')) error @endif">
                    <span>E-mail</span>
                    <input
                            type="email"
                            placeholder="E-mail"
                            name="email"
                            wire:model="email"
                    >

                    @if ($errors->has('email'))
                        <span>{{ $errors->first('email') }}</span>
                    @endif
                </div>
                </form>
            </div>

            <div class="form__md-wrap ">

                <div class="form__inpur-wrap">
                    <span>Phone</span>
                    <input
                            type="text"
                            placeholder="+38 (012) 345 - 67 - 89"
                            name="phone"
                            wire:model="phone"
                    >
                </div>

            </div>

            <button wire:click.prevent="updateUser"  class="btn btn--transparent2 ">
                {{__('front.save_change')}}
                <img src="{{asset('front/images/dest/icons/arrow-btn2.svg')}}" alt="icon">
            </button>
        </div>
    </form>
</div>
