<div class="mb-3">
    <form method="GET" action="{{ url()->current() }}">
        <div class="d-flex justify-content-between align-items-center">
            <div class="me-3">
                <div class="input-group">
                    <select name="perPage" class="form-select" onchange="this.form.submit()">
                        <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                        <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
                    </select>
                </div>
            </div>
            <div>
                <div class="input-group">
                    <input type="text" name="search" class="form-control" value="{{ $search }}"
                        placeholder="Search...">
                    <button class="btn border" type="submit">Search</button>
                </div>
            </div>
        </div>
    </form>
</div>
