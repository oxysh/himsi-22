@extends('template.bootstrap.client')

@section('title')
    CURHAT
@endsection

@section('content')
    <div class="container">
        <div class="col-12 mb-4">
            <div class="row mt-4">
                <div class="jumbotron jumbotron-fluid col-12">
                    <div class="container">
                        <h1 class="display-4">Fluid jumbotron</h1>
                        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its
                            parent.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <form class="col-12" method="POST" action="{{route('curhat.find')}}">
                    @csrf
                    <div class="form-group">
                        <label for="tokencurhat">Token Curhat Anda</label>
                        <input name="token" type="text" class="form-control" id="tokencurhat" aria-describedby="textHelp">
                        <small id="textHelp" class="form-text text-muted">untuk melihat respon dari curhatan anda.</small>
                        @if (Session::has('error'))
                        <small id="textHelp" class="form-text text-danger">{{Session::get('error')}}</small>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Cek</button>
                </form>
            </div>
            <div class="row mt-4">

                <div class="card col-6 col-md-4 col-lg-3 col-sm-6">
                    <img src="{{url('assets/image/logo.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                            <a href="{{route('curhat.form')}}" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div >
                
            </div>
        </div>
    </div>
@endsection
