@extends('layouts.admin.app')

@section('title', 'Tambah User')

@section('tableUser', 'active')

@section('backlink')
    @if (auth()->user()->roles_id == 1)
        <a href="{{ route('admin.user.index') }}"><i class="fa small pr-1 fa-arrow-left text-dark"></i></a>
    @endif
@endsection

@section('content')

    <!--create user-->
    <div class="col-lg-12 col-lg-12 form-wrapper" id="create-user">
        <div class="card">
            <div class="card-body">
                @if (auth()->user()->roles_id == 1)
                    <form method="POST" action="{{ route('admin.user.store') }}" enctype='multipart/form-data'>
                @endif
                @csrf
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="name"
                            name="name" id="name" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="email"
                            name="email" id="email" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">No HP</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" placeholder="no_hp"
                            name="no_hp" id="no_hp" required>
                        @error('no_hp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="password" name="password" id="password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Role</label>
                    <div class="col-sm-9">
                        <select class="col-sm-12 col-form-label rounded-2" name="roles_id" id="roles_id" required>
                            <option selected value="1">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--./create user-->

@endsection
