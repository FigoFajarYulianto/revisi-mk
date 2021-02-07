<?php
include "../koneksi.php";


session_start();
if(isset($_COOKIE['id']) && isset($_COOKIE['key']) ){
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

}

if($key === hash('sha256', $row['email']) ){
	$_SESSION['login'] = true;
}


if(isset($_POST['remember'])){

	setcookie('id', $row['id'], time()+60);
	setcookie('key', hash('sha256', $row["email"]) );
}

$email = $_POST['email'];
$password = md5($_POST['password']);


$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE user_email='$email' AND user_password='$password'"); 

$cek = mysqli_num_rows($sql);

if($cek == 1) { 
	session_start();
	$data = mysqli_fetch_assoc($sql);

	$_SESSION['user_id'] = $data['user_id']; 
	$_SESSION['user_status'] = 'login'; 
	header("Location:../index.php");
	return;
}else{
	header("location:login.php?alert=gagal");
}

?>