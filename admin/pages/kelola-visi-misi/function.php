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
    $visi = $data['visi'];
    $misi = $data['misi'];

    $query = "INSERT INTO visi_misi VALUES ('', '$visi', '$misi')";
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Ditambahkan"); location.href = "index.php?p=kelola-visi-misi&m=kelola-visi-misi";</script>';
    } else {
        echo '<script>alert("Data Gagal Ditambahkan"); location.href = "index.php?p=kelola-visi-misi&m=kelola-visi-misi";</script>';
    }
    mysqli_close($conn);
}

function editData($conn, $data)
{
    $id = $data['submit'];
    $visi = $data['visi'];
    $misi = $data['misi'];

    $query = "UPDATE 
                visi_misi 
            SET 
                visi = '$visi', 
                misi = '$misi'
            WHERE 
                id = '$id'";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Diupdate"); location.href = "index.php?p=kelola-visi-misi&m=kelola-visi-misi";</script>';
    } else {
        echo '<script>alert("Data Gagal Diupdate"); location.href = "index.php?p=kelola-visi-misi&m=kelola-visi-misi";</script>';
    }
    mysqli_close($conn);
}
