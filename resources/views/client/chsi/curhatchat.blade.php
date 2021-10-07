@extends('template.cakrawala.client.template')

@section('title')
    Curhat
@endsection

@section('extracss')
    <link rel="stylesheet" href="{{ url('assets/css/chsi-chat.css') }}">
@endsection

@section('content')
    <div class="inner-content">
        <div class="main-content">
            <h2>Token : <span class="orange">{{ $data->token }}</span></h2>
            <span>Catat token diatas untuk meninjau balasan selanjutnya</span>
            <span>balon chat oranye adalah anda</span>
            <div class="box-chat" style="background-image: url('{{ url('assets/image/chat-bg.png') }}');">
                @foreach ($data->chat as $pesan)
                    @if ($pesan->psdm)
                        <span class="baloon baloon-left">{{ $pesan->chat }}</span>
                    @else
                        <span class="baloon baloon-right">{{ $pesan->chat }}</span>
                    @endif
                @endforeach
            </div>
            @if ($data->selesai)
                <h1>curhat uda selesai, mode read-only</h1>
            @else
                <form action="{{ route('curhat.chat.submit', $data->token) }}" method="POST" class="form-group">
                    @csrf
                    <textarea name="chat" id="" cols="" rows="3"></textarea>
                    <button type="submit" class="btn-primary"><img src="{{ url('assets/img/send.svg') }}"
                            alt=""></button>
                </form>

                <div class="end-curhat">
                    @if (count($data->chat->countBy('psdm')) != 1)
                        <a href="{{ route('curhat.finish.token', $data->token) }}" class="btn-outline">
                            <span>akhiri Chat</span>
                            <img src="https://img.icons8.com/ios-filled/50/fa314a/break--v2.png"
                                style="width: 25px; height: 25px;" /></a>
                    @endif
                    <span>Hanya dapat mengakhiri curhat apabila chat sudah dibalas oleh pengurus</span>
                </div>
            @endif
        </div>
        <img src="{{ url('assets/image/chsiChat.png') }}" alt="" id="sini-curhat">
    </div>
@endsection

@section('extrajs')
    <script src="{{ url('assets/js/form-list.js') }}"></script>
    <script>
        document.querySelector('#nav-chsi').classList.add('selected');
    </script>
@endsection
