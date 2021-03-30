@extends('template.bootstrap.client')

@section('title')
    Meditasi
@endsection

@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="jumbotron jumbotron-fluid col-12">
                <div class="container">
                    <h1 class="display-4">Selamat BerMeditasi</h1>
                    <p class="lead">Fitur Mediatasi <strong>BARU</strong> dari psdm <br> Lorem ipsum dolor sit amet
                        consectetur, adipisicing elit. Adipisci animi odit voluptatem, officia doloribus tenetur dignissimos
                        dolor repellendus quaerat voluptatum. .</p>
                </div>
            </div>
        </div>

        <div class="row">
            <a href="{{ route('meditasi.kategori', 'Introver') }}" class="card btn col-6 col-md-4 col-lg-3"
                onMouseOver="this.style.border='2px solid black'" onMouseOut="this.style.border='1px solid rgba(0,0,0,0.3)'">
                <img src="{{ url('assets/image/logo.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Introver.</p>
                </div>
            </a>
            <a href="{{ route('meditasi.kategori', 'Extrover') }}" class="card btn col-6 col-md-4 col-lg-3"
                onMouseOver="this.style.border='2px solid black'" onMouseOut="this.style.border='1px solid rgba(0,0,0,0.3)'">
                <img src="{{ url('assets/image/logo.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Extrover.</p>
                </div>
            </a>
            <a href="{{ route('meditasi.kategori', 'Alone') }}" class="card btn col-6 col-md-4 col-lg-3"
                onMouseOver="this.style.border='2px solid black'" onMouseOut="this.style.border='1px solid rgba(0,0,0,0.3)'">
                <img src="{{ url('assets/image/logo.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Alone.</p>
                </div>
            </a>
            <a href="{{ route('meditasi.kategori', 'Depression') }}" class="card btn col-6 col-md-4 col-lg-3"
                onMouseOver="this.style.border='2px solid black'" onMouseOut="this.style.border='1px solid rgba(0,0,0,0.3)'">
                <img src="{{ url('assets/image/logo.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Depression.</p>
                </div>
            </a>
        </div>
    </div>
@endsection
