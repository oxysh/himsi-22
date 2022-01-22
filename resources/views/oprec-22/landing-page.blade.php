<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Welcome - Registration HIMSI UNAIR 2022
    </title>

    <!-- Primary Style -->
    {{-- <link rel="stylesheet" href="{{ url('assets/css/navtop.css') }}"> --}}
    <link rel="stylesheet" href="{{ url('assets/css/env.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/scss/app.css') }}">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Poppins:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6R0KVNDRDE"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-6R0KVNDRDE');
    </script>

    @livewireStyles

</head>

<body>
    <div>
        @if ($message = Session::get('info'))
            <div class="alert alert-info-form">{{ $message }}</div>
        @endif
        @if ($message = Session::get('danger'))
            <div class="alert alert-danger-form">{{ $message }}</div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger-form">{{ $message }}</div>
        @endif
        @if ($message = Session::get('warning'))
            <div class="alert alert-warning-form">{{ $message }}</div>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success-form">{{ $message }}</div>
        @endif

        {{-- CONTENT --}}
        <div class="head">
            <div class="head__content">
                <div class="head__img">
                    <img class="head__x" src="{{ url('assets/image/oprec-22/logo-3d.png') }}" alt="" srcset="">
                    <div class="head__slide"></div>
                </div>
                <div class="head__text">
                    <h1>HIMSI 2022</h1>
                    <p>Ayo daftarkan dirimu sekarang juga dan menjadi bagian dari kepengurusan HIMSI UNAIR 2022!</p>
                    <a class="button btn-primary head__btn">Daftar Sekarang</a>
                </div>
            </div>

            <div class="modal" id="modal-regis">
                <div class="modal__main">
                    <div class="modal__close">&times</div>
                    <div class="modal__content">
                        Registrasi belum dibuka.
                    </div>
                </div>
                <div class="modal__overlay"></div>
            </div>

            {{-- ornament --}}
            <img src="{{ url('assets/image/oprec-22/head-lefttop.svg') }}" class="orn orn--head-lefttop">
            <img src="{{ url('assets/image/oprec-22/head-righttop.svg') }}" class="orn orn--head-righttop">
            <img src="{{ url('assets/image/oprec-22/head-leftbottom.svg') }}" class="orn orn--head-leftbottom">
            <img src="{{ url('assets/image/oprec-22/sm-head-top.svg') }}" class="orn-sm orn-sm--head-top">
            <img src="{{ url('assets/image/oprec-22/sm-head-bottom.svg') }}" class="orn-sm orn-sm--head-bottom">
        </div>

        <div class="visi-misi">
            <h3>VISI DAN MISI</h3>
            <div class="visi-misi__visi">
                <h4>Visi</h4>
                <p class="center">Mewujudkan HIMSI sebagai tempat yang tepat, aman dan nyaman untuk
                    berkomunikasi, menampung seluruh aspirasi dan mengembangkan diri bersama bagi seluruh warga S1
                    Sistem Informasi Universitas Airlangga</p>
            </div>
            <div class="visi-misi__misi">
                <h4>Misi</h4>
                <div class="visi-misi__cards">
                    <div class="visi-misi__card">
                        <img src="{{ url('assets/image/oprec-22/thumb-up.png') }}" alt="" class="visi-misi__img">
                        <p class="center">Menciptakan suasana aman, nyaman dan kekeluargaan</p>
                    </div>
                    <div class="visi-misi__card">
                        <img src="{{ url('assets/image/oprec-22/chat.png') }}" alt="" class="visi-misi__img">
                        <p class="center">Menampung seluruh aspirasi warga S1 Sistem Informasi Unair</p>
                    </div>
                    <div class="visi-misi__card">
                        <img src="{{ url('assets/image/oprec-22/chart.png') }}" alt="" class="visi-misi__img">
                        <p class="center">Memaksimalkan seluruh kegiatan HIMSI UNAIR</p>
                    </div>
                </div>
            </div>

            {{-- ornament --}}
            <img src="{{ url('assets/image/oprec-22/vismis-left.svg') }}" class="orn orn--vismis-left">
            <img src="{{ url('assets/image/oprec-22/vismis-right.svg') }}" class="orn orn--vismis-right">
            <img src="{{ url('assets/image/oprec-22/sm-vismis-left.svg') }}" class="orn-sm orn-sm--vismis-left">
            <img src="{{ url('assets/image/oprec-22/sm-vismis-righttop.svg') }}"
                class="orn-sm orn-sm--vismis-righttop">
            <img src="{{ url('assets/image/oprec-22/sm-vismis-rightbottom.svg') }}"
                class="orn-sm orn-sm--vismis-rightbottom">
        </div>

        <div class="galeri">
            <div class="galeri__title">
                <h3>GALERI</h3>
                <p class="center">Dokumentasi kegiatan yang sudah berjalan di HIMSI</p>
            </div>
            <div class="galeri__images">
                <div class="galeri__image">
                    <img src="{{ url('assets/image/oprec-22/galeri/infest-1.png') }}" alt="">
                    <div class="galeri__caption">INFEST</div>
                </div>
                <div class="galeri__image">
                    <img src="{{ url('assets/image/oprec-22/galeri/infest-2.png') }}" alt="">
                    <div class="galeri__caption">INFEST</div>
                </div>
                <div class="galeri__image">
                    <img src="{{ url('assets/image/oprec-22/galeri/isac-1.png') }}" alt="">
                    <div class="galeri__caption">ISAC</div>
                </div>
                <div class="galeri__image">
                    <img src="{{ url('assets/image/oprec-22/galeri/isac-2.png') }}" alt="">
                    <div class="galeri__caption">ISAC</div>
                </div>
                <div class="galeri__image">
                    <img src="{{ url('assets/image/oprec-22/galeri/pointer-1.png') }}" alt="">
                    <div class="galeri__caption">POINTER</div>
                </div>
                <div class="galeri__image">
                    <img src="{{ url('assets/image/oprec-22/galeri/pointer-2.png') }}" alt="">
                    <div class="galeri__caption">POINTER</div>
                </div>
                <div class="galeri__image">
                    <img src="{{ url('assets/image/oprec-22/galeri/pengmas-1.jpg') }}" alt="">
                    <div class="galeri__caption">PENGMAS</div>
                </div>
                <div class="galeri__image">
                    <img src="{{ url('assets/image/oprec-22/galeri/pengmas-2.png') }}" alt="">
                    <div class="galeri__caption">PENGMAS</div>
                </div>
            </div>

            {{-- ornament --}}
            <img src="{{ url('assets/image/oprec-22/galeri-left.svg') }}" class="orn orn--galeri-left">
            <img src="{{ url('assets/image/oprec-22/galeri-right.svg') }}" class="orn orn--galeri-right">
            <img src="{{ url('assets/image/oprec-22/sm-galeri-left.svg') }}" class="orn-sm orn-sm--galeri-left">
            <img src="{{ url('assets/image/oprec-22/sm-galeri-right.svg') }}" class="orn-sm orn-sm--galeri-right">
        </div>

        <div class="tupoksi">
            <div class="tupoksi__title">
                <h3>TUPOKSI</h3>
                <p class="center">Tugas pokok dan fungsi unit kerja dari HIMSI</p>
            </div>
            <div class="tupoksi__content">
                <div class="tupoksi__left">
                    <div class="tupoksi__btn active" id="ristek">RISTEK</div>
                    <div class="tupoksi__btn" id="psdm">PSDM</div>
                    <div class="tupoksi__btn" id="sera">SERA</div>
                    <div class="tupoksi__btn" id="media">MEDIA</div>
                    <div class="tupoksi__btn" id="hublu">HUBLU</div>
                    <div class="tupoksi__btn" id="akademik">AKADEMIK</div>
                    <div class="tupoksi__btn" id="kestari">KESTARI</div>
                </div>
                <div class="tupoksi__right">
                    <div class="tupoksi__text">
                        <div>
                            hi!
                        </div>
                    </div>
                </div>
            </div>

            {{-- ornament --}}
            <img src="{{ url('assets/image/oprec-22/tupoksi-left.svg') }}" class="orn orn--tupoksi-left">
            <img src="{{ url('assets/image/oprec-22/tupoksi-right.svg') }}" class="orn orn--tupoksi-right">
            <img src="{{ url('assets/image/oprec-22/sm-tupoksi-left.svg') }}" class="orn-sm orn-sm--tupoksi-left">
            <img src="{{ url('assets/image/oprec-22/sm-tupoksi-right.svg') }}" class="orn-sm orn-sm--tupoksi-right">
        </div>

        <div class="back-to-top">
            <div class="back-to-top__btn"><img src="https://img.icons8.com/ios-glyphs/24/000000/collapse-arrow.png" />
                BACK TO TOP</div>
        </div>
        {{-- END CONTENT --}}
    </div>



    <script src="{{ url('assets/js/script.js') }}"></script>
    <script src="{{ url('https://code.jquery.com/jquery-3.6.0.min.js') }}"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js') }}"></script>
    <script src="{{ url('assets/js/oprec-22/landing-page.js') }}"></script>
    @livewireScripts

</body>

</html>
