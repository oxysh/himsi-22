@extends('template.cakrawala.client.template')

@section('title')
    Curhat
@endsection

@section('content')
<form method="POST" action="{{ route('curhat.submit') }}">
    @csrf
    <span class="box-label">
        Kategori
    </span>
    <label for="kategori">Choose a category:</label>
    <select id="kategori" name="kategori">
        <option value="himsi">HIMSI</option>
        <option value="kuliah">Kuliah</option>
        <option value="ayang">Ayang</option>
        <option value="teman">Teman</option>
        <option value="others">Lain-lain</option>
    </select><br>

    <br><span class="box-label">
        MAU DIBALES GA?
    </span><br>
    <input type="radio" id="mau" name="respon" value="1">
    <label for="mau">Iya Mau</label><br>
    <input type="radio" id="gamau" name="respon" value="0">
    <label for="gamau">Males, ngapain gamau</label><br>
    
    <br><span class="box-label">
        MAU GANTI TOKEN GA?
    </span><br>
    <label for="customToken">Silahkan ganti token kalo mau, klo ga gpp</label>
    <input type="text" id="customToken" name="customToken">
    
    <button type="submit" class="btn-primary" style="margin-top: 10px"><strong>Submit</strong></button>
</form>

{{-- $error kalau ada validation error, bisa ditampilkan (kalau mau) (mungkin $error dipake di js)
kalau ga ditampilkan, akan sekedar refresh page (data ga sent to DB) --}}

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </ul>
    </div>
@endif

@endsection