
@extends('template.bootstrap.temp')

@section('title')
    List Form
@endsection

@section('content')
    <div class="container my-4">
        <div class="row">
            <h1>List Form</h1>
        </div>

        <div class="row justify-content-center">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Pemilik</th>
                        <th scope="col">Deadline</th>
                        <th scope="col">Jumlah Pertanyaan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($form as $f)
                        <tr>
                            <th scope="row"> {{ $loop->iteration }} </th>
                            <td>{{ $f->judul }}</td>
                            <td>{{ $f->pemilik }}</td>
                            <td>{{ $f->deadline }}</td>
                            <td>{{ sizeof($f->pertanyaan) }}</td>
                            <td>
                                @if (Auth::user()->role == $f->pemilik || $f->pemilik == "HIMSI")
                                    <a href="{{ route('form.show', $f->id) }}">
                                        <button class="btn btn-success">Detail</button>
                                    </a>
                                @else
                                    <span class="badge badge-danger">
                                        anda tidak punya akses
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            {{ $form->links() }}
        </div>
    </div>
@endsection
