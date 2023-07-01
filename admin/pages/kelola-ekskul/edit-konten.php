<?php

include 'function.php';
$id = $_GET['id'];
$data = showData($conn, "SELECT * FROM ekskul WHERE id = $id");

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
                        <h4 class="modal-title">Form Edit Data</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama">Nama Ekskul</label>
                                <input type="text" value="<?=$data[0]['nama']?>" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Ekskul">
                            </div>
                            <div class="form-group">
                                <label for="konten">Konten Ekskul</label>
                                <textarea id="summernote" name="konten"><?=$data[0]['konten']?></textarea>
                            </div>
                            <button type="submit" name="btn-edit" value="<?=$data[0]['id']?>" class="btn btn-primary">Edit Data</button>
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->