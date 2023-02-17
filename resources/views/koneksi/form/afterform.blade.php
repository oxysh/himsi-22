@extends('template.koneksi.template')

@section('title')
    {{ $form->judul }}
@endsection
@section('seo-desc', ''){{-- ini buat deskripsi seo --}}
@section('seo-img', '') {{-- ini buat gambar seo --}}

@section('bodyclass', '') {{-- kalo butuh class buat body --}}
@section('container', 'afterform')

@section('content')
    <div class="afterform__content">
        @if (Session::has('expired'))
            <div class="afterform__description">
                <h1>Sesi Berakhir</h1>
                <p class="grey">Mohon maaf, form ini sudah tidak tersedia. Terima kasih atas partisipasnya </p>
            </div>
            <a href="{{ route('home') }}" class="button btn-primary">Kembali</a>
        @else
            <div class="afterform__description">
                <h1>Terima Kasih</h1>
                @if ($form->afterform != '')
                    <p class="grey">{{ $form->afterform }}</p>
                @else
                    <p class="grey">Terima kasih telah mengisi Form ini</p>
                @endif

                @if ($form->afterformlink)
                    <a href="{{ $form->afterformlink }}" target="_blank"
                        rel="noopener noreferrer">{{ $form->afterformlink }}</a>
                @endif
            </div>
            <a href="{{ route('form.bitly', $form->bitly) }}" class="button btn-primary">Kembali</a>
        @endif
    </div>
@endsection

@section('extrajs')
    {{-- <script src="{{ url('assets/js/koneksi/afterform.js') }}"></script> --}}
@endsection
