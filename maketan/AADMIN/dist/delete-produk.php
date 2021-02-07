<?php
    require "connection.php";
    
    $id_produk = $_GET["id_produk"];
    $sql1 = "select lokasi_gambar from gambar where id_produk=$id_produk";
    $sql2 = "DELETE FROM gambar WHERE id_produk=$id_produk";
    $sql3 = "DELETE FROM ukuran WHERE id_produk=$id_produk";
    $sql4 = "DELETE FROM produk WHERE id_produk=$id_produk";

    $query1 = mysqli_query($conn, $sql1);
    $data = mysqli_fetch_array($query1);
    // Hapus file
    $lokasi = "../../".$data["lokasi_gambar"];
    unlink($lokasi);

    // Hapus db gambar
    $query2 = mysqli_query($koneksi, $sql2);

    // Hapus ukuran
    $query3 = mysqli_query($koneksi, $sql3);

    // Hapus produk
    $query4 = mysqli_query($koneksi, $sql4);
    
        header("Location: data-produk.php");

?>