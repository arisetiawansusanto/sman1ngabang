<?php

function get_alljadwal($db)
{
    global $db;
    $qry = "SELECT * FROM tbl_jadwal";
    $result = mysqli_query($db, $qry);
    return $result;
}

function get_idjadwal($db)
{
    global $db;
    $qry = "SELECT ID_Jadwal FROM tbl_jadwal";
    $result = mysqli_query($db, $qry);
    return $result;
}



if (isset($_POST['btnjadwal'])) {
    include('koneksi.php"');

    $id_akad = $_POST['ajaran'];
    $namapelajaran     = $_POST['namapelajaran'];
    $namaguru = $_POST['namaguru'];
    $hari     = $_POST['hari'];
    $waktuM     = addslashes($_POST['waktumulai']);
    $waktuS     = addslashes($_POST['waktuselesai']);

    if (empty($namapelajaran)) {
        echo "<script>
        alert('ID Pelajaran harus di isi');
        location.href ='../admin/jadwal.php';
        </script>";
        die();
    } else {

        $sql = "INSERT INTO tbl_jadwal(id_akademik, Nama_Pelajaran, Nama_Guru, Hari, Waktumulai, Waktuselesai) VALUES('$id_akad', '$namapelajaran','$namaguru','$hari', '$waktuM', '$waktuS' )";

        $query = mysqli_query($db, $sql);
        if ($query) {
            echo "<script>
            alert('Jadwal Baru Berhasil Di Tambahkan');
            location.href ='../admin/jadwal.php';
            </script>";
        } else {
            echo mysqli_error($db);
        }
    }
}

if (isset($_GET['hapusJadwal'])) {
    include('koneksi.php"');
    $id = $_GET['hapusJadwal'];
    $sql = "DELETE FROM tbl_jadwal WHERE ID_Jadwal = '$id'";
    $query = mysqli_query($db, $sql);
    if ($query) {
        echo "<script>
		alert('Jadwal Berhasil Di Hapus');
		location.href = '../admin/jadwal.php';
		</script>";
    } else {
        echo mysqli_error($db);
    }
}

function get_jadwal($db, $id, $col)
{

    $qry = "SELECT * FROM tbl_jadwal WHERE ID_Jadwal = '$id'";
    $result = mysqli_query($db, $qry);
    $row = mysqli_fetch_array($result);
    switch ($col) {
        case 'idjadwal':
            return $row['ID_Jadwal'];
            break;
        case 'id_akad':
            return $row['id_akademik'];
            break;
        case 'namapelajaran':
            return $row['Nama_Pelajaran'];
            break;
        case 'namaguru':
            return $row['Nama_Guru'];
            break;
        case 'hari':
            return $row['Hari'];
            break;
        case 'waktuM':
            return $row['Waktumulai'];
            break;
        case 'waktuS':
            return $row['Waktuselesai'];
            break;
    }
}

if (isset($_POST['btneditjadwal'])) {
    include('koneksi.php"');

    $id = $_GET['id'];

    $id_akad = $_POST['ajaran'];
    $namapelajaran     = $_POST['namapelajaran'];
    $namaguru = $_POST['namaguru'];
    $hari     = $_POST['hari'];
    $waktuM     = addslashes($_POST['waktumulai']);
    $waktuS     = addslashes($_POST['waktuselesai']);

    if (empty($id)) {
        echo "<script>
                alert('ID Jadwal harus di isi');
                location.href ='../admin/jadwal.php';
            </script>";
        die();
    } else {

        $sql = "UPDATE tbl_jadwal SET id_akademik = '$id_akad', Nama_Pelajaran ='$namapelajaran', Nama_Guru ='$namaguru', Hari ='$hari', Waktumulai ='$waktuM', Waktuselesai ='$waktuS' WHERE ID_Jadwal = '$id'";

        $query = mysqli_query($db, $sql);

        if ($query) {
            echo "<script>
            alert('Jadwal Berhasil Di Edit');
            location.href ='../admin/jadwal.php';
            </script>";
        } else {
            echo mysqli_error($db);
        }
    }
}
