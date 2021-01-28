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
                    <input name="judul" type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                        aria-describedby="judulFeedback" value="{{ old('judul') }}">
                    @error('judul')
                        <div id="judulFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pemilik">Pemilik Form</label>
                    <select name="pemilik" class="form-control" id="pemilik">
                        <option {{ old('pemilik') == "HIMSI" ? 'selected' : '' }} value="HIMSI">HIMSI</option>
                        <option {{ old('pemilik') == "PSDM" ? 'selected' : '' }} value="PSDM">PSDM</option>
                        <option {{ old('pemilik') == "RISTEK" ? 'selected' : '' }} value="RISTEK">RISTEK</option>
                        <option {{ old('pemilik') == "AKADEMIK" ? 'selected' : '' }} value="AKADEMIK">AKADEMIK</option>
                        <option {{ old('pemilik') == "MEDIA" ? 'selected' : '' }} value="MEDIA">MEDIA</option>
                        <option {{ old('pemilik') == "HUBLU" ? 'selected' : '' }} value="HUBLU">HUBLU</option>
                        <option {{ old('pemilik') == "KESTARI" ? 'selected' : '' }} value="KESTARI">KESTARI</option>
                        <option {{ old('pemilik') == "SERA" ? 'selected' : '' }} value="SERA">SERA</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="token">Menggunakan Token untuk identifier Responden ?</label>
                    <select name="token" class="form-control" id="token">
                        <option {{ old('token') == "YA" ? 'selected' : '' }} value="YA">YA</option>
                        <option {{ old('token') == "TIDAK" ? 'selected' : '' }} value="TIDAK">TIDAK</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="deadline">Deadline Form</label>
                    <input type="datetime-local" class="form-control @error('deadline') is-invalid @enderror"
                        name="deadline" id="deadline" aria-describedby="deadlineFeedback" value="{{ old('deadline') }}">
                    @error('deadline')
                        <div id="deadlineFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>
@endsection
