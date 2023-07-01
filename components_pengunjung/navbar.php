<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

        <div class="logo">
            <h1 class="text-light"><a href="index.php"><span>OSIS SMANSA</span></a></h1>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#about">Tentang Kami</a></li>
                <li><a href="#visi-misi">Visi dan Misi</a></li>
                <li><a href="#struktur">Struktur Organisasi</a></li>
                <li><a href="#galeri">Galeri</a></li>
                <li><a href="#kontak">Kontak</a></li>
                <li class="dropdown"><a href="#"><span>Ekstrakurikuler Lainnya</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <?php
                        foreach ($ekskul as $e) {
                        ?>
                            <li><a href="ekskul.php?slug=<?= $e['slug'] ?>"><?= $e['nama'] ?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>
                <li><a href="login.php">Login</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->