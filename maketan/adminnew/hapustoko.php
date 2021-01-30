<?php

$ambil = $koneksi->query("SELECT * FROM buka_toko WHERE id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();


$koneksi->query("DELETE FROM buka_toko WHERE id='$_GET[id]'");

echo "<script>alert('apakah anda yakin?');</script>";
echo "<script>location='admin.php?halaman=kategori';</script>";

?>