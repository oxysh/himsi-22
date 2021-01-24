{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Form</title>
</head>

<body>
    <header>
        <h1>Create Form</h1>
    </header>

    <section>
        <form action="{{ route('form.store') }}" method="post">
            @csrf
            <label for="judul">Judul Form</label>
            <input required type="text" name="judul" id="judul">

            <br>
            <label for="pemilik">Pemilik Form</label>
            <select id="pemilik" name="pemilik">
                <option value="himsi">himsi</option>
                <option value="psdm">psdm</option>
                <option value="ristek">ristek</option>
                <option value="akademik">akademik</option>
                <option value="media">media</option>
                <option value="hublu">hublu</option>
                <option value="kestari">kestari</option>
                <option value="sera">sera</option>
            </select>

            <br>
            <label for="deadline">Deadline Form</label>
            <input required type="datetime-local" name="deadline" id="deadline">

            <br>
            <button type="submit">Submit</button>
        </form>
    </section>
</body>

</html> --}}

@extends('template.bootstrap.temp')

@section('title')
    Admin - Create Form
@endsection

@section('content')

    <div class="container">

        <div class="row my-4">
            <h1>Create Form</h1>
        </div>

        <div class="row my-4">
            <form action="{{ route('form.store') }}" method="post">

                @csrf
                <div class="form-group">
                    <label for="judul">Judul Form</label>
                    <input name="judul" type="text" class="form-control" id="judul" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                </div>

                <div class="form-group">
                    <label for="pemilik">Pemilik Form</label>
                    <select name="pemilik" class="form-control" id="pemilik">
                        <option value="himsi">himsi</option>
                        <option value="psdm">psdm</option>
                        <option value="ristek">ristek</option>
                        <option value="akademik">akademik</option>
                        <option value="media">media</option>
                        <option value="hublu">hublu</option>
                        <option value="kestari">kestari</option>
                        <option value="sera">sera</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="deadline">Deadline Form</label>
                    <input type="datetime-local" class="form-control" name="deadline" id="deadline">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>
@endsection
