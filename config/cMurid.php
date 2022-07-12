<?php

function get_allmurid($db)
{
    global $db;
    $qry = "SELECT * FROM tbl_murid";
    $result = mysqli_query($db, $qry);
    return $result;
}


function get_idmurid($db)
{
    global $db;
    $qry = "SELECT ID_Murid FROM tbl_murid";
    $result = mysqli_query($db, $qry);
    return $result;
}
function get_allmurid2($db, $id)
{
    global $db;
    $qry = "SELECT * FROM tbl_murid WHERE ID_Murid = '$id'";
    $result = mysqli_query($db, $qry);
    return $result;
}


if (isset($_POST['btnmurid'])) {
    include('koneksi.php"');

    $id     = $_POST['idmurid'];
    $nama     = $_POST['namamurid'];
    $alamat = $_POST['alamat'];
    $email     = $_POST['email'];
    $telp     = $_POST['telp'];

    if (empty($id)) {
        echo "<script>
        alert('ID Murid harus di isi');
        location.href ='../admin/data_murid.php';
        </script>";
        die();
    } else {

        $sql = "INSERT INTO tbl_murid(ID_Murid, Nama_Murid, Alamat_Murid, Gmail, Telp) VALUES('$id','$nama','$alamat', '$email', '$telp')";


        $query = mysqli_query($db, $sql);
        if ($query) {
            echo "<script>
            alert('Murid Baru Berhasil Di Tambahkan');
            location.href ='../admin/data_murid.php';
            </script>";
        } else {
            echo mysqli_error($db);
        }
    }
}

if (isset($_GET['hapusMurid'])) {
    include('koneksi.php"');
    $id = $_GET['hapusMurid'];
    $sql = "DELETE FROM tbl_murid WHERE ID_Murid = '$id'";
    $query = mysqli_query($db, $sql);
    if ($query) {
        echo "<script>
		alert('Data Murid Berhasil Di Hapus');
		location.href = '../admin/data_murid.php';
		</script>";
    } else {
        echo mysqli_error($db);
    }
}

function get_murid($db, $id, $col)
{

    $qry = "SELECT * FROM tbl_murid WHERE ID_Murid = '$id'";
    $result = mysqli_query($db, $qry);
    $row = mysqli_fetch_array($result);
    switch ($col) {
        case 'id':
            return $row['ID_Murid'];
            break;
        case 'nama':
            return $row['Nama_Murid'];
            break;
        case 'alamat':
            return $row['Alamat_Murid'];
            break;
        case 'email':
            return $row['Gmail'];
            break;
        case 'telp':
            return $row['Telp'];
            break;
        case 'regis':
            return $row['ID_Registrasi'];
            break;
    }
}


function get_murid2($db, $nama, $col)
{

    $qry = "SELECT * FROM tbl_murid WHERE Nama_Murid = '$nama'";
    $result = mysqli_query($db, $qry);
    $row = mysqli_fetch_array($result);
    switch ($col) {
        case 'id':
            return $row['ID_Murid'];
            break;
        case 'kelas':
            return $row['Kelas'];
            break;
    }
}


if (isset($_POST['btnedit2'])) {
    include('koneksi.php"');

    $id = $_GET['id'];
    $nama     = $_POST['namamurid'];
    $alamat = $_POST['alamat'];
    $email     = $_POST['email'];
    $telp     = $_POST['telp'];


    if (empty($nama)) {
        echo "<script>
                alert('Nama User harus di isi');
                location.href ='../admin/data_murid.php';
            </script>";
        die();
    } else {

        $sql = "UPDATE tbl_murid SET ID_Murid = '$id', Nama_Murid ='$nama', Alamat_Murid ='$alamat', Gmail ='$email', Telp='$telp' WHERE ID_Murid = '$id'";

        $query = mysqli_query($db, $sql);

        if ($query) {
            echo "<script>
            alert('Data Murid Berhasil Di Edit');
            location.href ='../admin/data_murid.php';
            </script>";
        } else {
            echo mysqli_error($db);
        }
    }
}


function get_allmuridByRegisJurusan($db, $regis, $jurusan)
{
    global $db;
    $qry = "SELECT * FROM tbl_murid 
        JOIN tbl_registrasi 
        ON tbl_murid.ID_Murid = tbl_registrasi.ID_Murid 
        WHERE tbl_registrasi.id_akademik = '$regis'
        AND tbl_registrasi.ID_Jurusan= '$jurusan'";
    $result = mysqli_query($db, $qry);
    return $result;
}

function get_allmuridByRegis($db, $regis)
{
    global $db;
    $qry = "SELECT * FROM tbl_murid 
        JOIN tbl_registrasi 
        ON tbl_murid.ID_Murid = tbl_registrasi.ID_Murid 
        WHERE tbl_registrasi.id_akademik = '$regis'";
    $result = mysqli_query($db, $qry);
    return $result;
}

function get_allmuridByKelas($db, $jurusan)
{
    global $db;
    $qry = "SELECT * FROM tbl_murid 
        JOIN tbl_registrasi 
        ON tbl_murid.ID_Murid = tbl_registrasi.ID_Murid 
        WHERE tbl_registrasi.ID_Jurusan= '$jurusan'";
    $result = mysqli_query($db, $qry);
    return $result;
}

function jumlah_murid($db)
{

    $qry = "SELECT COUNT(ID_Murid) as murid FROM tbl_murid";
    $result = mysqli_query($db, $qry);
    $row = mysqli_fetch_array($result);
    return $row['murid'];
}
