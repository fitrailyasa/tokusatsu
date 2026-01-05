@extends('layouts.client.app')

@section('title', 'Login')

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="shadow-lg rounded-4 p-4" style="max-width: 420px; width: 100%;">
            <h4 class="text-center fw-bold">Login</h4>

            <form action="{{ route('login') }}" method="POST" novalidate>
                @csrf

                {{-- Email --}}
                <div class="mb-2">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input class="form-control @error('email') is-invalid @enderror" name="email" type="email"
                            id="email" placeholder="name@mail.com" value="{{ old('email') }}" required autofocus>
                    </div>
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-2">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input class="form-control @error('password') is-invalid @enderror" type="password" id="password"
                            name="password" placeholder="******" required>
                        <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                            <i class="fas fa-eye" id="eyeIcon"></i>
                        </span>
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Forgot Password --}}
                <div class="text-end mb-2">
                    <small>
                        <a href="{{ route('password.request') }}" class="text-primary">
                            Forgot password?
                        </a>
                    </small>
                </div>

                {{-- Submit --}}
                <div class="d-grid mb-2">
                    <button type="submit" class="btn btn-primary fw-semibold" id="authButton">
                        <span id="authText">Login</span>
                        <span class="spinner-border spinner-border-sm d-none" id="authSpinner" role="status"
                            aria-hidden="true"></span>
                    </button>
                </div>

                {{-- Register --}}
                <div class="text-center">
                    <small class="text-muted">Don't have an account? <a class="text-primary"
                            href="{{ route('register') }}">Register</a></small>
                </div>

                {{-- Social Auth --}}
                <div class="text-center mb-2">
                    <small class="text-muted">Or login with</small>
                    <div class="d-flex justify-content-center gap-3 mt-2">
                        @foreach ($providers as $provider)
                            <a href="{{ route('auth.redirect', $provider['name']) }}"
                                class="d-flex align-items-center justify-content-center rounded-circle text-white"
                                style="background-color: {{ $provider['color'] }}; width: 45px; height: 45px;">
                                <i class="{{ $provider['icon'] }}"></i>
                            </a>
                        @endforeach
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- JS --}}
    <script>
        // Password toggle
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            eyeIcon.classList.toggle('fa-eye');
            eyeIcon.classList.toggle('fa-eye-slash');
        });

        // Button loading spinner
        const authButton = document.getElementById('authButton');
        const authText = document.getElementById('authText');
        const authSpinner = document.getElementById('authSpinner');

        authButton.addEventListener('click', function() {
            authText.classList.add('d-none');
            authSpinner.classList.remove('d-none');
        });
    </script>
@endsection
