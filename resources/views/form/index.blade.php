<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body style="padding-left: 50px">

    <header>
        <h1>List Form</h1>
    </header>
    <section>

        @foreach ($form as $f)
        <div style="margin-bottom: 20px">
            judul : {{ $f->judul }} <br>
            pemilik : {{ $f->pemilik }} <br>
            deadline : {{ $f->deadline }} <br>
            Jumlah Pertanyaan : {{ sizeof($f->pertanyaan) }} <br>
            <a href="{{route('form.show', $f->id)}}">Lihat Detil</a>
        </div>
        @endforeach
    </section>
    <section>
        <a href="{{route('form.create')}}">Tambah Form</a>
    </section>
</body>

</html>
