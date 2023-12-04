@extends('layouts.client.app')

@section('title', 'Category')

@section('textEra', 'bg-warning rounded')

@section('content')

    <div class="text-center my-5 py-5">
        <div class="container">
            <div class="row px-3">
                <div class="col-1">
                    <a href="{{ route('era.show', $era->id) }}">
                        <p class="text-white"><i class="fa-solid fa-arrow-left fs-4"></i></p>
                    </a>
                </div>
                <div class="col-10">
                    <h2 class="text-white font-weight-bold">{{ $category->name }}</h2>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
        @foreach ($datas->where('category_id', $category->id) as $data)
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
