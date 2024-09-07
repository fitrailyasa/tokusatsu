@section('title', 'User')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h3 class="card-title">Kelola Tabel {{ $title ?? '' }}</h3>
            <div class="d-flex justify-content-end mb-3">
                @include('admin.user.create')
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
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-2">
                        <label class="form-label">{{ __('Name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            placeholder="name" wire:model="name" id="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-2">
                        <label class="form-label">{{ __('No HP') }}</label>
                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                            placeholder="no_hp" wire:model="no_hp" id="no_hp" value="{{ old('no_hp') }}">
                        @error('no_hp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Email') }}</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="email" wire:model="email" id="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">{{ $isUpdate ? __('New Password') : __('Password') }}</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="{{ $isUpdate ? 'Leave blank to keep current password' : 'password' }}" 
                            wire:model="password" id="password" {{ $isUpdate ? '' : 'required' }}>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Roles') }}</label>
                        <select class="form-select @error('role') is-invalid @enderror" wire:model="role" id="role"
                            required>
                            <option value="" disabled selected>{{ __('Select Role') }}</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role['id'] }}" @if(old('role') == $role['id'] || $role['id'] == $role) selected @endif>{{ $role['name'] }}</option>
                            @endforeach
                        </select>
                        @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Status') }}</label>
                        <select class="form-select @error('status') is-invalid @enderror" wire:model="status"
                            id="status" required>
                            <option value="" disabled selected>{{ __('Select Status') }}</option>
                            <option value="aktif" @if(old('status') == 'aktif' || $status == 'aktif') selected @endif>{{ __('Aktif') }}</option>
                            <option value="tidak aktif" @if(old('status') == 'tidak aktif' || $status == 'tidak aktif') selected @endif>{{ __('Tidak Aktif') }}</option>
                        </select>
                        @error('status')
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
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Role') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $users->firstItem() + $loop->index  }}</td>
                        <td>{{ $user->name ?? '-' }}</td>
                        <td>{{ $user->email ?? '-' }}</td>
                        <td>
                            @if ($user->role == 'admin')
                                <span class="badge badge-primary">{{ $user->role }}</span>
                            @else
                                <span class="badge badge-secondary">{{ $user->role }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($user->status == 'aktif')
                                <span class="badge badge-success">{{ $user->status }}</span>
                            @else
                                <span class="badge badge-danger">{{ $user->status }}</span>
                            @endif
                        </td>
                        <td>
                            <button wire:click="edit({{ $user->id }})" class="btn btn-sm btn-warning">Edit</button>
                            <button wire:click="delete({{ $user->id }})" class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">{{ __('No users available') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $users->links() }}
    </div>
</div>
