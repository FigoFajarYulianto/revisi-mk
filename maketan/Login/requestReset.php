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

<form method="POST">
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

               <?php
                if(isset($_POST["email"])) {

                    $emailTo = $_POST["email"];

                    $code = uniqid(true);
                    $query = mysqli_query($koneksi, "INSERT INTO resetpassword(code, email) VALUES('$code','$emailTo')");
                    if(!$query) {
                        exit("Error");
                    }

                    $mail = new PHPMailer(true);
                    try {
                        //Server settings
                        $mail->isSMTP();                                            // Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                        $mail->Username   = 'maketanresmi@gmail.com';                     // SMTP username
                        $mail->Password   = 'maketan312';                               // SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->Port = '587';                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                    
                        //Recipients
                        $mail->setFrom('maketanresmi@gmail.com', 'Maketan');
                        $mail->addAddress($emailTo);     // Add a recipient
                        $mail->addReplyTo('no-reply@gmail.com', 'No reply');
                    
                        // Content
                        $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/resetpassword.php?code=$code";
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = 'Link reset password anda';
                        $mail->Body    = "<h1>Kamu merequest untuk reset password</h1>
                                            Klik <a href='$url'>link ini</a> untuk melakukannya";
                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                    
                        echo'<div class="alert alert-success text-center">';
                        $mail->send();
                        echo 'Reset untuk password telah di kirim ke email anda';
                        echo'</div>';
                    } catch (Exception $e) 
                    
                    {
                        echo'<div class="alert alert-danger text-center">';
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        echo'</div>';
                    }
                    exit();
                }
               ?>
                        
				<center><h5>Reset Password Anda</h5></center>
                <center><p><font size="3">Password akan di kirim ke email anda dengan instruksi cara mereset password anda</font></p></center>
                
                <div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" required='required' autocomplete="off" name="user" placeholder="Masukkan alamat email anda ..">
                        <input type="submit" class="btn btn-primary btn-block mt-4" name="submit" value="Terima password baru anda lewat email">
				</div>

                

				

			</div>
			   </div>
			</div>

		</div>
     

	</div>

</div>


<?php include 'footer.php'; ?>
</form>