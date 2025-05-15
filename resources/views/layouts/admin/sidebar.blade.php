<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link border-bottom">
        <img src="{{ asset('storage/logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3 bg-white"
            style="opacity: .8">
        <span class="brand-text font-weight-bold text-white">TOKUSATSU</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link text-white {{ Request::routeIs('admin.dashboard') ? 'aktif' : '' }}">
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

                @can('view-user')
                    <li class="nav-item">
                        <a href="{{ route('admin.user.index') }}"
                            class="nav-link text-white {{ Request::routeIs('admin.user.index') ? 'aktif' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>User</p>
                        </a>
                    </li>
                @endcan

                @can('view-role')
                <li class="nav-item">
                    <a href="{{ route('admin.role.index') }}"
                        class="nav-link text-white {{ Request::routeIs('admin.role.index') ? 'aktif' : '' }}">
                        <i class="nav-icon fas fa-user-tag"></i>
                        <p>
                            Role
                        </p>
                    </a>
                </li>
                @endcan

                @can('view-data')
                <li class="nav-item">
                    <a href="{{ route('admin.data.index') }}"
                        class="nav-link text-white {{ Request::routeIs('admin.data.index') ? 'aktif' : '' }}">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Data
                        </p>
                    </a>
                </li>
                @endcan

                @can('view-tag')
                <li class="nav-item">
                    <a href="{{ route('admin.tag.index') }}"
                        class="nav-link text-white {{ Request::routeIs('admin.tag.index') ? 'aktif' : '' }}">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>
                            Tag
                        </p>
                    </a>
                </li>
                @endcan

                @can('view-category')
                <li class="nav-item">
                    <a href="{{ route('admin.category.index') }}"
                        class="nav-link text-white {{ Request::routeIs('admin.category.index') ? 'aktif' : '' }}">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
                @endcan

                @can('view-franchise')
                <li class="nav-item">
                    <a href="{{ route('admin.franchise.index') }}"
                        class="nav-link text-white {{ Request::routeIs('admin.franchise.index') ? 'aktif' : '' }}">
                        <i class="nav-icon fas fa-tv"></i>
                        <p>
                            Franchise
                        </p>
                    </a>
                </li>
                @endcan

                @can('view-era')
                <li class="nav-item">
                    <a href="{{ route('admin.era.index') }}"
                        class="nav-link text-white {{ Request::routeIs('admin.era.index') ? 'aktif' : '' }}">
                        <i class="nav-icon fas fa-flag"></i>
                        <p>
                            Era
                        </p>
                    </a>
                </li>
                @endcan

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
