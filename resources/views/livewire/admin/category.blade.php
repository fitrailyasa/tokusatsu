@section('title', 'Category')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h3 class="card-title">Table @yield('title')</h3>
            <div class="d-flex justify-content-end mb-3">
                @include('admin.category.create')
                @include('admin.category.excel.import')
                @include('admin.category.excel.export')
                {{-- @include('admin.category.pdf.export') --}}
                @include('admin.category.softDeleteAll')
                @include('admin.category.restoreAll')
            </div>
        </div>
        @include('components.alert')
        @include('components.search')

        <form wire:submit.prevent="{{ $isUpdate ? 'update' : 'store' }}">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Full Name') }}<span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('fullname') is-invalid @enderror"
                            placeholder="fullname" wire:model="fullname" id="fullname" value="{{ old('fullname') }}"
                            required>
                        @error('fullname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Name') }}<span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            placeholder="name" wire:model="name" id="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Franchise') }}<span class="text-danger">*</span></label>
                        <select class="form-select @error('franchise_id') is-invalid @enderror"
                            wire:model="franchise_id" id="franchise_id" required>
                            <option value="">{{ __('Select Franchise') }}</option>
                            @foreach ($franchises as $franchise)
                                <option value="{{ $franchise->id }}" @selected($franchise->id == old('franchise_id', $franchise_id))>
                                    {{ $franchise->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('franchise_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Era') }}<span class="text-danger">*</span></label>
                        <select class="form-select @error('era_id') is-invalid @enderror" wire:model="era_id"
                            id="era_id" required>
                            <option value="">{{ __('Select Era') }}</option>
                            @foreach ($eras as $era)
                                <option value="{{ $era->id }}" @selected($era->id == old('era_id', $era_id))>
                                    {{ $era->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('era_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Description') }}</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" placeholder="description"
                            wire:model="description" id="description" rows="3"></textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Images') }}</label>
                        <input id="image-input" accept="image/*" type="file"
                            class="form-control @error('img') is-invalid @enderror" placeholder="img" wire:model="img"
                            id="img">
                        <img class="img-fluid py-3" id="image-preview" width="200px"
                            src="{{ asset('assets/profile/default.png') }}" alt="Image Preview">
                        @error('img')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">{{ $isUpdate ? 'Update' : 'Create' }}</button>
        </form>

        <table class="table table-bordered table-striped mt-3">
            <thead>
                <tr>
                    <th>{{ __('No') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Img') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Era') }}</th>
                    <th>{{ __('Franchise') }}</th>
                    <th class="text-center">{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $categories->firstItem() + $loop->index }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            @if ($category->img == null)
                                <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $category->name }}"
                                    width="100">
                            @else
                                <a href="#" data-bs-toggle="modal" data-bs-target=".myModal{{ $category->id }}">
                                    <img class="img img-fluid rounded" src="{{ asset('storage/' . $category->img) }}"
                                        alt="{{ $category->img }}" width="100" loading="lazy">
                                </a>

                                <!-- Modal -->
                                <div class="modal fade myModal{{ $category->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">{{ $category->name }}</h3>
                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="maximize"><i
                                                                    class="fas fa-expand"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <img class="img img-fluid col-12"
                                                            src="{{ asset('storage/' . $category->img) }}"
                                                            alt="{{ $category->img }}">
                                                        <!-- Tombol Download -->
                                                        <a href="{{ asset('storage/' . $category->img) }}"
                                                            download="{{ $category->img }}"
                                                            class="btn btn-success mt-2 col-12">Download
                                                            Gambar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </td>
                        <td>{{ Illuminate\Support\Str::words($category->description ?? '-', 10, '...') }}</td>
                        <td>
                            <span class="badge bg-{{ $category->getEraColor() }}">
                                {{ $category->era->name ?? '-' }}
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-{{ $category->getFranchiseColor() }}">
                                {{ $category->franchise->name ?? '-' }}
                            </span>
                        </td>
                        <td class="manage-row text-center">
                            <button wire:click="edit({{ $category->id }})"
                                class="btn btn-sm btn-warning">Edit</button>
                            <button wire:click="delete({{ $category->id }})"
                                class="btn btn-sm m-1 btn-danger">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">{{ __('No categories available') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $categories->links('vendor.pagination.mobile') }}
    </div>
</div>
