<?php
session_start();
if (!isset($_SESSION['Akunlogin'])) {
    echo "<script>location='../login.php'</script>";
    include "../login.php";
}
include('../config/cAbsensi.php');
include('../config/cMurid.php');
include('../config/cGuru.php');
include('../config/cKelas.php');
include('../config/cPelajaran.php');
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
    <title>SMA 1 NGABANG</title>
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

                                    <h1 class="h3 mb-3 font-weight-normal text-center">Form Absensi</h1>

                                    <div class="form-group row">
                                        <label for="namaguru" class="col-3 col-lg-2 col-form-label text-right">Nama Guru</label>
                                        <div class="col-9 col-lg-10">
                                            <input readonly name="namaguru" type="text" value="<?php echo get_guru($db, $_SESSION['idguru'], 'nama'); ?>" class="form-control">
                                            <input hidden name="idguru" type="text" value="<?php echo $_SESSION['idguru']; ?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="pelajaran" class="col-3 col-lg-2 col-form-label text-right">Nama Pelajaran</label>
                                        <div class="col-9 col-lg-10">
                                            <select class="custom-select" name="idpelajaran" id="input-select">
                                                <?php
                                                $dt = get_allpelajaran($db);
                                                while ($data = mysqli_fetch_array($dt)) {
                                                ?>
                                                    <option value="<?php echo $data['ID_Pelajaran']; ?>"><?php echo $data['Nama_Pelajaran']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="pelajaran" class="col-3 col-lg-2 col-form-label text-right">Kelas</label>
                                        <div class="col-9 col-lg-10">
                                            <select class="custom-select" name="idkelas" id="input-select">
                                                <?php
                                                $dt = get_allkelas($db);
                                                while ($data = mysqli_fetch_array($dt)) {
                                                ?>
                                                    <option value="<?php echo $data['ID_Kelas']; ?>"><?php echo $data['Nama_Kelas']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnaddjadwaltoday">Buat Absensi</button>
                                        <a href="absensi_murid.php" class="btn btn-lg btn-secondary btn-block">Cancel</a>
                                    </div>

                                </div>
                                <div class="col-12 text-center mb-3">
                                    Copyright ?? 2022
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