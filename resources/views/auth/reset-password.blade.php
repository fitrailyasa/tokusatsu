@extends('layouts.client.app')

@section('title', 'Reset Password')

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg rounded-4 p-4" style="max-width: 420px; width: 100%;">
            <h4 class="text-center fw-bold mb-2">Reset Password</h4>
            <p class="text-center text-muted small mb-3">
                Please enter your new password below.
            </p>

            <form method="POST" action="{{ route('password.store') }}" novalidate>
                @csrf

                {{-- Password Reset Token --}}
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input id="email" type="email" name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $request->email) }}" required autofocus readonly>
                    </div>
                    @error('email')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">New Password</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input id="password" type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="******" required>
                        <span class="input-group-text togglePassword" style="cursor: pointer;">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label fw-semibold">Confirm New Password</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input id="password_confirmation" type="password" name="password_confirmation" class="form-control"
                            placeholder="******" required>
                        <span class="input-group-text togglePassword" style="cursor: pointer;">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                {{-- Submit --}}
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary fw-semibold" id="resetButton">
                        <span id="resetText">Reset Password</span>
                        <span class="spinner-border spinner-border-sm d-none" id="resetSpinner" role="status"
                            aria-hidden="true"></span>
                    </button>
                </div>

                {{-- Back to Login --}}
                <div class="text-center">
                    <small class="text-muted">
                        Remember your password?
                        <a href="{{ route('login') }}">Back to Login</a>
                    </small>
                </div>
            </form>
        </div>
    </div>

    {{-- JS --}}
    <script>
        // Toggle password visibility
        document.querySelectorAll('.togglePassword').forEach(toggle => {
            toggle.addEventListener('click', function() {
                const input = this.parentElement.querySelector('input');
                const icon = this.querySelector('i');

                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });

        // Button loading spinner
        const resetButton = document.getElementById('resetButton');
        const resetText = document.getElementById('resetText');
        const resetSpinner = document.getElementById('resetSpinner');

        resetButton.addEventListener('click', function() {
            resetText.classList.add('d-none');
            resetSpinner.classList.remove('d-none');
        });
    </script>
@endsection
