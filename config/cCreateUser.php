<?php

function get_alluser($db){
    global $db;
    $qry = "SELECT * FROM tbl_user";
    $result = mysqli_query($db,$qry);
    return $result;
}

function get_user($db,$id, $col){

    $qry = "SELECT * FROM tbl_user WHERE ID_User = '$id'";
    $result = mysqli_query($db,$qry);
    $row = mysqli_fetch_array($result);
    switch ($col){
        case 'id' :
            return $row['ID_User'];
            break;
        case 'username' :
            return $row['Nama_User'];
            break;
        case 'password' :
            return $row['Password_User'];
            break;
        case 'role' :
            return $row['Jenis_User'];
            break;
    }
}


if(isset($_GET['hapusUser'])){
    include ('koneksi.php"');
    $id = $_GET['hapusUser'];
    $sql = "DELETE FROM tbl_user WHERE ID_User = '$id'";
	$query = mysqli_query($db, $sql);
	if($query){
		echo "<script>
		alert('User Berhasil Di Hapus');
		location.href = '../admin/data_user.php';
		</script>";
	}else{
		echo mysqli_error($db);
	}
}


if(isset($_POST['btncreate'])){
    include ('koneksi.php"');
    $id 	= $_POST['id'];
    $user 	= $_POST['username'];
    $pass 	= $_POST['password'];
    $role 	= $_POST['role'];
     
    if (empty($user)){
        echo "<script>
        alert('Nama User atau Password harus di isi');
        location.href ='../admin/data_user.php';
        </script>";
        die();
    }else{
        //include "koneksi.php";
        $sql = "INSERT INTO tbl_user(ID, Nama_User, Password_User, Jenis_User) VALUES('$id', '$user','$pass','$role')"; 

        $query = mysqli_query($db, $sql);
        if($query){
            echo "<script>
            alert('User baru Berhasil Di Tambahkan');
            location.href ='../admin/data_user.php';
            </script>";
        }else{
            echo mysqli_error($db);
        }
    }
   
}


if(isset($_POST['btnedit'])){
    include ('koneksi.php"');

    $id = $_GET['id'];
    $user 	= $_POST['username'];
    $pass 	= $_POST['password'];
    $role 	= $_POST['role'];


    if (empty($user)){
        echo "<script>
                alert('Nama User atau Password harus di isi');
                location.href ='../admin/data_user.php';
            </script>";
        die();

    }else{

        $sql = "UPDATE tbl_user SET Nama_User='$user', Password_User='$pass', Jenis_User='$role' WHERE ID_User = '$id'";

        $query = mysqli_query($db, $sql);
        
        if($query){
            echo "<script>
            alert('User baru Berhasil Di Tambahkan');
            location.href ='../admin/data_user.php';
            </script>";
        }else{
            echo mysqli_error($db);
        }
    }
}

if(isset($_POST['btnlogin'])){

    include ('koneksi.php');

    $user 	= $_POST['username'];
    $pass 	= $_POST['password'];

    $sql = "SELECT * FROM tbl_user WHERE Nama_User = '$user' AND Password_User = '$pass'";
    
    $query = mysqli_query($db, $sql);
    if(mysqli_num_rows($query) > 0){
        $data = mysqli_fetch_array($query);
        
        if($data['Jenis_User'] == 'Admin'){
            $_SESSION['Akunlogin'] = $data['Nama_User'];
            echo "<script>
                alert('Anda Berhasil Login');
                location.href ='admin/index.php';
                </script>";
        }elseif($data['Jenis_User'] == 'Kepala Sekolah'){
            $_SESSION['Akunlogin'] = $data['Nama_User'];
            echo "<script>
                    alert('Anda Berhasil Login');
                    location.href ='kepsek/index.php';
                    </script>";        
        }elseif($data['Jenis_User'] == 'Guru'){
            $_SESSION['Akunlogin'] = $data['Nama_User'];
            $_SESSION['idguru'] = $data['ID'];
            echo "<script>
                alert('Anda Berhasil Login');
                location.href ='guru/index.php';
                </script>";
        }elseif($data['Jenis_User'] == 'Murid'){
            $_SESSION['Akunlogin'] = $data['ID'];
            $_SESSION['Namamurid'] = $data['Nama_User'];
            echo "<script>
                alert('Anda Berhasil Login');
                location.href ='murid/index.php';
                </script>";
        }
        }else{
            echo "<script>
            alert('Username / Password salah!');
            location.href ='index.php';
            </script>";
        }

}


if(isset($_POST['btnlupapass'])){
    include ('koneksi.php"');
    $user 	= $_POST['username'];
    $pass 	= $_POST['password'];


    if (empty($user)){
        echo "<script>
                alert('Nama User atau Password harus di isi');
                location.href ='../admin/lupa_pass.php';
            </script>";
        die();
    }else{

        $sql2 = "SELECT Nama_User FROM tbl_user WHERE Nama_User = '$user'";
        $query2 = mysqli_query($db, $sql2);
        $data = mysqli_num_rows($query2);

        if($data > 0){
            $sql = "UPDATE tbl_user SET Password_User = '$pass' WHERE Nama_User = '$user'";
            $query = mysqli_query($db, $sql);
            echo "<script>
            alert('Password Berhasil Di Ubah');
            location.href ='../index.php';
            </script>";
        }else{
            echo "<script>
                alert('Username tidak terdaftar');
                location.href ='../admin/lupa_pass.php';
            </script>";
            echo mysqli_error($db);
        }



    }
}