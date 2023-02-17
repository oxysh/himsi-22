@extends('template.koneksi.template')

@section('title', 'Selamat Datang - HIMSI 2022')

@section('container', 'oprec landing')

@section('content')
    <div class="head">
        <div class="head__content">
            <div class="head__img">
                <img class="head__x" src="{{ url('assets/image/oprec-22/logo-3d.png') }}" alt="" srcset="">
                <div class="head__slide"></div>
            </div>
            <div class="head__text">
                <h1>HIMSI 2022</h1>
                <p>Selamat datang di website resmi Himsi Universitas Airlangga! Jelajahi dan nikmati sekumpulan layanan yang
                    tersedia!</p>
            </div>
        </div>

        {{-- ornament --}}
        <img src="{{ url('assets/image/oprec-22/head-lefttop.svg') }}" class="orn orn--head-lefttop">
        <img src="{{ url('assets/image/oprec-22/head-righttop.svg') }}" class="orn orn--head-righttop">
        <img src="{{ url('assets/image/oprec-22/head-leftbottom.svg') }}" class="orn orn--head-leftbottom">
        <img src="{{ url('assets/image/oprec-22/sm-head-top.svg') }}" class="orn-sm orn-sm--head-top">
        <img src="{{ url('assets/image/oprec-22/sm-head-bottom.svg') }}" class="orn-sm orn-sm--head-bottom">
    </div>

    <div class="layanan">
        <div class="layanan__title">
            <h3>LAYANAN YANG TERSEDIA</h3>
            <p class="center">Layanan yang kami sediakan dapat diakses dimana saja dan kapan saja.</p>
        </div>
        <div class="layanan__overflow">
            <div class="layanan__all">
                <div onclick="location.href = '{{ route('kritik.index') }}'" class="layanan__card">
                    <h4>Kritik Saran</h4>
                    <p>Menampung aspirasi kalian terhadap kinerja Himsi tahun ini dengan memberikan kritik saran bidang
                        tertentu maupun Himsi secara keseluruhan.</p>
                </div>
                <div onclick="location.href = '{{ route('akademik') }}'" class="layanan__card">
                    <h4>Bank Akademik</h4>
                    <p>Menyediakan referensi seputar perkuliahan yang bersumber dari warga Sistem Informasi Unair.</p>
                </div>
                <div onclick="location.href = '{{ route('f.form.index') }}'" class="layanan__card">
                    <h4>Form</h4>
                    <p>Membantu kalian untuk membuat form dari pendaftaran sampai survey.</p>
                </div>
                <div onclick="location.href = '{{ route('curhat.index') }}'" class="layanan__card">
                    <h4>Curhat</h4>
                    <p>Tempat melipahkan isi hati kalian dengan privasi yang terjaga. Kami selalu ada untuk mendengar dan
                        memberikan jalan keluar.</p>
                </div>
                <div onclick="location.href = '{{ route('meditasi.index') }}'" class="layanan__card">
                    <h4>Meditasi</h4>
                    <p>Memberikan sepaket hiburan berbagi media untuk kalian yang butuh ketenangan sementara.</p>
                </div>
            </div>
            <div class="layanan__scroll left" onclick="$('.layanan__overflow')[0].scrollBy(-300, 0)">
                <img src="{{ url('assets/image/koneksi/arrow-left.svg') }}" alt="">
            </div>
            <div class="layanan__scroll" onclick="$('.layanan__overflow')[0].scrollBy(300, 0)">
                <img src="{{ url('assets/image/koneksi/arrow-right.svg') }}" alt="">
            </div>
        </div>

        <img src="{{ url('assets/image/koneksi/layanan-left.svg') }}" class="orn orn--layanan-left">
        <img src="{{ url('assets/image/koneksi/layanan-right.svg') }}" class="orn orn--layanan-right">
        <img src="{{ url('assets/image/koneksi/sm-layanan.svg') }}" class="orn-sm orn-sm--layanan">
    </div>
@endsection

@section('extrajs')
    <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js') }}"></script>
    <script src="{{ url('assets/js/oprec-22/landing-page.js') }}"></script>
@endsection
