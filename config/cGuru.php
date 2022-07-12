<?php

function get_allguru($db)
{
    global $db;
    $qry = "SELECT * FROM tbl_guru";
    $result = mysqli_query($db, $qry);
    return $result;
}

function get_idguru($db)
{
    global $db;
    $qry = "SELECT ID_Guru, Nama_Guru FROM tbl_guru";
    $result = mysqli_query($db, $qry);
    return $result;
}

function get_namaguru($db)
{
    global $db;
    $qry = "SELECT Nama_Guru FROM tbl_guru";
    $result = mysqli_query($db, $qry);
    return $result;
}
function get_namaguruid($db, $id)
{
    global $db;
    $qry = "SELECT Nama_Guru FROM tbl_guru WHERE ID_Guru = '$id'";
    $result = mysqli_query($db, $qry);
    return $result;
}

if (isset($_POST['btnguru'])) {
    include('koneksi.php"');

    $id     = $_POST['idguru'];
    $nama     = $_POST['namaguru'];
    $alamat = $_POST['alamat'];
    $email     = $_POST['email'];
    $telp     = $_POST['telp'];

    if (empty($id)) {
        echo "<script>
        alert('ID Guru harus di isi');
        location.href ='../admin/data_guru.php';
        </script>";
        die();
    } else {

        $sql = "INSERT INTO tbl_guru(ID_Guru, Nama_Guru, Alamat_Guru, Gmail, Telp) VALUES('$id','$nama','$alamat', '$email', '$telp')";

        $query = mysqli_query($db, $sql);
        if ($query) {
            echo "<script>
            alert('Guru Baru Berhasil Di Tambahkan');
            location.href ='../admin/data_guru.php';
            </script>";
        } else {
            echo mysqli_error($db);
        }
    }
}

if (isset($_GET['hapusGuru'])) {
    include('koneksi.php"');
    $id = $_GET['hapusGuru'];
    $sql = "DELETE FROM tbl_guru WHERE ID_Guru = '$id'";
    $query = mysqli_query($db, $sql);
    if ($query) {
        echo "<script>
		alert('Guru Berhasil Di Hapus');
		location.href = '../admin/data_guru.php';
		</script>";
    } else {
        echo mysqli_error($db);
    }
}

function get_guru($db, $id, $col)
{
    $qry = "SELECT * FROM tbl_guru WHERE ID_Guru = '$id'";
    $result = mysqli_query($db, $qry);
    $row = mysqli_fetch_array($result);
    switch ($col) {
        case 'id':
            return $row['ID_Guru'];
            break;
        case 'nama':
            return $row['Nama_Guru'];
            break;
        case 'alamat':
            return $row['Alamat_Guru'];
            break;
        case 'email':
            return $row['Gmail'];
            break;
        case 'telp':
            return $row['Telp'];
            break;
    }
}

if (isset($_POST['btnedit3'])) {
    include('koneksi.php"');

    $id = $_GET['id'];
    $nama     = $_POST['namaguru'];
    $alamat = $_POST['alamat'];
    $email     = $_POST['email'];
    $telp     = $_POST['telp'];


    if (empty($nama)) {
        echo "<script>
                alert('Nama User harus di isi');
                location.href ='../admin/data_guru.php';
            </script>";
        die();
    } else {

        $sql = "UPDATE tbl_guru SET ID_Guru = '$id', Nama_Guru ='$nama', Alamat_Guru ='$alamat', Gmail ='$email', Telp='$telp' WHERE ID_Guru = '$id'";

        $query = mysqli_query($db, $sql);

        if ($query) {
            echo "<script>
            alert('Data Guru Berhasil Di Edit');
            location.href ='../admin/data_guru.php';
            </script>";
        } else {
            echo mysqli_error($db);
        }
    }
}

function jumlah_guru($db)
{

    $qry = "SELECT COUNT(ID_Guru) as guru FROM tbl_guru";
    $result = mysqli_query($db, $qry);
    $row = mysqli_fetch_array($result);
    return $row['guru'];
}
