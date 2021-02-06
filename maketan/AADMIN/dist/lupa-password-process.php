<?php
    require_once "connection.php";

    $id_user = $_GET["id_user"];

    // Edit status lupa password
    $sql = "update user set lupa_password='tidak' where id_user=$id_user";
    $query = mysqli_query($conn, $sql);
    if($query){
        header("Location: lupa-password.php");
    }
?>