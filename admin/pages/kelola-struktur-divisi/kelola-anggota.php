<?php
include 'function.php';

$id_divisi = $_GET['id'];
$nama_divisi = $_GET['nama_divisi'];

$data = showData($conn, "SELECT anggota_divisi.*, akun.nama, akun.username, akun.id as id_nama FROM anggota_divisi INNER JOIN akun ON anggota_divisi.id_akun = akun.id WHERE id_divisi = $id_divisi");
$dataSiswa = showData($conn, "SELECT * FROM akun WHERE role = 'Siswa'");

if (isset($_POST['btn-tambah'])) {
    tambahDataAnggota($conn, $_POST, $id_divisi, $nama_divisi);
}

if (isset($_POST['btn-hapus'])) {
    hapusDataAnggota($conn, $_POST, $id_divisi, $nama_divisi);
}

if (isset($_POST['btn-edit'])) {
    editDataAnggota($conn, $_POST, $id_divisi, $nama_divisi);
}

?>


<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kelola Anggota Divisi <?= $nama_divisi ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?p=dashboard&m=dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="index.php?p=kelola-struktur-divisi&m=kelola-struktur-divisi">Kelola Struktur Divisi OSIS</a></li>
                    <li class="breadcrumb-item active">Kelola Anggota Divisi</li>
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
                                                <label for="nama">NISN</label>
                                                <select class="form-control" name="nama" id="nama">
                                                    <option selected>Silahkan Pilih</option>
                                                    <?php
                                                    foreach ($dataSiswa as $ds) {
                                                    ?>
                                                        <option value="<?= $ds['id'] ?>"><?= $ds['username'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="jabatan">Jabatan</label>
                                                <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Masukkan jabatan">
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
                                                <img id="preview" src="#" class="img-fluid" width="100" style="display:none;" />
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
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>Jabatan</th>
                                    <th>Foto</th>
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
                                        <td><?= $d['jabatan'] ?></td>
                                        <td class="text-center">
                                            <img src="images/<?= $d['foto'] ?>" alt="foto" width="100px">
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-success btn-sm" data-rel="tooltip" data-placement="top" title="Edit" data-toggle="modal" data-target="#edit-<?= $d['id'] ?>">
                                                    <i class=" fas fa-edit"></i>
                                                </button>
                                                <form action="" method="post">
                                                    <button onclick="confirm('Yakin Hapus Data Ini?')" type="submit" name="btn-hapus" value="<?= $d['id'] ?>" class="btn btn-danger btn-sm" data-rel="tooltip" data-placement="top" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>

                                        <!-- Modal Tambah Data -->
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
                                                                <label for="nama">NISN</label>
                                                                <select class="form-control" name="nama" id="nama">
                                                                    <?php
                                                                    foreach ($dataSiswa as $ds) {
                                                                    ?>
                                                                        <option value="<?= $ds['id'] ?>" <?= $ds['id'] == $d['id_nama'] ? 'selected' : '' ?>><?= $ds['username'] ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jabatan">Jabatan</label>
                                                                <input type="text" class="form-control" name="jabatan" value="<?= $d['jabatan'] ?>" id="jabatan" placeholder="Masukkan jabatan">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="foto">Foto</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" id="selectImageEdit-<?= $d['id'] ?>" value="<?= $d['foto'] ?>" onchange="previewEdit(<?= $d['id'] ?>)" name="foto">
                                                                        <label class="custom-file-label" for="foto">Choose file</label>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <img id="preview-edit-<?= $d['id'] ?>" src="<?= isset($d['foto']) ? 'images/'.$d['foto'] : '#' ?>" class="img-fluid" width="100" />
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="foto_lama" value="<?= $d['foto'] ?>">
                                                            <button type="submit" name="btn-edit" value="<?= $d['id'] ?>" class="btn btn-primary">Edit Data</button>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- End Modal Tambah Data -->
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