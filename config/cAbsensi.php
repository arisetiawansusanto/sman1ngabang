<?php

function get_allabsensi($db)
{
    global $db;
    $qry = "SELECT * FROM tbl_absensi";
    $result = mysqli_query($db, $qry);
    return $result;
}

function get_allabsensiByMurid($db, $id)
{
    global $db;
    $qry = "SELECT * FROM tbl_absensi WHERE ID_Murid = '$id'";
    $result = mysqli_query($db, $qry);
    return $result;
}

function get_allabsensiByTanggal($db, $tanggal)
{
    global $db;
    $qry = "SELECT * FROM tbl_absensi WHERE Tanggal = '$tanggal'";
    $result = mysqli_query($db, $qry);
    return $result;
}

function get_allabsensiByKelasTanggal($db, $kelas, $tanggal)
{
    global $db;
    $qry = "SELECT * FROM tbl_absensi WHERE ID_Kelas = '$kelas' AND Tanggal = '$tanggal'";
    $result = mysqli_query($db, $qry);
    return $result;
}

function get_allabsensiByMapelTanggal($db, $mapel, $tanggal)
{
    global $db;
    $qry = "SELECT * FROM tbl_absensi WHERE ID_Pelajaran = '$mapel' AND Tanggal = '$tanggal'";
    $result = mysqli_query($db, $qry);
    return $result;
}


function get_allabsensiByKelasMapelTanggal($db, $kelas, $mapel, $tanggal)
{
    global $db;
    $qry = "SELECT * FROM tbl_absensi WHERE ID_Kelas = '$kelas' AND ID_Pelajaran = '$mapel' AND Tanggal = '$tanggal'";
    $result = mysqli_query($db, $qry);
    return $result;
}

function get_allabsensiByTanggalRegis($db, $regis, $tanggal)
{
    global $db;
    $qry = "SELECT * 
    FROM tbl_absensi JOIN tbl_registrasi 
    ON tbl_absensi.ID_Murid = tbl_registrasi.ID_Murid
    WHERE tbl_absensi.Tanggal = '$tanggal'
    AND tbl_registrasi.id_akademik = '$regis'";
    $result = mysqli_query($db, $qry);
    return $result;
}

function get_allabsensiByAll($db, $kelas, $mapel, $tanggal, $regis)
{
    global $db;
    $qry = "SELECT * 
    FROM tbl_absensi JOIN tbl_registrasi 
    ON tbl_absensi.ID_Murid = tbl_registrasi.ID_Murid
    WHERE tbl_absensi.ID_Kelas = '$kelas' 
    AND tbl_absensi.ID_Pelajaran = '$mapel' 
    AND tbl_absensi.Tanggal = '$tanggal'
    AND tbl_registrasi.id_akademik = '$regis'";
    $result = mysqli_query($db, $qry);
    return $result;
}

if (isset($_POST['btnabsensi'])) {
    include('koneksi.php"');

    // $idpelajaran = $_POST['idpelajaran'];
    $namapelajaran     = $_POST['namapelajaran'];
    $namamurid = $_POST['namamurid'];
    $namaguru     = $_POST['namaguru'];
    $status     = $_POST['status'];
    $kelas     = $_POST['kelas'];

    if (empty($namamurid)) {
        echo "<script>
        alert('ID Pelajaran harus di isi');
        location.href ='../guru/absensi_murid.php';
        </script>";
        die();
    } else {

        $sql = "INSERT INTO tbl_absensi(Nama_Pelajaran, Nama_Murid, Nama_Guru, Status, Kelas) VALUES('$namapelajaran','$namamurid', '$namaguru', '$status', '$kelas')";

        $query = mysqli_query($db, $sql);
        if ($query) {
            echo "<script>
            alert('Absensi Baru Berhasil Di Tambahkan');
            location.href ='../guru/absensi_murid.php';
            </script>";
        } else {
            echo mysqli_error($db);
        }
    }
}

if (isset($_GET['hapusAbsensi'])) {
    include('koneksi.php"');
    $id = $_GET['hapusAbsensi'];
    $sql = "DELETE FROM tbl_absensi WHERE Kode = '$id'";
    $query = mysqli_query($db, $sql);
    if ($query) {
        echo "<script>
		alert('Data Absensi Berhasil Di Hapus');
		location.href = '../guru/absensi_murid.php';
		</script>";
    } else {
        echo mysqli_error($db);
    }
}

