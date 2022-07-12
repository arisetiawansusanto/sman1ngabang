<?php

function get_allkelas($db)
{
    global $db;
    $qry = "SELECT * FROM tbl_kelas";
    $result = mysqli_query($db, $qry);
    return $result;
}

function get_kelasByName($db, $kelas)
{
    global $db;
    $qry = "SELECT * FROM tbl_kelas WHERE ID_Kelas = '$kelas'";
    $result = mysqli_query($db, $qry);
    return $result;
}

function get_kelasByID($db, $id)
{
    global $db;
    $qry = "SELECT ID_Kelas FROM tbl_registrasi WHERE ID_Murid = 'MRD001'";
    $result = mysqli_query($db, $qry);
    $row = mysqli_fetch_array($result);
    return $row['ID_Kelas'];
}


function get_namakelas($db)
{
    global $db;
    $qry = "SELECT Nama_Kelas FROM tbl_kelas";
    $result = mysqli_query($db, $qry);
    return $result;
}

if (isset($_POST['btnkelas'])) {
    include('koneksi.php"');

    $kelas     = $_POST['kelas'];
    $jumlahmurid = $_POST['jumlah_murid'];

    if (empty($kelas)) {
        echo "<script>
        alert('Kelas harus di isi');
        location.href ='../admin/data_kelas.php';
        </script>";
        die();
    } else {

        $sql = "INSERT INTO tbl_kelas(Nama_Kelas, Jumlah_Murid) VALUES('$kelas','$jumlahmurid')";

        $query = mysqli_query($db, $sql);
        if ($query) {
            echo "<script>
            alert('Kelas Baru Berhasil Di Tambahkan');
            location.href ='../admin/data_kelas.php';
            </script>";
        } else {
            echo mysqli_error($db);
        }
    }
}

if (isset($_GET['hapusKelas'])) {
    include('koneksi.php"');
    $id = $_GET['hapusKelas'];
    $sql = "DELETE FROM tbl_kelas WHERE ID_Kelas = '$id'";
    $query = mysqli_query($db, $sql);
    if ($query) {
        echo "<script>
		alert('Data Kelas Berhasil Di Hapus');
		location.href = '../admin/data_kelas.php';
		</script>";
    } else {
        echo mysqli_error($db);
    }
}

function get_kelas($db, $id, $col)
{
    $qry = "SELECT * FROM tbl_kelas WHERE ID_Kelas = '$id'";
    $result = mysqli_query($db, $qry);
    $row = mysqli_fetch_array($result);
    switch ($col) {
        case 'idkelas':
            return $row['ID_Kelas'];
            break;
        case 'kelas':
            return $row['Nama_Kelas'];
            break;
        case 'jumlah_murid':
            return $row['Jumlah_Murid'];
            break;
    }
}

function get_idkelasbynama($db, $id, $col)
{

    $qry = "SELECT ID_Kelas FROM tbl_kelas WHERE Nama_Kelas = '$id'";
    $result = mysqli_query($db, $qry);
    $row = mysqli_fetch_array($result);
    switch ($col) {
        case 'id':
            return $row['ID_Kelas'];
            break;
    }
}


if (isset($_POST['btneditkelas'])) {
    include('koneksi.php"');

    $id = $_GET['id'];
    $kelas     = $_POST['kelas'];
    $jumlahmurid = $_POST['jumlahmurid'];

    if (empty($id)) {
        echo "<script>
                alert('Kelas harus di isi');
                location.href ='../admin/data_kelas.php';
            </script>";
        die();
    } else {

        $sql = "UPDATE tbl_kelas SET Nama_Kelas ='$kelas', Jumlah_Murid ='$jumlahmurid' WHERE ID_Kelas = '$id'";

        $query = mysqli_query($db, $sql);

        if ($query) {
            echo "<script>
            alert('Data Kelas Berhasil Di Edit');
            location.href ='../admin/data_kelas.php';
            </script>";
        } else {
            echo mysqli_error($db);
        }
    }
}

function get_MuridByKelas($db, $kelas)
{
    global $db;
    $qry = "SELECT ID_Murid, ID_Tingkat, ID_Jurusan, id_akademik FROM tbl_registrasi WHERE ID_Kelas = '$kelas'";
    $result = mysqli_query($db, $qry);
    return $result;
}
