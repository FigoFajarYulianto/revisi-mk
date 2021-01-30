<?php 
	include 'koneksi.php';

	$nama = $_POST['nama'];
	$link = $_POST['link'];
	$kota = $_POST['kota'];
	$kode = $_POST['kode'];
	$map = $_POST['map'];
	
	$id = $_SESSION['user_id'];

	mysqli_query($koneksi,"insert into buka_toko values ('','$id','$nama','$link','$kota','$kode','$map')");
	
	header("location:../Dasboard.php?alert=registered");
?>