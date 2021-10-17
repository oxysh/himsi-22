@extends('template.cakrawala.client.template')

@section('title')
    Artikel HIMSI
@endsection

@section('content')
    <h1>Halaman Daftar Artikel</h1>    
    <form action="{{route('article.index')}}" method="get">
        <input type="text" name="search" id="search" placeholder="search" value="{{isset($search) ? $search : ''}}">
        <button type="submit">Cari</button>
    </form>
    <a href="{{route('article.submit')}}">Kirim</a> <br>
    <a href="{{route('article.check')}}">Cek</a>
    @isset($search)
        @if (count($articles) > 0)
            <span>Ditemukan {{count($articles)}} artikel dengan kata kunci "{{$search}}"</span>
        @else
            <span>Tidak ditemukan artikel dengan kata kunci "{{$search}}"</span>
        @endif
    @endisset
    <hr>
    @foreach ($articles as $article)
        <div class="article" style="border: 1px solid black; padding: 8px;">
            <h2>{{$article->title}}</h2>
            <span>Author : {{$article->author}}</span>
            <br>
            <span>{{date('l, d F - H:i', strtotime($article->schedule))}}</span>
            <p>{{Str::limit($article->content, 350, '...')}} <a href="{{route('article.detail',$article->id)}}">Baca lebih lanjut</a></p>
        </div>
    @endforeach
    @if (!(isset($search)) and count($articles) <= 0)
        <span>Tidak ada artikel yang ditemukan.</span>    
    @endif
    {{$articles->links()}}
@endsection