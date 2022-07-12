<?php

function get_allpelajaran($db)
{
    global $db;
    $qry = "SELECT * FROM tbl_pelajaran";
    $result = mysqli_query($db, $qry);
    return $result;
}

function get_getidguru($db, $mapel)
{
    global $db;
    $qry = "SELECT * FROM tbl_absensi JOIN tbl_pelajaran ON tbl_absensi.Nama_Pelajaran = tbl_pelajaran.Nama_Pelajaran WHERE tbl_absensi.Nama_Pelajaran = '$mapel'";
    $result = mysqli_query($db, $qry);
    return $result;
}


function get_idpelajaran($db)
{
    global $db;
    $qry = "SELECT ID_Pelajaran FROM tbl_pelajaran";
    $result = mysqli_query($db, $qry);
    return $result;
}

function get_idpelajaran2($db, $id)
{
    global $db;
    $qry = "SELECT ID_Pelajaran FROM tbl_pelajaran WHERE ID_Guru = '$id'";
    $result = mysqli_query($db, $qry);
    return $result;
}

function get_namapelajaran($db)
{
    global $db;
    $qry = "SELECT Nama_Pelajaran FROM tbl_pelajaran";
    $result = mysqli_query($db, $qry);
    return $result;
}

function get_namapelajaran2($db, $nama)
{
    global $db;
    $qry = "SELECT Nama_Pelajaran FROM tbl_pelajaran WHERE Nama_Guru = $nama";
    $result = mysqli_query($db, $qry);
    return $result;
}

if (isset($_POST['btnpelajaran'])) {
    include('koneksi.php"');

    $id      = $_POST['idpelajaran'];
    $namapelajaran     = $_POST['namapelajaran'];


    if (empty($id)) {
        echo "<script>
        alert('ID Murid harus di isi');
        location.href ='../admin/data_pelajaran.php';
        </script>";
        die();
    } else {

        $sql = "INSERT INTO tbl_pelajaran(ID_Pelajaran, Nama_Pelajaran) VALUES('$id', '$namapelajaran')";

        $query = mysqli_query($db, $sql);
        if ($query) {
            echo "<script>
            alert('Pelajaran Baru Berhasil Di Tambahkan');
            location.href ='../admin/data_pelajaran.php';
            </script>";
        } else {
            echo mysqli_error($db);
        }
    }
}

if (isset($_GET['hapusPelajaran'])) {
    include('koneksi.php"');
    $id = $_GET['hapusPelajaran'];
    $sql = "DELETE FROM tbl_pelajaran WHERE ID_Pelajaran = '$id'";
    $query = mysqli_query($db, $sql);
    if ($query) {
        echo "<script>
		alert('Pelajaran Berhasil Di Hapus');
		location.href = '../admin/data_pelajaran.php';
		</script>";
    } else {
        echo mysqli_error($db);
    }
}

function get_pelajaran($db, $id, $col)
{

    $qry = "SELECT * FROM tbl_pelajaran WHERE ID_Pelajaran = '$id'";
    $result = mysqli_query($db, $qry);
    $row = mysqli_fetch_array($result);
    switch ($col) {
        case 'id':
            return $row['ID_Pelajaran'];
            break;
        case 'namapelajaran':
            return $row['Nama_Pelajaran'];
            break;
    }
}

function get_pelajaran2($db, $id, $col)
{

    $qry = "SELECT * FROM tbl_pelajaran WHERE Nama_Pelajaran = '$id'";
    $result = mysqli_query($db, $qry);
    $row = mysqli_fetch_array($result);
    switch ($col) {
        case 'id':
            return $row['ID_Pelajaran'];
            break;
        case 'jurusan':
            return $row['Jurusan'];
            break;
        case 'tingkat':
            return $row['Tingkat'];
            break;
        case 'namapelajaran':
            return $row['Nama_Pelajaran'];
            break;
    }
}


if (isset($_POST['btneditpelajaran'])) {
    include('koneksi.php"');

    $id = $_GET['id'];
    $idpelajaran = $_POST['idpelajaran'];
    $namapelajaran     = $_POST['namapelajaran'];


    if (empty($id)) {
        echo "<script>
                alert('ID Pelajaran harus di isi');
                location.href ='../admin/data_pelajaran.php';
            </script>";
        die();
    } else {

        $sql = "UPDATE tbl_pelajaran SET ID_Pelajaran = '$idpelajaran', Nama_Pelajaran='$namapelajaran' WHERE ID_Pelajaran = '$id'";

        $query = mysqli_query($db, $sql);

        if ($query) {
            echo "<script>
            alert('Pelajaran Berhasil Di Edit');
            location.href ='../admin/data_pelajaran.php';
            </script>";
        } else {
            echo mysqli_error($db);
        }
    }
}
