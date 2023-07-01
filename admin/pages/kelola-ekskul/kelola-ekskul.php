<?php

include 'function.php';

$data = showData($conn, "SELECT * FROM ekskul");

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
                <h1 class="m-0">Kelola Ekskul</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?p=dashboard&m=dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Kelola Ekskul</li>
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
                    <div class="card-header">
                        <h4 class="modal-title">Form Input Data</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama">Nama Ekskul</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Ekskul">
                            </div>
                            <div class="form-group">
                                <label for="konten">Konten Ekskul</label>
                                <textarea id="summernote" name="konten"></textarea>
                            </div>
                            <button type="submit" name="btn-tambah" class="btn btn-primary">Tambah Data</button>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Nama Ekskul</th>
                                    <th>Konten Ekskul</th>
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
                                        <td><?= $d['nama'] ?></td>
                                        <td><?= $d['konten'] ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a class="btn btn-success btn-sm" data-rel="tooltip" data-placement="top" title="Edit" href="index.php?p=kelola-ekskul&m=edit-konten&id=<?= $d['id'] ?>">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form action="" method="post" onsubmit="confirm('Yakin Hapus Data Ini?')">
                                                    <button type="submit" name="btn-hapus" value="<?= $d['id'] ?>" class="btn btn-danger btn-sm" data-rel="tooltip" data-placement="top" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
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