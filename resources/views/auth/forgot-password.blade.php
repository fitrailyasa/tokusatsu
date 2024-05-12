@extends('layouts.client.app')

@section('title', 'Forgot Password')

@section('content')
    <div>
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

    </form>
@endsection
