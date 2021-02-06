<?php
    session_start();
    require_once "connection.php";
    $id_user = $_SESSION["id_user"];
    $id_produk = $_GET["id-produk"];
    $jumlah = $_GET["jumlah"];

    $sql = "update cart set jumlah=$jumlah where id_user=$id_user and id_produk=$id_produk";
    $query = mysqli_query($conn, $sql);

    // if($query){
    //     header("Location: cart.php");
    // }

?>