<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HIMSI 2021</title>

    <link rel="stylesheet" href="{{ url('/assets/css/style_comingsoon_black.css') }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600;800&family=Poppins&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="container">

        <div class="landing">

            <div class="bg">
                <img src="{{ url('/assets/image/stars.png') }}" id="layer1" alt="">
                <!-- <img src="watermark.png" id="layer2" alt="Watermark"> -->
                <img src="{{ url('/assets/image/overlay.png') }}" id="layer3" alt="">
            </div>

            <div class="konten">
                <div class="landing-title open">
                    <span id="semibold">Coming Soon</span>
                    <span id="extrabold">HIMSI 2021</span>
                </div>

                <div class="logo">
                    <img src="{{ url('/assets/image/himsi.png') }}" alt="Logo Himsi">
                </div>

                <div class="landing-foot poppin">
                    <span>HIMSI 2021</span>
                    <span>MEMPERSEMBAHKAN</span>
                    <img src="{{ url('/assets/image/arrow.png') }}" alt="">
                </div>
            </div>

        </div>

        <div class="pembungkus">

            <div class="title">
                <img src="{{ url('/assets/image/Vector.png') }}" alt="">
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
                <div class="right">
                   desc
                </div>
            </div>

            <a href="{{route('akademik')}}" class="footer poppin" style="text-decoration: none" >
                <img src="{{ url('/assets/image/arrow.png') }}" alt="" id="show">
                <span>BERKAS AKADEMIK</span>
                <img src="{{ url('/assets/image/arrow.png') }}" alt="" id="hidden">
            </a>
        </div>
    </div>



    <script src="{{ url('/assets/js/frame2.js') }}"></script>
    <script>
        const daftar = document.querySelector('.footer.poppin');

        // daftar.addEventListener("click", function () {
        //     window.open("http://www.google.com/")
        //     alert("belum tersedia")
        // })
    </script>

</body>

</html>