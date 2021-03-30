@extends('template.bootstrap.temp')

@section('title')
    CHSI - Curhat
@endsection

@section('content')
    <div class="container my-4" style="gap:20px; display:flex; flex-direction: column;">

        <div class="row">
            <a href="{{route('chsi.admin.curhat.index')}}" class="text-dark">
                <img src="https://img.icons8.com/flat-round/64/000000/back--v1.png" style="width:25px"/> kembali
            </a>
        </div>

        <div class="row">
            <h1 class="display-4">
                Chat lur :: <span class="text-warning bg-dark p-2 rounded"> {{ $kode }} </span>
            </h1>
        </div>

        <div class="row">

            <div class="col-12 border border-dark bg-info">
                <div class="row my-2 d-flex justify-content-start">
                    <div class="mx-2">
                        <img src="{{ url('assets/image/logo.png') }}" style="width: 50px;"
                            class="img-fluid img-thumbnail rounded-circle" alt="...">
                    </div>
                    <div class="p-2 rounded border border-success bg-success col-10">Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Quidem inventore dolor aliquam cupiditate qui, distinctio omnis blanditiis debitis
                        tempore iste maxime. Tempora eaque doloribus harum omnis officia cumque suscipit porro eligendi eius
                        ducimus maxime, repellendus recusandae maiores itaque, at sequi saepe perferendis minima. Totam
                        cupiditate incidunt est neque culpa sunt?</div>
                </div>
                <div class="row my-2 d-flex justify-content-end">

                    <div class="p-2 rounded border border-primary bg-light col-10">Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Pariatur nihil non sapiente nostrum iste cumque autem, repellat aut atque error!
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa architecto incidunt sapiente tempore
                        nesciunt odit vero excepturi porro nobis cumque quasi aperiam repudiandae, veritatis quisquam
                        blanditiis inventore in ratione possimus.
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate eos rerum deleniti possimus
                        impedit, placeat debitis quibusdam doloribus illo doloremque?
                    </div>
                    <div class="mx-2">
                        <img src="{{ url('assets/image/logo.png') }}" style="width: 50px;"
                            class="img-fluid img-thumbnail rounded-circle" alt="...">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <form class="col-12" method="POST" action="{{ route('curhat.submit') }}">
                @csrf
                <div class="form-group">
                    <label for="curhat">Your Message</label>
                    <textarea name="curhatan" class="form-control" id="curhat" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Chat</button>
            </form>
        </div>

    </div>
@endsection
