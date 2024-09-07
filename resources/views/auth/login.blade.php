@extends('layouts.client.app')

@section('title', 'Login')

@section('content')
    <div class="col-md-6 col-sm-10 col-12 mx-auto my-5 p-5">
        <div class="card mt-5 py-5">
            <h3 class="text-center font-weight-bold">MASUK</h3>
            <div class="d-flex justify-content-center align-items-center mt-3">
                <form action="{{ route('login') }}" method="POST" class="px-3">
                    @csrf
                    <input class="form-control @error('email') is-invalid @enderror" name="email" required autofocus
                        type="text" name="email" id="email" placeholder="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <input class="form-control @error('password') is-invalid @enderror" name="password" required
                        type="password" id="password" placeholder="password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="form-control btn mt-3 text-white aktif">Masuk</button>
                    <div class="row">
                        <div class="col-md-2 col-4 text-center my-2 mx-auto">
                            <a href="{{ route('auth.redirect', 'google') }}" class="btn text-white"
                                style="background-color: #ea4335">
                                <i class="fab fa-google"></i>
                            </a>
                        </div>
                        <div class="col-md-2 col-4 text-center my-2 mx-auto">
                            <a href="{{ route('auth.redirect', 'github') }}" class="btn text-white"
                                style="background-color: #24292e">
                                <i class="fab fa-github"></i>
                            </a>
                        </div>
                        <div class="col-md-2 col-4 text-center my-2 mx-auto">
                            <a href="{{ route('auth.redirect', 'linkedin') }}" class="btn text-white"
                                style="background-color: #0077b5">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                        <div class="col-md-2 col-4 text-center my-2 mx-auto">
                            <a href="{{ route('auth.redirect', 'discord') }}" class="btn text-white"
                                style="background-color: #7289da">
                                <i class="fab fa-discord"></i>
                            </a>
                        </div>
                        <div class="col-md-2 col-4 text-center my-2 mx-auto">
                            <a href="{{ route('auth.redirect', 'twitter') }}" class="btn text-white"
                                style="background-color: #1da1f2">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                        <div class="col-md-2 col-4 text-center my-2 mx-auto">
                            <a href="{{ route('auth.redirect', 'twitch') }}" class="btn text-white"
                                style="background-color: #6441a5">
                                <i class="fab fa-twitch"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
@endsection
