@extends('template.koneksi.template-admin')

@section('title', 'Selamat Datang di Website Koneksi HIMSI UNAIR!')
@section('seo-desc', ''){{-- ini buat deskripsi seo --}}
@section('seo-img', '') {{-- ini buat gambar seo --}}

@section('bodyclass', '') {{-- kalo butuh class buat body --}}
@section('container', 'adm-login')

@section('content')
    <img src="{{ url('assets/image/logo-koneksi.png') }}" alt="" class="adm-login__ornament">
    <div class="adm-login__card">
        <div class="adm-login__title-section">
            <h1 class="midnight-blue">Login</h1>
            <p>Selamat datang pada halaman Admin HIMSI Koneksi. Masukkan data pengguna yang sesuai pada field dibawah ini.
            </p>
        </div>

        <form action="{{ route('auth.login') }}" method="POST" class="adm-login__form">
            @csrf
            <div class="form__group">
                <div class="form__head">
                    <label for="username" class="form__label">Username</label>
                    <h6 class="form__helper red-important" id="username-error">Harus diisi</h6>
                </div>
                <input type="text" name="email" id="username" class="form__control form__harus-diisi"
                    value="{{ old('email') ? old('email') : '' }}" placeholder="Masukkan username"
                    data-error="#username-error">
            </div>
            <div class="form__group">
                <div class="form__head">
                    <label for="password" class="form__label">Password</label>
                    <h6 class="form__helper red-important" id="password-error">Harus diisi</h6>
                    @if (Session::has('error-password'))
                        <h6 class="form__helper red-important" id="password-error">{{ Session::get('error-password') }}
                        </h6>
                    @endif
                </div>
                <input type="password" name="password" id="password" class="form__control form__harus-diisi"
                    value="{{ old('password') ? old('password') : '' }}" placeholder="Masukkan password"
                    data-error="#password-error">
            </div>
            <button type="submit" class="btn-primary">Masuk</button>
        </form>
    </div>
@endsection

@section('extrajs')
    {{-- <script src="{{ url('assets/js/landing.js') }}"></script> --}}
    <script>
        // Cek input yang 'harus diisi'
        $('.form__harus-diisi').each(x => {
            if ($('.form__harus-diisi')[x].value == '') {
                $($('.form__harus-diisi')[x].dataset.error)[0].classList.remove('hidden')
                $($('.form__harus-diisi')[x].dataset.error)[0].classList.add('red-important');
            } else {
                $($('.form__harus-diisi')[x].dataset.error)[0].classList.add('hidden')
                $($('.form__harus-diisi')[x].dataset.error)[0].classList.remove('red-important');
            }
        });

        $('.form__harus-diisi').on('input', e => {
            if (e.target.value == '') {
                $(e.target.dataset.error)[0].classList.remove('hidden')
                $(e.target.dataset.error)[0].classList.add('red-important');
            } else {
                $(e.target.dataset.error)[0].classList.add('hidden')
                $(e.target.dataset.error)[0].classList.remove('red-important');
            }
        });

        $('button[type="submit"]').click(e => {
            e.preventDefault();
            if (validation(document.querySelector('form'))) {
                document.querySelector('form').submit();
            }
        });

        // document.querySelector('button').addEventListener('click', (e) => {
        //     e.preventDefault();
        //     if (validation(document.querySelector('form'))) {
        //         document.querySelector('form').submit();
        //     }
        // })
    </script>
@endsection
