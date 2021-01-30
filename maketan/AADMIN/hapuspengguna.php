<?php

$ambil = $koneksi->query("SELECT * FROM user WHERE user_id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$foto = $pecah['../gambar/user/'];
if (file_exists("../gambar/user/$foto")) {
    unlink("../gambar/user/$foto");

}

$koneksi->query("DELETE FROM user WHERE user_id='$_GET[id]'");

echo "<script>alert('apakah anda yakin?');</script>";
echo "<script>location='admin.php?halaman=pengguna';</script>";

?>