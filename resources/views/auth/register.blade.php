@extends('layouts.main')

@section('content')
    <div class="container-fluid card-padding">
        <div class="row justify-content-center">
            <div class="col-md-8 col-12">
                <div class="card border-0 shadow-lg p-2 mt-3 bg-body rounded">
                    <div class="row d-flex align-content-center my-lg-5 my-1">
                        <div class="col-md-6 pt-5 auth-image">
                            <img src="{{ asset('logos/register-logo.svg') }}" alt="register-image" height="100%"
                                 width="100%">
                        </div>
                        <div class="col-md-6 col-12">
                            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                                <li class="nav-item me-1" role="presentation">
                                    <a class="nav-link link-hover auth-font text-muted" id="tab-login"
                                       data-mdb-toggle="pill" href="{{ route('login') }}"
                                       role="tab"
                                       aria-controls="pills-login" aria-selected="true">Log in</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active-auth auth-font" id="tab-register" data-mdb-toggle="pill"
                                       href="{{ route('register') }}"
                                       role="tab"
                                       aria-controls="pills-register" aria-selected="false">Sign up</a>
                                </li>
                            </ul>

                            <form method="POST" class="mt-lg-5" action="{{ route('register') }}">
                                @csrf
                                <div class="data mb-3">
                                    <label class="mb-2">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name"
                                           value="{{ old('name') }}" autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="data mb-3">
                                    <label class="mb-2">Email <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                           name="email"
                                           value="{{ old('email') }}" autocomplete="email" autofocus>
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
                                           name="password" autocomplete="current-password">
                                    <i class="fa-solid fa-eye pe-2 login-toggle-eye" id="togglePassword"></i>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="data mb-3">
                                    <label class="mb-2" for="password_confirmation">Confirm Password <span
                                            class="text-danger">*</span></label>
                                    <input id="password_confirmation" type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password_confirmation" autocomplete="new-password">
                                    <i class="fa-solid fa-eye pe-2 login-toggle-eye" id="toggleConfirmPassword"></i>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="forgot-pass my-2 d-flex align-items-center">
                                    <button type="submit" class="btn btn-green btn-lg">Sign Up</button>
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
        toggleLogin.addEventListener("mouseover", function () {
            toggleRegister.classList.remove("active-auth");
            toggleRegister.classList.add("text-muted");
        });
        toggleLogin.addEventListener("mouseout", function(){
            toggleRegister.classList.add("active-auth");
            toggleRegister.classList.remove("text-muted");
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

        const toggleConfirmPassword = document.querySelector("#toggleConfirmPassword");
        const confirm_password = document.querySelector("#password_confirmation");

        toggleConfirmPassword.addEventListener("click", function () {
            const confirm_type = confirm_password.getAttribute("type") === "password" ? "text" : "password";
            confirm_password.setAttribute("type", confirm_type);

            if (confirm_type !== "password") {
                this.classList.remove("fa-eye");
                this.classList.add("fa-eye-slash");
            } else {
                this.classList.remove("fa-eye-slash");
                this.classList.add("fa-eye");
            }
        });
    </script>
@endpush
