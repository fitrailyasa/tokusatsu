@extends('layouts.admin.app')

@section('title', 'Google Drive')

@section('content')

    <style>
        .list-group-item {
            transition: background .2s ease;
        }

        .list-group-item:hover {
            background: #f8f9fa;
        }

        .toggle-switch {
            position: relative;
            width: 36px;
            height: 18px;
            display: inline-block;
        }

        .toggle-switch input {
            opacity: 0;
        }

        .toggle-slider {
            position: absolute;
            inset: 0;
            background: #ccc;
            border-radius: 50px;
            transition: .3s;
        }

        .toggle-slider:before {
            content: "";
            position: absolute;
            width: 14px;
            height: 14px;
            left: 2px;
            top: 2px;
            background: #fff;
            border-radius: 50%;
            transition: .3s;
        }

        .toggle-switch input:checked+.toggle-slider {
            background: #198754;
        }

        .toggle-switch input:checked+.toggle-slider:before {
            transform: translateX(18px);
        }
    </style>

    <div class="container mb-5">

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('admin.auth') }}" class="text-dark fs-5">
                    <i class="fas fa-arrow-left"></i>
                </a>

                <div>
                    <h5 class="mb-0 fw-semibold">Google Drive</h5>
                    <small class="text-muted">{{ $email }}</small>
                </div>
            </div>

            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('admin.auth.export', $email) }}" class="btn btn-success btn-sm d-flex align-items-center">
                    <i class="fas fa-file-excel me-1"></i> Export
                </a>

                <form action="{{ route('admin.provider.upload', $email) }}" method="POST" enctype="multipart/form-data"
                    class="d-flex align-items-center">
                    @csrf
                    <input type="hidden" name="folder_id" value="{{ $folderId }}">
                    <input type="file" name="file" hidden id="uploadFile" onchange="this.form.submit()">
                    <label for="uploadFile" class="btn btn-primary btn-sm d-flex align-items-center mb-0">
                        <i class="fas fa-plus me-1"></i> Upload
                    </label>
                </form>
            </div>
        </div>

        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb breadcrumb-sm">
                @foreach ($breadcrumbs as $bc)
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.auth.files', [$email, 'folder' => $bc['id']]) }}">
                            {{ $bc['name'] }}
                        </a>
                    </li>
                @endforeach
            </ol>
        </nav>

        @if (count($files) > 0)
            <ul class="list-group shadow-sm rounded">
                @foreach ($files as $f)
                    @php
                        $fileLink = "https://drive.google.com/file/d/{$f->id}/view";
                        $downloadLink = "https://drive.google.com/uc?export=download&id={$f->id}";
                    @endphp

                    <li
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">

                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-2">

                                <span class="file-name fw-medium" data-id="{{ $f->id }}">
                                    @if ($f->is_folder)
                                        <a href="{{ route('admin.auth.files', ['email' => $email, 'folder' => $f->id]) }}">
                                            <i class="fas fa-folder text-warning me-1"></i>{{ $f->name }}
                                        </a>
                                    @else
                                        <a href="{{ $fileLink }}" target="_blank">
                                            <i class="fas fa-file text-secondary me-1"></i>{{ $f->name }}
                                        </a>
                                    @endif
                                </span>

                                <div class="rename-wrapper d-none" data-id="{{ $f->id }}">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control rename-input" value="{{ $f->name }}"
                                            data-id="{{ $f->id }}">
                                        <button class="btn btn-success save-rename" data-id="{{ $f->id }}">
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <button class="btn btn-outline-secondary cancel-rename"
                                            data-id="{{ $f->id }}">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <span class="badge {{ $f->is_public ? 'bg-success' : 'bg-secondary' }}">
                                    <i class="fas {{ $f->is_public ? 'fa-globe' : 'fa-lock' }}"></i>
                                </span>

                                @if (!$f->is_folder)
                                    <a href="{{ $downloadLink }}" class="btn btn-xs btn-primary" title="Download">
                                        <i class="fas fa-download"></i>
                                    </a>
                                @endif
                            </div>

                            <small class="text-muted">
                                {{ isset($f->modifiedTime) ? \Carbon\Carbon::parse($f->modifiedTime)->format('d M Y H:i') : '' }}
                            </small>
                        </div>

                        <div class="btn-group btn-group-sm align-items-center">
                            <button class="btn btn-outline-secondary copy-link" data-link="{{ $fileLink }}">
                                <i class="fas fa-copy"></i>
                            </button>

                            <button class="btn btn-outline-warning edit-name" data-id="{{ $f->id }}">
                                <i class="fas fa-edit"></i>
                            </button>

                            <button class="btn btn-outline-danger delete-file" data-id="{{ $f->id }}"
                                data-name="{{ $f->name }}">
                                <i class="fas fa-trash"></i>
                            </button>

                            <form action="{{ route('admin.provider.toggleStatus', [$email, $f->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <label class="toggle-switch ms-2">
                                    <input type="checkbox" onchange="this.form.submit()"
                                        {{ $f->is_public ? 'checked' : '' }}>
                                    <span class="toggle-slider"></span>
                                </label>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-muted">There are no files in this account.</p>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            document.querySelectorAll('.copy-link').forEach(btn => {
                btn.addEventListener('click', () => {
                    navigator.clipboard.writeText(btn.dataset.link);
                    btn.innerHTML = '<i class="fas fa-check"></i>';
                    setTimeout(() => {
                        btn.innerHTML = '<i class="fas fa-copy"></i>';
                    }, 1500);
                });
            });

            const showRename = id => {
                document.querySelector(`.file-name[data-id="${id}"]`)?.classList.add('d-none');
                document.querySelector(`.rename-wrapper[data-id="${id}"]`)?.classList.remove('d-none');
            };

            const hideRename = id => {
                document.querySelector(`.file-name[data-id="${id}"]`)?.classList.remove('d-none');
                document.querySelector(`.rename-wrapper[data-id="${id}"]`)?.classList.add('d-none');
            };

            const submitRename = id => {
                const input = document.querySelector(`.rename-input[data-id="${id}"]`);
                if (!input) return;

                fetch(`{{ url('/admin/auth/provider') }}/${@json($email)}/files/${id}/rename`, {
                        method: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            name: input.value
                        })
                    })
                    .then(res => res.json())
                    .then(res => {
                        if (res.success) {
                            const nameEl = document.querySelector(`.file-name[data-id="${id}"] a`);
                            if (nameEl) nameEl.textContent = input.value;
                            hideRename(id);
                        }
                    });
            };

            document.querySelectorAll('.edit-name')
                .forEach(btn => btn.addEventListener('click', () => showRename(btn.dataset.id)));

            document.querySelectorAll('.save-rename')
                .forEach(btn => btn.addEventListener('click', () => submitRename(btn.dataset.id)));

            document.querySelectorAll('.cancel-rename')
                .forEach(btn => btn.addEventListener('click', () => hideRename(btn.dataset.id)));

            document.querySelectorAll('.delete-file').forEach(btn => {
                btn.addEventListener('click', () => {
                    const {
                        id,
                        name
                    } = btn.dataset;

                    if (!confirm(`Delete "${name}"?\nThis action cannot be undone.`)) return;

                    fetch(`{{ url('/admin/auth/provider') }}/${@json($email)}/files/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(res => res.json())
                        .then(res => {
                            if (res.success) {
                                btn.closest('.list-group-item')?.remove();
                            } else {
                                alert('Failed to delete file');
                            }
                        })
                        .catch(() => alert('Error deleting file'));
                });
            });

        });
    </script>
@endsection
