<?php

require '../vendor/autoload.php';

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
    $username = mysqli_real_escape_string($conn, htmlspecialchars($data['nisn']));
    $password = mysqli_real_escape_string($conn, htmlspecialchars(md5($data['password'])));
    $nama = htmlspecialchars($data['nama']);
    $tempat_lahir = htmlspecialchars($data['tempat_lahir']);
    $tgl_lahir = htmlspecialchars($data['tgl_lahir']);
    $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
    $alamat = htmlspecialchars($data['alamat']);

    $query = "INSERT INTO akun VALUES ('', '$username', '$password', 'Siswa', '$nama', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$alamat')";
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Ditambahkan"); location.href = "index.php?p=kelola-daftar-pemilih&m=kelola-daftar-pemilih";</script>';
    } else {
        echo '<script>alert("Data Gagal Ditambahkan"); location.href = "index.php?p=kelola-daftar-pemilih&m=kelola-daftar-pemilih";</script>';
    }
    mysqli_close($conn);
}

function hapusData($conn, $data)
{
    $id = htmlspecialchars($data['btn-hapus']);
    $query = "DELETE FROM akun WHERE id = '$id'";
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Dihapus"); location.href = "index.php?p=kelola-daftar-pemilih&m=kelola-daftar-pemilih";</script>';
    } else {
        echo '<script>alert("Data Gagal Dihapus"); location.href = "index.php?p=kelola-daftar-pemilih&m=kelola-daftar-pemilih";</script>';
    }
    mysqli_close($conn);
}

function resetData($conn)
{
    $query = "DELETE FROM akun WHERE role = 'Siswa'";
    $query2 = "DELETE FROM durasi_voting";
    if (mysqli_query($conn, $query) && mysqli_query($conn, $query2)) {
        echo '<script>alert("Data Berhasil Direset"); location.href = "index.php?p=kelola-daftar-pemilih&m=kelola-daftar-pemilih";</script>';
    } else {
        echo '<script>alert("Data Gagal Direset"); location.href = "index.php?p=kelola-daftar-pemilih&m=kelola-daftar-pemilih";</script>';
    }
    mysqli_close($conn);
}

function editData($conn, $data)
{
    $id = htmlspecialchars($data['btn-edit']);
    $username = mysqli_real_escape_string($conn, htmlspecialchars($data['nisn']));
    $password = mysqli_real_escape_string($conn, htmlspecialchars(md5($data['password'])));
    $nama = htmlspecialchars($data['nama']);
    $tempat_lahir = htmlspecialchars($data['tempat_lahir']);
    $tgl_lahir = htmlspecialchars($data['tgl_lahir']);
    $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
    $alamat = htmlspecialchars($data['alamat']);

    $query = "UPDATE 
                akun 
            SET 
                nama = '$nama', 
                username = '$username',
                password = '$password',
                tempat_lahir = '$tempat_lahir',
                tgl_lahir = '$tgl_lahir',
                jenis_kelamin = '$jenis_kelamin',
                alamat = '$alamat',
            WHERE 
                id = '$id'";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Diedit"); location.href = "index.php?p=kelola-daftar-pemilih&m=kelola-daftar-pemilih";</script>';
    } else {
        echo '<script>alert("Data Gagal Diedit"); location.href = "index.php?p=kelola-daftar-pemilih&m=kelola-daftar-pemilih";</script>';
    }
    mysqli_close($conn);
}

function importData($conn, $data)
{
    $err = '';
    $ekstensi = '';

    $file_name = $_FILES['file']['name'];
    $file_data = $_FILES['file']['tmp_name'];


    if (empty($file_name)) {
        $err .= "<li>Silahkan Masukkan File</li>";
    } else {
        $ekstensi = pathinfo($file_name)['extension'];
    }

    $ekstensi_allowed = array("xls", "xlsx");

    if (!in_array($ekstensi, $ekstensi_allowed)) {
        $err .= "<li>Masukkan File Dengan Type XLS atau XLSX</li>";
    }

    if (empty($err)) {
        $reader =  \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file_data);
        $spreadsheet = $reader->load($file_data);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        print_r(count($sheetData));
        die;
        
        for ($i = 1; $i < count($sheetData); $i++) {
            $nama = $sheetData[$i]['2'];
            $username = $sheetData[$i]['1'];
            $password = md5($sheetData[$i]['1']);
            $tempat_lahir = $sheetData[$i]['3'];
            $tgl_lahir = $sheetData[$i]['4'];
            $jenis_kelamin = $sheetData[$i]['5'];
            $alamat = $sheetData[$i]['7'];
            $role = 'Siswa';

            $query = "INSERT INTO akun VALUES ('', '$username', '$password', '$role', '$nama', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$alamat')";

            // if (mysqli_query($conn, $query)) {
            //     echo '<script>alert("Data Berhasil Diimport"); location.href = "index.php?p=kelola-daftar-pemilih&m=kelola-daftar-pemilih";</script>';
            // } else {
            //     echo '<script>alert("Data Gagal Diimport"); location.href = "index.php?p=kelola-daftar-pemilih&m=kelola-daftar-pemilih";</script>';
            // }
            mysqli_query($conn, $query);
        }
    }

    if ($err) {
        echo '<script>alert("Data Gagal Diimport"); location.href = "index.php?p=kelola-daftar-pemilih&m=kelola-daftar-pemilih";</script>';
    } else {
        echo '<script>alert("Data Berhasil Diimport"); location.href = "index.php?p=kelola-daftar-pemilih&m=kelola-daftar-pemilih";</script>';
    }
}
