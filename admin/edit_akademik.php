<?php
include('../config/cPelajaran.php');
include('../config/cTingkat.php');
include('../config/cAkademik.php');
include('../config/koneksi.php');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="../assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>Input Jurusan</title>
</head>

<body>
    <div class="dashboard-main-wrapper">
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.php">SMA 1 NGABANG</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
        </div>
    </div>
    <div class="dashboard-header">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content">
                <form action="" class="form-signin" class="needs-validation" method="POST" type="submit">
                    <div class="container-fluid col-xl-6">
                        <div class="mt-5">
                            <div class="card mt-5">
                                <div class="card-body mb-1">

                                    <h1 class="h3 mb-3 font-weight-normal text-center">Form Input Registrasi</h1>

                                    <div class="form-group row">
                                        <label for="tahun" class="col-3 col-lg-2 col-form-label text-right">Id</label>
                                        <div class="col-9 col-lg-10">
                                            <input readonly class="form-control" name="id" type="text" required="" value="<?php echo get_akademik($db, $_GET['id'], 'id'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tahun" class="col-3 col-lg-2 col-form-label text-right">Tahun</label>
                                        <div class="col-9 col-lg-10">
                                            <input autocomplete="off" class="form-control" name="tahun" type="text" required="" value="<?php echo get_akademik($db, $_GET['id'], 'tahun'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tahun" class="col-3 col-lg-2 col-form-label text-right">Semester</label>
                                        <div class="col-9 col-lg-10">
                                            <input autocomplete="off" class="form-control" name="semester" type="text" required="" value="<?php echo get_akademik($db, $_GET['id'], 'semester'); ?>">
                                        </div>
                                    </div>

                                    <button class="btn btn-lg btn-primary btn-block" type="submit" value="<?php echo get_akademik($db, $_GET['id'], 'id'); ?>" name="btneditakademik">Save</button>
                                    <a href="akademik.php" class="btn btn-lg btn-secondary btn-block">Cancel</a>

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