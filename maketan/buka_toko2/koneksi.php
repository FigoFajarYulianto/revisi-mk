<?php 
	$koneksi = mysqli_connect("localhost","root","","project_chat");
	
	session_start();


	if (mysqli_connect_error()) {
		echo "Koneksi database gagal :".mysqli_connect_error();
	}
?>