<!-- Sidebar Menu -->
@if (auth()->user()->roles_id == 1)
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link text-white @yield('activeDashboard')">
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
                <a href="#" class="nav-link text-white @yield('dataUser')">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        User
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.user.index') }}" class="nav-link text-white @yield('tableUser')">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Table</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.user.create') }}" class="nav-link text-white @yield('createUser')">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create Data</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white @yield('datadata')">
                    <i class="nav-icon fas fa-database"></i>
                    <p>
                        Data Kamen Rider
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.data.index') }}" class="nav-link text-white @yield('tabledata')">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Table</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.data.create') }}" class="nav-link text-white @yield('createdata')">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create Data</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white @yield('dataCategory')">
                    <i class="nav-icon fas fa-tag"></i>
                    <p>
                        Category Kamen Rider
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.category.index') }}" class="nav-link text-white @yield('tableCategory')">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Table</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.category.create') }}" class="nav-link text-white @yield('createCategory')">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create Data</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>
                    @csrf
                </form>
                <a href="#" class="nav-link text-white @yield('')"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-sign-out"></i>
                    <p>
                        Logout
                    </p>
                </a>
            </li>
        </ul>
    </nav>
@endif

<!-- /.sidebar-menu -->
