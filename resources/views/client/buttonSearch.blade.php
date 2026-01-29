<form action="{{ route('search') }}" method="GET" class="mb-3">
    <div class="d-flex justify-content-center px-3">
        <div class="col-12 col-md-6">
            <div class="position-relative">
                <i class="fa-solid fa-magnifying-glass text-muted search-icon"></i>

                <input type="text" class="form-control shadow-sm rounded-pill ps-5" name="query"
                    placeholder="Search videos..." value="{{ request('query') }}">
            </div>
        </div>
    </div>
</form>

<style>
    .search-icon {
        position: absolute;
        top: 50%;
        left: 16px;
        transform: translateY(-50%);
        pointer-events: none;
        font-size: 14px;
    }
</style>
