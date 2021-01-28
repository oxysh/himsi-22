{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Isi Form</title>
</head>

<body>
    <header>
        <h1> {{ $form->judul }} </h1>
    </header>

    <section>

        <form action="{{ route('responden.store') }}" method="post">

            @csrf
            <input type="hidden" name="formid" value="{{ $form->id }}">
            @foreach ($form->pertanyaan as $p)
                <label for="{{ $p->id }}"> {{ $p->pertanyaan }} </label>
                @if ($p->tipe == 'select')
                    <select name="{{ $p->id }}" id="{{ $p->id }}">
                        @foreach ($p->opsi as $o)
                            <option value="{{ $o }}">{{ $o }}</option>
                        @endforeach
                    </select>
                @else
                    <input required type="{{ $p->tipe }}" name="{{ $p->id }}" id="{{ $p->id }}">
                @endif
                <br>
            @endforeach

            @if ($form->token)
                <small>Setelah anda submit, anda akan mendapatkan sebuah token yang digunakan untuk berbagai hal</small>
                <br>
                <small>contohnya adalah mengecek hasil form yang sudah anda submit</small> <br>
                <small><strong>pastikan anda mencatat token tersebut</strong></small> <br> <br>
            @endif

            <button type="submit">Submit</button>
        </form>
    </section>
</body>

</html> --}}

@extends('template.bootstrap.temp')

@section('title')
    Form
@endsection

@section('content')
    <div class="container">

        <div class="row my-4">
            <h1>{{$form->judul}}</h1>
        </div>

        {{-- <div class="row">
            <h1><span class="badge badge-success">Terimakasih sudah mengisi, FORM SUDAH DITUTUP</span></h1>
        </div> --}}

        <div class="row my-4">
            <form action="{{ route('responden.store') }}" method="post">

                @csrf
                <input type="hidden" name="formid" value="{{ $form->id }}">

                @foreach ($form->pertanyaan as $p)
                    <div class="form-group">
                        <label for="{{ $p->id }}"> {{ $p->pertanyaan }} </label>
                        @if ($p->tipe == 'select')
                            <select class="form-control" name="{{ $p->id }}" id="{{ $p->id }}">
                                @foreach ($p->opsi as $o)
                                    <option value="{{ $o }}">{{ $o }}</option>
                                @endforeach
                            </select>
                        @else
                            <input class="form-control" required type="{{ $p->tipe }}" name="{{ $p->id }}"
                                id="{{ $p->id }}">
                        @endif
                        <br>
                    </div>
                @endforeach

                @if ($form->token)
                    <p>Setelah anda submit, anda akan mendapatkan sebuah token yang digunakan untuk berbagai hal</p>
                    <p>contohnya adalah mengecek hasil form yang sudah anda submit</p> 
                    <p><strong>pastikan anda mencatat token tersebut</strong></p>  
                @endif

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>
@endsection
