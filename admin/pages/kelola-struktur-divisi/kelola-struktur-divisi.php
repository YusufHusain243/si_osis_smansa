<?php
include 'function.php';

$data = showData($conn, "SELECT * FROM divisi");

if (isset($_POST['btn-tambah'])) {
    tambahDataDivisi($conn, $_POST);
}

if (isset($_POST['btn-hapus'])) {
    hapusDataDivisi($conn, $_POST);
}

if (isset($_POST['btn-edit'])) {
    editDataDivisi($conn, $_POST);
}

?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kelola Struktur Divisi OSIS</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?p=dashboard&m=dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Kelola Struktur Divisi OSIS</li>
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
                        <button class="btn btn-primary" data-toggle="modal" data-target="#tambah">
                            <i class="ace-icon fa fa-plus"></i> Tambah Data
                        </button>

                        <!-- Modal Tambah Data -->
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
                                                <label for="nama_divisi">Nama Divisi</label>
                                                <input type="text" class="form-control" name="nama_divisi" id="nama_divisi" placeholder="Masukkan nama divisi">
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
                        <!-- End Modal Tambah Data -->

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Nama Divisi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data as $d) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no ?></td>
                                        <td><?= $d['nama_divisi'] ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success btn-sm" data-rel="tooltip" data-placement="top" title="Edit" data-toggle="modal" data-target="#edit-<?= $d['id'] ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <form action="" method="post">
                                                    <button onclick="confirm('Yakin Hapus Data Ini?')" type="submit" name="btn-hapus" value="<?= $d['id'] ?>" class="btn btn-danger btn-sm" data-rel="tooltip" data-placement="top" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                                <a class="btn btn-info btn-sm" data-rel="tooltip" data-placement="top" title="Daftar Anggota" href="index.php?p=kelola-struktur-divisi&m=kelola-anggota&id=<?= $d['id'] ?>&nama_divisi=<?= $d['nama_divisi'] ?>">
                                                    <i class="fas fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </td>

                                        <!-- Modal Edit Data -->
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
                                                                <label for="nama_divisi">Nama Divisi</label>
                                                                <input type="text" value="<?= $d['nama_divisi'] ?>" class="form-control" name="nama_divisi" id="nama_divisi" placeholder="Masukkan nama divisi">
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
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->