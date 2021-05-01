@extends('template.cakrawala.client.template')

@section('title')
    Akademik
@endsection

@section('extracss')
    <link rel="stylesheet" href="{{url('assets/css/akademik.css')}}">
@endsection

@section('content')
    <span class="h2">Berkas Akademik</span>
    <div class="test1">
        <div onclick="window.open('https://drive.google.com/open?id=1WOEJ530ZbAD1T_jsfvxZ06zhctKRaRdA')">
            <img src="{{url('assets/image/akademiknew/Frame 15.png')}}" alt="">
            <span>Skripsi </span>
        </div>
        <div onclick="window.open('https://drive.google.com/open?id=1JhWRoatAJO5qRjnLsOA43ltT6SY0o9k4')">
            <img src="{{url('assets/image/akademiknew/Frame 16.png')}}" alt="" id="img2">
            <span>Bank Soal </span>
        </div>
        <div onclick="window.open('https://drive.google.com/open?id=1izNNCMH2o11yV2-4F74ryRskWhGeuJAV')">
            <img src="{{url('assets/image/akademiknew/Frame 17.png')}}" alt="" id="img3">
            <span>PKM </span>
        </div>
        <div onclick="window.open('https://drive.google.com/open?id=1sYrAn-M1V9n6BpZr3dKPEZU6elng3cTf')">
            <img src="{{url('assets/image/akademiknew/Frame 18.png')}}" alt="" id="img4">
            <span>Bank Materi </span>
        </div>
        <div onclick="window.open('https://drive.google.com/drive/folders/1RI4miI-ZaJO4yjt8IMK8LlzMR0p7nqJL?usp=sharing')">
            <img src="{{url('assets/image/akademiknew/Frame 19.png')}}" alt="">
            <span>Software Tools </span>
        </div>

    </div>
@endsection

@section('extrajs')
    <script>
        document.querySelector('#nav-akademik').classList.add('active');

    </script>
@endsection
