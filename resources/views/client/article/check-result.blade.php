@extends('template.cakrawala.client.template')

@section('title')
    Artikel dengan NIM "{{$NIM}}"
@endsection

@section('content')
    <a href="{{route('article.check')}}">Kembali</a>
    <h1>Ditemukan {{$articles->count()}} artikel</h1>
    @foreach ($articles as $article)
        <hr>
        <h2>{{$article->title}}</h2>
        <span>Author : {{$article->author}}</span>
        <span>NIM :{{$article->NIM}}</span>
        <span>Dikirim :{{date('l, d F - H:i', strtotime($article->created_at))}}</span>
        <span>Konten</span>
        <span>{{$article->content}}</span>
        <span>Status : 
            @if ($article->status == 'submitted')
                <span class="badge bg-secondary text-light">Submit</span>
            @elseif ($article->status == 'decline')
                <span class="badge bg-danger text-light">Ditolak</span>
            @elseif ($article->status == 'publish' and \Carbon\Carbon::parse($article->schedule) <= \Carbon\Carbon::now())
                <span class="badge bg-success text-light">Publish</span>
            @elseif ($article->status == 'publish' and \Carbon\Carbon::parse($article->schedule) > \Carbon\Carbon::now())
                <span class="badge bg-warning">Dijadwalkan</span>
            @endif
        </span>
        @if ($article->status == 'publish')
            <span>Dipublish : {{date('l, d F - H:i', strtotime($article->schedule))}}</span>
        @elseif ($article->status == 'decline')
            <span>Feedback : {{$article->feedback}}</span>
        @endif
    @endforeach
@endsection