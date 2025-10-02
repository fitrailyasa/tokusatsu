<div class="text-center my-5 py-4">
    <div class="container">
        <div class="row px-3 mb-3">
            <div class="col-3 text-left d-flex align-items-center">
                <a href="#" onclick="history.back();">
                    <p class="text-white m-0"><i class="fas fa-arrow-left"></i></p>
                </a>
            </div>
            <div class="col-6">
                <h4 class="font-weight-bold responsive-title">{{ $category->name }}</h4>
            </div>
            <div class="col-3 text-right">
                <a class="btn btn-xs text-white rounded aktif"
                    href="{{ route('film') }}/{{ $category->franchise->slug }}/{{ $category->slug }}"><i
                        data-feather="play-circle"></i></a>
            </div>
        </div>
    </div>
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
                        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <img class="img img-fluid" src="{{ asset('storage/' . $data->img) }}" alt="{{ $data->img }}">
                        <!-- Tombol Download -->
                        <a href="{{ asset('storage/' . $data->img) }}" download="{{ $data->img }}"
                            class="btn aktif text-white border my-3 col-12">Download Gambar</a>
                        <div>
                            <p>{{ $data->category->description ?? '---------------' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="d-flex justify-content-center mt-3">
        <div class="d-flex justify-content-center w-100 overflow-auto">
            {{ $datas->onEachSide(0)->links() }}
        </div>
    </div>
</div>
