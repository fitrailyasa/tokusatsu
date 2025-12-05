<div class="text-center my-5 py-4">
    <div class="container">
        <div class="row px-3 mb-3 align-items-center">
            <div class="col-3 text-left">
                <a href="#" onclick="history.back();">
                    <p class="text-dark m-0"><i class="fas fa-arrow-left"></i></p>
                </a>
            </div>

            <div class="col-6">
                <h5 class="font-weight-bold responsive-title">{{ $category->fullname }}</h5>
            </div>

            <div class="col-3 text-right">
                <a class="btn btn-xs text-dark rounded aktif"
                    href="{{ route('video') }}/{{ $category->franchise->slug }}/{{ $category->slug }}">
                    <i data-feather="play-circle"></i>
                </a>
            </div>
        </div>
    </div>
    @foreach ($datas as $item)
        <a href="#" data-bs-toggle="modal" data-bs-target="#myModal{{ $item->id }}">
            <img class="img img-fluid img-gallery" loading="lazy" src="{{ asset('storage/' . $item->img) }}"
                alt="{{ $item->img }}">
        </a>

        <!-- Modal -->
        <div class="modal fade" id="myModal{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <img class="img img-fluid" src="{{ asset('storage/' . $item->img) }}" alt="{{ $item->img }}">
                        <!-- Tombol Download -->
                        <a href="{{ asset('storage/' . $item->img) }}" download="{{ $item->img }}"
                            class="btn aktif text-dark border my-3 col-12">Download Gambar</a>
                        <div>
                            <p>{{ $item->category->description ?? '---------------' }}</p>
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
