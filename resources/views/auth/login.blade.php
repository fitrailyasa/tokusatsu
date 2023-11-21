@extends('layouts.client.app')

@section('title', 'Login')

@section('content')
    <div class="col-md-4 mx-auto my-5 p-5">
        <h3 class="text-center text-white mt-5 pt-5 font-weight-bold">MASUK</h3>
        <div class="d-flex justify-content-center align-items-center mt-3">
            <form action="{{ route('login') }}" method="POST" class="">
                @csrf
                <input class="form-control @error('email') is-invalid @enderror" name="email" value="admin@admin.com"
                    required autofocus type="text" name="email" id="email" placeholder="email">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <input class="form-control @error('password') is-invalid @enderror" name="password" value="password"
                    required type="password" id="password" placeholder="password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <button type="submit" class="form-control btn mt-3 btn-warning">Masuk</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
@endsection
