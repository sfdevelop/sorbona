<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

@include('layout.front.header')

<body>

@include('layout.front.menu')

@include('partials.front._catalog_mobile')


<main>

    @yield('content')


    <section class="section">
        <div class="section__container section__container_pb">
            <h2 class="section__title">О компании</h2>
            <div class="about-company">
                <div class="about-company__body">
                    <div class="about-company__col">
                        <p>
                            Мы занимаемся продажей сантехники с 1996г. Основная специализация – сантехзапорная арматура, а так же мы
                            можем предложить много сопутствующих товаров. Вся продукция высокого качества, производится на заводах и
                            фабриках Украины, России, Белоруссии, Китая, Италии и Испании.
                            <br /><br />
                            Продукция представлена новыми и уже широко известными брендами: Viega, АНИпласт, Ango, J.G., FADO, Henco,
                            CoesKlima, Sitek, Valsir, Unipak, FIL-NOX(Mateu), HTM, Valve, AquaKut.
                        </p>
                    </div>
                    <div class="about-company__col">
                        <p>
                            В настоящий момент ассортимент насчитывает более 5000 наименований: латунная запорная арматура, пластиковый и металлопластиковый водопровод и фитинг, подводка для воды и газа включает в себя армированные шланги, сильфонные шланги из нержавеющей стали , медные трубки, подводка и слив для стиральных машин, радиаторная арматура, латунные шаровые и вентильные краны, задвижки, сифоны, фильтры и колбы для грубой и тонкой очистки воды, сменные картриджи, счетчики воды, арматура в сборе и клапана для сливных бочков, поливочная пластмассовая фурнитура и шланги, и многое другое.
                        </p>
                    </div>
                </div>
                <a href="#" class="about-company__btn btn">Подробнее</a>
            </div>
        </div>
    </section>


</main>

<!-- END main page -->

@include('partials.front.__footer')

<script src="{{asset('front/js/plugins/plugins.min.js')}}"></script>

<script src="{{asset('front/js/app.min.js')}}"></script>

</body>

</html>