<div class="border-0">
    <div class="">
        <form id="profile-form" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            {{-- PHOTO --}}
            <div class="mb-4 d-flex align-items-center">
                <img src="{{ $user->img ? asset('storage/' . $user->img) : 'https://ui-avatars.com/api/?name=' . $user->name }}"
                    class="rounded-circle border" width="100" height="100" style="object-fit: cover;">
                <div class="ms-4 w-100">
                    <label class="form-label fw-semibold">
                        Photo Profile
                    </label>
                    <input type="file" name="img" class="form-control @error('img') is-invalid @enderror">
                    <small class="text-muted">(Max. 2MB)</small>

                    @error('img')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                {{-- FULLNAME --}}
                <div class="mb-3 col-md-12">
                    <label class="form-label fw-semibold">
                        Fullname<span class="text-danger">*</span>
                    </label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                        class="form-control @error('name') is-invalid @enderror" required>

                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- USERNAME --}}
                <div class="mb-3 col-md-6">
                    <label class="form-label fw-semibold">
                        Username<span class="text-danger">*</span>
                    </label>
                    <input type="text" name="username" placeholder="username"
                        value="{{ old('username', $user->username) }}"
                        class="form-control @error('username') is-invalid @enderror" required>

                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- EMAIL (HIDE/SHOW) --}}
                <div class="mb-3 col-md-6">
                    <label class="form-label fw-semibold">
                        Email<span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <input type="password" id="emailInput" name="email" placeholder="name@mail.com"
                            value="{{ old('email', $user->email) }}"
                            class="form-control @error('email') is-invalid @enderror" required>

                        <button class="btn btn-outline-secondary" type="button"
                            onclick="toggleVisibility('emailInput', this)">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                        <small class="text-warning">
                            Email not verified
                        </small>
                    @endif

                    @error('email')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- PASSWORD (HIDE/SHOW) --}}
                <div class="mb-3 col-md-6">
                    <label class="form-label fw-semibold">
                        New Password (optional)
                    </label>
                    <div class="input-group">
                        <input type="password" id="passwordInput" name="password" placeholder="**********"
                            class="form-control @error('password') is-invalid @enderror">
                        <button class="btn btn-outline-secondary" type="button"
                            onclick="toggleVisibility('passwordInput', this)">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>

                    @error('password')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- PHONE (HIDE/SHOW) --}}
                <div class="mb-3 col-md-6">
                    <label class="form-label fw-semibold">
                        No Handphone
                    </label>
                    <div class="input-group">
                        <input type="password" id="phoneInput" name="no_hp" placeholder="+628xxxxx"
                            value="{{ old('no_hp', $user->no_hp) }}"
                            class="form-control @error('no_hp') is-invalid @enderror">
                        <button class="btn btn-outline-secondary" type="button"
                            onclick="toggleVisibility('phoneInput', this)">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>

                    @error('no_hp')
                        <div class="invalid-feedback d-block">
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
                    <i class="fas fa-sign-out-alt me-1"></i> Logout
                </button>
            </form>

            {{-- SAVE --}}
            <button type="submit" form="profile-form" class="btn btn-primary px-4">
                <i class="fas fa-save me-1"></i> Save
            </button>
        </div>
    </div>
</div>

{{-- SCRIPT SHOW / HIDE --}}
<script>
    function toggleVisibility(inputId, btn) {

        const input = document.getElementById(inputId);
        const icon = btn.querySelector('i');

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>
