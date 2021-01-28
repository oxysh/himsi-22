{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Responden</title>
</head>

<body>
    <header>
        <h1>Selamat Datang Responden</h1>
    </header>

    <section>
        @foreach ($form as $f)
            <div class="" style="margin-bottom: 20px">
                judul : <strong> {{ $f->judul }} </strong> <br>
                <a href="{{ route('responden.show', $f->id) }}">Isi FORM ini</a>
            </div>
        @endforeach
    </section>
</body>

</html> --}}

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
