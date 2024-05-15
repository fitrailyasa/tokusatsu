@extends('layouts.client.app')

@section('title', 'Register')

@section('content')
    <div class="col-md-6 col-sm-10 col-12 mx-auto my-5 p-5">
        <div class="card aktif mt-5 py-5">
            <h3 class="text-center text-white font-weight-bold">REGISTRASI</h3>
            <div class="d-flex justify-content-center align-items-center mt-3">
                <form action="{{ route('register') }}" method="POST" class="">
                    @csrf
                    <input class="form-control @error('name') is-invalid @enderror" name="name" required autofocus
                        type="text" name="name" id="name" placeholder="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
                    <input class="form-control @error('password_confirmation') is-invalid @enderror"
                        name="password_confirmation" required type="password" id="password_confirmation"
                        placeholder="password_confirmation">
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="form-control btn mt-3 text-white aktif">Masuk</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
@endsection
