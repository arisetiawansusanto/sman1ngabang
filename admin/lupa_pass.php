<?php
session_start();
include('../config/cCreateUser.php');
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="../assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>SMA 1 NGABANG</title>
</head>

<body>
    <div class="dashboard-main-wrapper">
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="../">SMA 1 NGABANG</a>
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
                    <div class="container-fluid col-xl-3"">
                            <div class=" mt-5 pt-5">
                        <div class="card mt-5">
                            <div class="card-body text-center mb-1">

                                <h1 class="h3 mb-3 font-weight-normal">Lupa Password</h1>

                                <div class="form-group row">
                                    <div class="col-9 col-lg-12">
                                        <input type="text" id="username" class="form-control" name="username" placeholder="Username" required autofocus="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-9 col-lg-12">
                                        <input type="password" id="Password" class="form-control" name="passwordlama" placeholder="Password Lama" required="validasi">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-9 col-lg-12">
                                        <input type="password" id="Password" class="form-control" name="password" placeholder="Password Baru" required="validasi">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnlupapass" value="btnlupapass">Konfirmasi</button>
                                    <a href="../" class="btn btn-lg btn-secondary btn-block">Cancel</a>
                                </div>
                            </div>
                            <div class="col-12 text-center mb-3">
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
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
    <script src="../assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <script src="../assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <script src="../assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="../assets/vendor/charts/morris-bundle/morris.js"></script>
    <script src="../assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="../assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="../assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="../assets/libs/js/dashboard-ecommerce.js"></script>
</body>

</html>