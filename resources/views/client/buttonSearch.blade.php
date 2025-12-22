<form action="{{ route('search') }}" method="GET" class="mb-3">
    <div class="d-flex justify-content-center px-3">
        <div class="col-12 col-md-6">
            <div class="input-group shadow-sm">
                <span class="input-group-text bg-white border-end-0 rounded-start">
                    <i class="fa-solid fa-magnifying-glass text-muted"></i>
                </span>
                <input type="text" class="form-control border-start-0 rounded-end" name="query"
                    placeholder="Search videos..." value="{{ request('query') }}">
            </div>
        </div>
    </div>
</form>
