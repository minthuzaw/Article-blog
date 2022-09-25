@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-lg p-3 mb-5 bg-body rounded" style="height: 28rem">
                    <div class="row d-flex align-content-center my-5">
                        <div class="col-md-6">
                            <img src="{{ asset('logos/login-logo.svg') }}" alt="" width="100%">

                            <a href="{{ route('register') }}">Create an account?</a>
                        </div>
                        <div class="col-md-6">
                            <h1 class="fw-bold">Sign In</h1>

                            <form method="POST" class="mt-5" action="{{ route('login') }}">
                                @csrf
                                <div class="data mb-3">
                                    <label>Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                           name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="data mb-3">
                                    <label>Password</label>
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="forgot-pass my-2 d-flex align-items-center">
                                    <button type="submit" class="btn btn-primary btn-lg">Login</button>

                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="offset-1">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
