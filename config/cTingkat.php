<?php

function get_alltingkat($db)
{
    global $db;
    $qry = "SELECT * FROM tbl_tingkat";
    $result = mysqli_query($db, $qry);
    return $result;
}

if (isset($_POST['btntingkat'])) {
    include('koneksi.php"');

    $tingkat = $_POST['tingkat'];

    if (empty($tingkat)) {
        echo "<script>
        alert('Tingkat harus di isi');
        location.href ='../admin/tingkat.php';
        </script>";
        die();
    } else {

        $sql = "INSERT INTO tbl_tingkat(Tingkat_Kelas) VALUES('$tingkat')";

        $query = mysqli_query($db, $sql);
        if ($query) {
            echo "<script>
            alert('Tingkat Baru Berhasil Di Tambahkan');
            location.href ='../admin/tingkat.php';
            </script>";
        } else {
            echo mysqli_error($db);
        }
    }
}

if (isset($_GET['hapusTingkat'])) {
    include('koneksi.php"');
    $id = $_GET['hapusTingkat'];
    $sql = "DELETE FROM tbl_tingkat WHERE ID_Tingkat = '$id'";
    $query = mysqli_query($db, $sql);
    if ($query) {
        echo "<script>
		alert('Tingkat Berhasil Di Hapus');
		location.href = '../admin/tingkat.php';
		</script>";
    } else {
        echo mysqli_error($db);
    }
}

function get_tingkat($db, $id, $col)
{

    $qry = "SELECT * FROM tbl_tingkat WHERE ID_Tingkat = '$id'";
    $result = mysqli_query($db, $qry);
    $row = mysqli_fetch_array($result);
    switch ($col) {
        case 'idtingkat':
            return $row['ID_Tingkat'];
            break;
        case 'idregistrasi':
            return $row['ID_Registrasi'];
            break;
        case 'jenistingkat':
            return $row['Tingkat_Kelas'];
            break;
    }
}

if (isset($_POST['btnedittingkat'])) {
    include('koneksi.php"');

    $id = $_GET['id'];
    $tingkat = $_POST['tingkat'];


    if (empty($id)) {
        echo "<script>
                alert('ID Tingkat di isi');
                location.href ='../admin/tingkat.php';
            </script>";
        die();
    } else {

        $sql = "UPDATE tbl_tingkat SET Tingkat_Kelas ='$tingkat' WHERE ID_Tingkat = '$id'";

        $query = mysqli_query($db, $sql);

        if ($query) {
            echo "<script>
            alert('Tingkat Berhasil Di Edit');
            location.href ='../admin/tingkat.php';
            </script>";
        } else {
            echo mysqli_error($db);
        }
    }
}
