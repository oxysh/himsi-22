@extends('template.bootstrap.temp')

@section('title')
    CHSI - Curhat
@endsection

@section('content')
    <div class="container my-4" style="gap:20px; display:flex; flex-direction: column;">

        <div class="row">
            <a href="{{ route('chsi.admin.curhat.index') }}" class="text-dark">
                <img src="https://img.icons8.com/flat-round/64/000000/back--v1.png" style="width:25px" /> kembali
            </a>
        </div>

        <div class="row">
            <h1 class="display-4">
                Chat lur :: <span class="text-warning bg-dark p-2 rounded"> {{ $data->token }} </span>
            </h1>
        </div>

        <div class="row">

            <div class="col-12 border border-dark bg-info">
                @foreach ($data->chat as $pesan)

                    @if ($pesan->psdm)
                        <div class="row my-2 d-flex justify-content-end">

                            <div class="p-2 rounded border border-primary bg-light col-10">{{ $pesan->chat }}
                            </div>
                            <div class="mx-2">
                                <img src="{{ url('assets/image/logo.png') }}" style="width: 50px;"
                                    class="img-fluid img-thumbnail rounded" alt="...">
                            </div>
                        </div>
                    @else
                        <div class="row my-2 d-flex justify-content-start">
                            <div class="mx-2">
                                <img src="{{ url('assets/image/logo.png') }}" style="width: 50px;"
                                    class="img-fluid img-thumbnail rounded" alt="...">
                            </div>
                            <div class="p-2 rounded border border-success bg-success col-10">{{ $pesan->chat }}</div>
                        </div>

                    @endif

                @endforeach
            </div>
        </div>

        @if ($data->dibalas)
            <div class="row">
                <form class="col-12" method="POST" action="{{ route('chsi.admin.curhat.chat.submit', $data->token) }}">
                    @csrf
                    <div class="form-group">
                        <label for="curhat">Your Message</label>
                        <textarea name="chat" class="form-control" id="curhat" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Chat</button>
                </form>
            </div>
        @endif


    </div>
@endsection
