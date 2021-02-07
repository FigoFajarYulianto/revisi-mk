<?php
    require "connection.php";
    
    $id_user = $_GET["id_user"];
    $level = $_GET["level"];
    $sql = "DELETE FROM `user` WHERE `user`.`id_user` = $id_user";
    echo $level;
    $query = mysqli_query($conn, $sql);
    if($level == 1){
        header("Location: admin.php");
    }else{
        header("Location: user.php");
    }


?>