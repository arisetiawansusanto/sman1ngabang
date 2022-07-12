<?php
session_start();
if (!isset($_SESSION['Akunlogin'])) {
    echo "<script>location='../login.php'</script>";
    include "../login.php";
}
include('../config/cMurid.php');
include('../config/cPelajaran.php');
include('../config/cKelas.php');
include('../config/cNilai.php');
include('../config/cRegistrasi.php');
include('../config/cAkademik.php');
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
                    <a class="d-xl-none d-lg-none" href="#">HomePage</a>
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
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-list-ul"></i>Input Data</a>
                                <div id="submenu-3" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="nilai_murid.php">Input Nilai Murid</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="absensi_murid.php">Input Absensi Murid</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="laporan_nilai_murid.php" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-clipboard-list"></i>Laporan Data Nilai Murid</a>
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
                        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h2 class="card-header"><img src="../assets/images/ngabang.jpeg" width="70" height="90"> SMA NEGERI 1 NGABANG </h2>
                                <!-- cetak pdf -->
                                <h5 class="card-header">
                                    Nama : <?php echo get_murid($db, $_GET['id'], 'nama'); ?></br>
                                    Kelas : <?php
                                            echo get_murid($db, $_GET['id'], 'kelas');
                                            ?></br>
                                    Tahun Ajaran : <?php echo get_akademik($db, get_registrasi2($db, $_GET['id'], 'id_akad'), 'semester');
                                                    echo ' ' . get_akademik($db, get_registrasi2($db, $_GET['id'], 'id_akad'), 'tahun'); ?>
                                </h5>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <!-- panggil query -->
                                            <?php $dt = get_detailnilai($db, $_GET['id']);
                                            $no = 1 ?>
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0">No</th>
                                                    <th class="border-0">ID Mata Pelajaran</th>
                                                    <th class="border-0">Mata Pelajaran</th>
                                                    <th class="border-0">Nilai KKM</th>
                                                    <th class="border-0">Nilai Pengetahuan</th>
                                                    <th class="border-0">Nilai Keterampilan</th>
                                                    <th class="border-0">Nilai Akhir</th>
                                                    <th class="border-0">Predikat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- tampilkan data -->
                                                <?php while ($data = mysqli_fetch_array($dt)) { ?>
                                                    <tr>
                                                        <td><?php echo $no; ?></td>
                                                        <td><?php echo $data['ID_Pelajaran']; ?> </td>
                                                        <td><?php echo get_pelajaran($db, $data['ID_Pelajaran'], 'namapelajaran'); ?> </td>
                                                        <td><?php echo $data['kkm']; ?></td>
                                                        <td><?php echo $data['pengetahuan']; ?></td>
                                                        <td><?php echo $data['keterampilan']; ?></td>
                                                        <td>
                                                            <?php $n = $data['pengetahuan'] + $data['keterampilan'];
                                                            echo $nilai = $n / 2;
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($nilai > 80) {
                                                                echo "A";
                                                            } elseif ($nilai > 60) {
                                                                echo "B";
                                                            } elseif ($nilai > 40) {
                                                                echo "C";
                                                            } else {
                                                                echo "D";
                                                            }

                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php $no++;
                                                } ?>
                                                <tr>
                                                    <td colspan="12">
                                                        <a href="../guru/cetak_laporan_nilai_murid.php?id=<?php echo $_GET['id']; ?>" target="blank" class="btn btn-success float-right text-dark"> Cetak Laporan Nilai</a>
                                                    </td>
                                                </tr>
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
</body>

</html>