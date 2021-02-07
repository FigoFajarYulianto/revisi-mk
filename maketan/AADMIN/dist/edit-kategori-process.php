<?php
    require_once "connection.php";
    $kategori = $_POST["kategori"];
    $id_kategori = $_GET["id_kategori"];

    $status = $_GET["status"];
    if($status == "edit"){
        $sql = "UPDATE kategori SET nama_kategori='$kategori' WHERE id_kategori='$id_kategori'";
    }elseif($status == "add"){
        $sql = "INSERT INTO kategori(nama_kategori) VALUES ('$kategori')";
    }
    
    $query = mysqli_query($koneksi, $sql);
    if($query){
        header("Location: kategori.php");
    }

?>