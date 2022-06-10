<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>

    <!-- SEO -->
    <meta name="description" content="@yield('seo-desc')">
    <meta name="canonical" href=""> {{-- ini buat optimize page --}}
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('seo-desc')">
    <meta property="og:image" content="@yield('seo-img')">

    <!-- Primary Style -->
    <link rel="stylesheet" href="{{ url('assets/scss/app.css') }}">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:wght@500;600&family=Poppins:wght@100;300;400;500&display=swap"
        rel="stylesheet">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6R0KVNDRDE"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-6R0KVNDRDE');
    </script>

    @livewireStyles

</head>

<body class="@yield('bodyclass')">
    @if (Auth::User())
        @include('template.koneksi.sidebar-admin')
    @endif

    <div class="container @yield('container')">
        @if ($message = Session::get('info'))
            <div class="alert alert--info">
                <div class="alert__content">
                    <img class="alert__img" src="{{ url('assets/img/alert-info.svg') }}" alt="">
                    <h4 class="alert__message">{{ $message }}</h4>
                </div>
                <img class="alert__close" src="{{ url('assets/img/alert-close.svg') }}" alt="">
            </div>
        @endif
        @if ($message = Session::get('danger'))
            <div class="alert alert--danger">
                <div class="alert__content">
                    <img class="alert__img" src="{{ url('assets/img/alert-danger.svg') }}" alt="">
                    <h4 class="alert__message">{{ $message }}</h4>
                </div>
                <img class="alert__close" src="{{ url('assets/img/alert-close.svg') }}" alt="">
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert--error">
                <div class="alert__content">
                    <img class="alert__img" src="{{ url('assets/img/alert-error.svg') }}" alt="">
                    <h4 class="alert__message">{{ $message }}</h4>
                </div>
                <img class="alert__close" src="{{ url('assets/img/alert-close.svg') }}" alt="">
            </div>
        @endif
        @if ($message = Session::get('warning'))
            <div class="alert alert--warning">
                <div class="alert__content">
                    <img class="alert__img" src="{{ url('assets/img/alert-warning.svg') }}" alt="">
                    <h4 class="alert__message">{{ $message }}</h4>
                </div>
                <img class="alert__close" src="{{ url('assets/img/alert-close.svg') }}" alt="">
            </div>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert--success">
                <div class="alert__content">
                    <img class="alert__img" src="{{ url('assets/img/alert-success.svg') }}" alt="">
                    <h4 class="alert__message">{{ $message }}</h4>
                </div>
                <img class="alert__close" src="{{ url('assets/img/alert-close.svg') }}" alt="">
            </div>
        @endif

        @yield('content')

    </div>
    {{-- @include('template.koneksi.footer') --}}



    <script src="{{ url('assets/js/script.js') }}"></script>
    <script src="{{ url('https://code.jquery.com/jquery-3.6.0.min.js') }}"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ url('assets/js/app.js') }}"></script>
    @yield('extrajs')
    @livewireScripts

</body>

</html>
