@extends('template.bootstrap.temp')

@section('title')
    CHSI - Curhat
@endsection

@section('content')
    <div class="container my-4">
        <div class="row">
            <a href="{{ route('chsi.admin.index') }}" class="text-dark">
                <img src="https://img.icons8.com/flat-round/64/000000/back--v1.png" style="width:25px" /> kembali
            </a>
        </div>

        <div class="row my-4">
            <h1 class="display-4">
                LIST CURHATAN
            </h1>
        </div>

        <div class="row">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Token</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>
                            <span class="badge badge-success">Selesai</span>
                        </td>
                        <td> <a href="{{ route('chsi.admin.curhat.chat', 'huff') }}" class="btn btn-primary">Lihat</a> </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>
                            <span class="badge badge-warning">On Progress</span>
                        </td>
                        <td> <a href="{{ route('chsi.admin.curhat.chat', 'huff') }}" class="btn btn-primary">Lihat</a> </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>
                            <span class="badge badge-success">Selesai</span>
                        </td>
                        <td> <a href="{{ route('chsi.admin.curhat.chat', 'huff') }}" class="btn btn-primary">Lihat</a> </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
