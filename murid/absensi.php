<?php
session_start();
include('../config/cMurid.php');
include('../config/cAbsensi.php');
include('../config/cPelajaran.php');
include('../config/cGuru.php');
include('../config/cKelas.php');
include('../config/cNilai.php');
include('../config/koneksi.php');

if (!isset($_SESSION['Akunlogin'])) {
    echo "<script>location='../login.php'</script>";
    include "../login.php";
}
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


    <!-- PWA -->
    <link rel="stylesheet" href="../pwa/src/master.css">
    <link rel="manifest" href="../pwa/src/manifest.json">
    </link>
    <link rel="apple-touch-icon" href="../pwa/img/icons.png">
    <title>SMA 1 NGABANG</title>
</head>

<body>
    <div class="dashboard-main-wrapper">
        <div class="dashboard-header">
            <nav class="navbar navbar-expand bg-white fixed-top">
                <a class="navbar-brand" href="index.php">SMA 1 NGABANG</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span>
                                    <?php echo $_SESSION['Namamurid']; ?>
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
                                <a class="nav-link" href="nilai_murid.php" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-chart-area"></i>Nilai</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="absensi.php" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-clipboard-list"></i>Absensi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="data_murid.php" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-user"></i>Data Murid</a>
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
                                <h2 class="pageheader-title">Data Absensi</h2>
                                <div class="page-breadcrumb">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <!-- panggil query -->
                                            <?php
                                            $dt = get_allabsensiByMurid($db, $_SESSION['Akunlogin']);
                                            $no = 1;
                                            ?>

                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0">No</th>
                                                    <th class="border-0">Mata Pelajaran</th>
                                                    <th class="border-0">ID Guru</th>
                                                    <th class="border-0">Nama Guru</th>
                                                    <th class="border-0">Tanggal</th>
                                                    <th class="border-0">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- tampilkan data -->
                                                <?php while ($data = mysqli_fetch_array($dt)) { ?>
                                                    <tr>
                                                        <td><?php echo $no; ?></td>
                                                        <td><?php echo $data['ID_Pelajaran']; ?></td>
                                                        <td><?php echo $data['ID_Guru']; ?></td>
                                                        <td><?php echo get_guru($db, $data['ID_Guru'], 'nama'); ?></td>
                                                        <td><?php echo $data['Tanggal']; ?></td>
                                                        <td><?php echo $data['Status']; ?></td>
                                                    </tr>
                                                <?php $no++;
                                                } ?>
                                                <td colspan="12">
                                                    <a href="../murid/cetak_laporan_absensi_murid.php?id=<?php echo $_SESSION['Akunlogin']; ?>" target="blank" class="btn btn-success float-right text-dark"> Cetak Laporan Absensi</a>
                                                </td>
                                            </tbody>
                                        </table>
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

    <!-- PWA -->
    <script src="../pwa/src/index.js"></script>

</body>

</html>