<div class="shadow-sm border-0">
    <div class="">
        <form id="profile-form" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-4 d-flex align-items-center">
                <img src="{{ $user->img ? asset('storage/' . $user->img) : 'https://ui-avatars.com/api/?name=' . $user->name }}"
                    class="rounded-circle border" width="100" height="100" style="object-fit: cover;">

                <div class="ms-4 w-100">
                    <label class="form-label fw-semibold">
                        Photo Profile
                    </label>
                    <input type="file" name="img" class="form-control @error('img') is-invalid @enderror">
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
                <div class="mb-3 col-md-12">
                    <label class="form-label fw-semibold">
                        Fullname<span class="text-danger">*</span>
                    </label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                        class="form-control @error('name') is-invalid @enderror" placeholder="fullname" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label fw-semibold">
                        Username<span class="text-danger">*</span>
                    </label>
                    <input type="text" name="username" value="{{ old('username', $user->username) }}"
                        class="form-control @error('username') is-invalid @enderror" placeholder="username" required>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label fw-semibold">
                        Email<span class="text-danger">*</span>
                    </label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                        class="form-control @error('email') is-invalid @enderror" placeholder="username@gmail.com"
                        required>

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
                        New Password (optional)
                    </label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="password">
                    @error('password')
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
                        class="form-control @error('no_hp') is-invalid @enderror" placeholder="08xxxxxxx">
                    @error('no_hp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

        </form>

        <div class="d-flex justify-content-between align-items-center mt-4">

            {{-- LOGOUT --}}
            <form action="{{ route('logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-box-arrow-right me-1"></i> Logout
                </button>
            </form>

            {{-- SAVE --}}
            <button type="submit" form="profile-form" class="btn btn-primary px-4">
                <i class="bi bi-save me-1"></i> Save
            </button>

        </div>

    </div>
</div>
