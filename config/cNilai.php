<?php

function get_allnilaikomplit($db, $kelas)
{
    global $db;
    $qry = "SELECT * FROM tbl_nilai JOIN tbl_registrasi ON tbl_nilai.ID_Murid = tbl_registrasi.ID_Murid WHERE tbl_registrasi.ID_Kelas = '$kelas'";
    $result = mysqli_query($db, $qry);
    return $result;
}

function get_allnilaiByKelasRegis($db, $kelas, $regis)
{
    global $db;
    $qry = "SELECT * FROM tbl_nilai JOIN tbl_registrasi JOIN tbl_akademik ON tbl_nilai.ID_Murid = tbl_registrasi.ID_Murid WHERE tbl_registrasi.ID_Kelas= '$kelas' AND tbl_akademik.id = '$regis'";
    $result = mysqli_query($db, $qry);
    return $result;
}

function get_allnilaiByRegis($db, $regis)
{
    global $db;
    $qry = "SELECT * FROM tbl_nilai JOIN tbl_registrasi ON tbl_nilai.ID_Murid = tbl_registrasi.ID_Murid WHERE tbl_registrasi.ID_Registrasi = '$regis'";
    $result = mysqli_query($db, $qry);
    return $result;
}

function get_allnilaiByKelas($db, $kelas)
{
    global $db;
    $qry = "SELECT * FROM tbl_nilai JOIN tbl_registrasi ON tbl_nilai.ID_Murid = tbl_registrasi.ID_Murid WHERE tbl_registrasi.ID_Kelas = '$kelas'";
    $result = mysqli_query($db, $qry);
    return $result;
}

function get_allnilai($db)
{
    global $db;
    $qry = "SELECT * FROM tbl_nilai";
    $result = mysqli_query($db, $qry);
    return $result;
}

function get_allnilai2($db, $id)
{
    global $db;
    $qry = "SELECT * FROM tbl_nilai WHERE ID_Guru = '' OR ID_Guru = '$id'";
    $result = mysqli_query($db, $qry);
    return $result;
}

function get_allnilaiedit($db, $id)
{
    global $db;
    $qry = "SELECT * FROM tbl_nilai WHERE ID_Guru = '$id'";
    $result = mysqli_query($db, $qry);
    return $result;
}

function get_idnilai($db)
{
    global $db;
    $qry = "SELECT ID_Nilai FROM tbl_nilai";
    $result = mysqli_query($db, $qry);
    return $result;
}


function get_detailnilai($db, $id)
{
    global $db;
    $qry = "SELECT * FROM tbl_nilai WHERE ID_Murid ='$id'";
    $result = mysqli_query($db, $qry);
    return $result;
}

if (isset($_POST['btnnilai'])) {
    include('koneksi.php"');

    $idpelajaran = $_POST['idpelajaran'];
    $idmurid     = $_POST['idmurid'];
    $idguru     = $_POST['idguru'];
    $kkm  = $_POST['kkm'];
    $npengetahuan     = $_POST['npengetahuan'];
    $nketerampilan     = $_POST['nketerampilan'];

    if (empty($idmurid)) {
        echo "<script>
        alert('ID Murid harus di isi');
        location.href ='../guru/nilai_murid.php';
        </script>";
        die();
    } else {

        $sql = "INSERT INTO tbl_nilai(ID_Pelajaran, ID_Murid, ID_Guru, pengetahuan, keterampilan, kkm) VALUES('$idpelajaran', '$idmurid','$idguru','$npengetahuan', '$nketerampilan', '$kkm')";

        $query = mysqli_query($db, $sql);
        if ($query) {
            echo "<script>
            alert('Nilai Baru Berhasil Di Tambahkan');
            location.href ='../guru/nilai_murid.php';
            </script>";
        } else {
            echo mysqli_error($db);
        }
    }
}

