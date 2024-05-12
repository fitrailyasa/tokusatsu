@extends('layouts.client.app')

@section('title', 'Confirm Password')

@section('content')
    <div>
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->

    </form>
@endsection
