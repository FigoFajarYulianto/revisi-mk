<?php
    require_once "connection.php";
    $id_transaksi = $_GET["id_transaksi"];

    // Ubah status sesuai keterangan
    if($_GET["status"] == "konfirmasi") {
        $sql = "update transaksi set status='selesai' where id_transaksi=$id_transaksi";
    }
    $query = mysqli_query($conn, $sql);

    if($query){
        header("Location: proses-pengiriman.php");
    }
?>