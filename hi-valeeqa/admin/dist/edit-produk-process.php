<?php
    require_once "connection.php";

    $status = $_GET["status"];
    $id_produk = isset($_GET["id_produk"]) ? $_GET["id_produk"] : "";

    $kategori = $_POST["kategori"];
    $nama_barang = $_POST["nama_barang"];
    $warna = $_POST["warna"];
    $bahan = $_POST["bahan"];
    $harga = $_POST["harga"];
    
    $panjang = $_POST["panjang"];
    $lebar_dada = $_POST["lebar-dada"];
    $stok = $_POST["stok"];
    $keterangan = $_POST["keterangan"] != "" ? $_POST["keterangan"] : "-";
    if(isset($_POST["best-seller"])){
        $best_seller = $_POST["best-seller"] == "on" ? 1:0;
    }else{
        $best_seller = 0;
    }
    
    $error_gambar = $status == "edit" ? 0 : $_FILES["gambar"]["error"];
    if(intval($harga) < 0){
        header("Location: edit-produk.php?id_produk=$id_produk&status=$status&error=harga");
        return 0;
    }
    if($kategori == "#"){
        header("Location: edit-produk.php?id_produk=$id_produk&status=$status&error=kategori");
        return 0;
    }
    if($error_gambar == 4){
        header("Location: edit-produk.php?id_produk=$id_produk&status=$status&error=gambar");
        return 0;
    }else{
        $gambar_tmp = $_FILES["gambar"]["tmp_name"];
        $gambar = $_FILES["gambar"]["name"];
    }
    // Query

    if($status == "edit"){
        // Edit produk
        $sql = "update produk set id_kategori='$kategori', nama_barang='$nama_barang', warna='$warna', bahan='$bahan', harga='$harga', stok='$stok', keterangan='$keterangan', best_seller='$best_seller' where id_produk='$id_produk'";
        $query = mysqli_query($conn, $sql);
        // Edit ukuran
        $sql = "update ukuran set panjang=$panjang, lebar_dada=$lebar_dada where id_produk=$id_produk";
        $query = mysqli_query($conn, $sql);
        
        // Cek jika ada file yang diupload
        if($_FILES["gambar"]["size"] == !0){
            // Unlink gambar
            $sql = "select lokasi_gambar from gambar where id_produk=$id_produk";
            $query = mysqli_query($conn, $sql);
            $data = mysqli_fetch_array($query);
            unlink("../../".$data["lokasi_gambar"]);

            // Edit gambar
            $lokasi_gambar_dst = "images/product-img/".$gambar;
            $sql2 = "update gambar set id_kategori='$kategori', lokasi_gambar='$lokasi_gambar_dst' where id_produk=$id_produk";
            $query2 = mysqli_query($conn, $sql2);    
            move_uploaded_file($gambar_tmp, "../../".$lokasi_gambar_dst);
        }
        
    }elseif($status == "add"){
        // Tambah produk
        $sql = "insert into produk values(NULL, '$kategori', '$nama_barang', '$warna', '$bahan', $harga, '$keterangan', $stok, $best_seller)";
        $query = mysqli_query($conn, $sql);

        // Mencari id produk terakhir yang ditambahkan
        $sql2 = "select id_produk from produk order by id_produk desc limit 1";
        $query2 = mysqli_query($conn, $sql2);
        $data2 = mysqli_fetch_array($query2);
        $id_produk = $data2["id_produk"];

        // Tambah ukuran
        $sql3 = "insert into ukuran values($id_produk, $lebar_dada, $panjang)";
        $query3 = mysqli_query($conn, $sql3);

        // Tambah gambar
        $lokasi_gambar_dst = "images/product-img/".$gambar;
        $sql4 = "insert into gambar values($id_produk, '$lokasi_gambar_dst')";
        $query4 = mysqli_query($conn, $sql4);    
        move_uploaded_file($gambar_tmp, "../../".$lokasi_gambar_dst);

    }

    
        header("Location: data-produk.php");


?>