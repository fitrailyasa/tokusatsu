@extends('layouts.client.app')

@section('title', 'Hasil Pencarian')

@section('textHome', 'bg-warning rounded')

@section('content')
    <div class="container text-center my-5 py-5">
        <form action="{{ route('search') }}" method="GET">
            <div class="d-flex justify-content-center align-items-center px-3">
                <div class="col-md-6 input-group mb-3">
                    <input type="text" class="form-control" name="query" placeholder="Cari..."
                        value="{{ request('query') }}">
                    <button class="btn w-25 text-white bg-warning" type="submit">Cari</button>
                </div>
            </div>
        </form>
        <h4 class="text-dark font-weight-bold p-3 mx-3 text-white">Hasil Pencarian</h4>
        <div class="text-center d-flex flex-wrap justify-content-center border-bottom">
            @foreach ($datas as $data)
                <a href="#" data-toggle="modal" data-target="#myModal{{ $data->id }}">
                    <img class="img img-fluid img-gallery" src="{{ asset('assets/img/' . $data->img) }}"
                        alt="{{ $data->img }}">
                </a>

                <!-- Modal -->
                <div class="modal fade" id="myModal{{ $data->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div id="carouselExampleControls{{ $data->id }}" class="carousel slide"
                                    data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($datas as $index => $modalData)
                                            @if ($modalData->category->name === $data->category->name)
                                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                    <img class="img img-fluid"
                                                        src="{{ asset('assets/img/' . $modalData->img) }}"
                                                        alt="{{ $modalData->img }}">
                                                    <!-- Tombol Download -->
                                                    <a href="{{ asset('assets/img/' . $modalData->img) }}"
                                                        download="{{ $modalData->img }}"
                                                        class="btn btn-success mt-2 col-12">Download Gambar</a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls{{ $data->id }}"
                                        role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls{{ $data->id }}"
                                        role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
