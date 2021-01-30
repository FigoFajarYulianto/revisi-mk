<?php

$ambil = $koneksi->query("SELECT * FROM tb_produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();


$koneksi->query("DELETE FROM tb_produk WHERE id_produk='$_GET[id]'");

echo "<script>alert('apakah anda yakin?');</script>";
echo "<script>location='admin.php?halaman=produk';</script>";

?>