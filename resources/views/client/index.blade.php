@extends('layouts.client.app')

@section('title', 'Beranda')

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
        <h3 class="text-white font-weight-bold">Kamen Rider</h3>
        <div class="text-center d-flex flex-wrap justify-content-center border-bottom">
            @foreach ($datas->where('category_id', '1') as $data)
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
        <h3 class="text-white font-weight-bold pt-4">Ultraman</h3>
        <div class="text-center d-flex flex-wrap justify-content-center border-bottom">
            @foreach ($datas->where('category_id', '82') as $data)
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
        <h3 class="text-white font-weight-bold pt-4">Super Sentai</h3>
        <div class="text-center d-flex flex-wrap justify-content-center border-bottom">
            @foreach ($datas->where('category_id', '39') as $data)
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

@endsection
