<div class="nav">
    <div class="nav-mobile">
        <img src="{{ url('assets/img/btn-burger.png') }}" alt="" class="nav-burger">
    </div>
    <div class="nav-group">
        @if (Auth::user())
            <div class="dropdown nav-item" id="nav-user">
                <button class="dropbtn">Hello, {{ Auth::User()->email }}<img
                        src="{{ url('assets/img/drop-down.png') }}" /></button>
                <div class="dropdown-content">
                    <a href="#" onclick="alert('fitur masih dalam proses')">Ubah Password</a>
                    <a href="{{ route('auth.logout') }}">LogOut</a>
                </div>
            </div>
        @else
            <a href="{{ route('home') }}" class="nav-item active">
                <span class="nav-text"> Beranda </span>
                <span class="line"></span>
            </a>
        @endif
        @if (Auth::User())
            <a href="{{ route('form.index') }}" class="nav-item" id="nav-form">
                <span class="nav-text">Form</span>
                <span class="line"></span>
            </a>
            @if (Auth::User()->email == 'psdm')
                {{-- <a href="{{route('chsi.admin.index')}}" class="nav-item" id="nav-chsi">
                    <span class="nav-text">CHSI</span>
                    <span class="line"></span>
                </a> --}}
                <div class="dropdown active nav-item" id="nav-chsi">
                    <button class="dropbtn">CHSI<img src="{{ url('assets/img/drop-down.png') }}" /></button>
                    <div class="dropdown-content">
                        {{-- <a href="{{ route('chsi.admin.index') }}">Index</a> --}}
                        <a href="{{route('chsi.admin.curhat.index')}}">Curhat</a>
                        <a href="#">Kritik Saran</a>
                        <a href="#">Meditasi</a>
                    </div>
                </div>
            @else
                {{-- <a href="{{ route('chsi.admin.kritik.index') }}" class="nav-item" id="nav-krisar"> --}}
                <a href="#" onclick="alert('fitur masih dalam proses')" class="nav-item" id="nav-krisar">
                    <span class="nav-text">Kritik Saran</span>
                    <span class="line"></span>
                </a>
            @endif
        @endif
        @if (!Auth::User())
            <a href="{{ route('login') }}" class="nav-item">
                <span class="nav-text">Login</span>
                <span class="line"></span>
            </a>
        @endif


        {{-- <div class="dropdown active nav-item" id="nav-new-feature">
            <button class="dropbtn">New Feature<img src="{{ url('assets/img/drop-down.png') }}" /></button>
            <div class="dropdown-content">
                <a href="{{ route('f.form.index') }}">Form</a>
                <a href="{{ route('chsi.index') }}">Curhat - CHSI</a>
                <a href="#">Kritik Saran</a>
                <a href="#">Meditasi</a>
            </div>
        </div> --}}
    </div>

</div>
