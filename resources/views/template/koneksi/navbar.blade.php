<div class="nav">
    <div class="nav__mobile">
        <img onclick="location.href = '{{ route('home') }}'" src="{{ url('assets/image/logo.png') }}" alt="">
        <div class="nav__burger">
            <span class="line"></span>
            <span class="line"></span>
        </div>
    </div>
    <div class="nav__group">
        <img onclick="location.href = '{{ route('home') }}'" src="{{ url('assets/image/logo.png') }}" alt="">
        <div class="nav__menu">
            <a href="{{ route('akademik') }}" class="nav__item">Akademik</a>
            <a href="{{ route('kritik.index') }}" class="nav__item">Kritik Saran</a>
            <button class="dropdown">Fitur</button>
            <div class="dropdown__content">
                <a href="{{ route('f.form.index') }}" class="nav__item">Form</a>
                <a href="{{ route('curhat.index') }}" class="nav__item">Curhat - CHSI</a>
                <a href="{{ route('meditasi.index') }}" class="nav__item">Meditasi</a>
            </div>
        </div>
    </div>

</div>
