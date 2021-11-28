<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HIMSI 2021</title>

    <link rel="stylesheet" href="{{ url('assets/css/env.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/landing-page.css') }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins&display=swap" rel="stylesheet">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-6R0KVNDRDE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-6R0KVNDRDE');
</script>
</head>

<body>
    <div class="container">

        <div class="landing">

            <div class="bg">
                <img src="{{ url('assets/image/stars.png') }}" id="layer1" alt="">
                <!-- <img src="watermark.png" id="layer2" alt="Watermark"> -->
                <img src="{{ url('assets/image/overlay.png') }}" id="layer3" alt="">
            </div>

            <div class="konten">
                <div class="top-marker">

                    <div class="landing-title open">
                        <span id="extrabold">HIMSI 2021</span>
                        <span id="semibold">Kabinet Cakrawala</span>
                    </div>

                    <div class="logo">
                        <img src="{{ url('assets/image/himsi.png') }}" alt="Logo Himsi">
                        <img src="{{ url('assets/image/cakrawala-logo.png') }}" alt="">
                    </div>

                </div>

                <div class="landing-foot poppin">
                    <div class="card" onclick="location.href = '{{ route('f.form.index') }}'">
                        <div class="">
                            <span class="caption">NEW FEATURE</span>
                            <span class="caption now-available">NOW AVAILABLE</span>
                        </div>
                        <span class="h3">
                            FORM
                        </span>
                        <p class="p">
                            Butuh FORM untuk pendaftaran ? FORM untuk survey ? Pake Fitur terbaru dari HIMSI aja.
                            Bye-Bye Google-Form, Bangga Produk Sendiri kuy. HIMSI JAYAMAHE !!!</p>
                        <div class="line-breaker"></div>
                    </div>
                    <div class="card" onclick="location.href = '{{ route('curhat.index') }}'">
                        <div class="">
                            <span class="caption">NEW FEATURE</span>
                            <span class="caption now-available">NOW AVAILABLE</span>
                        </div>
                        <span class="h3">
                            CURHAT
                        </span>
                        <p class="p">
                            Curahkan isi hati terdalam kalian, kami selalu ada untuk menjadi pendengar atau bahkan
                            memberi jalan keluar jika dibutuhkan. Jangan khawatir dengan privasi identitas kalian, kami
                            pastikan terjaga. Yuk Curhat !</p>
                        <div class="line-breaker"></div>
                    </div>
                    <div class="card" onclick="location.href = '{{ route('meditasi.index') }}'">
                        <div class="">
                            <span class="caption">NEW FEATURE</span>
                            <span class="caption now-available">NOW AVAILABLE</span>
                        </div>
                        <span class="h3">
                            MEDITASI
                        </span>
                        <p class="p">
                            Khusus buat kalian yang butuh sekedar hiburan atau ketenangan sementara dari hiruk pikuk
                            dunia perkuliahan, Kami siapkan buat kalian berbagi media yang akan membantu kalian untuk
                            rehat sejenak.
                            Yuk Rebahan Bentar ! </p>
                        <div class="line-breaker"></div>
                    </div>
                    <div class="card" onclick="location.href = '{{ route('kritik.index') }}'">
                        <div class="">
                            <span class="caption">NEW FEATURE</span>
                            <span class="caption now-available">NOW AVAILABLE</span>
                        </div>
                        <span class="h3">
                            KRITIK SARAN
                        </span>
                        <p class="p">
                            Suarakan aspirasi kalian kepada terhadap kinerja HIMSI tahun ini. Kalian dapat memberikan
                            kritik saran per-bidang maupun ditujukan untuk HIMSI secara keseluruhan.
                            Kritik Saran kalian sangat berarti bagi kami.
                            Yuk Sampaikan !</p>
                        <div class="line-breaker"></div>
                    </div>
                    <div class="card" onclick="location.href = '{{ route('akademik') }}'">
                        <div class="">
                            <span class="caption now-available">NOW AVAILABLE</span>
                        </div>
                        <span class="h3">
                            Bank Akademik <span class="p"></span>
                        </span>
                        <p class="p">
                            Punya masalah tentang perkuliahan ? Bank Akademik solusinya. Disini kita menyediakan
                            referensi seputar perkuliahan yang sumbernya langsung dari warga Sistem Informasi UNAIR. Gak
                            perlu main jauh-jauh ya. HIMSI punya semua kok. Happy AMbis !!
                        </p>
                        <div class="line-breaker"></div>
                    </div>
                </div>

                <!-- <div class="landing-foot poppin">
                    <span>HIMSI 2021</span>
                    <span>MEMPERSEMBAHKAN</span>
                    <img src="image/arrow.png" alt="">
                </div> -->
            </div>

        </div>

        <div class="pembungkus">

            <div class="title">
                <img src="{{ url('assets/image/Vector.png') }}" alt="">
                <span class="title-text poppin">TUPOKSI</span>
            </div>

            <div class="container-grid open">
                <div class="left">
                    <div class="btn active" id="ristek">RISTEK</div>
                    <div class="btn" id="psdm">PSDM</div>
                    <div class="btn" id="sera">SERA</div>
                    <div class="btn" id="media">MEDIA</div>
                    <div class="btn" id="hublu">HUBLU</div>
                    <div class="btn" id="akademik">AKADEMIK</div>
                    <div class="btn" id="kestari">KESTARI</div>

                </div>
                <div class="right" class="p">
                    desc
                </div>
            </div>

            <!-- <a href="#" class="footer poppin" style="text-decoration: none" >
                <img src="image/arrow.png" alt="" id="show">
                <span>BERKAS AKADEMIK</span>
                <img src="image/arrow.png" alt="" id="hidden">
            </a> -->
        </div>
    </div>



    <script src="{{ url('assets/js/landing-page.js') }}"></script>
    <script>
        const daftar = document.querySelector('.footer.poppin');

        // daftar.addEventListener("click", function () {
        //     window.open("http://www.google.com/")
        //     alert("belum tersedia")
        // })

    </script>

</body>

</html>
