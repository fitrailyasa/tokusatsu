@section('title', 'Data')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h3 class="card-title">Table @yield('title')</h3>
            <div class="d-flex justify-content-end mb-3">
                @include('admin.data.create')
                @include('admin.data.excel.import')
                @include('admin.data.excel.export')
                {{-- @include('admin.data.pdf.export') --}}
                @include('admin.data.softDeleteAll')
                @include('admin.data.restoreAll')
            </div>
        </div>
        @include('components.alert')
        @include('components.search')

        <form wire:submit.prevent="{{ $isUpdate ? 'update' : 'store' }}">
            <div class="row border-bottom">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Name') }}<span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            placeholder="name" wire:model="name" id="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Images') }}</label>
                        <input id="image-input" accept="image/*" type="file"
                            class="form-control @error('img') is-invalid @enderror" placeholder="img" wire:model="img"
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
                        <label class="form-label">{{ __('Category') }}</label>
                        <select class="form-select @error('category_id') is-invalid @enderror" wire:model="category_id"
                            id="category_id" required>
                            <option selected disabled>{{ __('Select Category') }}</option>
                            @foreach ($groupedCategories as $franchiseName => $categoriesGroup)
                                <optgroup label="{{ $franchiseName }}">
                                    @foreach ($categoriesGroup as $category)
                                        <option value="{{ $category->id }}" @selected($category->id == old('category_id', $category_id))>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="form-group" id="tags">
                    <label for="tag">{{ __('Tag') }}</label>
                    <div class="tags-container">
                        @foreach ($tags as $tag)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model="tags[]"
                                    value="{{ old('tags[]', $tag->id) }}" id="tag{{ $tag->id }}">
                                <label class="form-check-label" for="tag{{ $tag->id }}">
                                    {{ $tag->name }}
                                </label>
                            </div>
                        @endforeach
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
                    <th>{{ __('Category') }}</th>
                    <th>{{ __('Images') }}</th>
                    <th>{{ __('Tags') }}</th>
                    <th class="text-center">{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($datas as $data)
                    <tr>
                        <td>{{ $datas->firstItem() + $loop->index }}</td>
                        <td>{{ $data->name }}</td>
                        <td>
                            <span class="badge bg-{{ $data->getCategoryColor() }}">
                                {{ $data->category->name ?? '-' }}
                            </span>
                        </td>
                        <td>
                            @if ($data->img == null)
                                <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $data->name }}"
                                    width="100">
                            @else
                                <a href="#" data-bs-toggle="modal" data-bs-target=".myModal{{ $data->id }}">
                                    <img class="img img-fluid rounded" src="{{ asset('storage/' . $data->img) }}"
                                        alt="{{ $data->img }}" width="100" loading="lazy">
                                </a>

                                <!-- Modal -->
                                <div class="modal fade myModal{{ $data->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">{{ $data->name }}</h3>
                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="maximize"><i
                                                                    class="fas fa-expand"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <img class="img img-fluid col-12"
                                                            src="{{ asset('storage/' . $data->img) }}"
                                                            alt="{{ $data->img }}">
                                                        <!-- Tombol Download -->
                                                        <a href="{{ asset('storage/' . $data->img) }}"
                                                            download="{{ $data->img }}"
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
                        {{-- Json Data Tags --}}
                        <td>
                            @php
                                $tagNames = $data->tags->pluck('name')->toArray();
                                $tagsString = implode(', ', $tagNames);
                                $decodedTags = explode(', ', $tagsString);
                            @endphp

                            @foreach ($decodedTags as $tag)
                                <span class="badge badge-primary">{{ $tag }}</span>
                            @endforeach
                        </td>
                        <td class="manage-row text-center">
                            <button wire:click="edit({{ $data->id }})" class="btn btn-sm btn-warning">Edit</button>
                            <button wire:click="delete({{ $data->id }})"
                                class="btn btn-sm m-1 btn-danger">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">{{ __('No datas available') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $datas->links() }}
    </div>
</div>
