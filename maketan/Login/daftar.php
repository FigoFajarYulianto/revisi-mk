<?php include 'header.php'; ?>

<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
?>

<?php

//index.php

//error_reporting(E_ALL);

session_start();

if(isset($_SESSION["user_id"]))
{
	header("location:home.php");
}

include('function.php');

$connect = new PDO("mysql:host=localhost; dbname=maketan", "root", "");


$message = '';
$error_user_nama = '';
$error_user_email = '';
$error_user_alamat = '';
$error_user_password = '';
$error_user_telepon = '';
$user_nama = '';
$user_email = '';
$user_password = '';
$user_telepon = '';

if(isset($_POST["register"]))
{
	if(empty($_POST["user_nama"]))
	{
		$error_user_nama = "<label class='text-danger'>Enter Name</label>";
	}
	else
	{
		$user_nama = trim($_POST["user_nama"]);
		$user_nama = htmlentities($user_nama);
	}

	if(empty($_POST["user_email"]))
	{
		$error_user_email = '<label class="text-danger">Enter Email Address</label>';
	}
	else
	{
		$user_email = trim($_POST["user_email"]);
		if(!filter_var($user_email, FILTER_VALIDATE_EMAIL))
		{
			$error_user_email = '<label class="text-danger">Enter Valid Email Address</label>';
		}
	}

	if(empty($_POST["user_alamat"]))
	{
		$error_user_alamat = "<label class='text-danger'>Enter your address</label>";
	}
	else
	{
		$user_alamat = trim($_POST["user_alamat"]);
		$user_alamat = htmlentities($user_alamat);
	}

	if(empty($_POST["user_password"]))
	{
		$error_user_password = '<label class="text-danger">Enter Password</label>';
	}
	else
	{
		$user_password = md5($_POST["user_password"]);
		// $user_password = password_hash($user_password, PASSWORD_DEFAULT);
	}

	if(empty($_POST["user_telepon"]))
	{
		$error_user_telepon = "<label class='text-danger'>Enter phone number</label>";
	}
	else
	{
		$user_telepon = trim($_POST["user_telepon"]);
		$user_telepon = htmlentities($user_telepon);
	}

	if($error_user_nama == '' && $error_user_email == '' && $error_user_alamat == '' && $error_user_password == '' && $error_user_telepon == '')
	{
		$user_activation_code = md5(rand());

		$user_otp = rand(100000, 999999);

		$user_foto = '';

		$user_status = 'online';

		$data = array(
			':user_nama'			=>	$user_nama,
			':user_email'			=>	$user_email,
			':user_alamat'			=>	$user_alamat,
			':user_password'		=>	$user_password,
			':user_activation_code' => $user_activation_code,
			':user_email_status'	=>	'not verified',
			':user_otp'				=>	$user_otp,
			':user_foto'			=>	$user_foto,
			':user_status'			=>	$user_status,
			':user_telepon'			=>	$user_telepon,
		);

		$query = "
		INSERT INTO user 
		(user_nama, user_email, user_alamat, user_password, user_activation_code, user_email_status, user_otp, user_foto, user_status, user_telepon)
		SELECT * FROM (SELECT :user_nama, :user_email, :user_alamat,  :user_password, :user_activation_code, :user_email_status, :user_otp, :user_foto, :user_status, :user_telepon) AS tmp
		WHERE NOT EXISTS (
		    SELECT user_email FROM user WHERE user_email = :user_email
		) LIMIT 1
		";

		$statement = $connect->prepare($query);

		$statement->execute($data);

		if($connect->lastInsertId() == 0)
		{
			$message = '<label class="text-danger">Email Already Register</label>';
		}	
		else
		{
			$user_avatar = make_avatar(strtoupper($user_nama[0]));

			$query = "
			UPDATE register_user 
			SET user_avatar = '".$user_avatar."' 
			WHERE register_user_id = '".$connect->lastInsertId()."'
			";

			$statement = $connect->prepare($query);

			$statement->execute();

			// require 'class/class.phpmailer.php'; 
			$mail = new PHPMailer;
			$mail->IsSMTP();
			$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'maketanresmi@gmail.com';                     // SMTP username
			$mail->Password   = 'maketan213';                               // SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
			$mail->Port = '587'; 
			$mail->From = 'maketanresmi@gmail.com';
			$mail->FromName = 'Maketan';
			$mail->AddAddress($user_email);
			$mail->WordWrap = 50;
			$mail->IsHTML(true);
			$mail->Subject = 'Verification code for Verify Your Email Address';

			$message_body = '
			<p>Untuk verifikasi alamat email anda, Masukkan kode verifikasi ini : <b>'.$user_otp.'</b>.</p>
			<p>Web Maketan,</p>
			';
			$mail->Body = $message_body;

			if($mail->Send())
			{
				echo '<script>alert("Please Check Your Email for Verification Code")</script>';

				header('location:email_verify.php?code='.$user_activation_code);
			}
			else
			{
				$message = $mail->ErrorInfo;
			}
		}

	}
}

