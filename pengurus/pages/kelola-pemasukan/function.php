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

function tambahData($conn, $data)
{
    $tanggal = htmlspecialchars($data['tanggal']);
    $nominal = htmlspecialchars($data['nominal']);
    $sumber_dana = $data['sumber_dana'];

    $query = "INSERT INTO pemasukan VALUES ('', '$tanggal', '$nominal', '$sumber_dana')";
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Ditambahkan"); location.href = "index.php?p=kelola-pemasukan&m=kelola-pemasukan";</script>';
    } else {
        echo '<script>alert("Data Gagal Ditambahkan"); location.href = "index.php?p=kelola-pemasukan&m=kelola-pemasukan";</script>';
    }
    mysqli_close($conn);
}

function hapusData($conn, $data)
{
    $id = htmlspecialchars($data['btn-hapus']);
    $query = "DELETE FROM pemasukan WHERE id = '$id'";
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Dihapus"); location.href = "index.php?p=kelola-pemasukan&m=kelola-pemasukan";</script>';
    } else {
        echo '<script>alert("Data Gagal Dihapus"); location.href = "index.php?p=kelola-pemasukan&m=kelola-pemasukan";</script>';
    }
    mysqli_close($conn);
}

function editData($conn, $data)
{
    $id = htmlspecialchars($data['btn-edit']);
    $tanggal = htmlspecialchars($data['tanggal']);
    $nominal = htmlspecialchars($data['nominal']);
    $sumber_dana = $data['sumber_dana'];

    $query = "UPDATE 
                pemasukan 
            SET 
                tanggal = '$tanggal', 
                nominal = '$nominal', 
                sumber_dana = '$sumber_dana'
            WHERE 
                id = '$id'";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Diedit"); location.href = "index.php?p=kelola-pemasukan&m=kelola-pemasukan";</script>';
    } else {
        echo '<script>alert("Data Gagal Diedit"); location.href = "index.php?p=kelola-pemasukan&m=kelola-pemasukan";</script>';
    }
    mysqli_close($conn);
}