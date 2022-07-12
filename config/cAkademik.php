<?php

function get_allAkademik($db)
{
    global $db;
    $qry = "SELECT * FROM tbl_akademik";
    $result = mysqli_query($db, $qry);
    return $result;
}

function get_akademik($db, $id, $col)
{

    $qry = "SELECT * FROM tbl_akademik WHERE id = '$id'";
    $result = mysqli_query($db, $qry);
    $row = mysqli_fetch_array($result);
    switch ($col) {
        case 'id':
            return $row['id'];
            break;
        case 'tahun':
            return $row['tahun'];
            break;
        case 'semester':
            return $row['semester'];
            break;
    }
}


if (isset($_POST['btnakademik'])) {
    include('koneksi.php"');

    $tahun  = $_POST['tahun'];
    $semester = $_POST['semester'];

    $sql = "INSERT INTO tbl_akademik(tahun, semester) VALUES('$tahun','$semester')";

    $query = mysqli_query($db, $sql);
    if ($query) {
        echo "<script>
            alert('Data Baru Berhasil Di Tambahkan');
            location.href ='../admin/akademik.php';
            </script>";
    } else {
        echo mysqli_error($db);
    }
}

if (isset($_GET['hapusAkademik'])) {
    include('koneksi.php"');

    $id = $_GET['hapusAkademik'];

    $sql = "DELETE FROM tbl_akademik WHERE id = '$id'";
    $query = mysqli_query($db, $sql);
    if ($query) {
        echo "<script>
		alert('Tahun Akademik Berhasil Di Hapus');
		location.href = '../admin/akademik.php';
		</script>";
    } else {
        echo mysqli_error($db);
    }
}


if (isset($_POST['btneditakademik'])) {
    include('koneksi.php"');

    $id = $_GET['id'];

    $tahun  = $_POST['tahun'];
    $semester  = $_POST['semester'];

    $sql = "UPDATE tbl_akademik SET tahun ='$tahun', semester = '$semester' WHERE id = '$id'";

    $query = mysqli_query($db, $sql);

    if ($query) {
        echo "<script>
            alert('Tahun Akademik Berhasil Di Edit');
            location.href ='../admin/akademik.php';
            </script>";
    } else {
        echo mysqli_error($db);
    }
}
