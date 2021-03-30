
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
                        <option {{ old('pemilik') == Auth::user()->role ? 'selected' : '' }} value="{{Auth::user()->role}}">{{Auth::user()->role}}</option>
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