?>


<!DOCTYPE html>
<!-- Style Phone Number -->

<style>

input:invalid + span:after {

    content: 'Salah';

    color: #f00;

    padding-left: 5px;

}



input:valid + span:after {

    content: 'Benar';

    color: #26b72b;

    padding-left: 5px;

}

</style>

<!-- Penutup Style Phone Number -->



<div class="container">



    <div class="row">



        <div class="col-12 col-lg-4 mx-auto ">

            <div class="border_daftar">

                <center>

                    <a href="index.php"><img src="../gambar/sistem/maketan3.png" style="width:auto; height:150px;"></a>

                </center>

	
				


                <center>

                    <h5>Daftar</h5>

                </center>

                <!-- echo'<div class="alert alert-danger text-center">';  -->
				<?php echo $message; ?>
				<!-- echo'</div>';  -->

                <div class="">



                    <form method="post">



                        <div class="form-group">

                            <label>Nama Lengkap</label>

                            <input type="text" name="user_nama" class="form-control" required='required' autocomplete="off"

                                placeholder="Masukkan nama lengkap ..">

                        </div>



                        <div class="form-group">

                            <label>Email</label>

                            <input type="email" name="user_email" class="form-control" required='required' autocomplete="off"

                                placeholder="Masukkan email ..">

                        </div>


						<div class="form-group">

                            <label>Alamat</label>

                            <input type="text" name="user_alamat" class="form-control" required='required' autocomplete="off"

                                placeholder="Masukkan alamat ..">

                        </div>



                        <div class="form-group">

                            <label>Password</label>

                            <input oninvalid="this.setCustomValidity('password terlalu pendek!')" oninput="setCustomValidity('')" minlength="8" required type="password" class="form-control form-control-user" id="user_password" name="user_password"

                                autocomplete="off" placeholder="Masukkan password ..">

                        </div>

                        <div class="form-group">

                            <label>Ulangi Password</label>

                            <input oninvalid="this.setCustomValidity('password terlalu pendek!')" oninput="setCustomValidity('')" minlength="8" required type="password" class="form-control form-control-user" id="user_repeatpassword" name="user_repeatpassword"

                                autocomplete="off" placeholder="Masukkan password ..">

                        </div>



                        <div class="form-group">

                            <label>Nomer Telepon</label>

                            <input type="tel" name="user_telepon" pattern="[0-9]{11,12}" class="form-control" required='required'

                            autocomplete="off" placeholder="Masukkan nomer telepon ..">

                            <span class="note">Contoh : 081234567891</span>

                        </div>


                        <button id="register" name="register" type="submit" class="btn btn-primary btn-block mt-4">
                                    Daftar
                        </button>
                        <!-- <input type="submit" class="btn btn-primary btn-block mt-4" name="DAFTAR" value="DAFTAR"> -->

                        <p class="text-center mt-3">

                            Sudah punya akun?

                            <br>

                            <small><a href="login.php">Login</a></small>

                        </p>

                    </form>

                </div>

            </div>

        </div>



    </div>





</div>

<?php include 'footer.php'; ?>
<?php include "scripts.php"; ?>

<script>
    $(document).ready(function() {
        $('#register').click(function(event) {

            data = $('#user_password').val();
            let len = data.length;

            if ($('#user_password').val() != $('#user_repeatpassword').val()) {
                alert("Password dan ulangi Password tidak sama!");
                // Prevent form submission
                event.preventDefault();
            }

        });
    });
</script>