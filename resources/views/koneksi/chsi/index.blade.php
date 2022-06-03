@extends('template.koneksi.template')

@section('title', 'CHSI - Selamat Datang di CHSI HIMSI')
@section('seo-desc', 'CHSI merupakan akronim dari Curahan Hati Sistem Informasi.'){{-- ini buat deskripsi seo --}}
@section('seo-img', '') {{-- ini buat gambar seo --}}

@section('bodyclass', '') {{-- kalo butuh class buat body --}}
@section('container', 'chsi-landing')

@section('content')
    <div class="chsi-landing__content">
        <h1 class="chsi-landing__title midnight-blue">Selamat Datang di <span class="french-blue">CHSI!</span></h1>
        <form method="POST" action="{{ route('curhat.find') }}" class="chsi-landing__form-content">
            @csrf
            <h4 class=" chsi-landing__buka-curhat grey">Ingin membuka curhatan?</h4>
            <div class="form__group form__group--oneline">
                <label for="token" class="form__label">Token :</label>
                <input type="text" name="token" id="token" class="form__control" placeholder="Masukkan token disini">
            </div>
            <button type="submit" class="btn-primary">Buka</button>
        </form>
        <p class="grey">Atau mulai curhatanmu <a href="{{ route('curhat.baru') }}"
                class="underline-link">disini</a></p>
    </div>
    <img src="{{ url('assets/image/logo-koneksi.png') }}" alt="" class="chsi-landing__ornament">
@endsection

@section('extrajs')
    {{-- <script src="{{ url('assets/js/koneksi/chsi.js') }}"></script> --}}
@endsection
