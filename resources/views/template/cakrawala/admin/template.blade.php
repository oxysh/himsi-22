<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>

    <!-- Primary Style -->
    <link rel="stylesheet" href="{{ url('assets/css/navtop.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/env.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Poppins:wght@500;600;700&display=swap"
        rel="stylesheet">

    @yield('extracss')
    @livewireStyles

</head>

<body>
    @include('template.cakrawala.admin.nav')

    <div class="content">
        @if ($message = Session::get('info'))
            <div class="alert alert-info-form">{{ $message }}</div>
        @endif
        @if ($message = Session::get('danger'))
            <div class="alert alert-danger-form">{{ $message }}</div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger-form">{{ $message }}</div>
        @endif
        @if ($message = Session::get('warning'))
            <div class="alert alert-warning-form">{{ $message }}</div>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success-form">{{ $message }}</div>
        @endif

        @yield('content')
    </div>

    @yield('modal')


    <script src="{{ url('assets/js/script.js') }}"></script>
    <script src="{{ url('assets/js/navtop.js') }}"></script>
    @yield('extrajs')
    @livewireScripts

</body>

</html>
