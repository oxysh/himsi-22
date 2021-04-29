@extends('template.cakrawala.admin.template')

@section('content')
    @if (Auth::User())
        <h2>Mau ngapain hari ini ?</h2>
    @else
        <h2>Login dulu bous</h2>
    @endif
@endsection
