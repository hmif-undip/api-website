<li class="sidebar-title">Menu</li>

<li class="sidebar-item {{ request()->is('dashboard*') ? 'active' : '' }}">
    <a href="{{ url('dashboard') }}" class='sidebar-link'>
        <i class="bi bi-grid-fill"></i>
        <span>Dashboard</span>
    </a>
</li>

<li class="sidebar-item {{ request()->is('users*') ? 'active' : '' }}">
    <a href="{{ url('users') }}" class='sidebar-link'>
        <i class="bi bi-people-fill"></i>
        <span>Users</span>
    </a>
</li>

{{-- Logout --}}
    <hr>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <li class="sidebar-item">
            <a class="sidebar-link" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">
                <i class="bi bi-box-arrow-left"></i>
                <span>Logout</span>
            </a>
        </li>
    </form>
{{-- /Logout --}}

{{-- <li
    class="sidebar-item active has-sub">
    <a href="#" class='sidebar-link'>
        <i class="bi bi-grid-1x2-fill"></i>
        <span>Layouts</span>
    </a>
    <ul class="submenu active">
        <li class="submenu-item ">
            <a href="layout-default.html">Default Layout</a>
        </li>
        <li class="submenu-item ">
            <a href="layout-vertical-1-column.html">1 Column</a>
        </li>
        <li class="submenu-item active">
            <a href="layout-vertical-navbar.html">Vertical Navbar</a>
        </li>
        <li class="submenu-item ">
            <a href="layout-rtl.html">RTL Layout</a>
        </li>
        <li class="submenu-item ">
            <a href="layout-horizontal.html">Horizontal Menu</a>
        </li>
    </ul>
</li> --}}
