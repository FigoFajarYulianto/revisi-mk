<?php
    require "connection.php";
    
    $id_kategori = $_GET["id_kategori"];
    $sql = "DELETE FROM `kategori` WHERE `kategori`.`id_kategori` = $id_kategori";
    $query = mysqli_query($conn, $sql);
    if($query){
        header("Location: kategori.php");
    }


?>