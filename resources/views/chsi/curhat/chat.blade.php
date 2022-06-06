@extends('template.cakrawala.admin.template')

@section('title')
Curhat - {{$data->token}}
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
        <div class="motivasi">
            <h4>Motivasi untuk orang yang curhat</h4>
            <span>saat ini : {{ $data->quote ? $data->quote : 'masih kosong' }}</span>
            @if (!$data->selesai)

                @if ($data->quote != null)
                <br><img src="/image/{!! $data->quote !!}">
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
            <form action="{{ route('chsi.admin.curhat.motivasi.submit', $data->token) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
        
                    <div class="col-md-6">
                        <input type="file" name="image" class="form-control">
                    </div>
        
                    <div class="col-md-6">
                        <button type="submit" class="btn-primary">Upload</button>
                    </div>
        
                </div>
            </form>
            @else
                @if ($data->quote != null)
                    <br><img src="/image/{!! $data->quote !!}">
                @endif
            @endif
    </div>
</div>

@endsection

@section('extrajs')
    <script src="{{ url('assets/js/form-list.js') }}"></script>
    <script>
        document.querySelector('#nav-chsi').classList.add('selected');
    </script>
@endsection
