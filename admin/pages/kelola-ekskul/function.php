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
    $nama = htmlspecialchars($data['nama']);
    $konten = $data['konten'];
    $slug = str_replace(' ', '_', strtolower($nama));

    $query = "INSERT INTO ekskul VALUES ('', '$nama', '$konten','$slug')";
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Ditambahkan"); location.href = "index.php?p=kelola-ekskul&m=kelola-ekskul";</script>';
    } else {
        echo '<script>alert("Data Gagal Ditambahkan"); location.href = "index.php?p=kelola-ekskul&m=kelola-ekskul";</script>';
    }
    mysqli_close($conn);
}

function hapusData($conn, $data)
{
    $id = htmlspecialchars($data['btn-hapus']);
    $query = "DELETE FROM ekskul WHERE id = '$id'";
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Dihapus"); location.href = "index.php?p=kelola-ekskul&m=kelola-ekskul";</script>';
    } else {
        echo '<script>alert("Data Gagal Dihapus"); location.href = "index.php?p=kelola-ekskul&m=kelola-ekskul";</script>';
    }
    mysqli_close($conn);
}

function editData($conn, $data)
{
    $id = htmlspecialchars($data['btn-edit']);
    $nama = htmlspecialchars($data['nama']);
    $konten = $data['konten'];
    $slug = str_replace(' ', '_', strtolower($nama));

    $query = "UPDATE 
                ekskul 
            SET 
                nama = '$nama',
                konten = '$konten',
                slug = '$slug'
            WHERE 
                id = '$id'";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Diedit"); location.href = "index.php?p=kelola-ekskul&m=kelola-ekskul";</script>';
    } else {
        echo '<script>alert("Data Gagal Diedit"); location.href = "index.php?p=kelola-ekskul&m=kelola-ekskul";</script>';
    }
    mysqli_close($conn);
}
