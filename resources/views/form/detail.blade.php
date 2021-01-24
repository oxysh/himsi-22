{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail</title>
</head>

<body style="padding-left: 50px">
    <header>
        <h1>Detail Form</h1>
    </header>

    <section>
        <h3>Identitas Form</h3>
        <div style="margin-bottom: 10px">
            judul : {{ $form->judul }} <br>
            pemilik : {{ $form->pemilik }} <br>
            deadline : {{ $form->deadline }} <br>
        </div>
    </section>

    <section>
        <h3>Pertanyaan</h3>
        @if (sizeof($pertanyaan) == 0)
            Anda masih belum memiliki pertanyaan
        @endif
        @foreach ($pertanyaan as $p)
            <div style="margin-bottom: 10px">

                Tipe : {{ $p->tipe }} <br>
                Pertanyaan : {{ $p->pertanyaan }} <br>
                Opsi : {{ $p->opsi }} <br>
                <a href="{{ route('pertanyaan.destroy', $p->id) }}">Hapus Pertanyaan</a>
            </div>
        @endforeach
    </section>

    <section>
        <h3>Tambahkan Pertanyaan</h3>
        <form action="{{ route('pertanyaan.store') }}" method="post">
            @csrf
            <input type="hidden" name="formid" value="{{ $form->id }}">
            <label for="tipe">Tipe Pertanyaan</label>
            <select name="tipe" id="tipe">
                <option value="text">text</option>
                <option value="select">opsi</option>
                <option value="date">tanggal</option>
                <option value="datetime-local">tanggal dan waktu</option>
                <option value="time">waktu</option>
                <option value="number">angka</option>
            </select>

            <br>
            <label for="pertanyaan">Pertanyaan</label>
            <input required type="text" name="pertanyaan" id="pertanyaan">

            <br>
            <p>
                jika memilih tipe pertanyaan <strong>opsi</strong>
                <br> maka tulis opsi dari pertanyaan pada kolom ini
                <br> opsi pisahkan dengan tanda koma (,)
                <br> tidak perlu menggunakan spasi setelah tanda koma
                <br>
                <textarea name="opsi" id="opsi" cols="30" rows="10"></textarea>
            </p>
            <button type="submit">Submit</button>
        </form>
    </section>
</body>

</html> --}}

@extends('template.bootstrap.temp')

@section('title')
    Detail Form
@endsection

@section('content')
    <div class="container my-5">
        <div class="row">
            <h1>Detail Form</h1>
        </div>

        @if (Session::has('success'))
        <div class="row">
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
              </div>
        </div>
        @endif

        <div class="row my-4">
            <div class="col">
                <div class="card card-body">
                    <p>
                        <strong>Judul</strong> : {{ $form->judul }} <br>
                        <strong>Pemilik</strong> : {{ $form->pemilik }} <br>
                        <strong>Deadline</strong> : {{ $form->deadline }}
                    </p>
                </div>
            </div>
        </div>

        <div class="row my-4">
            <div class="col">
                <div class="row">
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#infoPertanyaan"
                        aria-expanded="false" aria-controls="infoPertanyaan">List Pertanyaan</button>
                    <button type="button" class="btn btn-success ml-3" data-toggle="modal" data-target="#staticBackdrop">
                        Buat Pertanyaan Baru
                    </button>
                </div>
                <div class="collapse multi-collapse" id="infoPertanyaan">
                    @foreach ($form->pertanyaan as $p)
                        <div class="card card-body my-3">
                            <p>
                                <strong>Tipe</strong> : {{ $p->tipe }} <br>
                                <strong>Pertanyaan</strong> : {{ $p->pertanyaan }} <br>
                                @if ($p->opsi != null)
                                    <strong>Opsi</strong> : {{ $p->opsi }} <br>
                                @endif
                                <a href="{{ route('pertanyaan.destroy', $p->id) }}">Hapus Pertanyaan</a>
                            </p>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Pertanyaan Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('pertanyaan.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="formid" value="{{ $form->id }}">

                            <div class="form-group">
                                <label for="formTipe">Tipe Data Pertanyaan</label>
                                <select name="tipe" class="form-control" id="formTipe">
                                    <option value="text">text</option>
                                    <option value="select">opsi</option>
                                    <option value="date">tanggal</option>
                                    <option value="datetime-local">tanggal dan waktu</option>
                                    <option value="time">waktu</option>
                                    <option value="number">angka</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="formPertanyaan">Pertanyaan-nya</label>
                                <input name="pertanyaan" type="text" class="form-control" id="formPertanyaan">
                            </div>
                            <div class="form-group">
                                <label for="opsiTextArea">Opsi</label>

                                <textarea name="opsi" class="form-control" id="opsiTextArea" rows="3"
                                    aria-describedby="opsiHelp"></textarea>
                                <small id="opsiHelp" class="form-text text-muted">jika memilih tipe pertanyaan
                                    <strong>opsi</strong>
                                    <br> maka tulis opsi dari pertanyaan pada kolom ini
                                    <br> opsi pisahkan dengan tanda koma (,)
                                    <br> tidak perlu menggunakan spasi setelah tanda koma</small>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-4">
            <div class="col">
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#infoJawaban"
                    aria-expanded="false" aria-controls="infoJawaban">List Jawaban</button>
                <div class="collapse multi-collapse" id="infoJawaban">
                    @foreach ($form->penjawab as $penjawab)
                    <div class="card card-body my-3">
                        <p>
                            @foreach ($penjawab->jawaban as $jawaban)
                                <strong>{{$jawaban->pertanyaan->pertanyaan}}</strong> : {{$jawaban->jawaban}} <br>
                            @endforeach
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
