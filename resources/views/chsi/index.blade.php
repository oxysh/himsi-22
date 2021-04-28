@extends('template.bootstrap.temp')

@section('title')
    CHSI
@endsection

@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="jumbotron jumbotron-fluid col-12">
                <div class="container">
                    <h1 class="display-4">Dashboard CHSI</h1>
                    <p class="lead">Mau Ngapain Sih ??? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat
                        animi iste alias, totam atque saepe earum voluptate fugit! Nam, eveniet.</p>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-around">
            <div class="card col-4"
            onMouseOver="this.style.border='2px solid black'" onMouseOut="this.style.border='1px solid rgba(0,0,0,0.3)'">
                <img src="{{url('assets/image/logo.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Curhat</h5>
                    <a href="{{route('chsi.admin.curhat.index')}}" class="btn btn-primary">Lihat List</a>
                </div>
            </div>
            <div class="card col-4"
            onMouseOver="this.style.border='2px solid black'" onMouseOut="this.style.border='1px solid rgba(0,0,0,0.3)'">
                <img src="{{url('assets/image/logo.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Kritik Saran</h5>
                    <a href="{{route('chsi.admin.kritik.index')}}" class="btn btn-primary">Lihat List</a>
                </div>
            </div>
            <div class="card col-4"
            onMouseOver="this.style.border='2px solid black'" onMouseOut="this.style.border='1px solid rgba(0,0,0,0.3)'">
                <img src="{{url('assets/image/logo.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Meditasi</h5>
                    <a href="{{route('chsi.admin.meditasi.index')}}" class="btn btn-primary">Lihat List</a>
                </div>
            </div>
        </div>
    </div>
@endsection
