<div class="sidebar">
    <div class="sidebar__blue"></div>
    <div class="sidebar__container">
        <div class="sidebar__toggle">
            <img src="{{ url('assets/img/white-arrow.svg') }}">
        </div>
        <div class="sidebar__content">
            <div class="sidebar__content-menu">
                <div class="sidebar__header">
                    <img src="{{ url('assets/image/himsi.png') }}" alt="" class="sidebar__brand">
                    <p class="grey sidebar__username">{{ Auth::User()->name }}</p>
                </div>
                <div class="sidebar__menus">
                    <div class="sidebar__menu sidebar__menu--dashboard active"
                        onclick="window.location.href = '{{ route('home') }}'">
                        <span class="sidebar__icon">
                            <img src="{{ url('assets/img/sidebar-dashboard.svg') }}" class="idle">
                            <img src="{{ url('assets/img/sidebar-active-dashboard.svg') }}" class="active hidden">
                        </span>
                        <p>Dashboard</p>
                    </div>
                    @if (Auth::User()->email == 'psdm')
                        <div class="sidebar__menu sidebar__menu--curhat"
                            onclick="location.href = '{{ route('chsi.admin.curhat.index') }}'">
                            <span class="sidebar__icon">
                                <img src="{{ url('assets/img/sidebar-curhat.svg') }}" class="idle">
                                <img src="{{ url('assets/img/sidebar-active-curhat.svg') }}" class="active hidden">
                            </span>
                            <p>Curhat</p>
                        </div>
                    @endif
                    <div class="sidebar__menu sidebar__menu--form"
                        onclick="location.href = '{{ route('form.index') }}'">
                        <span class="sidebar__icon">
                            <img src="{{ url('assets/img/sidebar-form.svg') }}" class="idle">
                            <img src="{{ url('assets/img/sidebar-active-form.svg') }}" class="active hidden">
                        </span>
                        <p>Form</p>
                    </div>
                    <div class="sidebar__menu sidebar__menu--krisar"
                        onclick="location.href = '{{ route('chsi.admin.kritik.index') }}'">
                        <span class="sidebar__icon">
                            <img src="{{ url('assets/img/sidebar-krisar.svg') }}" class="idle">
                            <img src="{{ url('assets/img/sidebar-active-krisar.svg') }}" class="active hidden">
                        </span>
                        <p>Kritik Saran</p>
                    </div>
                </div>
            </div>
            <div class="sidebar__footer">
                <div class="sidebar__menu sidebar__menu--keluar"
                    onclick="location.href = '{{ route('auth.logout') }}'">
                    <span class="sidebar__icon">
                        <img src="{{ url('assets/img/sidebar-keluar.svg') }}" class="idle">
                        <img src="{{ url('assets/img/sidebar-active-keluar.svg') }}" class="active hidden">
                    </span>
                    <p>Keluar</p>
                </div>
            </div>
        </div>
    </div>
</div>
