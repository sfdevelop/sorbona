<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Главная</title>

    <meta name="description" content="Описание">
    <meta name="keywords" content="Ключевики">
    <meta name="author" content="">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">


    <script>
        const totalFontSize = function() {
            const pageWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

            if (pageWidth > 1920) {
                document.documentElement.style.fontSize = '12px';
            }else if (pageWidth > 992.99) {
                let value = (pageWidth * 10 / 1440).toFixed(2);
                document.documentElement.style.fontSize = value + 'px';
            } else {
                document.documentElement.style.fontSize = '10px';
            }
        };

        totalFontSize();

        window.addEventListener('resize', totalFontSize);

    </script>

    <link rel="stylesheet" href="{{asset('front/css/nice-select2/nice-select2.css')}}" />
    <link rel="stylesheet" href="{{asset('front/css/plugins/plugins.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/sf_style.css')}}?v={{time()}}">

    @livewireStyles
</head>
