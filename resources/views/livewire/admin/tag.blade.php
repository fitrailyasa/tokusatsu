@section('title', 'Tag')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h3 class="card-title">Kelola Tabel {{ $title ?? '' }}</h3>
            <div class="d-flex justify-content-end mb-3">
                @include('admin.tag.create')
                @include('admin.tag.import')
                @include('admin.tag.export')
                @include('admin.tag.softDeleteAll')
                @include('admin.tag.restoreAll')
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('alert'))
            <div class="alert alert-success" role="alert">
                {{ session('alert') }}
            </div>
        @endif
        @include('components.layouts.search')

        <form wire:submit.prevent="{{ $isUpdate ? 'update' : 'store' }}">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" class="form-control" wire:model="name">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">{{ $isUpdate ? 'Update' : 'Create' }}</button>
        </form>

        <table class="table table-bordered table-striped mt-3">
            <thead>
                <tr>
                    <th>{{ __('No') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tags as $tag)
                    <tr>
                        <td>{{ $tags->firstItem() + $loop->index }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>
                            <button wire:click="edit({{ $tag->id }})" class="btn btn-sm btn-warning">Edit</button>
                            <button wire:click="delete({{ $tag->id }})"
                                class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">{{ __('No tags available') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $tags->links() }}
    </div>
</div>