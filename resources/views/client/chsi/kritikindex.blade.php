@extends('template.bootstrap.client')

@section('title')
    Kritik Saran HIMSI
@endsection

@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="jumbotron col-12">
                <div class="container">
                    <h1 class="display-4">Kritik dan Saran HIMSI</h1>
                    <p class="lead">deskripsi disini. Lorem ipsum dolor sit amet consectetur adipisicing elit. Non totam
                        laborum error voluptas nihil corporis omnis obcaecati iste deleniti animi?
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <a href="{{ route('kritik.form', 'psdm') }}" class="card btn col-6 col-md-4 col-lg-3"
                onMouseOver="this.style.border='2px solid black'" onMouseOut="this.style.border='1px solid rgba(0,0,0,0.3)'">
                <img src="{{ url('assets/image/logo.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">PSDM.</p>
                </div>
            </a>
            <a href="{{ route('kritik.form', 'ristek') }}" class="card btn col-6 col-md-4 col-lg-3"
                onMouseOver="this.style.border='2px solid black'" onMouseOut="this.style.border='1px solid rgba(0,0,0,0.3)'">
                <img src="{{ url('assets/image/logo.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">ristek.</p>
                </div>
            </a>
            <a href="{{ route('kritik.form', 'sera') }}" class="card btn col-6 col-md-4 col-lg-3"
                onMouseOver="this.style.border='2px solid black'" onMouseOut="this.style.border='1px solid rgba(0,0,0,0.3)'">
                <img src="{{ url('assets/image/logo.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">sera.</p>
                </div>
            </a>
            <a href="{{ route('kritik.form', 'media') }}" class="card btn col-6 col-md-4 col-lg-3"
                onMouseOver="this.style.border='2px solid black'" onMouseOut="this.style.border='1px solid rgba(0,0,0,0.3)'">
                <img src="{{ url('assets/image/logo.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">media.</p>
                </div>
            </a>
        </div>
    </div>
@endsection
