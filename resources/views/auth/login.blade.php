@extends('template.bootstrap.temp')

@section('title')
    LOGIN
@endsection

@section('content')

    <div class="container">
        <div class="row align-items-center justify-content-center text-center" style="height: 50vh">
            <form method="POST" action="{{ route('auth.login') }}">
                @csrf
                <div class="form-group">
                    <label for="inputUsername">Username</label>
                    <input name="email" type="text" class="form-control @error('email') is-invalid @enderror"
                        id="inputUsername" aria-describedby="emailFeedback" value="{{ old('email') }}">
                    @error('email')
                        <div id="emailFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        id="inputPassword aria-describedby=" passwordFeedback"">
                    @error('password')
                        <div id="passwordFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                @if (Session::has('error-password'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error-password') }}
                    </div>
                @endif
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
@endsection
