@extends('template.cakrawala.client.template')

@section('title')
    Submit Artikel
@endsection

@section('content')
    <h1>Submit Artikel</h1>
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @if ($errors->has('title', 'NIM', 'content'))
                <span>Silahkan isi data-data yg diperlukan!</span>
            @elseif ($errors->has('title', 'NIM'))
                <span>Isi Judul dan NIM</span>
            @elseif ($errors->has('title', 'content'))
                <span>Isi Judul dan Konten</span>
            @elseif ($errors->has('NIM', 'content'))
                <span>Isi Konten dan NIM</span>
            @elseif ($errors->has('NIM'))
                <span>Isi NIM</span>
            @elseif ($errors->has('content'))
                <span>Isi Konten</span>
            @elseif ($errors->has('title'))
                <span>Isi Judul</span>
            @else
                <span>Silahkan isi data-data yg diperlukan!</span>
            @endif
        </div>
    @endif
    <form action="{{route('article.submitted')}}" method="post">
        @csrf
        <input type="text" name="author" id="author" placeholder="author" value="{{old('author')}}">
        <br><input type="text" name="NIM" id="NIM" placeholder="NIM" value="{{old('NIM')}}">
        <br><input type="text" name="title" id="title" placeholder="title" value="{{old('title')}}">
        <br><textarea name="content" id="content" cols="30" rows="10" placeholder="content">{{old('content')}}</textarea>
        <br><button type="submit">Kirim</button>
    </form>
@endsection