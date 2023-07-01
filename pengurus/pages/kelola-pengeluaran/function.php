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
    $keterangan = $data['keterangan'];

    $bukti_kuitansi = uploadBuktiKuitansi();
    if (!$bukti_kuitansi) {
        return false;
    }

    $query = "INSERT INTO pengeluaran VALUES ('', '$tanggal', '$nominal', '$keterangan', '$bukti_kuitansi')";
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Ditambahkan"); location.href = "index.php?p=kelola-pengeluaran&m=kelola-pengeluaran";</script>';
    } else {
        echo '<script>alert("Data Gagal Ditambahkan"); location.href = "index.php?p=kelola-pengeluaran&m=kelola-pengeluaran";</script>';
    }
    mysqli_close($conn);
}

function hapusData($conn, $data)
{
    $id = htmlspecialchars($data['btn-hapus']);
    $query = "DELETE FROM pengeluaran WHERE id = '$id'";
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Dihapus"); location.href = "index.php?p=kelola-pengeluaran&m=kelola-pengeluaran";</script>';
    } else {
        echo '<script>alert("Data Gagal Dihapus"); location.href = "index.php?p=kelola-pengeluaran&m=kelola-pengeluaran";</script>';
    }
    mysqli_close($conn);
}

function editData($conn, $data)
{
    $id = htmlspecialchars($data['btn-edit']);
    $tanggal = htmlspecialchars($data['tanggal']);
    $nominal = htmlspecialchars($data['nominal']);
    $keterangan = $data['keterangan'];

    if ($_FILES['bukti_kuitansi']['name'] == null) {
        $bukti_kuitansi = htmlspecialchars($data['bukti_kuitansi']);
    } else {
        $bukti_kuitansi = uploadBuktiKuitansi();
        if (!$bukti_kuitansi) {
            return false;
        }
    }

    $query = "UPDATE 
                pengeluaran 
            SET 
                tanggal = '$tanggal', 
                nominal = '$nominal', 
                keterangan = '$keterangan',
                bukti_kuitansi = '$bukti_kuitansi'
            WHERE 
                id = '$id'";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Diedit"); location.href = "index.php?p=kelola-pengeluaran&m=kelola-pengeluaran";</script>';
    } else {
        echo '<script>alert("Data Gagal Diedit"); location.href = "index.php?p=kelola-pengeluaran&m=kelola-pengeluaran";</script>';
    }
    mysqli_close($conn);
}

function uploadBuktiKuitansi()
{
    $namaFile = $_FILES['bukti_kuitansi']['name'];
    $ukuranFile = $_FILES['bukti_kuitansi']['size'];
    $error = $_FILES['bukti_kuitansi']['error'];
    $tmpName = $_FILES['bukti_kuitansi']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if (
        $error === 4
    ) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
              </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $eksetensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $eksetensiGambarValid)) {
        echo "<script>
                alert('Yang anda upload bukan gambar!');
              </script>";
        return false;
    }

    // cek jika ukuran terlalu besar
    if (
        $ukuranFile > 10000000
    ) {
        echo "<script>
                alert('Ukuran gambar terlalu besar! (Max. 10MB)');
              </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'images/' . $namaFileBaru);
    return $namaFileBaru;
}