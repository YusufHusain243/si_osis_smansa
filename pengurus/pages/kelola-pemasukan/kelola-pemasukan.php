<?php
include 'function.php';

$tahun = showData($conn, "SELECT YEAR(tanggal) AS tahun FROM pemasukan");

if (isset($_GET['filter']) && $_GET['filter'] !== 'Semua') {
    $filter = $_GET['filter'];
    $data = showData($conn, "SELECT * FROM pemasukan WHERE YEAR(tanggal) = $filter");
    $total_pemasukan = showData($conn, "SELECT SUM(nominal) AS Total_Pemasukan FROM pemasukan WHERE YEAR(tanggal) = $filter");
    $total_pengeluaran = showData($conn, "SELECT SUM(nominal) AS Total_Pengeluaran FROM pengeluaran WHERE YEAR(tanggal) = $filter");
    $total_saldo_akhir = ($total_pemasukan[0]['Total_Pemasukan'] - $total_pengeluaran[0]['Total_Pengeluaran']);
} else {
    $data = showData($conn, "SELECT * FROM pemasukan");
    $total_pemasukan = showData($conn, "SELECT SUM(nominal) AS Total_Pemasukan FROM pemasukan");
    $total_pengeluaran = showData($conn, "SELECT SUM(nominal) AS Total_Pengeluaran FROM pengeluaran");
    $total_saldo_akhir = ($total_pemasukan[0]['Total_Pemasukan'] - $total_pengeluaran[0]['Total_Pengeluaran']);
}

if (isset($_POST['btn-tambah'])) {
    tambahData($conn, $_POST);
}

if (isset($_POST['btn-hapus'])) {
    hapusData($conn, $_POST);
}

if (isset($_POST['btn-edit'])) {
    editData($conn, $_POST);
}


?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kelola Pemasukan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?p=dashboard&m=dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Kelola Pemasukan</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Filter Pemasukan
            </button>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="index.php?p=kelola-pemasukan&m=kelola-pemasukan&filter=Semua">
                        Lihat Semua
                    </a>
                </li>
                <?php
                foreach ($tahun as $t) {
                ?>
                    <li>
                        <a class="dropdown-item" href="index.php?p=kelola-pemasukan&m=kelola-pemasukan&filter=<?= $t['tahun'] ?>">
                            <?= $t['tahun'] ?>
                        </a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="nav-icon fas fa-book"></i>
                            <b>Total Pemasukan <?= (isset($_GET['filter']) && $_GET['filter'] !== 'Semua') ? 'Tahun ' . $_GET['filter'] . '' : '' ?></b>
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
                            <b>Total Saldo Akhir <?= (isset($_GET['filter']) && $_GET['filter'] !== 'Semua') ? 'Tahun ' . $_GET['filter'] . '' : '' ?></b>
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
                        <button class="btn btn-primary" data-toggle="modal" data-target="#tambah">
                            <i class="ace-icon fa fa-plus"></i> Tambah Data
                        </button>

                        <!-- Modal Tambah Data -->
                        <div class="modal fade" id="tambah">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Form Input Data</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="tanggal">Tanggal</label>
                                                <input type="date" class="form-control" id="tanggal" name="tanggal">
                                            </div>
                                            <div class="form-group">
                                                <label for="nominal">Nominal(Rp)</label>
                                                <input type="text" class="form-control" id="nominal" name="nominal" placeholder="Masukan nominal">
                                            </div>
                                            <div class="form-group">
                                                <label for="sumber_dana">Sumber Dana</label>
                                                <input type="text" class="form-control" id="sumber_dana" name="sumber_dana" placeholder="Masukan sumber dana">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="btn-tambah" class="btn btn-primary">Tambah Data</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Tambah Data -->

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Tanggal</th>
                                    <th>Nominal(Rp)</th>
                                    <th>Sumber Dana</th>
                                    <th>Aksi</th>
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
                                        <td>
                                            <div class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-success btn-sm" data-rel="tooltip" data-placement="top" title="Edit" data-toggle="modal" data-target="#edit-<?= $d['id'] ?>">
                                                        <i class=" fas fa-edit"></i>
                                                    </button>
                                                    <form action="" method="post">
                                                        <button type="submit" onclick="confirm('Yakin Hapus Data Ini?')" name="btn-hapus" value="<?= $d['id'] ?>" class="btn btn-danger btn-sm" data-rel="tooltip" data-placement="top" title="Hapus">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>

                                            <!-- Modal Edit Data -->
                                            <div class="modal fade" id="edit-<?= $d['id'] ?>">
                                                <div class="modal-dialog">
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Form Edit Data</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="tanggal">Tanggal</label>
                                                                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $d['tanggal'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nominal">Nominal(Rp)</label>
                                                                    <input type="text" class="form-control" id="nominal" name="nominal" value="<?= $d['nominal'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="sumber_dana">Sumber Dana</label>
                                                                    <input type="text" class="form-control" id="sumber_dana" name="sumber_dana" value="<?= $d['sumber_dana'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" name="btn-edit" value="<?= $d['id'] ?>" class="btn btn-primary">Edit Data</button>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- End Modal Edit Data -->
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