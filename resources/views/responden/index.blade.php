@extends('template.bootstrap.temp')

@section('title')
    Responden
@endsection

@section('content')
    <div class="container my-4">
        <div class="row">
            <h1>Selamat Datang Responden</h1>
        </div>
        @foreach ($form as $f)
            @if (sizeof($f->pertanyaan) > 0)
                <div class="row my-2">
                    <div class="card col-12">
                        <div class="card-body">
                            <div class="row justify-content-start">
                                <a class=" form-inline" href=" {{ route('responden.show', $f->id) }} "><button
                                        class="btn btn-primary mr-3">isi FORM ini</button></a>
                                <p class="h3"> {{ $f->judul }} <span class="badge badge-dark">{{ $f->pemilik }}</span></p>
                            </div>

                        </div>
                    </div>
                </div>
            @endif

        @endforeach
    </div>

@endsection
