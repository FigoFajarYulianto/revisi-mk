<?php
    session_start();
    require_once "koneksi.php";
    $id_user = $_SESSION["user_id"];
    $id_produk = $_GET["id-produk"];

    $sql = "delete from cart where user_id=$id_user and id_produk=$id_produk";
    $query = mysqli_query($koneksi, $sql);

    if($query){
        header("Location: cart.php");
    }

?>