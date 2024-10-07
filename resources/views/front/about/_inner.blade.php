<section class="about-intro__inner" style="background-image: url('{{asset('front/images/dest/content/about-introbg2.jpeg')}}');">
    <div class="container">
        <div class="about-intro__left element-animation">
            <h5>
                {{$about->titleDownAboutUs}}
            </h5>
        </div>
        <div class="about-intro__text element-animation">
            <blockquote>
                <strong>
                    <img src="{{asset('front/images/dest/icons/brake.svg')}}" alt="icon-brake">
                    Пам'ятайте:
                </strong>
                <p>
                    {{$about->descriptionRememberAboutUs}}
                </p>
            </blockquote>
        </div>
    </div>
</section>