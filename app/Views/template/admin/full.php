<!DOCTYPE html>
<html lang="en">

<head>
    <title>Modin - <?= $judul; ?></title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Modin App">
    <meta name="author" content="Abunaum">
    <link rel="shortcut icon" href="https://avatars.githubusercontent.com/u/70275608">

    <!-- FontAwesome JS-->
    <script defer src="https://cdn.jsdelivr.net/gh/xriley/portal-theme-bs5@master/assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="https://cdn.jsdelivr.net/gh/xriley/portal-theme-bs5@master/assets/css/portal.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="app">
    <header class="app-header fixed-top">

        <?= $this->include('template/admin/topbar') ?>
        <?= $this->include('template/admin/sidebar') ?>

    </header>

    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <?= $this->renderSection('content'); ?>

            </div>
            <!--//container-fluid-->
        </div>
        <!--//app-content-->

        <footer class="app-footer">
            <div class="container text-center py-3">
                <small class="copyright">Designed with <i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="http://facebook.com/ahmad.yani.ardath" target="_blank">Abunaum</a></small>

            </div>
        </footer>
        <!--//app-footer-->

    </div>
    <!--//app-wrapper-->


    <!-- Javascript -->
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/xriley/portal-theme-bs5@master/assets/plugins/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/xriley/portal-theme-bs5@master/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Charts JS -->
    <script src="https://cdn.jsdelivr.net/gh/xriley/portal-theme-bs5@master/assets/plugins/chart.js/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/xriley/portal-theme-bs5@master/assets/js/index-charts.js"></script>

    <!-- Page Specific JS -->
    <script src="https://cdn.jsdelivr.net/gh/xriley/portal-theme-bs5@master/assets/js/app.js"></script>

</body>

</html>