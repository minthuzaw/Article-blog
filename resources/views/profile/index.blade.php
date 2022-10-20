@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row min-vw-100">
            <div class="col-md-4 mx-auto">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card mt-3 border-0 shadow">
                    <div class="card-body text-center">
                        <img src="{{ $user->profile ? 'images/'.$user->profile : asset('favicon/user.png') }}"
                             class="rounded-circle border-2 shadow-lg" alt="Profile_image"
                             style="width: 130px;height: 130px">
                        <h1 class="mt-4">{{ ucfirst($user->name) }}</h1>
                        <h4 class="my-3">{{ $user->email }}</h4>
                        <p class="m-0">{{ $user->phone_no }}</p>

                        <a href="{{ route('profiles.edit', $user->id)}}" class="btn text-warning">
                            <i class="fa-solid fa-pen-to-square fa-xl"></i>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
