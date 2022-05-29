@extends('template.koneksi.template')

@section('title')
    Akademik
@endsection
@section('seo-desc', ''){{-- ini buat deskripsi seo --}}
@section('seo-img', '') {{-- ini buat gambar seo --}}

@section('bodyclass', '') {{-- kalo butuh class buat body --}}
@section('container', 'akademik')

@section('content')
    <div class="akademik__title-section">
        <h1 class="midnight-blue">Berkas Akademik</h1>
        <p>Temukan referensi yang kalian cari seputar perkuliahan yang bersumber dari warga Sistem Informasi Universitas
            Airlangga disini. </p>
    </div>

    <div class="akademik__opsi">
        <div class="akademik__card"
            onclick="window.open('https://drive.google.com/open?id=1WOEJ530ZbAD1T_jsfvxZ06zhctKRaRdA')">
            <img src="{{ url('assets/img/akademik-skripsi.svg') }}" alt="">
            <h4>Skripsi</h4>
        </div>
        <div class="akademik__card"
            onclick="window.open('https://drive.google.com/drive/folders/1f3IuEUKyd8X0mDCVAhpZPWMoI9sU3Kxv?usp=sharing')">
            <img src="{{ url('assets/img/akademik-bank-soal.svg') }}" alt="">
            <h4>Bank Soal</h4>
        </div>
        <div class="akademik__card"
            onclick="window.open('https://drive.google.com/open?id=1izNNCMH2o11yV2-4F74ryRskWhGeuJAV')">
            <img src="{{ url('assets/img/akademik-pkm.svg') }}" alt="">
            <h4>PKM</h4>
        </div>
        <div class="akademik__card"
            onclick="window.open('https://drive.google.com/open?id=1sYrAn-M1V9n6BpZr3dKPEZU6elng3cTf')">
            <img src="{{ url('assets/img/akademik-bank-materi.svg') }}" alt="">
            <h4>Bank Materi</h4>
        </div>
        <div class="akademik__card"
            onclick="window.open('https://drive.google.com/drive/folders/1RI4miI-ZaJO4yjt8IMK8LlzMR0p7nqJL?usp=sharing')">
            <img src="{{ url('assets/img/akademik-software-tools.svg') }}" alt="">
            <h4>Software Tools</h4>
        </div>
    </div>
@endsection

@section('extrajs')
    {{-- <script src="{{ url('assets/js/koneksi/akademik.js') }}"></script> --}}
@endsection
