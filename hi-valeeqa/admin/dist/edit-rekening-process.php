<?php
    require_once "connection.php";

    $nama = $_POST["nama"];
    $rekening = $_POST["rekening"];
    $bank = $_POST["bank"];
    $wa = $_POST["wa"];
    
    if(substr($wa, 0, 1) == "0" or substr($wa, 0, 1) == "+"){
        header("Location: edit-rekening.php?error=wa");
    }else{
        $sql = "update rekening set nama='$nama', rekening='$rekening', bank='$bank', nomor_wa=$wa";
        $query = mysqli_query($conn, $sql);

        if($query){
            header("Location: rekening.php");
        }
    }
    
?>