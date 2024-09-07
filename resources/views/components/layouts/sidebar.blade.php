<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link border-bottom">
        <img src="{{ asset('logo.png') }}" alt="Logo"
            class="brand-image img-circle elevation-3 bg-white" style="opacity: .8">
        <span class="brand-text font-weight-bold text-white">TOKUSATSU</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @if (auth()->user()->role == 'admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboards') }}"
                            class="nav-link text-white {{ Request::routeIs('admin.dashboards') ? 'aktif' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('beranda') }}" class="nav-link text-white">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Home
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.user') }}"
                            class="nav-link text-white {{ Request::routeIs('admin.user') ? 'aktif' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                User
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.data') }}"
                            class="nav-link text-white {{ Request::routeIs('admin.data') ? 'aktif' : '' }}">
                            <i class="nav-icon fas fa-database"></i>
                            <p>
                                Data
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.tag') }}"
                            class="nav-link text-white {{ Request::routeIs('admin.tag') ? 'aktif' : '' }}">
                            <i class="nav-icon fas fa-tag"></i>
                            <p>
                                Tag
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.category') }}"
                            class="nav-link text-white {{ Request::routeIs('admin.category') ? 'aktif' : '' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                Category
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.franchise') }}"
                            class="nav-link text-white {{ Request::routeIs('admin.franchise') ? 'aktif' : '' }}">
                            <i class="nav-icon fas fa-tv"></i>
                            <p>
                                Franchise
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.era') }}"
                            class="nav-link text-white {{ Request::routeIs('admin.era') ? 'aktif' : '' }}">
                            <i class="nav-icon fas fa-flag"></i>
                            <p>
                                Era
                            </p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>
                        @csrf
                    </form>
                    <a href="#" class="nav-link text-white @yield('')"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
