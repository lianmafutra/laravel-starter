<aside class="main-sidebar sidebar-dark-primary ">

    <a href="" class="brand-link">
        <img src="{{ asset('img/' . Cache::store('styles')->get('header_logo', 'img/logo_laravel.jpeg')) }}"
            alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ Cache::store('styles')->get('app_name', 'starter_app') }}</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-legacy  nav-compact"
                data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @php $i = 1; @endphp
                @canany(['read user', 'read role', 'read permission'])
                    <li class="nav-header ml-2">App Settings</li>
                @endcanany
                @role('superadmin')
                    <li
                        class="nav-item menu-is-opening {{ request()->is(['admin/master-user*', 'admin/user', 'admin/role*', 'admin/permission*', 'admin/permission']) ? 'menu-open' : '' }} ">
                        <a href=""
                            class="nav-link {{ request()->is(['admin/user', 'admin/master-user*', 'admin/permission-group', 'admin/role*', 'admin/permission']) ? 'active' : '' }}">
                            <i class="fas fa-cog nav-icon"></i>
                            <p>Role Permission</p>
                            <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('read user')
                                <li class="nav-item">
                                    <a href="{{ route('master-user.index') }}"
                                        class="nav-link {{ request()->routeIs('master-user.*') ? 'active' : '' }}">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Master User</p>
                                    </a>
                                </li>
                            @endcan
                            @can('read role')
                                <li class="nav-item">
                                    <a href="{{ route('role.index') }}"
                                        class="nav-link {{ request()->routeIs('role.*') ? 'active' : '' }}">
                                        <i class="fas fa-user-cog nav-icon"></i>
                                        <p>Role</p>
                                    </a>
                                </li>
                            @endcan
                            @can('read permission')
                                <li class="nav-item">
                                    <a href="{{ route('permission-group.index') }}"
                                        class="nav-link {{ request()->routeIs(['permission-group.*']) ? 'active' : '' }}">
                                        <i class="fas fa-layer-group nav-icon"></i>
                                        <p>
                                            Permission Group</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('permission.index') }}"
                                        class="nav-link {{ request()->routeIs(['permission.*']) ? 'active' : '' }}">
                                        <i class="fas fa-unlock nav-icon"></i>
                                        <p>
                                            Permission</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('read setting')

                    <li class="nav-item">
                        <a href="{{ route('settings.index') }}"
                            class="nav-link {{ request()->routeIs(['settings.*']) ? 'active' : '' }}">
                            <i class="fas fa-palette nav-icon"></i>
                            <p>Settings</p>
                        </a>
                    </li>
                @endcan
                <li class="nav-header ml-2">Menu</li>
                <li class="nav-item ">
                    <a href="" class="nav-link">
                        <i class="fas fa-search nav-icon"></i>
                        <p>Sample Data</p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link ">
                                <div class="d-flex flex-row">
                                    <i class="fas fa-long-arrow-alt-right nav-icon"></i>
                                    <p>Pembinaan (Consulting)
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link ">
                                <div class="d-flex flex-row">
                                    <i class="fas fa-long-arrow-alt-right nav-icon"></i>
                                    <p>Pemeriksaan (Assurance)
                                    </p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                  <a href="{{ route('user.show', auth()->user()->id) }}"
                  class="nav-link {{ request()->routeIs(['user.*']) ? 'active' : '' }}">
                        <i class="fas fa-user-alt nav-icon"></i>
                        <p>Profil</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
