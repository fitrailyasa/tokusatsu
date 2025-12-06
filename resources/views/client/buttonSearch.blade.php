<form action="{{ route('search') }}" method="GET">
    <div class="d-flex justify-content-center align-items-center px-3">
        <div class="col-md-6 input-group mb-2">
            <input type="text" class="form-control" name="query" placeholder="Search..." value="{{ request('query') }}">
            <button class="btn w-25 text-dark aktif border" type="submit">Search</button>
        </div>
    </div>
</form>
