@extends('template.cakrawala.client.template')

@section('title')
    Meditasi
@endsection

@section('extracss')
    <link rel="stylesheet" href="{{ url('assets/css/meditasi-index.css') }}" />
    <!-- Extra Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
@endsection

@section('content')

    <div class="meditasi" id="frame1"
        style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('{{ url('assets/img/main-bg.jpg') }}');">
        <h1 class="title great-vibes">Holiyay!</h1>
        <p class="desc">Tema bulan ini adalah liburan, oleh karena itu kami membuat playlist yang kiranya dapat
            menemani liburan kalian!</p>
        <div class="card"
            onclick="window.open('https://open.spotify.com/playlist/5l9SFfj1Ey3LZU2MOxR5me?si=74b8d8324abc45c6')">
            <img src="{{ url('assets/img/med-sesajen.jpg') }}" alt="">
            <div class="card-body">
                <h3 class="title">Sesajen <img src="{{ url('assets/img/spotify-logo-png-7053.png') }}" /></h3>
                <p class="short-desc">Bersantai menikmati libur yang sebentar dengan playlist ini</p>
                <span class="link">Klik untuk menuju playlist</span>
            </div>
        </div>
        <div class="card"
            onclick="window.open('https://open.spotify.com/playlist/7vieDfadLHVAWMKIvEDE1J?si=1a054ebd9f8e4348')">
            <img src="{{ url('assets/img/med-nyabar.jpg') }}" alt="">
            <div class="card-body">
                <h3 class="title">Nyabar <img src="{{ url('assets/img/spotify-logo-png-7053.png') }}" /></h3>
                <p class="short-desc">Bernyanyi bersama menikmati perjalanan mudik dengan lagu-lagu pilihan</p>
                <span class="link">Klik untuk menuju playlist</span>
            </div>
        </div>
        <div class="card"
            onclick="window.open('https://open.spotify.com/playlist/5NIfmuzZ8WZc3edJB4oZhN?si=34b0cdbf5dcf4ec8')">
            <img src="{{ url('assets/img/med-kakel.jpg') }}" alt="">
            <div class="card-body">
                <h3 class="title">Kakel <img src="{{ url('assets/img/spotify-logo-png-7053.png') }}" /></h3>
                <p class="short-desc">Tidak ada yang lebih nyaman selain karaoke bareng keluarga terdekat</p>
                <span class="link">Klik untuk menuju playlist</span>
            </div>
        </div>
    </div>
@endsection
