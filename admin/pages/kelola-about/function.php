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
    $about = $data['about'];

    $query = "INSERT INTO about VALUES ('', '$about')";
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Ditambahkan"); location.href = "index.php?p=kelola-about&m=kelola-about";</script>';
    } else {
        echo '<script>alert("Data Gagal Ditambahkan"); location.href = "index.php?p=kelola-about&m=kelola-about";</script>';
    }
    mysqli_close($conn);
}

function editData($conn, $data)
{
    $id = $data['submit'];
    $about = $data['about'];

    $query = "UPDATE 
                about 
            SET 
                about = '$about'
            WHERE 
                id = '$id'";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Diupdate"); location.href = "index.php?p=kelola-about&m=kelola-about";</script>';
    } else {
        echo '<script>alert("Data Gagal Diupdate"); location.href = "index.php?p=kelola-about&m=kelola-about";</script>';
    }
    mysqli_close($conn);
}
