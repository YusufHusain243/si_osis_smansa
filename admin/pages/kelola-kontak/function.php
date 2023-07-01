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
    $telp = htmlspecialchars($data['telp']);
    $email = htmlspecialchars($data['email']);
    $alamat = htmlspecialchars($data['alamat']);
    $ig = htmlspecialchars($data['ig']);

    $query = "INSERT INTO kontak VALUES ('', '$telp','$email','$alamat','$ig')";
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Ditambahkan"); location.href = "index.php?p=kelola-kontak&m=kelola-kontak";</script>';
    } else {
        echo '<script>alert("Data Gagal Ditambahkan"); location.href = "index.php?p=kelola-kontak&m=kelola-kontak";</script>';
    }
    mysqli_close($conn);
}

function editData($conn, $data)
{
    $id = htmlspecialchars($data['submit']);
    $telp = htmlspecialchars($data['telp']);
    $email = htmlspecialchars($data['email']);
    $alamat = htmlspecialchars($data['alamat']);
    $ig = htmlspecialchars($data['ig']);

    $query = "UPDATE 
                kontak 
            SET 
                telp = '$telp',
                email = '$email',
                alamat = '$alamat',
                ig = '$ig'
            WHERE 
                id = '$id'";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Diupdate"); location.href = "index.php?p=kelola-kontak&m=kelola-kontak";</script>';
    } else {
        echo '<script>alert("Data Gagal Diupdate"); location.href = "index.php?p=kelola-kontak&m=kelola-kontak";</script>';
    }
    mysqli_close($conn);
}
