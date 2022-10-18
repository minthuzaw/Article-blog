@extends('layouts.main')

@section('content')
<div class="container-fluid card-padding">
        <div class="row justify-content-center">
            <div class="col-md-8 col-12">
                <div class="card border-0 shadow-lg p-2 mt-3 bg-body rounded">
                    <div class="row d-flex align-content-center my-5">
                        <div class="col-md-6 pt-5 auth-image">
                            <img src="{{ asset('logos/register-logo.svg') }}" alt="register-image" height="100%" width="100%">
                        </div>
                        <div class="col-md-6 col-12">
                            <h1 class="fw-bold mb-lg-1">Sign Up</h1>

                            <form method="POST" class="mt-lg-5" action="{{ route('register') }}">
                                @csrf
                                <div class="data mb-3">
                                    <label>Name</label>
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
                                    <label>Email</label>
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
                                    <label>Password</label>
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
                                    <label for="password_confirmation">Confirm Password</label>
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
                                    <button type="submit" class="btn btn-green btn-lg">Register</button>

                                    <a href="{{ route('login') }}" class="ms-3">
                                            {{ __('Already a member?') }}
                                        </a>
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
