<section class="about-intro">
    <div class="container">
        <h3 class="title element-animation">
            {{__('front.menu.about')}}
        </h3>
    </div>
    <section class="about-intro__inner" style="background-image: url('{{asset('front/images/dest/content/about-introbg.jpeg')}}');">
        <div class="container">
            <div class="about-intro__left element-animation">
                <h3>
                    {{$about->titleSectionAboutUs}}
                </h3>
            </div>
            <div class="about-intro__text element-animation">
                <p>
                    {{$about->description}}
                </p>
            </div>
        </div>
    </section>
</section>