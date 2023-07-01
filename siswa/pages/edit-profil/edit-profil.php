<?php
error_reporting(0);
include 'function.php';
$id = $_SESSION['idAkun'];
$data = showData($conn, "SELECT * FROM akun WHERE id = $id");

if (isset($_POST['btn-edit'])) {
    editData($conn, $_POST);
}

?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Profil</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <!-- <li class="breadcrumb-item"><a href="index.php?p=dashboard&m=dashboard">Dashboard</a></li> -->
                    <li class="breadcrumb-item active">Edit Profil</li>
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
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?= $data[0]['nama'] ?>" id="nama" placeholder="Masukkan nama">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" value="<?= $data[0]['username'] ?>" id="username" placeholder="Masukkan username">
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password baru">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="btn-edit" value="<?= $data[0]['id'] ?>" class="btn btn-primary">Edit Profil</button>
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