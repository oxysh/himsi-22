@extends('template.koneksi.template')

@section('title', '')
@section('seo-desc', ''){{-- ini buat deskripsi seo --}}
@section('seo-img', '') {{-- ini buat gambar seo --}}

@section('bodyclass', '') {{-- kalo butuh class buat body --}}
@section('container', 'chsi-chatroom')

@section('content')
    <h1 class="midnight-blue">Sesi <span class="french-blue">Curhat</span></h1>
    <div class="chsi-chatroom__chatbox">
        <div class="chsi-chatroom__chat-scroll">
            @foreach ($data->chat as $pesan)
                @if ($pesan->psdm)
                    <span class="p chsi-chatroom__bubblechat chsi-chatroom__bubblechat--left">{{ $pesan->chat }}</span>
                @else
                    <span class="p chsi-chatroom__bubblechat chsi-chatroom__bubblechat--right">{{ $pesan->chat }}</span>
                @endif
            @endforeach

            {{-- gambar buat end chat --}}
            @if ($data->selesai)
                @if ($data->quote != null)
                    <span class="chsi-chatroom__bubblechat chsi-chatroom__bubblechat--left">
                        <img src="/image/{!! $data->quote !!}">
                    </span>
                @else
                    <span class="chsi-chatroom__bubblechat chsi-chatroom__bubblechat--left">
                        <img src="{{ url('assets/image/default.jpg') }}">
                    </span>
                @endif
            @endif
        </div>

        {{-- input send chat --}}
        @if ($data->selesai)
            <div class="chsi-chatroom__chat-input chsi-chatroom__chat-input--ended">
                <p>Curhatan telah berakhir</p>
            </div>
        @else
            <form action="{{ route('curhat.chat.submit', $data->token) }}" method="POST" class="chsi-chatroom__chat-input">
                @csrf
                <input type="text" class="chsi-chatroom__input-text" name="chat" placeholder="Kirim pesan...">
                <button type="submit" class="chsi-chatroom__send-btn"><img src="{{ url('assets/img/send.svg') }}"
                        alt=""></button>
            </form>
        @endif
    </div>

    {{-- end curhat --}}
    @if ($data->selesai)
    @elseif ($data->dibalas == true)
        <div class="chsi-chatroom__end">
            <h5 class="grey">Anda hanya dapat mengakhiri curhat apabila chat sudah dibalas oleh admin</h5>
            @if (count($data->chat->countBy('psdm')) >= 2)
                <a href="{{ route('curhat.finish.token', $data->token) }}" class="button btn-danger">
                    Akhiri</a>
            @endif
        </div>
    @else
        <div class="chsi-chatroom__end">

            @if (count($data->chat->countBy('psdm')) >= 1)
                <a href="{{ route('curhat.finish.token', $data->token) }}" class="button btn-danger">
                    Akhiri</a>
            @endif
        </div>
    @endif
@endsection

@section('extrajs')
    {{-- <script src="{{ url('assets/js/koneksi/chsi.js') }}"></script> --}}
@endsection
