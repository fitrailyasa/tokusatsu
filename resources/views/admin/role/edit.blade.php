<!-- Button to open modal -->
<button role="button" class="btn btn-sm m-1 btn-warning" data-bs-toggle="modal"
    data-bs-target=".formEdit{{ $role->id }}"><i class="fas fa-edit"></i><span class="d-none d-sm-inline">
        {{ __('Edit') }}</span></button>

<!-- Modal -->
<div class="modal fade formEdit{{ $role->id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.role.update', $role->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormLabel">{{ __('Edit Data') }}
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-left">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Name') }}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="name" name="name" id="name"
                                    value="{{ old('name', $role->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Permissions') }}</label>
                                <div class="row">
                                    @foreach ($permissions as $permission)
                                        <div class="col-sm-6 mb-2">
                                            <div class="border rounded px-3 py-2 d-flex align-items-center gap-2">
                                                <input class="form-check-input me-2" type="checkbox"
                                                    name="permissions[]" value="{{ $permission->id }}"
                                                    id="edit-perm-{{ $role->id }}-{{ $permission->id }}"
                                                    {{ $role->permissions->contains('id', $permission->id) ? 'checked' : '' }}>
                                                <label class="form-check-label flex-grow-1"
                                                    for="edit-perm-{{ $role->id }}-{{ $permission->id }}">
                                                    {{ $permission->name }}
                                                </label>
                                                <span
                                                    class="badge {{ $permission->badgeClass }}">{{ $permission->type }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @error('permissions')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <x-button.close />
                    <x-button.save />
                </div>
            </form>
        </div>
    </div>
</div>
