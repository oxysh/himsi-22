@extends('template.bootstrap.client')

@section('title')
    CHSI
@endsection

@section('content')

<div class="container">
    <div class="row mt-4">
        <span class="h1">SELESAI</span>
        @if (Session::has('quote'))
        <h2>{{Session::get('quote')}}</h2>
        @endif
    </div>
</div>
@endsection