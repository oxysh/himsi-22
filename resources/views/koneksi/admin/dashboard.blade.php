@extends('template.koneksi.template-admin')

@section('title')
    Halo, {{ Auth::User()->name }}
@endsection
@section('seo-desc', ''){{-- ini buat deskripsi seo --}}
@section('seo-img', '') {{-- ini buat gambar seo --}}

@section('bodyclass', '') {{-- kalo butuh class buat body --}}
@section('container', 'adm-dashboard')

@section('content')
    <h3 class="midnight-blue">Dashboard</h3>
    <div class="adm-dashboard__highlight">
        <div class="adm-dashboard__highlight-title">
            <h4>Form Terkini</h4>
            <a href="{{ route('form.index') }}">Lihat semua</a>
        </div>
        <div class="adm-dashboard__card-container">
            @foreach ($form as $f)
                <div class="adm-dashboard__card adm-dashboard__card--form">
                    <div class="adm-dashboard__card-title-section">
                        <h4 class="midnight-blue">{{ $f->judul }}</h4>
                        <h5 class="midnight-blue">{{ $f->pemilik }}</h5>
                    </div>
                    <h5 class="grey">{{ sizeof($f->penjawab) }} Responden</h5>
                    <p class="grey">{{ $f->deadline }}</p>
                    @php
                        $origin = new DateTime();
                        $deadline = new DateTime($f->deadline);
                        $diff = $origin->diff($deadline);
                        if ($diff->invert) {
                            session()->flash('expired', true);
                        }
                    @endphp
                    @if ($diff->invert)
                        <p class="adm-dashboard__info adm-dashboard__info--ditutup">Ditutup</p>
                    @else
                        <p class="adm-dashboard__info adm-dashboard__info--dibuka">Dibuka</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <div class="adm-dashboard__highlight">
        <div class="adm-dashboard__highlight-title">
            <h4>Kritik Saran Terbaru</h4>
            <a href="{{ route('chsi.admin.kritik.index') }}">Lihat semua</a>
        </div>
        <div class="adm-dashboard__card-container">
            @foreach ($krisar as $k)
                <div class="adm-dashboard__card adm-dashboard__card--krisar">
                    <p class="adm-krisar__krisar">{{ $k->krisar }}</p>
                    <h5 class="grey">{{ $k->created_at }}</h5>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('extrajs')
    {{-- <script src="{{ url('assets/js/landing.js') }}"></script> --}}
    <script>
        $('.adm-krisar__krisar').each(x => {
            let text = $('.adm-krisar__krisar')[x].innerHTML;
            if (text.length > 100) {
                text = text.substring(0, 100) + ' ...';
            }
            $('.adm-krisar__krisar')[x].innerHTML = text;
        })
    </script>
@endsection
