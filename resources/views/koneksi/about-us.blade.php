@extends('template.koneksi.template')

@section('title', 'Mercusuar - Tentang HIMSI UNAIR 2022')
@section('seo-desc', ''){{-- ini buat deskripsi seo --}}
@section('seo-img', '') {{-- ini buat gambar seo --}}

@section('bodyclass', '') {{-- kalo butuh class buat body --}}
@section('container', 'about')

@section('content')
    <div class="about--header">
        <img src="{{ url('assets\image\logo-mercusuar-notitle.svg') }}" alt="" class="about--header__ornament">
        <div class="about--header__content">
            <span class="about--header__koneksi midnight-blue">MERCUSUAR</span>
            <h4 class="about--header__spelling grey">/MER • CU • SU • AR/</h4>
            <h3 class="about--header__relation purple">Lighthouse</h3>
        </div>
    </div>

    <div class="about--tentang">
        <h1 class="about--tentang__title">Tentang HIMSI</h1>
        <h4 class="grey">Himpunan Mahasiswa S-1 Sistem Informasi Universitas Airlangga (HIMSI) merupakan <span
                class="gold">wadah aspirasi atau fasilitator</span> mahasiswa S1 sistem informasi Universitas
            Airlangga untuk <span class="midnight-blue">berkontribusi dan mengembangkan keilmuan dan keprofesian.</span>
        </h4>
        <h4 class="grey">HIMSI UNAIR berdiri sejak <span class="midnight-blue">26 November 2015</span>, dan pada
            tahun ketujuh ini menggunakan nama kabinet <span class="midnight-blue">Mercusuar</span>. Menara yang dibangun di pantai, pulau kecil
            di tengah laut, daerah berbatu karang, dan  sebagainya, yang memancarkan sinar isyarat pada waktu malam hari untuk
            membantu navigasi. Seperti arti namanya, Kabinet <span class= "midnight-blue">Mercusuar</span> ingin menjadi sebuah menara yang tinggi <span class = "gold">(Dikenal)</span> ,
            dengan fondasi yang kokoh <span class = "gold">(Kekeluargaan)</span>, serta membawa cahaya yang terang <span class = "gold">(Berdampak)</span>.
    </div>

    <div class="about--bidang">
        <div class="about--bidang__top">
            <h1 class="about--bidang__title midnight-blue">Pemetaan Bidang HIMSI</h1>
            <p class="grey">HIMSI memliki 8 bidang yang berbeda dengan pekerjaan, agenda serta prokernya
                masing-masing dalam mencapai tujuan, visi, dan misinya.</p>
        </div>
        <div class="about--bidang__cards">
            <div class="about--bidang__card">
                <img src="{{ url('assets/img/mercusuar/BPH.svg') }}" alt="BPH" class="about--bidang__card-img" width="60px">
                <h3 class="midnight-blue">Badan Pengurus Harian</h3>
                <p class="grey">Pusat koordinasi bidang yang ada di HIMSI, serta memastikan proker dan agenda
                    yang direncanakan berjalan dengan sesuai.</p>
            </div>
            <div class="about--bidang__card">
                <img src="{{ url('assets/img/mercusuar/Akademik.svg') }}" alt="Akademik" class="about--bidang__card-img" width="60px">
                <h3 class="midnight-blue">Akademik</h3>
                <p class="grey">Meningkatkan kualitas akademik dan pendampingan dalam pengembangan prestasi
                    mahasiswa S1 SI UNAIR.</p>
            </div>
            <div class="about--bidang__card">
                <img src="{{ url('assets/img/mercusuar/Ristek.svg') }}" alt="Ristek" class="about--bidang__card-img" width="60px">
                <h3 class="midnight-blue">Riset dan Teknologi</h3>
                <p class="grey">Membantu, memfasilitasi dan memotivasi warga S1 SI UNAIR terhadap hal yang
                    berkaitan dengan keprofesian dan teknologi.</p>
            </div>
            <div class="about--bidang__card">
                <img src="{{ url('assets/img/mercusuar/Media.svg') }}" alt="Media" class="about--bidang__card-img" width="60px">
                <h3 class="midnight-blue">Media</h3>
                <p class="grey">Membuat desain grafis, video serta pengelolaan media sosial sebagai sarana
                    informasi warga S1 Sistem Informasi UNAIR dan pihak eksternal.</p>
            </div>
            <div class="about--bidang__card">
                <img src="{{ url('assets/img/mercusuar/Sera.svg') }}" alt="Sera" class="about--bidang__card-img" width="60px">
                <h3 class="midnight-blue">Seni dan Olahraga</h3>
                <p class="grey">Mewadahi dan memfasilitasi minat dan bakat warga S1 SI UNAIR di bidang
                    non-akademik khususnya dalam hal seni dan olahraga.</p>
            </div>
            <div class="about--bidang__card">
                <img src="{{ url('assets/img/mercusuar/Hublu.svg') }}" alt="Hublu" class="about--bidang__card-img" width="60px">
                <h3 class="midnight-blue">Hubungan Luar</h3>
                <p class="grey">Ranah kerja eskternal yang bertanggung jawab sebagai penghubung HIMSI UNAIR dengan
                    external HIMSI UNAIR.</p>
            </div>
            <div class="about--bidang__card">
                <img src="{{ url('assets/img/mercusuar/Kestari.svg') }}" alt="Kestari" class="about--bidang__card-img" width="60px">
                <h3 class="midnight-blue">Kewirausahaan dan Inventaris</h3>
                <p class="grey">Bertanggung jawab atas pemasukan dana kewirausahaan serta mengatur barang dan
                    berkas kesekretariatan HIMSI UNAIR.</p>
            </div>
            <div class="about--bidang__card">
                <img src="{{ url('assets/img/mercusuar/PSDM.svg') }}" alt="PSDM" class="about--bidang__card-img" width="60px">
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
