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
                        <th scope="col">Dibalas</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $curhat)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $curhat->token }}</td>
                            <td>
                                @if ($curhat->selesai)
                                    <span class="badge badge-success">Selesai</span>
                                @else
                                    <span class="badge badge-warning">On Progress</span>
                                @endif
                            </td>
                            <td>
                                @if ($curhat->dibalas)
                                    <span class="badge badge-success">Ingin Balasan</span>
                                @else
                                    <span class="badge badge-warning">Tidak</span>
                                @endif
                            </td>
                            <td> <a href="{{ route('chsi.admin.curhat.chat', $curhat->token) }}" class="btn btn-primary">Lihat</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
