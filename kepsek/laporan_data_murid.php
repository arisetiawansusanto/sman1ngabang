<?php
session_start();
include('../config/koneksi.php');
include('../config/cMurid.php');
include('../config/cRegistrasi.php');
include('../config/cAkademik.php');
include('../config/cJurusan.php');
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
                                    Kepala Sekolah
                                </span>
                                <img src="../assets/images/user.png" alt="" class="user-avatar-md rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">Kepala Sekolah</h5>
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
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3">
                                    <i class="fas fa-clipboard-list"></i>Laporan</a>
                                <div id="submenu-3" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="laporan_data_guru.php"> Data Guru</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="laporan_data_murid.php"> Data Murid</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="laporan_data_nilai_murid.php"> Data Nilai Murid</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="laporan_data_kelas.php"> Data Kelas</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="laporan_data_absensi_murid.php"> Data Absensi Murid</a>
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
                                <h2 class="pageheader-title">Kepala Sekolah</h2>
                                <div class="page-breadcrumb">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ecommerce-widget">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h2 class="card-header"><img src="../assets/images/ngabang.jpeg" width="70" height="90"> SMA NEGERI 1 NGABANG </h2>
                                    <form method="POST" action="">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h5 class="card-header">Data Murid</h5>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="email-search">
                                                    <div class="input-group input-search">
                                                        <select class="form-control" name="regis">
                                                            <option value="0">--Pilih Tahun--</option>
                                                            <?php
                                                            $dt = get_allAkademik($db);
                                                            while ($data = mysqli_fetch_array($dt)) {
                                                            ?>
                                                                <option value="<?php echo $data['id']; ?>"><?php echo $data['semester'];
                                                                                                            echo ' ' .  $data['tahun']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="email-search">
                                                    <div class="input-group input-search">
                                                        <select class="form-control" name="jurusan">
                                                            <option value="0">-- IPA/IPS --</option>
                                                            <?php
                                                            $dt = get_alljurusan($db);
                                                            while ($data = mysqli_fetch_array($dt)) {
                                                            ?>
                                                                <option value="<?php echo $data['ID_Jurusan']; ?>"><?php echo $data['Nama_Jurusan']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <button class="btn btn-success float-right text-dark" id="filter" name="filter"><i class="fas fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">

                                                <!-- panggil query -->
                                                <?php
                                                $no = 1;
                                                if (isset($_POST['filter'])) {
                                                    $regis = 0;
                                                    $jurusan = 0;

                                                    $regis = $_POST['regis'];
                                                    $jurusan = $_POST['jurusan'];

                                                    if ($regis == 0 and $jurusan > 0) {
                                                        $dt = get_allmuridByKelas($db, $jurusan);
                                                    } elseif ($regis > 0 and $jurusan == 0) {
                                                        $dt = get_allmuridByRegis($db, $regis);
                                                    } elseif ($regis > 0 and $jurusan > 0) {
                                                        $dt = get_allmuridByRegisJurusan($db, $regis, $jurusan);
                                                    } else {

                                                        $dt = get_allmurid($db);
                                                    }
                                                } else {
                                                    $dt = get_allmurid($db);
                                                }
                                                ?>

                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">No</th>
                                                        <th class="border-0">ID Murid</th>
                                                        <th class="border-0">Nama</th>
                                                        <th class="border-0">Gmail</th>
                                                        <th class="border-0">Alamat</th>
                                                        <th class="border-0">Telp</th>
                                                        <th class="border-0">Tahun Ajaran</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- tampilkan data -->
                                                    <?php while ($data = mysqli_fetch_array($dt)) { ?>
                                                        <tr>
                                                            <td><?php echo $no; ?></td>
                                                            <td><?php echo $data['ID_Murid']; ?></td>
                                                            <td><?php echo $data['Nama_Murid']; ?></td>
                                                            <td><?php echo $data['Alamat_Murid']; ?></td>
                                                            <td><?php echo $data['Gmail']; ?></td>
                                                            <td><?php echo $data['Telp']; ?></td>
                                                            <td>
                                                                <?php
                                                                $data = get_registrasiById($db, $data['ID_Murid']);
                                                                $query = mysqli_query($db, $data);
                                                                $data = mysqli_fetch_array($query);
                                                                if (mysqli_num_rows($query) > 0) {
                                                                    echo get_akademik($db, get_registrasi2($db, $data['ID_Murid'], 'id_akad'), 'semester');
                                                                    echo ' ' . get_akademik($db, get_registrasi2($db, $data['ID_Murid'], 'id_akad'), 'tahun');
                                                                } else {
                                                                    echo 'Belum regis';
                                                                }

                                                                ?>
                                                            </td>
                                                        </tr>
                                                    <?php $no++;
                                                    } ?>
                                                    <td colspan="12">
                                                        <a href="../kepsek/cetak_murid.php?jurusan=<?php echo $jurusan; ?>&regis=<?php echo $regis; ?>" target="blank" class="btn btn-success float-right text-dark"> Cetak Laporan Murid</a>
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