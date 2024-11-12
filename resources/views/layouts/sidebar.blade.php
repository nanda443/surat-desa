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
            <li><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Profil</li>
            <li><a class="nav-link" href=""><i class="fas fa-fire"></i> <span>Profil
                        Desa</span></a></li>
            <li class="menu-header">User & Master</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i>
                    <span>Data User</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('penduduk.index') }}">Penduduk</a></li>
                    <li><a class="nav-link" href="">Pengurus</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                    <span>Data Master</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">Surat</a></li>
                    <li><a class="nav-link" href="">Waktu Pelayanan</a></li>
                    <li><a class="nav-link" href="">Prosedur</a></li>
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
