<?php
    require_once "connection.php";

    $email = $_POST["email"];

    // Cek email sudah terdaftar atau belum
    $sql = "select * from user where email='$email'";
    $query = mysqli_query($conn, $sql);
    $data_total = mysqli_num_rows($query);
    if($data_total == 0){
        header("Location: lupa-password.php?status=not-found");
    }else{
        $data = mysqli_fetch_array($query);
        $nama = $data["nama"];
        echo $nama;
        // Set status user menjadi lupa password
        $sql = "update user set lupa_password='ya' where email='$email'";
        $query2 = mysqli_query($conn, $sql);
        if($query2){
            header("Location: lupa-password.php?status=success&email=$email&nama=$nama");
        }
    }

    
?>