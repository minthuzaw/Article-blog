@extends('layouts.main')

@section('content')
    <div class="container-fluid card-padding overflow-y-scroll">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('resent'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card border-0 shadow">
                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                    <div class="card-body">


                        <div class="row">
                            <div class="col-md-8 offset-2">
                                <img src="{{ asset('logos/email-verify-img.svg') }}" alt="verify email address"
                                     width="100%" height="394px">
                            </div>

                            <div class="col-md-12 text-center">
                                <strong>{{ __('Before proceeding, please check your email for a verification link.') }}
                                    {{ __('If you did not receive the email') }},</strong>
                                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button type="submit"
                                            class="btn btn-link p-0 m-0 align-baseline">
                                        {{ __('click here to request another') }}</button>
                                    .
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
