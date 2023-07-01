<?php 
include 'function.php';

$jumlahSiswa = showData($conn, "SELECT COUNT(username) AS JumlahSiswa FROM akun WHERE role = 'Siswa'");
$jumlahPengurus = showData($conn, "SELECT COUNT(username) AS JumlahPengurus FROM akun WHERE role = 'Pengurus'");
$jumlahPembina = showData($conn, "SELECT COUNT(username) AS JumlahPembina FROM akun WHERE role = 'Pembina'");
$jumlahKandidat = showData($conn, "SELECT COUNT(no_urut) AS JumlahKandidat FROM kandidat");
$jumlahHasilVote = showData($conn, "SELECT COUNT(id) AS JumlahHasilVote FROM hasil_voting");
$jumlahStrukturInti = showData($conn, "SELECT COUNT(id) AS JumlahStrukturInti FROM struktur_inti");
$jumlahDivisi = showData($conn, "SELECT COUNT(id) AS JumlahDivisi FROM anggota_divisi");
$jumlahVisiMisi = showData($conn, "SELECT COUNT(id) AS JumlahVisiMisi FROM visi_misi");
$jumlahGaleri = showData($conn, "SELECT COUNT(id) AS JumlahGaleri FROM galeri");
$jumlahAbout = showData($conn, "SELECT COUNT(id) AS JumlahAbout FROM about");
$jumlahKontak = showData($conn, "SELECT COUNT(id) AS JumlahKontak FROM kontak");
$jumlahEkskul = showData($conn, "SELECT COUNT(id) AS JumlahEkskul FROM ekskul");

?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?p=dashboard&m=dashboard">Dashboard</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $jumlahSiswa[0]['JumlahSiswa']; ?></h3>
                        <p>Kelola User Siswa</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="index.php?p=kelola-siswa&m=kelola-siswa" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $jumlahPengurus[0]['JumlahPengurus']; ?></h3>
                        <p>Kelola User Pengurus OSIS</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="index.php?p=kelola-pengurus&m=kelola-pengurus" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $jumlahPembina[0]['JumlahPembina']; ?></h3>
                        <p>Kelola User Guru Pembina OSIS</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="index.php?p=kelola-pembina&m=kelola-pembina" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $jumlahKandidat[0]['JumlahKandidat']; ?></h3>
                        <p>Kelola Kandidat</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="index.php?p=kelola-kandidat&m=kelola-kandidat" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $jumlahHasilVote[0]['JumlahHasilVote']; ?></h3>
                        <p>Kelola Hasil Voting</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="index.php?p=hasil-voting&m=hasil-voting" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $jumlahStrukturInti[0]['JumlahStrukturInti']; ?></h3>
                        <p>Kelola Struktur Inti OSIS</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="index.php?p=kelola-struktur-inti&m=kelola-struktur-inti" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $jumlahDivisi[0]['JumlahDivisi']; ?></h3>
                        <p>Kelola Divisi OSIS</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="index.php?p=kelola-struktur-divisi&m=kelola-struktur-divisi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $jumlahVisiMisi[0]['JumlahVisiMisi']; ?></h3>
                        <p>Kelola Visi Misi</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-edit"></i>
                    </div>
                    <a href="index.php?p=kelola-visi-misi&m=kelola-visi-misi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $jumlahGaleri[0]['JumlahGaleri']; ?></h3>
                        <p>Kelola Galeri</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-image"></i>
                    </div>
                    <a href="index.php?p=kelola-galeri&m=kelola-galeri" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $jumlahAbout[0]['JumlahAbout']; ?></h3>
                        <p>Kelola About</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-book"></i>
                    </div>
                    <a href="index.php?p=kelola-about&m=kelola-about" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $jumlahKontak[0]['JumlahKontak']; ?></h3>
                        <p>Kelola Kontak</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon far fa-envelope"></i>
                    </div>
                    <a href="index.php?p=kelola-kontak&m=kelola-kontak" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $jumlahEkskul[0]['JumlahEkskul']; ?></h3>
                        <p>Kelola Ekskul</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-edit"></i>
                    </div>
                    <a href="index.php?p=kelola-ekskul&m=kelola-ekskul" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->