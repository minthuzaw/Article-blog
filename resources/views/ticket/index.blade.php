@extends('layouts.main')
@section('content')
    <div class="container">

        @if($errors->any())
            <div class="alert alert-warning">
                <ol>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ol>
            </div>
        @endif
        <form method="POST" action="{{ route('ticket.check') }}">
            @csrf
            @if(session('hotel') !== null)
                <input type="hidden" name="hotel" value="{{ session()->get('hotel') }}">
            @endif
            <div class="mb-3">
                <label>Ticket Count</label>
                <input type="number" name="ticket" class="form-control" value="{{ old('ticket') }}">
            </div>
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label>Check</label>
                <input type="checkbox" name="check" value="check">
            </div>

            <input type="submit" value="Buy Tickets"
                   class="btn btn-blue">
        </form>
@endsection
