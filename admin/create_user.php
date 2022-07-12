<?php
session_start();
if (!isset($_SESSION['Akunlogin'])) {
    echo "<script>location='../login.php'</script>";
    include "../login.php";
}
include('../config/cGuru.php');
include('../config/cMurid.php');
include('../config/cCreateUser.php');
include('../config/koneksi.php');
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
                    <div class="container-fluid col-xl-4">
                        <div class="mt-5">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h3 class="card-header text-center">Form Create User</h3>
                                    <div class="card-body text-right">

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">ID</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <select class="custom-select" name="id" id="input-select">
                                                    <?php
                                                    $dt = get_idmurid($db);
                                                    while ($data = mysqli_fetch_array($dt)) {
                                                    ?>
                                                        <option value="<?php echo $data['ID_Murid']; ?>"><?php echo $data['ID_Murid']; ?></option>
                                                    <?php } ?>
                                                    <?php
                                                    $dt = get_idguru($db);
                                                    while ($data = mysqli_fetch_array($dt)) {
                                                    ?>
                                                        <option value="<?php echo $data['ID_Guru']; ?>"><?php echo $data['ID_Guru']; ?></option>
                                                    <?php } ?>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Kepala Sekolah">Kepala Sekolah</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Username</label>
                                            <div class="col-12 col-sm-12 col-lg-6">
                                                <input type="text" name="username" required="" placeholder="Username" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Password</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="password" name="password" placeholder="Password" required="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Role</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <select class="form-control" name="role" id="input-select">
                                                    <option value="Admin">Admin</option>
                                                    <option value="Kepala Sekolah">Kepala Sekolah</option>
                                                    <option value="Guru">Guru</option>
                                                    <option value="Murid">Murid</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                                <button type="submit" name="btncreate" id="btncreate" value="btncreate" class="btn btn-space btn-primary">Submit</button>
                                                <a href="data_user.php" class="btn btn-space btn-secondary">Cancel</a>
                                            </div>
                                        </div>
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
