@extends('template.koneksi.template-admin')

@section('title')
    Kritik saran untuk {{ Auth::User()->name }}
@endsection
@section('seo-desc', ''){{-- ini buat deskripsi seo --}}
@section('seo-img', '') {{-- ini buat gambar seo --}}

@section('bodyclass', '') {{-- kalo butuh class buat body --}}
@section('container', 'adm-chsi')

@section('content')
    <h1 class="midnight-blue adm-chsi__title">List <span>Curhat</span></h1>
    <div class="adm-chsi__card-container">
        @foreach ($data as $curhat)
            <div onclick="location.href = '{{ route('chsi.admin.curhat.chat', $curhat->token) }}'"
                class="adm-chsi__card @if ($curhat->selesai) adm-chsi__card--selesai @else @if ($curhat->nunggu) adm-chsi__card--belum-dijawab @else adm-chsi__card--on-progress @endif @endif">
                <h4>{{ $curhat->token }}</h4>
                <h5>{{ strtoupper($curhat->kategori) }}</h5>
                <h6 class="grey">{{ $curhat->created_at }}</h6>
                <div class="adm-chsi__card-label">
                    <h5>{{ $curhat->dibalas ? 'Dengan balasan' : 'Tanpa balasan' }}</h5>
                    @if ($curhat->selesai)
                        <h5 class="adm-chsi__card-status">Selesai</h5>
                    @else
                        @if ($curhat->nunggu)
                            <h5 class="adm-chsi__card-status">Belum dijawab</h5>
                        @else
                            <h5 class="adm-chsi__card-status">On Progress</h5>
                        @endif
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('extrajs')
    {{-- <script src="{{ url('assets/js/koneksi/adm-curhat.js') }}"></script> --}}
@endsection
