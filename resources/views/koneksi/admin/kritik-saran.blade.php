@extends('template.koneksi.template-admin')

@section('title')
    Kritik saran untuk {{ Auth::User()->name }}
@endsection
@section('seo-desc', ''){{-- ini buat deskripsi seo --}}
@section('seo-img', '') {{-- ini buat gambar seo --}}

@section('bodyclass', '') {{-- kalo butuh class buat body --}}
@section('container', 'adm-krisar')

@section('content')
    <h3 class="midnight-blue">Kritik Saran</h3>

    <div class="adm-dashboard__card-container">
        @foreach ($krisar as $k)
            <div class="adm-dashboard__card adm-dashboard__card--krisar" data-long="{{ $k->krisar }}">
                <p class="adm-krisar__krisar">{{ $k->krisar }}</p>
                <h5 class="grey">{{ $k->created_at }}</h5>
            </div>
        @endforeach
    </div>

    {{-- modal --}}
    <div class="adm-krisar__dialog dialog dialog__card" id="krisarDialog">
        <div class="adm-krisar__dialog--top">
            <h3 class="midnight-blue">Kritik saran untuk {{ Auth::User()->name }}</h3>
            <p>kritik</p>
        </div>
        <div class="adm-krisar__dialog--bottom">
            <h5 class="grey">created at</h5>
        </div>
    </div>
    <div class="dialog__bg dialog__bg-close"></div>
@endsection

@section('extrajs')
    <script src="{{ url('assets/js/koneksi/adm-krisar.js') }}"></script>
@endsection
