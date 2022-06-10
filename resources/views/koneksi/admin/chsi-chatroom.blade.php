@extends('template.koneksi.template-admin')

@section('title')
    Curhat - {{ $data->token }}
@endsection
@section('seo-desc', ''){{-- ini buat deskripsi seo --}}
@section('seo-img', '') {{-- ini buat gambar seo --}}

@section('bodyclass', '') {{-- kalo butuh class buat body --}}
@section('container', 'adm-chsi adm-chatroom')

@section('content')
    <h1 class="midnight-blue adm-chsi__title">Curhat <span>{{ $data->token }}</span></h1>
    <div class="adm-chatroom__chat-motivasi">
        <div class="chsi-chatroom__chatbox">
            <div class="chsi-chatroom__chat-scroll">
                @foreach ($data->chat as $pesan)
                    @if ($pesan->psdm)
                        <span
                            class="p chsi-chatroom__bubblechat chsi-chatroom__bubblechat--right">{{ $pesan->chat }}</span>
                    @else
                        <span class="p chsi-chatroom__bubblechat chsi-chatroom__bubblechat--left">{{ $pesan->chat }}</span>
                    @endif
                @endforeach

                {{-- gambar buat end chat --}}
                @if ($data->selesai)
                    @if ($data->quote != null)
                        <span class="chsi-chatroom__bubblechat chsi-chatroom__bubblechat--right">
                            <img src="/image/{!! $data->quote !!}">
                        </span>
                    @else
                        <span class="chsi-chatroom__bubblechat chsi-chatroom__bubblechat--right">
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
                <form action="{{ route('chsi.admin.curhat.chat.submit', $data->token) }}" method="POST"
                    class="chsi-chatroom__chat-input">
                    @csrf
                    <input type="text" class="chsi-chatroom__input-text" name="chat" placeholder="Kirim pesan...">
                    <button type="submit" class="chsi-chatroom__send-btn"><img src="{{ url('assets/img/send.svg') }}"
                            alt=""></button>
                </form>
            @endif
        </div>

        {{-- Motivasi --}}
        <form action="{{ route('chsi.admin.curhat.motivasi.submit', $data->token) }}" method="POST"
            enctype="multipart/form-data" class="adm-chatroom__motivasi">
            <h2>Kartu Motivasi</h2>
            @csrf
            <label for="image" class="button btn-secondary">Upload Gambar</label>
            <input type="file" name="image" id="image" accept="image/png, image/jpeg" class="hidden">
            @if ($data->quote)
                <img src="/image/{!! $data->quote !!}" class="adm-chatroom__img-motivasi">
            @endif
        </form>

        <img src="/image/{!! $data->quote !!}" class="adm-chatroom__img-motivasi-dialog dialog">
        <div class="dialog__bg"></div>
    </div>
@endsection

@section('extrajs')
    {{-- <script src="{{ url('assets/js/koneksi/adm-curhat.js') }}"></script> --}}
    <script>
        $('.adm-chatroom #image').change(() => {
            $('.adm-chatroom__motivasi')[0].submit();
        })

        $('.adm-chatroom__img-motivasi').click(() => {
            $('.adm-chatroom__img-motivasi-dialog')[0].classList.add('active')
            $('.dialog__bg')[0].classList.add('active')
        })
    </script>
@endsection
