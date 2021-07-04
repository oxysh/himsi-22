@extends('template.cakrawala.admin.template')

@section('title')

@endsection

@section('extracss')
    <link rel="stylesheet" href="{{ url('assets/css/chsi-chat.css') }}">
@endsection

@section('content')
<div class="inner-content">

    <div class="main-content">
        <h2>Token : <span class="orange">{{ $data->token }}</span></h2>
        <span>Curhatanmu</span>
        <div class="box-chat" style="background-image: url('{{ url('assets/image/chat-bg.png') }}');">
            @foreach ($data->chat as $pesan)
                @if ($pesan->psdm)
                    <span class="baloon baloon-right">{{ $pesan->chat }}</span>
                @else
                    <span class="baloon baloon-left">{{ $pesan->chat }}</span>
                @endif
            @endforeach
        </div>
        @if ($data->dibalas && !$data->selesai)
            <form action="{{ route('chsi.admin.curhat.chat.submit', $data->token) }}" method="POST" class="form-group">
                @csrf
                <textarea name="chat" id="" cols="" rows="3"></textarea>
                <button type="submit" class="btn-primary"><img src="{{ url('assets/img/send.svg') }}" alt=""></button>
            </form>
        @endif

    </div>
    @if ($data->dibalas)
        <div class="motivasi">
            <h4>Motivasi untuk orang yang curhat</h4>
            <span>saat ini : {{ $data->quote ? $data->quote : 'masih kosong' }}</span>
            @if (!$data->selesai)
                <form action="{{ route('chsi.admin.curhat.motivasi.submit', $data->token) }}" method="POST"
                    class="form-group" style="flex-direction: column;">
                    @csrf
                    <textarea name="motivasi" id="" cols="" rows="3"></textarea>
                    <button type="submit" class="btn-primary">Motivasi<img src="{{ url('assets/img/send.svg') }}"
                            alt=""></button>
                </form>
            @endif

        </div>
    @endif
</div>

@endsection

@section('extrajs')
    <script src="{{ url('assets/js/form-list.js') }}"></script>
    <script>
        document.querySelector('#nav-chsi').classList.add('selected');
    </script>
@endsection
