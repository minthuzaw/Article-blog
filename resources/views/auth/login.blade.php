@extends('layouts.main')

@section('content')
    <div class="container-fluid card-padding">
        <div class="row justify-content-center">
            <div class="col-md-8 col-12">
                <div class="card border-0 shadow-lg p-2 mt-3 bg-body rounded">
                    <div class="row d-flex align-content-center my-lg-5 my-1">
                        <div class="col-md-6 auth-image">
                            <img src="{{ asset('logos/login-logo.svg') }}" alt="" width="100%">
                        </div>
                        <div class="col-md-6 col-12 mt-2">
                            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                                <li class="nav-item me-1" role="presentation">
                                    <a class="nav-link active-auth auth-font" id="tab-login" data-mdb-toggle="pill" href="{{ route('login') }}"
                                       role="tab"
                                       aria-controls="pills-login" aria-selected="true">Log in</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link link-hover auth-font text-muted" id="tab-register" data-mdb-toggle="pill" href="{{ route('register') }}"
                                       role="tab"
                                       aria-controls="pills-register" aria-selected="false">Sign Up</a>
                                </li>
                            </ul>

                            <form method="POST" class="mt-lg-5 mt-3" action="{{ route('login') }}">
                                @csrf
                                <div class="data mb-3">
                                    <label class="mb-2">Email <span class="text-danger">*</span></label>
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
                                    <label class="mb-2">Password <span class="text-danger">*</span></label>
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
        const toggleLogin = document.querySelector("#tab-login")
        const toggleRegister = document.querySelector("#tab-register")
        toggleRegister.addEventListener("mouseover", function () {
            toggleLogin.classList.remove("active-auth");
            toggleLogin.classList.add("text-muted");
        });
        toggleRegister.addEventListener("mouseout", function(){
            toggleLogin.classList.add("active-auth");
            toggleLogin.classList.remove("text-muted");
        });

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
