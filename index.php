<?php
session_start();
include('config/cCreateUser.php');
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#009578">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">

    <!-- PWA -->
    <link rel="stylesheet" href="pwa/src/master.css">
    <link rel="manifest" href="pwa/src/manifest.json">
    </link>
    <link rel="apple-touch-icon" href="pwa/img/icons.png">
    <!-- <link rel="manifest" href="src/manifest.webmanifest"></link> -->
    <!-- PWA -->

    <title>SMA 1 NGABANG</title>
</head>

<body>
    <div class="dashboard-main-wrapper">
        <div class="dashboard-header">
            <nav class="navbar navbar-expand bg-white fixed-top">
                <a class="navbar-brand" href="login.php">SMA 1 NGABANG</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        </div>
        </nav>
    </div>
    <div class="dashboard-header">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content">
                <form action="" class="form-signin" class="needs-validation" method="POST" type="submit">
                    <div class="container-fluid col-xl-3">
                        <div class="mt-5 pt-5">
                            <div class="card mt-5">
                                <div class="card-body text-center mb-1">

                                    <img src="assets/images/ngabang.jpeg" alt="">

                                    <h1 class="h3 mb-3 font-weight-normal">Selamat Datang</h1>

                                    <label for="username" class="sr-only">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Username" required autofocus="">

                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password" required="validasi">

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <a href="admin/lupa_pass.php">Lupa Password</a>
                                    </div>

                                    <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnlogin" value="btnlogin">Login</button>

                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center mb-3">
                                    Copyright © 2022
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>

    <!-- PWA -->
    <script src="pwa/src/index.js"></script>

</body>

</html>