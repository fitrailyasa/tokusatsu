<div class="p-1 mb-3">
    <form id="filterForm" method="GET" action="{{ url()->current() }}">
        <div class="row align-items-end">
            <div class="col-md-1">
                <div class="input-group">
                    <select name="perPage" class="form-select" onchange="document.getElementById('filterForm').submit()">
                        <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                        <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
                    </select>
                </div>
            </div>

            @if (request()->routeIs('admin.category.index'))
                <div class="col-md-3">
                    <select name="franchise_id" class="form-select"
                        onchange="document.getElementById('filterForm').submit()">
                        <option value="">-- Filter Franchise --</option>
                        @foreach ($franchises as $franchise)
                            <option value="{{ $franchise->id }}"
                                {{ request('franchise_id') == $franchise->id ? 'selected' : '' }}>
                                {{ $franchise->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="era_id" class="form-select"
                        onchange="document.getElementById('filterForm').submit()">
                        <option value="">-- Filter Era --</option>
                        @foreach ($eras as $era)
                            <option value="{{ $era->id }}" {{ request('era_id') == $era->id ? 'selected' : '' }}>
                                {{ $era->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif
            @if (request()->routeIs('admin.data.index') || request()->routeIs('admin.film.index'))
                <div class="col-md-3">
                    <select name="category_id" class="form-select"
                        onchange="document.getElementById('filterForm').submit()">
                        <option value="">-- Filter Category --</option>
                        @foreach ($groupedCategories as $franchiseName => $categoriesGroup)
                            <optgroup label="{{ $franchiseName }}">
                                @foreach ($categoriesGroup as $category)
                                    <option value="{{ old('category_id', $category->id) }}"
                                        {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>
            @endif

            <div class="col-md-3 ms-auto">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" value="{{ $search }}"
                        placeholder="Search...">
                    <button class="btn border" type="submit">Search</button>
                </div>
            </div>
        </div>
    </form>
</div>
