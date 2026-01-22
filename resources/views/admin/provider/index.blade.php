@extends('layouts.admin.app')

@section('title', 'Auth')

@section('content')
    <div class="container mb-5">
        @can('auth:provider')
            <div class="mb-3">
                <a href="{{ route('admin.auth.provider.login') }}" class="btn btn-success">
                    <i class="fas fa-user-plus me-2"></i> Add Account
                </a>
            </div>
        @endcan

        @include('components.alert')

        @if (isset($accounts) && count($accounts) > 0)
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white fw-bold">Account connected</div>
                <ul class="list-group list-group-flush">
                    @foreach ($accounts as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>
                                <a href="{{ route('admin.auth.provider.files', $item->email) }}">
                                    <i class="fas fa-user-circle me-2 text-secondary"></i>{{ $item->email }}
                                </a>
                            </span>
                            <div class="d-flex align-items-center gap-2">
                                @can('edit:provider')
                                    <form class="d-flex align-items-center m-0" class=""
                                        action="{{ route('admin.auth.provider.accountStatus', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <label class="toggle-switch">
                                            <input type="checkbox" onchange="this.form.submit()"
                                                {{ $item->status == 1 ? 'checked' : '' }}>
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </form>
                                @endcan
                                @can('view:provider')
                                    <a href="{{ route('admin.auth.provider.files', $item->email) }}"
                                        class="btn btn-sm btn-primary">
                                        <i class="fas fa-folder-open me-2"></i>
                                    </a>
                                @endcan
                                @can('delete:provider')
                                    <a href="{{ route('admin.auth.provider.logout', $item->email) }}"
                                        class="btn btn-sm btn-danger">
                                        <i class="fas fa-sign-out-alt me-2"></i>
                                    </a>
                                @endcan
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <p class="text-center text-muted mt-4">There are no Google Drive accounts connected yet.</p>
        @endif
    </div>
@endsection
