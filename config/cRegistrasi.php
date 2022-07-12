<?php

function get_allregistrasi($db)
{
    global $db;
    $qry = "SELECT * FROM tbl_registrasi";
    $result = mysqli_query($db, $qry);
    return $result;
}

function get_registrasiById($db, $id)
{
    global $db;
    $qry = "SELECT * FROM tbl_registrasi WHERE ID_Murid = '$id'";
    return $qry;
}

function get_idregistrasi($db)
{
    global $db;
    $qry = "SELECT ID_Registrasi FROM tbl_registrasi";
    $result = mysqli_query($db, $qry);
    return $result;
}

if (isset($_POST['btnregistrasi'])) {
    include('koneksi.php"');

    $idmurid = $_POST['idmurid'];
    $idtingkat  = $_POST['tingkat'];
    $idjurusan  = $_POST['jurusan'];
    $idkelas  = $_POST['kelas'];
    $idakademik  = $_POST['ajaran'];


    if (empty($idmurid)) {
        echo "<script>
        alert('ID Murid harus di isi');
        location.href ='../admin/registrasi.php';
        </script>";
        die();
    } else {

        $sql = "INSERT INTO tbl_registrasi(ID_Murid, ID_Tingkat, ID_Jurusan, ID_Kelas, id_akademik) VALUES('$idmurid','$idtingkat', '$idjurusan', '$idkelas', '$idakademik')";
        $query = mysqli_query($db, $sql);


        $sql2 = "SELECT ID_Registrasi FROM tbl_registrasi ORDER BY ID_Registrasi DESC LIMIT 1";
        $result = mysqli_query($db, $sql2);
        $row = mysqli_fetch_array($result);
        $idregistrasi = $row['ID_Registrasi'];

        $sql2 = "UPDATE tbl_murid SET ID_Registrasi = '$idregistrasi' WHERE ID_Murid = '$idmurid'";
        $query2 = mysqli_query($db, $sql2);

        if ($query) {
            echo "<script>
            alert('Registrasi Baru Berhasil Di Tambahkan');
            location.href ='../admin/registrasi.php';
            </script>";
        } else {
            echo mysqli_error($db);
        }
    }
}

if (isset($_GET['hapusRegistrasi'])) {
    include('koneksi.php"');
    $id = $_GET['hapusRegistrasi'];
    $sql = "DELETE FROM tbl_registrasi WHERE ID_Registrasi = '$id'";
    $query = mysqli_query($db, $sql);
    if ($query) {
        echo "<script>
		alert('Registrasi Berhasil Di Hapus');
		location.href = '../admin/registrasi.php';
		</script>";
    } else {
        echo mysqli_error($db);
    }
}

function get_registrasi($db, $id, $col)
{

    $qry = "SELECT * FROM tbl_registrasi WHERE ID_Registrasi = '$id'";
    $result = mysqli_query($db, $qry);
    $row = mysqli_fetch_array($result);
    switch ($col) {
        case 'idregistrasi':
            return $row['ID_Registrasi'];
            break;
        case 'idmurid':
            return $row['ID_Murid'];
            break;
        case 'tingkat':
            return $row['ID_Tingkat'];
            break;
        case 'jurusan':
            return $row['ID_Jurusan'];
            break;
        case 'kelas':
            return $row['ID_Kelas'];
            break;
        case 'id_akad':
            return $row['id_akademik'];
            break;
    }
}

function get_registrasi2($db, $id, $col)
{

    $qry = "SELECT * FROM tbl_registrasi WHERE ID_Murid = '$id'";
    $result = mysqli_query($db, $qry);
    $row = mysqli_fetch_array($result);
    switch ($col) {
        case 'idregistrasi':
            return $row['ID_Registrasi'];
            break;
        case 'idmurid':
            return $row['ID_Murid'];
            break;
        case 'tingkat':
            return $row['ID_Tingkat'];
            break;
        case 'jurusan':
            return $row['ID_Jurusan'];
            break;
        case 'kelas':
            return $row['ID_Kelas'];
            break;
        case 'id_akad':
            return $row['id_akademik'];
            break;
    }
}

if (isset($_POST['btneditregistrasi'])) {
    include('koneksi.php"');

    $id = $_GET['id'];
    $idmurid = $_POST['idmurid'];
    $idtingkat  = $_POST['tingkat'];
    $idjurusan  = $_POST['jurusan'];
    $idkelas  = $_POST['kelas'];
    $idakademik  = $_POST['ajaran'];


    if (empty($id)) {
        echo "<script>
                alert('ID harus di isi');
                location.href ='../admin/registrasi.php';
            </script>";
    } else {

        $sql = "UPDATE tbl_registrasi SET ID_Murid ='$idmurid', ID_Tingkat ='$idtingkat', ID_Jurusan = '$idjurusan', ID_Kelas = '$idkelas', id_akademik = '$idakademik' WHERE ID_Registrasi = '$id'";

        $query = mysqli_query($db, $sql);

        if ($query) {
            echo "<script>
            alert('Registrasi Berhasil Di Edit');
            location.href ='../admin/registrasi.php';
            </script>";
        } else {
            echo mysqli_error($db);
        }
    }
}
