<!DOCTYPE html>
<html lang="ru">
<head>
	{!! Meta::render() !!}
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="yandex-verification" content="c0c2b889beb7fe31" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Oswald:200,300,400,500,600,700&amp;subset=cyrillic,latin-ext" rel="stylesheet">
    @include('blocks.favicons')
	<link rel="stylesheet" href="{{ elixir('css/app.css') }}">
</head>
<body>

    @include('blocks.sidebar')

    <div class="main-wrapper js-sidebar-open" id="main">
        @include('blocks.header.index')

        @section('breadcrumbs')
        @show

        @yield('content')

        @include('blocks.footer.index')
    </div>

    {{-- Ajax loader overlay --}}
    <div class="hidden" id="loader">
        <div class="loader-bg"></div>
        <div class="loader"></div>
    </div>

    {{-- VanillaJS --}}
    {{--@include('layouts.routes')--}}

    <script src="{{ elixir('js/vendor.js') }}"></script>
    <script src="{{ elixir('js/lib.js') }}"></script>
	<script src="{{ elixir('js/app.js') }}"></script>

    {{-- Vue.js --}}
    {{--@include('vue.preloader')--}}
    {{--@include('vue.button_add_to_cart')--}}
    {{--@include('vue.size_input')--}}
    {{--@include('vue.product_rating')--}}

    {{--<script src="{{ elixir('js/application.js') }}"></script>--}}
</body>
</html>