function get_absensi($db, $id, $col)
{

    $qry = "SELECT * FROM tbl_absensi WHERE Kode = '$id'";
    $result = mysqli_query($db, $qry);
    $row = mysqli_fetch_array($result);
    switch ($col) {
        case 'pelajaran':
            return $row['ID_Pelajaran'];
            break;
        case 'murid':
            return $row['ID_Murid'];
            break;
        case 'guru':
            return $row['ID_Guru'];
            break;
        case 'status':
            return $row['Status'];
            break;
        case 'tanggal':
            return $row['Tanggal'];
            break;
        case 'kelas':
            return $row['ID_Kelas'];
            break;
    }
}

function get_absensi2($db, $id, $col)
{

    $qry = "SELECT * FROM tbl_absensi WHERE Nama_Murid = '$id'";
    $result = mysqli_query($db, $qry);
    $row = mysqli_fetch_array($result);
    switch ($col) {
        case 'id':
            return $row['ID_Pelajaran'];
            break;
        case 'namapelajaran':
            return $row['Nama_Pelajaran'];
            break;
        case 'namamurid':
            return $row['Nama_Murid'];
            break;
        case 'namaguru':
            return $row['Nama_Guru'];
            break;
        case 'status':
            return $row['Status'];
            break;
        case 'kelas':
            return $row['Kelas'];
            break;
    }
}

function get_absensimurid($db, $mapel, $col)
{

    $qry = "SELECT * FROM tbl_absensi WHERE Tanggal = '$mapel'";
    $result = mysqli_query($db, $qry);
    $row = mysqli_fetch_array($result);
    switch ($col) {
        case 'namapelajaran':
            return $row['Nama_Pelajaran'];
            break;
        case 'namamurid':
            return $row['Nama_Murid'];
            break;
        case 'namaguru':
            return $row['Nama_Guru'];
            break;
        case 'status':
            return $row['Status'];
            break;
        case 'tanggal':
            return $row['Tanggal'];
            break;
    }
}

if (isset($_POST['btneditabsensi'])) {
    include('koneksi.php"');

    $id = $_GET['id'];
    $status     = $_POST['status'];

    $sql = "UPDATE tbl_absensi SET Status = '$status' WHERE Kode = '$id'";

    $query = mysqli_query($db, $sql);

    if ($query) {
        echo "<script>
                alert('Absensi Berhasil Di Edit');
                location.href ='../guru/absensi_murid.php';
            </script>";
    } else {
        echo mysqli_error($db);
    }
}

if (isset($_POST['btnaddjadwaltoday'])) {

    include('koneksi.php"');
    $idpelajaran = $_POST['idpelajaran'];
    $idguru = $_POST['idguru'];
    $idkelas = $_POST['idkelas'];
    $status = 'Tidak Hadir';

    $sql = "INSERT INTO tbl_absensi (ID_Pelajaran, ID_Murid, ID_Guru, ID_Kelas)
    SELECT tbl_pelajaran.ID_Pelajaran, tbl_murid.ID_Murid, tbl_guru.ID_Guru, tbl_kelas.ID_Kelas 
    FROM tbl_murid 
    JOIN tbl_pelajaran 
    JOIN tbl_guru 
    JOIN tbl_registrasi 
    JOIN tbl_kelas 
    ON tbl_murid.ID_Murid = tbl_registrasi.ID_Murid 
    WHERE tbl_registrasi.ID_Kelas = tbl_kelas.ID_Kelas 
    AND tbl_registrasi.ID_Kelas = '$idkelas' 
    AND tbl_pelajaran.ID_Pelajaran = '$idpelajaran' 
    AND tbl_guru.ID_Guru = '$idguru'";
    $query = mysqli_query($db, $sql);
    if ($query) {
        echo "<script>
                alert('Absensi Berhasil Dibuat');
                location.href ='../guru/absensi_murid.php';
            </script>";
    } else {
        echo mysqli_error($db);
    }
}
