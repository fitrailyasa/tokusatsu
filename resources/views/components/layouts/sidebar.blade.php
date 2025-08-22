<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link border-bottom">
        <img src="{{ asset('storage/logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3 bg-white"
            style="opacity: .8">
        <span class="brand-text font-weight-bold text-white">{{ strtoupper(config('app.name')) }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <x-sidebar-link route="admin.dashboards" icon="tachometer-alt" label="Dashboard" />
                <x-sidebar-link route="beranda" icon="home" label="Home" />

                <x-sidebar-link route="admin.user" icon="users" label="User" can="view:user" />
                <x-sidebar-link route="admin.data" icon="database" label="Data" can="view:data" />
                <x-sidebar-link route="admin.tag" icon="tag" label="Tag" can="view:tag" />
                <x-sidebar-link route="admin.category" icon="list-alt" label="Category" can="view:category" />
                <x-sidebar-link route="admin.franchise" icon="tv" label="Franchise" can="view:franchise" />
                <x-sidebar-link route="admin.era" icon="flag" label="Era" can="view:era" />

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
