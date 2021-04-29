<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins&display=swap" rel="stylesheet">

    <!-- Primary Style -->
    <link rel="stylesheet" href="{{ url('assets/css/env.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/admin-login.css') }}">


</head>

<body>

    <div class="container">
        <div class="container-title">
            <h2>Login</h2>
            <span class="p">Selamat Datang Admin HIMSI CAKRAWALA</span>
        </div>
        <div class="container-body">
            <form action="{{ route('auth.login') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="h4" for="username">Username</label>
                    <input type="text" name="email" id="username" class="form-control" data-error="#username-error">
                    <small class="form-error caption" id="username-error"></small>
                    @error('email')
                        <small class="form-error caption"> {{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="h4" for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control"
                        data-error="#password-error">
                    <small class="form-error caption" id="password-error"></small>
                    @error('password')
                        <small class="form-error caption">{{ $message }}</small>
                    @enderror
                </div>
                @if (Session::has('error-password'))
                    <small class="form-error caption" id="password-error">
                        {{ Session::get('error-password') }}
                    </small>
                @endif
                <button type="submit" class="btn-primary">Login</button>
            </form>
        </div>
        <div class="container-footer caption">
            cakrawala.himsiunair.com
        </div>
    </div>

    <script src="{{ url('assets/js/script.js') }}"></script>
    <script>
        document.querySelector('button').addEventListener('click', (e) => {
            e.preventDefault();
            if (validation(document.querySelector('form'))) {
                document.querySelector('form').submit();
            }
        })

    </script>
</body>

</html>
