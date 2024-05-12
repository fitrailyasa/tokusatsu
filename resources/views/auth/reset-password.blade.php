@extends('layouts.client.app')

@section('title', 'Reset Password')

@section('content')
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->

        <!-- Password -->

        <!-- Confirm Password -->

    </form>
@endsection
