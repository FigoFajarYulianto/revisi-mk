<?php
    session_start();
    require_once "koneksi.php";
    if(!isset($_SESSION["user_id"]) and !isset($_SESSION["user_id"])){
        header("Location: Login/login.php");
    }
    $id_user = $_SESSION["user_id"];
    $id_produk = $_GET["id_produk"];
    $jumlah = $_GET["jumlah"];
    
    // Cek jumlah tidak minus atau melebihi jumlah stok
    $sql = "select stok from tb_produk where id_produk=$id_produk";
    $query0 = mysqli_query($koneksi, $sql);
    $data0 = mysqli_fetch_array($query0);
    if($jumlah < 1){
        header("Location: cart.php?status=minus");
        return 0;
    }elseif($jumlah > $data0["stok"]){
        header("Location: cart.php?status=unavailable");
        return 0;
    }

    // Cek produk sudah ditambahkan ke keranjang oleh user
    $sql = "select * from cart where id_produk='$id_produk' and user_id='$id_user'";
    $query1 = mysqli_query($koneksi, $sql);
    $data = mysqli_num_rows($query1);
    if($data != 0){
        header("Location: cart.php?status=exist");
        return 0;
    }else{
        // Tambah produk ke keranjang
        $sql = "insert into cart values ('$id_user', '$id_produk', '$jumlah')";
        $query2 = mysqli_query($koneksi, $sql);
        if($query2){
            header("Location: cart.php?status=success");
        }
    }

    
?>