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
    $id_ketua = htmlspecialchars($data['nama_ketua']);
    $id_wakil_ketua = htmlspecialchars($data['nama_wakil_ketua']);
    $no_urut = htmlspecialchars($data['no_urut']);
    $kelas_ketua = htmlspecialchars($data['kelas_ketua']);
    $kelas_wakil = htmlspecialchars($data['kelas_wakil']);

    $foto = uploadFoto();
    if (!$foto) {
        return false;
    }
    $visi = htmlspecialchars($data['visi']);
    $misi = htmlspecialchars($data['misi']);

    $query = "INSERT INTO kandidat VALUES ('', '$id_ketua', '$id_wakil_ketua', '$no_urut', '$visi', '$misi', '$foto', '$kelas_ketua', '$kelas_wakil')";
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Ditambahkan"); location.href = "index.php?p=kelola-kandidat&m=kelola-kandidat";</script>';
    } else {
        echo '<script>alert("Data Gagal Ditambahkan"); location.href = "index.php?p=kelola-kandidat&m=kelola-kandidat";</script>';
    }
    mysqli_close($conn);
}

function hapusData($conn, $data)
{
    $id = htmlspecialchars($data['btn-hapus']);
    $query = "DELETE FROM kandidat WHERE id = '$id'";
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Dihapus"); location.href = "index.php?p=kelola-kandidat&m=kelola-kandidat";</script>';
    } else {
        echo '<script>alert("Data Gagal Dihapus"); location.href = "index.php?p=kelola-kandidat&m=kelola-kandidat";</script>';
    }
    mysqli_close($conn);
}

function editData($conn, $data)
{
    $id = htmlspecialchars($data['btn-edit']);
    $id_ketua = htmlspecialchars($data['nama_ketua']);
    $id_wakil_ketua = htmlspecialchars($data['nama_wakil_ketua']);
    $no_urut = htmlspecialchars($data['no_urut']);
    $kelas_ketua = htmlspecialchars($data['kelas_ketua']);
    $kelas_wakil = htmlspecialchars($data['kelas_wakil']);
    $visi = htmlspecialchars($data['visi']);
    $misi = htmlspecialchars($data['misi']);

    if ($_FILES['foto']['name'] == null) {
        $foto = htmlspecialchars($data['foto']);
    } else {
        $foto = uploadFoto();
        if (!$foto) {
            return false;
        }
    }


    $query = "UPDATE 
                kandidat 
            SET 
                id_ketua = '$id_ketua', 
                id_wakil = '$id_wakil_ketua', 
                no_urut = '$no_urut', 
                kelas_ketua = '$kelas_ketua', 
                kelas_wakil = '$kelas_wakil',
                foto = '$foto',
                visi = '$visi',
                misi = '$misi'
            WHERE 
                id = '$id'";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Diedit"); location.href = "index.php?p=kelola-kandidat&m=kelola-kandidat";</script>';
    } else {
        echo '<script>alert("Data Gagal Diedit"); location.href = "index.php?p=kelola-kandidat&m=kelola-kandidat";</script>';
    }
    mysqli_close($conn);
}

function durasi($conn, $data)
{
    $tgl_mulai = htmlspecialchars($data['tgl_mulai']);
    $tgl_berakhir = htmlspecialchars($data['tgl_berakhir']);
    $jam_mulai = htmlspecialchars($data['jam_mulai']);
    $jam_berakhir = htmlspecialchars($data['jam_berakhir']);

    $cek = showData($conn, "SELECT * FROM durasi_voting");

    if (count($cek) > 0) {
        $id = $cek[0]['id'];
        $query = "UPDATE durasi_voting SET tanggal_mulai = '$tgl_mulai', tanggal_berakhir = '$tgl_berakhir', jam_mulai='$jam_mulai', jam_berakhir = '$jam_berakhir' WHERE id = $id";
        if (mysqli_query($conn, $query)) {
            echo '<script>alert("Data Berhasil Disubmit"); location.href = "index.php?p=kelola-kandidat&m=kelola-kandidat";</script>';
        } else {
            echo '<script>alert("Data Gagal Disubmit"); location.href = "index.php?p=kelola-kandidat&m=kelola-kandidat";</script>';
        }
        mysqli_close($conn);
    } else {
        $query = "INSERT INTO durasi_voting VALUES ('', '$tgl_mulai', '$tgl_berakhir', '$jam_mulai', '$jam_berakhir')";
        if (mysqli_query($conn, $query)) {
            echo '<script>alert("Data Berhasil Disubmit"); location.href = "index.php?p=kelola-kandidat&m=kelola-kandidat";</script>';
        } else {
            echo '<script>alert("Data Gagal Disubmit"); location.href = "index.php?p=kelola-kandidat&m=kelola-kandidat";</script>';
        }
        mysqli_close($conn);
    }
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
