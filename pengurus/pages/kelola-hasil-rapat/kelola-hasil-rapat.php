<?php
include 'function.php';

$data = showData($conn, "SELECT * FROM hasil_rapat");

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
                <h1 class="m-0">Kelola Hasil Rapat</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?p=dashboard&m=dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Kelola Hasil Rapat</li>
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
                                                <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Masukkan tanggal">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Nama Rapat</label>
                                                <input type="text" class="form-control" name="nama_rapat" id="nama_rapat" placeholder="Masukkan nama rapat">
                                            </div>
                                            <div class="form-group">
                                                <label for="keterangan">Keterangan</label>
                                                <textarea id="summernote" name="keterangan"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="foto">Foto</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="selectImage" onchange="previewAdd()" name="foto">
                                                        <label class="custom-file-label" for="foto">Choose file</label>
                                                    </div>
                                                </div>
                                                <br>
                                                <img id="preview" src="#" class="img-fluid" width="100" />
                                            </div>
                                            <div class="form-group">
                                                <label for="dokumen">File PDF (Bukti Notulensi, Absen, dll)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="file">
                                                        <label class="custom-file-label" for="file">Choose file</label>
                                                    </div>
                                                </div>
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
                                    <th>Nama Rapat</th>
                                    <th>Keterangan</th>
                                    <th>Foto</th>
                                    <th>File(Notulensi, Absen, dll)</th>
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
                                        <td><?= $d['nama_rapat']; ?></td>
                                        <td><?= $d['keterangan'] ?></td>
                                        <td>
                                            <img src="images/<?= $d['foto'] ?>" alt="foto" width="100px">
                                        </td>
                                        <td>
                                            <a href="dokumen/<?= $d['file']; ?>" target="_blank">Lihat File</a>
                                        </td>
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
                                                                    <label for="nama_rapat">Nama Rapat</label>
                                                                    <input type="text" class="form-control" id="nama_rapat" name="nama_rapat" value="<?= $d['nama_rapat'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="keterangan">Keterangan</label>
                                                                    <textarea id="summernote" name="keterangan"><?= $d['keterangan'] ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="foto">Foto</label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" id="selectImageEdit-<?= $d['id'] ?>" onchange="previewEdit(<?= $d['id'] ?>)" name="foto">
                                                                            <label class="custom-file-label" for="foto">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <img id="preview-edit-<?= $d['id'] ?>" src="<?= isset($d['foto']) ? 'images/' . $d['foto'] : '#' ?>" class="img-fluid" width="100" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="dokumen">File PDF (Bukti Notulensi, Absen, dll)</label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" name="file">
                                                                            <label class="custom-file-label" for="file">Choose file</label>
                                                                        </div>
                                                                    </div>
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