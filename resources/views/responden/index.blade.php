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
                judul : <strong> {{$f->judul}} </strong> <br>
                <a href="{{route('responden.show', $f->id)}}">Isi FORM ini</a>
            </div>
        @endforeach
    </section>
</body>
</html>