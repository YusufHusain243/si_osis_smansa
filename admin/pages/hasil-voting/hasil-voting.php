<?php

include 'function.php';

$hasilVoting = showData($conn, "SELECT COUNT(hasil_voting.id) AS hasilVoting FROM hasil_voting;");
$totalSuara = showData($conn, "SELECT COUNT(akun.id) AS totalSuara FROM akun WHERE role = 'Siswa';");

$totalPerolehanSuara = ($hasilVoting[0]['hasilVoting'] / ($totalSuara[0]['totalSuara'] > 0 ? $totalSuara[0]['totalSuara'] : 1)) * 100;

$hasilVoting = showData($conn, "SELECT
                                    kandidat.no_urut,
                                    a1.nama as nama_ketua,
                                    a2.nama as nama_wakil,
                                    COUNT(hasil_voting.id) as jumlah_suara
                                FROM
                                    hasil_voting
                                INNER JOIN kandidat ON kandidat.id = hasil_voting.id_kandidat
                                INNER JOIN akun a1 ON a1.id = kandidat.id_ketua
                                INNER JOIN akun a2 ON a2.id = kandidat.id_wakil
                                GROUP BY
                                    kandidat.no_urut;");
//no_urut&nama
$labelChart = [];
//hasil suara
$valueChart = [];

foreach ($hasilVoting as $hp) {
    $labelChart[] = '(' . $hp['no_urut'] . ') ' . $hp['nama_ketua'] . ' & ' . $hp['nama_wakil'];
    $valueChart[] = $hp['jumlah_suara'];
}

?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Hasil Voting Calon OSIS</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?p=dashboard&m=dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Hasil Voting</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form action="index.php?p=hasil-voting&m=cetak" target="_blank" method="post">
                    <button type="submit" class="btn btn-success">
                        Cetak Hasil Voting
                    </button>
                </form>

                <div class="d-flex">
                    <p class="ml-auto d-flex flex-column text-right">
                        <span class="text-success">
                            <?= $totalPerolehanSuara ?>% / 100%
                        </span>
                        <span class="text-muted">Total Perolehan Suara</span>
                    </p>
                </div>

                <div class="position-relative mb-4">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="visitors-chart" height="200" width="608" style="display: block; width: 304px; height: 200px;" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>
<br>