<?php

include("../koneksi.php");
include("header.php");



$nama = mysqli_real_escape_string($koneksi,$_POST['nama']);

$email = mysqli_real_escape_string($koneksi,$_POST['email']);

$telepon = mysqli_real_escape_string($koneksi,$_POST['telepon']);

$password = md5($_POST['password']);


$cek = mysqli_query($koneksi,"SELECT * FROM user WHERE user_email='$email'");


//Generate Vkey
$vkey = md5(time().$nama);
//Penutup vkey

if(mysqli_num_rows($cek) > 0){

	header("Location:daftar.php?alert=duplikat");

}else{

	// daftar user

	$sql = mysqli_query($koneksi,"INSERT INTO user (user_email,user_nama,user_telepon,user_password,vkey,user_foto,user_status) VALUES ('$email','$nama','$telepon','$password','$vkey','','online')"); 

	header("Location:login.php?alert=registered");

}

?>