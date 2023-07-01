<?php
include 'function.php';

$data = showData($conn, "SELECT * FROM pengeluaran");
$total_pengeluaran = showData($conn, "SELECT SUM(nominal) AS Total_Pengeluaran FROM pengeluaran");

?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Lihat Pengeluaran</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?p=dashboard&m=dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Lihat Pengeluaran</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="nav-icon fas fa-book"></i>
                            <b>Total Pengeluaran</b>
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <blockquote class="quote-danger">
                            <p><b><?= "Rp " . number_format($total_pengeluaran[0]['Total_Pengeluaran'], 2, ",", "."); ?></b></p>
                        </blockquote>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Tanggal</th>
                                    <th>Nominal(Rp)</th>
                                    <th>Keterangan</th>
                                    <th>Bukti Kuitansi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data as $d) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no; ?></td>
                                        <td><?= $d['tanggal']; ?></td>
                                        <td><?= "Rp " . number_format($d['nominal'], 2, ",", "."); ?></td>
                                        <td><?= $d['keterangan']; ?></td>
                                        <td>
                                            <img src="../pengurus/images/<?= $d['bukti_kuitansi'] ?>" alt="bukti kuitansi" width="100px">
                                        </td>
                                    <?php
                                }
                                $no++;
                                    ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->