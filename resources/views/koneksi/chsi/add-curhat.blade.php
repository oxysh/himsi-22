@extends('template.koneksi.template')

@section('title', 'CHSI - Selamat Datang di CHSI HIMSI')
@section('seo-desc', 'CHSI merupakan akronim dari Curahan Hati Sistem Informasi.'){{-- ini buat deskripsi seo --}}
@section('seo-img', '') {{-- ini buat gambar seo --}}

@section('bodyclass', '') {{-- kalo butuh class buat body --}}
@section('container', 'chsi-add')

@section('content')
    <h1 class="chsi-add__title midnight-blue">Mau <span class="french-blue">Curhat</span> Tentang Apa?</h1>
    <form method="POST" action="{{ route('curhat.submit') }}" class="chsi-add__form">
        @csrf
        <div class="chsi-add__kategori">
            <input type="radio" name="kategori" id="himsi" value="himsi" class="hidden" checked>
            <label for="himsi" class="chsi-add__kategori-opsi">
                <img src="{{ url('assets/img/chsi-himsi.svg') }}" alt="" class="chsi-add__kategori-img">
                <h4>HIMSI</h4>
            </label>
            <input type="radio" name="kategori" id="ayang" value="ayang" class="hidden">
            <label for="ayang" class="chsi-add__kategori-opsi">
                <img src="{{ url('assets/img/chsi-ayang.svg') }}" alt="" class="chsi-add__kategori-img">
                <h4>Ayang</h4>
            </label>
            <input type="radio" name="kategori" id="kuliah" value="kuliah" class="hidden">
            <label for="kuliah" class="chsi-add__kategori-opsi">
                <img src="{{ url('assets/img/chsi-kuliah.svg') }}" alt="" class="chsi-add__kategori-img">
                <h4>Kuliah</h4>
            </label>
            <input type="radio" name="kategori" id="teman" value="teman" class="hidden">
            <label for="teman" class="chsi-add__kategori-opsi">
                <img src="{{ url('assets/img/chsi-teman.svg') }}" alt="" class="chsi-add__kategori-img">
                <h4>Ayang</h4>
            </label>
            <input type="radio" name="kategori" id="others" value="others" class="hidden">
            <label for="others" class="chsi-add__kategori-opsi">
                <img src="{{ url('assets/img/chsi-lain.svg') }}" alt="" class="chsi-add__kategori-img">
                <h4>Ayang</h4>
            </label>
        </div>

        <div class="chsi-add__balasan">
            <p>Apakah curhatan Anda ingin mendapat balasan dari kami?</p>
            <div class="chsi-add__balasan-opsi">
                <input type="radio" name="respon" id="iya" value="1" class="hidden">
                <label for="iya" class="chsi-add__balasan-label"><span></span> Iya!</label>
                <input type="radio" name="respon" id="tidak" value="0" class="hidden" checked>
                <label for="tidak" class="chsi-add__balasan-label"><span></span> Tidak</label>
            </div>
        </div>

        <div class="form__group form__group--oneline chsi-add__custom-token">
            <label for="customToken" class="form__label">Masukkan token sesuai keinginan (opsional) :</label>
            <input type="text" name="customToken" id="customToken" class="form__control"
                placeholder="Custom tokenmu disini">
        </div>
        <button type="submit" class="btn-primary">Lanjut</button>
    </form>
@endsection

@section('extrajs')
    {{-- <script src="{{ url('assets/js/koneksi/chsi.js') }}"></script> --}}
@endsection
