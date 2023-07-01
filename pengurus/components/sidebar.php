<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php?p=dashboard&m=dashboard" class="brand-link">
    <img src="../assets-pengunjung/img/Logo_SMAN-1_PB.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PENGURUS OSIS</span>
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
                    <a href="index.php?p=kelola-hasil-rapat&m=kelola-hasil-rapat" class="nav-link <?= $p === 'kelola-hasil-rapat' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Kelola Hasil Rapat
                        </p>
                    </a>
                </li>
                
                <li class="nav-item <?= $p === 'kelola-pemasukan' || $p === 'kelola-pengeluaran' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Kelola Keuangan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?p=kelola-pemasukan&m=kelola-pemasukan" class="nav-link <?= $p === 'kelola-pemasukan' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelola Pemasukan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?p=kelola-pengeluaran&m=kelola-pengeluaran" class="nav-link <?= $p === 'kelola-pengeluaran' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelola Pengeluaran</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="index.php?p=kelola-arsip-sk&m=kelola-arsip-sk" class="nav-link <?= $p === 'kelola-arsip-sk' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Kelola Arsip SK
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>