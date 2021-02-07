<?php
    session_start();
    require_once "connection.php";
    $id_user = $_SESSION["id_user"];
    $id_produk = $_GET["id-produk"];

    $sql = "delete from cart where id_user=$id_user and id_produk=$id_produk";
    $query = mysqli_query($conn, $sql);

    if($query){
        header("Location: cart.php");
    }

?>