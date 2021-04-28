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
                Kritik dan Saran
            </h1>
        </div>

        <div class="row">
            @if (count($krisar) < 1)
                <div class="alert alert-danger" role="alert">
                    Data tidak ditemukan
                </div>
            @else
                <table class="table col-12">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Bidang</th>
                            <th scope="col">Kritik / Saran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($krisar as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->bidang }}</td>
                                <td>{{ $item->krisar }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
