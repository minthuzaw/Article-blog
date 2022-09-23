@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Profile Edit</h3>
                        <a href="{{ route('profiles.index')}}" class="btn btn-outline-primary btn-sm">Back</a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('profiles.update', $user->id) }}" enctype="multipart/form-data"
                              method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{ $user->id }}" name="user_id">
                            <div class="row mb-3">
                                <label for="name"
                                       class="col-md-2 col-form-label text-md-start">{{ __('Name ') }}</label>
                                <div class="col-md-9">
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

                                <div class="col-md-9">
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

                                <div class="col-md-9">
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

                            <div class="row mb-3">
                                <label for="name"
                                       class="col-md-2 col-form-label text-md-start">{{ __('Profile') }}</label>

                                <div class="col-md-9">
                                    <input id="name" type="file"
                                           class="form-control @error('profile') is-invalid @enderror" name="profile"
                                           value="{{ old('profile') ? old('profile') : $user->profile }}">

                                    @error('profile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary" style="margin-right: 35px">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
