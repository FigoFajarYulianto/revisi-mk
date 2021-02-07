<?php
    session_start();
    require_once "connection.php";
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $pass2 = $_POST["pass2"];
    $nama = $_POST["nama"];
    $gender = $_POST["gender"];
    $wa = $_POST["wa"];
    $alamat = $_POST["alamat"];
    $level = $_POST["level"];
    $id_user = $_GET["id_user"];

    if($pass != $pass2){
        header("Location: edit-user.php?error=error-password");
    }
    if($gender == "#"){
        header("Location: edit-user.php?error=error-gender");
    }
    if($level == "#"){
        header("Location: edit-user.php?error=error-level");
    }
    $status = $_GET["status"];
    if($status == "edit"){
        $sql = "UPDATE user SET email='$email', pass='$pass',  nama='$nama', jenis_kelamin='$gender', alamat='$alamat', nomor_wa='$wa', level=$level WHERE id_user=$id_user";
    }elseif($status == "add"){
        $sql = "INSERT INTO user VALUES (NULL, '$email', '$pass', '$nama', '$gender', '$alamat', '$wa', $level, 'tidak')";
    }
    $query = mysqli_query($conn, $sql);
    if($query){
        if($level == 1){
            header("Location: admin.php");
        }else{
            header("Location: user.php");
        }
    }

?> 