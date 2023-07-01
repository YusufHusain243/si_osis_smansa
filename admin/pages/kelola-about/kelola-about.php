<?php
error_reporting(0);
include 'function.php';
$data = showData($conn, "SELECT * FROM about");

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
                <h1 class="m-0">Kelola Halaman About</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?p=dashboard&m=dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Kelola About</li>
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
                    <form action="" method="post">
                        <!-- form start -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="isi_konten">Konten About</label>
                                <textarea id="summernote" name="about"><?= $data[0]['about'] ?></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit" value="<?= $data[0]['id'] ?>" class="btn btn-primary">Submit</button>
                        </div>
                        <!-- /.card-body -->
                        <!-- /.card -->
                    </form>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
</section>
<!-- /.content -->