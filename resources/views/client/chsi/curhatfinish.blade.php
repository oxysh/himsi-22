@extends('template.cakrawala.client.template')

@section('title')
    Curhat
@endsection

@section('extracss')
    <link rel="stylesheet" href="{{ url('assets/css/chsi-after.css') }}">
@endsection

@section('content')
    <h2>Terimakasih</h2>

    <div class="box-message">
        <span class="h4">
            @if (Session::has('quote'))
                <img src="/image/{!! Session::get('quote') !!}" style="width: 325px; height: 325px;" >
            @else
                Tetap Semangat dan Jangan Menyerah
            @endif
        </span>
        <span class="signature">PSDM HIMSI UNAIR</span>
    </div>
@endsection

@section('extrajs')
    <script src="{{ url('assets/js/form-list.js') }}"></script>
    <script>
        document.querySelector('#nav-chsi').classList.add('selected');
    </script>
@endsection
