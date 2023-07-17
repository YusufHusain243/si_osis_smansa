<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
if (!isset($_SESSION['loginRole'])) {
    header("Location: ../login.php");
} else {
    if ($_SESSION['loginRole'] != 'Admin') {
        header("Location: ../login.php");
    }
}
include '../connect.php';

// untuk mengambil sekarang ada di page mana
$p = isset($_GET['p']) ? $_GET['p'] : 'dashboard';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | OSIS SMAN 1 Pandih Batu</title>

    <link href="../assets-pengunjung/img/Logo_SMAN-1_PB.png" rel="icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets-adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../assets-adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../assets-adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../assets-adminlte/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets-adminlte/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../assets-adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../assets-adminlte/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../assets-adminlte/plugins/summernote/summernote-bs4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../assets-adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets-adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets-adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include('components/navbar.php'); ?>
        <?php include('components/sidebar.php'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Untuk mengatur url pages -->
            <?php
            $pages_dir = 'pages/' . $p;
            if (!empty($_GET['p']) && !empty($_GET['m'])) {
                $pages = scandir($pages_dir, 0);
                unset($pages[0], $pages[1]);
                $p = $_GET['p'];
                $m = $_GET['m'];
                if (in_array($p . '.php', $pages)) {
                    include($pages_dir . '/' . $m . '.php');
                } else {
                    echo 'Halaman Tidak Ditemukan';
                }
            } else {
                include($pages_dir . '/dashboard.php');
            }
            ?>
        </div>

        <?php include('components/footer.php') ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../assets-adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../assets-adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="../assets-adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../assets-adminlte/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../assets-adminlte/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="../assets-adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../assets-adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../assets-adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../assets-adminlte/plugins/moment/moment.min.js"></script>
    <script src="../assets-adminlte/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../assets-adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../assets-adminlte/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../assets-adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets-adminlte/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="../assets-adminlte/dist/js/demo.js"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../assets-adminlte/dist/js/pages/dashboard.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="../assets-adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets-adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assets-adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../assets-adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../assets-adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../assets-adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../assets-adminlte/plugins/jszip/jszip.min.js"></script>
    <script src="../assets-adminlte/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../assets-adminlte/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../assets-adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../assets-adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../assets-adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <!-- preview image -->
    <script>
        function previewAdd() {
            selectImage = document.getElementById('selectImage');
            preview = document.getElementById('preview');
            preview.style.display = 'block';
            const [file] = selectImage.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }

        function previewEdit(id) {
            selectImageEdit = document.getElementById('selectImageEdit-' + id);
            previewEdit = document.getElementById('preview-edit-' + id);
            previewEdit.style.display = 'block';
            const [file] = selectImageEdit.files
            if (file) {
                previewEdit.src = URL.createObjectURL(file)
            }
        }
    </script>

    <script>
        $(function() {
            // Summernote
            $('#summernote, #summernote2').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <script>
        var ctx = document.getElementById("visitors-chart").getContext("2d");

        const data = {
            labels: <?= json_encode($labelChart) ?>,
            datasets: [{
                type: 'bar',
                label: 'PEROLEHAN SUARA',
                data: <?= json_encode($valueChart) ?>,
                borderColor: 'rgb(255, 99, 132)',
                backgroundColor: '#007bff'
            }, ]
        };

        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>

</html>