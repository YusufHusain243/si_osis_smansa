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

function tambahDataDivisi($conn, $data)
{
    $nama_divisi = htmlspecialchars($data['nama_divisi']);

    $query = "INSERT INTO divisi VALUES ('', '$nama_divisi')";
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Ditambahkan"); location.href = "index.php?p=kelola-struktur-divisi&m=kelola-struktur-divisi";</script>';
    } else {
        echo '<script>alert("Data Gagal Ditambahkan"); location.href = "index.php?p=kelola-struktur-divisi&m=kelola-struktur-divisi";</script>';
    }
    mysqli_close($conn);
}

function hapusDataDivisi($conn, $data)
{
    $id = htmlspecialchars($data['btn-hapus']);
    $query = "DELETE FROM divisi WHERE id = '$id'";
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Dihapus"); location.href = "index.php?p=kelola-struktur-divisi&m=kelola-struktur-divisi";</script>';
    } else {
        echo '<script>alert("Data Gagal Dihapus"); location.href = "index.php?p=kelola-struktur-divisi&m=kelola-struktur-divisi";</script>';
    }
    mysqli_close($conn);
}

function editDataDivisi($conn, $data)
{
    $id = htmlspecialchars($data['btn-edit']);
    $nama_divisi = htmlspecialchars($data['nama_divisi']);

    $query = "UPDATE 
                divisi 
            SET 
                nama_divisi = '$nama_divisi'
            WHERE 
                id = '$id'";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Diedit"); location.href = "index.php?p=kelola-struktur-divisi&m=kelola-struktur-divisi";</script>';
    } else {
        echo '<script>alert("Data Gagal Diedit"); location.href = "index.php?p=kelola-struktur-divisi&m=kelola-struktur-divisi";</script>';
    }
    mysqli_close($conn);
}

function tambahDataAnggota($conn, $data, $id_divisi, $nama_divisi)
{
    $id_akun = htmlspecialchars($data['nama']);
    $jabatan = htmlspecialchars($data['jabatan']);

    $foto = uploadFoto();
    if (!$foto) {
        return false;
    }

    $query = "INSERT INTO anggota_divisi VALUES ('', '$id_akun', '$id_divisi', '$jabatan', '$foto')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data Berhasil Ditambahkan'); location.href = 'index.php?p=kelola-struktur-divisi&m=kelola-anggota&id=" . $id_divisi . "&nama_divisi=" . $nama_divisi . "';</script>";
    } else {
        echo "<script>alert('Data Berhasil Ditambahkan'); location.href = 'index.php?p=kelola-struktur-divisi&m=kelola-anggota&id=" . $id_divisi . "&nama_divisi=" . $nama_divisi . "';</script>";
    }
    mysqli_close($conn);
}

function hapusDataAnggota($conn, $data, $id_divisi, $nama_divisi)
{
    $id = htmlspecialchars($data['btn-hapus']);
    $query = "DELETE FROM anggota_divisi WHERE id = '$id'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data Berhasil Ditambahkan'); location.href = 'index.php?p=kelola-struktur-divisi&m=kelola-anggota&id=" . $id_divisi . "&nama_divisi=" . $nama_divisi . "';</script>";
    } else {
        echo "<script>alert('Data Berhasil Ditambahkan'); location.href = 'index.php?p=kelola-struktur-divisi&m=kelola-anggota&id=" . $id_divisi . "&nama_divisi=" . $nama_divisi . "';</script>";
    }
    mysqli_close($conn);
}

function editDataAnggota($conn, $data, $id_divisi, $nama_divisi)
{
    $id = htmlspecialchars($data['btn-edit']);
    $id_akun = htmlspecialchars($data['nama']);
    $jabatan = htmlspecialchars($data['jabatan']);

    if ($_FILES['foto']['name'] == null) {
        $foto = htmlspecialchars($data['foto_lama']);
    } else {
        $foto = uploadFoto();
        if (!$foto) {
            return false;
        }
    }


    $query = "UPDATE 
                anggota_divisi 
            SET 
                id_akun = '$id_akun', 
                jabatan = '$jabatan',
                foto = '$foto'
            WHERE 
                id = '$id'";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data Berhasil Diedit'); location.href = 'index.php?p=kelola-struktur-divisi&m=kelola-anggota&id=" . $id_divisi . "&nama_divisi=" . $nama_divisi . "';</script>";
    } else {
        echo "<script>alert('Data Berhasil Diedit'); location.href = 'index.php?p=kelola-struktur-divisi&m=kelola-anggota&id=" . $id_divisi . "&nama_divisi=" . $nama_divisi . "';</script>";
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
