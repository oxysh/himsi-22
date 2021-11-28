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
                @if (Auth::User())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('form.index') }}" id="navbarDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Form
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('form.index') }}">List</a>
                            <a class="dropdown-item" href="{{ route('form.create') }}">Create</a>
                        </div>
                    </li>
                    @if (Auth::User()->email == 'psdm')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('chsi.admin.index') }}">CHSI</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('chsi.admin.kritik.index') }}" class="nav-link">Kritik&Saran</a>
                        </li>
                    @endif

                @endif
                {{-- <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li> --}}
            </ul>
            {{-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> --}}
            <div class="form-inline my-2 my-lg-0">
                @if (Auth::User())
                    <span class="nav-link text-light">Hello, {{ Auth::User()->email }}</span>
                    <a href="{{ route('auth.logout') }}">
                        <button class="btn btn-danger my-2 my-sm-0" type="submit">Logout</button>
                    </a>
                @else
                    <a href="{{ route('login') }}">
                        <button class="btn btn-success my-2 my-sm-0" type="submit">Login</button>
                    </a>
                @endif
            </div>
        </div>
    </div>

</nav>
