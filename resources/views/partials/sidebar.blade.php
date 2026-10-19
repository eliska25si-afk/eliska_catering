<nav class="navbar navbar-expand navbar-dark bg-dark px-3">
    <span class="navbar-brand">Eliska Catering</span>

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('pelanggan.*') ? 'active' : '' }}"
               href="{{ route('pelanggan.index') }}">Pelanggan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('paket.*') ? 'active' : '' }}"
               href="{{ route('paket.index') }}">Paket</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('menu.*') ? 'active' : '' }}"
               href="{{ route('menu.index') }}">Menu</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}"
               href="{{ route('users.index') }}">Data User</a>
        </li>
    </ul>
</nav>