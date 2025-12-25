<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link border-bottom">
        <img src="{{ asset('logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3 bg-white"
            style="opacity: .8">
        <span class="brand-text font-weight-bold text-white">{{ strtoupper(config('app.name')) }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <x-sidebar-link route="admin.dashboard" icon="tachometer-alt" label="Dashboard" />
                <x-sidebar-link route="admin.user.index" icon="users" label="User" can="view:user" />
                <x-sidebar-link route="admin.role.index" icon="key" label="Role" can="view:role" />
                <x-sidebar-link route="admin.data.index" icon="database" label="Data" can="view:data" />
                <x-sidebar-link route="admin.video.index" icon="video" label="Video" can="view:video" />
                <x-sidebar-link route="admin.tag.index" icon="tag" label="Tag" can="view:tag" />
                <x-sidebar-link route="admin.category.index" icon="list-alt" label="Category" can="view:category" />
                <x-sidebar-link route="admin.era.index" icon="flag" label="Era" can="view:era" />
                <x-sidebar-link route="admin.franchise.index" icon="tv" label="Franchise" can="view:franchise" />
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>
                        @csrf
                    </form>
                    <a href="#" class="nav-link text-white"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
