<?php
session_start();
include('../config/cMurid.php');
include('../config/cPelajaran.php');
include('../config/cKelas.php');
include('../config/cRegistrasi.php');
include('../config/cAkademik.php');
include('../config/cTingkat.php');
include('../config/cJurusan.php');
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
    <!-- <link rel="manifest" href="src/manifest.webmanifest"></link> -->
    <!-- PWA -->

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
                                <div class="page-breadcrumb">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3 col-xl-3 col-lg-3 col-md-3 col-sm-3"></div>
                        <div class="col-5 col-xl-5 col-lg-5 col-md-5 col-sm-5">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="table">
                                        <table class="table responive">
                                            <!-- panggil query -->
                                            <?php
                                            $dt = get_allmurid2($db, $_SESSION['Akunlogin']);
                                            while ($data = mysqli_fetch_array($dt)) {
                                            ?>
                                                <tbody>
                                                    <td colspan="12">
                                                        <h5 class="card-header text-center"><b> Data Diri Siswa</h5>
                                                    </td>
                                                    <tr>
                                                        <td style="text-indent: 10px;" class="text-dark col-2 col-xl-2 col-lg-2 col-md-2 col-sm-2">ID</td>
                                                        <td class="text-dark col-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 text-right">:</td>
                                                        <td class="col-11 col-xl-11 col-lg-11 col-md-11 col-sm-11"><?php echo $data['ID_Murid']; ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-indent: 10px;" class="text-dark">Nama </td>
                                                        <td class="text-dark col-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 text-right">:</td>
                                                        <td><?php echo $data['Nama_Murid']; ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-indent: 10px;" class="text-dark">Alamat </td>
                                                        <td class="text-dark col-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 text-right">:</td>
                                                        <td><?php echo $data['Alamat_Murid']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-indent: 10px;" class="text-dark">Email </td>
                                                        <td class="text-dark col-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 text-right">:</td>
                                                        <td><?php echo $data['Gmail']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-indent: 10px;" class="text-dark">Telp </td>
                                                        <td class="text-dark col-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 text-right">:</td>
                                                        <td><?php echo $data['Telp']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-indent: 10px;" class="text-dark">Tingkat </td>
                                                        <td class="text-dark col-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 text-right">:</td>
                                                        <td>
                                                            <?php echo get_tingkat($db, get_registrasi($db, $data['ID_Registrasi'], 'tingkat'), 'jenistingkat'); ?>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="text-indent: 10px;" class="text-dark">Jurusan </td>
                                                        <td class="text-dark col-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 text-right">:</td>
                                                        <td>
                                                            <?php echo get_jurusan($db, get_registrasi($db, $data['ID_Registrasi'], 'jurusan'), 'namajurusan'); ?>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="text-indent: 10px;" class="text-dark">Kelas </td>
                                                        <td class="text-dark col-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 text-right">:</td>
                                                        <td>
                                                            <?php echo get_kelas($db, get_registrasi($db, $data['ID_Registrasi'], 'kelas'), 'kelas'); ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-indent: 10px;" class="text-dark">Tahun Registrasi </td>
                                                        <td class="text-dark col-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 text-right">:</td>
                                                        <td><?php
                                                            echo get_akademik($db, get_registrasi2($db, $data['ID_Murid'], 'id_akad'), 'semester');
                                                            echo ' ' . get_akademik($db, get_registrasi2($db, $data['ID_Murid'], 'id_akad'), 'tahun'); ?>
                                                        </td>
                                                    </tr>
                                                    <td colspan="12">
                                                        <a href="../murid/cetak_laporan_data_murid.php?id=<?php echo $_SESSION['Akunlogin']; ?>&regis=<?php echo $data['ID_Registrasi']; ?>" target="blank" class="btn btn-success float-right text-dark"> Cetak Data</a>
                                                    </td>
                                                <?php } ?>
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ecommerce-widget">
                        <div class="row">

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