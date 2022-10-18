@extends('layouts.main')

@section('content')
    <div class="container-fluid login-card">
        <div class="row justify-content-center">
            <div class="col-md-8 col-12">
                <div class="card border-0 shadow-lg p-2 mt-3 bg-body rounded">
                    <div class="row d-flex align-content-center my-5">
                        <div class="col-md-6">
                            <img src="{{ asset('logos/login-logo.svg') }}" alt="" width="100%">

                            <a href="{{ route('register') }}">Create an account?</a>
                        </div>
                        <div class="col-md-6 col-12 mt-2">
                            <h1 class="fw-bold">Sign In</h1>

                            <form method="POST" class="mt-lg-5 mt-3" action="{{ route('login') }}">
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
                                    <i class="fa-solid fa-eye pe-2 login-toggle-eye" id="togglePassword"></i>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="forgot-pass my-2 d-flex align-items-center">
                                    <button type="submit" class="btn btn-green btn-lg">Login</button>

                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="ms-3">
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
@push('js-content')
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");
        togglePassword.addEventListener("click", function () {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            if (type !== "password") {
                this.classList.remove("fa-eye");
                this.classList.add("fa-eye-slash");
            } else {
                this.classList.remove("fa-eye-slash");
                this.classList.add("fa-eye");
            }
        });
    </script>
@endpush
