<x-admin-layout>

    <x-slot name="title">
        Edit Profile
    </x-slot>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @include('components.alert')
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="mb-4 d-flex align-items-center">
                                <img src="{{ $user->img ? asset('storage/' . $user->img) : 'https://ui-avatars.com/api/?name=' . $user->name }}"
                                    class="rounded-circle border" width="100" height="100"
                                    style="object-fit: cover;">

                                <div class="ms-4 w-100">
                                    <label class="form-label fw-semibold">
                                        Photo Profile
                                    </label>
                                    <input type="file" name="img"
                                        class="form-control @error('img') is-invalid @enderror">
                                    <small class="text-muted">
                                        (Max. 2MB)
                                    </small>
                                    @error('img')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label fw-semibold">
                                        Fullname
                                    </label>
                                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                        class="form-control @error('name') is-invalid @enderror" required>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label fw-semibold">
                                        Username
                                    </label>
                                    <input type="text" name="username" value="{{ old('username', $user->username) }}"
                                        class="form-control @error('username') is-invalid @enderror" required>
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label fw-semibold">
                                        Email
                                    </label>
                                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                        class="form-control @error('email') is-invalid @enderror" required>

                                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                        <small class="text-warning">
                                            Email not verified
                                        </small>
                                    @endif

                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label fw-semibold">
                                        No Handphone
                                    </label>
                                    <input type="text" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}"
                                        class="form-control @error('no_hp') is-invalid @enderror">
                                    @error('no_hp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Button --}}
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="bi bi-save me-1"></i> Save
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
