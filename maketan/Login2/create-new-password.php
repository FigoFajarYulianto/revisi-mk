<?php include 'header.php'; ?>

<div class="container">

	<div class="row">
		<div class="col-lg-4 mx-auto">

			<div class="pt-4 pb-3">

			<div class="border">
				<center>
					<a href="reset-password.php"><img src="gambar/sistem/maketan.png" style="width:auto; height:150px; margin-right:auto; margin-left:auto;"></a>
				</center>
				<br>

                <?php
                  $selector = $_GET["selector"];
                  $validator = $_GET["validator"];

                  if (empty($selector) || empty($validator)) {
                      echo "Tidak bisa memvalidate request anda!";
                  } else {
                      if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                        ?>
                        
                        <form action="reset-password.php" method="post">
                         <input type="hidden" name="selector" value="<?php echo $selector ?>">
                         <input type="hidden" name="validator" value="<?php echo $validator ?>">
                    <div class="form-group">
						<label>Password Baru</label>
						<input type="password" name="pwd" class="form-control" required='required' autocomplete="off" name="pwd" placeholder="Masukkan password baru ..">
					</div>
                    <div class="form-group">
						<label>Ulangi Password Baru</label>
						<input type="password" name="pwd-repeat" class="form-control" required='required' autocomplete="off" name="pwd-repeat" placeholder="Ulangi password baru ..">
					</div>
                    <input type="submit" class="btn btn-primary btn-block mt-4" name="reset-password-submit" value="Reset password">
                        </form>

                        <?php
                      }
                  }
                ?>
               
			</div>
			   </div>
			</div>

		</div>
     

	</div>

</div>


<?php include 'footer.php'; ?>