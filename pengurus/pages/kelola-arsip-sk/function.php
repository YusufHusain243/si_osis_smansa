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
    $judul = htmlspecialchars($data['judul']);
    $tanggal_sk = htmlspecialchars($data['tanggal_sk']);
    $dokumen = uploadDokumen();
    if (!$dokumen) {
        return false;
    }

    $query = "INSERT INTO arsip_sk VALUES ('', '$judul', '$tanggal_sk', '$dokumen')";
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Ditambahkan"); location.href = "index.php?p=kelola-arsip-sk&m=kelola-arsip-sk";</script>';
    } else {
        echo '<script>alert("Data Gagal Ditambahkan"); location.href = "index.php?p=kelola-arsip-sk&m=kelola-arsip-sk";</script>';
    }
    mysqli_close($conn);
}

function hapusData($conn, $data)
{
    $id = htmlspecialchars($data['btn-hapus']);
    $query = "DELETE FROM arsip_sk WHERE id = '$id'";
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Dihapus"); location.href = "index.php?p=kelola-arsip-sk&m=kelola-arsip-sk";</script>';
    } else {
        echo '<script>alert("Data Gagal Dihapus"); location.href = "index.php?p=kelola-arsip-sk&m=kelola-arsip-sk";</script>';
    }
    mysqli_close($conn);
}

function editData($conn, $data)
{
    $id = htmlspecialchars($data['btn-edit']);
    $judul = htmlspecialchars($data['judul']);
    $tanggal_sk = htmlspecialchars($data['tanggal_sk']);

    if ($_FILES['dokumen']['name'] == null) {
        $dokumen = htmlspecialchars($data['dokumen']);
    } else {
        $dokumen = uploadDokumen();
        if (!$dokumen) {
            return false;
        }
    }
    
    $query = "UPDATE 
                arsip_sk 
            SET 
                judul = '$judul', 
                tanggal_sk = '$tanggal_sk', 
                dokumen = '$dokumen'
            WHERE 
                id = '$id'";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Diedit"); location.href = "index.php?p=kelola-arsip-sk&m=kelola-arsip-sk";</script>';
    } else {
        echo '<script>alert("Data Gagal Diedit"); location.href = "index.php?p=kelola-arsip-sk&m=kelola-arsip-sk";</script>';
    }
    mysqli_close($conn);
}

function uploadDokumen()
{
    $namaFile = $_FILES['dokumen']['name'];
    $ukuranFile = $_FILES['dokumen']['size'];
    $error = $_FILES['dokumen']['error'];
    $tmpName = $_FILES['dokumen']['tmp_name'];

    // cek apakah tidak ada dokumen yang diupload
    if (
        $error === 4
    ) {
        echo "<script>
                alert('Pilih dokumen terlebih dahulu!');
              </script>";
        return false;
    }

    // cek apakah yang diupload adalah dokumen
    $eksetensiDokumenValid = ['pdf'];
    $ekstensiDokumen = explode('.', $namaFile);
    $ekstensiDokumen = strtolower(end($ekstensiDokumen));
    if (!in_array($ekstensiDokumen, $eksetensiDokumenValid)) {
        echo "<script>
                alert('Yang anda upload bukan dokumen PDF!');
              </script>";
        return false;
    }

    // cek jika ukuran terlalu besar
    if (
        $ukuranFile > 10000000
    ) {
        echo "<script>
                alert('Ukuran dokumen PDF terlalu besar! (Max. 10MB)');
              </script>";
        return false;
    }

    // lolos pengecekan, dokumen siap diupload
    // generate nama dokumen baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiDokumen;
    move_uploaded_file($tmpName, 'dokumen/' . $namaFileBaru);
    return $namaFileBaru;
}

