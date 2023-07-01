<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php?p=dashboard&m=dashboard" class="brand-link">
    <img src="../assets-pengunjung/img/Logo_SMAN-1_PB.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">GURU PEMBINA OSIS</span>
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

                <li class="nav-header">Menu</li>
                <li class="nav-item">
                    <a href="index.php?p=lihat-hasil-rapat&m=lihat-hasil-rapat" class="nav-link <?= $p === 'lihat-hasil-rapat' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Lihat Hasil Rapat
                        </p>
                    </a>
                </li>
                
                <li class="nav-item <?= $p === 'lihat-pemasukan' || $p === 'lihat-pengeluaran' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Lihat Keuangan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?p=lihat-pemasukan&m=lihat-pemasukan" class="nav-link <?= $p === 'lihat-pemasukan' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lihat Pemasukan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?p=lihat-pengeluaran&m=lihat-pengeluaran" class="nav-link <?= $p === 'lihat-pengeluaran' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lihat Pengeluaran</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="index.php?p=lihat-arsip-sk&m=lihat-arsip-sk" class="nav-link <?= $p === 'lihat-arsip-sk' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Lihat Arsip SK
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>