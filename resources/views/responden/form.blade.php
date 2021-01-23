<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Isi Form</title>
</head>
<body>
    <header>
        <h1> {{$form->judul}} </h1>
    </header>

    <section>

        <form action="{{route('responden.store')}}" method="post">

            @csrf
            <input type="hidden" name="formid" value="{{$form->id}}">
            @foreach ($form->pertanyaan as $p)
                <label for="{{$p->id}}"> {{$p->pertanyaan}} </label>
                @if ($p->tipe == 'select')
                <select name="{{$p->id}}" id="{{$p->id}}">
                    @foreach ($p->opsi as $o)
                        <option value="{{$o}}">{{$o}}</option>
                    @endforeach
                </select>   
                @else
                <input type="{{$p->tipe}}" name="{{$p->id}}" id="{{$p->id}}">                 
                @endif
                <br>
            @endforeach

            <button type="submit">Submit</button>
        </form>
    </section>
</body>
</html>