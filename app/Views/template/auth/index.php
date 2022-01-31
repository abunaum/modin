<!DOCTYPE html>
<html lang="en">

<head>
    <title>Modin Login</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Modin Login">
    <meta name="author" content="Abunaum">
    <link rel="shortcut icon" href="https://avatars.githubusercontent.com/u/70275608">

    <!-- FontAwesome JS-->
    <script defer src="https://cdn.jsdelivr.net/gh/xriley/portal-theme-bs5@master/assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="https://cdn.jsdelivr.net/gh/xriley/portal-theme-bs5@master/assets/css/portal.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="app app-login p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <?= $this->renderSection('content'); ?>

                </div>
                <!--//auth-body-->

                <footer class="app-auth-footer">
                    <div class="container text-center py-3">
                        <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
                        <small class="copyright">Designed with <i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="http://facebook.com/ahmad.yani.ardath" target="_blank">Abunaum</a></small>

                    </div>
                </footer>
                <!--//app-auth-footer-->
            </div>
            <!--//flex-column-->
        </div>
        <!--//auth-main-col-->

    </div>
    <!--//row-->


</body>

</html>