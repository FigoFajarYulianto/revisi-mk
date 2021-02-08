<?php
    session_start();
    require_once "connection.php";
    if (isset($_POST['ubah']))

{

    $namafoto=$_FILES['foto'] ['name']; 

    $lokasifoto = $_FILES['foto'] ['tmp_name'];

    //jika foto dirubah

    if (!empty($lokasifoto))

    {

        move_uploaded_file($lokasifoto, "../../gambar/user/$namafoto");



        $koneksi->query("UPDATE user SET user_nama='$_POST[nama]',

        user_email='$_POST[email]',user_telepon='$_POST[wa]',user_foto='$namafoto',alamat='$_POST[alamat]'

        WHERE user_id='$_GET[user_id]'");

    }

    else

    {

        $koneksi->query("UPDATE user SET user_nama='$_POST[nama]',

        user_email='$_POST[email]',user_telepon='$_POST[wa]',alamat='$_POST[alamat]'

        WHERE user_id='$_GET[user_id]'");
    }
        
            
        
            header("Location: user.php");
        
}

?>