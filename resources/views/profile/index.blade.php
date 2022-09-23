@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ $user->profile ? 'images/'.$user->profile : asset('images/user.png') }}"
                             class="rounded-circle" alt="Profile image"
                             style="width: 100px;height: 100px">
                        <h1 class="mt-4">{{ $user->name }}</h1>
                        <h4 class="my-3">{{ $user->email }}</h4>
                        <p>{{ $user->phone_no }}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{ route('profiles.edit', $user->id)}}" class="btn btn-outline-success btn-sm">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
