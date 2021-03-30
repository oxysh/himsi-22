<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ url('assets/image/himsi.png') }}" width="30" height="30" class="d-inline-block align-top"
                alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('regist.index') }}">Registrasi</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('regist.cari') }}">Hasil</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('akademik') }}">Akademik</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('chsi.index') }}">CHSI</a>
                </li>
            </ul>

            
        </div>
    </div>

</nav>
