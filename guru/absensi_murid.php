<?php
session_start();
if (!isset($_SESSION['Akunlogin'])) {
    echo "<script>location='../login.php'</script>";
    include "../login.php";
}
include('../config/cAbsensi.php');
include('../config/cKelas.php');
include('../config/cMurid.php');
include('../config/cGuru.php');
include('../config/cPelajaran.php');
include('../config/koneksi.php');
$kelas = '0';
$mapel = '0';
$tanggal = '0000-00-00';
$status = 'Hadir';

if (isset($_POST['btnstatus'])) {

    $status =  $_COOKIE['status'];
    $kode = $_POST['btnstatus'];
    $query = "UPDATE tbl_absensi SET Status = '$status' WHERE Kode = '$kode'";
    $result = mysqli_query($db, $query);
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/circular-std/style.css">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>SMA 1 NGABANG</title>
</head>

<body>
    <div class="dashboard-main-wrapper">
        <div class="dashboard-header">
            <nav class="nav navbar-expand-lg bg-white fixed-top">
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
                                    <h5 class="mb-0 text-white nav-user-name">Guru</h5>
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
                                <a class="nav-link" href="laporan_data_nilai_murid.php" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-clipboard-list"></i>Laporan Data Nilai Murid</a>
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
                                <h2 class="pageheader-title">Data Absensi Murid</h2>
                            </div>
                        </div>
                    </div>
                    <div class="ecommerce-widget">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <form method="POST" action="">
                                <div class="row">
                                    <div class="col-lg-5">
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="email-search">
                                            <div class="input-group input-search">
                                                <select class="form-control" name="namapelajaran" id="namapelajaran">
                                                    <option value="0">--Pilih Pelajaran--</option>
                                                    <?php
                                                    $dt = get_allpelajaran($db);
                                                    while ($data = mysqli_fetch_array($dt)) {
                                                    ?>
                                                        <option value="<?php echo $data['Nama_Pelajaran']; ?>"><?php echo $data['Nama_Pelajaran']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-2">
                                        <div class="email-search">
                                            <div class="input-group input-search">
                                                <select class="form-control" name="kelas" id="kelas">
                                                    <option value="0">--Pilih Kelas--</option>
                                                    <?php
                                                    $dt = get_allkelas($db);
                                                    while ($data = mysqli_fetch_array($dt)) {
                                                    ?>
                                                        <option value="<?php echo $data['Nama_Kelas']; ?>"><?php echo $data['Nama_Kelas']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="email-search">
                                            <div class="input-group input-search">
                                                <input value="<?php echo date('Y-m-d'); ?>" type="date" name="tanggal" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <button class="btn" id="filter" name="filter"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>

                            </form>
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <!-- panggil query -->
                                            <?php
                                            $no = 1;
                                            if (isset($_POST['filter'])) {
                                                $kelas = $_POST['kelas'];
                                                $mapel = $_POST['namapelajaran'];
                                                $tanggal = $_POST['tanggal'];

                                                if ($kelas == '0' and $mapel == '0') {
                                                    // $dt = get_absensitanggalsaja9($db, $tanggal, get_guru($db, $_SESSION['idguru'], 'nama'));
                                                } elseif ($kelas == '0' and $tanggal == date('Y-m-d')) {
                                                } elseif ($kelas == '0' and $mapel == '0' and $tanggal == date('Y-m-d')) {
                                                    // $dt = get_allabsensi9($db, get_guru($db, $_SESSION['idguru'], 'nama'));
                                                } else {

                                                    // $dt = get_absensikelassaja9($db, $kelas, get_guru($db, $_SESSION['idguru'], 'nama'));
                                                }
                                            } else {

                                                $dt = get_allabsensi($db);
                                            }
                                            ?>
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0">No</th>
                                                    <th class="border-0"></th>
                                                    <th class="border-0">ID Pelajaran</th>
                                                    <th class="border-0">Nama Pelajaran</th>
                                                    <th class="border-0">ID Murid</th>
                                                    <th class="border-0">Nama Murid</th>
                                                    <th class="border-0">Nama Guru</th>
                                                    <th class="border-0">Tanggal</th>
                                                    <th class="border-0">Kelas</th>
                                                    <th class="border-0 text-center" colspan="2">Status</th>
                                                    <th class="border-0"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- tampilkan data -->
                                                <?php while ($data = mysqli_fetch_array($dt)) { ?>
                                                    <tr>
                                                        <td><?php echo $no; ?></td>
                                                        <td style="visibility:hidden;"><?php echo $data['Kode']; ?></td>
                                                        <td><?php echo $data['ID_Pelajaran']; ?></td>
                                                        <td><?php echo get_pelajaran($db, $data['ID_Pelajaran'], 'namapelajaran'); ?></td>
                                                        <td><?php echo $data['ID_Murid']; ?></td>
                                                        <td><?php echo get_murid($db, $data['ID_Murid'], 'nama'); ?></td>
                                                        <td><?php echo get_guru($db, $data['ID_Guru'], 'nama'); ?></td>
                                                        <td><?php echo $data['Tanggal']; ?></td>
                                                        <td><?php echo get_kelas($db, $data['ID_Kelas'], 'kelas'); ?></td>
                                                        <td>
                                                            <div class="custom-control custom-radio updateabsensi">
                                                                <input <?php if ($data['Status'] == 'Hadir') echo 'checked'; ?> id="hadir<?php echo $data['Kode']; ?>" name="status<?php echo $data['Kode']; ?>" type="radio" class="custom-control-input">
                                                                <label class="custom-control-label" for="hadir<?php echo $data['Kode']; ?>">Hadir</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-radio updateabsensi2">
                                                                <input <?php if ($data['Status'] == 'Tidak Hadir') echo 'checked'; ?> id="tidakhadir<?php echo $data['Kode']; ?>" name="status<?php echo $data['Kode']; ?>" type="radio" class="custom-control-input">
                                                                <label class="custom-control-label" for="tidakhadir<?php echo $data['Kode']; ?>">Tidak Hadir</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <form method="POST" action="">
                                                                <a href="../config/cAbsensi.php?hapusAbsensi=<?php echo $data['Kode']; ?>" class="btn btn-danger float-right">Hapus</a>
                                                                <button class="btn btn-success float-right testbutton" name="btnstatus" id="btnstatus" value="<?php echo $data['Kode']; ?>">Simpan</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php $no++;
                                                } ?>
                                                <tr>
                                                    <td colspan="12">
                                                        <a href="input_absensi_murid.php" class="btn btn-success float-right text-dark"><i class="fa fas fa-plus"></i> Tambah Absensi</a>
                                                    </td>
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
    <!-- jquery 3.3.1 -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
    <script src="../assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="../assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="../assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="../assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="../assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="../assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="../assets/libs/js/dashboard-ecommerce.js"></script>
    <script src="../bootstrap/js/script.js"></script>
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- chart c3 js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>

</body>

</html>