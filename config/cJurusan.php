<?php

function get_alljurusan($db)
{
    global $db;
    $qry = "SELECT * FROM tbl_jurusan";
    $result = mysqli_query($db, $qry);
    return $result;
}

function get_namajurusan($db)
{
    global $db;
    $qry = "SELECT Nama_Jurusan FROM tbl_jurusan";
    $result = mysqli_query($db, $qry);
    return $result;
}

if (isset($_POST['btnjurusan'])) {
    include('koneksi.php"');

    $namajurusan = $_POST['namajurusan'];

    if (empty($namajurusan)) {
        echo "<script>
        alert('Nama Jurusan harus di isi');
        location.href ='../admin/jurusan.php';
        </script>";
        die();
    } else {

        $sql = "INSERT INTO tbl_jurusan(Nama_Jurusan) VALUES ('$namajurusan')";

        $query = mysqli_query($db, $sql);
        if ($query) {
            echo "<script>
            alert('Jurusan Baru Berhasil Di Tambahkan');
            location.href ='../admin/jurusan.php';
            </script>";
        } else {
            echo mysqli_error($db);
        }
    }
}

if (isset($_GET['hapusJurusan'])) {
    include('koneksi.php"');
    $id = $_GET['hapusJurusan'];
    $sql = "DELETE FROM tbl_jurusan WHERE ID_Jurusan = '$id'";
    $query = mysqli_query($db, $sql);
    if ($query) {
        echo "<script>
		alert('Jurusan Berhasil Di Hapus');
		location.href = '../admin/jurusan.php';
		</script>";
    } else {
        echo mysqli_error($db);
    }
}

function get_jurusan($db, $id, $col)
{

    $qry = "SELECT * FROM tbl_jurusan WHERE ID_Jurusan = '$id'";
    $result = mysqli_query($db, $qry);
    $row = mysqli_fetch_array($result);
    switch ($col) {
        case 'idjurusan':
            return $row['ID_Jurusan'];
            break;
        case 'namajurusan':
            return $row['Nama_Jurusan'];
            break;
    }
}

if (isset($_POST['btneditjurusan'])) {
    include('koneksi.php"');

    $id = $_GET['id'];
    $namajurusan = $_POST['namajurusan'];


    if (empty($id)) {
        echo "<script>
                alert('ID Jurusan harus di isi');
                location.href ='../admin/jurusan.php';
            </script>";
        die();
    } else {

        $sql = "UPDATE tbl_jurusan SET Nama_Jurusan ='$namajurusan' WHERE ID_Jurusan = '$id'";

        $query = mysqli_query($db, $sql);

        if ($query) {
            echo "<script>
            alert('Jurusan Berhasil Di Edit');
            location.href ='../admin/jurusan.php';
            </script>";
        } else {
            echo mysqli_error($db);
        }
    }
}
