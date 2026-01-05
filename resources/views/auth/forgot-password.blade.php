@extends('layouts.client.app')

@section('title', 'Forgot Password')

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="shadow-lg rounded-4 p-4" style="max-width: 420px; width: 100%;">
            <h4 class="text-center fw-bold mb-2">Forgot Password</h4>
            <p class="text-center text-muted small mb-3">
                Enter your email, we will send you a link to reset your password.
            </p>

            {{-- Status --}}
            @if (session('status'))
                <div class="alert alert-success small">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('password.email') }}" method="POST" novalidate>
                @csrf

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" placeholder="name@mail.com"
                            value="{{ old('email') }}" required autofocus>
                    </div>
                    @error('email')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Submit --}}
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary fw-semibold" id="resetButton">
                        <span id="resetText">Send Reset Link</span>
                        <span class="spinner-border spinner-border-sm d-none" id="resetSpinner" role="status"
                            aria-hidden="true"></span>
                    </button>
                </div>

                {{-- Back to login --}}
                <div class="text-center">
                    <small class="text-muted">
                        Remember password?
                        <a class="text-primary" href="{{ route('login') }}">Back to Login</a>
                    </small>
                </div>
            </form>
        </div>
    </div>

    {{-- JS --}}
    <script>
        const resetButton = document.getElementById('resetButton');
        const resetText = document.getElementById('resetText');
        const resetSpinner = document.getElementById('resetSpinner');

        resetButton.addEventListener('click', function() {
            resetText.classList.add('d-none');
            resetSpinner.classList.remove('d-none');
        });
    </script>
@endsection
