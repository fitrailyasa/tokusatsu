<div class="modal-content">
    @if (auth()->user()->roles_id == 1)
        <form method="POST" action="{{ route('admin.data.store') }}" enctype="multipart/form-data">
    @endif
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="modalFormLabel">Tambah @yield('title')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="name"
                        name="name" id="name" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Images</label>
                    <input id="image-input" accept="image/*" type="file"
                        class="form-control @error('img') is-invalid @enderror" placeholder="img" name="img"
                        id="img">
                    <img class="img-fluid py-3" id="image-preview" src="{{ asset('assets/profile/default.png') }}"
                        alt="Image Preview">
                    @error('img')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-select @error('category_id') is-invalid @enderror" name="category_id"
                        id="category_id" required>
                        <option selected disabled>Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>
</div>

<script>
    function previewImage() {
        var input = document.getElementById('image-input');
        var preview = document.getElementById('image-preview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '{{ asset('assets/profile/default.png') }}';
        }
    }

    document.getElementById('image-input').addEventListener('change', previewImage);
    window.addEventListener('load', previewImage);
</script>
