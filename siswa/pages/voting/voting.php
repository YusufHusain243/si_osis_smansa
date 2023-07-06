<?php
include 'function.php';

$id_akun = $_SESSION['idAkun'];

$dataKandidat = showData($conn, "SELECT
                                    kandidat.*,
                                    a1.nama AS nama_ketua,
                                    a2.nama AS nama_wakil
                                FROM
                                    kandidat
                                INNER JOIN akun a1 ON kandidat.id_ketua = a1.id
                                INNER JOIN akun a2 ON kandidat.id_wakil = a2.id");

$isVote = count(showData($conn, "SELECT * FROM hasil_voting WHERE hasil_voting.id_akun =$id_akun;"));
$durasi = showData($conn, "SELECT * FROM durasi_voting");

if (isset($_POST['btn-vote'])) {
    vote($conn, $_POST);
}
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kandidat Calon OSIS</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Voting</li>
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
                        <h5 class="m-0">Durasi Voting</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <label for="tgl_mulai">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="tgl_mulai" value="<?= isset($durasi[0]) ? $durasi[0]['tanggal_mulai'] : '' ?>" readonly disabled>
                            </div>
                            <div class="col-4">
                                <label for="jam_mulai">Jam Mulai</label>
                                <input type="time" class="form-control" id="jam_mulai" value="<?= isset($durasi[0]) ? $durasi[0]['jam_mulai'] : '' ?>" readonly disabled>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-4">
                                <label for="tgl_berakhir">Tanggal Berakhir</label>
                                <input type="date" class="form-control" id="tgl_berakhir" value="<?= isset($durasi[0]) ? $durasi[0]['tanggal_berakhir'] : '' ?>" readonly disabled>
                            </div>
                            <div class="col-4">
                                <label for="jam_berakhir">Jam Berakhir</label>
                                <input type="time" class="form-control" id="jam_berakhir" value="<?= isset($durasi[0]) ? $durasi[0]['jam_berakhir'] : '' ?>" readonly disabled>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
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
                                                        <img class=" img-fluid" src="../admin/images/<?= $dk['foto'] ?>">
                                                    </div>
                                                    <br>
                                                    <h3 class="profile-username text-center">
                                                        <strong><?= $dk['no_urut'] ?></strong>
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

                                                    <?php
                                                    if ($isVote > 0) {
                                                    ?>
                                                        <button class="btn btn-secondary btn-block" disabled>
                                                            Vote
                                                        </button>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="idKandidat" value="<?= $dk['id'] ?>">
                                                            <input type="hidden" name="idAkun" value="<?= $id_akun ?>">
                                                            <button type="submit" onclick="confirm('Yakin Vote Kandidat Ini?')" name="btn-vote" class="btn btn-success btn-block">
                                                                Vote
                                                            </button>
                                                        </form>
                                                    <?php
                                                    }
                                                    ?>
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