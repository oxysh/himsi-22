@extends('template.cakrawala.client.template')

@section('title')
    Alumni
@endsection

@section('extracss')
    <link rel="stylesheet" href="{{ url('assets/css/data-alumni.css') }}">
    <style>
        .title {
            text-align: left;
        }

        .top-btn {
            grid-template-columns: 1fr;
        }

    </style>
@endsection

@section('content')
    <div class="content">
        <h2 class="title">Daftar Alumni</h2>
        <div class="top-btn">
            <div class="right">
                <div class="dropdown">
                    <button class="dropbtn btn btn-primary">Sort <img
                            src="{{ url('assets/img/drop-down-ylw.svg') }}" /></button>
                    <div class="dropdown-content">
                        <a href="#">Nama</a>
                        <a href="#">Tahun Masuk</a>
                        <a href="#">Pekerjaan Saat Ini</a>
                    </div>
                </div>
            </div>
            <div class="search">
                <input class="form-control search" type="text" placeholder="Search">
                <button class="btn btn-primary"><img src="{{ url('assets/img/search.svg') }}"></button>
            </div>
        </div>

        <div class="grid">
            <div class="card">
                <div class="card-body">
                    <span class="card-title">Nama : Lembu</span>
                    <span class="">Tahun Masuk : 2020</span>
                    <span class="">Pekerjaan : Sok sibuk</span>
                </div>
                <div class="card-line">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <span class="card-title">M. Nabil Musthofa</span>
                    <span class="">2020</span>
                    <span class="">Mboh gatau gangerti</span>
                </div>
                <div class="card-line">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <span class="card-title">Oxy Setyo Hapsari blablabla biar panjang namanya</span>
                    <span class="">2020</span>
                    <span class="">gtau yg penting kaya</span>
                </div>
                <div class="card-line">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <span class="card-title">Detria Azka</span>
                    <span class="">2020</span>
                    <span class="">-</span>
                </div>
                <div class="card-line">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <span class="card-title">Nama</span>
                    <span class="">Tahun Masuk</span>
                    <span class="">Pekerjaan</span>
                </div>
                <div class="card-line">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <span class="card-title">M.</span>
                    <span class="">2015</span>
                    <span class="">Mboh gatau gangerti</span>
                </div>
                <div class="card-line">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <span class="card-title">namanya</span>
                    <span class="">2010</span>
                    <span class="">gtau yg penting kaya</span>
                </div>
                <div class="card-line">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <span class="card-title">Azka</span>
                    <span class="">2014</span>
                    <span class="">-</span>
                </div>
                <div class="card-line">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <span class="card-title">Nama</span>
                    <span class="">Tahun Masuk</span>
                    <span class="">Pekerjaan</span>
                </div>
                <div class="card-line">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <span class="card-title">M.</span>
                    <span class="">2015</span>
                    <span class="">Mboh gatau gangerti</span>
                </div>
                <div class="card-line">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <span class="card-title">namanya</span>
                    <span class="">2010</span>
                    <span class="">gtau yg penting kaya</span>
                </div>
                <div class="card-line">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <span class="card-title">Azka</span>
                    <span class="">2014</span>
                    <span class="">-</span>
                </div>
                <div class="card-line">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <span class="card-title">Nama : Lembu</span>
                    <span class="">Tahun Masuk : 2020</span>
                    <span class="">Pekerjaan : Sok sibuk</span>
                </div>
                <div class="card-line">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <span class="card-title">M. Nabil Musthofa</span>
                    <span class="">2020</span>
                    <span class="">Mboh gatau gangerti</span>
                </div>
                <div class="card-line">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <span class="card-title">Oxy Setyo Hapsari blablabla biar panjang namanya</span>
                    <span class="">2020</span>
                    <span class="">gtau yg penting kaya</span>
                </div>
                <div class="card-line">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <span class="card-title">Detria Azka</span>
                    <span class="">2020</span>
                    <span class="">-</span>
                </div>
                <div class="card-line">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <span class="card-title">Nama</span>
                    <span class="">Tahun Masuk</span>
                    <span class="">Pekerjaan</span>
                </div>
                <div class="card-line">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <span class="card-title">M.</span>
                    <span class="">2015</span>
                    <span class="">Mboh gatau gangerti</span>
                </div>
                <div class="card-line">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <span class="card-title">namanya</span>
                    <span class="">2010</span>
                    <span class="">gtau yg penting kaya</span>
                </div>
                <div class="card-line">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <span class="card-title">Azka</span>
                    <span class="">2014</span>
                    <span class="">-</span>
                </div>
                <div class="card-line">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <span class="card-title">Nama</span>
                    <span class="">Tahun Masuk</span>
                    <span class="">Pekerjaan</span>
                </div>
                <div class="card-line">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <span class="card-title">M.</span>
                    <span class="">2015</span>
                    <span class="">Mboh gatau gangerti</span>
                </div>
                <div class="card-line">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <span class="card-title">namanya</span>
                    <span class="">2010</span>
                    <span class="">gtau yg penting kaya</span>
                </div>
                <div class="card-line">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <span class="card-title">Azka</span>
                    <span class="">2014</span>
                    <span class="">-</span>
                </div>
                <div class="card-line">
                </div>
            </div>
        </div>
    </div>
@endsection
