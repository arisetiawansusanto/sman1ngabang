<?php
session_start();
if (!isset($_SESSION['Akunlogin'])) {
    echo "<script>location='../login.php'</script>";
    include "../login.php";
}
include('../config/cJadwal.php');
include('../config/cKelas.php');
include('../config/cGuru.php');
include('../config/cPelajaran.php');
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
    <title>Input Jadwal</title>
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

                                    <h1 class="h3 mb-3 font-weight-normal text-center">Form Input Jadwal</h1>

                                    <div class="form-group row">
                                        <label for="ajaran" class="col-3 col-lg-2 col-form-label text-right">Tahun Pelajaran</label>
                                        <div class="col-9 col-lg-10">
                                            <select class="custom-select" name="ajaran" id="input-select">
                                                <?php
                                                $dt = get_allAkademik($db);
                                                while ($data = mysqli_fetch_array($dt)) {
                                                ?>
                                                    <option value="<?php echo $data['id']; ?>"><?php echo get_akademik($db, $data['id'], 'semester');
                                                                                                echo ' ' . get_akademik($db, $data['id'], 'tahun'); ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="namapelajaran" class="col-3 col-lg-2 col-form-label text-right">Nama Pelajaran</label>
                                        <div class="col-9 col-lg-10">
                                            <select class="custom-select" name="namapelajaran" id="input-select">
                                                <?php
                                                $dt = get_idpelajaran($db);
                                                while ($data = mysqli_fetch_array($dt)) {
                                                ?>
                                                    <option value="<?php echo get_pelajaran($db, $data['ID_Pelajaran'], 'namapelajaran'); ?>"><?php echo get_pelajaran($db, $data['ID_Pelajaran'], 'namapelajaran'); ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="namaguru" class="col-3 col-lg-2 col-form-label text-right">Nama Guru</label>
                                        <div class="col-9 col-lg-10">
                                            <select class="custom-select" name="namaguru" id="input-select">
                                                <?php
                                                $dt = get_idguru($db);
                                                while ($data = mysqli_fetch_array($dt)) {
                                                ?>
                                                    <option value="<?php echo get_guru($db, $data['ID_Guru'], 'nama'); ?>"><?php echo get_guru($db, $data['ID_Guru'], 'nama'); ?></option>
                                                <?php } ?>
                                            </select>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="hari" class="col-3 col-lg-2 col-form-label text-right">Hari</label>
                                        <div class="col-9 col-lg-10">
                                            <select class="custom-select" name="hari" id="input-select">
                                                <option value="Senin">Senin</option>
                                                <option value="Selasa">Selasa</option>
                                                <option value="Rabu">Rabu</option>
                                                <option value="Kamis">Kamis</option>
                                                <option value="Jumat">Jumat</option>
                                                <option value="Sabtu">Sabtu</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="waktumulai" class="col-2 col-lg-2 col-form-label text-right">Waktu Mulai</label>
                                        <div class="col-4 col-lg-4">
                                            <input id="waktumulai" name="waktumulai" type="time" required="" class="form-control">
                                        </div>

                                        <label for="waktuselesai" class="col-2 col-lg-2 col-form-label text-right">Sampai</label>
                                        <div class="col-4 col-lg-4">
                                            <input id="waktuselesai" name="waktuselesai" type="time" required="" class="form-control">
                                        </div>
                                    </div>

                                    <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnjadwal">Save</button>
                                    <a href="jadwal.php" class="btn btn-lg btn-secondary btn-block">Cancel</a>

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