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
            <table class="table col-12">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" style="width:100px">Bidang</th>
                        <th scope="col">Kritik / Saran</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus sed nam sint aspernatur.
                            Sint, voluptate veniam! Nostrum consequuntur consectetur ullam!</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus sed nam sint aspernatur.
                            Sint, voluptate veniam! Nostrum consequuntur consectetur ullam!</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus sed nam sint aspernatur.
                            Sint, voluptate veniam! Nostrum consequuntur consectetur ullam!</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
