@extends('layouts.client.app')

@section('title', 'Register')

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg rounded-4 p-4" style="max-width: 420px; width: 100%;">
            <h4 class="text-center fw-bold">Registrasi</h4>

            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf

                {{-- Name --}}
                <div class="mb-2">
                    <label for="name" class="form-label fw-semibold">Name</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input class="form-control @error('name') is-invalid @enderror" name="name" type="text"
                            id="name" placeholder="Full name" value="{{ old('name') }}" required autofocus>
                    </div>
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="mb-2">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input class="form-control @error('email') is-invalid @enderror" name="email" type="email"
                            id="email" placeholder="name@mail.com" value="{{ old('email') }}" required>
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
                        <input class="form-control @error('password') is-invalid @enderror" name="password" type="password"
                            id="password" placeholder="******" required>
                        <span class="input-group-text" style="cursor: pointer;" id="togglePassword">
                            <i class="fas fa-eye" id="eyePassword"></i>
                        </span>
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Password Confirmation --}}
                <div class="mb-2">
                    <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input class="form-control @error('password_confirmation') is-invalid @enderror" name="******"
                            type="password" id="password_confirmation" placeholder="Ulangi password" required>
                        <span class="input-group-text" style="cursor: pointer;" id="togglePasswordConfirm">
                            <i class="fas fa-eye" id="eyePasswordConfirm"></i>
                        </span>
                    </div>
                    @error('password_confirmation')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Submit --}}
                <div class="d-grid mb-2">
                    <button type="submit" class="btn btn-primary fw-semibold" id="authButton">
                        <span id="authText">Register</span>
                        <span class="spinner-border spinner-border-sm d-none" id="authSpinner" role="status"
                            aria-hidden="true"></span>
                    </button>
                </div>

                {{-- Login --}}
                <div class="text-center">
                    <small class="text-muted">Already have an account? <a href="{{ route('login') }}">Login</a></small>
                </div>

                {{-- Social Auth --}}
                <div class="text-center mb-2">
                    <small class="text-muted">Or register with</small>
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
        const passwordInput = document.getElementById('password');
        const passwordToggle = document.getElementById('togglePassword');
        const passwordIcon = document.getElementById('eyePassword');

        passwordToggle.addEventListener('click', () => {
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
            passwordIcon.classList.toggle('fa-eye');
            passwordIcon.classList.toggle('fa-eye-slash');
        });

        // Confirm password toggle
        const confirmInput = document.getElementById('password_confirmation');
        const confirmToggle = document.getElementById('togglePasswordConfirm');
        const confirmIcon = document.getElementById('eyePasswordConfirm');

        confirmToggle.addEventListener('click', () => {
            const type = confirmInput.type === 'password' ? 'text' : 'password';
            confirmInput.type = type;
            confirmIcon.classList.toggle('fa-eye');
            confirmIcon.classList.toggle('fa-eye-slash');
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
