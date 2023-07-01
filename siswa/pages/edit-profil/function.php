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
        echo '<script>alert("Data Berhasil Diedit"); location.href = "index.php?p=edit-profil&m=edit-profil";</script>';
    } else {
        echo '<script>alert("Data Gagal Diedit"); location.href = "index.php?p=edit-profil&m=edit-profil";</script>';
    }
    mysqli_close($conn);
}

?>