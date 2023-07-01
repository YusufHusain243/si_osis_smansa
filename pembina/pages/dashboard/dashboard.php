<?php 
include 'function.php';

$jumlahHasilRapat = showData($conn, "SELECT COUNT(id) AS JumlahHasilRapat FROM hasil_rapat");
$jumlahPemasukan = showData($conn, "SELECT COUNT(id) AS JumlahPemasukan FROM pemasukan");
$jumlahPengeluaran = showData($conn, "SELECT COUNT(id) AS JumlahPengeluaran FROM pengeluaran");
$jumlahArsip = showData($conn, "SELECT COUNT(id) AS JumlahArsip FROM arsip_sk");

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
                        <h3><?= $jumlahHasilRapat[0]['JumlahHasilRapat']; ?></h3>
                        <p>Lihat Hasil Rapat</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-list"></i>
                    </div>
                    <a href="index.php?p=lihat-hasil-rapat&m=lihat-hasil-rapat" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $jumlahPemasukan[0]['JumlahPemasukan']; ?></h3>
                        <p>Lihat Pemasukan</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-copy"></i>
                    </div>
                    <a href="index.php?p=lihat-pemasukan&m=lihat-pemasukan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $jumlahPengeluaran[0]['JumlahPengeluaran']; ?></h3>
                        <p>Lihat Pengeluaran</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-copy"></i>
                    </div>
                    <a href="index.php?p=lihat-pengeluaran&m=lihat-pengeluaran" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $jumlahArsip[0]['JumlahArsip']; ?></h3>
                        <p>Lihat Arsip SK</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-book"></i>
                    </div>
                    <a href="index.php?p=lihat-arsip-sk&m=lihat-arsip-sk" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->