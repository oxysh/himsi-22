@extends('template.cakrawala.client.template')

@section('title')
    {{$article->title}}
@endsection

@section('content')
    <a href="{{route('article.index')}}">Home</a>
    <h1>{{$article->title}}</h1>
    <span>Author : {{$article->author}}</span>
    <span>Tanggal : {{date('l, d F - H:i', strtotime($article->schedule))}}</span>
    <span>Konten</span>
    <span>{{$article->content}}</span>
@endsection