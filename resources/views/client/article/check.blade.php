@extends('template.cakrawala.client.template')

@section('title')
    Cek Artikelmu
@endsection

@section('content')
    <a href="{{route('article.index')}}">Home</a>
    <form action="" method="post">
        @csrf
        <input type="text" name="NIM" id="NIM" placeholder="NIM">
        <button type="submit">Cek</button>
    </form>
@endsection