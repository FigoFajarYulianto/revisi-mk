<?php
    session_start();
    if(isset($_GET["kategori"])){
        $kategori = $_GET["kategori"];
        $header = $header."kategori=$kategori";
    }
    if(isset($_GET["warna"])){
        $warna = $_GET["warna"];
        $header = $header."&warna=$warna";
    }
    if(isset($_GET["harga_min"])){
        $harga_min = $_GET["harga_min"];
        if($harga_min != ""){
            $header = $header."&harga_min=$harga_min";
        }
    }
    if(isset($_GET["harga_max"])){
        $harga_max = $_GET["harga_max"];
        if($harga_max != ""){
            $header = $header."&harga_max=$harga_max";
        }
    }
    $_SESSION["header"] = $header;
    header("Location: search.php?".$header);

?>