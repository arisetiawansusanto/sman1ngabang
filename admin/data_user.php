<?php
session_start();
if (!isset($_SESSION['Akunlogin'])) {
    echo "<script>location='../login.php'</script>";
    include "../login.php";
}
include('../config/koneksi.php');
include('../config/cCreateUser.php');
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
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span>
                                    <?php echo $_SESSION['Akunlogin']; ?>
                                </span>
                                <img src="../assets/images/user.png" alt="" class="user-avatar-md rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $_SESSION['Akunlogin']; ?></h5>
                                </div>
                                <a class="dropdown-item" href="../config/logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">SMA 1 NGABANG</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-home"></i>HomePage</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="data_user.php" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-user-plus"></i>Create User</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-list-ul"></i>Input Data</a>
                                <div id="submenu-3" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="data_murid.php">Input Data Murid</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="data_guru.php">Input Data Guru</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="data_pelajaran.php">Input Data Pelajaran</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="data_kelas.php">Input Data Kelas</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="jadwal.php">Input Jadwal</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="jurusan.php">Input Jurusan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="registrasi.php">Input Registrasi</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="tingkat.php">Input Tingkat</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="akademik.php">Input Akademik</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Data User</h2>
                                <div class="page-breadcrumb">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ecommerce-widget">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">

                                                <!-- panggil query -->
                                                <?php $dt = get_alluser($db); ?>

                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">ID</th>
                                                        <th class="border-0">Nama</th>
                                                        <th class="border-0">Password</th>
                                                        <th class="border-0">Email</th>
                                                        <th class="border-0">Jenis User</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- tampilkan data -->
                                                    <?php while ($data = mysqli_fetch_array($dt)) { ?>
                                                        <tr>
                                                            <td><?php echo $data['ID_User']; ?></td>
                                                            <td><?php echo $data['Nama_User']; ?></td>
                                                            <td><?php echo $data['Password_User']; ?></td>
                                                            <td><?php echo $data['Gmail']; ?></td>
                                                            <td><?php echo $data['Jenis_User']; ?></td>
                                                            <td>
                                                                <a href="../admin/edit_user.php?id=<?php echo $data['ID_User']; ?>" class="btn btn-primary float-right">Edit</a>
                                                                <a href="../config/cCreateUser.php?hapusUser=<?php echo $data['ID_User']; ?>" class="btn btn-danger float-right">Hapus</a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    <tr>
                                                        <td colspan="12"><a href="create_user.php" class="btn btn-success float-right text-dark"> <i class="fa fas fa-plus"></i> Tambah User</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center">
                            Copyright © 2022
                        </div>
                    </div>
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