@extends('template.koneksi.template-admin')

@section('title')
    Halo, {{ Auth::User()->name }}
@endsection
@section('seo-desc', ''){{-- ini buat deskripsi seo --}}
@section('seo-img', '') {{-- ini buat gambar seo --}}

@section('bodyclass', '') {{-- kalo butuh class buat body --}}
@section('container', 'adm-krisar')

@section('content')
    <h3 class="midnight-blue">Kritik Saran</h3>

    @if (count($PSDM))
        <div class="adm-dashboard__highlight">
            <div class="adm-dashboard__highlight-title">
                <h4>Kritik Saran PSDM</h4>
            </div>
            <div class="adm-dashboard__card-container">
                @foreach ($PSDM as $k)
                    <div class="adm-dashboard__card adm-dashboard__card--krisar" data-long="{{ $k->krisar }}"
                        data-bidang="{{ $k->bidang }}">
                        <p class="adm-krisar__krisar">{{ $k->krisar }}</p>
                        <h5 class="grey">{{ $k->created_at }}</h5>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    @if (count($BPH))
        <div class="adm-dashboard__highlight">
            <div class="adm-dashboard__highlight-title">
                <h4>Kritik Saran BPH</h4>
            </div>
            <div class="adm-dashboard__card-container">
                @foreach ($BPH as $k)
                    <div class="adm-dashboard__card adm-dashboard__card--krisar" data-long="{{ $k->krisar }}"
                        data-bidang="{{ $k->bidang }}">
                        <p class="adm-krisar__krisar">{{ $k->krisar }}</p>
                        <h5 class="grey">{{ $k->created_at }}</h5>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    @if (count($SERA))
        <div class="adm-dashboard__highlight">
            <div class="adm-dashboard__highlight-title">
                <h4>Kritik Saran SERA</h4>
            </div>
            <div class="adm-dashboard__card-container">
                @foreach ($SERA as $k)
                    <div class="adm-dashboard__card adm-dashboard__card--krisar" data-long="{{ $k->krisar }}"
                        data-bidang="{{ $k->bidang }}">
                        <p class="adm-krisar__krisar">{{ $k->krisar }}</p>
                        <h5 class="grey">{{ $k->created_at }}</h5>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    @if (count($HUBLU))
        <div class="adm-dashboard__highlight">
            <div class="adm-dashboard__highlight-title">
                <h4>Kritik Saran Hublu</h4>
            </div>
            <div class="adm-dashboard__card-container">
                @foreach ($HUBLU as $k)
                    <div class="adm-dashboard__card adm-dashboard__card--krisar" data-long="{{ $k->krisar }}"
                        data-bidang="{{ $k->bidang }}">
                        <p class="adm-krisar__krisar">{{ $k->krisar }}</p>
                        <h5 class="grey">{{ $k->created_at }}</h5>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    @if (count($KESTARI))
        <div class="adm-dashboard__highlight">
            <div class="adm-dashboard__highlight-title">
                <h4>Kritik Saran Kestari</h4>
            </div>
            <div class="adm-dashboard__card-container">
                @foreach ($KESTARI as $k)
                    <div class="adm-dashboard__card adm-dashboard__card--krisar" data-long="{{ $k->krisar }}"
                        data-bidang="{{ $k->bidang }}">
                        <p class="adm-krisar__krisar">{{ $k->krisar }}</p>
                        <h5 class="grey">{{ $k->created_at }}</h5>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    @if (count($MEDIA))
        <div class="adm-dashboard__highlight">
            <div class="adm-dashboard__highlight-title">
                <h4>Kritik Saran Media</h4>
            </div>
            <div class="adm-dashboard__card-container">
                @foreach ($MEDIA as $k)
                    <div class="adm-dashboard__card adm-dashboard__card--krisar" data-long="{{ $k->krisar }}"
                        data-bidang="{{ $k->bidang }}">
                        <p class="adm-krisar__krisar">{{ $k->krisar }}</p>
                        <h5 class="grey">{{ $k->created_at }}</h5>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    @if (count($AKADEMIK))
        <div class="adm-dashboard__highlight">
            <div class="adm-dashboard__highlight-title">
                <h4>Kritik Saran Akademik</h4>
            </div>
            <div class="adm-dashboard__card-container">
                @foreach ($AKADEMIK as $k)
                    <div class="adm-dashboard__card adm-dashboard__card--krisar" data-long="{{ $k->krisar }}"
                        data-bidang="{{ $k->bidang }}">
                        <p class="adm-krisar__krisar">{{ $k->krisar }}</p>
                        <h5 class="grey">{{ $k->created_at }}</h5>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    @if (count($RISTEK))
        <div class="adm-dashboard__highlight">
            <div class="adm-dashboard__highlight-title">
                <h4>Kritik Saran Ristek</h4>
            </div>
            <div class="adm-dashboard__card-container">
                @foreach ($RISTEK as $k)
                    <div class="adm-dashboard__card adm-dashboard__card--krisar" data-long="{{ $k->krisar }}"
                        data-bidang="{{ $k->bidang }}">
                        <p class="adm-krisar__krisar">{{ $k->krisar }}</p>
                        <h5 class="grey">{{ $k->created_at }}</h5>
                    </div>
                @endforeach
            </div>
        </div>
    @endif


    {{-- modal --}}
    <div class="adm-krisar__dialog dialog dialog__card" id="krisarDialog">
        <div class="adm-krisar__dialog--top">
            <h3 class="midnight-blue">Kritik saran untuk <span class="adm-krisar__bidang"></span></h3>
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
