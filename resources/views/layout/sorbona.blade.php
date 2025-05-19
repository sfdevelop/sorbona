<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

@include('layout.front.header')

<body>

@include('layout.front.menu')

@include('partials.front._catalog_mobile')


<main>

    @yield('content')

</main>

<!-- END main page -->

@include('partials.front.__footer')

<script src="{{asset('front/js/plugins/plugins.min.js')}}"></script>
<script src="{{asset('front/js/app.min.js')}}"></script>
<script src="{{asset('front/js/nice-select2/nice-select2-custom.js')}}"></script>

@livewireScripts

@stack('frontJs')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $(function () {
        window.addEventListener('alert', event => {
                toastr[event.detail.type](event.detail.message,
                    event.detail.title ?? ''), toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                }
            },
        );
    });

    @if(Session::has('success'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.success("{{ session('success') }}");
    @endif

    @if (!empty($errors->all()))
    @foreach ($errors->all() as $error)
    toastr.error("{{$error}}")
    @endforeach
    @endif
</script>

<script src="{{ asset('front/js/custom.js') }}?v={{ time() }}"
</body>

</html>
