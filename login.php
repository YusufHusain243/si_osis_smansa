<?php
error_reporting(0);
session_start();
if (isset($_SESSION['loginRole'])) {
    switch ($_SESSION['loginRole']) {
        case 'Admin':
            header("Location: admin/index.php");
            break;
        case 'Siswa':
            header("Location: siswa/index.php");
            break;
        case 'Pengurus':
            header("Location: pengurus/index.php");
            break;
        case 'Pembina':
            header("Location: pembina/index.php");
            break;
    }
}
include 'connect.php';

function showData($conn, $query)
{
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

$username = mysqli_real_escape_string($conn, htmlspecialchars($_POST['username']));
$password = mysqli_real_escape_string($conn, htmlspecialchars(md5($_POST['password'])));

if (isset($_POST['login'])) {
    switch ($_POST['role']) {
        case 'Admin':
            $data = showData($conn, "SELECT * FROM akun WHERE username = '$username' AND password = '$password' AND role = 'Admin'");
            if (count($data) > 0) {
                $_SESSION['loginRole'] = 'Admin';
                $_SESSION['idAkun'] = $data[0]['id'];
                echo '<script>
                        alert("Login Berhasil");
                        location.href = "admin/index.php";
                    </script>';
            } else {
                echo '<script>
                        alert("Login Gagal");
                        location.href = "login.php";
                    </script>';
            }
            break;
        case 'Siswa':
            $data = showData($conn, "SELECT * FROM akun WHERE username = '$username' AND password = '$password' AND role = 'Siswa'");
            if (count($data) > 0) {
                $_SESSION['loginRole'] = 'Siswa';
                $_SESSION['idAkun'] = $data[0]['id'];
                echo '<script>
                        alert("Login Berhasil");
                        location.href = "siswa/index.php";
                    </script>';
            } else {
                echo '<script>
                        alert("Login Gagal");
                        location.href = "login.php";
                    </script>';
            }
            break;
        case 'Pengurus':
            $data = showData($conn, "SELECT * FROM akun WHERE username = '$username' AND password = '$password' AND role = 'Pengurus'");
            if (count($data) > 0) {
                $_SESSION['loginRole'] = 'Pengurus';
                $_SESSION['idAkun'] = $data[0]['id'];
                echo '<script>
                            alert("Login Berhasil");
                            location.href = "pengurus/index.php";
                        </script>';
            } else {
                echo '<script>
                            alert("Login Gagal");
                            location.href = "login.php";
                        </script>';
            }
            break;
        case 'Pembina':
            $data = showData($conn, "SELECT * FROM akun WHERE username = '$username' AND password = '$password' AND role = 'Pembina'");
            if (count($data) > 0) {
                $_SESSION['loginRole'] = 'Pembina';
                $_SESSION['idAkun'] = $data[0]['id'];
                echo '<script>
                            alert("Login Berhasil");
                            location.href = "pembina/index.php";
                        </script>';
            } else {
                echo '<script>
                            alert("Login Gagal");
                            location.href = "login.php";
                        </script>';
            }
            break;
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log In | OSIS SMAN 1 Pandih Batu</title>
    <link href="assets-pengunjung/img/Logo_SMAN-1_PB.png" rel="icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets-adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets-adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets-adminlte/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>OSIS</b> SMAN 1 Pandih Batu</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <div class="d-flex justify-content-center mb-3">
                    <img src="assets-pengunjung/img/Logo_SMAN-1_PB.png" alt="" width="150px">
                </div>
                <!-- <h3 class="text-center"><b>OSIS SMAN 1 Pandih Batu</b></h3> -->
                <p class="login-box-msg">Log in to start your session</p>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="role">Login Sebagai</label>
                        <select class="form-control" name="role" id="role">
                            <option value="Siswa">Siswa</option>
                            <option value="Admin">Admin</option>
                            <option value="Pengurus">Pengurus OSIS</option>
                            <option value="Pembina">Guru Pembina OSIS</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" name="login" class="btn btn-primary btn-block">Log In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="assets-adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="assets-adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets-adminlte/dist/js/adminlte.min.js"></script>
</body>

</html>