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
    $nama_rapat = htmlspecialchars($data['nama_rapat']);
    $keterangan = $data['keterangan'];
    $file = uploadFile();
    if (!$file) {
        return false;
    }
    
    $foto = uploadFoto();
    if (!$foto) {
        return false;
    }

    $query = "INSERT INTO hasil_rapat VALUES ('', '$tanggal', '$nama_rapat', '$keterangan', '$foto', '$file')";
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Ditambahkan"); location.href = "index.php?p=kelola-hasil-rapat&m=kelola-hasil-rapat";</script>';
    } else {
        echo '<script>alert("Data Gagal Ditambahkan"); location.href = "index.php?p=kelola-hasil-rapat&m=kelola-hasil-rapat";</script>';
    }
    mysqli_close($conn);
}

function hapusData($conn, $data)
{
    $id = htmlspecialchars($data['btn-hapus']);
    $query = "DELETE FROM hasil_rapat WHERE id = '$id'";
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Dihapus"); location.href = "index.php?p=kelola-hasil-rapat&m=kelola-hasil-rapat";</script>';
    } else {
        echo '<script>alert("Data Gagal Dihapus"); location.href = "index.php?p=kelola-hasil-rapat&m=kelola-hasil-rapat";</script>';
    }
    mysqli_close($conn);
}

function editData($conn, $data)
{
    $id = htmlspecialchars($data['btn-edit']);
    $tanggal = htmlspecialchars($data['tanggal']);
    $nama_rapat = htmlspecialchars($data['nama_rapat']);
    $keterangan = $data['keterangan'];

    if ($_FILES['foto']['name'] == null) {
        $foto = htmlspecialchars($data['foto']);
    } else {
        $foto = uploadFoto();
        if (!$foto) {
            return false;
        }
    }

    if ($_FILES['file']['name'] == null) {
        $file = htmlspecialchars($data['file']);
    } else {
        $file = uploadFile();
        if (!$file) {
            return false;
        }
    }
    
    $query = "UPDATE 
                hasil_rapat 
            SET 
                tanggal = '$tanggal', 
                nama_rapat = '$nama_rapat', 
                keterangan = '$keterangan', 
                foto = '$foto',
                file = '$file'
            WHERE 
                id = '$id'";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Diedit"); location.href = "index.php?p=kelola-hasil-rapat&m=kelola-hasil-rapat";</script>';
    } else {
        echo '<script>alert("Data Gagal Diedit"); location.href = "index.php?p=kelola-hasil-rapat&m=kelola-hasil-rapat";</script>';
    }
    mysqli_close($conn);
}


function uploadFoto()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

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

function uploadFile()
{
    $namaFile = $_FILES['file']['name'];
    $ukuranFile = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $tmpName = $_FILES['file']['tmp_name'];

    // cek apakah tidak ada file yang diupload
    if (
        $error === 4
    ) {
        echo "<script>
                alert('Pilih file terlebih dahulu!');
              </script>";
        return false;
    }

    // cek apakah yang diupload adalah file
    $eksetensiFileValid = ['pdf'];
    $ekstensiFile = explode('.', $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));
    if (!in_array($ekstensiFile, $eksetensiFileValid)) {
        echo "<script>
                alert('Yang anda upload bukan file PDF!');
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

    // lolos pengecekan, file siap diupload
    // generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFile;
    move_uploaded_file($tmpName, 'dokumen/' . $namaFileBaru);
    return $namaFileBaru;
}
