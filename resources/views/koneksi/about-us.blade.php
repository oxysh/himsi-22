@extends('template.koneksi.template')

@section('title', 'Koneksi - Tentang HIMSI UNAIR 2022')
@section('seo-desc', ''){{-- ini buat deskripsi seo --}}
@section('seo-img', '') {{-- ini buat gambar seo --}}

@section('bodyclass', '') {{-- kalo butuh class buat body --}}
@section('container', 'about')

@section('content')
    <div class="about--header">
        <img src="{{ url('assets/image/logo-koneksi.png') }}" alt="" class="about--header__ornament">
        <div class="about--header__content">
            <span class="about--header__koneksi midnight-blue">KONEKSI</span>
            <h4 class="about--header__spelling grey">/KO • NEK • SI/</h4>
            <h3 class="about--header__relation red">Relation</h3>
        </div>
    </div>

    <div class="about--tentang">
        <h1 class="about--tentang__title">Tentang HIMSI</h1>
        <h4 class="grey">Himpunan Mahasiswa S-1 Sistem Informasi Universitas Airlangga (HIMSI) merupakan <span
                class="red">wadah aspirasi atau fasilitator</span> mahasiswa S1 sistem informasi Universitas
            Airlangga untuk <span class="midnight-blue">berkontribusi dan mengembangkan keilmuan dan keprofesian.</span>
        </h4>
        <h4 class="grey">HIMSI UNAIR berdiri sejak <span class="midnight-blue">26 November 2015</span>, dan pada
            tahun ketujuh ini menggunakan nama kabinet <span class="red">Koneksi</span>. Sebuah <span
                class="midnight-blue">koneksi atau hubungan dapat tercipta</span> dengan siapa saja, di mana saja, dan
            kapan saja, entah itu baik atau buruk. Berbagai koneksi yang terjalin di antara individu yang berbeda, dengan
            banyak jenis karakteristik dan sifat tetapi <span class="red">tetap terhubung sebagai satu</span>.
            Berbagai koneksi yang terjalin antara individu dengan <span class="midnight-blue">pemikiran yang
                berbeda</span>, tetapi untuk <span class="midnight-blue">mencapai hal yang sama</span>. Berbagai koneksi
            yang terjalin antara individu yang <span class="red">berbagi rasa saling percaya</span>. Setiap orang
            terikat satu sama lain dalam satu koneksi yang menakjubkan, <span class="midnight-blue">HIMSI.</span></h4>
    </div>

    <div class="about--bidang">
        <div class="about--bidang__top">
            <h1 class="about--bidang__title midnight-blue">Pemetaan Bidang HIMSI</h1>
            <p class="grey">HIMSI memliki 8 bidang yang berbeda dengan pekerjaan, agenda serta prokernya
                masing-masing dalam </p>
        </div>
        <div class="about--bidang__cards">
            <div class="about--bidang__card">
                <img src="{{ url('assets/img/bidang-bph.png') }}" alt="BPH" class="about--bidang__card-img">
                <h3 class="midnight-blue">Badan Pengurus Harian</h3>
                <p class="grey">Pusat koordinasi bidang yang ada di HIMSI, serta memastikan proker dan agenda
                    yang direncanakan berjalan dengan sesuai.</p>
            </div>
            <div class="about--bidang__card">
                <img src="{{ url('assets/img/bidang-akademik.png') }}" alt="Akademik" class="about--bidang__card-img">
                <h3 class="midnight-blue">Akademik</h3>
                <p class="grey">Meningkatkan kualitas akademik dan pendampingan dalam pengembangan prestasi
                    mahasiswa S1 SI UNAIR.</p>
            </div>
            <div class="about--bidang__card">
                <img src="{{ url('assets/img/bidang-ristek.png') }}" alt="Ristek" class="about--bidang__card-img">
                <h3 class="midnight-blue">Riset dan Teknologi</h3>
                <p class="grey">Membantu, memfasilitasi dan memotivasi warga S1 SI UNAIR terhadap hal yang
                    berkaitan dengan keprofesian dan teknologi.</p>
            </div>
            <div class="about--bidang__card">
                <img src="{{ url('assets/img/bidang-media.png') }}" alt="Media" class="about--bidang__card-img">
                <h3 class="midnight-blue">Media</h3>
                <p class="grey">Membuat desain grafis, video serta pengelolaan media sosial sebagai sarana
                    informasi warga S1 Sistem Informasi UNAIR dan pihak eksternal.</p>
            </div>
            <div class="about--bidang__card">
                <img src="{{ url('assets/img/bidang-sera.png') }}" alt="Sera" class="about--bidang__card-img">
                <h3 class="midnight-blue">Seni dan Olahraga</h3>
                <p class="grey">Mewadahi dan memfasilitasi minat dan bakat warga S1 SI UNAIR di bidang
                    non-akademik khususnya dalam hal seni dan olahraga.</p>
            </div>
            <div class="about--bidang__card">
                <img src="{{ url('assets/img/bidang-hublu.png') }}" alt="Hublu" class="about--bidang__card-img">
                <h3 class="midnight-blue">Hubungan Luar</h3>
                <p class="grey">Ranah kerja eskternal yang bertanggung jawab sebagai penghubung HIMSI UNAIR dengan
                    external HIMSI UNAIR.</p>
            </div>
            <div class="about--bidang__card">
                <img src="{{ url('assets/img/bidang-kestari.png') }}" alt="Kestari" class="about--bidang__card-img">
                <h3 class="midnight-blue">Kewirausahaan dan Inventaris</h3>
                <p class="grey">Bertanggung jawab atas pemasukan dana kewirausahaan serta mengatur barang dan
                    berkas kesekretariatan HIMSI UNAIR.</p>
            </div>
            <div class="about--bidang__card">
                <img src="{{ url('assets/img/bidang-psdm.png') }}" alt="PSDM" class="about--bidang__card-img">
                <h3 class="midnight-blue">Pengembangan Sumber Daya Mahasiswa</h3>
                <p class="grey">Bertanggung jawab pada dalam hal koordinasi, optimalisasi dan pengawalan sumber
                    daya mahasiswa S1 SI UNAIR.</p>
            </div>
        </div>
    </div>
@endsection

@section('extrajs')
    {{-- <script src="{{ url('assets/js/something.js') }}"></script> --}}
@endsection
