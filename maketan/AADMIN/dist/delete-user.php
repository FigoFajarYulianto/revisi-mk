<?php
    require "connection.php";
    
    $id_user = $_GET["user_id"];
    $sql = "DELETE FROM user WHERE user_id = '$id_user'";
    
    $query = mysqli_query($koneksi, $sql);
    if($level == 1){
        header("Location: admin.php");
    }else{
        header("Location: user.php");
    }


?>