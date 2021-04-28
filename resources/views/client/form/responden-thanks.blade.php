@extends('template.cakrawala.client.template')

@section('title')
    AfterForm
@endsection

@section('extracss')

@endsection

@section('content')
    <!-- Judul Form -->
    <h4 class="form-header">(Judul) Pendaftaran Kepengurusan HIMSI 2021</h4>
    <!-- pilihan alert = info; primary; success; danger -->

    <div class="form-group">
        @if ($form->afterform != '')
            <h3>{{ $form->afterform }}</h3>
        @else
            <h3>Terima kasih telah mengisi Form ini</h3>
        @endif
        @if ($form->afterformlink)
            <a href="#" onclick="window.open('{{$form->afterformlink}}')">{{ $form->afterformlink }}</a>
        @endif
        <a href="{{ route('form.bitly', $form->bitly) }}">Isi Form lagi</a>
    </div>
@endsection

@section('modal')

@endsection

@section('extrajs')

@endsection
