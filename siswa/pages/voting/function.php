<?php

function showData($conn, $query)
{
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function vote($conn, $data)
{
    $idAkun = htmlspecialchars($data['idAkun']);
    $idKandidat = htmlspecialchars($data['idKandidat']);

    $cek_durasi = showData($conn, "SELECT * FROM durasi_voting");

    if (
        cekTanggalMulai($cek_durasi[0]['tanggal_mulai'], date("Y/m/d")) &&
        cekTanggalBerakhir($cek_durasi[0]['tanggal_berakhir'], date("Y/m/d")) &&
        cekJamMulai($cek_durasi[0]['jam_mulai'], date("h:i:s")) &&
        cekJamBerakhir($cek_durasi[0]['jam_berakhir'], date("h:i:s"))
    ) {
        $query = "INSERT INTO hasil_voting VALUES ('', '$idAkun', '$idKandidat')";
        if (mysqli_query($conn, $query)) {
            echo '<script>alert("Voting Berhasil"); location.href = "index.php?p=voting&m=voting";</script>';
        } else {
            echo '<script>alert("Voting Gagal"); location.href = "index.php?p=voting&m=voting";</script>';
        }
        mysqli_close($conn);
    } else {
        echo '<script>alert("Waktu Voting Sudah Berakhir"); location.href = "index.php?p=voting&m=voting";</script>';
    }
}

function cekTanggalMulai($tanggalMulai, $tanggalSekarang)
{
    if (strtotime($tanggalSekarang) >= strtotime($tanggalMulai)) {
        return true;
    } else {
        return false;
    }
}

function cekTanggalBerakhir($tanggalBerakhir, $tanggalSekarang)
{
    if (strtotime($tanggalSekarang) <= strtotime($tanggalBerakhir)) {
        return true;
    } else {
        return false;
    }
}

function cekJamMulai($jamMulai, $jamSekarang)
{
    if (strtotime($jamSekarang) >= strtotime($jamMulai)) {
        return true;
    } else {
        return false;
    }
}

function cekJamBerakhir($jamBerakhir, $jamSekarang)
{
    if (strtotime($jamSekarang) <= strtotime($jamBerakhir)) {
        return true;
    } else {
        return false;
    }
}
