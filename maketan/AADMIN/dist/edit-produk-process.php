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

move_uploaded_file($lokasifoto, "../../produk2/produk2/assets/img/produk/$namafoto");



$koneksi->query("UPDATE tb_produk SET nama_produk='$_POST[nama]',

id_kategori='$_POST[id_kategori]',harga='$_POST[harga_produk]',stok='$_POST[stok]',
id_satuan='$_POST[id_satuan]',map_link='$_POST[map]',

gbr_produk='$namafoto',deskripsi_produk='$_POST[deskripsi]'

WHERE id_produk='$_GET[id_produk]'");

}

else

{

$koneksi->query("UPDATE tb_produk SET nama_produk='$_POST[nama]',

id_kategori='$_POST[id_kategori]',harga='$_POST[harga_produk]',stok='$_POST[stok]',id_satuan='$_POST[id_satuan]',map_link='$_POST[map]',

deskripsi_produk='$_POST[deskripsi]' WHERE id_produk='$_GET[id_produk]'");

}

echo "<script>
alert('data produk telah diubah');
</script>";

header("Location: data-produk.php");



}

?>