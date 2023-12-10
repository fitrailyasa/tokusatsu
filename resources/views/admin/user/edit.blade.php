<div class="modal-content">
    @if (auth()->user()->roles_id == 1)
        <form method="POST" action="{{ route('admin.user.update', $user->id) }}" enctype="multipart/form-data">
    @endif
    @csrf
    @method('PUT')
    <div class="modal-header">
        <h5 class="modal-title" id="modalFormLabel">Edit @yield('title')
        </h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-2">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="name"
                        name="name" id="name" value="{{ $user->name }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-2">
                    <label class="form-label">No HP</label>
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" placeholder="no_hp"
                        name="no_hp" id="no_hp" value="{{ $user->no_hp }}" required>
                    @error('no_hp')
                        <div class="invalid-feedback">{{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="email"
                        name="email" id="email" value="{{ $user->email }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="password" name="password" id="password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Roles</label>
                    <select class="form-select @error('roles_id') is-invalid @enderror" name="roles_id" id="roles_id"
                        required>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ $role->id == $user->roles_id ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('roles_id')
                        <div class="invalid-feedback">{{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>
</div>
