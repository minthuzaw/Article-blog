@extends('layouts.main')

@section('css-content')
    <link rel="stylesheet" href="{{ asset('css/edit-profile.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card border-0 shadow">
                    <div class="card-header">
                        <h3 class="m-0 p-2">Edit Profile</h3>
                        {{--                        <a href="{{ route('profiles.index')}}" class="btn btn-blue">Back</a>--}}
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
    </script>
@endpush
