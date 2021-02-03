<?php

// Import PHPMailer classes into the global namespace

// These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\SMTP;

use PHPMailer\PHPMailer\Exception;



require 'PHPMailer/src/Exception.php';

require 'PHPMailer/src/PHPMailer.php';

require 'PHPMailer/src/SMTP.php';

require 'koneksi.php';



?>

<?php

include("../koneksi.php");



$nama = mysqli_real_escape_string($koneksi,$_POST['nama']);

$email = mysqli_real_escape_string($koneksi,$_POST['email']);

$telepon = mysqli_real_escape_string($koneksi,$_POST['telepon']);

$password = md5($_POST['password']);


$cek = mysqli_query($koneksi,"SELECT * FROM user WHERE user_email='$email'");

//Generate Vkey
$vkey = md5(time().$nama);

if(mysqli_num_rows($cek) > 0){

	header("Location:daftar.php?alert=duplikat");

}else{

	// daftar user

	$sql = mysqli_query($koneksi,"INSERT INTO user (user_email,user_nama,user_telepon,user_password,vkey,user_foto,user_status) VALUES ('$email','$nama','$telepon','$password','$vkey','','online')"); 

	header("Location:login.php?alert=registered");

}

if($sql){

	$mail = new PHPMailer(true);

    try {

	//Server settings

	$mail->isSMTP();                                            // Send using SMTP

	$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through

	$mail->SMTPAuth   = true;                                   // Enable SMTP authentication

	$mail->Username   = 'maketanresmi@gmail.com';                     // SMTP username

	$mail->Password   = 'maketan312';                               // SMTP password

	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

	$mail->Port = '587';            


	//Send email
	$to = $email;
	$subject = "Verifikasi Email";
	$message = "<a href='http://localhost/revisi-mk/maketan/Login/verify.php?vkey=$vkey'> Registrasi akun</a>";
	$headers = "From: maketanresmi@gmail.com";
	$headers .= "MINE-version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	mail($to,$subject,$message,$headers);

	header('location:thankyou.php');

	echo $mysqli->error;

} catch (Exception $e) 

                    

{

	echo'<div class="alert alert-danger text-center">';

	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

	echo'</div>';

}
}



?>