{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HIMSI 2021</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Open Sans', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 60vh;
        }

        .container {
            height: 100%;
            align-items: center;
            display: flex;
            flex-direction: column;
        }

        .container img {
            margin-bottom: 50px;
        }

    </style>
</head>

<body>

    <div class="container">
        <img src="{{ url('/image/logo.png') }}" alt="">
        <span>Selamat Datang</span>
        <h1>HIMSI 2021</h3>
    </div>

</body>

</html> --}}

@extends('template.bootstrap.temp')

@section('title')
    HIMSI 2021
@endsection

@section('style')

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="my-5">
                HOMEPAGE
            </h1>
        </div>
    </div>
@endsection
