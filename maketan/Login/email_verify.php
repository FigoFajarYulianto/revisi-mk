<?php

//email_verify.php

$connect = new PDO("mysql:host=localhost;dbname=maketan", "root", "");

$error_user_otp = '';
$user_activation_code = '';
$message = '';

if(isset($_GET["code"]))
{
	$user_activation_code = $_GET["code"];

	if(isset($_POST["submit"]))
	{
		if(empty($_POST["user_otp"]))
		{
			$error_user_otp = 'Enter OTP Number';
		}
		else
		{
			$query = "
			SELECT * FROM user 
			WHERE user_activation_code = '".$user_activation_code."' 
			AND user_otp = '".trim($_POST["user_otp"])."'
			";

			$statement = $connect->prepare($query);

			$statement->execute();

			$total_row = $statement->rowCount();

			if($total_row > 0)
			{
				$query = "
				UPDATE user 
				SET user_email_status = 'verified' 
				WHERE user_activation_code = '".$user_activation_code."'
				";

				$statement = $connect->prepare($query);

				if($statement->execute())
				{
					header('location:login.php?register=success');
				}
			}
			else
			{
				$message = '<label class="text-danger">Masukkan nomer otp yang benar</label>';
			}
		}
	}
}
else
{
	$message = '<label class="text-danger">Invalid Url</label>';
}

?>
<!DOCTYPE html>
<?php include 'header.php'; ?>

<div class="container">

	<div class="row">
		<div class="col-lg-4 mx-auto">

			<div class="pt-4 pb-3">

			<div class="border">
				<center>
					<a href="requestReset.php"><img src="../gambar/sistem/maketan3.png" style="width:auto; height:150px; margin-right:auto; margin-left:auto;"></a>
				</center>
				<br>

				<?php echo'<div class="alert alert-danger text-center">'; ?>
				<?php echo $message; ?>
				<?php echo $error_user_otp; ?>
				<?php echo'</div>'; ?>
				
				


				<center><h5>Kode Otp</h5></center>
                <center><p><font size="3">Kode Otp telah di kirim ke email anda, jika anda tidak menerimanya silahkan cek di menu spam yang ada di akun email anda</font></p></center>
                <form method="POST">
                <div class="form-group">
				<label>Kode Otp</label>
				<input type="text" name="user_otp" class="form-control" required='required' autocomplete="off" name="user_otp" placeholder="Masukkan kode Otpnya ..">
				</div>
				<div class="form-group">
                <input type="submit" class="btn btn-primary btn-block mt-4" name="submit" value="Lanjutkan">
				</div>

				<?php include 'footer.php'; ?>
				</form>