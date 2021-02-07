<?php
    require_once "connection.php";
    $id_user = $_GET["id_user"];
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $jk = $_POST["jk"];
    $wa = $_POST["wa"];
    $alamat = $_POST["alamat"];
    echo $jk;
    $sql = "update user set nama='$nama', email='$email', jenis_kelamin='$jk', alamat='$alamat', nomor_wa='$wa' where id_user='$id_user'";
    $query = mysqli_query($conn, $sql);

    if($query){
        header("Location: akun.php");
    }
?>