@extends('template.cakrawala.client.template')

@section('title')
    Form
@endsection

@section('extracss')
    <link rel="stylesheet" href="{{ url('assets/css/form-client.css') }}">
@endsection

@section('content')
    <section class="mengisi">
        <h3>Mengisi Form</h3>
        <div class="form-group">
            <label for="inputShortLink">himsiunair.com/f/</label>
            <input type="text" data-link="{{route('form.bitly','')}}" class="form-control" id="inputShortLink" placeholder="pendaftaranPanitia">
            <button type="submit" class="btn btn-primary" id="btnShortLink">isi FORM<img
                    src="{{ url('assets/img/send.svg') }}" alt=""></button>
        </div>
    </section>

    <hr class="divider">

    <section class="membuat">
        <div class="info">
            <img src="{{ url('assets/img/Blob.svg') }}" alt="">
            <span class="h3">Cara Membuat Form</span>
            <div class="desc">
                <span class="p">1 Masukkan email anda pada kolom <strong>‘buat form’</strong></span>
                <span class="p">2 Sistem akan mengirimi anda sebuah email berisi token hak akses form</span>
                <span class="p">3 Masukkan token tersebut ke dalam kolom <strong>‘edit form’</strong></span>
                <span class="p">4 Anda akan menuju halaman edit form, dan disana anda dapat mengubah-ubah rincian
                    form seperti
                    yang
                    anda inginkan</span>
            </div>
        </div>
        <div class="field">
            <div class="form-group">
                <h3>Membuat Form</h3>
                <label for="inputEmail">Email</label>
                <form action="{{ route('f.form.email') }}" class="form-field" method="POST">
                    @csrf
                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="example@example.com"
                        required>
                    <button type="submit" class="btn btn-primary">buat FORM<img src="{{ url('assets/img/send.svg') }}"
                            alt=""></button>
                </form>

            </div>


            <div class="form-group">
                <h3>Edit Form</h3>
                <label for="inputFormToken">Token</label>
                <div class="form-field">
                    <input type="text" class="form-control" id="inputFormToken" placeholder="contoh : 112qwue787s"
                        data-link="{{ route('f.form.show', '') }}">
                    <button type="submit" class="btn btn-primary" id="btnFormToken">edit FORM<img
                            src="{{ url('assets/img/send.svg') }}" alt=""></button>
                </div>
            </div>
        </div>
    </section>

    <hr class="divider">

    <section class="preview">
        <h3>Preview Edit Form</h3>
        <img src="{{ url('assets/img/preview-form.png') }}" alt="">
    </section>
@endsection

@section('modal')

@endsection

@section('extrajs')
    <script>
        document.querySelector('#nav-new-feature').classList.add('selected');
        document.querySelector('#btnShortLink').addEventListener('click', () => {
            window.open(document.querySelector('#inputShortLink').dataset.link + '/' + document.querySelector('#inputShortLink').value);
        })

        document.querySelector('#btnFormToken').addEventListener('click', () => {
            var input = document.querySelector('#inputFormToken');
            location.replace(input.dataset.link + '/' + String(input.value));
        })

    </script>
@endsection
