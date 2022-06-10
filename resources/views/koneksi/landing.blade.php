@extends('template.koneksi.template')

@section('title', 'Selamat Datang di Website HIMSI UNAIR!')
@section('seo-desc', ''){{-- ini buat deskripsi seo --}}
@section('seo-img', '') {{-- ini buat gambar seo --}}

@section('bodyclass', '') {{-- kalo butuh class buat body --}}
@section('container', 'landing')

@section('content')
    <div class="landing--top">
        <div class="landing--top__left">
            <h1 class="landing--top__title">Himpunan Mahasiswa S1 Sistem Informasi Universitas Airlangga</h1>
            <p class="landing--top__desc">Wadah aspirasi atau fasilitator mahasiswa S1 sistem informasi Universitas Airlangga
                untuk berkontribusi dan mengembangkan keilmuan dan keprofesian.</p>
            <a href="{{ route('about-us') }}" class="button btn-primary landing--top__btn">Selengkapnya →</a>
        </div>
        <img src="{{ url('assets/img/bendera-himsi.png') }}" class="landing--top__right" alt="HIMSI UNAIR">
    </div>

    <div class="landing--visi-misi">
        <div class="landing--visi-misi__visi">
            <h2 class="landing--visi-misi__visi-title">HIMSI Sebagai <span>Sarana</span><br> Warga S1 Sistem Informasi</h2>
            <p class="landing--visi-misi__visi-desc">Mewujudkan HIMSI sebagai tempat yang tepat, aman dan nyaman untuk
                berkomunikasi, menampung seluruh aspirasi dan mengembangkan diri bersama bagi seluruh warga S1 Sistem
                Informasi Universitas Airlangga</p>
        </div>
        <div class="landing--visi-misi__misi">
            <div class="landing--visi-misi__misi-card">
                <img src="{{ url('assets/img/misi1.svg') }}" alt="" class="landing--visi-misi__misi-img">
                <p class="landing--visi-misi__misi-desc">Menciptakan suasana aman, nyaman dan kekeluargaan</p>
            </div>
            <div class="landing--visi-misi__misi-card">
                <img src="{{ url('assets/img/misi2.svg') }}" alt="" class="landing--visi-misi__misi-img">
                <p class="landing--visi-misi__misi-desc">Menampung seluruh aspirasi warga S1 Sistem Informasi Unair</p>
            </div>
            <div class="landing--visi-misi__misi-card">
                <img src="{{ url('assets/img/misi3.svg') }}" alt="" class="landing--visi-misi__misi-img">
                <p class="landing--visi-misi__misi-desc">Memaksimalkan seluruh kegiatan HIMSI UNAIR</p>
            </div>
        </div>
    </div>

    <div class="landing--layanan" id="fitur">
        <div class="landing--layanan__header">
            <h2 class="landing--layanan__title"><span>Layanan</span> yang Tersedia</h2>
            <p class="landing--layanan__desc">Kami menyediakan layanan yang dapat diakses dimana saja dan kapan saja oleh
                pengguna.</p>
        </div>
        <div class="landing--layanan__card landing--layanan__card--curhat">
            <img src="{{ url('assets/img/layanan-curhat.svg') }}" alt="" class="landing--layanan__img">
            <h3 class="landing--layanan__card-title">Curhat</h3>
            <p class="landing--layanan__card-desc">Mendengarkan dan memberikan jalan keluar dari curahan hari warga.</p>
        </div>
        <div class="landing--layanan__card landing--layanan__card--form">
            <img src="{{ url('assets/img/layanan-form.svg') }}" alt="" class="landing--layanan__img">
            <h3 class="landing--layanan__card-title">Form</h3>
            <p class="landing--layanan__card-desc">Membantu pembuatan form dari pendaftaran sampai survei.</p>
        </div>
        <div class="landing--layanan__card landing--layanan__card--bank-akademik">
            <img src="{{ url('assets/img/layanan-bank-akademik.svg') }}" alt="" class="landing--layanan__img">
            <h3 class="landing--layanan__card-title">Bank Akademik</h3>
            <p class="landing--layanan__card-desc">Menyediakan referensi perkuliahan yang berasal dari warga SI Unair.</p>
        </div>
        <div class="landing--layanan__card landing--layanan__card--kritik-saran">
            <img src="{{ url('assets/img/layanan-kritik-saran.svg') }}" alt="" class="landing--layanan__img">
            <h3 class="landing--layanan__card-title">Kritik Saran</h3>
            <p class="landing--layanan__card-desc">Menampung aspirasi kinerja dengan memberikan kritik saran.</p>
        </div>
    </div>
@endsection

@section('extrajs')
    {{-- <script src="{{ url('assets/js/landing.js') }}"></script> --}}
@endsection
