@extends('template.bootstrap.temp')

@section('title')
    EDIT Hasil Responden
@endsection

@section('content')

    <div class="container">

        <div class="row my-5 justify-content-center">
            <div class="col-12 col-md-6">

                <div class="my-4">
                    <h3>Hasil Form {{ $form->judul }} </h3>
                </div>
                <form action="{{ route('form.penjawab.update', [$form->id, $result->id]) }}" method="post">
                    @csrf
                    @foreach ($form->pertanyaan as $p)
                        <div class="form-group">
                            <label for="">{{ $p->pertanyaan }}</label>
                            @if ($p->tipe == 'select')
                                <select class="form-control" name="{{ $p->id }}" id="{{ $p->id }}">
                                    <option value="">-->pilih opsi<--</option>
                                    @foreach ($p->opsi as $o)
                                        <option {{$p->jawaban == $o ? 'selected' : ''}} value="{{ $o }}">{{ $o }}</option>
                                    @endforeach
                                </select>
                            @else
                                <input type="text" class="form-control" name="{{ $p->id }}"
                                    value="{{ $p->jawaban }}">
                            @endif
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-success">Ubah Jawaban</button>
                </form>

            </div>

        </div>
    </div>


@endsection
