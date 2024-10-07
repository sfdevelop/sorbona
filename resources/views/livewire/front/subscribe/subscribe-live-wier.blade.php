<section class="subscribe">
    <div class="container">
        <div class="subscribe__inner">
            <div class="subscribe__left">
                <h3 class="title">
                    {{__('front.subscribe.dont_miss_the_latest_news')}}
                </h3>
                <p>{{__('front.subscribe.text')}}</p>
            </div>
            <div class="subscribe__right">
                <form class="form">
                    <div class="form__inner">
                        <div class="form__input-wrap">
                            <input
                                    type="email"
                                    placeholder="E-mail"
                                    wire:model="email"
                            >
                        </div>
                        <button
                                wire:click.prevent="subscribe"
                                class="btn btn--yellow"
                                type="submit"
                        >
                            {{__('front.subscribe.subscribe')}}
                        </button>
                    </div>
                </form>
                @if ($errors->has('email'))
                    <span>{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>
    </div>
</section>
