<form action="{{ route('search') }}" method="GET">
    <div class="d-flex justify-content-center align-items-center px-3">
        <div class="col-md-6 input-group mb-3">
            <input type="text" class="form-control" name="query" placeholder="Cari..."
                value="{{ request('query') }}">
            <button class="btn w-25 text-white aktif border" type="submit">Cari</button>
        </div>
    </div>
</form>