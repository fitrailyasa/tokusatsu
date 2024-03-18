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
                    <h4 class="text-white font-weight-bold">{{ $category->name }}</h4>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
        @foreach ($datas->where('category_id', $category->id) as $data)
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
                            <img class="img img-fluid" src="{{ asset('assets/img/' . $data->img) }}"
                                alt="{{ $data->img }}">
                            <!-- Tombol Download -->
                            <a href="{{ asset('assets/img/' . $data->img) }}" download="{{ $data->img }}"
                                class="btn btn-success mt-2 col-12">Download Gambar</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