if (isset($_GET['hapusNilai'])) {
    include('koneksi.php"');
    $id = $_GET['hapusNilai'];
    $sql = "DELETE FROM tbl_nilai WHERE ID_Nilai = '$id'";
    $query = mysqli_query($db, $sql);
    if ($query) {
        echo "<script>
		alert('Nilai Berhasil Di Hapus');
		location.href = '../guru/nilai_murid.php';
		</script>";
    } else {
        echo mysqli_error($db);
    }
}

function get_nilai($db, $id, $col)
{

    $qry = "SELECT * FROM tbl_nilai WHERE ID_Nilai = '$id'";
    $result = mysqli_query($db, $qry);
    $row = mysqli_fetch_array($result);
    switch ($col) {
        case 'id':
            return $row['ID_Nilai'];
            break;
        case 'idpelajaran':
            return $row['ID_Pelajaran'];
            break;
        case 'idmurid':
            return $row['ID_Murid'];
            break;
        case 'idguru':
            return $row['ID_Guru'];
            break;
        case 'kkm':
            return $row['kkm'];
            break;
        case 'npengetahuan':
            return $row['pengetahuan'];
            break;
        case 'nketerampilan':
            return $row['keterampilan'];
            break;
    }
}


function get_nilai2($db, $id, $col)
{

    // SELECT * FROM tbl_murid JOIN tbl_pelajaran ON tbl_pelajaran.Nama_Pelajaran = 'Bahasa Inggris'
    $qry = "SELECT * FROM tbl_nilai JOIN tbl_murid ON tbl_nilai.ID_Murid = tbl_murid.ID_Murid WHERE ID_Guru = '$id'";
    $result = mysqli_query($db, $qry);
    $row = mysqli_fetch_array($result);
    switch ($col) {
        case 'id':
            return $row['ID_Nilai'];
            break;
        case 'idpelajaran':
            return $row['ID_Pelajaran'];
            break;
        case 'idmurid':
            return $row['ID_Murid'];
            break;
        case 'idguru':
            return $row['ID_Guru'];
            break;
        case 'kkm':
            return $row['kkm'];
            break;
        case 'npengetahuan':
            return $row['pengetahuan'];
            break;
        case 'nketerampilan':
            return $row['keterampilan'];
            break;
    }
}

function get_nilai3($db, $id, $col)
{

    $qry = "SELECT * FROM tbl_nilai WHERE ID_Murid = '$id'";
    $result = mysqli_query($db, $qry);
    $row = mysqli_fetch_array($result);
    switch ($col) {
        case 'id':
            return $row['ID_Nilai'];
            break;
        case 'kkm':
            return $row['kkm'];
            break;
        case 'npengetahuan':
            return $row['pengetahuan'];
            break;
        case 'nketerampilan':
            return $row['keterampilan'];
            break;
    }
}


if (isset($_POST['btneditnilai'])) {
    include('koneksi.php"');

    $id = $_GET['id'];
    $idpelajaran = $_POST['idpelajaran'];
    $idmurid     = $_POST['idmurid'];
    $idguru     = $_POST['idguru'];
    $kkm  = $_POST['kkm'];
    $npengetahuan     = $_POST['npengetahuan'];
    $nketerampilan     = $_POST['nketerampilan'];


    if (empty($idmurid)) {
        echo "<script>
                alert('ID Murid harus di isi');
                location.href ='../guru/nilai_murid.php';
            </script>";
        die();
    } else {

        $sql = "UPDATE tbl_nilai SET ID_Nilai = '$id', ID_Pelajaran = '$idpelajaran', ID_Murid ='$idmurid', ID_Guru ='$idguru', pengetahuan ='$npengetahuan', keterampilan ='$nketerampilan', kkm = '$kkm' WHERE ID_Nilai = '$id'";

        $query = mysqli_query($db, $sql);

        if ($query) {
            echo "<script>
                alert('Nilai Murid Berhasil di Edit');
                location.href ='../guru/nilai_murid.php';
            </script>";
        } else {
            echo mysqli_error($db);
        }
    }
}
