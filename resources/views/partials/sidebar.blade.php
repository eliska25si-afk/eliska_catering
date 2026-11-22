<nav class="navbar navbar-expand-lg navbar-dark app-nav sticky-top px-3">
    <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('dashboard') }}">
        <i class="bi bi-cup-hot-fill fs-4"></i> Eliska Catering
    </a>

    @auth
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                   href="{{ route('dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a>
            </li>

            {{-- Menu pengelolaan data: hanya untuk Admin --}}
            @if(auth()->user()->isAdmin())
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('pelanggan.*') ? 'active' : '' }}"
                       href="{{ route('pelanggan.index') }}"><i class="bi bi-people"></i> Pelanggan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('paket.*') ? 'active' : '' }}"
                       href="{{ route('paket.index') }}"><i class="bi bi-box-seam"></i> Paket</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('menu.*') ? 'active' : '' }}"
                       href="{{ route('menu.index') }}"><i class="bi bi-egg-fried"></i> Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('pesanan.*') ? 'active' : '' }}"
                       href="{{ route('pesanan.index') }}"><i class="bi bi-receipt"></i> Pesanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('laporan.*') ? 'active' : '' }}"
                       href="{{ route('laporan.index') }}"><i class="bi bi-bar-chart-line"></i> Laporan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}"
                       href="{{ route('users.index') }}"><i class="bi bi-person-gear"></i> Data User</a>
                </li>
            @endif
        </ul>

        {{-- Nama user + nama role + tombol Logout --}}
        <div class="d-flex align-items-center gap-2 mt-2 mt-lg-0">
            <i class="bi bi-person-circle text-white fs-5"></i>
            <span class="text-white">{{ auth()->user()->name }}</span>
            <span class="badge {{ auth()->user()->isAdmin() ? 'bg-warning text-dark' : 'bg-info text-dark' }}">
                {{ auth()->user()->roleLabel() }}
            </span>
            <form action="{{ route('logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </div>
    </div>
    @endauth
</nav>
