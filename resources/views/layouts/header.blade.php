<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                @if (auth()->user()->photo_path)
                    <img alt="image" src="{{ asset('storage/' . auth()->user()->photo_path) }}"
                        class="rounded-circle mr-1" style="width: 30px; height: 30px;">
                @else
                    <img alt="image" src="{{ asset('template/dist/assets/img/avatar/avatar-1.png') }}"
                        class="rounded-circle mr-1">
                @endif
                <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->name ?? 'Guest' }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ auth()->user()->role == 'admin' ? route('admin.show', auth()->user()->id) : route('penduduk.profil') }}"
                    class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profil
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
