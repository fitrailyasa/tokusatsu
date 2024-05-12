<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link px-3">
        <!-- <img src="{{ asset('assets/favicon/apple-icon-180x180.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-normal text-white">TOKUSATSU</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (Auth::user()->foto_user != null)
                    <img src="{{ asset('assets/profile/' . Auth::user()->foto_user) }}" class="img-circle elevation-2"
                        alt="User Image"
                        style="width: 35px; height: 35px; object-fit: cover; object-position: center; border-radius: 50%;">
                @else
                    <img src="{{ asset('assets/profile/default.png') }}" class="img-circle elevation-2"
                        alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="{{ route('profile.edit') }}" class="d-block text-white">{{ auth()->user()->name }}</a>
            </div>
        </div>

        @include('layouts.admin.menu')
    </div>
    <!-- /.sidebar -->
</aside>
