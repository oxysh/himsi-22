@extends('template.bootstrap.client')

@section('title')
    Meditasi
@endsection

@section('content')
    <div class="container my-4">
        <div class="row">
            <h1 class="display-4">Meditasi Theme : {{$kategori}}</h1>
        </div>

        <div class="row">
            <a href="https://www.youtube.com/" class="card btn col-6 col-md-4 col-lg-3"
                onMouseOver="this.style.border='2px solid black'" onMouseOut="this.style.border='1px solid rgba(0,0,0,0.3)'">
                <img src="{{ url('assets/image/logo.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Youtube.</p>
                </div>
            </a>
            <a href="https://www.instagram.com/" class="card btn col-6 col-md-4 col-lg-3"
                onMouseOver="this.style.border='2px solid black'" onMouseOut="this.style.border='1px solid rgba(0,0,0,0.3)'">
                <img src="{{ url('assets/image/logo.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Instagram.</p>
                </div>
            </a>
        </div>
    </div>
@endsection
