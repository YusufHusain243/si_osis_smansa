<?php
include 'function.php';

$data = showData($conn, "SELECT * FROM akun WHERE role = 'Siswa'");

if (isset($_POST['btn-tambah'])) {
    tambahData($conn, $_POST);
}

if (isset($_POST['btn-import'])) {
    importData($conn, $_POST);
}

if (isset($_POST['btn-hapus'])) {
    hapusData($conn, $_POST);
}

if (isset($_POST['btn-edit'])) {
    editData($conn, $_POST);
}

if (isset($_POST['btn-reset'])) {
    resetData($conn);
}

?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kelola User Daftar Pemilih</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?p=dashboard&m=dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Kelola User Daftar Pemilih</li>
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
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#import">
                                    <i class="ace-icon fa fa-plus"></i> Import Data
                                </button>

                                <!-- Modal Import Data -->
                                <div class="modal fade" id="import">
                                    <div class="modal-dialog">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Form Input Data</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="file">File Input (Excel)</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="file" name="file">
                                                                <label class="custom-file-label" for="file">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="btn-import" class="btn btn-primary">Import Data</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- End Modal Import Data -->

                                <button class="btn btn-success" data-toggle="modal" data-target="#tambah">
                                    <i class="ace-icon fa fa-plus"></i> Tambah Data
                                </button>
                            </div>
                            <div class="col-6">
                                <div class="d-flex justify-content-end m-0">
                                    <!-- <div class="ml-auto d-flex flex-column"> -->
                                    <form action="" method="post">
                                        <button type="submit" class="btn btn-danger" name="btn-reset">
                                            <i class="ace-icon fa fa-trash"></i> Reset Data
                                        </button>
                                    </form>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>

                        <br>

                        <!-- Modal Tambah Data Manual -->
                        <div class="modal fade" id="tambah">
                            <div class="modal-dialog">
                                <form action="" method="post">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Form Input Data</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama">
                                            </div>
                                            <div class="form-group">
                                                <label for="nisn">NISN</label>
                                                <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="btn-tambah" class="btn btn-primary">Tambah Data</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End Modal Tambah Data Manual -->

                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Username (NISN)</th>
                                        <th>Role</th>
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
                                            <td><?= $d['username'] ?></td>
                                            <td><?= $d['role'] ?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success btn-sm" data-rel="tooltip" data-placement="top" title="Edit" data-toggle="modal" data-target="#edit-<?= $d['id'] ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <form action="" method="post">
                                                        <button onclick="confirm('Yakin Hapus Data Ini?')" type="submit" name="btn-hapus" value="<?= $d['id'] ?>" class="btn btn-danger btn-sm" data-rel="tooltip" data-placement="top" title="Hapus">
                                                            <i class="fas fa-trash"></i>
                                                            </a>
                                                    </form>
                                                </div>
                                            </td>

                                            <div class="modal fade" id="edit-<?= $d['id'] ?>">
                                                <div class="modal-dialog">
                                                    <form action="" method="post">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Form Edit Data</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="nama">Nama</label>
                                                                    <input type="text" value="<?= $d['nama'] ?>" class="form-control" id="nama" name="nama" placeholder="Masukkan nama">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nisn">NISN</label>
                                                                    <input type="text" value="<?= $d['username'] ?>" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="password">New Password</label>
                                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password">
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
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->