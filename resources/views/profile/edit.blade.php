@extends('layouts.main')

@section('css-content')
    <link rel="stylesheet" href="{{ asset('css/edit-profile.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center pt-3">
            <div class="col-md-4">
                @if($errors->any())
                    <div class="alert alert-warning">
                        <ol class="m-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ol>
                    </div>
                @endif
                <div class="card border-0 shadow">
                    <div class="card-header border-0">
                        <h3 class="m-0 p-2 text-center">Profile</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('profiles.update', $user->id) }}" enctype="multipart/form-data"
                              method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUpload" name="profile" accept=".png, .jpg, .jpeg"/>
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview"
                                             style="background-image: url({{ $user->profile ? config('app.url').'/images/'.$user->profile : asset('favicon/user.png') }});">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row my-3">
                                <label for="name"
                                       class="col-md-2 col-form-label text-md-start">{{ __('Name ') }}</label>
                                <div class="col-md-10">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') ? old('name') : $user->name }}">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="row mb-3">
                                <label for="name"
                                       class="col-md-2 col-form-label text-md-start">{{ __('Email') }}</label>

                                <div class="col-md-10">
                                    <input id="name" type="text"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') ? old('email') : $user->email }}">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name"
                                       class="col-md-2 col-form-label text-md-start">{{ __('Phone') }}</label>

                                <div class="col-md-10">
                                    <input id="name" type="text"
                                           class="form-control" name="phone_no"
                                           value="{{ old('phone_no') ? old('phone_no') : $user->phone_no }}">

                                    @error('phone_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 d-flex">
                                    <label class="form-check-label me-2" for="flexSwitchCheckDefault">Change
                                        Password</label>
                                    <div class="form-check form-switch mb-1">

                                        <input class="form-check-input checkbox" type="checkbox"
                                               id="flexSwitchCheckDefault">
                                    </div>
                                </div>

                                <div class="mb-4 col-md-6 col-12 d-none show-password-form">
                                    <x-form.password name="password" label="Password" important="*" autocomplete="off"/>
                                    <i class="fa-solid fa-eye pe-2 toggle-eye" id="togglePassword"></i>
                                </div>
                                <div class="mb-4 col-md-6 col-12 d-none show-password-form">
                                    <x-form.password name="password_confirmation" label="Confirm Password"
                                                     important="*"/>
                                    <i class="fa-solid fa-eye pe-2 toggle-eye" id="toggleConfirmPassword"></i>
                                </div>

                            </div>

                            <div class="d-grid gap-2 col-12 mx-auto">
                                <button type="submit" class="btn btn-green">
                                    {{ __('Update') }}
                                </button>
                                <a href="{{ route('profiles.index') }}" class="btn btn-outline-red">
                                    Cancel
                                </a>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('js-content')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imageUpload").change(function () {
            readURL(this);
        });

        $(document).ready(function () {
            @if($errors->any())
            $('.show-password-form').attr('class', 'mb-4 col-md-6 show-password-form');
            @endif
            $('.checkbox').change(function () {
                if ($(this).is(':checked')) {
                    $('.show-password-form').attr('class', 'mb-4 col-md-6 show-password-form');
                } else {
                    $('.show-password-form').attr('class', 'mb-4 d-none col-md-6 show-password-form');
                }
            })
        });

        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");
        togglePassword.addEventListener("click", function () {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            if (type !== "password") {
                this.classList.remove("fa-eye", "toggle-eye");
                this.classList.add("fa-eye-slash" , "toggle-eye-slash");
            } else {
                this.classList.remove("fa-eye-slash", "toggle-eye-slash");
                this.classList.add("fa-eye", "toggle-eye");
            }
        });

        const toggleConfirmPassword = document.querySelector("#toggleConfirmPassword");
        const confirm_password = document.querySelector("#password_confirmation");

        toggleConfirmPassword.addEventListener("click", function () {
            const confirm_type = confirm_password.getAttribute("type") === "password" ? "text" : "password";
            confirm_password.setAttribute("type", confirm_type);

            if (confirm_type !== "password") {
                this.classList.remove("fa-eye", "toggle-eye");
                this.classList.add("fa-eye-slash" , "toggle-eye-slash");
            } else {
                this.classList.remove("fa-eye-slash", "toggle-eye-slash");
                this.classList.add("fa-eye", "toggle-eye");
            }
        });
    </script>
@endpush
