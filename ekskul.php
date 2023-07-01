<?php

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

$slug = $_GET['slug'];
$ekskul = showData($conn, "SELECT * FROM ekskul");
$konten_ekskul = showData($conn, "SELECT * FROM ekskul WHERE slug = '$slug'");

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
    <link href="assets-pengunjung/img/favicon.png" rel="icon">
    <link href="assets-pengunjung/img/apple-touch-icon.png" rel="apple-touch-icon">

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

    <?php include 'components_pengunjung/navbar_ekskul.php'; ?>

    <main id="main">
        <!-- ======= Blog Section ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Ekstrakurikuler</h2>
                    <ol>
                        <li>Home</li>
                        <li>Ekstrakurikuler</li>
                        <li><?= $konten_ekskul[0]['nama'] ?></li>
                    </ol>
                </div>

            </div>
        </section><!-- End Blog Section -->

        <!-- ======= Blog Single Section ======= -->
        <section id="blog" class="blog">
            <div class="container aos-init aos-animate" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-8 entries">
                        <article class="entry entry-single">
                            <h2 class="entry-title">
                                <a>
                                    <?= $konten_ekskul[0]['nama'] ?>
                                </a>
                            </h2>

                            <div class="entry-content">
                                <p>
                                    <?= $konten_ekskul[0]['konten'] ?>
                                </p>
                            </div>
                        </article>
                    </div><!-- End blog entries list -->

                    <div class="col-lg-4">
                        <div class="sidebar">
                            <h3 class="sidebar-title">Ekskul</h3>
                            <div class="sidebar-item categories">
                                <ul>
                                    <?php
                                    foreach ($ekskul as $e) {
                                    ?>
                                        <li><a href="ekskul.php?slug=<?= $e['slug'] ?>"><?= $e['nama'] ?></a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div><!-- End sidebar categories-->
                        </div><!-- End sidebar -->
                    </div><!-- End blog sidebar -->
                </div>
            </div>
        </section><!-- End Blog Single Section -->
    </main>

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