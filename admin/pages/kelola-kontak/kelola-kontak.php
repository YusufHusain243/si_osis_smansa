<?php
error_reporting(0);
include 'function.php';
$data = showData($conn, "SELECT * FROM kontak");

if (isset($_POST['submit'])) {
    if (count($data) > 0) {
        editData($conn, $_POST);
    } else {
        tambahData($conn, $_POST);
    }
}
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kelola Kontak</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?p=dashboard&m=dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Kelola Kontak</li>
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
                    <!-- form start -->
                    <form action="" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="no_telp">Nomor Telepon</label>
                            <input type="text" class="form-control" name="telp" value="<?= $data[0]['telp'] ?>" id="no_telp" placeholder="Masukkan nomor telepon">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" value="<?= $data[0]['email'] ?>" id="email" placeholder="Masukkan email">
                        </div>
                        <div class="form-group">
                            <label for="ig">Instagram</label>
                            <input type="text" class="form-control" name="ig" value="<?= $data[0]['ig'] ?>" id="ig" placeholder="Masukkan Instagram">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"><?= $data[0]['alamat'] ?></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" value="<?= $data[0]['id'] ?>" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                    <!-- /.card-body -->
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
</section>
<!-- /.content -->