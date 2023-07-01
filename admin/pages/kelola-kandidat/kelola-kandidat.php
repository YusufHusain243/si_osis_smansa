<?php
include 'function.php';

$dataAkunTambah = showData($conn, "SELECT akun.* 
                            FROM akun 
                            WHERE role = 'Siswa' and NOT EXISTS 
                                (SELECT * 
                                FROM kandidat 
                                WHERE kandidat.id_ketua = akun.id OR kandidat.id_wakil = akun.id);
                            ");

$dataAkunEdit = showData($conn, "SELECT * FROM akun");

$dataKandidat = showData($conn, "SELECT
                                    kandidat.*,
                                    a1.nama AS nama_ketua,
                                    a2.nama AS nama_wakil
                                FROM
                                    kandidat
                                INNER JOIN akun a1 ON kandidat.id_ketua = a1.id
                                INNER JOIN akun a2 ON kandidat.id_wakil = a2.id");

$durasi = showData($conn, "SELECT * FROM durasi_voting");

if (isset($_POST['btn-tambah'])) {
    tambahData($conn, $_POST);
}

if (isset($_POST['btn-hapus'])) {
    hapusData($conn, $_POST);
}

if (isset($_POST['btn-edit'])) {
    editData($conn, $_POST);
}

if (isset($_POST['btn-durasi'])) {
    durasi($conn, $_POST);
}

?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kelola Kandidat Calon OSIS</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?p=dashboard&m=dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Kelola Kandidat</li>
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
                        <h5 class="m-0">Kelola Durasi Voting</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-4">
                                    <label for="tgl_mulai">Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="tgl_mulai" id="tgl_mulai" value="<?= isset($durasi[0]) ? $durasi[0]['tanggal_mulai'] : '' ?>">
                                </div>
                                <div class="col-4">
                                    <label for="jam_mulai">Jam Mulai</label>
                                    <input type="time" class="form-control" name="jam_mulai" id="jam_mulai" value="<?= isset($durasi[0]) ? $durasi[0]['jam_mulai'] : '' ?>">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-4">
                                    <label for="tgl_berakhir">Tanggal Berakhir</label>
                                    <input type="date" class="form-control" name="tgl_berakhir" id="tgl_berakhir" value="<?= isset($durasi[0]) ? $durasi[0]['tanggal_berakhir'] : '' ?>">
                                </div>
                                <div class="col-4">
                                    <label for="jam_berakhir">Jam Berakhir</label>
                                    <input type="time" class="form-control" name="jam_berakhir" id="jam_berakhir" value="<?= isset($durasi[0]) ? $durasi[0]['jam_berakhir'] : '' ?>">
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary" name="btn-durasi">Submit</button>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-header">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#tambah-kandidat">
                            <i class="ace-icon fa fa-plus"></i> Tambah Data
                        </button>

                        <!-- Modal Tambah -->
                        <div class="modal fade" id="tambah-kandidat">
                            <div class="modal-dialog modal-lg">
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
                                                <label for="no_urut">No Urut</label>
                                                <input type="text" class="form-control" name="no_urut" id="no_urut" placeholder="Masukkan nomor urut">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_ketua">Nama Calon Ketua</label>
                                                <select class="form-control" name="nama_ketua" id="nama_ketua">
                                                    <option selected>Pilih Calon Ketua</option>
                                                    <?php
                                                    foreach ($dataAkunTambah as $d) {
                                                    ?>
                                                        <option value="<?= $d['id'] ?>"><?= $d['nama'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_wakil_ketua">Nama Calon Wakil Ketua</label>
                                                <select class="form-control" name="nama_wakil_ketua" id="nama_wakil_ketua">
                                                    <option selected>Pilih Calon Wakil Ketua</option>
                                                    <?php
                                                    foreach ($dataAkunTambah as $d) {
                                                    ?>
                                                        <option value="<?= $d['id'] ?>"><?= $d['nama'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="kelas_ketua">Kelas Calon Ketua</label>
                                                <input type="text" class="form-control" name="kelas_ketua" id="kelas_ketua" placeholder="Masukkan Kelas Calon Ketua">
                                            </div>
                                            <div class="form-group">
                                                <label for="kelas_wakil">Kelas Calon Wakil Ketua</label>
                                                <input type="text" class="form-control" name="kelas_wakil" id="kelas_wakil" placeholder="Masukkan Kelas Calon Wakil Ketua">
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
                                            <div class="form-group">
                                                <label for="visi">Visi</label>
                                                <textarea name="visi" id="visi" cols="30" rows="10" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="misi">Misi</label>
                                                <textarea name="misi" id="misi" cols="30" rows="10" class="form-control"></textarea>
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
                        <!-- End Modal Tambah -->

                    </div>

                    <div class="card-body">
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <?php
                                    foreach ($dataKandidat as $dk) {
                                    ?>
                                        <div class="col-4">
                                            <div class="card card-primary">
                                                <div class="card-body box-profile">
                                                    <div class="text-center">
                                                        <img class=" img-fluid" src="images/<?= $dk['foto'] ?>" style="height: 200px; object-fit:cover;">
                                                    </div>
                                                    <br>
                                                    <h3 class="profile-username text-center">
                                                        <strong>No Urut : <?= $dk['no_urut'] ?></strong>
                                                    </h3>
                                                    <strong>Nama Calon Ketua</strong>
                                                    <p class="text-muted">
                                                        <?= $dk['nama_ketua'] ?> (<?= $dk['kelas_ketua'] ?>)
                                                    </p>
                                                    <hr>
                                                    <strong>Nama Calon Wakil Ketua</strong>
                                                    <p class="text-muted">
                                                        <?= $dk['nama_wakil'] ?> (<?= $dk['kelas_wakil'] ?>)
                                                    </p>
                                                    <hr>
                                                    <strong>Visi</strong>
                                                    <p class="text-muted">
                                                        <?= $dk['visi'] ?>
                                                    </p>
                                                    <hr>
                                                    <strong>Misi</strong>
                                                    <p class="text-muted">
                                                        <?= $dk['misi'] ?>
                                                    </p>
                                                    <hr>

                                                    <div class="row">
                                                        <div class="col-6">
                                                            <button class="btn btn-warning btn-block" data-toggle="modal" data-target="#edit-kandidat-<?= $dk['id'] ?>">
                                                                Edit
                                                            </button>

                                                            <!-- Modal Edit -->
                                                            <div class="modal fade" id="edit-kandidat-<?= $dk['id'] ?>">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <form action="" method="post" enctype="multipart/form-data">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Form Edit Data</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <label for="nama_ketua">Nama Calon Ketua</label>
                                                                                    <select class="form-control" name="nama_ketua" id="nama_ketua">
                                                                                        <?php
                                                                                        foreach ($dataAkunEdit as $d) {
                                                                                        ?>
                                                                                            <option value="<?= $d['id'] ?>" <?= $d['id'] == $dk['id_ketua'] ? 'selected' : '' ?>><?= $d['nama'] ?></option>
                                                                                        <?php
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="nama_wakil_ketua">Nama Calon Wakil Ketua</label>
                                                                                    <select class="form-control" name="nama_wakil_ketua" id="nama_wakil_ketua">
                                                                                        <option selected>Pilih Calon Wakil Ketua</option>
                                                                                        <?php
                                                                                        foreach ($dataAkunEdit as $d) {
                                                                                        ?>
                                                                                            <option value="<?= $d['id'] ?>" <?= $d['id'] == $dk['id_wakil'] ? 'selected' : '' ?>><?= $d['nama'] ?></option>
                                                                                        <?php
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="no_urut">No Urut</label>
                                                                                    <input type="text" class="form-control" name="no_urut" id="no_urut" placeholder="Masukkan no_urut" value="<?= $dk['no_urut'] ?>">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="kelas_ketua">Kelas Calon Ketua</label>
                                                                                    <input type="text" class="form-control" name="kelas_ketua" id="kelas_ketua" placeholder="Masukkan Kelas Calon Ketua" value="<?= $dk['kelas_ketua'] ?>">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="kelas_wakil">Kelas Calon Wakil Ketua</label>
                                                                                    <input type="text" class="form-control" name="kelas_wakil" id="kelas_wakil" placeholder="Masukkan Kelas Calon Wakil Ketua" value="<?= $dk['kelas_wakil'] ?>">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="foto">Foto</label>
                                                                                    <div class="input-group">
                                                                                        <div class="custom-file">
                                                                                            <input type="file" class="custom-file-input" id="selectImageEdit-<?= $dk['id'] ?>" onchange="previewEdit(<?= $dk['id'] ?>)" name="foto">
                                                                                            <label class="custom-file-label" for="foto">Choose file</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <br>
                                                                                    <img id="preview-edit-<?= $dk['id'] ?>" src="<?= isset($dk['foto']) ? 'images/' . $dk['foto'] : '#' ?>" class="img-fluid" width="100" />
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="visi">Visi</label>
                                                                                    <textarea name="visi" id="visi" cols="30" rows="10" class="form-control"><?= $dk['visi'] ?></textarea>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="misi">Misi</label>
                                                                                    <textarea name="misi" id="misi" cols="30" rows="10" class="form-control"><?= $dk['misi'] ?></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <input type="hidden" value="<?= $dk['foto'] ?>" name="foto_lama">
                                                                                <button type="submit" name="btn-edit" value="<?= $dk['id'] ?>" class="btn btn-primary">Edit Data</button>
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Modal Edit -->

                                                        </div>
                                                        <div class="col-6">
                                                            <form action="" method="post">
                                                                <button type="submit" onclick="confirm('Yakin Hapus Kandidat Ini?')" name="btn-hapus" value="<?= $dk['id'] ?>" class="btn btn-danger btn-block">
                                                                    Hapus
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
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