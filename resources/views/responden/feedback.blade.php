@extends('template.bootstrap.temp')

@section('title')
    Success
@endsection

@section('content')
    <div class="container mt-4">
        @if (Session::has('success'))
            
        <div class="row">
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        </div>
        @endif
        @if ($token != null)
        <div class="row">
            <h1> {{$token}} </h1>
        </div>
        @endif
    </div>
@endsection
