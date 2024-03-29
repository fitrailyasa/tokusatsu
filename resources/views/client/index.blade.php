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
        <h4 class="text-white font-weight-bold">Kamen Rider</h4>
        <div class="text-center d-flex flex-wrap justify-content-center border-bottom">
            @foreach ($datas as $data)
                @if ($data->category->name === 'Kamen Rider')
                    <a href="#" data-toggle="modal" data-target="#myModal{{ $data->id }}">
                        <img class="img img-fluid p-3 img-gallery" width="300px"
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
                                    <!-- Tombol Download -->
                                    <a href="{{ asset('assets/img/' . $data->img) }}" download="{{ $data->img }}"
                                        class="btn btn-success mt-2 col-12">Download Gambar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <h4 class="text-white font-weight-bold pt-4">Ultraman</h4>
        <div class="text-center d-flex flex-wrap justify-content-center border-bottom">
            @foreach ($datas as $data)
                @if ($data->category->name === 'Ultraman')
                    <a href="#" data-toggle="modal" data-target="#myModal{{ $data->id }}">
                        <img class="img img-fluid p-3 img-gallery" width="300px"
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
                                    <!-- Tombol Download -->
                                    <a href="{{ asset('assets/img/' . $data->img) }}" download="{{ $data->img }}"
                                        class="btn btn-success mt-2 col-12">Download Gambar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <h4 class="text-white font-weight-bold pt-4">Super Sentai</h4>
        <div class="text-center d-flex flex-wrap justify-content-center border-bottom">
            @foreach ($datas as $data)
                @if ($data->category->name === 'Himitsu Sentai Gorenger (1975-1977)')
                    <a href="#" data-toggle="modal" data-target="#myModal{{ $data->id }}">
                        <img class="img img-fluid p-3 img-gallery" width="300px"
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
                                    <!-- Tombol Download -->
                                    <a href="{{ asset('assets/img/' . $data->img) }}" download="{{ $data->img }}"
                                        class="btn btn-success mt-2 col-12">Download Gambar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

@endsection
