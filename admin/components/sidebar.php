<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php?p=dashboard&m=dashboard" class="brand-link">
        <img src="../assets-pengunjung/img/Logo_SMAN-1_PB.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ADMIN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="index.php?p=dashboard&m=dashboard" class="nav-link <?= $p === 'dashboard' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-header">Menu Kelola Users</li>
                <li class="nav-item <?= $p === 'kelola-daftar-pemilih' || $p === 'kelola-pengurus' || $p === 'kelola-pembina' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Kelola Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?p=kelola-daftar-pemilih&m=kelola-daftar-pemilih" class="nav-link <?= $p === 'kelola-daftar-pemilih' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daftar Pemilih</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?p=kelola-pengurus&m=kelola-pengurus" class="nav-link <?= $p === 'kelola-pengurus' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengurus OSIS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?p=kelola-pembina&m=kelola-pembina" class="nav-link <?= $p === 'kelola-pembina' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Guru Pembina OSIS</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">Menu Kelola Voting</li>
                <li class="nav-item <?= $p === 'kelola-kandidat' || $p === 'hasil-voting' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Kelola Voting
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?p=kelola-kandidat&m=kelola-kandidat" class="nav-link <?= $p === 'kelola-kandidat' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelola Kandidat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?p=hasil-voting&m=hasil-voting" class="nav-link <?= $p === 'hasil-voting' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hasil Voting</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">Menu Kelola Profil</li>
                <li class="nav-item <?= $p === 'kelola-struktur-inti' || $p === 'kelola-struktur-divisi' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Kelola Struktur OSIS
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?p=kelola-struktur-inti&m=kelola-struktur-inti" class="nav-link <?= $p === 'kelola-struktur-inti' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Struktur Inti</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?p=kelola-struktur-divisi&m=kelola-struktur-divisi" class="nav-link <?= $p === 'kelola-struktur-divisi' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Divisi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="index.php?p=kelola-visi-misi&m=kelola-visi-misi" class="nav-link <?= $p === 'kelola-visi-misi' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Kelola Visi dan Misi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?p=kelola-galeri&m=kelola-galeri" class="nav-link <?= $p === 'kelola-galeri' ? 'active' : '' ?>">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Kelola Galeri
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?p=kelola-about&m=kelola-about" class="nav-link <?= $p === 'kelola-about' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Kelola About
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?p=kelola-kontak&m=kelola-kontak" class="nav-link <?= $p === 'kelola-kontak' ? 'active' : '' ?>">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Kelola Kontak
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?p=kelola-ekskul&m=kelola-ekskul" class="nav-link <?= $p === 'kelola-ekskul' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Kelola Ekskul
                        </p>
                    </a>
                </li>
                

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>