@extends('layouts.client.app')

@section('title', 'Login')

@section('content')
    <div class="col-md-6 col-sm-10 col-12 mx-auto my-5 p-5">
        <div class="card mt-5 py-5">
            <h3 class="text-center font-weight-bold">MASUK</h3>
            <div class="d-flex justify-content-center align-items-center mt-3">
                <form action="{{ route('login') }}" method="POST" class="px-3">
                    @csrf
                    <input class="form-control mb-3 @error('email') is-invalid @enderror" name="email" required autofocus
                        type="text" id="email" placeholder="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <input class="form-control @error('password') is-invalid @enderror" name="password" required
                            type="password" id="password" placeholder="password">
                        <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                            <i class="fas fa-eye" id="eyeIcon"></i>
                        </span>
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="form-control btn text-white aktif">Masuk</button>
                    <div class="row">
                        <div class="d-flex flex-wrap justify-content-center gap-3 my-3">
                            @foreach ($providers as $provider)
                                <a href="{{ route('auth.redirect', $provider['name']) }}"
                                    class="d-flex align-items-center justify-content-center rounded-circle text-white"
                                    style="background-color: {{ $provider['color'] }}; width: 45px; height: 45px; text-decoration: none; transition: transform 0.2s;">
                                    <i class="{{ $provider['icon'] }}"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            eyeIcon.classList.toggle('fa-eye');
            eyeIcon.classList.toggle('fa-eye-slash');
        });
    </script>
@endsection
