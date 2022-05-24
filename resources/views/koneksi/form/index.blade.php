@extends('template.koneksi.template')

@section('title', 'Form - Selamat Datang di Form HIMSI')
@section('seo-desc',
    'Form HIMSI merupakan salah satu fitur website HIMSI UNAIR, dimana seluruh pengguna dapat membuat
    dan mengisi form.',){{-- ini buat deskripsi seo --}}
@section('seo-img', '') {{-- ini buat gambar seo --}}

@section('bodyclass', '') {{-- kalo butuh class buat body --}}
@section('container', 'form-landing')

@section('content')
    <div class="form-landing__title-section">
        <h1 class="midnight-blue">Form HIMSI 2022</h1>
        <p>Tulis shortlink form yang ingin diisi pada field yang tersedia.</p>
    </div>

    <div class="form-landing__content">
        <div class="form-landing__form">
            <div class="form__group form__group--oneline">
                <label for="inputShortLink" class="form__label">himsiunair.com/f/</label>
                <input type="text" name="inputShortLink" id="inputShortLink" class="form__control"
                    placeholder="pendaftaran-staff" data-link="{{ route('form.bitly', '') }}">
            </div>
            <button type="submit" class="btn btn-primary" id="btnShortLink">Masuk</button>
        </div>
        <div class="form-landing__linked">
            <h5 class="form-landing__linked-desc">Belum memiliki form?</h5>
            <button class="a form-landing__linked-btn" id="buatForm">Buat Form</button>
        </div>
    </div>

    <div class="form-landing__dialog dialog" id="mengisiEmail">
        <div class="form-landing__dialog-step">
            <div class="form-landing__step form-landing__step--active">
                <p class="form-landing__step-number">1</p>
                <h6 class="form-landing__step-desc">Mengisi Email</h6>
            </div>
            <hr class="form-landing__step-connector">
            <div class="form-landing__step">
                <p class="form-landing__step-number">2</p>
                <h6 class="form-landing__step-desc">Memasukkan Token</h6>
            </div>
        </div>

        <form action="{{ route('f.form.email') }}" method="POST" class="form-landing__dialog-form">
            @csrf
            <div class="form__group">
                <label for="inputEmail" class="form__label">Email</label>
                <input type="email" name="email" id="inputEmail" class="form__control" placeholder="example@mail.com"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Buat Form</button>
        </form>

        <div class="form-landing__linked">
            <h5 class="form-landing__linked-desc">Sudah memiliki form?</h5>
            <button class="a form-landing__linked-btn" id="editForm">Edit Form</button>
        </div>
    </div>

    <div class="form-landing__dialog dialog @if ($message = Session::get('input_token')) active @endif" id="masukkanToken">
        <div class="form-landing__dialog-step">
            <div class="form-landing__step">
                <p class="form-landing__step-number">1</p>
                <h6 class="form-landing__step-desc">Mengisi Email</h6>
            </div>
            <hr class="form-landing__step-connector">
            <div class="form-landing__step form-landing__step--active">
                <p class="form-landing__step-number">2</p>
                <h6 class="form-landing__step-desc">Memasukkan Token</h6>
            </div>
        </div>

        <div class="form-landing__dialog-form">
            <div class="form__group">
                <div class="form__head">
                    <label for="inputFormToken" class="form__label">Token</label>
                    <h6 class="form__helper">Cek email anda untuk mendapatkan token</h6>
                </div>
                <input type="text" name="inputFormToken" id="inputFormToken" class="form__control" placeholder="kWnjd9sGd"
                    data-link="{{ route('f.form.show', '') }}" required>
            </div>
            <button type="submit" class="btn btn-primary" id="btnFormToken">Buka Form</button>
        </div>

        <div class="form-landing__linked">
            <h5 class="form-landing__linked-desc">Belum memiliki form?</h5>
            <button class="a form-landing__linked-btn" id="buatForm">Buat Form</button>
        </div>
    </div>
@endsection

@section('extrajs')
    <script src="{{ url('assets/js/koneksi/form.js') }}"></script>
@endsection
