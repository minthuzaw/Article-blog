<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="{{ asset('images/blog.png') }}">

    <title>{{ config('app.name', 'Blog') }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
<div class="center">
    <input type="checkbox" id="show">
    <label for="show" class="show-btn button-line">Login</label>
    <div class="container">
        <label for="show" class="close-btn fas fa-times" title="close"></label>
        <div class="text">
            LOGIN
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="data">
                <label>Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="data">
                <label>Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                       name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="forgot-pass">
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
            <div class="btn">
                <div class="inner"></div>
                <button type="submit">login</button>
            </div>
            <div class="signup-link">
                Not a member? <a href="{{ route('register') }}">Signup now</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
