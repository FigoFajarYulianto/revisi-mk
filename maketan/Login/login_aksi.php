<?php
include "../koneksi.php";


session_start();
if(isset($_COOKIE['id']) && isset($_COOKIE['key']) ){
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];
	$status = $_COOKIE['status'];

}

if($key === hash('sha256', $row['email']) ){
	$_SESSION['login'] = true;
}

if($status === hash('sha256', $row['user_email_status']) ){
	$_SESSION['verified'] = true;
}

if(isset($_POST['remember'])){

	setcookie('id', $row['id'], time()+60);
	setcookie('key', hash('sha256', $row["email"]) );
	setcookie('status', hash('sha256', $row["user_email_status"]) );
}

$email = $_POST['email'];
$password = md5($_POST['password']);
$user_email_status = $_POST['user_email_status'];


$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE user_email='$email' AND user_password='$password' AND user_email_status='verified'"); 

$cek = mysqli_num_rows($sql);

if($cek == 1) { 
	session_start();
	$data = mysqli_fetch_assoc($sql);

	$_SESSION['user_id'] = $data['user_id']; 
	$_SESSION['user_status'] = 'login'; 
	$_SESSION['user_email_status'] = 'verified'; 
	header("Location:../index.php");
	return;
}else{
	header("location:login.php?register=gagal");
}

?>