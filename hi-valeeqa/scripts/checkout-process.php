<?php
    session_start();
    require_once "connection.php";
    $id_user = $_SESSION["id_user"];

    $jenis_pembayaran = $_POST["jenis-pembayaran"];
    $jenis_pengiriman = $_POST["jenis-pengiriman"];
    $total = $_POST["total"];
    $tanggal = date("Y-m-d");
    
    // Cek jumlah stok yang tersedia
    $sql_cek_stok = "select * from cart inner join produk on cart.id_produk = produk.id_produk where cart.id_user=$id_user";
    $query_cek_stok = mysqli_query($conn, $sql_cek_stok);
    while($data_cek_stok = mysqli_fetch_array($query_cek_stok)){
        if(($data_cek_stok["stok"] - $data_cek_stok["jumlah"]) < 0){
            $nama_barang = $data_cek_stok['nama_barang'];
            header("Location: cart.php?status=stok&barang=".$nama_barang);
            return 0;
        }else{
            // Mengurangi stok pada produk
            $stok_sisa = $data_cek_stok["stok"] - $data_cek_stok["jumlah"];
            $id_produk = $data_cek_stok['id_produk'];
            $sql_stok = "update produk set stok=$stok_sisa where id_produk=$id_produk";
            $query_stok = mysqli_query($conn, $sql_stok);
        }
    }

    // Menambah transaksi
    $tabungan = 0;
    $status = "belum bayar";
    $resi = "-";
    $sql_transaksi = "insert into transaksi values (NULL, $id_user, '$jenis_pembayaran', '$jenis_pengiriman', '$tanggal',  $tabungan, $total, 'belum bayar', '-')";
    $query_transaksi = mysqli_query($conn, $sql_transaksi);

    // Cari id transaksi yang terakhir ditambahkan
    $sql_cari_id = "select id_transaksi from transaksi order by id_transaksi desc limit 1";
    $query_cari_id = mysqli_query($conn, $sql_cari_id);
    $data_cari_id = mysqli_fetch_array($query_cari_id);
    $id_transaksi = $data_cari_id["id_transaksi"];

    // Mendapatkan data dari keranjang
    $sql_keranjang = "select * from cart where id_user=$id_user";
    $query_keranjang = mysqli_query($conn, $sql_keranjang);

    while($data_keranjang = mysqli_fetch_array($query_keranjang)){
        // Tambahkan data ke detail transaksi
        $id_produk = $data_keranjang["id_produk"];
        $jumlah = $data_keranjang["jumlah"];
        $sql_detail_transaksi = "insert into detail_transaksi values($id_transaksi, $id_produk, $jumlah)";
        $query_detail_transaksi = mysqli_query($conn, $sql_detail_transaksi);
    }

    // Hapus barang dari cart
    $sql_hapus_keranjang = "delete from cart where id_user=$id_user";
    $query_hapus_keranjang = mysqli_query($conn, $sql_hapus_keranjang);

    header("Location: transaksi-history.php");
    


?>