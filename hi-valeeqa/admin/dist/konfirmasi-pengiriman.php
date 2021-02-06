<?php
    require_once "connection.php";
    $id_transaksi = $_GET["id_transaksi"];

    // Ubah status sesuai keterangan
    if($_GET["status"] == "batal"){
        $sql_status = "update transaksi set status='gagal' where id_transaksi=$id_transaksi";

        // Mengembalikan stok produk
        $sql_kembali = "select * from detail_transaksi inner join produk on detail_transaksi.id_produk = produk.id_produk where id_transaksi=$id_transaksi";
        $query_kembali = mysqli_query($conn, $sql_kembali);
        while($data_kembali = mysqli_fetch_array($query_kembali)){
            $total = $data_kembali["jumlah"] + $data_kembali["stok"];
            $id_produk = $data_kembali["id_produk"];
            // Mengganti value stok di produk
            $sql_stok = "update produk set stok=$total where id_produk=$id_produk";
            $query_stok = mysqli_query($conn, $sql_stok);
        }
    }elseif ($_GET["status"] == "konfirmasi") {
        $resi = $_POST["resi"] == "" ? "-" : $_POST["resi"];
        $sql_status = "update transaksi set status='proses kirim', resi='$resi' where id_transaksi=$id_transaksi";
    }
    $query = mysqli_query($conn, $sql_status);

    if($query){
        header("Location: menunggu-pengiriman.php");
    }
?>