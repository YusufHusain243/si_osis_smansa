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
    $username = mysqli_real_escape_string($conn, htmlspecialchars($data['username']));
    $password = mysqli_real_escape_string($conn, htmlspecialchars(md5($data['password'])));
    $nama = htmlspecialchars($data['nama']);

    $query = "INSERT INTO akun VALUES ('', '$username', '$password', 'Pembina', '$nama')";
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Ditambahkan"); location.href = "index.php?p=kelola-pembina&m=kelola-pembina";</script>';
    } else {
        echo '<script>alert("Data Gagal Ditambahkan"); location.href = "index.php?p=kelola-pembina&m=kelola-pembina";</script>';
    }
    mysqli_close($conn);
}

function hapusData($conn, $data)
{
    $id = htmlspecialchars($data['btn-hapus']);
    $query = "DELETE FROM akun WHERE id = '$id'";
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Dihapus"); location.href = "index.php?p=kelola-pembina&m=kelola-pembina";</script>';
    } else {
        echo '<script>alert("Data Gagal Dihapus"); location.href = "index.php?p=kelola-pembina&m=kelola-pembina";</script>';
    }
    mysqli_close($conn);
}

function editData($conn, $data)
{
    $id = htmlspecialchars($data['btn-edit']);
    $username = mysqli_real_escape_string($conn, htmlspecialchars($data['username']));
    $password = mysqli_real_escape_string($conn, htmlspecialchars(md5($data['password'])));
    $nama = htmlspecialchars($data['nama']);

    $query = "UPDATE 
                akun 
            SET 
                nama = '$nama', 
                username = '$username',
                password = '$password'
            WHERE 
                id = '$id'";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Diedit"); location.href = "index.php?p=kelola-pembina&m=kelola-pembina";</script>';
    } else {
        echo '<script>alert("Data Gagal Diedit"); location.href = "index.php?p=kelola-pembina&m=kelola-pembina";</script>';
    }
    mysqli_close($conn);
}
