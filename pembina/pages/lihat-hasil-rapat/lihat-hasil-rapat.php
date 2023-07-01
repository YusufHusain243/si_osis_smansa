<?php
include 'function.php';

$data = showData($conn, "SELECT * FROM hasil_rapat");

?>


<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Lihat Hasil Rapat</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?p=dashboard&m=dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Lihat Hasil Rapat</li>
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
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Tanggal</th>
                                    <th>Nama Rapat</th>
                                    <th>Keterangan</th>
                                    <th>Foto</th>
                                    <th>File(Notulensi, Absen, dll)</th>
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
                                        <td><?= $d['nama_rapat']; ?></td>
                                        <td><?= $d['keterangan'] ?></td>
                                        <td class="text-center">
                                            <img src="../pengurus/images/<?= $d['foto'] ?>" alt="foto" width="100px">
                                        </td>
                                        <td>
                                            <a href="dokumen/<?= $d['file']; ?>" target="_blank">Lihat File</a>
                                        </td>
                                    <?php
                                    $no++;
                                }
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