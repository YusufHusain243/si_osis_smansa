<?php

error_reporting(0);
date_default_timezone_set("Asia/Jakarta");
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

$ekskul = showData($conn, "SELECT * FROM ekskul");
$about = showData($conn, "SELECT * FROM about");
$visi_misi = showData($conn, "SELECT * FROM visi_misi");
$struktur_organisasi = showData($conn, "SELECT struktur_inti.*, akun.nama FROM struktur_inti INNER JOIN akun ON struktur_inti.id_akun = akun.id");
$galeri = showData($conn, "SELECT * FROM galeri");
$kontak = showData($conn, "SELECT * FROM kontak");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Website OSIS SMA Negeri 1 Pandih Batu</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets-pengunjung/img/Logo_SMAN-1_PB.png" rel="icon">
  <!-- <link href="assets-pengunjung/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets-pengunjung/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets-pengunjung/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets-pengunjung/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets-pengunjung/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets-pengunjung/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets-pengunjung/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets-pengunjung/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets-pengunjung/css/style1.css" rel="stylesheet">
</head>

<body>

  <?php include 'components_pengunjung/navbar.php'; ?>

  <!-- ======= Hero No Slider Section ======= -->
  <section id="hero-no-slider" class="d-flex justify-cntent-center align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-xl-8">
          <h2>Selamat Datang di Website OSIS SMA Negeri 1 Pandih Batu</h2>
        </div>
      </div>
    </div>
  </section><!-- End Hero No Slider Sectio -->

  <main id="main">

    <?php include 'components_pengunjung/about.php'; ?>

    <?php include 'components_pengunjung/visi_misi.php'; ?>

    <?php include 'components_pengunjung/struktur_organisasi.php'; ?>

    <?php include 'components_pengunjung/galleri.php'; ?>

    <?php include 'components_pengunjung/contact.php'; ?>

  </main><!-- End #main -->

  <?php include 'components_pengunjung/footer.php'; ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets-pengunjung/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets-pengunjung/vendor/aos/aos.js"></script>
  <script src="assets-pengunjung/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets-pengunjung/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets-pengunjung/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets-pengunjung/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets-pengunjung/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets-pengunjung/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets-pengunjung/js/main.js"></script>

</body>

</html>