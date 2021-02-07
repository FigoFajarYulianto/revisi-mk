<?php

    // session_start();
    require_once "connection.php";
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $pass2 = $_POST["pass2"];
    $gender = $_POST["gender"];
    $wa = $_POST["wa"];
    $alamat = $_POST["alamat"];

    // Validasi form
    if($nama == "" || $email == "" || $pass == "" || $pass2 == "" || $gender == "" || $wa == "" || $alamat == ""){
        header("Location: register.php?status=error");
    }elseif($pass != $pass2){
        header("Location: register.php?status=pwd-error");
    }elseif($gender == "#"){
        header("Location: register.php?status=gender-error");
    }else{
        // Cek apakah email sudah terdaftar atau belum
        $sql_cek = "select email from user";
        $query_cek = mysqli_query($conn, $sql_cek);
        while($data_cek = mysqli_fetch_array($query_cek)){
            if($email == $data_cek["email"]){
                header("Location: register.php?status=email-exist");
                return 0;
            }
        }

        // Masukan data ke database
        $query = mysqli_query($conn, "INSERT INTO user (email, pass, nama, jenis_kelamin, alamat, nomor_wa, level) VALUES ('$email', '$pass', '$nama', '$gender', '$alamat', '$wa', 0)");

        if($query){
            header("Location: login.php?status=success");
        }else{
            header("Location: register.php?status=error");
        }
    }

    

?>