<footer class="footer">
    <div class="container">
        <div class="footer__top">
            <img src="{{ url('assets/image/logo.png') }}" alt="" class="footer__logo">
            <div class="footer__menus">
                <a href="{{ route('about-us') }}" class="h4 footer__menu">Tentang Kami</a>
                <a href="{{ route('home') . '#fitur' }}" class="h4 footer__menu">Fitur</a>
                <div class="footer__socials">
                    <a href="{{ url('https://www.instagram.com/himsiunair/') }}" class="footer__social">
                        <img src="{{ url('assets/img/footer-instagram.svg') }}" alt="">
                    </a>
                    <a href="{{ url('') }}" class="footer__social">
                        <img src="{{ url('assets/img/footer-line.svg') }}" alt="">
                    </a>
                    <a href="{{ url('https://www.linkedin.com/company/himpunan-mahasiswa-s1-sistem-informasi-unair/') }}"
                        class="footer__social">
                        <img src="{{ url('assets/img/footer-linkedin.svg') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <h6>&copy; Copyright 2023</h6>
            <h6>HIMSI Universitas Airlangga</h6>
        </div>
    </div>
</footer>
