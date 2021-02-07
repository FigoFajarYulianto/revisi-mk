<?php
    session_start();
    require_once "connection.php";

    $id_user = $_SESSION["id_user"];
    $pwd_lama = $_POST["passwordLama"];
    $pwd_baru = $_POST["passwordBaru"];
    $pwd_baru_cek = $_POST["passwordBaruCek"];

    // Cek password lama
    $sql = "SELECT id_user from user where pass='$pwd_lama'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_num_rows($query);
    if($data < 1){
        header("Location: ubah-password.php?status=error-pwd-old");
    }

    // Verifikasi password baru
    if($pwd_baru != $pwd_baru_cek){
        header("Location: ubah-password.php?status=error-pwd-new");
    }

    // Update password
    $sql = "UPDATE user SET pass='$pwd_baru' where id_user='$id_user'";
    $query2 = mysqli_query($conn, $sql);

    if($query2){
        header("Location: ubah-password.php?status=berhasil");
    }
?>