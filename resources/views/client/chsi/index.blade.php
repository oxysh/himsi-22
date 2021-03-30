@extends('template.bootstrap.client')

@section('title')
    CHSI
@endsection

@section('content')
    <div class="container">
        <div class="col-12">

            <div class="row mt-4">

                <a class="ml-4" href="{{ route('curhat.index') }}">
                    <button type="button" class="btn btn-primary">Curhat</button>
                </a>
                <a class="ml-4" href="{{ route('kritik.index') }}">
                    <button type="button" class="btn btn-secondary">Kritik Saran</button>
                </a>
                <a class="ml-4" href="{{ route('meditasi.index') }}">
                    <button type="button" class="btn btn-success">Meditasi</button>
                </a>
            </div>

        </div>
    </div>
@endsection
