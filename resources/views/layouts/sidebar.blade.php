<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Surdes</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SD</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('dashboard') }}"><i class="fas fa-home"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Profil</li>
            <li class="{{ request()->is('profilDesa') || request()->is('profilDesa/*') ? 'active' : '' }}"><a
                    class="nav-link" href="{{ route('profilDesa.index') }}"><i class="fas fa-fire"></i> <span>Profil
                        Desa</span></a></li>
            <li class="menu-header">User & Master</li>
            <li class="dropdown {{ request()->is('penduduk') || request()->is('penduduk/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i>
                    <span>Data User</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('penduduk') || request()->is('penduduk/*') ? 'active' : '' }}"><a
                            class="nav-link" href="{{ route('penduduk.index') }}">Penduduk</a></li>
                    <li><a class="nav-link" href="">Pengurus</a></li>
                </ul>
            </li>
            <li
                class="dropdown {{ request()->is('waktu-pelayanan') ||
                request()->is('waktu-pelayanan/*') ||
                request()->is('jenis-surat') ||
                request()->is('jenis-surat/*') ||
                request()->is('prosedur') ||
                request()->is('prosedur/*')
                    ? 'active'
                    : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                    <span>Data Master</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('jenis-surat') || request()->is('jenis-surat/*') ? 'active' : '' }}"><a
                            class="nav-link" href="{{ route('jenis-surat.index') }}">Surat</a></li>
                    <li
                        class="{{ request()->is('waktu-pelayanan') || request()->is('waktu-pelayanan/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('waktu-pelayanan.index') }}">Waktu Pelayanan</a>
                    </li>
                    <li class="{{ request()->is('prosedur') || request()->is('prosedur/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('prosedur.index') }}">Prosedur</a>
                    </li>
                </ul>
            </li>
            <li class="menu-header">Layanan</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i>
                    <span>Pengajuan Surat</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">SKEM</a></li>
                    <li><a class="nav-link" href="">SKEL</a></li>
                    <li><a class="nav-link" href="">SKP</a></li>
                    <li><a class="nav-link" href="">SKTM</a></li>
                    <li><a class="nav-link" href="">SKAW</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="#"><i class="fas fa-qrcode"></i> <span>Riwayat Surat</span></a></li>
            <li class="menu-header">Barcode Scan</li>
            <li><a class="nav-link" href="#"><i class="fas fa-qrcode"></i> <span>QR Code</span></a></li>
        </ul>
    </aside>

</div>
