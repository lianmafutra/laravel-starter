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

                @foreach ($menu as $item)
                    @if ($item['type'] == 'header')
                        <li class="nav-header ml-2">{{ $item['title'] }}</li>
                    @elseif ($item['type'] == 'menu')
                        <li class="nav-item">
                            <a href="{{ $item['url'] }}"
                                class="nav-link {{ request()->routeIs($item['active']) ? 'active' : '' }}">
                                <i class="nav-icon {{ $item['icon'] }}"></i>
                                <p>{{ $item['title'] }}</p>
                            </a>
                        </li>
                    @elseif ($item['type'] == 'tree')
                        <li
                            class="nav-item menu-is-opening  {{ request()->routeIs($item['active']) ? 'menu-open' : '' }}">
                            <a href="" class="nav-link {{ request()->routeIs($item['active']) ? 'active' : '' }}">
                                <i class="fas fa-cog nav-icon"></i>
                                <p>{{ $item['title'] }}</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                @foreach ( $item['items'] as $menu)
                                    <li class="nav-item">
                                        <a href="{{ $menu['url'] }}"
                                            class="nav-link {{ request()->routeIs($menu['active']) ? 'active' : '' }}">
                                            <i class="nav-icon {{ $menu['icon'] }}"></i>
                                            <p>{{ $menu['title'] }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            </ul>
        </nav>
    </div>
</aside>
