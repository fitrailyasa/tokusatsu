@extends('layouts.client.app')

@section('title', 'Hasil Pencarian')

@section('textHome', 'bg-warning rounded')

@section('content')
    <div class="text-center my-5 py-5">
        <form action="{{ route('search') }}" method="GET">
            <div class="d-flex justify-content-center align-items-center px-3">
                <div class="col-md-6 input-group mb-3">
                    <input type="text" class="form-control" name="query" placeholder="Cari..."
                        value="{{ request('query') }}">
                    <button class="btn w-25 text-white bg-warning" type="submit">Cari</button>
                </div>
            </div>
        </form>
        <h3 class="text-dark font-weight-bold p-3 mx-3 text-white">Hasil Pencarian</h3>
        <div class="text-center d-flex flex-wrap justify-content-center border-bottom">
            @foreach ($datas as $data)
                <a href="#" data-toggle="modal" data-target="#myModal{{ $data->id }}">
                    <img class="img img-fluid p-3" style="border-radius: 30px" width="300px"
                        src="{{ asset('assets/img/' . $data->img) }}" alt="{{ $data->img }}">
                </a>

                <!-- Modal -->
                <div class="modal fade" id="myModal{{ $data->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img class="img img-fluid" src="{{ asset('assets/img/' . $data->img) }}"
                                    alt="{{ $data->img }}">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZwT" crossorigin="anonymous">

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

@endsection
