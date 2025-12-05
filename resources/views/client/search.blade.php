@extends('layouts.client.app')

@section('title', 'Search Result')

@section('textHome', 'rounded aktif')

@section('content')
    <div class="text-center my-5 py-5">
        @include('client.buttonSearch')
        <h4 class="font-weight-bold">Search Result</h4>
        <div class="text-center d-flex flex-wrap justify-content-center pb-3">
            @foreach ($datas as $data)
                <a href="#" data-bs-toggle="modal" data-bs-target="#myModal{{ $data->id }}">
                    <img class="img img-fluid img-gallery" loading="lazy" src="{{ asset('storage/' . $data->img) }}"
                        alt="{{ $data->img }}">
                </a>

                <!-- Modal -->
                <div class="modal fade" id="myModal{{ $data->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <img class="img img-fluid" src="{{ asset('storage/' . $data->img) }}"
                                    alt="{{ $data->img }}">
                                <!-- Tombol Download -->
                                <a href="{{ asset('storage/' . $data->img) }}" download="{{ $data->img }}"
                                    class="btn aktif border mt-2 col-12">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-3">
            <div class="d-flex justify-content-center w-100 overflow-auto">
                {{ $datas->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

@endsection
