<?php
include 'function.php';

$data = showData($conn, "SELECT * FROM pemasukan");
$total_pemasukan = showData($conn, "SELECT SUM(nominal) AS Total_Pemasukan FROM pemasukan");
$total_pengeluaran = showData($conn, "SELECT SUM(nominal) AS Total_Pengeluaran FROM pengeluaran");
$total_saldo_akhir = ($total_pemasukan[0]['Total_Pemasukan'] - $total_pengeluaran[0]['Total_Pengeluaran']);

?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Lihat Pemasukan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?p=dashboard&m=dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Lihat Pemasukan</li>
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
                            <b>Total Pemasukan</b>
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <blockquote class="quote-info">
                            <p><b><?= "Rp " . number_format($total_pemasukan[0]['Total_Pemasukan'], 2, ",", "."); ?></b></p>
                        </blockquote>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- ./col -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="nav-icon fas fa-book"></i>
                            <b>Total Saldo Akhir</b>
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body clearfix">
                        <blockquote class="quote-warning">
                            <p><b><?= "Rp " . number_format($total_saldo_akhir, 2, ",", "."); ?></b></p>
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
                                    <th>Sumber Dana</th>
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
                                        <td><?= $d['sumber_dana']; ?></td>
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