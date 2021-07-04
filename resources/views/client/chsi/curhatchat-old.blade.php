@extends('template.bootstrap.client')

@section('title')
    CHSI
@endsection

@section('content')
    <div class="container">
        <div class="col-12">

            <div class="row mt-4">
                <div class="col-12">
                    <p class="h1">Token :: {{$data->token}}</p>
                </div>
            </div>

            <div class="row mt-4">

                <div class="col-12 border border-dark">
                    @foreach ($data->chat as $pesan)

                        @if ($pesan->psdm)
                            <div class="row my-2 d-flex justify-content-end">

                                <div class="p-2 rounded border border-primary bg-light col-10">{{$pesan->chat}}
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
                                <div class="p-2 rounded border border-success bg-success col-10">{{$pesan->chat}}</div>
                            </div>

                        @endif

                    @endforeach
                </div>
            </div>

            @if ($data->selesai)
            <h1>curhat uda selesai, mode read-only</h1>
            @else
                

            <div class="row mt-4">
                <form class="col-12" method="POST" action="{{ route('curhat.chat.submit',$data->token) }}">
                    @csrf
                    <div class="form-group">
                        <label for="curhat">Your Message</label>
                        <textarea name="chat" class="form-control" id="curhat" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Chat</button>
                    {{-- @foreach ($data->chat->countBy('psdm')->all() as $key => $item)
                    {{$key}} -> {{$item}}
                    @endforeach --}}

                    @if (count($data->chat->countBy('psdm')) != 1)
                    <a href="{{ route('curhat.finish.token', $data->token) }}" class="ml-2 btn btn-warning">Akhiri Chat</a>
                    @endif
                </form>
            </div>
            @endif

        </div>

    </div>


    </div>
    </div>
@endsection
